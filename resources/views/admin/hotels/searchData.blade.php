<table class="table table-striped table-bordered table-hover table-md">
    <thead class="w3-small text-muted thead-light">
        <tr>
            <th>ID</th>
            <th width="60">Action</th>
            <th>Name</th>
            <th>Location</th>
            <th>Author</th>
            <th>Status</th>
            <th>Reviews</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse($hotels as $hotel)
        <tr>
            <td>{{ $hotel->id }}</td>
            <td>
                <div class="dropdown show">
                    <a class="btn btn-primary btn-xs dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a href="{{ route('hotels.all', ['id' => $hotel->id]) }}" target="_blank" class="dropdown-item"><i class="fa fa-code"></i> Raw JSON</a>
                        <a href="{{ route('admin.hotels.show', $hotel->id) }}" class="dropdown-item"><i class="fa fa-eye"></i> View</a>
                        <a href="{{ route('admin.hotels.edit', $hotel->id) }}" class="dropdown-item"><i class="fa fa-edit"></i> Edit</a>
                        <form action="{{ route('admin.hotels.destroy', $hotel->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this hotel?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                    </div>
                </div>
            </td>
            <td>{{ $hotel->title }}</td>
            <td>{{ $hotel->location->name ?? 'N/A' }}</td>
            <td>{{ $hotel->addedBy->name ?? 'N/A' }}</td>
            <td>
                @if($hotel->status == 'publish')
                    <span class="badge badge-success">Published</span>
                @else
                    <span class="badge badge-warning">Draft</span>
                @endif
                @if($hotel->is_featured)
                    <span class="badge badge-info">Featured</span>
                @endif
            </td>
            <td>{{ $hotel->star_rate ?? 'N/A' }}</td>
            <td>{{ $hotel->created_at->format('Y-m-d') }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-danger h5 text-center">No hotels found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
<div class="w3-small float-right pt-1">
    {{ $hotels->links() }}
</div>

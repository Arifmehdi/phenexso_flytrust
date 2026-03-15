@extends('admin.master')

@section('title', 'All Hotels')

@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Hotels List</h4>
                <div class="card-tools">
                    <a href="{{ route('admin.hotels.create') }}" class="btn btn-primary btn-sm">Add New Hotel</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Reviews</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($hotels as $hotel)
                        <tr>
                            <td>{{ $hotel->id }}</td>
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
                            <td>
                                <a href="{{ route('admin.hotels.show', $hotel->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('admin.hotels.edit', $hotel->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.hotels.destroy', $hotel->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this hotel?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">No hotels found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $hotels->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
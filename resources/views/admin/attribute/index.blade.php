@extends('admin.master')
@section('title', 'Admin Dashboard | Room Attributes')

@section('body')
    <section class="pt-5">
        <div class="card shadow">
            <div class="card-header bg-info">
                <h2 class="text-white">Room Attributes Management</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add New Attribute</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.attributes.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Attribute Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="e.g., Bed Type" required>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Add Attribute</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Room Attributes</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Service</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($attributes as $attribute)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $attribute->name }}</td>
                                                    <td>{{ $attribute->service }}</td>
                                                    <td>{{ $attribute->created_at->toFormattedDateString() }}</td>
                                                    <td class="d-flex">
                                                        <a href="{{ route('admin.attributes.edit', $attribute->id) }}" class="btn btn-sm btn-info mr-2">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                        <a href="{{ route('admin.attributes.show', $attribute->id) }}" class="btn btn-sm btn-success mr-2">
                                                            <i class="fas fa-list"></i> Manage Terms
                                                        </a>
                                                        <form action="{{ route('admin.attributes.destroy', $attribute->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this attribute?')">
                                                                <i class="fas fa-trash"></i> Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">No attributes found for 'hotel' service.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-3">
                                    {{ $attributes->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('admin.master')
@section('title', 'Admin Dashboard | Locations')

@section('body')
    <section class="pt-5">
        <div class="card shadow">
            <div class="card-header bg-info">
                <h2 class="text-white">Location Management</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Location</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.locations.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter location name" required>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="parent_id">Parent Location</label>
                                        <select name="parent_id" id="parent_id" class="form-control">
                                            <option value="">-- Select Parent --</option>
                                            @foreach($allLocations as $location)
                                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Description</label>
                                        <textarea name="content" id="content" class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="map_lat">Latitude</label>
                                        <input type="text" name="map_lat" id="map_lat" class="form-control" placeholder="e.g., 23.777176">
                                    </div>
                                    <div class="form-group">
                                        <label for="map_lng">Longitude</label>
                                        <input type="text" name="map_lng" id="map_lng" class="form-control" placeholder="e.g., 90.399452">
                                    </div>
                                    <div class="form-group">
                                        <label for="map_zoom">Map Zoom</label>
                                        <input type="number" name="map_zoom" id="map_zoom" class="form-control" placeholder="e.g., 14">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Add Location</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Locations</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Parent</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($locations as $location)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $location->name }}</td>
                                                    <td>{{ $location->parent->name ?? '--' }}</td>
                                                    <td>
                                                        @if ($location->status == 'publish')
                                                            <span class="badge badge-success">Published</span>
                                                        @else
                                                            <span class="badge badge-danger">Draft</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $location->created_at->toFormattedDateString() }}</td>
                                                    <td class="d-flex">
                                                        <a href="{{ route('admin.locations.edit', $location->id) }}" class="btn btn-sm btn-info mr-2">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('admin.locations.destroy', $location->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this location?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">No locations found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-3">
                                    {{ $locations->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

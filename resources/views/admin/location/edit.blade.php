@extends('admin.master')
@section('title', 'Admin Dashboard | Edit Location')

@section('body')
    <section class="pt-5">
        <div class="card shadow">
            <div class="card-header bg-info">
                <h2 class="text-white">Edit Location</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.locations.update', $location->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h3 class="card-title text-white">Edit Location Details</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $location->name }}" required>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="parent_id">Parent Location</label>
                                        <select name="parent_id" id="parent_id" class="form-control">
                                            <option value="">-- Select Parent --</option>
                                            @foreach($allLocations as $loc)
                                                <option value="{{ $loc->id }}" {{ $location->parent_id == $loc->id ? 'selected' : '' }}>{{ $loc->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Description</label>
                                        <textarea name="content" id="content" class="form-control" rows="3">{{ $location->content }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="map_lat">Latitude</label>
                                                <input type="text" name="map_lat" id="map_lat" class="form-control" value="{{ $location->map_lat }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="map_lng">Longitude</label>
                                                <input type="text" name="map_lng" id="map_lng" class="form-control" value="{{ $location->map_lng }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="map_zoom">Map Zoom</label>
                                                <input type="number" name="map_zoom" id="map_zoom" class="form-control" value="{{ $location->map_zoom }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h3 class="card-title text-white">Status</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="status_publish" value="publish" {{ $location->status == 'publish' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status_publish">Publish</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="status_draft" value="draft" {{ $location->status == 'draft' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status_draft">Draft</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Update Location</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

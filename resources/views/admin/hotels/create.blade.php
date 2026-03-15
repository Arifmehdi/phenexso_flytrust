@extends('admin.master')

@section('title', 'Create New Hotel')

@section('body')
<section class="pt-5">
    <div class="card shadow">
        <div class="card-header bg-info">
            <h2 class="text-white">Create New Hotel</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.hotels.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="card mb-3">
                            <div class="card-header bg-info">
                                <h3 class="card-title text-white">Hotel Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="5" required>{{ old('content') }}</textarea>
                                    @error('content')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image_file">Main Image</label>
                                    <input type="file" name="image_file" id="image_file" class="form-control-file @error('image_file') is-invalid @enderror">
                                    @error('image_file')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="banner_image_file">Banner Image</label>
                                    <input type="file" name="banner_image_file" id="banner_image_file" class="form-control-file @error('banner_image_file') is-invalid @enderror">
                                    @error('banner_image_file')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="location_id">Location</label>
                                    <select name="location_id" id="location_id" class="form-control @error('location_id') is-invalid @enderror" required>
                                        <option value="">Select Location</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('location_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="map_lat">Map Latitude</label>
                                        <input type="text" name="map_lat" id="map_lat" class="form-control @error('map_lat') is-invalid @enderror" value="{{ old('map_lat') }}">
                                        @error('map_lat')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="map_lng">Map Longitude</label>
                                        <input type="text" name="map_lng" id="map_lng" class="form-control @error('map_lng') is-invalid @enderror" value="{{ old('map_lng') }}">
                                        @error('map_lng')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="map_zoom">Map Zoom</label>
                                        <input type="number" name="map_zoom" id="map_zoom" class="form-control @error('map_zoom') is-invalid @enderror" value="{{ old('map_zoom') }}">
                                        @error('map_zoom')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="is_featured" id="is_featured" class="custom-control-input" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="is_featured">Is Featured</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="gallery_files">Gallery Images (Multiple)</label>
                                    <input type="file" name="gallery_files[]" id="gallery_files" class="form-control-file @error('gallery_files.*') is-invalid @enderror" multiple>
                                    @error('gallery_files.*')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="video">YouTube Video URL</label>
                                    <input type="text" name="video" id="video" class="form-control @error('video') is-invalid @enderror" value="{{ old('video') }}">
                                    @error('video')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="policy">Policy</label>
                                    <textarea name="policy" id="policy" class="form-control @error('policy') is-invalid @enderror" rows="3">{{ old('policy') }}</textarea>
                                    @error('policy')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="star_rate">Star Rate (1-5)</label>
                                    <input type="number" name="star_rate" id="star_rate" class="form-control @error('star_rate') is-invalid @enderror" value="{{ old('star_rate') }}" min="1" max="5">
                                    @error('star_rate')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" step="0.01">
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="check_in_time">Check In Time</label>
                                        <input type="time" name="check_in_time" id="check_in_time" class="form-control @error('check_in_time') is-invalid @enderror" value="{{ old('check_in_time') }}">
                                        @error('check_in_time')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="check_out_time">Check Out Time</label>
                                        <input type="time" name="check_out_time" id="check_out_time" class="form-control @error('check_out_time') is-invalid @enderror" value="{{ old('check_out_time') }}">
                                        @error('check_out_time')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="allow_full_day" id="allow_full_day" class="custom-control-input" value="1" {{ old('allow_full_day') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="allow_full_day">Allow Full Day Booking</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="sale_price">Sale Price</label>
                                    <input type="number" name="sale_price" id="sale_price" class="form-control @error('sale_price') is-invalid @enderror" value="{{ old('sale_price') }}" step="0.01">
                                    @error('sale_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h3 class="card-title text-white">Publish</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status_publish" value="publish" {{ old('status', 'draft') == 'publish' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_publish">Publish</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status_draft" value="draft" {{ old('status', 'draft') == 'draft' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_draft">Draft</label>
                                    </div>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Create Hotel</button>
                                    <a href="{{ route('admin.hotels.index') }}" class="btn btn-secondary btn-block mt-2">Cancel</a>
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

@extends('admin.master')

@section('title', 'Hotel Details')

@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Hotel Details: {{ $hotel->title }}</h4>
                <div class="card-tools">
                    <a href="{{ route('admin.hotels.edit', $hotel->id) }}" class="btn btn-warning btn-sm">Edit Hotel</a>
                    <a href="{{ route('admin.hotels.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label>ID:</label>
                            <p>{{ $hotel->id }}</p>
                        </div>
                        <div class="form-group">
                            <label>Title:</label>
                            <p>{{ $hotel->title }}</p>
                        </div>
                        <div class="form-group">
                            <label>Slug:</label>
                            <p>{{ $hotel->slug }}</p>
                        </div>
                        <div class="form-group">
                            <label>Content:</label>
                            <p>{!! $hotel->content !!}</p>
                        </div>
                        <div class="form-group">
                            <label>Main Image:</label>
                            @if($hotel->mainImage)
                                <p><img src="{{ asset($hotel->mainImage->file_path) }}" alt="Main Image" width="200"></p>
                            @else
                                <p>No main image.</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Banner Image:</label>
                            @if($hotel->bannerImage)
                                <p><img src="{{ asset($hotel->bannerImage->file_path) }}" alt="Banner Image" width="200"></p>
                            @else
                                <p>No banner image.</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Location:</label>
                            <p>{{ $hotel->location->name ?? 'N/A' }}</p>
                        </div>
                        <div class="form-group">
                            <label>Address:</label>
                            <p>{{ $hotel->address ?? 'N/A' }}</p>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Map Latitude:</label>
                                <p>{{ $hotel->map_lat ?? 'N/A' }}</p>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Map Longitude:</label>
                                <p>{{ $hotel->map_lng ?? 'N/A' }}</p>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Map Zoom:</label>
                                <p>{{ $hotel->map_zoom ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Is Featured:</label>
                            <p>{{ $hotel->is_featured ? 'Yes' : 'No' }}</p>
                        </div>
                        <div class="form-group">
                            <label>Gallery Images:</label>
                            <div class="d-flex flex-wrap">
                                @forelse($galleryImages as $media)
                                    <img src="{{ asset($media->file_path) }}" alt="Gallery Image" width="150" class="img-thumbnail mr-2 mb-2">
                                @empty
                                    <p>No additional images.</p>
                                @endforelse
                            </div>
                        </div>
                        <div class="form-group">
                            <label>YouTube Video URL:</label>
                            <p><a href="{{ $hotel->video }}" target="_blank">{{ $hotel->video }}</a></p>
                        </div>
                        <div class="form-group">
                            <label>Policy:</label>
                            <p>{!! $hotel->policy !!}</p>
                        </div>
                        <div class="form-group">
                            <label>Star Rate:</label>
                            <p>{{ $hotel->star_rate ?? 'N/A' }}</p>
                        </div>
                        <div class="form-group">
                            <label>Price:</label>
                            <p>{{ $hotel->price ?? 'N/A' }}</p>
                        </div>
                        <div class="form-group">
                            <label>Check In Time:</label>
                            <p>{{ $hotel->check_in_time ?? 'N/A' }}</p>
                        </div>
                        <div class="form-group">
                            <label>Check Out Time:</label>
                            <p>{{ $hotel->check_out_time ?? 'N/A' }}</p>
                        </div>
                        <div class="form-group">
                            <label>Allow Full Day Booking:</label>
                            <p>{{ $hotel->allow_full_day ? 'Yes' : 'No' }}</p>
                        </div>
                        <div class="form-group">
                            <label>Sale Price:</label>
                            <p>{{ $hotel->sale_price ?? 'N/A' }}</p>
                        </div>
                        <div class="form-group">
                            <label>Status:</label>
                            <p>{{ ucfirst($hotel->status) }}</p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card mb-3">
                            <div class="card-header bg-info">
                                <h3 class="card-title text-white">Author & Dates</h3>
                            </div>
                            <div class="card-body">
                                <p><strong>Created By:</strong> {{ $hotel->addedBy->name ?? 'N/A' }}</p>
                                <p><strong>Created At:</strong> {{ $hotel->created_at ? $hotel->created_at->format('Y-m-d H:i') : 'N/A' }}</p>
                                <p><strong>Last Updated By:</strong> {{ $hotel->editedBy->name ?? 'N/A' }}</p>
                                <p><strong>Last Updated At:</strong> {{ $hotel->updated_at ? $hotel->updated_at->format('Y-m-d H:i') : 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                </div> {{-- End of row --}}
            </div>
        </div>
    </div>
</div>
@endsection
@extends('admin.master')
@section('title', 'Admin Dashboard | Edit Room Attribute')

@section('body')
    <section class="pt-5">
        <div class="card shadow">
            <div class="card-header bg-info">
                <h2 class="text-white">Edit Room Attribute</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.attributes.update', $attribute->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h3 class="card-title text-white">Edit Attribute Details</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Attribute Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $attribute->name }}" required>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- For future: Add fields like hide_in_filter_search, position, hide_in_single if needed --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h3 class="card-title text-white">Actions</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Update Attribute</button>
                                    </div>
                                    <div class="form-group">
                                        <a href="{{ route('admin.attributes.show', $attribute->id) }}" class="btn btn-success btn-block">Manage Terms</a>
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

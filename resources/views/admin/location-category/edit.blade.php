@extends('admin.master')
@section('title', 'Admin Dashboard | Edit Location Category')

@section('body')
    <section class="pt-5">
        <div class="card shadow">
            <div class="card-header bg-info">
                <h2 class="text-white">Edit Location Category</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.location-categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h3 class="card-title text-white">Edit Location Category</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="icon">Icon Class</label>
                                        <input type="text" name="icon" id="icon" class="form-control" value="{{ $category->icon_class }}">
                                        @error('icon')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
                                            <input class="form-check-input" type="radio" name="status" id="status_publish" value="1" {{ $category->status == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status_publish">Publish</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="status_draft" value="0" {{ $category->status == 0 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status_draft">Draft</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Update Category</button>
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

@extends('layouts.admin')

@section('body')
    <div class="container">
        <h1>Edit Brand</h1>

        <form action="{{ route('admin.brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $brand->name }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description">{{ $brand->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="icon" class="form-label">Icon</label>
                <input type="file" name="icon" class="form-control" id="icon">
                @if($brand->icon)
                    <img src="{{ asset('images/brands/' . $brand->icon) }}" width="100" alt="{{ $brand->name }}">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Brand</button>
        </form>
    </div>
@endsection

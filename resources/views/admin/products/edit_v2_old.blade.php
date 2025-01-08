@extends('layouts.admin')

@section('body')
<div class="container">
    <div class="card">
        <div class="card-body">
    <h2>Edit Product</h2>
    <form action="{{ route('admin.product.update.v2', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Product Main Fields -->
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $product->description) }}</textarea>
        </div>
        
        <!-- Main Product Image -->
        <div class="mb-3">
            <label class="form-label">Product Image</label>
            <input type="file" class="form-control" name="image">
            @if($product->image)
                <div class="mt-2">
                    <img src="{{ asset($product->image) }}" alt="Current Image" width="100">
                </div>
            @endif
        </div>

        <!-- Multiple Images for Product -->
        <div class="mb-3">
            <label class="form-label">Additional Product Images</label>
            <input type="file" class="form-control" name="images[]" multiple>
            <div class="mt-2">
                @foreach($product->images as $image)
                    <img src="{{ asset($image) }}" alt="Additional Image" width="100" class="me-2">
                @endforeach
            </div>
        </div>

        <!-- Product Variants -->
        @if($product->product_type == 2 && $product->variants->count())
            <h4>Variants</h4>
            <div class="row">
                @foreach($product->variants as $variant)
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Variant ID: {{ $variant->id }}</h5>
                                
                                <div class="mb-3">
                                    <label for="variant_price_{{ $variant->id }}" class="form-label">Variant Price</label>
                                    <input type="number" class="form-control" id="variant_price_{{ $variant->id }}" name="variants[{{ $variant->id }}][price]" value="{{ old('variants.' . $variant->id . '.price', $variant->price) }}">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="variant_stock_{{ $variant->id }}" class="form-label">Variant Stock</label>
                                    <input type="number" class="form-control" id="variant_stock_{{ $variant->id }}" name="variants[{{ $variant->id }}][stock]" value="{{ old('variants.' . $variant->id . '.stock', $variant->stock) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="variant_status_{{ $variant->id }}" class="form-label">Variant Status</label>
                                    <select class="form-control" id="variant_status_{{ $variant->id }}" name="variants[{{ $variant->id }}][status]">
                                        <option value="1" {{ $variant->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $variant->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                                <!-- Variant Image -->
                                <div class="mb-3">
                                    <label class="form-label">Variant Image</label>
                                    <input type="file" class="form-control" name="variants[{{ $variant->id }}][image]">
                                    @if($variant->image)
                                        <div class="mt-2">
                                            <img src="{{ asset($variant->image) }}" alt="Variant Image" width="100">
                                        </div>
                                    @endif
                                </div>

                                <form action="{{ route('admin.product.variant.delete', $variant->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mt-3" onclick="return confirm('Are you sure you want to delete this variant?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <button type="submit" class="btn btn-primary mt-4">Update Product</button>
    </form>
</div>
</div>
</div>
@endsection

@extends('layouts.admin')

@section('body')
<style>
.image-preview {
    position: relative;
    display: inline-block;
    margin-right: 10px;
    margin-bottom: 10px;
}

.remove-icon {
    position: absolute;
    top: -10px;
    right: -10px;
    color: red;
    cursor: pointer;
    font-size: 20px;
    background: #fff;
    border-radius: 50%;
    padding: 0 4px;
}

.image-preview img {
    max-width: 100px;
    max-height: 100px;
}
</style>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h2>Edit Product</h2>
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Product Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $product->name) }}" required>
                </div>

                <!-- Product Price -->
                <div class="mb-3">
                    <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="price" name="price"
                        value="{{ old('price', $product->price) }}" required>
                </div>

                <!-- Category and Subcategory -->
                <div class="mb-3">
                    <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                    <select class="form-control" id="category" name="category_id" required>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="brand">Brand (<span style="color:red"> * </span>)</label>
                    <select id="brand" name="brand_id" class="form-control" required>
                        <option value="">Select Brand</option>
                        @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}"
                            {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Stock and Minimum Quantity -->
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" readonly id="stock" name="stock"
                        value="{{ old('stock', $product->stock) }}">
                </div>

                <div class="mb-3">
                    <label for="shortdescription" class="form-label">Short Description</label>
                    <textarea class="form-control" id="shortdescription"
                        name="shortdescription">{{ old('shortdescription', $product->short_description) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description"
                        name="description">{{ old('description', $product->description) }}</textarea>
                </div>

                <!-- Thumbnail Image Upload and Preview -->
                <div class="mb-3">
                    <label for="thumbnailInput" class="form-label">Thumbnail Image <span
                            class="text-danger">*</span></label>
                    <input type="file" class="form-control" id="thumbnailInput" name="image">
                    <div id="thumbnailPreview" class="d-flex mt-2"></div>
                </div>

                <!-- Additional Images Upload and Preview -->
                <div class="mb-3">
                    <label for="images" class="form-label">Additional Images</label>
                    <input type="file" class="form-control" id="images" name="images[]" multiple>
                    <div id="imagePreviewContainer" class="d-flex flex-wrap mt-2"></div>
                </div>

                <!-- Discount Type and Amount Fields -->
                <div class="form-group">
                    <label for="discount_type">Discount Type</label>
                    <select id="discount_type" name="discount_type" class="form-control">
                        <option value="0" {{ old('discount_type', $product->discount_type) == '0' ? 'selected' : '' }}>
                            Nothing</option>
                        <option value="1" {{ old('discount_type', $product->discount_type) == '1' ? 'selected' : '' }}>
                            Amount</option>
                        <option value="2" {{ old('discount_type', $product->discount_type) == '2' ? 'selected' : '' }}>
                            Percentage</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="discount_amount">Discount Amount</label>
                    <input type="number" class="form-control" name="discount_amount" step="0.01"
                        value="{{ old('discount_amount', $product->discount_amount) }}"
                        placeholder="Enter discount amount">
                </div>

                <div class="form-group">
                    <label for="status">Status (<span style="color:red"> * </span>)</label>
                    <select name="status" class="form-control" required>
                        <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-warning float-end">Update Product</button>
                <!-- Button to Trigger Modal -->
                <a href="/admin/supply/managment/v1/{{$product->id}}" class="btn btn-info float-end" ">
                    Manage Stock
                    </a>


            </form>
            

        </div>
    </div>
</div>

<!-- Display Current Images Below the Form -->
<div class="mt-4">
    <h4>Current Thumbnail Image:</h4>
    @if($product->image)
    <img src="{{ asset($product->image) }}" width="100" alt="{{ $product->name }}" class="img-thumbnail">
    @endif

    <h4 class="mt-3">Current Additional Images:</h4>
    <div class="d-flex flex-wrap">
        @if(!empty($product->images))
        <div class="d-flex flex-wrap">
            @foreach($product->images as $image)
            <div class="me-2 mb-2">
                <img src="{{ asset($image) }}" width="100" alt="{{ $product->name }}">
            </div>
            @endforeach
        </div>
        @else
        <p>No additional images available.</p>
        @endif
    </div>
</div>

<!-- JavaScript for Dynamic Image Preview -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Handle thumbnail image preview
    document.getElementById('thumbnailInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                const previewContainer = document.getElementById('thumbnailPreview');
                previewContainer.innerHTML = `
                        <div class="image-preview">
                            <img src="${e.target.result}" alt="Thumbnail Image">
                            <span class="remove-icon" onclick="removeThumbnail()">×</span>
                        </div>`;
            };
            reader.readAsDataURL(file);
        }
    });

    // Handle multiple image previews
    document.getElementById('images').addEventListener('change', function(event) {
        const files = event.target.files;
        const previewContainer = document.getElementById('imagePreviewContainer');
        previewContainer.innerHTML = ''; // Clear previous previews

        Array.from(files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = (e) => {
                const previewDiv = document.createElement('div');
                previewDiv.classList.add('image-preview');
                previewDiv.innerHTML = `
                        <img src="${e.target.result}" alt="Image">
                        <span class="remove-icon" onclick="removeImage(this)">×</span>`;
                previewContainer.appendChild(previewDiv);
            };
            reader.readAsDataURL(file);
        });
    });
});

// Remove thumbnail image
function removeThumbnail() {
    const thumbnailPreview = document.getElementById('thumbnailPreview');
    thumbnailPreview.innerHTML = ''; // Clear the thumbnail preview
    document.getElementById('thumbnailInput').value = ''; // Reset input
}

// Remove individual images
function removeImage(element) {
    const imagePreviewContainer = document.getElementById('imagePreviewContainer');
    imagePreviewContainer.removeChild(element.parentElement); // Remove the image preview
}
</script>

@endsection
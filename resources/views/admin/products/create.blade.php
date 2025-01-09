@extends('layouts.admin')

@section('body')
<!-- Styles for image preview and remove icon -->
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
<div class="card">
    <div class="card-body">
        <!-- Success and error messages -->
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>Error!</strong> Please check the form below for errors.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Tabs for Single Product and Product Variants -->
        <ul class="nav nav-tabs" id="productTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="single-product-tab" data-toggle="tab" href="#single-product" role="tab"
                    aria-controls="single-product" aria-selected="true">Single Product</a>
            </li>
           
        </ul>

        <div class="tab-content" id="productTabContent">
            <!-- Single Product Tab Content -->
            <div class="tab-pane fade show active" id="single-product" role="tabpanel"
                aria-labelledby="single-product-tab">
                <br>
                <!-- Product form -->
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Product Name Field -->
                    <div class="form-group">
                        <label for="name">Product Name (<span style="color:red"> * </span>)</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <!-- Category , Subcategory and Brand Fields -->
                    <div class="form-group">
                        <label for="category">Category (<span style="color:red"> * </span>)</label>
                        <select id="category" name="category_id" class="form-control" required>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="brand">Brand (<span style="color:red"> * </span>)</label>
                        <select id="brand" name="brand_id" class="form-control" required>
                            @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Short Description Field -->
                    <div class="form-group">
                        <label for="shortdescription">Short Description (<span style="color:red"> * </span>)</label>
                        <textarea name="shortdescription" class="form-control" rows="3" id="shortdescription" required></textarea>
                    </div>

                    <!-- Description Field -->
                    <div class="form-group">
                        <label for="description">Description (<span style="color:red"> * </span>)</label>
                        <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                    </div>

                    <!-- Fields for Single Product -->
                    <div id="single-product-fields">
                        <div class="form-group">
                            <label for="price">Price (<span style="color:red"> * </span>)</label>
                            <input type="text" class="form-control" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock (<span style="color:red"> * </span>)</label>
                            <input type="number" class="form-control" name="stock" required>
                        </div>

                        <!-- Thumbnail Image Field with Preview -->
                        <div class="form-group">
                            <label for="thumbnail">Thumbnail Image (<span style="color:red"> * </span>)</label>
                            <input type="file" class="form-control" name="image" id="thumbnailInput" required>
                            <div id="thumbnailPreview" class="mt-2"></div>
                        </div>

                        <!-- Multiple Images Field with Preview and Remove Option -->
                        <div class="form-group">
                            <label for="images">Images</label>
                            <input type="file" class="form-control" name="images[]" id="imageInput" multiple>
                            <div id="imagePreviewContainer" class="mt-2 d-flex flex-wrap"></div>
                        </div>

                    </div>
                    <!-- Discount Type and Amount Fields -->
                    <div class="form-group" style="display:none !important;">
                        <label for="pre_order">Pre Order</label>
                        <select id="pre_order" name="pre_order" class="form-control">
                            <option value="0" selected>No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <!--- National --->
                    <div class="form-group" >
                        <label for="country">Country</label>
                        <select id="country" name="country" class="form-control">
                            <option value="myanmar" selected>Myanmar</option>
                            <option value="korea">Korea</option>
                        </select>
                    </div>
                    <!-- Discount Type and Amount Fields -->
                    <div class="form-group">
                        <label for="discount_type">Discount Type</label>
                        <select id="discount_type" name="discount_type" class="form-control">
                            <option value="0">Nothing</option>
                            <option value="1">Amount</option>
                            <option value="2">Percentage</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="discount_amount">Discount Amount</label>
                        <input type="number" class="form-control" name="discount_amount" step="0.01"
                            placeholder="Enter discount amount">
                    </div>

                    <div class="form-group">
                        <label for="status">Status (<span style="color:red"> * </span>)</label>
                        <select name="status" class="form-control" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success" formnovalidate>Submit</button>
                </form>
                <br>
            </div>

            
        </div>
    </div>
</div>
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
        document.getElementById('imageInput').addEventListener('change', function(event) {
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
                            <span class="remove-icon" onclick="removeImage(${index})">×</span>
                        `;
                    previewContainer.appendChild(previewDiv);
                };
                reader.readAsDataURL(file);
            });
        });
    });

    // Function to remove thumbnail preview
    function removeThumbnail() {
        document.getElementById('thumbnailPreview').innerHTML = '';
        document.getElementById('thumbnailInput').value = '';
    }

    // Function to remove individual images from the multiple image previews
    function removeImage(index) {
        const previewContainer = document.getElementById('imagePreviewContainer');
        const fileInput = document.getElementById('imageInput');

        const dataTransfer = new DataTransfer();
        Array.from(fileInput.files).forEach((file, fileIndex) => {
            if (fileIndex !== index) {
                dataTransfer.items.add(file); // Add files except the removed one
            }
        });
        fileInput.files = dataTransfer.files; // Update input files

        previewContainer.removeChild(previewContainer.childNodes[index]); // Remove preview
    }
</script>


@endsection
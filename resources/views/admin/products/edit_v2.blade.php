@extends('layouts.admin')

@section('body')
<div class="container">
    <div class="card">
        <div class="card-body">
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
            <h2>Edit Product</h2>
            <form action="{{ route('admin.product.update.v2', $product->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="hidden" name="id" value="{{$product->id}}">
                <!-- Product Main Fields -->
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $product->name) }}">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Stock</label>
                    <input type="text" class="form-control" 
                        value="{{ old('name', $product->stock) }}" readonly>
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

                @endif

              <div class="form-group">
                    <label for="status">Status (<span style="color:red"> * </span>)</label>
                    <select name="status" class="form-control" required>
                        <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-warning mt-4">Update Product</button>
            </form>

            <br>
            <hr>

            <h4>Variants</h4>
            <!-- Add Variant Button -->
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addVariantModal">
                Add Variant
            </button>
            <div class="row">
                @foreach($product->variants as $variant)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Variant ID: {{ $variant->id }}</h5>
                            <form action="{{ route('admin.product.update.v2.variant', $variant->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">

                                    <input type="hidden" class="form-control" id="variant_id_{{ $variant->id }}"
                                        name="id" value="{{ $variant->id }}">
                                </div>

                                <div class="mb-3">
                                    <label  class="form-label">Attribute Name
                                        </label>
                                    <input type="text" class="form-control" 
                                         value="{{ old('price', $variant->attribute_name) }}" name="name" >
                                </div>

                                <div class="mb-3">
                                    <label  class="form-label">Attriube Value</label>
                                    <input type="text" class="form-control" name="attribute_value"
                                         value="{{ old('price', $variant->attribute_value) }}" >
                                </div>
                                
                                <div class="mb-3">
                                    <label for="variant_price_{{ $variant->id }}" class="form-label">Variant
                                        Price</label>
                                    <input type="number" class="form-control" id="variant_price_{{ $variant->id }}"
                                        name="price" value="{{ old('price', $variant->price) }}">
                                </div>



                                <div class="mb-3" style="display:none !important;">
                                    <label for="variant_status_{{ $variant->id }}" class="form-label">Variant
                                        Status</label>
                                    <select class="form-control" id="variant_status_{{ $variant->id }}" name="status">
                                        <option value="1" {{ $variant->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $variant->status == 0 ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label  class="form-label">Stock
                                        </label>
                                    <input type="text" class="form-control" 
                                         value="{{ old('price', $variant->stock) }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="discount_type_{{ $variant->id }}">Discount Type</label>
                                    <select id="discount_type_{{ $variant->id }}" name="discount_type"
                                        class="form-control">
                                        <option value="0" {{ $variant->discount_type == 0 ? 'selected' : '' }}>Nothing
                                        </option>
                                        <option value="1" {{ $variant->discount_type == 1 ? 'selected' : '' }}>Amount
                                        </option>
                                        <option value="2" {{ $variant->discount_type == 2 ? 'selected' : '' }}>
                                            Percentage</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="discount_amount_{{ $variant->id }}">Discount Amount</label>
                                    <input type="number" class="form-control" name="discount_amount" step="0.01"
                                        value="{{  $variant->discount_amount }}" placeholder="Enter discount amount">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Variant Image</label>
                                    <input type="file" class="form-control" name="image">
                                    @if($variant->image)
                                    <div class="mt-2">
                                        <img src="{{ asset($variant->image) }}" alt="Variant Image" width="100">
                                    </div>
                                    @endif
                                </div>
                                
                                 <div class="form-group">
                                    <label for="discount_type_{{ $variant->id }}">Status </label>
                                    <select id="discount_type_{{ $variant->id }}" name="status"
                                        class="form-control">
                                        <option value="0" {{ $variant->status == 0 ? 'selected' : '' }}>InActive
                                        </option>
                                        <option value="1" {{ $variant->status == 1 ? 'selected' : '' }}>Active
                                        </option>
                         
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-warning btn-sm mt-3">Update</button>
                            </form>

                            <form action="{{ route('admin.product.variant.delete', $variant->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mt-3"
                                    onclick="return confirm('Are you sure you want to delete this variant?')">Delete</button>
                            </form>
                            <br>
                            <a href="/admin/supply/managment/v2/{{$variant->id}}" class="btn btn-info btn-sm mt-3 float-end">
                            Manage Stock
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </div>
</div>


<!-- Add Variant Modal -->
<div class="modal fade" id="addVariantModal" tabindex="-1" role="dialog" aria-labelledby="addVariantModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addVariantModalLabel">Add New Variant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/product/update/v2/variant/add" method="POST" enctype="multipart/form-data">

                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <div class="modal-body">
                    <!-- Variant Fields -->
                    <div class="form-group">
                        <label>Attribute Name ( <span style="color:red"> * </span> ) </label>
                        <input type="text" class="form-control" name="attribute_name" required>
                    </div>
                    <div class="form-group">
                        <label>Attribute Value ( <span style="color:red"> * </span> ) </label>
                        <input type="text" class="form-control" name="attribute_value" required>
                    </div>
                    <div class="form-group">
                        <label for="variant_price">Variant Price ( <span style="color:red"> * </span> ) </label>
                        <input type="number" class="form-control" name="price" required>
                    </div>

                    <div class="form-group">
                        <label for="stock">Stock ( <span style="color:red"> * </span> ) </label>
                        <input type="number" class="form-control" name="stock" required>
                    </div>

                    <div class="form-group">
                        <label for="discount_type">Discount Type</label>
                        <select class="form-control" name="discount_type">
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
                        <label>Variant Image ( <span style="color:red"> * </span> ) </label>
                        <input type="file" class="form-control" name="image" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Variant</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
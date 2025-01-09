@extends('layouts.admin')

@section('body')
<div class="container">
    <div class="card mb-3">
        <div class="card-body">
            <h2>Product Detail</h2>
            @if($product->pre_order == 1)
            <span class="badge bg-warning" style="color:white !important;">Pre Order</span>
            @endif
            <p><strong>Name:</strong> {{ $product->name }}</p>
            <p><strong>Price:</strong> {{ $product->price }}  @if($product->country == "myanmar")
                                    Ks
                                @elseif($product->country == "korea")
                                    ₩
                                @else
                                    $
                                @endif</p>
            <p><strong>Stock:</strong> {{ $product->stock }}</p>
            <p><strong>Country:</strong> {{ $product->country }}</p>
            <p><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</p>
            <!-- <p><strong>Subcategory:</strong> {{ $product->subcategory->name ?? 'N/A' }}</p> -->
            <p><strong>Brand:</strong> {{ $product->brand->name ?? 'N/A' }}</p>
            <p><strong>Type:</strong> {{ $product->product_type == 1 ? 'Single Product' : 'Product Variant' }}</p>
            <p><strong>Status:</strong> {{ $product->status == 1 ? 'Active' : 'Inactive' }}</p>
            <p><strong>Short Description:</strong> {!! $product->short_description !!}</p>
            <p><strong>Description:</strong> {!! $product->description !!}</p>
            
            @if($product->image)
                <p><strong>Primary Image:</strong><br>
                    <img src="{{ asset($product->image) }}" width="150" alt="{{ $product->name }}">
                </p>
            @endif

            @if(!empty($product->images))
                <p><strong>Additional Images:</strong></p>
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

    @if($product->product_type == 2 && $product->variants->count() > 0)
        <div class="card">
            <div class="card-body">
                <h3>Product Variants</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Attribute Name</th>
                            <th>Attribute Value</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product->variants as $index => $variant)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $variant->attribute_name }}</td>
                            <td>{{ $variant->attribute_value }}</td>
                            <td>{{ $variant->price }} Ks</td>
                            <td>{{ $variant->stock }}</td>
                            <td>{{ $variant->status == 1 ? 'Active' : 'Inactive' }}</td>
                            <td>
                                @if($variant->image)
                                    <img src="{{ asset($variant->image) }}" width="50" alt="{{ $variant->attribute_name }}">
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <p>No variants available for this product.</p>
            </div>
        </div>
    @endif


    @if($product->supply->count() > 0)
        <div class="card">
            <div class="card-body">
                <h3>Supply Logs</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Product</th>
                            <th>Type</th>
                            <th>Qty</th>
                            <th>Description</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product->supply as $index => $supply)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                            <img src="{{ asset($supply->productVariant->image) }}" alt="Product Variant Image" style="width:80px;height:80px !important;">  <br>
                            ( {{ $supply->productVariant->attribute_name ?? 'Default' }}  : {{ $supply->productVariant->attribute_value ?? '-' }} )
                            </td>
                            <td>
                                @if($supply->type == 1)
                                    <span class="badge bg-success" style="color:white !important;">Add</span>
                                @elseif($supply->type == 2)
                                    <span class="badge bg-danger"  style="color:white !important;">Reduce</span>
                                @endif
                            </td>
                            <td>
                                @if($supply->type == 1)
                                    <span class="text-success">+ {{ $supply->qty }}</span>
                                @elseif($supply->type == 2)
                                    <span class="text-danger">- {{ $supply->qty }}</span>
                                @endif
                            </td>
                            <td>{{ $supply->description }} </td>
                            <td>{{ \Carbon\Carbon::parse($supply->date)->format('F j, Y') }}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <p>No Supply Log for this product.</p>
            </div>
        </div>
    @endif
</div>
@endsection

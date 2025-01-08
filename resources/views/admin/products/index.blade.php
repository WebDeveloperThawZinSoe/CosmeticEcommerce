@extends('layouts.admin')

@section('body')
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

        <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-tone m-r-5">
            <i class="anticon anticon-plus"></i> Single Product Create
        </a>
        <a href="{{ route('admin.products.create.varaint') }}" class="btn btn-primary btn-tone m-r-5">
            <i class="anticon anticon-plus"></i> Variant Product Create
        </a>

        <div class="m-t-25">
            <table id="data-table" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                       
                        <th>Category</th>
                        <th>Type</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Discount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $product->name }}</td>
                        <td>
                            @if($product->product_type == 1)
                            {{ $product->price }} Ks
                            @elseif($product->product_type = 2)
                            @php
                            $minPrice = $product->variants->min('price');
                            $maxPrice = $product->variants->max('price');
                            echo $minPrice . " ~ " . $maxPrice . " Ks" ;
                            @endphp
                            @endif
                        </td>
                        <td>{{ $product->stock }}</td>
                       
                        <td>{{ $product->category->name ?? 'N/A' }}</td>
                        <td>
                            @if($product->product_type == 1)
                            Single Product
                            @elseif($product->product_type == 2)
                            Product Variant
                            @endif
                        </td>

                        <td>
                            @if($product->image)
                            <img src="{{ asset($product->image) }}" width="50" alt="{{ $product->name }}">
                            @endif
                        </td>
                        <td>
                            @if($product->status == 1)
                            <center>
                                <div style="width:20px;height:20px;border-radius: 100%;background-color:#40ff00;"></div>
                            </center>
                            @elseif($product->status == 0)
                            <center>
                                <div style="width:20px;height:20px;border-radius: 100%;background-color:#ff471a;"></div>
                            </center>
                            @endif
                        </td>
                        <td>
                            @if($product->discount_type == 0)
                            Nothing
                            @elseif($product->discount_type == 1)
                            Amount ( {{$product->discount_amount}} Ks )
                            @elseif($product->discount_type == 2)
                            Percentage (  {{$product->discount_amount}} % )
                            @endif
                        </td>
                        <td class="d-flex align-items-center">
                            <a href="{{ route('admin.product.detail.v1', $product->id) }}"
                                class="btn btn-primary btn-sm me-1">
                                <i class="anticon anticon-info"></i>
                            </a>
                            @if($product->product_type == 1)
                            <a href="{{ route('admin.products.edit', $product->id) }}"
                                class="btn btn-warning btn-sm me-1">
                                <i class="anticon anticon-edit"></i>
                            </a>
                            @elseif($product->product_type == 2)
                            <a href="{{ route('admin.product.edit.v2', $product->id) }}"
                                class="btn btn-warning btn-sm me-1">
                                <i class="anticon anticon-edit"></i>
                            </a>
                            @endif

                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this product?')"
                                    class="btn btn-danger btn-sm">
                                    <i class="anticon anticon-delete"></i>
                                </button>
                            </form>
                        </td>


                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
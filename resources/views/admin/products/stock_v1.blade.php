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
            <h2>Product Stock</h2>

            <!-- Stock Management Form -->
            @if($system_type == null)
            <form action="/admin/supply/managment/v1/post" method="POST">
            @else
            <form action="/admin/supply/managment/v2/post" method="POST">
            @endif
                @csrf
                @if($system_type == null)
                @php 
                   $v_product = App\Models\ProductVariants::where("product_id",$product_id)->first();
                @endphp
                <input type="hidden" name="vproduct_id" value="{{$v_product->id}}">
                @else
                <input type="hidden" name="vproduct_id" value="{{$product_id}}">
                @endif
               
                <div class="form-group mb-3">
                    <label for="stockType" class="form-label">Stock Type <span class="text-danger">*</span></label>
                    <select id="stockType" name="stock_type" class="form-control" required>
                        <option value="">Select Type</option>
                        <option value="1">Add Stock</option>
                        <option value="2">Reduce Stock</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="quantity" class="form-label">Quantity <span class="text-danger">*</span></label>
                    <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Enter quantity" required>
                </div>

                <div class="form-group mb-3">
                    <label for="description" class="form-label">Description (Optional)</label>
                    <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter description"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update Stock</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
            </form>

            <!-- Current Stock Display -->
            @if($system_type == 2)
            <div class="mt-4">
                <h4>Product: <strong>{{ $product->product->name }} ( {{$product->attribute_name  }} - {{ $product->attribute_value }} ) </strong></h4>
                <h4>Current Stock: <strong>{{ $product->stock }}</strong></h4>
                <p>Last Updated: <strong>{{ $product->updated_at->format('d M, Y h:i A') }}</strong></p>
            </div>
            @else 
            <div class="mt-4">
                <h4>Product: <strong>{{ $product->name }}</strong></h4>
                <h4>Current Stock: <strong>{{ $product->stock }}</strong></h4>
                <p>Last Updated: <strong>{{ $product->updated_at->format('d M, Y h:i A') }}</strong></p>
            </div>   
            @endif
            <!-- Supply Details -->
            <div class="mt-5">
                <h3>Supply Log</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            
                            <th>Type</th>
                            <th>QTY</th>
                            <th>Description</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($supply as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                               <td>
                               @if($item->type == 1)
                                    <span class="badge bg-success" style="color:white !important;">Add</span>
                                @elseif($item->type == 2)
                                    <span class="badge bg-danger"  style="color:white !important;">Reduce</span>
                                @endif
                               </td>
                                <td>{{ $item->qty }}</td>
                          
                                <td>{!! $item->description !!}</td>
                                <td>{{ $item->created_at->format('d M, Y h:i A') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No supply records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection

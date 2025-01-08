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

       

        <div class="m-t-25">
            <table id="data-table" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Product Name</th>
                        <th>Attribue </th>
                        <th>Type</th>
                        <th>QTY</th>
                        <th>Description</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($supplies as  $index=>$supply)
                        <tr>
                            <td>{{ ++$index }}</td>
                            <td>{{ $supply->product->name ?? "" }} <br>
                            
                            <img src="{{ asset($supply->productVariant->image  ?? "" ) }}" alt="Product Variant Image" style="width:80px;height:80px !important;">

                            </td>
                            <td>{{ $supply->productVariant->attribute_name ?? 'Default' }}  : {{ $supply->productVariant->attribute_value ?? '-' }} </td>
                            <td>  @if($supply->type == 1)
                                    <span class="badge bg-success" style="color:white !important;">Add</span>
                                @elseif($supply->type == 2)
                                    <span class="badge bg-danger"  style="color:white !important;">Reduce</span>
                                @endif</td>
                            <td> @if($supply->type == 1)
                                    <span class="text-success">+ {{ $supply->qty }}</span>
                                @elseif($supply->type == 2)
                                    <span class="text-danger">- {{ $supply->qty }}</span>
                                @endif</td>
                                <td>{{ $supply->description }} </td>
                                <td>{{ \Carbon\Carbon::parse($supply->date)->format('F j, Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
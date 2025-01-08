@extends('layouts.customer')

@section('body')
<div class="container mt-4">
    <div class="row">
        @foreach($orders as $order)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Order #{{ $order->order_number }}</h5>
                        <p class="card-text">Total Price: {{ $order->total_price }} Ks</p>
                        <p class="card-text">
                            Status: 
                            @if($order->status == 1)
                                <span class="badge badge-warning">Pending</span>
                            @elseif($order->status == 2)
                                <span class="badge badge-success">Confirmed</span>
                            @elseif($order->status == 3)
                                <span class="badge badge-danger">Cancelled</span>
                            @elseif($order->status == 4)
                                <span class="badge badge-warning">Paymemt Pending</span>
                            @endif
                        </p>
                        <a href="{{ route('customer.order.detail', $order->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

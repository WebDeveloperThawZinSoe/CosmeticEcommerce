@extends('layouts.admin')

@section('body')
<div class="card">
    <br> <br>
    <div class="card-header">
        <h4>Order #{{ $order->order_number }} Details
        @if($order->status == 1)
                <span class="badge badge-warning">Pending</span>
                @elseif($order->status == 2)
                <span class="badge badge-success">Confirm</span>
                @elseif($order->status == 3)
                <span class="badge badge-danger">Cancel</span>
                @elseif($order->status == 4)
                <span class="badge badge-warning">Payment Pending</span>
                @endif
        </h4>
        <button onclick="window.print()" class="btn btn-primary">Print</button>
            <br><br>
    </div>
    <div class="card-body">
        <h3>Customer Information</h3>
        <p><strong>Customer:</strong> {{ $order->user->name ?? 'Guest' }}</p>
        <p><strong>Email:</strong> {{ $order->user->email ?? 'N/A' }}</p>
        <p><strong>Phone:</strong> {{ $order->user->phone ?? 'N/A' }}</p>
        <p><strong>Total Price:</strong> 
        
        @php 
            $cupon_code_id = $order->cupon_code_id ?? null;
                                
        @endphp
        {{ number_format($order->total_price, 1) }} $
        @if($cupon_code_id != null)
        <br>
        <p><strong>Cupon Code:</strong> <a href="/admin/cupon/{{$order->CuponCode->id}}" target="_blank">  {{$order->CuponCode->cupon_code}} </a> </p>
        @endif
        @if($cupon_code_id == "AAAA")
            {{ number_format($order->total_price, 1) }} $
        @elseif($cupon_code_id == "AAAA")
            @php
                $cupon_type = $order->CuponCode->type;
                $cupon_amount = $order->CuponCode->amount;
                $original_price = $order->total_price;
                if($cupon_type == 1){
                    $after_discount_price = $original_price - $cupon_amount;
                    echo $after_discount_price . "$";
                 }elseif($cupon_type == 2){
                    $after_discount_price = $original_price - ($original_price * ($cupon_amount / 100));
                    echo $after_discount_price . "$";
                }
            @endphp
            <br>
            <p><strong>Total Price:</strong> <a href="/admin/cupon/{{$order->CuponCode->id}}" target="_blank">  {{$order->CuponCode->cupon_code}} </a> </p>
        @endif
        </p>

       
        
        <hr>

        <h4>Delivery Information</h4>
        <p><strong>Region:</strong> {{ $order->region }}</p>
        <p><strong>Address:</strong> {{ $order->address }}</p>
        
        <hr>

        <h4>Billing Information</h4>
        <p><strong>Delivery Method:</strong> 
            @if($order->payment_method == 0)
                Cash On Delivery
            @elseif($order->payment_method == "stripe")
                Stripe Payment
            @else
                {{ optional($order->paymentMethod)->method_name }}
            @endif
        </p>
        <p>
            <strong>Payment Status:</strong>
            @if($order->payment_status == 0)
                Pending
            @else
                {{$order->payment_status}}
            @endif
        </p>
        
        @if($order->payment_method != 0 && $order->payment_method != "stripe")
            <p><strong>Payment Account Name:</strong> {{ $order->payment_account_name }}</p>
            <p><strong>Account Info:</strong> {{ $order->payment_account_name }}</p>
            <p><strong>Payment Slip:</strong></p>
            <a href="{{ asset('payment_slips/'.$order->payment_slip) }}" target="_blank">
                <img src="{{ asset('payment_slips/'.$order->payment_slip) }}" alt="Payment Slip" style="width:400px;height:400px">
            </a>
        @endif

        <hr>

        <h4>Order Items</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderDetails as $detail)
                    <tr>
                        <td>
                            <img src="{{ asset($detail->productVaraints->image) }}" width="50"><br>
                            {{ $detail->productVaraints->product->name }}
                        </td>
                        <td>
                            @php
                                $ProductPrice = $detail->productVaraints->price ?? 0;
                                $DiscountType = $detail->productVaraints->discount_type ?? 0;
                                $DiscountAmount = $detail->productVaraints->discount_amount ?? 0;
                                $finalPrice = $ProductPrice;

                                if ($DiscountType == 1) {
                                    $finalPrice = max(0, $ProductPrice - $DiscountAmount);
                                } elseif ($DiscountType == 2) {
                                    $finalPrice = max(0, $ProductPrice - ($ProductPrice * ($DiscountAmount / 100)));
                                }
                            @endphp
                            {{ number_format($finalPrice, 1) }} Ks
                        </td>
                        <td>{{ $detail->qty }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mt-3">Back to Orders</a>
    </div>
</div>
@endsection
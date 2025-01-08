@extends('layouts.admin')

@section('body')
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Order #{{ $order->order_number }} @if($order->status == 1)
                <span class="badge badge-warning">Pending</span>
                @elseif($order->status == 2)
                <span class="badge badge-success">Confirm</span>
                @elseif($order->status == 3)
                <span class="badge badge-danger">Cancel</span>
                @elseif($order->status == 4)
                <span class="badge badge-warning">Payment Pending</span>
                @endif
            </h4>

            <div class="row mb-3">
                <div class="col-md-6">
                    <h4>User Information </h4>
                    <p><strong>Customer Name:</strong> {{ $order->name }}</p>
                    <p><strong>Account Email:</strong> {{ $order->user->email ?? 'N/A' }}</p>
                    <p><strong>Contact Email:</strong> {{ $order->email }}</p>
                    <p><strong>Phone Number</strong> {{ $order->phone }}</p>

                </div>
                <div class="col-md-6">
                    <h4>Delivery Information </h4>
                    <p><strong>Region:</strong> {{ $order->region }}</p>
                    <p><strong>Address:</strong> {{ $order->address }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <h4>Payment Information </h4>
                    <p><strong>Total Price:</strong> {{ $order->total_price }} Ks</p>
                    <p><strong>Payment Method:</strong>
                        @if($order->payment_method == 0)
                        {{ 'Cash On Delivery' }}
                        @else
                        {{ optional($order->paymentMethod)->method_name }}
                        @endif

                    </p>
                    <p><strong>Payment Account : </strong> {{$order->payment_account_name}} </p>
                    <!-- <p><strong>Transaction id : </strong> {{$order->transaction_no}}</p> -->
                </div>
                <div class="col-md-6">

                </div>
            </div>

            @if($order->payment_slip)
            <div class="mb-4">
                <h6>Payment Slip:</h6>
                <a href="{{ asset('payment_slips/' . $order->payment_slip) }}" target="_blank">
                    <img src="{{ asset('payment_slips/' . $order->payment_slip) }}" alt="Payment Slip" class="img-fluid"
                        style="width:400px;height:auto">
                </a>
            </div>
            @endif

            <hr>

            <h5 class="mb-4">Order Items:</h5>
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th style="color:white">Product Image</th>
                            <th style="color:white">Product Name</th>
                            <th style="color:white">Quantity</th>
                            <th style="color:white">Price</th>
                            <th style="color:white">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderDetails as $detail)
                        <tr>
                            <td>
                                @if($detail->productVaraints->image)
                                <img src="{{ asset($detail->productVaraints->image) }}"
                                    style="width: 80px; height: auto;">
                                @else
                                <img src="{{ asset('images/no-image.png') }}" alt="No Image"
                                    style="width: 80px; height: auto;">
                                @endif
                            </td>
                            <td>{{ $detail->productVaraints->product->name }}
                                ({{ $detail->productVaraints->attribute_name ?? "default" }} -
                                {{ $detail->productVaraints->attribute_value ?? "default" }}) </td>
                            <td>{{ $detail->qty }}</td>
                            <td>
                           <?php
                            $ProductPrice = $detail->productVaraints->price ?? 0;
                            $DiscountType = $detail->productVaraints->discount_type ?? 0;
                            $DiscountAmount = $detail->productVaraints->discount_amount ?? 0;
                            $finalPrice = $ProductPrice;
                            if ($DiscountType == 1) { 
                            $finalPrice = max(0, $ProductPrice - $DiscountAmount); 
                            } elseif ($DiscountType == 2) { 
                            $finalPrice = max(0, $ProductPrice - ($ProductPrice * ($DiscountAmount / 100))); 
                            }

                            echo number_format($finalPrice, 2) . " Ks";
                            ?>


                            </td>
                            <td>
                                <?php 
                                $qty = $detail->qty;
                                $finalPrice = $finalPrice *  $qty;
                                echo number_format($finalPrice, 2) . " Ks" ; 
                            ?>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <div class="card-footer">
            <div class="text-right">
                <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
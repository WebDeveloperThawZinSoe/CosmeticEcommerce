@extends('web.master')

@section('body')
<div class="page-content">
    <section class="content-inner main-faq-content" style="background-image:url({{ asset('web/images/background/bg-shape.jpg') }}); padding-top: 40px; padding-bottom: 40px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center display-4 mb-4" style="font-weight: 700;">Track Your Order</h1>

                    <form action="/order_track" method="POST" class="d-flex justify-content-center mb-5">
                        @csrf
                        <div class="row w-100">
                            <!-- Search Input -->
                            <div class="col-12 col-md-10 mb-3 mb-md-0">
                                <input type="text" name="order_number" class="form-control form-control-lg "
                                    placeholder="Enter Order Number (Example: ORD-************* )" required>
                            </div>

                            <!-- Search Button -->
                            <div class="col-4 col-md-2 mt-md-0 mt-4">
                                <button type="submit" class="btn btn-primary w-100 btn-lg ">Search</button>
                            </div>
                        </div>
                    </form>

                    @if(session('error'))
                    <div class="alert alert-danger text-center">
                        {{ session('error') }}
                    </div>
                    @endif
                </div>
            </div>

            @isset($order)
            <div class="row">
                <div class="col-md-12">
                    <div class="p-4 mb-5" style="background-color: #f9f9f9; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
                        <h4>Order #{{ $order->order_number }}
                            @if($order->status == 1)
                            <span class="badge badge-warning">Pending</span>
                            @elseif($order->status == 2)
                            <span class="badge badge-success">Confirmed</span>
                            @elseif($order->status == 3)
                            <span class="badge badge-danger">Canceled</span>
                            @elseif($order->status == 4)
                            <span class="badge badge-warning">Payment Pending</span>
                            @endif
                        </h4>
                        <br>
                        <button onclick="printPage()" class="btn btn-secondary mb-4">
                            Print Order
                        </button>
                        <br>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h5 class="font-weight-bold">User Information</h5>
                                <p><strong>Customer Name:</strong> {{ $order->name }}</p>
                                <p><strong>Account Email:</strong> {{ $order->user->email ?? "" }}</p>
                                <p><strong>Contact Email:</strong> {{ $order->email ?? "" }}</p>
                                <p><strong>Phone Number:</strong> {{ $order->phone ?? "" }}</p>
                            </div>
                            <div class="col-md-6">
                                <h5 class="font-weight-bold">Delivery Information</h5>
                                <p><strong>Region:</strong> {{ $order->region }}</p>
                                <p><strong>Address:</strong> {{ $order->address }}</p>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h5 class="font-weight-bold">Payment Information</h5>
                                <p><strong>Total Price:</strong> {{ $order->total_price }} $</p>
                                <p><strong>Payment Method:</strong>
                                    @if($order->payment_method == 0)
                                    {{ 'Cash On Delivery' }}
                                    @else
                                    {{ optional($order->paymentMethod)->method_name }}
                                    @endif
                                </p>
                                <p><strong>Payment Account:</strong> {{ $order->payment_account_name }}</p>
                            </div>
                            <div class="col-md-6">
                                @if($order->payment_slip)
                                <div class="mb-4">
                                    <h6>Payment Slip:</h6>
                                    <a href="{{ asset('payment_slips/' . $order->payment_slip) }}" target="_blank">
                                        <img src="{{ asset('payment_slips/' . $order->payment_slip) }}"
                                            alt="Payment Slip" class="img-fluid rounded" style="width: 100%; max-width: 400px; height: auto;">
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>

                        <hr>

                        <h5 class="font-weight-bold mb-4">Order Items:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderDetails as $detail)
                                    <tr>
                                        <td>
                                            @if($detail->productVaraints->image)
                                            <img src="{{ asset($detail->productVaraints->image) }}" class="img-thumbnail" style="width: 80px; height: auto;">
                                            @else
                                            <img src="{{ asset('images/no-image.png') }}" alt="No Image" class="img-thumbnail" style="width: 80px; height: auto;">
                                            @endif
                                        </td>
                                        <td>{{ $detail->productVaraints->product->name }}
                                            ({{ $detail->productVaraints->attribute_name ?? "default" }} -
                                            {{ $detail->productVaraints->attribute_value ?? "default" }})
                                        </td>
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
                                            echo number_format($finalPrice, 2) . " $";
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                            $qty = $detail->qty;
                                            $finalPrice = $finalPrice *  $qty;
                                            echo number_format($finalPrice, 2) . " $"; 
                                            ?>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endisset
        </div>
    </section>
</div>

<script>
function printPage() {
    window.print();
}
</script>
@endsection

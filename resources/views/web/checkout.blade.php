@extends('web.master')
@section('body')
<style>
.payment-card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

#removeImageButton {
    background-color: #ff6b6b;
    color: #fff;
    border: none;
    padding: 8px 12px;
    border-radius: 5px;
    font-size: 0.9em;
    cursor: pointer;
    transition: background-color 0.3s ease;
    display: inline-block;
    margin-left: 10px;
}

#removeImageButton:hover {
    background-color: #ff4a4a;
}

#removeImageButton:focus {
    outline: none;
}
</style>
<div class="page-content">

<!-- inner page banner End-->
<div class="content-inner-1">
    <div class="container">
        <div class="row shop-checkout">
            <div class="col-xl-8">
                <h4 class="title m-b15">Billing To</h4>
                @php
                $payment_methods = App\Models\PaymentMethod::get();
                @endphp

                <div class="row">
                    @foreach($payment_methods as $payment_method)
                    <div class="col-md-4 mb-3 col-6">
                        <div class="card payment-card h-100">
                            <div class="card-header text-center">
                                <img src="{{ asset('images/payment_method/' . $payment_method->icon) }}"
                                    style="width:100%; height:180px;" alt="Icon" class="img-fluid">
                            </div>
                            <div class="card-body text-left" style="height:120px !important;">
                                <h4 class="mt-3">{{ $payment_method->method_name }}</h4>
                                <p> {{ $payment_method->account_no }}</p>
                                <p> {{ $payment_method->account_name }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <hr>
                <h4 class="title m-b15">Delivery Information </h4>
                <form class="row" method="POST" action="{{route('checkout.store')}}" enctype="multipart/form-data" id="checkout-form">
                    @csrf

                    <!-- Name -->
                    <div class="col-md-6">
                        <div class="form-group m-b25">
                            <label class="label-title">Name *</label>
                            <input name="name" required class="form-control"
                                value="{{ auth()->check() && auth()->user()->name ? auth()->user()->name : old('name') }}">
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="col-md-6">
                        <div class="form-group m-b25">
                            <label class="label-title">Phone *</label>
                            <input name="phone" required class="form-control"
                                value="{{ auth()->check() && auth()->user()->phone ? auth()->user()->phone : old('phone') }}">
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="col-md-12">
                        <div class="form-group m-b25">
                            <label class="label-title">Email *</label>
                            <input type="email" name="email" required class="form-control"
                                value="{{ auth()->check() && auth()->user()->email ? auth()->user()->email : old('email') }}">
                        </div>
                    </div>

                    <!-- Region -->
                    <div class="col-md-12">
                        <div class="m-b25">
                            <label class="label-title">Region *</label>
                            <div class="form-select">
                                <select name="region" class="default-select w-100">
                                    <option value="Yangon" {{ old('region') == 'Yangon' ? 'selected' : '' }}>Yangon
                                    </option>
                                    <option value="Mandalay" {{ old('region') == 'Mandalay' ? 'selected' : '' }}>Mandalay</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="col-md-12">
                        <div class="form-group m-b25">
                            <label class="label-title">Address *</label>
                            <textarea name="address" required class="form-control" rows="3">{{ old('address') }}</textarea>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="col-md-12">
                        <div class="form-group m-b25">
                            <label class="label-title">Payment Method *</label>
                            <div class="form-select">
                                <select name="payment_method" required class="default-select w-100" onchange="togglePaymentFields()">
                                    @php $payment_methods = App\Models\PaymentMethod::get(); @endphp
                                    <option value="">SELECT PAYMENT METHOD</option>
                                    
                                    <option value="0">Cash On Delivery</option>
                                    <option value="stripe">Stripe</option>
                                   
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Stripe Fields -->
                    <div class="col-md-12" id="stripeCardField" style="display: none;">
                        <div id="card-element" class="form-control"></div>
                        <div id="card-errors" role="alert" style="color: red; margin-top: 10px;"></div>
                    </div>
                    @php 
                     $cards = auth()->check()
                                ? App\Models\Card::where('user_id', auth()->id())->with('product_variant')->get()
                                : App\Models\Card::where('session_id',
                                session()->getId())->with('product_variant')->get();

                                $totalPrice = 0;

                                $card = auth()->check()
                                ? App\Models\Card::where('user_id', auth()->id())->with('product_variant')->first()
                                : App\Models\Card::where('session_id',
                                session()->getId())->with('product_variant')->first();

                                $cupon_code = $card ? $card->coupon_code : null;
                    @endphp
                    <input type="hidden" name="cupon_code_id" value="{{$cupon_code}}">

                    <!-- Submit Button -->
                    <div class="col-md-12 m-b25">
                        <button type="submit" class="btn btn-secondary w-100">ORDER NOW</button>
                    </div>
                    
                </form>

                <script src="https://js.stripe.com/v3/"></script>
                <script>
                    const stripe = Stripe("pk_test_51QcSLLIbqkytycJ7y40nRkoHrub6sUGpIuYQcfVT1f0T3T0FyRaqWnEZPtAoTlW1Kxccou8BbgCE86xlHJMRZbkl00zAsJRC6x"); // Replace with your Stripe publishable key
                    const elements = stripe.elements();
                    const card = elements.create('card', { style: { base: { fontSize: '16px' } } });

                    card.mount('#card-element');

                    const form = document.getElementById('checkout-form');

                    form.addEventListener('submit', async (event) => {
                        if (document.querySelector('select[name="payment_method"]').value === 'stripe') {
                            event.preventDefault();

                            const { token, error } = await stripe.createToken(card);

                            if (error) {
                                const errorElement = document.getElementById('card-errors');
                                errorElement.textContent = error.message;
                            } else {
                                const hiddenInput = document.createElement('input');
                                hiddenInput.setAttribute('type', 'hidden');
                                hiddenInput.setAttribute('name', 'stripeToken');
                                hiddenInput.setAttribute('value', token.id);
                                form.appendChild(hiddenInput);

                                form.submit();
                            }
                        }
                    });

                    function togglePaymentFields() {
                        const paymentMethod = document.querySelector('select[name="payment_method"]').value;
                        const stripeField = document.getElementById('stripeCardField');

                        stripeField.style.display = paymentMethod === 'stripe' ? 'block' : 'none';
                    }

                    document.addEventListener('DOMContentLoaded', togglePaymentFields);
                </script>
                
            </div>
            <div class="col-xl-4 side-bar">
                    <h4 class="title m-b15">Your Order</h4>
                    <div class="order-detail sticky-top">
                        @php
                        $cards = auth()->check()
                        ? App\Models\Card::where('user_id', auth()->id())->with('product_variant')->get()
                        : App\Models\Card::where('session_id', session()->getId())->with('product_variant')->get();
                        $totalPrice = 0; // Initialize total price
                        @endphp

                        @foreach($cards as $card)
                        @php
                        $variantProductPrice = $card->product_variant->price;
                        $vDiscountType = $card->product_variant->discount_type;
                        $vDiscountAmount = $card->product_variant->discount_amount;

                        // Calculate final price after applying any discount
                        if ($vDiscountType == 0) {
                        $finalPrice = $variantProductPrice;
                        } elseif ($vDiscountType == 1) {
                        $finalPrice = $variantProductPrice - $vDiscountAmount;
                        } elseif ($vDiscountType == 2) {
                        $finalPrice = $variantProductPrice - ($variantProductPrice * ($vDiscountAmount / 100));
                        }

                        // Calculate subtotal for the item based on quantity
                        $subtotal = $finalPrice * $card->qty;
                        $totalPrice += $subtotal; // Add to total price
                        @endphp

                        <div class="cart-item style-1">
                            <div class="dz-media">
                                <!-- Product Image -->
                                <img src="{{ asset($card->product_variant->image) }}" alt="/" class="img-fluid">
                            </div>
                            <div class="dz-info">
                                <!-- Product Name -->
                                <h5><a
                                        href="/products/{{ $card->product_variant->product->id }}/detail">{{ $card->product_variant->product->name }}  (   {{ $card->product_variant->attribute_name	 }} - {{ $card->product_variant->attribute_value }} )</a>
                                </h5>
                                <!-- Final Price (after discount) -->

                                <p> &nbsp; QTY: {{ $card->qty }} | SubTotal : {{ number_format($subtotal, 2) }} $</p>

                            </div>
                        </div>
                        @endforeach




                        <table>
                            <tbody>

                            @php 
                                    $cupon_code = $card ? $card->coupon_code : null;
                                    $original_price = $totalPrice;
                                    if($cupon_code != null){
                                        $cupon_code_info = App\Models\CuponCode::where("id",$cupon_code)->first();
                                        $cupon_code_type = $cupon_code_info->type;
                                        $cupon_code_amount  = $cupon_code_info->amount;
                                        $original_price = $totalPrice;
                                        $after_discount_price = 0;
                                        if($cupon_code_type == 1){
                                            $after_discount_price = $original_price - $cupon_code_amount;
                                        }elseif($cupon_code_type == 2){
                                            $after_discount_price = $original_price - ($original_price * ($cupon_code_amount / 100));
                                        }
                                    }

                                    @endphp

                                    @if($cupon_code ==  null)
                                            <tr class="total">
                                            <td style="font-size:20px !important;">Total</td>
                                            <td class="price"> {{ number_format($totalPrice, 2) }} $</td>

                                        </tr>
                                    @else 
                                    <tr class="total">
                                        <td style="font-size:20px !important;">Total</td>
                                        <td class="price"> <del>{{ number_format($totalPrice, 2) }}</del> $
                                        <br>
                                        {{ number_format($after_discount_price, 2) }} $
                                    </td>

                                        </tr>
                                    @endif

                                    @if($cupon_code !=  null)
                                    <p>  Cupon Code : {{$cupon_code_info->cupon_code}}</p> 
                                    @endif 
                                
                            </tbody>
                        </table>

                       
                        @php
                        $cards = auth()->check()
                        ? App\Models\Card::where('user_id', auth()->id())->with('product_variant')->count()
                        : App\Models\Card::where('session_id',
                        session()->getId())->with('product_variant')->count();
                        @endphp
                        @if($cards > 0 )
                        <a href="/cart" class="btn btn-secondary w-100">Edit In Cart</a>
                        @else
                        <a href="/cart" class="btn btn-secondary w-100">Edit In Cart</a>
                        @endif

                    </div>
                </div>
        </div>
    </div>
</div>

    <!-- Icon Box Start -->
    @include("web.product_footer")
    <!-- Icon Box End -->

</div>
@endsection
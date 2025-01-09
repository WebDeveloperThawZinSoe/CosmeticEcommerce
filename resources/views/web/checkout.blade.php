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
                    $frist_card = auth()->check()
                        ? App\Models\Card::where('user_id', auth()->id())->with('product_variant')->first()
                        : App\Models\Card::where('session_id', session()->getId())->with('product_variant')->first();
                    $country = $frist_card->country ?? null;
                    if($country != null){
                        $payment_methods = App\Models\PaymentMethod::where("country",$country)->get();
                    }else{
                        $payment_methods = App\Models\PaymentMethod::get();
                    }
                    
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
                    <form class="row" method="POST" action="{{route('checkout.store')}}" enctype="multipart/form-data">
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

                        <div class="col-md-12" style="display:none !important;">
                            <div class="form-group m-b25">
                                <label class="label-title">Email *</label>
                                <input type="country" name="country" required class="form-control"
                                    value="{{ $country ?? null }}">
                            </div>
                        </div>


                        <!-- Region -->
                        <div class="col-md-12">
                            <div class="m-b25">
                                <label class="label-title">Region *</label>
                                <input name="region" required class="form-control"
                                value="{{old('region')}}">
                                <!-- <div class="form-select">
                                    <select name="region" class="default-select w-100">
                                        <option value="Yangon" {{ old('region') == 'Yangon' ? 'selected' : '' }}>Yangon
                                        </option>
                                        <option value="Mandalay" {{ old('region') == 'Mandalay' ? 'selected' : '' }}>
                                            Mandalay</option>
                                        <option value="Ayeyarwady"
                                            {{ old('region') == 'Ayeyarwady' ? 'selected' : '' }}>Ayeyarwady</option>
                                        <option value="Bago" {{ old('region') == 'Bago' ? 'selected' : '' }}>Bago
                                        </option>
                                        <option value="Magway" {{ old('region') == 'Magway' ? 'selected' : '' }}>Magway
                                        </option>
                                        <option value="Sagaing" {{ old('region') == 'Sagaing' ? 'selected' : '' }}>
                                            Sagaing</option>
                                        <option value="Tanintharyi"
                                            {{ old('region') == 'Tanintharyi' ? 'selected' : '' }}>Tanintharyi</option>
                                        <option value="Kachin" {{ old('region') == 'Kachin' ? 'selected' : '' }}>Kachin
                                        </option>
                                        <option value="Kayah" {{ old('region') == 'Kayah' ? 'selected' : '' }}>Kayah
                                        </option>
                                        <option value="Kayin" {{ old('region') == 'Kayin' ? 'selected' : '' }}>Kayin
                                        </option>
                                        <option value="Chin" {{ old('region') == 'Chin' ? 'selected' : '' }}>Chin
                                        </option>
                                        <option value="Mon" {{ old('region') == 'Mon' ? 'selected' : '' }}>Mon</option>
                                        <option value="Rakhine" {{ old('region') == 'Rakhine' ? 'selected' : '' }}>
                                            Rakhine</option>
                                        <option value="Shan" {{ old('region') == 'Shan' ? 'selected' : '' }}>Shan
                                        </option>
                                        <option value="Naypyidaw" {{ old('region') == 'Naypyidaw' ? 'selected' : '' }}>
                                            Naypyidaw</option>

                                    </select>
                                </div> -->
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="col-md-12">
                            <div class="form-group m-b25">
                                <label class="label-title">Address *</label>
                                <textarea name="address" required class="form-control"
                                    rows="3">{{ old('address') }}</textarea>
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="col-md-12">
                            <div class="form-group m-b25">
                                <label class="label-title">Payment Method *</label>
                                <div class="form-select">
                                    <select name="payment_method" required class="default-select w-100"
                                        onchange="togglePaymentFields()">
                                        @php 
                                        

                                        if($country != null){
                                        $payment_methods = App\Models\PaymentMethod::where("country",$country)->get();
                                        }else{
                                            $payment_methods = App\Models\PaymentMethod::get();
                                        }
                                        @endphp
                                        <option value="">SELECT PAYMENT METHOD</option>
                                        @auth
                                        <option value="0">Cash On Delivery</option>
                                        @endauth
                                        @foreach($payment_methods as $payment_method)
                                        <option value="{{ $payment_method->id }}"
                                            {{ old('payment_method') == $payment_method->id ? 'selected' : '' }}>
                                            {{ $payment_method->method_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Slip -->
                        <div class="col-md-12" id="paymentSlipField">
                            <div class="form-group m-b25">
                                <label class="label-title">Payment Slip *</label>
                                <input type="file" name="payment_slip" class="form-control" accept="image/*"
                                    id="paymentSlipInput" onchange="previewImage(event)">

                                <!-- Preview Image -->
                                <img id="paymentSlipPreview" src="#" alt="Preview Image"
                                    style="display:none; max-width: 100px; margin-top: 10px;">

                                <!-- Remove Image Button -->
                                <button type="button" id="removeImageButton" style="display:none; margin-top: 10px;"
                                    onclick="removeImage()">
                                    ✕ Remove Image
                                </button>
                            </div>
                        </div>

                        <!-- Payment Account Name -->
                        <div class="col-md-12" id="paymentAccountNameField">
                            <div class="form-group m-b25">
                                <label class="label-title">Payment Account Name *</label>
                                <input name="payment_account_name" class="form-control" id="paymentAccountNameInput"
                                    value="{{ old('payment_account_name') }}">
                            </div>
                        </div>
                        <!-- Note -->
                        <div class="col-md-12 m-b25">
                            <div class="form-group">
                                <label class="label-title">Order Notes (optional)</label>
                                <textarea name="note" class="form-control" rows="5">{{ old('note') }}</textarea>
                            </div>
                        </div>

                        <script>
                        function previewImage(event) {
                            const preview = document.getElementById('paymentSlipPreview');
                            const removeButton = document.getElementById('removeImageButton');
                            preview.src = URL.createObjectURL(event.target.files[0]);
                            preview.style.display = 'block';
                            removeButton.style.display = 'inline-block';
                        }

                        function removeImage() {
                            const preview = document.getElementById('paymentSlipPreview');
                            const removeButton = document.getElementById('removeImageButton');
                            const fileInput = document.querySelector('input[name="payment_slip"]');
                            fileInput.value = ""; // Clear the file input
                            preview.style.display = 'none';
                            removeButton.style.display = 'none';
                        }

                        function togglePaymentFields() {
                            const paymentMethodSelect = document.querySelector('select[name="payment_method"]');
                            const paymentAccountNameField = document.getElementById('paymentAccountNameField');
                            const paymentSlipField = document.getElementById('paymentSlipField');
                            const paymentAccountNameInput = document.getElementById('paymentAccountNameInput');
                            const paymentSlipInput = document.getElementById('paymentSlipInput');

                            const isCOD = paymentMethodSelect.value === '0';

                            paymentAccountNameField.style.display = isCOD ? 'none' : 'block';
                            paymentSlipField.style.display = isCOD ? 'none' : 'block';

                            paymentAccountNameInput.required = !isCOD;
                            paymentSlipInput.required = !isCOD;
                        }

                        // Initialize toggle on page load in case of validation errors
                        document.addEventListener("DOMContentLoaded", togglePaymentFields);
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
            $currency = $cards->isNotEmpty() ? $cards->first()->country : 'usd'; // Default to 'usd' if cart is empty
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
                    <h5>
                        <a href="/products/{{ $card->product_variant->product->id }}/detail">
                            {{ $card->product_variant->product->name }} ({{ $card->product_variant->attribute_name }} - {{ $card->product_variant->attribute_value }})
                        </a>
                    </h5>
                    <!-- Final Price (after discount) -->
                    <p>QTY: {{ $card->qty }} | SubTotal: {{ number_format($subtotal, 2) }}
                        @if($card->country == "myanmar")
                            Ks
                        @elseif($card->country == "korea")
                            ₩
                        @else
                            $
                        @endif
                    </p>
                </div>
            </div>
        @endforeach

        <table>
            <tbody>
                <tr class="total">
                    <td style="font-size:20px !important;">Total</td>
                    <td class="price">
                        {{ number_format($totalPrice, 2) }}
                        @if($currency == "myanmar")
                            Ks
                        @elseif($currency == "korea")
                            ₩
                        @else
                            $
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

        <p class="text">
            Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our
            <a href="javascript:void(0);">privacy policy.</a>
        </p>

        <div class="form-group">
            <div class="custom-control custom-checkbox d-flex m-b15">
                <input required type="checkbox" class="form-check-input" id="basic_checkbox_3">
                <label class="form-check-label" for="basic_checkbox_3">I have read and agree to the website terms and conditions</label>
            </div>
        </div>

        @php
            $cardCount = auth()->check()
                ? App\Models\Card::where('user_id', auth()->id())->with('product_variant')->count()
                : App\Models\Card::where('session_id', session()->getId())->with('product_variant')->count();
        @endphp

        @if($cardCount > 0)
            <button type="submit" class="btn btn-secondary w-100">ORDER NOW</button>
        @else
            <a href="/products" class="btn btn-secondary w-100">ADD TO CART FIRST</a>
        @endif
    </div>
</div>

                </form>
            </div>
        </div>
    </div>

    <!-- Icon Box Start -->
    @include("web.product_footer")
    <!-- Icon Box End -->

</div>
@endsection
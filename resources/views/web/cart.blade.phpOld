@extends('web.master')
@section('body')
<style>
@media (max-width: 768px) {
    .product-item-name a {
        font-size: 0.9rem;
    }

    .product-item-quantity input {
        max-width: 50px;
    }
}
</style>
<div class="page-content">



    <!-- contact area -->
    <section class="content-inner shop-account">
        <!-- Product -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="table-responsive">
                        <table class="table check-tbl">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th class="d-none d-md-table-cell"></th> <!-- Hidden on smaller screens -->
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th class="d-none d-md-table-cell">Subtotal</th> <!-- Hidden on smaller screens -->
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $cards = auth()->check()
                                ? App\Models\Card::where('user_id', auth()->id())->with('product_variant')->get()
                                : App\Models\Card::where('session_id',
                                session()->getId())->with('product_variant')->get();
                                $totalPrice = 0; // Initialize total price
                                @endphp
                                @foreach($cards as $card)
                                @php
                                $variantProductPrice = $card->product_variant->price;
                                $variantProductPriceOrg = $card->product_variant->price;
                                $vDiscountType = $card->product_variant->discount_type;
                                $vDiscountAmount = $card->product_variant->discount_amount;

                                if ($vDiscountType == 0) {
                                $finalPrice = $variantProductPrice;
                                } elseif ($vDiscountType == 1) {
                                $finalPrice = $variantProductPrice - $vDiscountAmount;
                                } elseif ($vDiscountType == 2) {
                                $finalPrice = $variantProductPrice - ($variantProductPrice * ($vDiscountAmount / 100));
                                }
                                $subtotal = $finalPrice * $card->qty;
                                $totalPrice += $subtotal;
                                @endphp
                                <tr>
                                    <td class="product-item-img">
                                        <!-- Product name for small screens -->
                                        <div class="product-item-name d-block d-md-none mb-2">
                                            <a href="/products/{{ $card->product_variant->product->id }}/detail">
                                                {{ $card->product_variant->product->name }}
                                            </a>
                                        </div>
                                        <!-- Product image -->
                                        <img src="{{ asset($card->product_variant->image) }}" alt="/" class="img-fluid">
                                    </td>
                                    <td class="product-item-name d-none d-md-table-cell">
                                        <!-- Original product name position, hidden on small screens -->
                                        <a href="/products/{{ $card->product_variant->product->id }}/detail">
                                            {{ $card->product_variant->product->name }} (   {{ $card->product_variant->attribute_name	 }} - {{ $card->product_variant->attribute_value }} )
                                        </a>
                                    </td>
                                    <td class="product-item-price">
                                        @if ($vDiscountType == 0)
                                        {{ number_format($variantProductPrice, 2) }} $
                                        @else
                                        <del>{{ number_format($variantProductPriceOrg, 2) }}</del>
                                        {{ number_format($finalPrice, 2) }} $
                                        @endif
                                    </td>
                                    <td class="product-item-quantity">
                                        <div class="quantity btn-quantity style-1 me-3 d-flex align-items-center">
                                            <form action="{{ route('cart.update', $card->id) }}" method="POST"
                                                class="me-2">
                                                @csrf
                                                <input type="hidden" name="action" value="sub">
                                                <button type="submit" class="btn btn-sm btn-secondary">-</button>
                                            </form>
                                            <input id="demo_vertical7" type="text" value="{{ $card->qty }}" readonly
                                                class="form-control" style="display: block;">
                                            <form action="{{ route('cart.update', $card->id) }}" method="POST"
                                                class="ms-2">
                                                @csrf
                                                <input type="hidden" name="action" value="add">
                                                <button type="submit" class="btn btn-sm btn-secondary">+</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="product-item-totle d-none d-md-table-cell">
                                        {{ number_format($subtotal, 2) }} $
                                    </td>
                                    <td class="product-item-close">
                                        <form action="/cart/remove/{{$card->id}}" method="POST"
                                            style="display:inline-block !important;">
                                            @csrf
                                            <input type="hidden" value="{{$card->id}}" name="id">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="ti-close"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h4 class="title mb15">Cart Total</h4>
                    <div class="cart-detail">
                        <div class="icon-bx-wraper style-4 m-b30">
                            <div class="icon-bx">
                                <img src="{{asset('web/images/shop/shop-cart/icon-box/pic2.png')}}" alt="/">
                            </div>
                            <div class="icon-content">
                                <h6 class="dz-title">Enjoy The Product</h6>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                            </div>
                        </div>
                        <table>
                            <tbody>
                                <tr class="total">
                                    <td>
                                        <h6 class="mb-0">Total</h6>
                                    </td>
                                    <td class="price">{{ number_format($totalPrice, 2) }} $</td>
                                </tr>
                                <tr class="total">
                                    <td>
                                        
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @php
                        $cards = auth()->check()
                        ? App\Models\Card::where('user_id', auth()->id())->with('product_variant')->count()
                        : App\Models\Card::where('session_id',
                        session()->getId())->with('product_variant')->count();
                        @endphp
                        @if($cards > 0 )
                        <a href="/checkout" class="btn btn-secondary w-100">PLACE ORDER</a>
                        @else
                        <a href="/products" class="btn btn-secondary w-100">ADD TO CART FIRST</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <!-- Product END -->
    </section>
    <!-- contact area End-->

    <!-- Icon Box Start -->
    @include("web.product_footer")
    <!-- Icon Box End -->

</div>
@endsection
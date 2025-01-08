<?php
$user_id = Auth::id();
$cart = App\Models\Card::where("user_id",$user_id)->count();
?>
<style>
.clear-btn,
.checkout-btn {
    display: inline-block !important;
    background-color: gold;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
    margin: 10px 20px;
}

.clear-btn:hover,
.checkout-btn:hover {
    background-color: darkgold;
}

.checkout-btn a {
    color: white;
    text-decoration: none;
}

.cart-link .checkout-btn {
    display: block;
    text-align: center;
}
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">

@php 
        $logo = App\Models\GeneralSetting::where("name","logo")->first();
@endphp
<div class="fixed-header">
    <div class="header">
        <div class="container">
            <div class="left">
                <i class="ico menu_ico"></i>
                <h1 class="logo">
                    <a href="/" title="POECURRENCY">
                        <img class="pc_img"
                            src="{{ asset('images/general_settings/' . $logo->value) }}">
                        <img style="display: none;" src="{{ asset('images/general_settings/' . $logo->value) }}" alt="poecurrency.com">
                     
                        <!-- <img  class="mobile_img" src="{{ asset('logo_mobile.png') }}" alt="poecurrency.com"> -->
                    </a>
                </h1>
                <!-- <div class="search common_search">
                    <form action>
                        <div class="input-box">
                            <em class="ico search_ico"></em>
                            <input type="text" class="searchInput" placeholder="POE Currency"
                                data-url="poe-currency.html">
                            <i class="ico"></i>
                        </div>
                    </form>
                    <div class="search-key">
                        <p>Hot Searches</p>
                        <div></div>
                    </div>
                </div>
                <div class="search-modal"></div> -->
            </div>
            <div class="right">
                <ul>
                    @guest
                    <li class="account">
                        <a href="/login" class="login-btn">LOG IN</a>
                        <a href="/register" class="sign-btn">SIGN UP</a>
                    </li>
                    <li class="mobile_account">
                        <a title="Login" href="/login"><i class="ico"></i></a>
                    </li>
                    @endguest
                    @auth
                    <li class="account">
                        <a href="" class="login-btn"></a>
                        <a href="/dashboard" class="sign-btn">Account</a>

                    </li>
                    <li class="mobile_account">
                        <a title="Account" href="/dashboard"><i class="ico"></i></a>
                    </li>
                    @endauth
                    @auth
                    <li class="mobile_cart">
                        <a title="cart" href="javascript:;"><i class="ico"></i><span class="cart-num shopCount">
                                <?php
                                echo $cart;
                            ?>
                            </span></a>
                    </li>
                    @endauth

                    @guest 
                    <?php
                    $session_id = session()->getId();
                    $cart = App\Models\Card::where("session_id",$session_id)->count();
                    ?>
                    <li class="mobile_cart">
                        <a title="cart" href="javascript:;"><i class="ico"></i><span class="cart-num shopCount">
                                <?php
                                echo $cart;
                            ?>
                            </span></a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
    <div class="nav">
        <div class="container">
            <ul class="nav-help-menu">
                <li>
                    <a href="/">
                        Home
                    </a>
                </li>
                <li>
                    @php
                    $category = App\Models\ProductCategory::orderBy("id","asc")->first();
                    @endphp
                    <a href="/category/{{$category->id}}">
                        <span>Products</span>
                    </a>
                </li>
                <li>
                    <a href="/sell-to-us">
                        <span>Sell To Us</span>
                    </a>
                </li>
                <li>
                    <a href="/faq">
                        <span>FAQ</span>
                    </a>
                </li>
                <li>
                    <a href="/member">
                        <span>Member Discount</span>
                    </a>
                </li>
                <li>
                    <a href="/contact-us">
                        <span>Contact Us</span>
                    </a>
                </li>
                <li>
                    <a href="/customer_feedback">
                        Customer Feedback</a>
                </li>
            </ul>
            <ul>
                <li class="cart">
                    @auth
                    <a href="javascript:;">
                        <i class="ico"></i>
                        <p>CART</p>
                        <span class="cart_num shopCount">
                            @php
                            echo $cart;
                            @endphp</span>
                    </a>
                    <div class="cart-link">
                        <div class="mobile__cart--title"><span>Shopping Cart (<i class="item-num shopCount">
                                    @php
                                    echo $cart;
                                    @endphp
                                </i>)</span><i class="ico close_ico"></i></div>

                        <ul class="common_cart_list" style="display:block !important;">
                            @php
                            $user_id = Auth::id();
                            $carts = App\Models\Card::where('user_id', $user_id)->get();
                            $total_price = 0;
                            @endphp

                            @if($carts->count() >= 1)
                            @foreach($carts as $cart)
                            @php
                            $product = App\Models\Product::find($cart->product_id);
                            $total_price += ($product->price * $cart->qty);
                            @endphp
                            <li class="cart-item goods_li" style="display:block !important;">
                                <div class="cartImages">
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                </div>
                                <div>

                                    <h4 style="color:black !important">Name : {{ $product->name }} </h4>
                                    <h4 style="color:black !important">Qty : {{ $cart->qty }} </h4>
                                    <h4 style="color:black !important">Price : {{ $product->price *  $cart->qty }} $
                                    </h4>
                                    <!-- <div class="shop-num">

                                        <span class="sub"><i class="ico"></i></span>
                                        <input class="number-input" type="text" value="{{ $cart->qty }}"
                                            max="{{ $product->stock }}" data-num="{{ $cart->qty }}" readonly>
                                        <span class="add"><i class="ico"></i></span>
                                    </div> -->

                                    <form action="/cart/remove/{{ $cart->id }}" style="display:inline-block !important;"
                                        method="post">
                                        @csrf
                                        <button type="submit" style="display:inline-block !important;"><i
                                                class="ico delete"></i></button>
                                    </form>
                                </div>

                                <div class="delete-tips">item deleted</div>
                            </li>
                            @endforeach
                            <div style="display:block !important">
                                <div>
                                    <span style="color:black !important;font-size:24px !important"> &nbsp; &nbsp;
                                        Total: {{ $total_price }} $ <br> &nbsp; &nbsp;
                                        <!-- <span
                                            class="item-num shopCount">{{ $carts->count() }}</span>
                                        item<em>{{ $carts->count() > 1 ? 's' : '' }}</em> -->
                                    </span>
                                </div>
                            </div>
                            <div
                                style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                <form action="{{ route('cart.clearAll') }}" method="post" style="display: inline;">
                                    @csrf
                                    @auth 
                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                    @endauth 
                                    @guest 
                                    <input type="hidden" name="session_id" value="{{ session()->getId() }}">
                                    @endguest
                                    <button type="submit" onclick="return confirm('Are You Sure To Delete Cart?')"
                                        class="clear-btn hover-btn"
                                        style="background-color: gold; color: white; padding: 10px 20px; border: none; cursor: pointer;">
                                        CLEAR ALL
                                    </button>
                                </form>

                                <button class="checkout-btn"
                                    style="background-color: gold; color: white; padding: 10px 20px; border: none; cursor: pointer;margin-top:15px !important">
                                    <a href="/checkout" style="color: white; text-decoration: none;">CHECKOUT</a>
                                </button>
                            </div>

                            @endif
                        </ul>

                        @php
                        $user_id = Auth::id();

                        $cart = App\Models\Card::where("user_id",$user_id)->count();
                        if($cart == 0){
                        @endphp
                        <p style="text-align:center !important">
                            Your Cart Is Empty
                        </p>
                        <!-- <div class="noCart">
                        </div> -->
                        @php
                        }
                        @endphp


                    </div>
                    @endauth
                    @guest 
                    <?php
                        $session_id = session()->getId();
                        $cart = App\Models\Card::where("session_id",$session_id)->count();
                        ?>
                    <a href="javascript:;">
                        <i class="ico"></i>
                        <p>CART</p>
                        <span class="cart_num shopCount">
                            @php
                            echo $cart;
                            @endphp</span>
                    </a>
                    <div class="cart-link">
                        <div class="mobile__cart--title"><span>Shopping Cart (<i class="item-num shopCount">
                                    @php
                                    echo $cart;
                                    @endphp
                                </i>)</span><i class="ico close_ico"></i></div>

                        <ul class="common_cart_list" style="display:block !important;">
                            @php
                            $session_id = session()->getId();
                            $carts = App\Models\Card::where('session_id', $session_id)->get();
                            $total_price = 0;
                            @endphp

                            @if($carts->count() >= 1)
                            @foreach($carts as $cart)
                            @php
                            $product = App\Models\Product::find($cart->product_id);
                            $total_price += ($product->price * $cart->qty);
                            @endphp
                            <li class="cart-item goods_li" style="display:block !important;">
                                <div class="cartImages">
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                </div>
                                <div>

                                    <h4 style="color:black !important">Name : {{ $product->name }} </h4>
                                    <h4 style="color:black !important">Qty : {{ $cart->qty }} </h4>
                                    <h4 style="color:black !important">Price : {{ $product->price *  $cart->qty }} $
                                    </h4>
                                    <!-- <div class="shop-num">

                                        <span class="sub"><i class="ico"></i></span>
                                        <input class="number-input" type="text" value="{{ $cart->qty }}"
                                            max="{{ $product->stock }}" data-num="{{ $cart->qty }}" readonly>
                                        <span class="add"><i class="ico"></i></span>
                                    </div> -->

                                    <form action="/cart/remove/{{ $cart->id }}" style="display:inline-block !important;"
                                        method="post">
                                        @csrf
                                        <button type="submit" style="display:inline-block !important;"><i
                                                class="ico delete"></i></button>
                                    </form>
                                </div>

                                <div class="delete-tips">item deleted</div>
                            </li>
                            @endforeach
                            <div style="display:block !important">
                                <div>
                                    <span style="color:black !important;font-size:24px !important"> &nbsp; &nbsp;
                                        Total: {{ $total_price }} $ <br> &nbsp; &nbsp;
                                        <!-- <span
                                            class="item-num shopCount">{{ $carts->count() }}</span>
                                        item<em>{{ $carts->count() > 1 ? 's' : '' }}</em> -->
                                    </span>
                                </div>
                            </div>
                            <div
                                style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                <form action="{{ route('cart.clearAll') }}" method="post" style="display: inline;">
                                    @csrf
                                    @auth 
                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                    @endauth 
                                    @guest 
                                    <input type="hidden" name="session_id" value="{{ session()->getId() }}">
                                    @endguest
                                    <button type="submit" onclick="return confirm('Are You Sure To Delete Cart?')"
                                        class="clear-btn hover-btn"
                                        style="background-color: gold; color: white; padding: 10px 20px; border: none; cursor: pointer;">
                                        CLEAR ALL
                                    </button>
                                </form>

                                <button class="checkout-btn"
                                    style="background-color: gold; color: white; padding: 10px 20px; border: none; cursor: pointer;margin-top:15px !important">
                                    <a href="/checkout" style="color: white; text-decoration: none;">CHECKOUT</a>
                                </button>
                            </div>

                            @endif
                        </ul>
         
                        @php
                        $session_id = session()->getId();

                        $cart = App\Models\Card::where("session_id",$session_id)->count();
                        if($cart == 0){
                        @endphp
                        <p style="text-align:center !important">
                            Your Cart Is Empty
                        </p>
                        <!-- <div class="noCart">
                        </div> -->
                        @php
                        }
                        @endphp
        



                    </div>
                    @endguest
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="slide_modal"></div>
<div class="slide_menu">
    <div class="close"><i class="ico"></i></div>
    <div class="menu-content">
        <div class="search-modal"></div>
        <div class="menu-search common_search">
            <!-- <i class="ico search_ico"></i>
            <input type="text" class="searchInput" placeholder="POE Currency" data-url="poe-currency.html">
            <div class="search-key">
                <h2>Hot Searches</h2>
                <div></div>
            </div> -->
        </div>
        <div class="menu-nav">
       
            <h2>CATEGORIES</h2>
            
            <ul>
                @php
                $categories = App\Models\ProductCategory::get();
                @endphp
                @foreach($categories as $category)
                <li><a href="/category/{{$category->id}}">{{$category->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="account">
            <ul>
                <li class="sign">
                    <p>
                        <i class="ico"></i>
                        <a href="/login">Sign in</a><span>/</span>
                        <a href="/register">Register</a>
                    </p>
                </li>
            </ul>
        </div>
        <div class="introduction">
            <ul>
                <li class><a href="/">Home</a></li>

                <li>
                    <a href="/faq">
                        FAQ</a>
                </li>

                <li>
                    <a href="/member">
                        Member Discount </a>
                </li>
                <li>
                    <a href="/contact-us">
                        Contact Us</a>
                </li>
                <li>
                    <a href="/customer_feedback">
                        Customer Feedback</a>
                </li>

            </ul>
        </div>
    </div>
</div>

<script type="text/html" id="headerCart">
</script>

<script>
// document.addEventListener('DOMContentLoaded', function() {
//     const addButtons = document.querySelectorAll('.add');
//     const subButtons = document.querySelectorAll('.sub');

//     addButtons.forEach(button => {
//         button.addEventListener('click', function() {
//             const input = this.previousElementSibling;
//             let currentQty = parseInt(input.value);
//             let maxQty = parseInt(input.getAttribute('max'));

//             if (currentQty < maxQty) {
//                 input.value = currentQty + 1;
//                 updateCart(input.getAttribute('data-id'), currentQty + 1);
//             } else {
//                 console.log('Maximum quantity reached');
//             }
//         });
//     });

//     subButtons.forEach(button => {
//         button.addEventListener('click', function() {
//             const input = this.nextElementSibling;
//             let currentQty = parseInt(input.value);

//             if (currentQty > 1) {
//                 input.value = currentQty - 1;
//                 updateCart(input.getAttribute('data-id'), currentQty - 1);
//             } else {
//                 console.log('Minimum quantity is 1');
//             }
//         });
//     });

//     function updateCart(cartId, newQty) {
//         fetch(`/cart/update/${cartId}`, {
//                 method: 'POST',
//                 headers: {
//                     'Content-Type': 'application/json',
//                     'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
//                         'content')
//                 },
//                 body: JSON.stringify({
//                     quantity: newQty
//                 })
//             })
//             .then(response => response.json())
//             .then(data => {
//                 if (data.status === 'success') {
//                     console.log('Cart updated successfully:', data);
//                     // Optionally, update subtotal or total amounts here
//                 } else {
//                     console.error('Cart update failed:', data);
//                 }
//             })
//             .catch(error => {
//                 console.error('Fetch error:', error);
//             });
//     }
// });
</script>
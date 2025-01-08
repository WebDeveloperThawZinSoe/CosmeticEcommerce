@php
$logo = App\Models\GeneralSetting::where("name","logo")->first();
$generalSettings = App\Models\GeneralSetting::whereIn('name', [
'about_us', 'how_to_sell_us', 'phone_number_1', 'phone_number_2', 'phone_number_3',
'email_1', 'email_2', 'email_3', 'facebook', 'telegram', 'discord' , 'viber' , 'skype'
])->pluck('value', 'name');
@endphp
<header class="site-header mo-left header style-2">
    <!-- Main Header -->
    <div class="header-info-bar">
        <div class="container clearfix">
            <!-- Website Logo -->
            <div class="logo-header logo-dark">
                <a href="/"><img src="{{ asset('images/general_settings/' . $logo->value) }}" alt="logo"></a>
            </div>

            <!-- EXTRA NAV -->
            <div class="extra-nav d-md-flex d-none">
                <div class="extra-cell">
                    <ul class="navbar-nav header-right">
                    @php
                    $logo = App\Models\GeneralSetting::where("name","logo")->first();
                    $generalSettings = App\Models\GeneralSetting::whereIn('name', [
                    'about_us', 'how_to_sell_us', 'phone_number_1', 'phone_number_2', 'phone_number_3',
                    'email_1', 'email_2', 'email_3', 'facebook', 'telegram','address', 'discord' , 'viber' , 'skype'
                    ])->pluck('value', 'name');
                    @endphp
                    @if(isset($generalSettings['address']) && $generalSettings['address'] != null)
                        <li class="nav-item info-box pe-3 d-xl-flex d-none">
                            <div class="nav-link">
                                <div class="dz-icon">
                                    <i class="flaticon flaticon-house"></i>
                                </div>
                                <div class="info-content">
                                    <span style="color:black">Address</span>
                                    <h6 class="title mb-0">{{$generalSettings['address']}}</h6>
                                </div>
                            </div>
                        </li>
                    @endif
                    @if(isset($generalSettings['phone_number_1']) && $generalSettings['phone_number_1'] != null)            
                        <li class="nav-item info-box ">
                            <div class="nav-link">
                                <div class="dz-icon">
                                    <i class="flaticon flaticon-call-center"></i>
                                </div>
                                <div class="info-content">
                                    <span style="color:black">24/7 SUPPORT</span>
                                    <h6 class="title mb-0">{{ $generalSettings['phone_number_1']}}</h6>
                                </div>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>

            <!-- header search nav -->
            <div class="header-search-nav">
                <form action="{{ route('search') }}" method="POST" class="header-item-search d-flex mb-4">
                    @csrf
                    <div class="input-group search-input">
                        <input type="text" name="query" class="form-control" placeholder="Search for products"
                            value="{{ request('query') }}">
                        <button class="btn" type="submit">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="10.0535" cy="10.5399" r="7.49047" stroke="#0D775E" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M15.2632 16.1387L18.1999 19.0677" stroke="#0D775E" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- Main Header End -->

    <!-- Main Header -->
    <div class="sticky-header main-bar-wraper navbar-expand-lg">
        <div class="main-bar dark clearfix">
            <div class="container clearfix">
                <!-- Website Logo -->
                <!-- <div class="logo-header logo-dark">
                    <a href="index.html"><img src="{{ asset('images/general_settings/' . $logo->value) }}" alt="logo"></a>
                </div> -->

                <!-- Nav Toggle Button -->
                <button class="navbar-toggler collapsed navicon justify-content-end" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <!-- EXTRA NAV -->
                <div class="extra-nav">
                    <div class="extra-cell">
                        <ul class="header-right">
                            <li class="nav-item login-link">
                                @auth
                                @if(Auth::user()->role == 1 || Auth::user()->role == 3)
                                <a class="nav-link" href="/admin/dashboard">
                                    ACCOUNT
                                </a>
                                @else
                                <a class="nav-link" href="/dashboard">
                                    ACCOUNT
                                </a>
                                @endif
                                @endauth
                                @guest
                                <a class="nav-link" style="display:inline !important" href="/login">
                                    LOGIN </a> / <a style="display:inline !important" class="nav-link" href="/register">
                                    REGISTER </a>

                                @endguest
                            </li>


                            <li class="nav-item cart-link">
                                <a href="javascript:void(0);" class="nav-link cart-btn" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M1.08374 2.61947C1.08374 2.27429 1.36356 1.99447 1.70874 1.99447H3.29314C3.91727 1.99447 4.4722 2.39163 4.67352 2.98239L5.06379 4.1276H15.4584C17.6446 4.1276 19.4168 5.89981 19.4168 8.08593V11.5379C19.4168 13.7241 17.6446 15.4963 15.4584 15.4963H9.22182C7.30561 15.4963 5.66457 14.1237 5.32583 12.2377L4.00967 4.90953L3.49034 3.3856C3.46158 3.30121 3.3823 3.24447 3.29314 3.24447H1.70874C1.36356 3.24447 1.08374 2.96465 1.08374 2.61947ZM5.36374 5.3776L6.55614 12.0167C6.78791 13.3072 7.91073 14.2463 9.22182 14.2463H15.4584C16.9542 14.2463 18.1668 13.0337 18.1668 11.5379V8.08593C18.1668 6.59016 16.9542 5.3776 15.4584 5.3776H5.36374Z"
                                            fill="var(--white)" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.16479 17.8278C8.16479 17.1374 8.72444 16.5778 9.4148 16.5778H9.42313C10.1135 16.5778 10.6731 17.1374 10.6731 17.8278C10.6731 18.5182 10.1135 19.0778 9.42313 19.0778H9.4148C8.72444 19.0778 8.16479 18.5182 8.16479 17.8278Z"
                                            fill="var(--white)" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M14.8315 17.8278C14.8315 17.1374 15.3912 16.5778 16.0815 16.5778H16.0899C16.7802 16.5778 17.3399 17.1374 17.3399 17.8278C17.3399 18.5182 16.7802 19.0778 16.0899 19.0778H16.0815C15.3912 19.0778 14.8315 18.5182 14.8315 17.8278Z"
                                            fill="var(--white)" />
                                    </svg>
                                    <span class="badge badge-circle">
                                        @auth
                                        @php
                                        // For authenticated users, count based on user_id
                                        echo App\Models\Card::where('user_id', auth()->id())->count();
                                        @endphp
                                        @endauth

                                        @guest
                                        @php
                                        // For guests, count based on session_id
                                        echo App\Models\Card::where('session_id', session()->getId())->count();
                                        @endphp
                                        @endguest
                                    </span>

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Main Nav -->
                <div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown">
                    <div class="logo-header">
                        <a href="/"><img src="{{ asset('images/general_settings/' . $logo->value) }}" alt=""></a>
                    </div>
                    <div class="browse-category-menu">
                        <a href="javascript:void(0);" class="category-btn">
                            <svg class="me-3" width="21" height="13" viewBox="0 0 21 13" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.248047" y="12" width="20" height="1" fill="white" />
                                <rect x="0.248047" width="20" height="1" fill="white" />
                                <rect x="0.248047" y="6" width="20" height="1" fill="white" />
                            </svg>
                            <span class="category-btn-title">
                                Browse Categories
                            </span>
                            <span class="toggle-arrow ms-auto">
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.24805 9L12.248 15L18.248 9" stroke="white" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                        <div class="category-menu-items" style="display: none;">
                            <ul class="nav navbar-nav">
                                @php
                                $categories = App\Models\ProductCategory::orderBy("id","asc")->get();
                                @endphp
                                @foreach($categories as $category)
                                <li class="cate-drop">
                                    <a href="/products/category/{{$category->id}}">
                                        <svg class="me-3" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_190_182)">
                                                <path
                                                    d="M9.64305 2.11035L9.06095 2.76886L14.1811 7.2949H0.748047V8.17381H14.1811L9.06095 12.6999L9.64305 13.3584L15.748 7.96173V7.50698L9.64305 2.11035Z"
                                                    fill="#0D775E" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_190_14822">
                                                    <rect width="15" height="15" fill="white"
                                                        transform="translate(0.748047 0.234375)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <span>{{ $category->name }}</span>
                                        <?php 
                                            $sub_categories = App\Models\SubCategory::where("category_id",$category->id)->orderBy("id","asc")->count();
                                            if($sub_categories > 0){
                                                ?>
                                        <span class="menu-icon">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 12L10 8L6 4" stroke="#24262B" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                        <?php
                                            }
                                        ?>

                                    </a>
                                    <?php 
                                            $sub_categories = App\Models\SubCategory::where("category_id",$category->id)->orderBy("id","asc")->count();
                                            if($sub_categories > 0){
                                                ?>
                                    <ul class="sub-menu">
                                        <?php 
                                            $sub_categories = App\Models\SubCategory::where("category_id",$category->id)->orderBy("id","asc")->get();
                                        ?>
                                        @foreach($sub_categories as $sub_category)
                                        <li><a href="/products/category/{{$sub_category->id}}">{{$sub_category->name}}</a>
                                        </li>
                                        @endforeach


                                    </ul>
                                    <?php
                                            }
                                        ?>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <ul class="nav navbar-nav dark-nav">
                        <li><a href="/">Home</a></li>
                        <li><a href="/products">Products</a></li>
                      
                        <li><a href="/brands">Brands</a></li>
                        <li><a href="/faq">FAQ</a></li>
                        <li><a href="/order_track">Track</a></li>
                        <li><a href="/contact-us">Contact</a></li>
                    </ul>
                    <div class="dz-social-icon">
                        <ul>
                            @if($facebook = $generalSettings->get('facebook'))
                            <li><a class="fab fa-facebook-f" target="_blank" href="{{$facebook}}"></a></li>
                            @endif
                            @if($twitter = $generalSettings->get('twitter'))
                            <li><a class="fab fa-twitter" target="_blank" href="/{{$twitter}}"></a></li>
                            @endif
                            @if($linkedin = $generalSettings->get('linkedin'))
                            <li><a class="fab fa-linkedin-in" target="_blank" href="/{{$linkedin}}"></a></li>
                            @endif
                            @if($instagram = $generalSettings->get('instagram'))
                            <li><a class="fab fa-instagram" target="_blank" href="/{{$instagram}}"></a></li>
                            @endif
                            @if($viber = $generalSettings->get('viber'))
                            <li><a class="fab fa-viber" target="_blank" href="/{{$viber}}"></a></li>
                            @endif
                            @if($telegram = $generalSettings->get('telegram'))
                            <li><a class="fab fa-telegram" target="_blank" href="/{{$telegram}}"></a></li>
                            @endif
                            @if($discord = $generalSettings->get('discord'))
                            <li><a class="fab fa-discord" target="_blank" href="/{{$discord}}"></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Header End -->



    <!-- Sidebar cart -->
    <div class="offcanvas dz-offcanvas offcanvas offcanvas-end " tabindex="-1" id="offcanvasRight">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
            &times;
        </button>
        <div class="offcanvas-body">
            <div class="product-description">
                <div class="dz-tabs">
                    <ul class="nav nav-tabs center" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="shopping-cart" data-bs-toggle="tab"
                                data-bs-target="#shopping-cart-pane" type="button" role="tab"
                                aria-controls="shopping-cart-pane" aria-selected="true">Shopping Cart 
                                <span class="badge badge-light"> @auth
                                    @php
                                    // For authenticated users, count based on user_id
                                    echo App\Models\Card::where('user_id', auth()->id())->count();
                                    @endphp
                                    @endauth

                                    @guest
                                    @php
                                    // For guests, count based on session_id
                                    echo App\Models\Card::where('session_id', session()->getId())->count();
                                    @endphp
                                    @endguest
                                </span>
                            </button>
                        </li>

                    </ul>
                    <div class="tab-content pt-4" id="dz-shopcart-sidebar">
                        <div class="tab-pane fade show active" id="shopping-cart-pane" role="tabpanel"
                            aria-labelledby="shopping-cart" tabindex="0">
                            <div class="shop-sidebar-cart">
                                <ul class="sidebar-cart-list">
                                    @php
                                    $cards = auth()->check()
                                    ? App\Models\Card::where('user_id', auth()->id())->with('product_variant')->get()
                                    : App\Models\Card::where('session_id',
                                    session()->getId())->with('product_variant')->get();
                                    $totalPrice = 0; // Initialize total price
                                    @endphp
                                    @foreach($cards as $card)
                                    <li>
                                        <div class="cart-widget">
                                            <div class="dz-media me-3">
                                                <img src="{{ asset($card->product_variant->image) }}" alt="">
                                            </div>
                                            <div class="cart-content">
                                                <h6 class="title"><a
                                                        href="/products/{{ $card->product_variant->product->id }}/detail">{{ $card->product_variant->product->name }}  (   {{ $card->product_variant->attribute_name	 }} - {{ $card->product_variant->attribute_value }} )</a>
                                                </h6>
                                                <div class="d-flex align-items-ceneter">
                                                    <div class="btn-quantity  light quantity-sm me-3">
                                                        QTY: {{ $card->qty }}
                                                    </div>
                                                    <h6 class="dz-price text-primary mb-0">
                                                        @php
                                                        $variantProductPrice = $card->product_variant->price;
                                                        $variantProductPriceOrg = $card->product_variant->price;
                                                        $vDiscountType = $card->product_variant->discount_type;
                                                        $vDiscountAmount = $card->product_variant->discount_amount;

                                                        if ($vDiscountType == 0) {
                                                        $variantProductPrice = $variantProductPrice;
                                                        echo $variantProductPrice . " $";
                                                        } elseif ($vDiscountType == 1) {
                                                        $variantProductPrice = $variantProductPrice - $vDiscountAmount;
                                                        echo "<del>$variantProductPriceOrg</del> $variantProductPrice
                                                        $";
                                                        } elseif ($vDiscountType == 2) {
                                                        $variantProductPrice = $variantProductPrice -
                                                        ($variantProductPrice * ($vDiscountAmount / 100));
                                                        echo "<del>$variantProductPriceOrg</del> $variantProductPrice
                                                        $";
                                                        }
                                                        $totalPrice += $variantProductPrice * $card->qty;
                                                        @endphp
                                                    </h6>
                                                </div>
                                            </div>
                                            <form action="/cart/remove/{{$card->id}}" method="POST"
                                                style="display:inline-block !important;">
                                                @csrf
                                                <input type="hidden" value="{{$card->id}}" name="id">
                                                <button type="submit" class="btn btn-primary btn-sm"
                                                    style="width:60% !important;">
                                                    <i class="ti-close"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>

                                <div class="cart-total">
                                    <h5 class="mb-0">Subtotal:</h5>
                                    @php 
                                    $cards = auth()->check()
                                    ? App\Models\Card::where('user_id', auth()->id())->with('product_variant')->get()
                                    : App\Models\Card::where('session_id',
                                    session()->getId())->with('product_variant')->get();

                                   

                                    $card = auth()->check()
                                    ? App\Models\Card::where('user_id', auth()->id())->with('product_variant')->first()
                                    : App\Models\Card::where('session_id',
                                    session()->getId())->with('product_variant')->first();
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
                                        <h5 class="mb-0">{{ number_format($original_price, 2) }} $</h5>
                                    @else 
                                    
                                        
                                        <h5 class="mb-0"><del>{{ number_format($original_price, 2) }}</del> $
                                        <br>
                                        {{ number_format($after_discount_price, 2) }} $
                                       
                                        </h5>
                                  
                                  
                                    @endif
         
                                    <!-- Display the total price -->
                                </div>
                                @if($cupon_code !=  null)
                                    <p>  Cupon Code : {{$cupon_code_info->cupon_code}}</p> 
                                        <br><br> 
                                    @endif 
                                <div class="mt-auto">

                                    <a href="/checkout" class="btn btn-light btn-block m-b20">Checkout</a>
                                    <a href="/cart" class="btn btn-secondary btn-block">View Cart</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sidebar cart -->
</header>
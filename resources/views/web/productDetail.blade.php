@extends('web.master')
@section('body')

<style>
.variant-buttons .variant-option {
    padding: 10px 20px;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.2s ease;
}

.variant-option.active {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
}

.variant-group {
    margin-bottom: 10px;
}
</style>
<div class="page-content">

    <div class="d-sm-flex justify-content-between container-fluid py-3">
        <nav aria-label="breadcrumb" class="breadcrumb-row">
            <ul class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/"> Home</a></li>
                <li class="breadcrumb-item"><a href="/products"> Products</a></li>
                <li class="breadcrumb-item">{{$detail_product->name}}</li>
            </ul>
        </nav>
    </div>

    <section class="content-inner py-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="dz-product-detail sticky-top">
                        <div class="swiper-btn-center-lr">
                            <div class="swiper product-gallery-swiper2">
                                <div class="swiper-wrapper" id="lightgallery">
                                    <!-- Main Image Display -->
                                    <div class="swiper-slide">
                                        <div class="dz-media DZoomImage">
                                            <a id="mainImageLink" data-lightbox="product-zoom"
                                                href="{{ asset($detail_product->image) }}">
                                                <!-- <i class="feather icon-maximize dz-maximize top-right"></i> -->
                                            </a>
                                            <!-- Main Image -->
                                            <img id="mainImage" src="{{ asset($detail_product->image) }}" alt="image">
                                        </div>
                                    </div>


                                    <!-- Other Images -->
                                    @if(!empty($detail_product->images))
                                    <div class="swiper-slide">
                                        <div class="dz-media DZoomImage">
                                            <a data-lightbox="product-zoom" href="{{ asset($detail_product->image) }}">
                                                <i class="feather icon-maximize dz-maximize top-right"></i>
                                            </a>
                                            <img src="{{ asset($detail_product->image) }}" alt="image">
                                        </div>
                                    </div>
                                    @foreach($detail_product->images as $image)
                                    <div class="swiper-slide">
                                        <div class="dz-media DZoomImage">
                                            <a data-lightbox="product-zoom" href="{{ asset($image) }}">
                                                <i class="feather icon-maximize dz-maximize top-right"></i>
                                            </a>
                                            <img src="{{ asset($image) }}" alt="image">
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>

                            <!-- Thumbnail Swiper -->
                            <div class="swiper product-gallery-swiper thumb-swiper-lg swiper-vertical">
                                <div class="swiper-wrapper">
                                    <!-- Thumbnail Images -->
                                    @if(!empty($detail_product->images))
                                    @foreach($detail_product->images as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($image) }}" alt="image"
                                            onclick="changeMainImage('{{ asset($image) }}')">
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                // JavaScript function to change the main image
                function changeMainImage(imageUrl) {
                    // Update the src of the main image
                    document.getElementById('mainImage').src = imageUrl;
                }
                </script>

                <div class="col-xl-6 col-md-6">
                    <div class="dz-product-detail style-2 p-t50">
                        <div class="dz-content">
                            <div class="dz-content-footer">
                                <div class="dz-content-start">
                                    @if($detail_product->discount_type != 0)
                                    <div class="product-tag">
                                        <span class="badge bg-purple mb-2">Sale |
                                            @if($detail_product->discount_type == 1)
                                            {{$detail_product->discount_amount}} @if($detail_product->country == "myanmar")
                                        Ks
                                        @elseif($detail_product->country == "korea")
                                        ₩
                                        @else
                                        $
                                        @endif OFF
                                            @elseif($detail_product->discount_type == 2)
                                            {{$detail_product->discount_amount}} % OFF
                                            @endif
                                        </span>
                                    </div>
                                    @endif
                                    @if($detail_product->pre_order == 1)
                                    <div class="product-tag">
                                        <span class="badge bg-purple mb-2">
                                            Pre Order
                                        </span>
                                    </div>
                                    @endif
                                    <h4 class="title mb-1"><a href="#">{{$detail_product->name}}</a></h4>
                                </div>
                            </div>
                            <p class="para-text">
                                @php
                                $description = strip_tags($detail_product->description);
                                $words = explode(' ', $description);
                                $wordCount = count($words);
                                $truncatedDescription = $wordCount > 100 ? implode(' ', array_slice($words, 0, 100)) .
                                '...' : $description;
                                @endphp
                                {!! $detail_product->short_description !!}
                            </p>
                            <div class="meta-content m-b20 d-flex align-items-end">
                                <div class="me-3">
                                    <label class="form-label">Price</label>
                                    <span id="product_country" style="display:none !important;">{{$detail_product->country}}</span>
                                    <span class="price-num" id="product-price">
                                        @if($detail_product->product_type == 1)
                                        @if($detail_product->discount_type == 0)
                                        {{$detail_product->price}} @if($detail_product->country == "myanmar")
                                        Ks
                                        @elseif($detail_product->country == "korea")
                                        ₩
                                        @else
                                        $
                                        @endif
                                        @elseif($detail_product->discount_type == 1)
                                        @php $discount_price = $detail_product->price -
                                        $detail_product->discount_amount; @endphp
                                        <del>{{$detail_product->price}}</del> {{$discount_price}} @if($detail_product->country
                                        == "myanmar")
                                        Ks
                                        @elseif($detail_product->country == "korea")
                                        ₩
                                        @else
                                        $
                                        @endif
                                        @elseif($detail_product->discount_type == 2)
                                        @php $discount_price = $detail_product->price - ( $detail_product->price *
                                        ($detail_product->discount_amount / 100 )); @endphp
                                        <del>{{$detail_product->price}}</del> {{$discount_price}} @if($detail_product->country
                                        == "myanmar")
                                        Ks
                                        @elseif($detail_product->country == "korea")
                                        ₩
                                        @else
                                        $
                                        @endif
                                        @endif
                                        @elseif($detail_product->product_type == 2)
                                        @php
                                        $minPrice = $detail_product->variants->min('price');
                                        $maxPrice = $detail_product->variants->max('price');
                                        echo $minPrice . " ~ " . $maxPrice ;
                                        @endphp
                                        @if($detail_product->country == "myanmar")
                                        Ks
                                        @elseif($detail_product->country == "korea")
                                        ₩
                                        @else
                                        $
                                        @endif
                                        @endif
                                    </span>
                                </div>
                            </div>

                            @if($detail_product->variants->count() > 0)
                            <div class="product-variants">
                                <label>Select Variant:</label>
                                <div class="variant-buttons d-flex flex-wrap gap-2">
                                    @php
                                    $groupedVariants = $detail_product->variants->groupBy('attribute_name');
                                    @endphp
                                    @foreach($groupedVariants as $attributeName => $variants)
                                    <div class="variant-group">
                                        <h5 class="variant-attribute-name">{{ $attributeName }}</h5>
                                        @foreach($variants as $variant)
                                        @if($variant->stock != 0 && $variant->status == 1)
                                        @php
                                        $varaint_product_price = $variant->price;
                                        $v_discount_type = $variant->discount_type;
                                        $v_discount_amount = $variant->discount_amount;
                                        if($v_discount_type == 0){
                                        $varaint_product_price = $varaint_product_price;
                                        }elseif($v_discount_type == 1){
                                        $varaint_product_price = $varaint_product_price - $v_discount_amount ;
                                        }elseif($v_discount_amount == 2){
                                        $varaint_product_price = $varaint_product_price - ( $v_discount_amount *
                                        ($v_discount_amount/100) ) ;
                                        }


                                        @endphp
                                        <label class="btn btn-outline-secondary variant-option"
                                            data-price="{{ $varaint_product_price }}"
                                            data-image="{{ asset($variant->image) }}">
                                            <input type="radio" name="product_variant" value="{{ $variant->id }}"
                                                class="d-none">
                                            {{ $variant->attribute_value ?? 'Default' }}
                                        </label>
                                        @endif
                                        @endforeach
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            <div class="product-num">
                                <div class="btn-quantity light d-xl-block">
                                    <label class="form-label">Quantity</label>
                                    <div class="quantity-control d-flex align-items-center">
                                        <button type="button" class="btn btn-default bootstrap-touchspin-down btn-sm"
                                            id="decrease-qty">-</button> &nbsp;
                                        <input type="text" value="1" min="1" name="qty" id="quantity"
                                            class="form-control-sm mx-2"> &nbsp;
                                        <button type="button" class="btn btn-default bootstrap-touchspin-down btn-sm"
                                            id="increase-qty">+</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Add to Cart Form -->
                            <form method="POST" action="{{ route('cart.add') }}">
                                @csrf
                                <input type="hidden" name="variant_id" id="variant_id">
                                <input type="hidden" name="quantity" id="form-quantity" value="1">
                                <!-- Set initial value -->
                                <div class="btn-group cart-btn">
                                    <button type="submit" class="btn btn-secondary text-uppercase"
                                        id="add-to-cart-btn">Add To Cart</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                // JavaScript function to change the main image and update Lightbox link
                function changeMainImage(imageUrl) {
                    document.getElementById('mainImage').src = imageUrl;
                    document.getElementById('mainImageLink').href = imageUrl;
                }

                // Variant selection event handler
                document.querySelectorAll('.variant-option').forEach(button => {
                    button.addEventListener('click', function() {
                        button.querySelector('input').checked = true;
                        document.querySelectorAll('.variant-option').forEach(btn => btn.classList
                            .remove('active'));
                        button.classList.add('active');

                        // Update product price based on selected variant
                        const variantPrice = button.getAttribute('data-price');
                        const countryName = document.getElementById("product_country").innerHTML;
                        let currency = "$";
                        if(countryName == "myanmar"){
                            currency = "Ks";
                        }else if(countryName == "korea"){
                            currency = "₩";
                        }else{
                            currency = "$";
                        }
                        document.getElementById('product-price').innerText = variantPrice + currency;

                        // Set the selected variant ID in the hidden form field
                        document.getElementById('variant_id').value = button.querySelector('input')
                            .value;

                        // Update main image based on selected variant's image
                        const variantImage = button.getAttribute('data-image');
                        if (variantImage) {
                            changeMainImage(variantImage);
                        }
                    });
                });
                

                // Handle quantity increase and decrease
                const quantityInput = document.getElementById('quantity');
                const increaseButton = document.getElementById('increase-qty');
                const decreaseButton = document.getElementById('decrease-qty');

                increaseButton.addEventListener('click', function() {
                    let currentQuantity = parseInt(quantityInput.value);
                    quantityInput.value = currentQuantity + 1;
                    document.getElementById('form-quantity').value = quantityInput.value;
                });

                decreaseButton.addEventListener('click', function() {
                    let currentQuantity = parseInt(quantityInput.value);
                    if (currentQuantity > 1) {
                        quantityInput.value = currentQuantity - 1;
                        document.getElementById('form-quantity').value = quantityInput.value;
                    }
                });

                // Update form-quantity hidden field when quantity is changed manually
                quantityInput.addEventListener('change', function() {
                    document.getElementById('form-quantity').value = this.value;
                });

                // Prevent form submission if variant is not selected
                document.getElementById('add-to-cart-btn').addEventListener('click', function(event) {
                    const selectedVariant = document.querySelector('input[name="product_variant"]:checked');
                    if (!selectedVariant) {
                        event.preventDefault();
                        alert('Please select a product variant.');
                    }
                });
                </script>







            </div>
        </div>
    </section>

    <section class="content-inner-3 pb-0">
        <div class="container">
            <div class="product-description">
                <div class="dz-tabs">
                    <ul class="nav nav-tabs center" id="myTab1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">Description</button>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0">
                            {!! $detail_product->description !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-inner-1 overlay-white-middle overflow-hidden">
        <div class="container">
            <div class="section-head style-2">
                <div class="left-content">
                    <h2 class="title mb-0">Related products</h2>
                </div>
                <a href="/products" class="text-secondary font-14 d-flex align-items-center gap-1">See all products
                    <i class="icon feather icon-chevron-right font-18"></i>
                </a>
            </div>
            <div class="swiper-btn-center-lr">
                <div class="row">
                    <div class="row gx-xl-4 g-3 mb-xl-0 mb-md-0 mb-3">
                        @foreach($suggest_products as $product)
                        <li class="card-container col-6 col-xl-3 col-lg-3 col-md-4 col-sm-6 Begs mt-5">
                            <div class="shop-card">
                                <a href="/products/{{$product->id}}/detail">
                                    <div class="dz-media">
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                            style="max-height:300px !important" loading="lazy">
                                        <div class="shop-meta">
                                            <a href="/whitelist/{{$product->id}}">
                                                <div class="btn btn-primary meta-icon dz-wishicon">
                                                    <svg class="dz-heart-fill" width="14" height="12"
                                                        viewBox="0 0 14 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M13.6412 5.80113C13.0778 6.9649 12.0762 8.02624 11.1657 8.8827C10.5113 9.49731 9.19953 10.7322 7.77683 11.62C7.30164 11.9159 6.69842 11.9159 6.22323 11.62C4.80338 10.7322 3.4888 9.49731 2.83435 8.8827C1.92382 8.02624 0.92224 6.96205 0.358849 5.80113C-0.551681 3.91747 0.344622 1.44196 2.21121 0.557041C3.98674 -0.282354 5.54034 0.292418 7.00003 1.44765C8.45972 0.292418 10.0133 -0.282354 11.786 0.557041C13.6554 1.44196 14.5517 3.91747 13.6412 5.80113Z"
                                                            fill="white" />
                                                    </svg>
                                                    <svg class="dz-heart feather feather-heart"
                                                        xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path
                                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                        </path>
                                                    </svg>

                                                </div>
                                            </a>
                                            <a href="/cart/{{$product->id}}">
                                                <div class="btn btn-primary meta-icon dz-carticon">
                                                    <svg class="dz-cart-check" width="15" height="15"
                                                        viewBox="0 0 15 15" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.9144 3.73438L5.49772 10.151L2.58105 7.23438"
                                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                    <svg class="dz-cart-out" width="14" height="14" viewBox="0 0 14 14"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.6033 10.4092C9.70413 10.4083 8.97452 11.1365 8.97363 12.0357C8.97274 12.9348 9.70097 13.6644 10.6001 13.6653C11.4993 13.6662 12.2289 12.938 12.2298 12.0388C12.2298 12.0383 12.2298 12.0378 12.2298 12.0373C12.2289 11.1391 11.5014 10.4109 10.6033 10.4092Z"
                                                            fill="white" />
                                                        <path
                                                            d="M13.4912 2.6132C13.4523 2.60565 13.4127 2.60182 13.373 2.60176H3.46022L3.30322 1.55144C3.20541 0.853911 2.60876 0.334931 1.90439 0.334717H0.627988C0.281154 0.334717 0 0.61587 0 0.962705C0 1.30954 0.281154 1.59069 0.627988 1.59069H1.90595C1.9858 1.59011 2.05338 1.64957 2.06295 1.72886L3.03004 8.35727C3.16263 9.19953 3.88712 9.8209 4.73975 9.82363H11.2724C12.0933 9.8247 12.8015 9.24777 12.9664 8.44362L13.9884 3.34906C14.0543 3.00854 13.8317 2.67909 13.4912 2.6132Z"
                                                            fill="white" />
                                                        <path
                                                            d="M6.61539 11.9676C6.57716 11.0948 5.85687 10.4077 4.98324 10.4108C4.08483 10.4471 3.38595 11.2048 3.42225 12.1032C3.45708 12.9653 4.15833 13.6505 5.02092 13.6653H5.06017C5.95846 13.626 6.65474 12.8658 6.61539 11.9676Z"
                                                            fill="white" />
                                                        <clipPath id="clip0_5_3906">
                                                            <rect width="14" height="14" fill="white" />
                                                        </clipPath>
                                                    </svg>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="dz-content">
                                        <h5 class="title">{{ $product->name }}</h5>

                                        <h6 class="price" style="color:black !important;">
                                            @if($product->product_type == 1)
                                            @if($product->discount_type == 0)
                                            {{$product->price}} @if($product->country == "myanmar")
                                            Ks
                                            @elseif($product->country == "korea")
                                            ₩
                                            @else
                                            $
                                            @endif
                                            @elseif($product->discount_type == 1)
                                            @php
                                            $discount_price = $product->price - $product->discount_amount;
                                            @endphp
                                            <del>{{$product->price}} </del>
                                            {{$discount_price}} @if($product->country == "myanmar")
                                            Ks
                                            @elseif($product->country == "korea")
                                            ₩
                                            @else
                                            $
                                            @endif
                                            @elseif($product->discount_type == 2)
                                            @php
                                            $discount_price = $product->price - ( $product->price * (
                                            $product->discount_amount / 100 ));
                                            @endphp
                                            <del>{{$product->price}} </del>
                                            {{$discount_price}} @if($product->country == "myanmar")
                                            Ks
                                            @elseif($product->country == "korea")
                                            ₩
                                            @else
                                            $
                                            @endif
                                            @endif
                                            @elseif($product->product_type == 2)
                                            @php
                                            $minPrice = $product->variants->min('price');
                                            $maxPrice = $product->variants->max('price');
                                            echo $minPrice . " ~ " . $maxPrice ;
                                            @endphp
                                            @if($product->country == "myanmar")
                                            Ks
                                            @elseif($product->country == "korea")
                                            ₩
                                            @else
                                            $
                                            @endif
                                            @endif

                                        </h6>
                                    </div>
                                    @if($product->discount_type != 0)
                                    <div class="product-tag">
                                        <span class="badge badge-secondary">Sale |
                                            @if($product->discount_type == 1)
                                            {{$product->discount_amount}} @if($product->country == "myanmar")
                                            Ks
                                            @elseif($product->country == "korea")
                                            ₩
                                            @else
                                            $
                                            @endif OFF
                                            @elseif($product->discount_type == 2)
                                            {{$product->discount_amount}} % OFF
                                            @endif
                                        </span>
                                    </div>
                                    @endif
                                </a>
                            </div>

                        </li>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Icon Box Start -->
    @include("web.product_footer")
    <!-- Icon Box End -->
</div>
@endsection
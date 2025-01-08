@extends('web.master')
@section('body')

<div class="page-content bg-white">
    @php
    $photos = App\Models\Gallery::orderBy("sort","desc")->get();
    //$photo = $photos->image;
    @endphp
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
        @foreach($photos as $key => $photo)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ asset($photo->image) }}" class="d-block w-100" alt="Image {{ $key + 1 }}">
            </div>
            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>



    <!-- icon-box1 -->
    <section class="content-inner-3 overlay-white-dark"
        style="background-image: url('images/background/bg2.jpg'); background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <div class="row justify-content-center gx-sm-1">
                <div class="col-lg-4 col-md-4 col-sm-4 p-b30 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="icon-bx-wraper style-1 text-center">
                        <div class="icon-bx">
                            <i class="flaticon flaticon-fast-delivery"></i>
                        </div>
                        <div class="icon-content">
                            <h3 class="dz-title m-b0">FREE SHIPPING</h3>
                            <div class="square"></div>
                            <p class="font-20">Enjoy free shipping on all orders - no minimum purchase required.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 p-b30 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="icon-bx-wraper style-1 text-center">
                        <div class="icon-bx">
                            <i class="flaticon flaticon-message"></i>
                        </div>
                        <div class="icon-content">
                            <h3 class="dz-title m-b0">24/7 SUPPORT</h3>
                            <div class="square"></div>
                            <p class="font-20">Our team is available 24/7 to help with any questions or concerns.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 p-b30 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="icon-bx-wraper style-1 text-center">
                        <div class="icon-bx">
                            <i class="flaticon flaticon-money-back-guarantee"></i>
                        </div>
                        <div class="icon-content">
                            <h3 class="dz-title m-b0">MONEY BACK</h3>
                            <div class="square"></div>
                            <p class="font-20">We offer a 100% money-back guarantee for your satisfaction.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- icon-box1 End-->





    <!--Recommend Section Start-->
    <section class="content-inner-1">
        <div class="container">
            <div class="row">

                <div class="col-xl-12">
                    <div class="wow fadeInUp" data-wow-delay="0.3s">
                        <h3 class="title">Most popular products</h3>
                        <div class="site-filters clearfix d-flex align-items-center">

                            <a href="/products"
                                class="product-link text-secondary font-14 d-flex align-items-center gap-1 text-nowrap">See
                                all products
                                <i class="icon feather icon-chevron-right font-18"></i>
                            </a>
                        </div>
                    </div>
                    <div class="clearfix">
                        <ul id="masonry" class="row g-xl-4 g-3">
                            @foreach($Latest_products as $product)
                            <li class="card-container col-6 col-xl-3 col-lg-3 col-md-4 col-sm-6 Begs mt-5">
                                <div class="shop-card">
                                    <a href="/products/{{$product->id}}/detail">
                                        <div class="dz-media">
                                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                                style="max-height:300px !important" loading="lazy">

                                        </div>
                                        <div class="dz-content">
                                            <h5 class="title">{{ $product->name }}</h5>

                                            <h6 class="price" style="color:black !important;">
                                                @if($product->product_type == 1)
                                                @if($product->discount_type == 0)
                                                {{$product->price}} $
                                                @elseif($product->discount_type == 1)
                                                @php
                                                $discount_price = $product->price - $product->discount_amount;
                                                @endphp
                                                <del>{{$product->price}} </del>
                                                {{$discount_price}} $
                                                @elseif($product->discount_type == 2)
                                                @php
                                                $discount_price = $product->price - ( $product->price * (
                                                $product->discount_amount / 100 ));
                                                @endphp
                                                <del>{{$product->price}} </del>
                                                {{$discount_price}} $
                                                @endif
                                                @elseif($product->product_type == 2)
                                                @php
                                                $minPrice = $product->variants->min('price');
                                                $maxPrice = $product->variants->max('price');
                                                echo $minPrice . " ~ " . $maxPrice . " $" ;
                                                @endphp
                                                @endif

                                            </h6>
                                        </div>
                                        @if($product->discount_type != 0)
                                        <div class="product-tag">
                                            <span class="badge badge-secondary">Sale |
                                                @if($product->discount_type == 1)
                                                {{$product->discount_amount}} $ OFF
                                                @elseif($product->discount_type == 2)
                                                {{$product->discount_amount}} % OFF
                                                @endif
                                            </span>
                                        </div>
                                        @endif
                                        @if($product->pre_order == 1)
                                        <div class="product-tag">
                                            <span class="badge badge-info">
                                                Pre Order
                                            </span>
                                        </div>
                                        @endif
                                    </a>
                                </div>

                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Recommend Section End-->

    <!-- Newsletter -->
    <!--<section class="overlay-black-light newsletter-wrapper style-2"-->
    <!--    style="background-image: url('{{ asset('web/images/background/bg4.jpg') }}'); background-repeat: no-repeat; background-size: cover;">-->

    <!--    <div class="container">-->
    <!--        <div class="subscride-inner wow fadeInUp" data-wow-delay="0.2s">-->
    <!--            <div class="row justify-content-center text-center">-->
    <!--                <div class="col-xl-12 col-lg-12">-->
    <!--                    <div class="section-head">-->
    <!--                        <h3 class="title">SUBSCRIBE TO OUR NEWSLETTER</h3>-->
    <!--                        <p class="sub-title">Get latest news, offers and discounts.</p>-->
    <!--                    </div>-->
    <!--                    <form class="dzSubscribe" action="https://mooncart.dexignzone.com/xhtml/script/mailchamp.php"-->
    <!--                        method="post">-->
    <!--                        <div class="dzSubscribeMsg"></div>-->
    <!--                        <div class="form-group">-->
    <!--                            <div class="input-group mb-0">-->
    <!--                                <input name="dzEmail" required="required" type="email" class="form-control"-->
    <!--                                    placeholder="Your Email Address">-->
    <!--                                <div class="input-group-addon">-->
    <!--                                    <button name="submit" value="Submit" type="submit" class="btn">-->
    <!--                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none">-->
    <!--                                            <path d="M4.20972 10.7344H15.8717" stroke="#0D775E" stroke-width="2"-->
    <!--                                                stroke-linecap="round" stroke-linejoin="round" />-->
    <!--                                            <path d="M10.0408 4.90112L15.8718 10.7345L10.0408 16.5678"-->
    <!--                                                stroke="#0D775E" stroke-width="2" stroke-linecap="round"-->
    <!--                                                stroke-linejoin="round" />-->
    <!--                                        </svg>-->
    <!--                                    </button>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </form>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->


</div>

@endsection
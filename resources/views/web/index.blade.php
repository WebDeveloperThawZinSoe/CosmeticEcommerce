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
    </div>







    <!-- Blog Start -->
    <section class="content-inner overlay-white-middle">
        <div class="container">
            <div class="section-head style-2 wow fadeInUp" data-wow-delay="0.1s">
                <div class="left-content">
                    <!-- <h2 class="title">Choose Your Nation's Products</h2>
                    <p>Click on a flag to explore the products from Myanmar or Korea.</p> -->
                </div>

            </div>
            <div class="row justify-content-center">

                <div class="col-xl-6 col-lg-6 order-lg-1 order-2 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="dz-card style-1 d-lg-block d-md-flex d-sm-flex d-block">
                        <div class="dz-media w-100">
                            <a href="/brand/myanmar">
                                <img src="{{asset('mm.png')}}" alt="">
                                <p style="font-weight:bold;text-align:center">For Myanmar Customer</p>
                            </a>
                        </div>

                    </div>
                </div>


                <div class="col-xl-6 col-lg-6 order-lg-2 order-1">
                    <div class="dz-card style-1 d-lg-block d-md-flex d-sm-flex d-block">
                        <div class="dz-media w-100">
                            <a href="/brand/korea">
                                <img src="{{asset('sk.png')}}" alt="">
                                <p style="font-weight:bold;text-align:center">For Korea Customer</p>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Blog End -->




    <!-- Recommend Section Start -->
    <!-- <section class="content-inner-1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="clearfix">
                        <ul id="masonry" class="row g-xl-4 g-3">
                            @foreach($Latest_products as $product)
                            <li class="card-container col-6 col-xl-3 col-lg-3 col-md-4 col-sm-6 mt-5">
                                <div class="shop-card">
                                    <a href="/products/{{$product->id}}/detail">
                                        <div class="dz-media">
                                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                                loading="lazy">
                                        </div>
                                        <div class="dz-content">
                                            <h5 class="title">{{ $product->name }}</h5>
                                            <h6 class="price">
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
                                                <del>{{$product->price}}</del> {{$discount_price}} @if($product->country
                                                == "myanmar")
                                                Ks
                                                @elseif($product->country == "korea")
                                                ₩
                                                @else
                                                $
                                                @endif
                                                @elseif($product->discount_type == 2)
                                                @php
                                                $discount_price = $product->price - ( $product->price *
                                                ($product->discount_amount / 100));
                                                @endphp
                                                <del>{{$product->price}}</del> {{$discount_price}} @if($product->country
                                                == "myanmar")
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
    </section> -->
    <!-- Recommend Section End -->



    <section class="content-inner">
        <div class="container">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach($Latest_products as $product)
                    <div class="swiper-slide">
                        <a href="/products/{{$product->id}}/detail">
                            <img src="{{ asset($product->image) }}" loading="lazy" alt="Product">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.mySwiper', {
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            slidesPerView: 4, // Default (desktop)
            spaceBetween: 20,
            breakpoints: {
                1024: {
                    slidesPerView: 4, // Desktop
                },
                768: {
                    slidesPerView: 3, // Tablets (show 3 products)
                },
                480: {
                    slidesPerView: 2, // Mobile (show 2 products)
                }
            }
        });
    });
    </script>




    <!-- Feature Box -->
    <!-- <section class="content-inner">
        <div class="container">
            <h2>Some Brands On Our Plantform</h2>
            <br>
            <div class="row">


                @foreach($brands as $brand)
                <div class="col-lg-2 col-md-3 col-sm-4 col-4 wow fadeInUp" data-wow-delay="0.1s">
                    <a href="/brands/{{$brand->id}}">
                        <div class="gift-bx">
                            <div class="gift-media">
                                <img src="{{ asset('images/brands/' . $brand->icon) }}" loading="lazy" alt="">
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section> -->
    <!-- Feature Box End -->


</div>

@endsection
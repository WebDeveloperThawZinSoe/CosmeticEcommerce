@extends('web.master')
@section('body')
<style>
@media (max-width: 768px) {
    #carouselExample .carousel-item img {
        height: 300px;
        /* Adjust height as needed */
        object-fit: cover;
        /* Ensures the image covers the set height */
    }
}

@media (min-width: 768px) {
    #carouselExample .carousel-item img {
        height: 500px;
        /* Adjust height as needed */
        object-fit: cover;
        /* Ensures the image covers the set height */
    }
}
</style>
<style>
.shop-card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 350px;
    /* Adjust as needed */
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    overflow: hidden;
    padding: 15px;
}

.shop-card .dz-media {
    flex: 0 0 auto;
    text-align: center;
    height: 180px;
    /* Adjust height for images */
    overflow: hidden;
}

.shop-card .dz-media img {
    max-height: 100%;
    max-width: 100%;
    object-fit: cover;
    /* Ensures images fit well */
}

.shop-card .dz-content {
    flex: 1 1 auto;
    text-align: center;
    margin-top: 10px;
}

.shop-card .dz-content .title {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 5px;
}

.shop-card .dz-content .price {
    font-size: 14px;
    color: #333;
    margin-top: 5px;
}

.product-tag {
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 1;
}
</style>
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
                    <h2 class="title">Choose Your Nation's Products</h2>
                    <p>Click on a flag to explore the products from Myanmar or Korea.</p>
                </div>

            </div>
            <div class="row justify-content-center">
               
                <div class="col-xl-6 col-lg-6 order-lg-1 order-2 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="dz-card style-1 d-lg-block d-md-flex d-sm-flex d-block">
                        <div class="dz-media w-100">
                        <a href="/products/myanmar">
                            <img src="{{asset('mm.png')}}" alt="">
                            </a>
                        </div>

                    </div>
                </div>
                
                
                <div class="col-xl-6 col-lg-6 order-lg-2 order-1">
                    <div class="dz-card style-1 d-lg-block d-md-flex d-sm-flex d-block">
                        <div class="dz-media w-100">
                        <a href="/products/korea">
                            <img src="{{asset('sk.png')}}" alt="">
                            </a>
                        </div>

                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Blog End -->




    <!-- Recommend Section Start -->
    <section class="content-inner-1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <!-- <div class="wow fadeInUp" data-wow-delay="0.3s">
                        <h3 class="title">Our Latest products</h3>
                        <div class="site-filters clearfix d-flex align-items-center">
                            <a href="/products"
                                class="product-link text-secondary font-14 d-flex align-items-center gap-1 text-nowrap">
                                See all products
                                <i class="icon feather icon-chevron-right font-18"></i>
                            </a>
                        </div>
                    </div> -->
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
    </section>
    <!-- Recommend Section End -->






    <!-- Feature Box -->
    <section class="content-inner">
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
    </section>
    <!-- Feature Box End -->


</div>

@endsection
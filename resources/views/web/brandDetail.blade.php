@extends('web.master')
@section('body')
<div class="page-content">
    <!--banner-->
    <div class="dz-bnr-inr style-1"
        style="background-image: url('{{ asset('images/brands/' . $brands_detail->icon) }}'); background-size: cover; background-position: center; min-height: 400px; display: flex; align-items: center;">
        <div class="container">
            <div class="dz-bnr-inr-entry text-center">
                <h1 class="text-white bg-dark p-4 rounded" style="opacity: 0.8;">Brand Detail</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb d-inline-block"
                        style="background-color: rgba(0, 0, 0, 0.6); padding: 10px; border-radius: 5px;">
                        <li class="breadcrumb-item"><a href="/" class="text-white">Home</a></li>
                        <li class="breadcrumb-item"><a href="/brands" class="text-white">Brands</a></li>
                        <li class="breadcrumb-item text-white">{{$brands_detail->name}}</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>


    <section class="content-inner-1 pt-3 z-index-unset">
        <div class="container">

            <div class="row">
                @include("web.product_filter")
                <div class="col-xl-9 col-lg-12">
                    <div class="row">
                      
                        <div class="row gx-xl-4 g-3 mb-xl-0 mb-md-0 mb-3">
                        <h3>For Myanmar Customer <img style="width:30px;height:20px;" src="{{asset('mm.png')}}" alt=""> </h3>
                            @foreach($mm_products as $product)
                            <li class="card-container col-6 col-xl-3 col-lg-3 col-md-4 col-sm-6 Begs mt-5" >
                                <div class="shop-card">
                                    <a href="/products/{{$product->id}}/detail">
                                    <div class="dz-media">
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="max-height:220px !important" loading="lazy">
                                    </div>
                                    <div class="dz-content">
                                        <h5 class="title">{{ $product->name }}</h5>

                                        <h6 class="price" style="color:black !important;">
                                            @if($product->product_type == 1)
                                                @if($product->discount_type == 0)
                                                    {{$product->price}}
                                                @if($product->country == "myanmar")
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
                                                    {{$discount_price}}  @if($product->country == "myanmar")
                                                Ks
                                                @elseif($product->country == "korea")
                                                ₩
                                                @else
                                                $
                                                @endif
                                                @elseif($product->discount_type == 2)
                                                    @php
                                                        $discount_price = $product->price - ( $product->price * ( $product->discount_amount / 100 ));
                                                    @endphp
                                                    <del>{{$product->price}} </del>
                                                    {{$discount_price}}  @if($product->country == "myanmar")
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
                                                    echo $minPrice . " ~ " . $maxPrice  ;
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
                                            {{$product->discount_amount}}  @if($product->country == "myanmar")
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
                    <!-- Custom Pagination -->
                    <div class="row page mt-0">
                        <div class="col-md-6">
                            <p class="page-text">
                                Showing {{ $mm_products->firstItem() }}–{{ $mm_products->lastItem() }} of
                                {{ $mm_products->total() }} Results
                            </p>
                        </div>
                        <div class="col-md-6">
                            <nav aria-label="Blog Pagination">
                                <ul class="pagination style-1">
                                    <!-- Previous Page Link -->
                                    @if ($mm_products->onFirstPage())
                                    <li class="page-item disabled"><span class="page-link prev">Prev</span></li>
                                    @else
                                    <li class="page-item"><a class="page-link prev"
                                            href="{{ $products->previousPageUrl() }}">Prev</a></li>
                                    @endif

                                    <!-- Pagination Elements -->
                                    @foreach ($mm_products->links()->elements[0] as $page => $url)
                                    @if ($page == $mm_products->currentPage())
                                    <li class="page-item active"><span class="page-link"
                                            style="background-color:black !important;color:white !important;">{{ $page }}</span>
                                    </li>
                                    @else
                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                    @endforeach

                                    <!-- Next Page Link -->
                                    @if ($mm_products->hasMorePages())
                                    <li class="page-item"><a class="page-link next"
                                            href="{{ $products->nextPageUrl() }}">Next</a></li>
                                    @else
                                    <li class="page-item disabled"><span class="page-link next">Next</span></li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                      
                        <div class="row gx-xl-4 g-3 mb-xl-0 mb-md-0 mb-3">
                        <h3>For Korea Customer <img style="width:30px;height:20px;" src="{{asset('sk.png')}}" alt=""> </h3>
                            @foreach($sk_products as $product)
                            <li class="card-container col-6 col-xl-3 col-lg-3 col-md-4 col-sm-6 Begs mt-5" >
                                <div class="shop-card">
                                    <a href="/products/{{$product->id}}/detail">
                                    <div class="dz-media">
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="max-height:220px !important" loading="lazy">
                                    </div>
                                    <div class="dz-content">
                                        <h5 class="title">{{ $product->name }}</h5>

                                        <h6 class="price" style="color:black !important;">
                                            @if($product->product_type == 1)
                                                @if($product->discount_type == 0)
                                                    {{$product->price}}
                                                @if($product->country == "myanmar")
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
                                                    {{$discount_price}}  @if($product->country == "myanmar")
                                                Ks
                                                @elseif($product->country == "korea")
                                                ₩
                                                @else
                                                $
                                                @endif
                                                @elseif($product->discount_type == 2)
                                                    @php
                                                        $discount_price = $product->price - ( $product->price * ( $product->discount_amount / 100 ));
                                                    @endphp
                                                    <del>{{$product->price}} </del>
                                                    {{$discount_price}}  @if($product->country == "myanmar")
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
                                                    echo $minPrice . " ~ " . $maxPrice  ;
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
                                            {{$product->discount_amount}}  @if($product->country == "myanmar")
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
                    <!-- Custom Pagination -->
                    <div class="row page mt-0">
                        <div class="col-md-6">
                            <p class="page-text">
                                Showing {{ $sk_products->firstItem() }}–{{ $sk_products->lastItem() }} of
                                {{ $sk_products->total() }} Results
                            </p>
                        </div>
                        <div class="col-md-6">
                            <nav aria-label="Blog Pagination">
                                <ul class="pagination style-1">
                                    <!-- Previous Page Link -->
                                    @if ($sk_products->onFirstPage())
                                    <li class="page-item disabled"><span class="page-link prev">Prev</span></li>
                                    @else
                                    <li class="page-item"><a class="page-link prev"
                                            href="{{ $products->previousPageUrl() }}">Prev</a></li>
                                    @endif

                                    <!-- Pagination Elements -->
                                    @foreach ($sk_products->links()->elements[0] as $page => $url)
                                    @if ($page == $sk_products->currentPage())
                                    <li class="page-item active"><span class="page-link"
                                            style="background-color:black !important;color:white !important;">{{ $page }}</span>
                                    </li>
                                    @else
                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                    @endforeach

                                    <!-- Next Page Link -->
                                    @if ($sk_products->hasMorePages())
                                    <li class="page-item"><a class="page-link next"
                                            href="{{ $products->nextPageUrl() }}">Next</a></li>
                                    @else
                                    <li class="page-item disabled"><span class="page-link next">Next</span></li>
                                    @endif
                                </ul>
                            </nav>
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
@extends('web.master')
@section('body')
<div class="page-content">
    <!--banner-->
    <div class="dz-bnr-inr style-1" style="background-image:url({{ asset('web/images/background/bg-shape.jpg') }});">
        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h1>Our Products</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/"> Home</a></li>
                        <li class="breadcrumb-item">Products</li>
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
                    <!-- Display Search Results Text -->
                    @if(isset($query))
                        <h4>Search results for: "{{ $query }}"</h4>
                    @endif

                    <!-- Check if there are products -->
                    @if(isset($products) && $products->count() > 0)
                        <p class="mb-3">Found {{ $products->total() }} product(s) matching "{{ $query }}"</p>
                        <div class="row">
                            <div class="row gx-xl-4 g-3 mb-xl-0 mb-md-0 mb-3">
                                @foreach($products as $product)
                                    <li class="card-container col-6 col-xl-3 col-lg-3 col-md-4 col-sm-6 Begs mt-5">
                                        <div class="shop-card">
                                            <a href="/products/{{ $product->id }}/detail">
                                                <div class="dz-media">
                                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="max-height:220px !important" loading="lazy">
                                                </div>
                                                <div class="dz-content">
                                                    <h5 class="title">{{ $product->name }}</h5>
                                                    <h6 class="price" style="color:black !important;">
                                                        @if($product->product_type == 1)
                                                            @if($product->discount_type == 0)
                                                                {{ $product->price }} $
                                                            @elseif($product->discount_type == 1)
                                                                <del>{{ $product->price }}</del>
                                                                {{ $product->price - $product->discount_amount }} $
                                                            @elseif($product->discount_type == 2)
                                                                <del>{{ $product->price }}</del>
                                                                {{ $product->price - ($product->price * ($product->discount_amount / 100)) }} $
                                                            @endif
                                                        @elseif($product->product_type == 2)
                                                            {{ $product->variants->min('price') }} ~ {{ $product->variants->max('price') }} $
                                                        @endif
                                                    </h6>
                                                </div>
                                                @if($product->discount_type != 0)
                                                    <div class="product-tag">
                                                        <span class="badge badge-secondary">Sale |
                                                            @if($product->discount_type == 1)
                                                                {{ $product->discount_amount }} $ OFF
                                                            @elseif($product->discount_type == 2)
                                                                {{ $product->discount_amount }}% OFF
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
                            </div>
                        </div>

                        <!-- Custom Pagination -->
                        <div class="row page mt-0">
                            <div class="col-md-6">
                                <p class="page-text">
                                    Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of
                                    {{ $products->total() }} Results
                                </p>
                            </div>
                            <div class="col-md-6">
                                {{ $products->links() }}
                            </div>
                        </div>
                    @else
                        <p class="mt-4">No products found for "{{ $query }}". Please try a different search.</p>
                    @endif
                </div>
            </div>
    </section>

    <!-- Icon Box Start -->
    @include("web.product_footer")
    <!-- Icon Box End -->
</div>
@endsection

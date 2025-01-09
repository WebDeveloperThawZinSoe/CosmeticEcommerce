@extends('web.master')

@section('body')
<div class="page-content">
    <!-- Banner Section -->
    <div class="dz-bnr-inr style-1" style="background-image:url({{ asset('web/images/background/bg-shape.jpg') }});">
        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h1>Our Products For {{$country}} Customer </h1>
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Products</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Product Section -->
    <section class="content-inner-1 pt-3 z-index-unset">
        <div class="container">
            <div class="row">
                @include('web.product_filter')
                <div class="col-xl-9 col-lg-12">
                    <div class="row gx-xl-4 g-3 mb-3">
                        @foreach($products as $product)
                        <div class="col-6 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="shop-card">
                                <a href="/products/{{ $product->id }}/detail">
                                    <div class="dz-media">
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="max-height:220px;" loading="lazy">
                                    </div>
                                    <div class="dz-content">
                                        <h5 class="title">{{ $product->name }}</h5>
                                        <h6 class="price" style="color: black;">
                                            @if($product->product_type == 1)
                                                @if($product->discount_type == 0)
                                                    {{ $product->price }} {{ $product->country == 'myanmar' ? 'Ks' : ($product->country == 'korea' ? '₩' : '$') }}
                                                @else
                                                    @php
                                                        $discount_price = $product->discount_type == 1
                                                            ? $product->price - $product->discount_amount
                                                            : $product->price - ($product->price * ($product->discount_amount / 100));
                                                    @endphp
                                                    <del>{{ $product->price }}    {{ $discount_price }}
                                                    {{ $product->country == 'myanmar' ? 'Ks' : ($product->country == 'korea' ? '₩' : '$') }} </del>
                                                    {{ $discount_price }}
                                                    {{ $product->country == 'myanmar' ? 'Ks' : ($product->country == 'korea' ? '₩' : '$') }}
                                                @endif
                                            @elseif($product->product_type == 2)
                                                @php
                                                    $minPrice = $product->variants->min('price');
                                                    $maxPrice = $product->variants->max('price');
                                                @endphp
                                                {{ $minPrice }} ~ {{ $maxPrice }}
                                                {{ $product->country == 'myanmar' ? 'Ks' : ($product->country == 'korea' ? '₩' : '$') }}
                                            @endif
                                        </h6>
                                    </div>
                                    @if($product->discount_type != 0)
                                    <div class="product-tag">
                                        <span class="badge badge-secondary">Sale |
                                            {{ $product->discount_type == 1 ? $product->discount_amount . ($product->country == 'myanmar' ? ' Ks' : ($product->country == 'korea' ? ' ₩' : ' $')) . ' OFF' : $product->discount_amount . ' % OFF' }}
                                        </span>
                                    </div>
                                    @endif
                                    @if($product->pre_order)
                                    <div class="product-tag">
                                        <span class="badge badge-info">Pre Order</span>
                                    </div>
                                    @endif
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Pagination Section -->
                    <div class="row page mt-0">
                        <div class="col-md-6">
                            <p class="page-text">Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }} Results</p>
                        </div>
                        <div class="col-md-6">
                            <nav aria-label="Pagination">
                                <ul class="pagination style-1">
                                    <!-- Previous Page Link -->
                                    <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link prev" href="{{ $products->previousPageUrl() ?? '#' }}">Prev</a>
                                    </li>

                                    <!-- Pagination Elements -->
                                    @foreach ($products->links()->elements[0] as $page => $url)
                                        <li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}" style="background-color: {{ $page == $products->currentPage() ? 'black' : 'inherit' }}; color: {{ $page == $products->currentPage() ? 'white' : 'inherit' }};">{{ $page }}</a>
                                        </li>
                                    @endforeach

                                    <!-- Next Page Link -->
                                    <li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link next" href="{{ $products->nextPageUrl() ?? '#' }}">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    @include('web.product_footer')
</div>
@endsection

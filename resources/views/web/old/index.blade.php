@extends('layouts.web.master')
@section('content')
@php
$generalSettings = App\Models\GeneralSetting::whereIn('name', [
        'banner_image','banner_link'
    ])->pluck('value', 'name');
@endphp
<div class="home-banner">
    <div class="swiper-container swiper-no-swiping">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                @php 
                    $banner_image = $generalSettings['banner_image'] ?? "";
                    $banner_link = $generalSettings['banner_link'] ?? "";
                @endphp
                <a target="blank"
                    href="{{$banner_link}}">
                    
                    <img src="{{ asset('images/general_settings/' . $banner_image) }}">
                </a>
            </div>
        </div>
    </div>
</div>
<div class="more-recommended container">
    <h2><i class="ico"></i>More Recommended</h2>
    <div class="recommended-box">
        @php 
            $product_categorys = App\Models\ProductCategory::where("icon","!=",null)->paginate(4);
        @endphp
        <ul class="recommended-ul">
            @foreach($product_categorys as $product_category)
            <li class="lis">
                <a href="/category/{{$product_category->id}}" title="{{$product_category->name}}" class=" gradient-btn pc-img">
                    <img src="{{ asset('images/product_categories/' . $product_category->icon) }}" class="pc-img">
                </a>
                <a href="/category/{{$product_category->id}}" title="{{$product_category->name}}" class="mobile_link">
                    <img src="{{ asset('images/product_categories/' . $product_category->icon) }}">
                    <span>{{$product_category->name}}</span>
                </a>
            </li>
            @endforeach
        </ul>
        <div class="recommended-goods-buy">
            <h2 style="margin-top:10px;margin-bottom:10px;">Latest Products
            
            </h2>

            <div data-type="zdorb" class="item divine-orb display">
                <div class="item-title">
                    @php  
                        $products = App\Models\Product::orderBy("id","desc")->paginate(8);
                    @endphp
                    <ul>
                        @foreach($products as $product)
                        <li style="display: flex; align-items: center;" onclick="window.location.href='/category/{{$product->category_id}}'">
                            <p style="flex: 1; margin: 0;">{{$product->name}}</p>
                            <img style="flex: 1; max-width: 30%;" src="{{ asset($product->image) }}" alt="{{$product->name}}">
                        </li>
                        @endforeach
                    </ul>


                </div>
                
            </div>
        </div>
    </div>
</div>



@endsection


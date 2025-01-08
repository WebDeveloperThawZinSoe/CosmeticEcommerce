<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1">
    <title>Game Currency</title>

    <script type="1f60d66d0c1efad0448f0a64-text/javascript" src="{{asset('static/web/js/jquery.min.js')}}"></script>
    <script type="1f60d66d0c1efad0448f0a64-text/javascript" src="{{asset('static/web/js/jquery-cookie.js')}}"></script>
    <link rel="stylesheet" href="{{asset('static/web/css/publica9f2.css?v=2.6')}}">
    <link rel="stylesheet" href="{{asset('static/web/css/public_mobile3cc5.css?v=1.6')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=GTM-5GM6S5L"
        type="1f60d66d0c1efad0448f0a64-text/javascript"></script>
    <script type="1f60d66d0c1efad0448f0a64-text/javascript">
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'GTM-5GM6S5L');
    gtag('consent', 'default', {
        'ad_storage': 'granted',
        'analytics_storage': 'granted',
        'ad_user_data': 'granted',
        'ad_personalization': 'granted',
        'wait_for_update': 500
    });

    dataLayer.push({
        'event': 'default_consent'
    })
    </script>
</head>

<body>
    <script type="1f60d66d0c1efad0448f0a64-text/javascript" src="{{asset('static/web/js/cmp.js')}}"></script>

    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5GM6S5L" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

    <script type="1f60d66d0c1efad0448f0a64-text/javascript">
    var def_currency =
        '{&quot;code&quot;:&quot;USD&quot;,&quot;symbol&quot;:&quot;$&quot;,&quot;rate&quot;:&quot;1.0000&quot;}';
    var s = def_currency.replace(/&quot;/g, '"');
    var currency = JSON.parse(s)
    var siteUrl = 'index.html'
    var default_siteHost = 'index.html'
    var current_lang = 'en'
    var deletePublicHtml =
        '<div class="delete-public-box display"><i class="ico delete-close"></i><p>Are you sure you want to delete all items?</p><div><button class="yes">Yes</button><button class="no delete-close">No</button></div></div>'
    </script>
    @include("layouts.web.header")

    </script>
    <script type="1f60d66d0c1efad0448f0a64-text/javascript">
    $(document).ready(function() {

        $('.nav ul.nav-help-menu li a:not(:first-child)').each(function() {
            var text = $(this).text();
            var words = text.split(' '); // 将字符串拆分为单词数组

            // 将每个单词的首字母大写，其余字母小写
            for (var i = 0; i < words.length; i++) {
                words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1).toLowerCase();
            }
            // 重新拼接字符串并设置回<a>标签
            $(this).text(words.join(' '));
        });
        $('.nav ul.nav-help-menu li a>span').each(function() {
            var text = $(this).text();
            var words = text.split(' '); // 将字符串拆分为单词数组

            // 将每个单词的首字母大写，其余字母小写
            for (var i = 0; i < words.length; i++) {
                words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1).toLowerCase();
            }
            // 重新拼接字符串并设置回<a>标签
            $(this).text(words.join(' '));
        });

        $('.footer-content .link .link-title').each(function() {
            var text = $(this).text();
            var words = text.split(' ');
            for (var i = 0; i < words.length; i++) {
                words[i] = words[i].charAt(0).toUpperCase() + words[i].substring(1).toLowerCase();
            }
            $(this).text(words.join(' '));
        });
    });
    </script>
    <script src="../www.google.com/recaptcha/api85f1.js?onload=onloadCallback&amp;render=explicit" async defer
        type="1f60d66d0c1efad0448f0a64-text/javascript"></script>
    <script type="1f60d66d0c1efad0448f0a64-text/javascript">
    var isMobile = window.innerWidth <= 768;
    var containerId = isMobile ? 'open_google_mobile' : 'open_google';
    console.log(containerId);
    var verifyCallback = function(response) {
        $("#google_key").val(response);

    };
    </script>
    <script type="1f60d66d0c1efad0448f0a64-text/javascript" src="{{asset('static/web/js/public8329.js?v=7.2')}}">
    </script>
    <link rel="stylesheet" type="text/css" href="{{asset('static/web/css/swiper.min.css')}}" />
    <link rel="stylesheet" href="{{asset('static/web/css/page3860.css?v=1')}}">
    <link rel="stylesheet" href="{{asset('static/web/css/list30f4.css?v=3')}}">
    <link rel="stylesheet" href="{{asset('static/web/css/mobile_listf195.css?v=2.1')}}">
    <script type="1f60d66d0c1efad0448f0a64-text/javascript" src="{{asset('static/web/js/jquery.lazyload.min.js')}}">
    </script>
    <script type="1f60d66d0c1efad0448f0a64-text/javascript" src="{{asset('static/web/js/pager.js')}}"></script>
    <script src="{{asset('static/web/js/listbea6.js?v=7')}}" type="1f60d66d0c1efad0448f0a64-text/javascript"></script>
    <script type="1f60d66d0c1efad0448f0a64-text/javascript" src="{{asset('static/web/js/swiper.min.js')}}"></script>
    <div class="list">
        <div class="main container">

            @if(session('success'))
            <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('
                success ') }}',
                confirmButtonText: 'OK'
            });
            </script>
            @endif

            <div class="list-cate">
                @php
                $categories = App\Models\ProductCategory::get();
                @endphp
                @foreach($categories as $category)
                <a @if($category_id==$category->id) class="active" @endif href="/category/{{$category->id}}">
                    {{$category->name}} </a>
                @endforeach
            </div>
            <div class="device device-server">
                <p>PLATFORM</p>
                <div>
                    <ul>
                        <li data-device_id="1" class="pc active ">
                            <span>PC</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="server device-server" style="display:block">
                <p>SERVER</p>
                <div>
                    <ul class="active">


                        <li @if($sub_category_id==null) class="active" @endif data-id="17639"
                            onclick="window.location.href='/category/{{$category_id}}'"> <span>All</span> </li>
                        @foreach($SubCategory as $SubCategory)
                        <li @if($sub_category_id=="$SubCategory->id" ) class="active" @endif data-id="17639"
                            onclick="window.location.href='/subcategory/{{$SubCategory->id}}'">
                            <span>{{$SubCategory->name}}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="child-server common-box-select" data-id="17639">
                <ul>
                </ul>
            </div>
            <div class="child-server common-box-select" data-id="17641">
                <ul>
                </ul>
            </div>
            <div class="child-server common-box-select" data-id="3">
                <ul>
                </ul>
            </div>
            <div class="child-server common-box-select" data-id="4">
                <ul>
                </ul>
            </div>
            <div class="goods">
                <div class="goods-header">


                </div>
                <div class="goods__sort">

                </div>
                <div class="goods-list items-list">

                    <ul id="items-list">
                        @foreach($Product as $product)
                        <li class="item" data-id="{{ $product->id }}" cate_id="0">
                            <div class="item-img">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                            </div>
                            <p class="item-title">{{ $product->name }}</p>
                            <div class="item-num">
                                <i id="sub_{{ $product->id }}" class="sub"></i> <!-- Subtract button -->


                                <input aria-labelledby="goods_min_num_{{ $product->id }}" id="qty_{{ $product->id }}"
                                    data-num="1" type="text" max="{{$product->stock ?? 9999999}}" class="number-input" value="{{$product->min_stock ?? 1}}"
                                    name="qty" oninput="validateQuantity(this); handleInputChange({{ $product->id }});"
                                    onblur="checkMaxQty(this)">


                                <i id="add_{{ $product->id }}" class="add"></i> <!-- Add button -->
                            </div>
                            <p class="item-title" id="price_{{ $product->id }}" style="font-size:18px !important">
                                <b>
                                    @php 
                                        $qty = $product->min_stock ?? 1;
                                        $product_price  = $product->price * $qty
                                    @endphp
                                    {{ $product_price  }} $</b> <!-- Initial price -->
                            </p>
                            <input type="hidden" id="min_qty_stock_{{ $product->id }}" name="min_qty_stock" value="{{ $product->min_stock ?? 1 }}">     
     
                            <input type="hidden" id="min_qty_stock_min_qty_{{ $product->id }}" name="min_qty_stock_min_qty_" value="{{ $product->min_stock ?? 0 }}">

                            <p style="display:none !important;" id="price_org_{{ $product->id }}">{{ $product->price }}
                            </p> <!-- Original price -->
                            <br>
                            <script>
                                function validateQuantity(input) {
                                    var max = parseInt(input.getAttribute('max')); // Get max value (product stock)
                                    var value = parseInt(input.value); // Get current input value

                                    if (value > max) {
                                        input.value = max; // If value exceeds max, set it to max
                                    }

                                    if (value < 1 || isNaN(value)) {
                                        input.value = 1; // Ensure minimum quantity is 1
                                    }
                                }

                                function checkMaxQty(input) {
                                    var max = parseInt(input.getAttribute('max'));
                                    var value = parseInt(input.value);

                                    if (value > max) {
                                        alert("The quantity exceeds the available stock. Maximum allowed is " + max);
                                        input.value = max; // Reset to max if overstocked
                                    }
                                }
                            </script>

                            @auth
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="qty" id="hidden_qty_{{ $product->id }}" data-num="1"
                                    value="1">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <center>
                                    <button type="submit" class="add-cart hover-btn" data-id="{{ $product->id }}">ADD TO
                                        CART</button>
                                </center>
                            </form>
                            @endauth

                            @guest
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="qty" id="hidden_qty_{{ $product->id }}" data-num="1"
                                    value="1">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <center>
                                    <button type="submit" class="add-cart hover-btn" data-id="{{ $product->id }}">ADD TO
                                        CART</button>
                                </center>
                            </form>
                            @endguest


                        </li>
                        @endforeach
                    </ul>

                    <script>
                    function handleInputChange(productId) {
                        var qtyInput = document.getElementById('qty_' + productId);
                        var hiddenQtyInput = document.getElementById('hidden_qty_' + productId);
                        var priceElement = document.getElementById('price_' + productId).querySelector('b');
                        var orgPriceElement = document.getElementById('price_org_' + productId);
                        

                        var originalPrice = parseFloat(orgPriceElement.textContent.trim());
                        var currentQty = parseInt(qtyInput.value);

                        // Set the hidden input value to match the current quantity
                        hiddenQtyInput.value = currentQty;

                        // Calculate the new price based on the quantity
                        var newPrice = originalPrice * currentQty;

                        // Update the price display
                        priceElement.textContent = newPrice.toFixed(2) + ' $';
                    }

                    function updateQuantity(productId, action) {
                        var qtyInput = document.getElementById('qty_' + productId);
                        var hiddenQtyInput = document.getElementById('hidden_qty_' + productId);
                        var priceElement = document.getElementById('price_' + productId).querySelector('b');
                        var orgPriceElement = document.getElementById('price_org_' + productId);
                        var min_qty_stock = document.getElementById('min_qty_stock_' + productId);
                        var min_qty_stock_min_qty = document.getElementById("min_qty_stock_min_qty_"+productId);

                        var originalPrice = parseFloat(orgPriceElement.textContent.trim());
                        var currentQty = parseInt(qtyInput.value);
                        var maxQty = parseInt(qtyInput.getAttribute('max')); // Get the maximum stock
                        var min_qty_stock_min_qty = parseInt(min_qty_stock_min_qty.value);
                        var minQtyStock = parseInt(min_qty_stock.value);
                        // Get the Add and Subtract buttons
                        var addButton = document.getElementById('add_' + productId);
                        var subButton = document.getElementById('sub_' + productId);

                        // Handle Add or Subtract actions
                        if (action === 'add' && currentQty < (maxQty - min_qty_stock_min_qty  )) {
                           
                            currentQty+=minQtyStock;
                           
                        } else if (action === 'sub' && currentQty > 1) {
                            currentQty-=minQtyStock;
                        }

                        // Update the input and hidden fields
                        qtyInput.value = currentQty;
                        hiddenQtyInput.value = currentQty;

                        // Update the price display
                        var newPrice = originalPrice * currentQty;
                        priceElement.textContent = newPrice.toFixed(2) + ' $';

                        // Disable the Add button if current quantity equals the max quantity
                        if (currentQty >= maxQty) {
                            addButton.disabled = true; // Disable the Add button
                        } else {
                            addButton.disabled = false; // Enable the Add button
                        }

                        // Disable the Subtract button when quantity is 1, otherwise enable it
                        subButton.disabled = currentQty <= 1;

                        // If currentQty is less than maxQty, re-enable the Add button
                        if (currentQty < maxQty) {
                            addButton.disabled = false;
                        }
                    }

                    // Attach event listeners to the + and - buttons
                    document.querySelectorAll('.add').forEach(function(addButton) {
                        addButton.addEventListener('click', function() {
                            var productId = this.id.split('_')[
                            1]; // Extract product ID from the button ID
                            updateQuantity(productId, 'add');
                        });
                    });

                    document.querySelectorAll('.sub').forEach(function(subButton) {
                        subButton.addEventListener('click', function() {
                            var productId = this.id.split('_')[
                            1]; // Extract product ID from the button ID
                            updateQuantity(productId, 'sub');
                        });
                    });
                    </script>



                    <!-- Add JavaScript for handling increment and decrement -->



                    <div class="spinner">
                        <div class="circ1"></div>
                        <div class="circ2"></div>
                        <div class="circ3"></div>
                        <div class="circ4"></div>
                    </div>
                    <!-- <div id="item_pager" data-count="37" class="pager"></div> -->
                </div>
            </div>

        </div>

    </div>
    <script type="text/html" id="itemHtml">

    </script>




    @include("layouts.web.footer")
    <div class="back-top-button footer-common-button">
        <i class="ico"></i>
    </div>

    <script data-cfasync="false" src="{{asset('cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}">
    </script>

    <style>
    .footer.cookie_padding {
        padding-bottom: 68px;
    }
    </style>
    <script src="{{asset('cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js')}}"
        data-cf-settings="1f60d66d0c1efad0448f0a64-|49" defer></script>
</body>
<script type="1f60d66d0c1efad0448f0a64-text/javascript" src="{{asset('static/web/js/template.js')}}"></script>

<script type="1f60d66d0c1efad0448f0a64-text/javascript"
    src="../widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>

<script>


</script>

</html>
<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1">
    <title>Game Currency</title>
    <style>
    /* General container */
    .help-center {
        width: 100%;
        padding: 20px;
        margin: 0 auto;
        box-sizing: border-box;
    }

    /* General styling */
    table {
        width: 100%;
        border-collapse: collapse;
        /* Keep this to manage outer borders */
        margin-bottom: 20px;
        background-color: inherit;
        border: 1px solid white;
        /* Apply border to the entire table */
    }

    th,
    td {
        border: none;
        /* Remove inner borders */
        padding: 12px;
        text-align: left;
        color: white;
    }

    thead {
        background-color: #f29d0a;
    }

    th {
        color: white;
        font-weight: bold;
    }

    /* Zebra striping */
    tbody tr:nth-child(even) {
        background-color: rgba(255, 255, 255, 0.1);
    }

    /* Hover effect */
    tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }


    /* Form input styling */
    .qty-input {
        width: 50px;
        text-align: center;
        font-size: 16px;
        border: none;
        background-color: transparent;
        color: white;
        font-weight: bold;
    }

    /* Buttons */
    button.btn {
        padding: 5px 12px;
        border: none;
        border-radius: 4px;
        background-color: #555;
        color: white;
        cursor: pointer;
    }

    button.btn:hover {
        background-color: #f29d0a;
        color: white;
    }

    /* Action buttons */
    button.btn-danger {
        background-color: #ff4d4d;
    }

    button.btn-danger:hover {
        background-color: #d93636;
    }

    /* Responsive behavior */
    @media (max-width: 768px) {

        table thead th:first-child,
        table tbody tr td:first-child {
            display: none;
        }

        table tbody tr td:last-child {
            width: 80px;
            text-align: center;
        }

        table tbody tr td button {
            padding: 5px;
        }

        .qty-input {
            width: 30px;
        }
    }

    @media (max-width: 480px) {

        th,
        td {
            padding: 8px;
            font-size: 14px;
        }

        .qty-input {
            font-size: 14px;
        }
    }

    /* Discount tooltip */
    .discount-tooltip {
        color: gold;
        margin-left: 10px;
        cursor: pointer;
        position: relative;
    }

    .discount-tooltip:hover::after {
        content: attr(title);
        position: absolute;
        left: 100%;
        background-color: rgba(0, 0, 0, 0.75);
        color: white;
        padding: 5px;
        font-size: 12px;
        border-radius: 5px;
        white-space: nowrap;
        transform: translateY(-50%);
        margin-left: 10px;
        z-index: 1000;
    }



    /* Form styling */
    form {
        width: 100%;
        margin-top: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        color: white;
        font-weight: bold;
        margin-bottom: 5px;
        text-align: left;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        background-color: #f4f4f4;
    }

    .required {
        color: red;
    }

    .btn {
        padding: 10px 20px;
        background-color: #f29d0a;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-align: left;
    }

    .btn:hover {
        background-color: darkgold;
    }


    /* Main container for the cards */
    .payment-method-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 20px;
        padding: 20px;
    }

    /* Card styling */
    .payment-card {
        width: 100%;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        background-color: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    /* Header styling for each card */
    .card-header {
        background-color: #f4f4f4;
        padding: 10px;
        border-bottom: 1px solid #ddd;
        border-radius: 8px 8px 0 0;
        text-align: center;
        color: black !important;
    }

    .card-header h4 {
        font-size: 18px;
        font-weight: bold;
        color: black !important;
    }

    /* Body content for the card */
    .card-body {
        padding: 15px;
    }

    .card-body p {
        margin-bottom: 10px;
        font-size: 14px;
        color: #555;
    }

    /* Hover effect */
    .payment-card:hover {
        transform: scale(1.05);
    }

    /* Responsive behavior */
    /* Responsive behavior */
    /* For mobile devices (1 card per row) */
    @media (max-width: 599px) {
        .payment-card {
            width: calc(50% - 20px);
            /* Full width */
        }
    }

    /* For tablets (2 cards per row) */
    @media (min-width: 600px) and (max-width: 899px) {
        .payment-card {
            width: calc(50% - 20px);
            /* Two cards per row with gap */
        }
    }

    /* For desktop (4 cards per row) */
    @media (min-width: 900px) {
        .payment-card {
            width: calc(25% - 20px);
            /* Four cards per row with gap */
        }
    }

    /* Responsive behavior for all tables except the first */
    @media (max-width: 768px) {

        /* This will target the first table and ensure its first column is always shown */
        table:first-of-type thead th:first-child,
        table:first-of-type tbody tr td:first-child {
            display: table-cell;
            /* Ensures first column of the first table is visible */
        }

        /* This will hide the first column of other tables */
        table:not(:first-of-type) thead th:first-child,
        table:not(:first-of-type) tbody tr td:first-child {
            display: none;
            /* Hide first column for tables other than the first one */
        }

        table tbody tr td:last-child {
            width: 80px;
            text-align: center;
        }

        table tbody tr td button {
            padding: 5px;
        }

        .qty-input {
            width: 30px;
        }
    }


    .text-danger {
        color: red !important;
    }
    </style>
    <script type="d36be3e83a75e566173ee08a-text/javascript" src="{{asset('static/web/js/jquery.min.js')}}"></script>
    <script type="d36be3e83a75e566173ee08a-text/javascript" src="{{asset('static/web/js/jquery-cookie.js')}}"></script>
    <link rel="stylesheet" href="{{asset('static/web/css/publica9f2.css?v=2.6')}}">
    <link rel="stylesheet" href="{{asset('static/web/css/public_mobile3cc5.css?v=1.6')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=GTM-5GM6S5L"
        type="d36be3e83a75e566173ee08a-text/javascript"></script>
    <script type="d36be3e83a75e566173ee08a-text/javascript">
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
    <script type="d36be3e83a75e566173ee08a-text/javascript" src="static/web/js/cmp.js"></script>

    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5GM6S5L" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

    <script type="d36be3e83a75e566173ee08a-text/javascript">
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

    @include('layouts.web.header')

    </script>
    <script type="d36be3e83a75e566173ee08a-text/javascript">
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
        type="d36be3e83a75e566173ee08a-text/javascript"></script>
    <script type="d36be3e83a75e566173ee08a-text/javascript">
    var isMobile = window.innerWidth <= 768;
    var containerId = isMobile ? 'open_google_mobile' : 'open_google';
    console.log(containerId);
    var verifyCallback = function(response) {
        $("#google_key").val(response);

    };
    var onloadCallback = function() {
        grecaptcha.render(containerId, {
            'sitekey': '6LfTHt4pAAAAAOrDGosdAQp-_EmP7RmNDMlchuYd',
            'callback': verifyCallback
        });
    };
    </script>
    <script type="d36be3e83a75e566173ee08a-text/javascript" src="static/web/js/public8329.js?v=7.2"></script>
    <link rel="stylesheet" type="text/css" href="static/web/css/html.css" />
    <link rel="stylesheet" type="text/css" href="static/web/css/mobile_html.css" />
    <div class="main container" style="min-height: 600px;">

        <div class="help-center">
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


            @auth
            @php
            $user_id = Auth::id();
            $cartItems = App\Models\Card::where("user_id", $user_id)->with('product')->get();
            $total = 0;
            $discount_amount = App\Models\User::find($user_id)->customerType->type->discount_amount ?? 0;
            $discount_name = App\Models\User::find($user_id)->customerType->type->name ?? 'Guest';
            @endphp
            @endauth

            @guest
            @php
            $session_id = session()->getId();
            $cartItems = App\Models\Card::where("session_id", $session_id)->with('product')->get();
            $total = 0;
            $discount_amount = 0;
            $discount_name = 'Guest';
            @endphp
            @endguest

            @if($cartItems->isEmpty())
            <h1>Your cart is empty.</h1>
            @else
            <table>
                <thead>
                    <tr>

                        <th>Name</th>
                        <th>QTY</th>
                        <!-- <th>Price</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $key => $cartItem)
                    @php
                    $product = $cartItem->product;
                    $subtotal = $product->price * $cartItem->qty;
                    $total += $subtotal;
                    @endphp
                    <tr data-id="{{ $cartItem->id }}">

                        <td> <img src="{{ asset($product->image) }}" style="width:50px;height:50px" alt=""> <br>
                            {{ $product->name }}
                        </td>
                        <td>
                            <form action="{{ route('cart.update', $cartItem->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @guest
                                <input type="hidden" name="session_id" value="{{ session()->getId() }}">
                                @endguest
                                <button type="submit" name="action" value="sub" class="btn btn-secondary">-</button>

                               <input type="text" value="{{ $cartItem->qty }}" class="qty-input"
                                style="width: 60px; text-align: center;text-decoration:underline !important" onkeyup="changeQTY(this, {{ $cartItem->id }})">
                                
                                 
                                <button type="submit" name="action" value="add" class="btn btn-secondary">+</button>
                            </form>
                            <script>
                                 function changeQTY(input, cartItemId) {
                                    const newQty = input.value;
                                    
                                    // Perform an AJAX request to send the updated quantity
                                    fetch(`/card/update/direct/${cartItemId}`, {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include the CSRF token for security
                                        },
                                        body: JSON.stringify({
                                            qty: newQty
                                        })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        console.log('Quantity updated successfully:', data);
                                        location.reload();
                                    })
                                    .catch(error => {
                                        console.error('Error updating quantity:', error);
                                        location.reload();
                                    });
                                }
                            </script>
                        </td>
                        <!-- <td>${{ number_format($subtotal, 2) }}</td> -->
                        <td style="width:7% !important;">
                            ${{ number_format($subtotal, 2) }}
                            <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST">
                                @csrf

                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure to remove this?')"><img
                                        style="width:15;height:15px"
                                        src="data:image/png;base64,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"
                                        alt=""></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            <table>
                <tfoot>
                    @php
                    $discounted_total = $total - ($total * ($discount_amount / 100));
                    @endphp
                    <tr>
                        <td colspan="3"><strong>Your Account Discount:</strong></td>
                        <td colspan="2">{{ $discount_amount }}% ({{ $discount_name }} Customer)
                            @php
                            $discount_info = App\Models\Type::orderBy("discount_amount")->get();
                            $information = "";
                            foreach($discount_info as $info){
                            $information .= $info->name . " can get " . $info->discount_amount . " % discount. ";
                            }
                            @endphp
                            <p class="discount-tooltip" title="{{ $information }}">?</p>

                    </tr>
                    <tr>
                        <td colspan="3"><strong>Total Before Discount:</strong></td>
                        <td colspan="2">${{ number_format($total, 2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Total After Discount:</strong></td>
                        <td colspan="2">${{ number_format($discounted_total, 2) }} <span style="color:green">( Amount To
                                Be Paid )</span> </td>
                    </tr>
                </tfoot>
            </table>
            <h3>Bill To</h3>
            <div class="payment-method-container">
                @php
                $paymentMethods = App\Models\PaymentMethod::get();
                @endphp
                @foreach($paymentMethods as $paymentMethod)
                <div class="payment-card">
                    <div class="card-header">
                        <img src="{{ asset('images/payment_method/' . $paymentMethod->icon) }}"
                            style="width:110px;height:120px" alt="Icon">
                        <h4>{{ $paymentMethod->method_name }}</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Account No :</strong> {{ $paymentMethod->account_no }}</p>
                        <p><strong>Account Name :</strong> {{ $paymentMethod->account_name }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <hr>
            <br>
            <h1>Check Out Form</h1>
            <form action="{{ route('checkout.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @guest
                <input type="hidden" name="session_id" value="{{ session()->getId() }}">
                @endguest

                <h3 style="text-align:left !important;margin-bottom:20px !important;margin-top:30px !important;">User
                    Information</h3>

                @auth
                <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}"
                        placeholder="Name *" required>
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}"
                        placeholder="Email Address *" required>
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ Auth::user()->phone }}"
                        placeholder="Phone *" required>
                    @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                @endauth

                @guest
                <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                        placeholder="Name *" required>
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                        placeholder="Email Address *" required>
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}"
                        placeholder="Phone *" required>
                    @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="checkbox" name="checkbox" id="checkbox">
                    <label for="checkbox" style="text-decoration:underline !important;">Click To Register Instantly to
                        become a VIP member, and get 3% ~ 10% Discount. (
                        @php
                        $discount_info = App\Models\Type::orderBy("discount_amount")->get();
                        $information = "";
                        foreach($discount_info as $info){
                        $information .= $info->name . " can get " . $info->discount_amount . " % discount. ";
                        }
                        @endphp
                        <p style="display:inline-block !important;color:gold !important;margin-left:10px;margin-right:10px"
                            title="{{ $information }}">about VIP</p>)
                    </label>
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password fields (initially hidden) -->
                <div id="password-fields" class="form-group" style="display: none;">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password *">
                </div>

                <div id="password-confirmation-fields" class="form-group" style="display: none;">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                        placeholder="Confirm Password *">
                </div>
                @endguest

                <script>
                document.getElementById('checkbox').addEventListener('change', function() {
                    var passwordFields = document.getElementById('password-fields');
                    var passwordConfirmationFields = document.getElementById('password-confirmation-fields');

                    if (this.checked) {
                        passwordFields.style.display = 'block';
                        passwordConfirmationFields.style.display = 'block';
                        document.getElementById('password').setAttribute('required', 'required');
                        document.getElementById('password_confirmation').setAttribute('required', 'required');
                    } else {
                        passwordFields.style.display = 'none';
                        passwordConfirmationFields.style.display = 'none';
                        document.getElementById('password').removeAttribute('required');
                        document.getElementById('password_confirmation').removeAttribute('required');
                    }
                });
                </script>

                <h3 style="text-align:left !important;margin-bottom:20px !important;margin-top:30px !important;">
                    Delivery Information</h3>
                <div class="form-group">
                    <input type="text" name="game_account_id" id="game_account_id" class="form-control"
                        value="{{ old('game_account_id') }}" placeholder="Character Name *" required>
                    @error('game_account_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" name="game_account_name" id="game_account_name" class="form-control"
                        value="{{ old('game_account_name') }}" placeholder="Xbox tag / PSN name *" required>
                    @error('game_account_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div style="text-align:left !important">
                    <p style="color:red;">* Notice </p>
                    <br>
                    <p style="color:red;">1.Receive fast: a correct character name, and keep online after order
                        confirmed.</p>
                    <br>
                    <p style="color:red;">2.Our player will invite you to a Party, please accept his request in game.
                    </p>
                    <br>
                    <p style="color:red;">3.Make sure to give us some items when trading and don't use transaction and
                        other sensitive words so that it makes the trade real in order to avoid the ban.</p>
                    <br>
                </div>

                <h3 style="text-align:left !important;margin-bottom:20px !important;margin-top:30px !important;">Payment
                    Information</h3>
                <div class="form-group">
                    <select name="payment_method" id="payment_method" class="form-control" required>
                        <option value="">--- SELECT Method ---</option>
                        @php
                        $methods = App\Models\PaymentMethod::get();
                        @endphp
                        @foreach($methods as $method)
                        <option value="{{ $method->method_name }}"
                            {{ old('payment_method') == $method->method_name ? 'selected' : '' }}>
                            {{ $method->method_name }}</option>
                        @endforeach
                    </select>
                    @error('payment_method')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" name="payment_account_name" id="payment_account_name" class="form-control"
                        value="{{ old('payment_account_name') }}" placeholder="Payment Account Name *" required>
                    @error('payment_account_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" name="transaction_id" id="transaction_id" class="form-control"
                        value="{{ old('transaction_id') }}" placeholder="Transaction ID *" required>
                    @error('transaction_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="file" name="payment_slip" id="payment_slip" class="form-control"
                        placeholder="Payment Slip (Optional)">
                    @error('payment_slip')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success"
                    style="font-size:18px !important;padding:15px 13px !important;">Proceed to Checkout</button>
            </form>



            @endif



        </div>

    </div>


    </div>
    <script type="d36be3e83a75e566173ee08a-text/javascript">
    $(function() {
        $('.faq-content .item .item-title').click(function() {
            if ($(this).hasClass('up')) {
                $(this).removeClass('up')
            } else {
                $(this).addClass('up')
            }
            $(this).siblings('.item-text').slideToggle(100)
            $(this).parents('.item').siblings('li').find('.item-text').slideUp(100)
            $(this).parents('.item').siblings('li').find('.item-title').removeClass('up')
        })

        $('.faq-cate li').click(function() {
            $(this).addClass('active').siblings().removeClass('active')
        })

        if ($('.faq-content .item').length > 0) {
            $('.faq-content .item').each(function() {
                var str = $(this).find('.item-title span').text()
            })
        }

        $('.search-question input').keydown(function(e) {
            if (e.which == 13) {
                var titleArr = [];
                var val = $(this).val()
                searchVal(val)
            }
        })

        $('.search-question').on('click', 'i', function() {
            $('.faq-tips').remove()
            var titleArr = [];
            var val = $(this).siblings('input').val()
            searchVal(val)

        })

        function searchVal(val) {
            $('.faq-content .faq-tips').remove()
            if (val == '') {
                $('.faq-content .item').show()
            } else {
                var num = 0;
                $('.faq-content .item').each(function() {
                    if ($(this).find('.item-title span').text().toLowerCase().indexOf(val
                            .toLowerCase()) != -1) {
                        $(this).show()
                        num++;
                    } else {
                        $(this).hide()
                    }
                })
                if (num == 0) {
                    $('.faq-content').append("<div class='faq-tips'>No more data</div>")
                }
            }
        }
        $('.faq-cate li').eq(0).addClass('active')
        var faqtype = $('.faq-cate li.active').attr('data-type')
        $('.faq-cate li').click(function() {
            var types = $(this).attr('data-type')
            cate(types)
        })

        function cate(type) {
            var num = 0;
            $('.faq-tips').remove()
            $('.faq-content .item').each(function() {
                if ($(this).attr('data-type') == type) {
                    $(this).show()
                    num++;
                } else {
                    $(this).hide()
                }
            })
            if (num == 0) {
                $('.faq-content').append("<div class='faq-tips'>No more data</div>")
            }
        }

        footer()

        function footer() {
            $('.main').css('min-height', $(window).height() - $('.footer').height());
        }
    })
    </script>
    <style>
    img {
        width: 100%;
    }
    </style>
    @include("layouts.web.footer")
    <div class="back-top-button footer-common-button">
        <i class="ico"></i>
    </div>

    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script type="d36be3e83a75e566173ee08a-text/javascript">
    var liveFlag = false;
    var liveTime;
    setTimeout(function() {
        window.__lc = window.__lc || {};
        window.__lc.license = 12135636;;
        (function(n, t, c) {
            function i(n) {
                return e._h ? e._h.apply(null, n) : e._q.push(n)
            }
            var e = {
                _q: [],
                _h: null,
                _v: "2.0",
                on: function() {
                    i(["on", c.call(arguments)])
                },
                once: function() {
                    i(["once", c.call(arguments)])
                },
                off: function() {
                    i(["off", c.call(arguments)])
                },
                get: function() {
                    if (!e._h) throw new Error(
                        "[LiveChatWidget] You can't use getters before load.");
                    return i(["get", c.call(arguments)])
                },
                call: function() {
                    i(["call", c.call(arguments)])
                },
                init: function() {
                    var n = t.createElement("script");
                    n.async = !0, n.type = "text/javascript", n.src =
                        "../cdn.livechatinc.com/tracking.js", t.head.appendChild(n)
                }
            };
            !n.__lc.asyncInit && e.init(), n.LiveChatWidget = n.LiveChatWidget || e
        }(window, document, [].slice))
        LiveChatWidget.on('ready', function() {
            $('#chat-widget-container').hide()
            $('.live-chat-button').show()
            liveFlag = true
            clearInterval(liveTime)
            if ($('.liveLoad').hasClass('display')) {
                $('.liveLoad').removeClass('display')
                $('#chat-widget-container').show()
                LiveChatWidget.call('maximize')
            }
        })
        LiveChatWidget.on('visibility_changed', LiveHide)

        function LiveHide(data) {
            switch (data.visibility) {
                case 'maximized':
                    break;
                case 'minimized':
                    $('#chat-widget-container').hide()
                    break;
                case 'hidden':
                    break;
            }
        }
        $('.live-chat-button').click(function() {
            $('#chat-widget-container').show()
            LiveChatWidget.call('maximize')
        })
        $('body').on('click', '.livechatheader', function() {
            $('#chat-widget-container').show()
            LiveChatWidget.call('maximize')
        })
    }, 8000)
    $('.live-chat-button').click(function() {
        if (!liveFlag) {
            $('.liveLoad').addClass('display')
            var text = '.'
            liveTime = setInterval(() => {
                if (text == '......') {
                    text = ''
                }
                text += '.'
                $('.liveLoad p').text(text)
            }, 400)
        }
    })

    $('body').on('click', '.livechatheader', function() {
        if (!liveFlag) {
            $('.liveLoad').addClass('display')
            var text = '.'
            liveTime = setInterval(() => {
                if (text == '......') {
                    text = ''
                }
                text += '.'
                $('.liveLoad p').text(text)
            }, 400)
        }
    })
    </script>

    <style>
    .footer.cookie_padding {
        padding-bottom: 68px;
    }
    </style>
    <script type="d36be3e83a75e566173ee08a-text/javascript">
    $(function() {
        var req_gtm = new XMLHttpRequest();
        req_gtm.open('GET.html', document.location, true);
        req_gtm.send(null);
        req_gtm.onload = function() {
            var headers = req_gtm.getAllResponseHeaders().toLowerCase();
            if (headers.indexOf('gtm_ccdd') != -1) {
                // if($.cookie('accept_cookie')) {
                $('.cookie_common_dialog').remove()
                $('.footer').removeClass('cookie_padding')
                // } else {
                //     $('.accept_cookie').addClass('display')
                //     $('.footer').addClass('cookie_padding')
                // }
            } else {
                $('.cookie_common_dialog').remove()
                $('footer').removeClass('cookie_padding')
            }
        }
        $('.accept_cookie button').click(function() {
            $('.cookie_common_dialog').remove()
            $('.footer').removeClass('cookie_padding')
            $.cookie('accept_cookie', 1)
            gtag('consent', 'update', {
                'ad_storage': 'granted',
                'ad_user_data': 'granted',
                'ad_personalization': 'granted',
                'analytics_storage': 'granted',
            });
        })

        $('.accept_cookie .accept_cookie_r span').click(function() {
            $('.footer').removeClass('cookie_padding')
            $('.cookie_common_dialog').remove()
            $.cookie('accept_cookie', 2)
            gtag('consent', 'update', {
                'ad_storage': 'denied',
                'ad_user_data': 'denied',
                'ad_personalization': 'denied',
                'analytics_storage': 'denied',
            });
        })
    })
    </script>
    <script src="{{asset('cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js')}}"
        data-cf-settings="d36be3e83a75e566173ee08a-|49" defer></script>
</body>
<script type="d36be3e83a75e566173ee08a-text/javascript" src="{{asset('static/web/js/template.js')}}"></script>

<script type="d36be3e83a75e566173ee08a-text/javascript"
    src="../widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>







</html>
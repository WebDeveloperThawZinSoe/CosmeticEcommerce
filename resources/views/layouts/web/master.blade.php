<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1">
    <title>Game Currency</title>
    <meta name="keywords" content="Game Currency Website." />
    <meta name="description"
        content="Game Currency Website " />
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <link rel="canonical" href="/" />
    <script type="56b3249c5a10a1e0c92e605d-text/javascript" src="{{asset('static/web/js/jquery.min.js')}}"></script>
    <script type="56b3249c5a10a1e0c92e605d-text/javascript" src="{{asset('static/web/js/jquery-cookie.js')}}"></script>
    <link rel="stylesheet" href="{{asset('static/web/css/publica9f2.css?v=2.6')}}">
    <link rel="stylesheet" href="{{asset('static/web/css/public_mobile3cc5.css?v=1.6')}}">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=GTM-5GM6S5L"
        type="56b3249c5a10a1e0c92e605d-text/javascript"></script>
    <script type="56b3249c5a10a1e0c92e605d-text/javascript">
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
    <script type="56b3249c5a10a1e0c92e605d-text/javascript" src="{{asset('static/web/js/cmp.js')}}"></script>

    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5GM6S5L" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

    <script type="56b3249c5a10a1e0c92e605d-text/javascript">
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
    <script type="56b3249c5a10a1e0c92e605d-text/javascript">
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
        type="56b3249c5a10a1e0c92e605d-text/javascript"></script>
    <script type="56b3249c5a10a1e0c92e605d-text/javascript">
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
    <script type="56b3249c5a10a1e0c92e605d-text/javascript" src="{{asset('static/web/js/public8329.js?v=7.2')}}">
    </script>
    <link rel="stylesheet" href="{{asset('static/web/css/home2d4c.css?v=2.3')}}">
    <link rel="stylesheet" href="{{asset('static/web/css/home_moblie2d4c.css?v=2.3')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('static/web/css/rangeslider.css')}}" />
    <script type="56b3249c5a10a1e0c92e605d-text/javascript" src="{{asset('static/web/js/rangeslider.min.js')}}">
    </script>
    <div class="main home">
        @yield('content')
    </div>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "POE Currency",
        "image": ["https://www.poecurrency.com/static/pc/image/true_logo.png"],
        "description": "POECurrency.com is a website dedicated to POE Trade Currency services, offering the safest POE Currency Trade, Buy POE Currency with cheapest price, 7/24 online service, Fast Delivery!",
        "mpn": "1",
        "sku": "poe898",
        "brand": {
            "@type": "brand",
            "name": "POE Currency"
        },
        "review": {
            "@type": "Review",
            "reviewRating": {
                "@type": "Rating",
                "ratingValue": "4.9",
                "bestRating": "5"
            },
            "author": {
                "@type": "Person",
                "name": "Game Bee"
            }
        },
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "4.9",
            "ratingCount": "6823"
        },
        "offers": {
            "@type": "AggregateOffer",
            "offerCount": "11765",
            "lowPrice": "1",
            "highPrice": "1",
            "priceCurrency": "USD",
            "availability": "http://schema.org/InStock"
        }
    }
    </script>
    <script type="application/ld+json">
    [

        {
            "@context": "https://schema.org/",
            "@type": "ImageObject",
            "contentUrl": "https://imgs.poecurrency.com/web/image/2024/08/202408131658025127.webp",
            "license": "https://www.poecurrency.com/terms",
            "acquireLicensePage": "https://www.poecurrency.com/contact-us",
            "creditText": "POECurrency.com",
            "creator": {
                "@type": "Organization",
                "name": "POECurrency.com"
            },
            "copyrightNotice": "POECurrency.com"
        },
        {
            "@context": "https://schema.org/",
            "@type": "ImageObject",
            "contentUrl": "https://www.poecurrency.com/static/pc/image/true_logo.png",
            "license": "https://www.poecurrency.com/terms",
            "acquireLicensePage": "https://www.poecurrency.com/contact-us",
            "creditText": "POECurrency.com",
            "creator": {
                "@type": "Organization",
                "name": "POECurrency.com"
            },
            "copyrightNotice": "POECurrency.com"
        }

    ]
    </script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "name": "POECurrency",
        "itemListElement": [{
            "@type": "ListItem",
            "position": "1",
            "item": {
                "@id": "https://www.poecurrency.com/",
                "name": "POECurrency.com"
            }
        }]
    }
    </script>
    <script src="{{asset('static/web/js/home3cc5.js?v=1.6')}}" type="56b3249c5a10a1e0c92e605d-text/javascript"></script>
    @include("layouts.web.footer")

    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>


    <style>
    .footer.cookie_padding {
        padding-bottom: 68px;
    }
    </style>

    <script src="{{asset('cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js')}}"
        data-cf-settings="56b3249c5a10a1e0c92e605d-|49" defer></script>
</body>
<script type="56b3249c5a10a1e0c92e605d-text/javascript" src="{{asset('static/web/js/template.js')}}"></script>


<script type="56b3249c5a10a1e0c92e605d-text/javascript"
    src="../widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>


<!-- Mirrored from www.poecurrency.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Aug 2024 14:01:16 GMT -->

</html>
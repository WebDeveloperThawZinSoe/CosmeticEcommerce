<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1">
    <title>Game Currency</title>

    <script type="d36be3e83a75e566173ee08a-text/javascript" src="{{asset('static/web/js/jquery.min.js')}}"></script>
    <script type="d36be3e83a75e566173ee08a-text/javascript" src="{{asset('static/web/js/jquery-cookie.js')}}"></script>
    <link rel="stylesheet" href="{{asset('static/web/css/publica9f2.css?v=2.6')}}">
    <link rel="stylesheet" href="{{asset('static/web/css/public_mobile3cc5.css?v=1.6')}}">

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
    @php
$generalSettings =  App\Models\GeneralSetting::whereIn('name', [
        'about_us', 'how_to_sell_us', 'phone_number_1', 'phone_number_2', 'phone_number_3',
        'email_1', 'email_2', 'email_3', 'facebook', 'telegram', 'discord' , 'viber' , 'skype'
    ])->pluck('value', 'name');

@endphp
        <div class="help-center">
            @if($generalSettings->get('how_to_sell_us'))
            <div class="site-info">
                <div class="container" style="position: relative;">
                    <h2>How To Sell Us</h2>
                    <section>
                        <p>{!! $generalSettings['how_to_sell_us'] !!}</p>
                    </section>
                </div>
            </div>
            @endif
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
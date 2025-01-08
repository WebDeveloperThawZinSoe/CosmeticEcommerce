<!DOCTYPE html>
<html lang="en">


<head>
	
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="HugeBinary">
	<meta name="robots" content="">
	<meta name="description" content="MoonCart Shop & eCommerce HTML Template">
	<meta property="og:title" content="MoonCart Shop & eCommerce HTML Template">
	<meta property="og:description" content="MoonCart Shop & eCommerce HTML Template">
	<meta name="format-detection" content="telephone=no">
	@php
		$logo = App\Models\GeneralSetting::where("name","logo")->first();
		$generalSettings = App\Models\GeneralSetting::whereIn('name', [
		'about_us', 'how_to_sell_us', 'phone_number_1', 'phone_number_2', 'phone_number_3',
		'email_1', 'email_2', 'email_3', 'facebook', 'telegram','address', 'discord' , 'viber' , 'skype'
		])->pluck('value', 'name');
		@endphp
	<!-- FAVICONS ICON -->
	<link rel="icon" type="image/x-icon" href="{{ asset('images/general_settings/' . $logo->value) }}">
	
	<!-- PAGE TITLE HERE -->
	<title> {{ env('APP_NAME') }}</title>
	
	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="{{asset('web/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('web/icons/themify/themify-icons.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('web/icons/flaticon/flaticon_mooncart.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('web/vendor/magnific-popup/magnific-popup.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('web/icons/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('web/vendor/swiper/swiper-bundle.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('web/vendor/animate/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('web/vendor/lightgallery/dist/css/lightgallery.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('web/vendor/lightgallery/dist/css/lg-thumbnail.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('web/vendor/lightgallery/dist/css/lg-zoom.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('web/css/style.css')}}">
	
	<!-- GOOGLE FONTS-->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">
	
	<!-- Sweet Alert 2 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
	<!-- Add Lightbox2 CSS and JS (use CDN or local files) -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

	<!-- Stripe -->
	<script src="https://js.stripe.com/v3/"></script>
</head>	
<body>

<div class="page-wraper">
 
	
	<!-- Header -->
    @include("web.header")
	<!-- Header End -->
    @yield('body')
	<!-- Footer -->
    @include("web.footer")
	<!-- Footer End -->
	
	<button class="scroltop" type="button"><i class="fas fa-arrow-up"></i></button>
	


	
</div>
<!-- Sweet Alert 2 -->
@if (session('success'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('success') }}',
        confirmButtonText: 'OK',
    });
    </script>
@endif

@if ($errors->any())
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Login Failed',
        html: `
                <ul style="text-align: left; padding-left:20px !important;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `,
        confirmButtonText: 'OK',
    });
    </script>
@endif
<!-- JAVASCRIPT FILES ========================================= -->
<script src="{{asset('web/js/jquery.min.js')}}"></script><!-- JQUERY MIN JS -->
<script src="{{asset('web/vendor/wow/wow.min.js')}}"></script><!-- WOW JS -->
<script src="{{asset('web/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script><!-- BOOTSTRAP MIN JS -->
<script src="{{asset('web/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script><!-- BOOTSTRAP SELECT MIN JS -->
<script src="{{asset('web/vendor/bootstrap-touchspin/bootstrap-touchspin.js')}}"></script><!-- BOOTSTRAP TOUCHSPIN JS -->

<script src="{{asset('web/vendor/magnific-popup/magnific-popup.js')}}"></script><!-- MAGNIFIC POPUP JS -->
<script src="{{asset('web/vendor/counter/waypoints-min.js')}}"></script><!-- WAYPOINTS JS -->
<script src="{{asset('web/vendor/counter/counterup.min.js')}}"></script><!-- COUNTERUP JS -->
<script src="{{asset('web/vendor/swiper/swiper-bundle.min.js')}}"></script><!-- SWIPER JS -->
<script src="{{asset('web/vendor/imagesloaded/imagesloaded.js')}}"></script><!-- IMAGESLOADED-->
<script src="{{asset('web/vendor/masonry/masonry-4.2.2.js')}}"></script><!-- MASONRY -->
<script src="{{asset('web/vendor/masonry/isotope.pkgd.min.js')}}"></script><!-- ISOTOPE -->
<script src="{{asset('web/vendor/countdown/jquery.countdown.js')}}"></script><!-- COUNTDOWN FUCTIONS  -->
<script src="{{asset('web/js/dz.carousel.js')}}"></script><!-- DZ CAROUSEL JS -->
<script src="{{asset('web/vendor/lightgallery/dist/lightgallery.min.js')}}"></script>
<script src="{{asset('web/vendor/lightgallery/dist/plugins/thumbnail/lg-thumbnail.min.js')}}"></script>
<script src="{{asset('web/vendor/lightgallery/dist/plugins/zoom/lg-zoom.min.js')}}"></script>
<script src="{{asset('web/js/dz.ajax.js')}}"></script><!-- AJAX -->
<script src="{{asset('web/js/custom.js')}}"></script><!-- CUSTOM JS -->


</body>

</html>
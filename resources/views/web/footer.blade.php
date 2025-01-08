@php
$logo = App\Models\GeneralSetting::where("name","logo")->first();
$generalSettings =  App\Models\GeneralSetting::whereIn('name', [
        'about_us', 'how_to_sell_us', 'phone_number_1', 'phone_number_2', 'phone_number_3',
        'email_1', 'email_2', 'email_3', 'facebook', 'telegram', 'discord' , 'viber' , 'skype','address'
    ])->pluck('value', 'name');

@endphp
<footer class="site-footer footer-dark style-1" >
		<!-- Footer Top -->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
						<div class="widget widget_about me-2">
							<div class="footer-logo logo-white">
								
							</div>
							<ul class="widget-address">
								@if(!empty($generalSettings->get('address')))
									<li>
										<p><span>Address</span>: {{ $generalSettings->get('address') }}</p>
									</li>
								@endif

								@if(!empty($generalSettings->get('email_1')))
									<li>
										<p><span>E-mail</span>: {{ $generalSettings->get('email_1') }}</p>
									</li>
								@endif

								@if(!empty($generalSettings->get('phone_number_1')))
									<li>
										<p><span>Phone</span>: {{ $generalSettings->get('phone_number_1') }}</p>
									</li>
								@endif
							</ul>
							<div class="dz-social-icon">
                        <ul>
                            @if($facebook = $generalSettings->get('facebook'))
                            <li><a class="fab fa-facebook-f" target="_blank" href="{{$facebook}}"></a></li>
                            @endif
                            @if($twitter = $generalSettings->get('twitter'))
                            <li><a class="fab fa-twitter" target="_blank" href="{{$twitter}}"></a></li>
                            @endif
                            @if($linkedin = $generalSettings->get('linkedin'))
                            <li><a class="fab fa-linkedin-in" target="_blank" href="{{$linkedin}}"></a></li>
                            @endif
                            @if($instagram = $generalSettings->get('instagram'))
                            <li><a class="fab fa-instagram" target="_blank" href="{{$instagram}}"></a></li>
                            @endif
                            @if($viber = $generalSettings->get('viber'))
                            <li><a class="fab fa-viber" target="_blank" href="{{$viber}}"></a></li>
                            @endif
                            @if($telegram = $generalSettings->get('telegram'))
                            <li><a class="fab fa-telegram" target="_blank" href="{{$telegram}}"></a></li>
                            @endif
                            @if($discord = $generalSettings->get('discord'))
                            <li><a class="fab fa-discord" target="_blank" href="{{$discord}}"></a></li>
                            @endif
                        </ul>
                    </div>
						</div>
					</div>
					
					<div class="col-xl-2 col-md-3 col-sm-4 col-6 wow fadeInUp" data-wow-delay="0.3s">
						<div class="widget widget_services">
							<h5 class="footer-title">Categories</h5>
							<ul>
								@php 
                                    $categories = App\Models\ProductCategory::orderBy("id","asc")->limit(6)->get();
                                @endphp
                                @foreach($categories as $category)
								<li><a href="/category/{{$category->id}}">{{$category->name}}</a></li>
								@endforeach
							</ul>   
						</div>
					</div>
					<div class="col-xl-2 col-md-3 col-sm-4 col-6 wow fadeInUp" data-wow-delay="0.3s">
						<div class="widget widget_services">
							<h5 class="footer-title">Pages</h5>
							<ul>
								<li><a href="/">Home</a></li>
								<li><a href="/products">Products</a></li>
								<li><a href="/brand">Brand</a></li>
								<li><a href="/about-us">About Us</a></li>
								<li><a href="/faq">FAQ</a></li>
								<li><a href="/contact-us">Contact Us</a></li>
							</ul>   
						</div>
					</div>
					<div class="col-xl-2 col-md-3 col-sm-4 col-6 wow fadeInUp" data-wow-delay="0.3s">
						<div class="widget widget_services">
							<h5 class="footer-title">Pages</h5>
							<ul>
								<li><a href="/">Home</a></li>
								<li><a href="/products">Products</a></li>
								<li><a href="/brand">Brand</a></li>
								<li><a href="/about-us">About Us</a></li>
								<li><a href="/faq">FAQ</a></li>
								<li><a href="/contact-us">Contact Us</a></li>
							</ul>   
						</div>
					</div>
					<div class="col-xl-3 col-md-3 col-sm-4 col-6 wow fadeInUp" data-wow-delay="0.4s">
						<div class="widget widget_services">
						
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d97431.69228191987!2d95.93869781802879!3d21.975350544038513!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30cb6d1bee31421b%3A0x682fd5de6585427f!2sChanayethazan%2C%20Mandalay!5e1!3m2!1sen!2smm!4v1732674987268!5m2!1sen!2smm" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Footer Top End -->
		
		<!-- Footer Bottom -->
		<div class="footer-bottom">
			<div class="container">
				<div class="row fb-inner wow fadeInUp" data-wow-delay="0.1s">
					<div class="col-lg-6 col-md-12 text-start"> 
						<p class="copyright-text">© {{ env('APP_NAME') }} {{ now()->year }} - All rights reserved.</p>

					</div>
					<div class="col-lg-6 col-md-12 text-end"> 
						<div class="d-flex align-items-center justify-content-center justify-content-md-center justify-content-xl-end">
							<span class="me-3">We Accept: </span>
							<img src="{{asset('web/images/footer-img.png')}}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Footer Bottom End -->
		
	</footer>
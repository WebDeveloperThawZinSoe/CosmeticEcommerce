@php
$generalSettings =  App\Models\GeneralSetting::whereIn('name', [
        'about_us', 'how_to_sell_us', 'phone_number_1', 'phone_number_2', 'phone_number_3',
        'email_1', 'email_2', 'email_3', 'facebook', 'telegram', 'discord' , 'viber' , 'skype'
    ])->pluck('value', 'name');

@endphp

@if($generalSettings->get('about_us'))
<!-- <div class="game-about">
    <div class="about-content container">
        <div class="about-text">
            <h2>About Us</h2>
            <section>
                <p>{!! $generalSettings['about_us'] !!}</p>
            </section>
        </div>
    </div>
</div> -->
@endif

@if($generalSettings->get('how_to_sell_us'))
<!-- <div class="site-info">
    <div class="container" style="position: relative;">
        <h2>How To Sell Us</h2>
        <section>
            <p>{!! $generalSettings['how_to_sell_us'] !!}</p>
        </section>
    </div>
</div> -->
@endif
@php 
        $logo = App\Models\GeneralSetting::where("name","logo")->first();
@endphp
<div class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="link logoLink" style="margin-top: -19px;">
                <ul>
                    <li>
                        <img src="{{ asset('images/general_settings/' . $logo->value) }}" alt="poecurrency.com">
                    </li>
                    <li>
                        <p>Copyright &copy; 2024, All Rights Reserved.</p>
                    </li>
                </ul>
            </div>

            <div class="link help">
                <p class="link-title">Site Map</p>
                <ul>
                    <li><i>.</i><a href="/home">Home</a></li>
                    <li><i>.</i><a href="/products">Products</a></li>
                    <li><i>.</i><a href="/faq">FAQ</a></li>
                    <li><i>.</i><a href="/sell-to-us">Sell To Us</a></li>
                    <li><i>.</i><a href="/member">Member</a></li>
                    <li><i>.</i><a href="/contact-us">Contact</a></li>
                </ul>
            </div>

            <div class="link ourProducts">
                <p class="link-title">Category</p>
                <ul>
                    @foreach(App\Models\ProductCategory::latest()->get() as $category)
                        <li><i>.</i><a href="/category/{{ $category->id }}" title="{{ $category->name }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="link contact">
                <p class="link-title">Contact</p>
                <ul>
                    @if($email = $generalSettings->get('email_1'))
                        <li class="email"><p><i class="ico"></i><span><a href="mailto:{{ $email }}">{{ $email }}</a></span></p></li>
                    @endif
                    @if($phone1 = $generalSettings->get('phone_number_1'))
                        <li class="whats"><p><i class="ico"></i><span>{{ $phone1 }}
                            @if($generalSettings->get('phone_number_2'))
                                , {{$generalSettings->get('phone_number_2')}}
                            @endif
                        </span></p></li>
                    @endif
                    @if($viber = $generalSettings->get('viber'))
                        <li class="viber"><p><i class="ico"></i><span>Viber : {{ $viber }}</span></p></li>
                    @endif
                    @if($skype = $generalSettings->get('skype'))
                        <li class="skype"><p><i class="ico"></i><span>Skype : {{ $skype }}</span></p></li>
                    @endif
                    <li class="shade">
                        @if($facebook = $generalSettings->get('facebook'))
                            <a target="_blank" href="{{ $facebook }}" class="facebook"><i class="ico"></i></a>
                        @endif
                        @if($discord = $generalSettings->get('discord'))
                            <a target="_blank" href="{{ $discord }}" class="discord"><i class="ico"></i></a>
                        @endif
                      
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="back-top-button footer-common-button">
        <i class="ico"></i>
    </div>
</div>

<div class="mobile_footer">

    <div class="sharewrap" style="display: flex; justify-content: center; align-items: center;">
        <div class="share">
            @if($facebook)
                <div><a href="https://www.facebook.com/poecurrencycom" class="facebook ico" title="POECurrency.com Facebook Official Account"></a></div>
            @endif
            @if($twitter = 'https://x.com/Poecurrency_com')
                <div><a href="{{ $twitter }}" class="twitter ico" title="POECurrency.com Twitter Official Account"></a></div>
            @endif
            @if($discord)
                <div><a href="{{ $discord }}" class="discord ico" title="POECurrency.com Discord Official Channel"></a></div>
            @endif
        </div>
    </div>
   
    <p class="foot-title">
      Copyright © 2024, All Rights Reserved.
    </p>
</div>

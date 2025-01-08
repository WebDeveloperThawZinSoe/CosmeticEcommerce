@extends('web.master')
@section('body')
@php
$generalSettings = App\Models\GeneralSetting::whereIn('name', [
'contact_image', 'about_us', 'contact_us', 'how_to_sell_us',
'phone_number_1', 'phone_number_2', 'phone_number_3',
'email_1', 'email_2', 'email_3', 'facebook', 'telegram',
'discord', 'viber', 'skype'
])->pluck('value', 'name');

$contact_image = $generalSettings['contact_image'] ?? "";
@endphp
<div class="page-content">
    <!--banner-->
    <div class="contact-bnr bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-info style-1 text-start text-white">
                        <h2 class="title wow fadeInUp" data-wow-delay="0.1s">DISCOVER US</h2>
                        <p class="text wow fadeInUp" data-wow-delay="0.2s">
                            <span class="text-decoration-underline text-white">
                                <a class="text-white" href="#">Our experts are available to answer any questions you
                                    might have. We’ve got the answers.</a>
                            </span>
                        </p>
                        <div class="contact-bottom wow fadeInUp" data-wow-delay="0.3s">
                            <div class="contact-left">
                                <h3>Call Us</h3>
                                <ul>
                                    @if(!empty($generalSettings['phone_number_1']))
                                    <li>{{ $generalSettings['phone_number_1'] }}</li>
                                    @endif
                                    @if(!empty($generalSettings['phone_number_2']))
                                    <li>{{ $generalSettings['phone_number_2'] }}</li>
                                    @endif
                                    @if(!empty($generalSettings['phone_number_3']))
                                    <li>{{ $generalSettings['phone_number_3'] }}</li>
                                    @endif
                                </ul>
                            </div>
                            <div class="contact-right">
                                <h3>Email Us</h3>
                                <ul>
                                    @if(!empty($generalSettings['email_1']))
                                    <li>{{ $generalSettings['email_1'] }}</li>
                                    @else
                                    <li>help@MoonCart.com</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-area1 style-1 m-r20 m-md-r0 wow fadeInUp" data-wow-delay="0.5s">
                        <form action="{{ url('/customer_feedback') }}" method="POST" enctype="multipart/form-data"
                            class="dz-form dzForm">
                            @csrf
                            <div class="dzFormMsg"></div>

                            <div class="form-group">
                                <label for="dzName" class="form-label">Your Name <span class="required">*</span></label>
                                <input required type="text" class="form-control" name="dzName" id="dzName">
                            </div>

                            <div class="form-group">
                                <label for="dzEmail" class="form-label">Email Address <span
                                        class="required">*</span></label>
                                <input required type="email" class="form-control" name="dzEmail" id="dzEmail">
                            </div>

                            <div class="form-group">
                                <label for="dzPhoneNumber" class="form-label">Phone Number <span
                                        class="required">*</span></label>
                                <input required type="tel" class="form-control" name="dzPhoneNumber" id="dzPhoneNumber">
                            </div>

                            <div class="form-group">
                                <label for="dzMessage" class="form-label">Message <span
                                        class="required">*</span></label>
                                <textarea name="dzMessage" rows="4" required class="form-control m-b10"
                                    id="dzMessage"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="image" class="form-label">Upload Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <br>
                            @auth
                            <button type="submit" class="btn w-100 btn-secondary btnhover">SUBMIT</button>
                            @endauth

                            @guest
                            <a href="/login" class="btn btn-secondary btnhover w-100">Login First</a>
                            @endguest
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-inner-2 pt-0">
        <div style="padding:0; margin:0;">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.893463310722!2d96.20124037461648!3d16.88669171703713!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c193fbf369bd69%3A0x14d8bc571b3c87b4!2sApex%20Myanmar%20Web%20Service!5e1!3m2!1sen!2smm!4v1730125475061!5m2!1sen!2smm"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</div>
@endsection
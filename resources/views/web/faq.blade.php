@extends('web.master')
@section('body')
<div class="page-content">
    <section class="content-inner main-faq-content" style="background-image:url({{asset('web/images/background/bg-shape.jpg')}});">
        <div class="container">
            <div class="row faq-head">
                <div class="col-12 text-center">
                    <h1 class="title wow fadeInUp" data-wow-delay="0.1s">Hi! How can we help you?</h1>
                    <nav aria-label="breadcrumb" class="breadcrumb-row wow fadeInUp" data-wow-delay="0.2s">
                        <ul class="breadcrumb mb-lg-4 mb-3">
                            <li class="breadcrumb-item"><a href="/"> Home</a></li>
                            <li class="breadcrumb-item">Faq</li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @php
                        $faqs = App\Models\FAQ::orderBy("id", "desc")->get();
                    @endphp
                    <div class="accordion dz-accordion accordion-sm wow fadeInUp" data-wow-delay="0.3s" id="accordionFaq">
                        @foreach($faqs as $key => $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading_{{$key}}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse_{{$key}}" aria-expanded="false" aria-controls="collapse_{{$key}}">
                                    {{ $faq->question }}
                                    <span class="toggle-close"></span>
                                </button>
                            </h2>
                            <div id="collapse_{{$key}}" class="accordion-collapse collapse" aria-labelledby="heading_{{$key}}"
                                data-bs-parent="#accordionFaq">
                                <div class="accordion-body">
                                    <p class="m-b0">{{ $faq->answer }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

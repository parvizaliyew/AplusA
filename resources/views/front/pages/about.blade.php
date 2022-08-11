@extends('front.layouts.master')

@section('lang')

@php
    $current = Route::current()->getName();
@endphp


@if (app()->getLocale()==='az')
<a href="{{ route(str_replace(app()->getLocale(), 'en', $current)) }}">
  {{__('lang.en')}}
</a>
<span>\</span>
<a href="{{ route(str_replace(app()->getLocale(), 'ru', $current)) }}">
  {{__('lang.rus')}}
</a>

@elseif(app()->getLocale()==='en')
<a href="{{ route(str_replace(app()->getLocale(), 'az', $current)) }}">
  {{__('lang.aze')}}
</a>
<span>\</span>
<a href="{{ route(str_replace(app()->getLocale(), 'ru', $current)) }}">
  {{__('lang.rus')}}
</a>

@elseif(app()->getLocale()==='ru')

<a href="{{ route(str_replace(app()->getLocale(), 'en', $current)) }}">
  {{__('lang.en')}}
</a>
<span>\</span>
<a href="{{ route(str_replace(app()->getLocale(), 'az', $current)) }}">
  {{__('lang.aze')}}
</a>
@endif
@endsection

@section('content')
       <!--About start-->
       <div class="pages container">
        <ul class="page-pagination">
            <li class="pag-item-head">
                <a href="./index.html">{{__('lang.esas_sehife')}}</a>
            </li>
            <span><img src="{{asset('front/')}}/./img/right-arrow.svg" alt=""></span>
            <li class="pag-item">
                {{__('lang.haqqimizda')}}
            </li>
        </ul>
    </div>
    <section id="about-page">
        <div class="head-text-div">
            <h1 class="back-head-text">
                {{__('lang.sirket_haqqinda_melumat')}}
            </h1>
            <h2 class="head-text">
                {{__('lang.sirket_haqqinda_melumat')}}
            </h2>
        </div>
        <div class="video wrapper">
            <div class="video">
                <a data-fancybox target="__blank" href="https://youtu.be/u3r3GDTd2q0">
                <img src="{{asset('front/')}}/img/vid-img.png" alt="">
                <div class="playpause"></div>
                </a>
            </div>
           
        </div>
        <div class="container">
            <div class="row">
                <div class="about-block">
                    <div data-aos="fade-right" data-aos-duration="1000" class="col-lg-6">
                        <p class="about-text">
                            {{__('lang.desc_1')}}
                        </p>
                        <br>
                        <p class="about-text">
                            {{__('lang.desc_2')}}
                        </p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="1000" class="col-lg-6">
                        <div class="img">
                            <div class="img-bg"></div>
                            <img src="{{asset('front/')}}/./img/about-img-1.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="about-block">
                    <div data-aos="fade-right" data-aos-duration="1000" class="col-lg-6">
                        <div class="img">
                            <div class="img-bg"></div>
                            <img src="{{asset('front/')}}/./img/about-img-2.png" alt="">
                        </div>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="1000" class="col-lg-6">
                        <p class="about-text">
                            {{__('lang.text_1')}}
                        </p>
                        <br>
                        <p class="about-text">
                            {{__('lang.text_2')}}
                        </p>
                        <br>
                        <p class="about-text">
                            {{__('lang.text_3')}}
                        </p>
                        <br>
                        <p class="about-text">
                            {{__('lang.text_4')}}
                        </p>
                    </div>
                </div>
                <div class="head-text-div certificate">
                    <h1 class="back-head-text">
                        {{__('lang.sertifkat')}}
                    </h1>
                    <h2 class="head-text">
                        {{__('lang.sertifkat')}}
                    </h2>
                </div>
                <div class="owl-carousel owl-theme certificate-slider">
                    @foreach ($certificates as $certificat)
                    <div class="item">
                        <img src="{{Voyager::image($certificat->image)}}" alt="">
                    </div>
                    @endforeach
                   
                </div>
                <div class="head-text-div ">
                    <h1 class="back-head-text logo-back-head">
                       {{__('lang.logonun_istifade')}}
                    </h1>
                    <h2 class="head-text">
                      {{__('lang.logonun_istifade')}}
                    </h2>
                </div>
                <div class="logo-rules">
                    <p class="rules-head">
                        {{__('lang.logonun_istifade')}}
                    </p>
                    <ul class="rules-list">
                        <li>
                            {{__('lang.logo_li1')}}
                        </li>
                        <li>
                            {{__('lang.logo_li2')}}
                        </li>
                        <li>
                            {{__('lang.logo_li3')}}
                        </li>
                        <li>
                            {{__('lang.logo_li4')}}
                        </li>
                    </ul>
                </div>
                <div class="logos">
                    <div class="img">
                        <img src="{{asset('front/')}}/./img/logo-1.png" alt="">
                    </div>
                    <div class="img">
                        <img src="{{asset('front/')}}/./img/logo-2.png" alt="">
                    </div>
                    <div class="img">
                        <img src="{{asset('front/')}}/./img/logo-3.png" alt="">
                    </div>
                    <div class="img">
                        <img src="{{asset('front/')}}/./img/logo-4.png" alt="">
                    </div>
                    <div class="img">
                        <img src="{{asset('front/')}}/./img/logo-5.png" alt="">
                    </div>
                    <div class="img">
                        <img src="{{asset('front/')}}/./img/logo-6.png" alt="">
                    </div>
                </div>
                <div class="head-text-div">
                    <h1 class="back-head-text">
                        {{__('lang.partnyor_sirketler')}}
                    </h1>
                    <h2 class="head-text">
                        {{__('lang.partnyor')}}
                    </h2>
                </div>
            </div>
        </div>
        <div class="partners-slider-div">
            <div class="container">
                <div class="row">
                    <div class="owl-carousel owl-theme partners-slider">
                        @foreach ($partners as $partner)
                        <div class="item">
                            <a href="#">
                                <img src="{{Voyager::image($partner->logo)}}" alt="">
                            </a>
                        </div>
                        @endforeach
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About end--> 
@endsection


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
    <!--Home Start-->
    <section id="home">
        <div class="swiper mySwiper homeSlider">
            <div class="swiper-wrapper">
                @foreach ($sliders as $slider)
                <div class="swiper-slide">
                    <img src="{{Voyager::image($slider->image)}}" alt="">
                    <div class="container">
                        <div class="row">
                            <h1 class="slider-head">{{$slider->getTranslatedAttribute('title', app()->getLocale(), 'az')}}</h1>
                           <div class="slider-body"> 
                            {!! $slider->getTranslatedAttribute('desc', app()->getLocale(), 'az') !!}
                        </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="container">
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <hr class="mouse-hr">
        <div class="mouse_scroll">
            <a href="#!">
                <div class="mouse">
                    <div>
                        <span class="m_scroll_arrows unu"></span>
                        <span class="m_scroll_arrows doi"></span>
                        <span class="m_scroll_arrows trei"></span>
                    </div>
                </div>    
            </a>
        </div>
    </section>
    <!--Home End-->
    <!--About Start-->
    <section id="about">
        <div class="container">
            <div class="row">
                <div data-aos="fade-right" data-aos-duration="1000" class="col-lg-7">
                    <img src="{{asset('front/')}}/./img/about-1.png" alt="">
                    <img src="{{asset('front/')}}/./img/about-2.png" alt="">
                </div>
                <div class="col-lg-5">
                    <div data-aos="fade-left" data-aos-duration="1000" class="head-text-div">
                        <h1 class="back-head-text">
                            {{__('lang.haqqinda')}}
                        </h1>
                        <h2 class="head-text">
                            {{__('lang.sirket_haqqinda_melumat')}}
                        </h2>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="1000" class="body-text">
                        <p>
                            {{__('lang.text_1')}}
                        </p>
                        <p>
                            {{__('lang.text_2')}}
                        </p>
                        <p>
                            {{__('lang.text_3')}}
                        </p>
                        <a class="detail" href="#">
                            {{__('lang.etrafli')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About End-->
    <!--Products Start-->
    <section id="products">
        <div class="container">
            <div class="row">
                <div class="head-text-div">
                    <h1 class="back-head-text">
                        {{__('lang.mehsullar_heller')}}
                    </h1>
                    <h2 class="head-text">
                        {{__('lang.mehsullar_heller')}}
                    </h2>
                </div>
                @foreach ($categories as $key=>$cat)
                    @if ($key%2==0)
                    <div data-aos="fade-right" data-aos-duration="1000" class="col-lg-5">
                        <img src="{{Voyager::image($cat->icon)}}" alt="">
                        <div class="card-body">
                            <h3 class="body-head">
                               . {{  $cat->getTranslatedAttribute('name',app()->getLocale(),'az') }}
                                <div class="things">
                                    <div class="arrow">
                                        <div class="curve"></div>
                                        <div class="point"></div>
                                    </div>
                                </div>
                            </h3>
                            <ul>
                                @php
                                    $products=App\Models\Product::with('translations')->where('category_id',$cat->id)->get();
                                @endphp
                            @foreach ($products as $pro)
                            @if($pro->product_id==null)
                                <li><a href="">
                                    {{$pro->getTranslatedAttribute('name',app()->getLocale(),'az')}}
                                </a></li>
                            @endif()
                            @endforeach
                                
                            </ul>
                        </div>
                    </div>
                    @else
                    <div data-aos="fade-left" data-aos-duration="1000" class="col-lg-5">
                        <img src="{{Voyager::image($cat->icon)}}" alt="">
                        <div class="card-body">
                            <h3 class="body-head">
                                {{  $cat->getTranslatedAttribute('name',app()->getLocale(),'az') }}
                                <div class="things">
                                    <div class="arrow">
                                        <div class="curve"></div>
                                        <div class="point"></div>
                                    </div>
                                </div>
                            </h3>
                            <ul>
                            @php
                                $products=App\Models\Product::with('translations')->where('category_id',$cat->id)->get();
                            @endphp
                               @foreach ($products as $pro)
                                 @if($pro->product_id==null)
                            <li><a href="">
                                {{$pro->getTranslatedAttribute('name',app()->getLocale(),'az')}}
                            </a></li>
                                 @endif()
                               @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                @endforeach   
            </div>
        </div>
    </section>
    <!--Products End-->
    <!--Infographic Start-->
    <div class="infographic container">
        <div class="row">
            <div class="head-text-div">
                <h1 class="back-head-text">
                   {{__('lang.info_qrafik')}}
                </h1>
                <h2 class="head-text">
                    {{__('lang.info_qrafik')}}
                </h2>
            </div>
        </div>
    </div>
    <section id="infographic">
        <div class="container">
            <div class="row">
                <div class="infographic">
                    <div class="container">
                        <div class="row" id="counter-container">
                            @foreach ($counters as $count)
                            <div>
                                <span class="count">{{$count->counter}}</span>
                                <p>{{$count->title}}</p>
                            </div>
                            @endforeach   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Infographic End-->
    <!--News Start-->
    <section id="news">
        <div class="container">
            <div class="row">
                <div class="head-text-div">
                    <h1 class="back-head-text">
                        {{__('lang.yeni_xeberler')}}
                    </h1>
                    <h2 class="head-text">
                        {{__('lang.yeni_xeberler')}}
                    </h2>
                </div>
                <div class="news-images">
                    @foreach ($news as $new)
                    <div class="news-img">
                        <a href="{{route('xeberler.'.app()->getLocale())}}#{{$new->id}}">
                            <img class="card-img" src="{{Voyager::image($new->thumbnail)}}" alt="">
                            <div class="text">
                                <p>
                                   {{$new->title}}
                                    <img src="{{asset('front/')}}/./img/Arrow 1.svg" alt="">
                                </p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    
                </div>
                <div class="detail-div">
                    <a class="detail" href="{{route('xeberler.'.app()->getLocale())}}">
                        {{__('lang.etrafli')}}
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--News End-->
    <!--Projects Start-->
    <section id="projects">
        <div class="container">
            <div class="row">
                <div class="head-text-div">
                    <h1 class="back-head-text">
                        {{__('lang.layiheler')}}
                    </h1>
                    <h2 class="head-text">
                        {{__('lang.layiheler')}}
                    </h2>
                </div>
                <div class="projects">
                    @foreach ($project_types as $prot)
                    <div data-aos="fade-up" data-aos-duration="1000" class="project-img">
                        <a href="{{route('layihe.'.app()->getLocale(),$prot->{'slug_'.app()->getLocale()})}}">
                            <img src="{{Voyager::image($prot->image)}}" alt="">
                            <div class="project-text">
                                <p>
                                    {{$prot->getTranslatedAttribute('name',app()->getLocale(),'az')}}
                                </p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                   
                   
                    <div class="detail-div">
                        <a class="detail" href="#">
                            {{__('lang.etrafli')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Projects End-->
    <!--Partners Start-->
    <section id="partners">
        <div class="container">
            <div class="row">
                <div class="head-text-div">
                    <h1 class="back-head-text">
                        {{__('lang.partnyor_sirketler')}}
                    </h1>
                    <h2 class="head-text">
                        {{__('lang.partnyor_sirketler')}}
                    </h2>
                </div>
                <div class="swiper swiper-container mySwiper partners">
                    <div class="swiper-wrapper partners-group">
                        @foreach ($partners as $partner)
                        <div class="swiper-slide">
                            <a href="#">
                                <img src="{{Voyager::image($partner->logo)}}" alt="">
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>
    <!--Partners End-->
    <!--Address Start-->
    <section id="address">
        <div class="container">
            <div class="row">
                <div class="head-text-div">
                    <h1 class="back-head-text">
                        {{__('lang.unvan')}}
                    </h1>
                    <h2 class="head-text">
                        {{__('lang.unvan')}}
                    </h2>
                </div>
                <div class="map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1519.3435931730787!2d49.8551929103577!3d40.39362507173783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307d6b94818acf%3A0x5318508b8a339b23!2sA%2BA%20Group%20Of%20Companies!5e0!3m2!1str!2s!4v1656929985662!5m2!1str!2s"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <button class="map-btn">
                        {{__('lang.bizimle_elaqe')}}
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!--Address End-->

@endsection
    
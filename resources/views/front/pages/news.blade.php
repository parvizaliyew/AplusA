@php
    $current = Route::current()->getName();
@endphp

@extends('front.layouts.master')

@section('content')

@section('lang')
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

        <!--News start-->
        <div class="pages container">
            <ul class="page-pagination">
                <li class="pag-item-head">
                    <a href="{{route('index.'.app()->getLocale())}}">{{__('lang.esas_sehife')}}</a>
                </li>
                <span><img src="{{asset('front/')}}/./img/right-arrow.svg" alt=""></span>
                <li class="pag-item">
                    {{__('lang.esas_sehife')}}
                </li>
            </ul>
        </div>
        <section id="news-page">
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
                    @foreach ($news as $new)
                    <div class="news-block">
                        <div data-aos="fade-right" data-aos-duration="1000" class="col-lg-4">
                            <div class="swiper mySwiper newsSlider">
                                <div class="swiper-wrapper">
                                    @foreach (json_decode($new->images,true) as $image)
                                    <div class="swiper-slide">
                                        <img src="{{Voyager::image($image)}}" alt="">
                                    </div>  
                                    @endforeach
                                                                
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                        <div data-aos="fade-right" data-aos-duration="1000" class="col-lg-8">
                            <div class="body-text">
                                <p class="date">
                                    {{ \Carbon\Carbon::parse($new->created_at)->format('M  d, Y')}}
                                </p>
                                <h3 class="news-head">
                                    {{$new->getTranslatedAttribute('title', app()->getLocale(), 'az');}}
                                </h3>
                                <p class="news-body">
                                    {{$new->getTranslatedAttribute('body', app()->getLocale(), 'az');}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                 

                    <div class="page-change">
                        <ul class="page-list">
                            @if($page > 1)
                            <li class="page-item">
                                <a href="?page={{ $page-1 }}"><</a>
                            </li>
                            @endif
                            @for($i=1; $i<= ceil($len/4); $i++)

                                <li class="{{ $page == $i ? 'active' : '' }} page-item">
                                    <a href="?page={{ $i }}">{{ $i }}</a>
                                </li>
                            @endfor
                            @if($page < ceil($len / 4))
                                <li class="page-item">
                                    <a href="?page={{ $page+1 }}">></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--News end-->
@endsection
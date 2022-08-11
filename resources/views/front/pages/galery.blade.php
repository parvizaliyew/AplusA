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

@section('title')
    {{__('lang.qalareya')}}
@endsection

@section('content')
    <!--Gallery start-->
    <div class="pages container">
        <ul class="page-pagination">
            <li class="pag-item-head">
                <a href="{{route('index.'.app()->getLocale())}}">{{__('lang.esas_sehife')}}</a>
            </li>
            <span><img src="{{asset('front/')}}/./img/right-arrow.svg" alt=""></span>
            <li class="pag-item">
                {{__('lang.qalareya')}}
            </li>
        </ul>
    </div>
    <section id="gallery-page">
        <div class="container">
            <div class="row">
                <div class="head-text-div">
                    <h1 class="back-head-text">
                        {{__('lang.qalareya')}}
                    </h1>
                    <h2 class="head-text">
                        {{__('lang.qalareya')}}
                    </h2>
                </div>
                <div class="gallery">
                    @foreach ($galeries as $gal)
                    @if(!$gal->galery_id)
                    <div class="col-lg-3">
                        <div class="gallery-card">
                            <a href="{{route('galery.'.app()->getLocale(),$gal->{'slug_'.app()->getLocale()})}}">
                                <div class="gallery-img">
                                    <img src="{{Voyager::image($gal->image)}}" alt="">
                                </div>
                                <div class="gallery-text">
                                    <p class="gallery-card-text">
                                        {{$gal->getTranslatedAttribute('title',app()->getLocale(),'az')}}
                                    </p>
                                    @php
                                    $galery=App\Models\Galery::where('galery_id',$gal->id)->get()->count() ;

                                    @endphp
                                    <span>
                                       {{ $galery }} 
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endif
                    
                    @endforeach
                   
                </div>
            </div>
        </div>
    </section>
    <!--Gallery end-->
   
@endsection
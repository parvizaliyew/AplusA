@extends('front.layouts.master')

@section('lang')

@php
$current = Route::current()->getName();
if (app()->getLocale()==='az' && Request::segment(1)==='qalereya') {
    $variable=Request::segment(2);
}
if (app()->getLocale()==='en' && Request::segment(2)==='gallery') {
    $variable=Request::segment(3);
}
if (app()->getLocale()==='ru' && Request::segment(2)==='galereya') {
    $variable=Request::segment(3);
}

$galery_lang=App\Models\Galery::where('slug_az',$variable)->orWhere('slug_en',$variable)->orWhere('slug_ru',$variable)->first();

@endphp
@if (app()->getLocale()==='az')
<a href="/en/gallery/{{$galery_lang->slug_en}}">
  {{__('lang.en')}}
</a> 
<span>\</span>
<a href="/ru/galereya/{{$galery_lang->slug_ru}}">
  {{__('lang.rus')}}
</a>

@elseif(app()->getLocale()==='en')
<a href="/qalereya/{{$galery_lang->slug_az}}">
  {{__('lang.aze')}}
</a>
<span>\</span>
<a href="/ru/galereya/{{$galery_lang->slug_ru}}">
  {{__('lang.rus')}}
</a>

@elseif(app()->getLocale()==='ru')

<a href="/en/gallery/{{$galery_lang->slug_en}}">
  {{__('lang.en')}}
</a>
<span>\</span>
<a href="/qalereya/{{$galery_lang->slug_az}}">
  {{__('lang.aze')}}
</a>

@endif
    
@endsection


@section('content')
  
    <!--Gallery2 start-->
    <div class="pages container">
        <ul class="page-pagination">
            <li class="pag-item-head">
                <a href="./index.html">{{__('lang.esas_sehife')}}</a>
            </li>
            <span><img src="./img/right-arrow.svg" alt=""></span>
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
                <div class="gallery2">
                    <div class="col-lg-3">
                        <div class="gallery-card">
                            <a href="{{route('galery.'.app()->getLocale(),$galery->{'slug_'.app()->getLocale()})}}">
                                <div class="gallery-img">
                                    <img src="{{Voyager::image($galery->image)}}" alt="">
                                </div>
                                <div class="gallery-text">
                                    <p class="gallery-card-text">
                                        {{$galery->getTranslatedAttribute('title',app()->getLocale(),'az')}}
                                    </p>
                                    <span>
                                        {{$sub_galery_count}}
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                    @foreach ($sub_galeries as $gal)
                    <div class="col-lg-3">
                        <div class="gallery-card">
                            <a href="./gallery2.html">
                                <div class="gallery-img">
                                    <a href="{{Voyager::image($gal->image)}}" data-fancybox="group">
                                        <img src="{{Voyager::image($gal->image)}}" alt="">
                                    </a>
                                </div>
                                <div class="gallery-text">
                                    <p class="gallery-card-text">
                                        {{$gal->getTranslatedAttribute('title',app()->getLocale(),'az')}}
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
                <hr>
                <div class="gallery">
                    @foreach ($galeries as $galery)
                    @if (!$galery->galery_id)
                    <div class="col-lg-3">
                        <div class="gallery-card">
                            <a href="{{route('galery.'.app()->getLocale(),$galery->{'slug_'.app()->getLocale()})}}">
                                <div class="gallery-img">
                                    <img src="{{Voyager::image($galery->image)}}" alt="">
                                </div>
                                <div class="gallery-text">
                                    <p class="gallery-card-text">
                                        {{$galery->getTranslatedAttribute('title',app()->getLocale(),'az')}}
                                    </p>
                                    <span>
                                        @php
                                    $galery=App\Models\Galery::where('galery_id',$galery->id)->get()->count() ;

                                        @endphp
                                        {{$galery}}
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
    <!--Gallery2 end-->
    <!--Footer Start-->
@endsection
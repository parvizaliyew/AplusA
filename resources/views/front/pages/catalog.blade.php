@extends('front.layouts.master')

@section('lang')
@php
$current = Route::current()->getName();
if (app()->getLocale()==='az' && Request::segment(1)==='mehsullar-ve-heller') {
    $variable=Request::segment(2);
}
if (app()->getLocale()==='en' && Request::segment(2)==='products-and-solutions') {
    $variable=Request::segment(3);
}
if (app()->getLocale()==='ru' && Request::segment(2)==='produkti-i-resheniya') {
    $variable=Request::segment(3);
}

$categories=App\Models\Category::where('slug_az',$variable)->orWhere('slug_en',$variable)->orWhere('slug_ru',$variable)->get();

@endphp
@if (app()->getLocale()==='az')
<a href="/en/products-and-solutions/@foreach($categories as $cat){{$cat->slug_en}} @endforeach">
  {{__('lang.en')}}
</a> 
<span>\</span>
<a href="/ru/produkti-i-resheniya/@foreach($categories as $cat){{$cat->slug_ru}} @endforeach">
  {{__('lang.rus')}}
</a>

@elseif(app()->getLocale()==='en')
<a href="/mehsullar-ve-heller/@foreach ($categories as $cat){{$cat->slug_az}} @endforeach">
  {{__('lang.aze')}}
</a>
<span>\</span>
<a href="/ru/produkti-i-resheniya/@foreach ($categories as $cat){{$cat->slug_ru}} @endforeach">
  {{__('lang.rus')}}
</a>

@elseif(app()->getLocale()==='ru')

<a href="/en/products-and-solutions/@foreach ($categories as $cat){{$cat->slug_en}} @endforeach">
  {{__('lang.en')}}
</a>
<span>\</span>
<a href="/mehsullar-ve-heller/@foreach ($categories as $cat){{$cat->slug_az}} @endforeach">
  {{__('lang.aze')}}
</a>

@endif
@endsection

@section('content')



    <!--Purpose start-->
    <div class="pages container">
        <ul class="page-pagination">
            <li class="pag-item-head">
                <a href="{{route('index.'.app()->getLocale())}}">{{__('lang.esas_sehife')}}</a>
            </li>
            <span><img src="{{asset('front/')}}/./img/right-arrow.svg" alt=""></span>
            <li class="pag-item">
               {{__('lang.mehsullar_heller')}}
            </li>
            <span><img src="{{asset('front/')}}/./img/right-arrow.svg" alt=""></span>
            <li class="pag-item">
               {{$category->getTranslatedAttribute('name',app()->getLocale(),'az')}}
            </li>
        </ul>
    </div>
    <section id="products-page">
        <div class="container">
            <div class="row">
                <div class="head-text-div">
                    <h1 class="back-head-text">
                        {{$category->getTranslatedAttribute('name',app()->getLocale(),'az')}}
                    </h1>
                    <h2 class="head-text">
                        {{$category->getTranslatedAttribute('name',app()->getLocale(),'az')}}
                    </h2>
                </div>
                <div class="product-blocks">
                    @foreach ($products as $key=>$product)
                    @if($product->product_id==null)
                        @if ($key%2==0)
                        <div class="block">
                            <div class="col-lg-4">
                                <div class="slider-bg"></div>
                                <div class="swiper mySwiper productSlider">
                                    <div class="swiper-wrapper">
                                        @foreach(json_decode($product->images, true) as $image)
                                        <div class="swiper-slide">
                                            <img src="{{ Voyager::image($image) }}" />
                                        </div>
                                       @endforeach  
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <h2 class="card-head-1">
                                    {{$product->getTranslatedAttribute('name', app()->getLocale(), 'az')}}
                                </h2>
                                <h3 class="card-head-2">
                                    {{$product->getTranslatedAttribute('title', app()->getLocale(), 'az')}}
                                </h3>
                                <p class="card-body">
                                    {{$product->getTranslatedAttribute('desc', app()->getLocale(), 'az')}}
                                </p>
                                @if($product->link)
                                <a href="{{$product->link}}"  >
                                <button class="card-btn">{{__('lang.kecid_edin')}}</button>
                                </a>
                                @endif
                                @if($product->sub_products > 0)
                                <a href="{{route('mehsul.'.app()->getLocale() ,[$category->{'slug_'.app()->getLocale()} ,
                                    $product->{'slug_'.app()->getLocale()} ] )}}"  >
                                    <button class="card-btn">{{__('lang.etrafli')}}</button>
                                </a>
                                @endif
                                
                            </div>
                        </div>
                        @else 
                        <div class="block">
                            <div class="col-lg-5">
                                <h2 class="card-head-1">
                                    {{$product->getTranslatedAttribute('name', app()->getLocale(), 'az')}}
                                </h2>
                                <h3 class="card-head-2">
                                    {{$product->getTranslatedAttribute('title', app()->getLocale(), 'az')}}

                                </h3>
                                <p class="card-body">
                                    {{$product->getTranslatedAttribute('desc', app()->getLocale(), 'az')}}
                                </p>
                                @if($product->link)
                                <a href="{{$product->link}}" >
                                <button class="card-btn">{{__('lang.kecid_edin')}}</button>
                                </a>
                                @endif
                                @if($product->link)
                                <a href="{{$product->link}}"  >
                                <button class="card-btn">{{__('lang.kecid_edin')}}</button>
                                </a>
                                @endif

                                @if($product->sub_products > 0)
                                <a href="{{route('mehsul.'.app()->getLocale() ,[$category->{'slug_'.app()->getLocale()} ,
                                    $product->{'slug_'.app()->getLocale()} ] )}}" style="margin-right: 20px;" >
                                    <button class="card-btn">{{__('lang.etrafli')}}</button>
                                </a>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <div class="slider-bg"></div>
                                <div class="swiper mySwiper productSlider">
                                    <div class="swiper-wrapper">
                                        @foreach(json_decode($product->images, true) as $image)
                                        <div class="swiper-slide">
                                            <img src="{{ Voyager::image($image) }}" />
                                        </div>
                                       @endforeach 
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endif
                    @endforeach
                    <div class="product-button">
                        <a href="{{route('contact.'.app()->getLocale())}}">
                            <button class="contact-btn">{{__('lang.bizimle_elaqe')}}</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Purpose end-->

@endsection
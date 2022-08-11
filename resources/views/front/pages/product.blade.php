@extends('front.layouts.master')

@section('lang')
@php
$current = Route::current()->getName();
if (app()->getLocale()==='az' && Request::segment(1)==='mehsul-ve-hell') {
    $variable=Request::segment(2);
    $product=Request::segment(3);
}
if (app()->getLocale()==='en' && Request::segment(2)==='product-and-solution') {
    $variable=Request::segment(3);
    $product=Request::segment(4);

}
if (app()->getLocale()==='ru' && Request::segment(2)==='produkt-i-resheniya') {
    $variable=Request::segment(3);
    $product=Request::segment(4);
}

$category=App\Models\Category::withTranslations()->where('slug_az',$variable)->orWhere('slug_en',$variable)->orWhere('slug_ru',$variable)->first();
$product=App\Models\Product::where('slug_az',$product)->orWhere('slug_en',$product)->orWhere('slug_ru',$product)->first();
//$sub_products=App\Models\Product::where('product_id',$product->id)->get();


@endphp
@if (app()->getLocale()==='az')
<a href="/en/product-and-solution/{{$category->slug_en}}/{{$product->slug_en}}">
  {{__('lang.en')}}
</a> 
<span>\</span>
<a href="/ru/produkt-i-resheniya/{{$category->slug_ru}}/{{$product->slug_ru}}">
  {{__('lang.rus')}}
</a>

@elseif(app()->getLocale()==='en')
<a href="/mehsul-ve-hell/{{$category->slug_az}}/{{$product->slug_az}}">
  {{__('lang.aze')}}
</a>
<span>\</span>
<a href="/ru/produkt-i-resheniya/{{$category->slug_ru}}/{{$product->slug_ru}}">
  {{__('lang.rus')}}
</a>

@elseif(app()->getLocale()==='ru')

<a href="/en/product-and-solution/{{$category->slug_en}}/{{$product->slug_en}}">
  {{__('lang.en')}}
</a>
<span>\</span>
<a href="/mehsul-ve-hell/{{$category->slug_az}}/{{$product->slug_az}}">
  {{__('lang.aze')}}
</a>

@endif
@endsection

@section('content')
      <!--Purpose start-->
      <div class="pages container">
        <ul class="page-pagination">
            <li class="pag-item-head">
                <a href="./index.html">{{__('lang.esas_sehife')}}</a>
            </li>
            <span><img src="{{asset('front/')}}./img/right-arrow.svg" alt=""></span>
            <li class="pag-item">
                {{__('lang.mehsullar_heller')}}
            </li>
            <span><img src="{{asset('front/')}}./img/right-arrow.svg" alt=""></span>
            <li class="pag-item">
                {{$category->getTranslatedAttribute('name',app()->getLocale(),'az')}}
            </li>
            <span><img src="{{asset('front/')}}./img/right-arrow.svg" alt=""></span>
            <li class="pag-item">
                {{ $product->getTranslatedAttribute('title',app()->getLocale(),'az') }}
            </li>
        </ul>
    </div>
    <section id="products-page">
        <div class="container">
            <div class="row">
                <div class="head-text-div">
                    <h1 class="back-head-text">
                        {{ $product->getTranslatedAttribute('title',app()->getLocale(),'az') }}
                    </h1>
                    <h2 class="head-text">
                        {{ $product->getTranslatedAttribute('title',app()->getLocale(),'az') }}
                    </h2>
                </div>
                <div class="product-blocks">
                    @foreach ($sub_products as $key=>$pro)
                        @if($key%2==0)
                        <div class="block">
                            <div class="col-lg-4">
                                <div class="slider-bg"></div>
                                <div class="swiper mySwiper productSlider">
                                    <div class="swiper-wrapper">
                                        @foreach(json_decode($pro->images, true) as $image)
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
                                    {{$pro->getTranslatedAttribute('name', app()->getLocale(), 'az')}}
                                </h2>
                                <h3 class="card-head-2">
                                    {{$pro->getTranslatedAttribute('title', app()->getLocale(), 'az')}}
                                </h3>
                                <p class="card-body">
                                    {{$pro->getTranslatedAttribute('desc', app()->getLocale(), 'az')}}
                                </p>
                                @if($pro->link)
                                <a href="{{$pro->link}}" style="margin-right: 20px;" >
                                <button class="card-btn">{{__('lang.kecid_edin')}}</button>
                                </a>
                                @endif
                            </div>
                        </div>
                      @else

                      <div class="block">
                        <div class="col-lg-5">
                            <h2 class="card-head-1">
                                {{$pro->getTranslatedAttribute('name', app()->getLocale(), 'az')}}
                            </h2>
                            <h3 class="card-head-2">
                                {{$pro->getTranslatedAttribute('title', app()->getLocale(), 'az')}}
                            </h3>
                            <p class="card-body">
                                {{$pro->getTranslatedAttribute('desc', app()->getLocale(), 'az')}}
                            </p>
                            @if($pro->link)
                                <a href="{{$pro->link}}" style="margin-right: 20px;" >
                                <button class="card-btn">{{__('lang.kecid_edin')}}</button>
                                </a>
                            @endif
                        </div>
                        <div class="col-lg-4">
                            <div class="slider-bg"></div>
                            <div class="swiper mySwiper productSlider">
                                <div class="swiper-wrapper">
                                    @foreach(json_decode($pro->images, true) as $image)
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
  
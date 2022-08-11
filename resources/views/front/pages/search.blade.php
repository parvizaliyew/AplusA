@extends('front.layouts.master')

@php
     if($product !==null)
        {
        $products = App\Models\Product::where('product_id',$product->id)->withTranslations()->get();

        }
@endphp

@section('content')
    @if ($product !==null)
    <section id="products-page">
        <div class="container">
            <div class="row">
                <div class="head-text-div">
                    <h1 class="back-head-text">
                        {{$product->getTranslatedAttribute('title',app()->getLocale(),'az')}} 
                    </h1>
                    <h2 class="head-text">
                        {{$product->getTranslatedAttribute('title',app()->getLocale(),'az')}} 
                    </h2>
                </div>
                <div class="product-blocks">
                    @foreach ($products as $key=>$pro)
                        @if ($key % 2==0)
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
                                <form action="#" method="get">
                                    <button class="card-btn">
                                        Keçid edin
                                    </button>
                                </form>
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
                                <form action="#" method="get">
                                    <button class="card-btn">
                                        Keçid edin
                                    </button>
                                </form>
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
                        <form action="./contact.html" method="get">
                            <button class="product-btn">
                                Bizimlə Əlaqə
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Purpose end-->
    @else
    <section id="products-page">
        <div class="container">
            <div class="row">
                <div class="head-text-div">
                    <h1 class="back-head-text">
                        bele bir mehsul yoxdu
                    </h1>
                    <h2 class="head-text">
                        bele bir mehsul yoxdu
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <!--Purpose end-->
    @endif
    <!--Purpose start-->
    
@endsection
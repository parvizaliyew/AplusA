@extends('front.layouts.master')

@section('lang')
@php
$current = Route::current()->getName();
if (app()->getLocale()==='az' && Request::segment(1)==='layihe') {
    $variable=Request::segment(2);
}
if (app()->getLocale()==='en' && Request::segment(2)==='project') {
    $variable=Request::segment(3);
}
if (app()->getLocale()==='ru' && Request::segment(2)==='proekt') {
    $variable=Request::segment(3);
}

$projectss=App\Models\ProjectType::where('slug_az',$variable)->orWhere('slug_en',$variable)->orWhere('slug_ru',$variable)->get();

@endphp
@if (app()->getLocale()==='az')
<a href="/en/project/@foreach($projectss as $pro){{$pro->slug_en}} @endforeach">
  {{__('lang.en')}}
</a> 
<span>\</span>
<a href="/ru/proekt/@foreach($projectss as $pro){{$pro->slug_ru}} @endforeach">
  {{__('lang.rus')}}
</a>

@elseif(app()->getLocale()==='en')
<a href="/layihe/@foreach ($projectss as $pro){{$pro->slug_az}} @endforeach">
  {{__('lang.aze')}}
</a>
<span>\</span>
<a href="/ru/proekt/@foreach ($projectss as $pro){{$pro->slug_ru}} @endforeach">
  {{__('lang.rus')}}
</a>

@elseif(app()->getLocale()==='ru')

<a href="/en/project/@foreach ($projectss as $pro){{$pro->slug_en}} @endforeach">
  {{__('lang.en')}}
</a>
<span>\</span>
<a href="/layihe/@foreach ($projectss as $pro){{$pro->slug_az}} @endforeach">
  {{__('lang.aze')}}
</a>

@endif
@endsection

    @section('content')
    <div class="pages container">
        <ul class="page-pagination">
            <li class="pag-item-head">
                <a href="./index.html">{{__('lang.esas_sehife')}}</a>
            </li>
            <span><img src="./img/right-arrow.svg" alt=""></span>
            <li class="pag-item">
                {{__('lang.layihe')}}
            </li>
        </ul>
    </div>
    <section id="projects-page">
        <div class="container">
            <div class="row">
                @if (Request::segment(2) ==='cari' || Request::segment(3) ==='current' || Request::segment(3) ==='tekushiye')
                <div class="current">
                    <div class="head-text-div">
                        <h1 class="back-head-text">
                            {{__('lang.cari')}}
                        </h1>
                        <h2 class="head-text">
                            {{__('lang.cari')}}
                        </h2>
                    </div>
                    <div class="current-projects">
                        @foreach ($projects as $pro)
                        <div class="col-lg-4">
                            <div class="project-card">
                                <div class="project-card-img">
                                    <img src="{{Voyager::image($pro->image)}}" alt="">
                                </div>
                                <div class="project-card-text">
                                    <p class="type-text">
                                        {{__('lang.videomusahide')}}
                                    </p>
                                    <h2 class="project-head-text">
                                        {{$pro  ->getTranslatedAttribute('title',app()->getLocale(),'az')}}                                    </h2>
                                    <p class="project-body-text">
                                        {{$pro  ->getTranslatedAttribute('desc',app()->getLocale(),'az')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        
                        <form action="./contact.html" method="get">
                            <button class="contact-btn">
                                {{__('lang.bizimle_elaqe')}}
                            </button>
                        </form>
                    </div>
                </div>
                <div class="finished">
                    <div class="container">
                        <div class="row">
                            <div class="head-text-div">
                                <h1 class="back-head-text">
                                    {{__('lang.bitmis')}}
                                </h1>
                                <h2 class="head-text">
                                    {{__('lang.bitmis')}}
                                </h2>
                            </div>

                            <div class="finished-projects">
                                @foreach ($projects1 as $pro1)

                                <div class="col-lg-6-pr">
                                    <div class="project-card">
                                        <div class="project-card-img">
                                            <img src="{{Voyager::image($pro1->image)}}" alt="">
                                        </div>
                                        <div class="project-card-text">
                                            <p class="type-text">
                                                {{__('lang.videomusahide')}}
                                            </p>
                                            <h2 class="project-head-text">
                                                {{$pro1->getTranslatedAttribute('title',app()->getLocale(),'az')}}
                                            </h2>
                                            <p class="project-body-text">
                                                {{$pro1->getTranslatedAttribute('desc',app()->getLocale(),'az')}}

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                <form action="./contact.html" method="get">
                                    <button class="contact-btn">
                                        {{__('lang.bizimle_elaqe')}}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                @endif

                @if (Request::segment(2)==='bitmis' || Request::segment(3)==='finished' || Request::segment(3)==='zavershenniye')
                <div class="finished">
                    <div class="container">
                        <div class="row">
                            <div class="head-text-div">
                                <h1 class="back-head-text">
                                    {{__('lang.bitmis')}}
                                </h1>
                                <h2 class="head-text">
                                    {{__('lang.bitmis')}}
                                </h2>
                            </div>
                            <div class="finished-projects">
                                @foreach ($projects as $pro)
                                <div class="col-lg-6-pr">
                                    <div class="project-card">
                                        <div class="project-card-img">
                                            <img src="{{Voyager::image($pro->image)}}" alt="">
                                        </div>
                                        <div class="project-card-text">
                                            <p class="type-text">
                                                {{__('lang.videomusahide')}}
                                            </p>
                                            <h2 class="project-head-text">
                                                {{$pro->getTranslatedAttribute('desc',app()->getLocale(),'az')}}
                                            </h2>
                                            <p class="project-body-text">
                                                {{$pro->getTranslatedAttribute('desc',app()->getLocale(),'az')}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                                
                                <form action="./contact.html" method="get">
                                    <button class="contact-btn">
                                        {{__('lang.bizimle_elaqe')}}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="current">
                    <div class="head-text-div">
                        <h1 class="back-head-text">
                            {{__('lang.cari')}}
                        </h1>
                        <h2 class="head-text">
                            {{__('lang.cari')}}
                        </h2>
                    </div>
                    <div class="current-projects">
                        @foreach ($projects1 as $pro1)
                        <div class="col-lg-4">
                            <div class="project-card">
                                <div class="project-card-img">
                                    <img src="{{Voyager::image($pro1->image)}}" alt="">
                                </div>
                                <div class="project-card-text">
                                    <p class="type-text">
                                        {{__('lang.videomusahide')}}
                                    </p>
                                    <h2 class="project-head-text">
                                        {{$pro1->getTranslatedAttribute('desc',app()->getLocale(),'az')}}
                                    </h2>
                                    <p class="project-body-text">
                                        {{$pro1 ->getTranslatedAttribute('desc',app()->getLocale(),'az')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        
                        <form action="./contact.html" method="get">
                            <button class="contact-btn">
                                {{__('lang.bizimle_elaqe')}}
                            </button>
                        </form>
                    </div>
                </div>  
                @endif
               
            </div>
        </div>
    </section>
    <!--Projects end-->
    @endsection
   
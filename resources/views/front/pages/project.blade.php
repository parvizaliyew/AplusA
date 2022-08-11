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

    <!--Projects start-->
    <div class="pages container">
        <ul class="page-pagination">
            <li class="pag-item-head">
                <a href="./index.html">{{__('lang.esas_sehife')}}</a>
            </li>
            <span><img src="{{asset('front/')}}/./img/right-arrow.svg" alt=""></span>
            <li class="pag-item">
                {{__('lang.layiheler')}}
            </li>
        </ul>
    </div>
    <section id="projects-page">
        <div class="container">
            <div class="row">
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
                        @foreach ($projects_cari as $project)
                        
                        <div class="col-lg-4">
                            <div class="project-card">
                                <div class="project-card-img">
                                    <img src="{{Voyager::image($project->image)}}" alt="">
                                </div>
                                <div class="project-card-text">
                                    <p class="type-text">
                                        {{__('lang.videomusahide')}}
                                    </p>
                                    <h2 class="project-head-text">
                                        {{$project->getTranslatedAttribute('title', app()->getLocale(), 'az')}}
                                    </h2>
                                    <p class="project-body-text">
                                        {{$project->getTranslatedAttribute('desc', app()->getLocale(), 'az')}}
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
                                @foreach ($projects_bitmis as $project)
                                   
                                    <div class="col-lg-6-pr">
                                        <div class="project-card">
                                            <div class="project-card-img">
                                                <img src="{{Voyager::image($project->image)}}" alt="">
                                            </div>
                                            <div class="project-card-text">
                                                <p class="type-text">
                                                    {{__('lang.videomusahide')}}
                                                </p>
                                                <h2 class="project-head-text">
                                                    {{$project->getTranslatedAttribute('title', app()->getLocale(), 'az')}}
                                                </h2>
                                                <p class="project-body-text">
                                                    {{$project->getTranslatedAttribute('desc', app()->getLocale(), 'az')}}
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
            </div>
        </div>
    </section>
    <!--Projects end-->
  
@endsection
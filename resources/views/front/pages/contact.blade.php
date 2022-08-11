@php
    $current = Route::current()->getName();
@endphp

@extends('front.layouts.master')

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

 @section('content')
        <!--Contact start-->
    <div class="pages container">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                <ul class="page-pagination">
            <li class="pag-item-head">
                <a href="{{route('index.'.app()->getLocale()) }}">{{__('lang.esas_sehife')}}</a>
            </li>
            <span><img src="./img/right-arrow.svg" alt=""></span>
            <li class="pag-item">
                {{__('lang.contact')}}
            </li>
        </ul>
    </div>
    <section id="contact-page">
        <div class="container">
            <div class="row">
                <div class="contact-main">
                    <div class="col-lg-6-pr">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3038.6796427528393!2d49.854521956458875!3d40.393792237934385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307d6b94818acf%3A0x5318508b8a339b23!2sA%2BA%20Group%20Of%20Companies!5e0!3m2!1str!2s!4v1657274736772!5m2!1str!2s"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-lg-6-pr">
                        <div class="head-text-div">
                            <h1 class="back-head-text">
                                A+A Security
                            </h1>
                            <h2 class="head-text">
                                A+A Security
                            </h2>
                        </div>
                        <div class="form-group">
                            <form action="{{route('contact_post')}}" method="post">
                                @csrf
                                @if(Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success')}}</div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            @if($error == 'name_required')
                                                <li>{{__('lang.name_required')}}</li>
                                            @elseif($error == 'name_max')
                                                <li>{{__('lang.name_max')}}</li>
                                            @elseif($error == 'sur_name_required')
                                                <li>{{__('lang.sur_name_required')}}</li>
                                            @elseif($error == 'sur_name_max')
                                                <li>{{__('lang.sur_name_max')}}</li>
                                            @elseif($error == 'email_required')
                                                <li>{{__('lang.email_required')}}</li>
                                            @elseif($error == 'email_max')
                                                <li>{{__('lang.email_max')}}</li>
                                            @elseif($error == 'phone_required')
                                                <li>{{__('lang.phone_required')}}</li>
                                            @elseif($error == 'phone_max')
                                                <li>{{__('lang.phone_max')}}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </div>
                                <div class="head-inputs">
                                    <input class="contact-input"   name="name" type="text" placeholder="{{__('lang.ad')}}">
                                    <input class="contact-input"  name="surname" type="text" placeholder="{{__('lang.soyad')}}">
                                </div>
                                <div class="body-inputs">
                                    <select class="number-select" name="prefix">
                                        <option value="050" selected>050</option>
                                        <option value="051">051</option>
                                        <option value="055">055</option>
                                        <option value="099">099</option>
                                        <option value="070">070</option>
                                        <option value="077">077</option>
                                    </select>
                                    <input class="contact-input" name="phone" type="tel" placeholder="XXX – XX – XX"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{2}">
                                    <input class="contact-input" name="email" type="email" placeholder="{{__('lang.epoct')}}">
                                </div>
                                <textarea class="contact-input"  name="msj" id="" cols="30" rows="10"
                                    placeholder="{{__('lang.muraciet')}}"></textarea>
                                <div class="end-inputs">
                                    <button type="submit" class="send-btn">
                                        {{__('lang.gonder')}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <ul class="contact-foot">
                    <li>
                        {{$contact->getTranslatedAttribute('address', app()->getLocale(), 'az');}}
                    </li>
                    <span>
                        /
                    </span>
                    <li>
                        <a href="mailTo:sales@aplusa-security.com">
                            {{$contact->email}}
                        </a>
                    </li>
                    <span>
                        /
                    </span>
                    <li>
                        <a href="tel:+{{str_replace(' ','',$contact->phone_first)}}">
                            {{$contact->phone_first}}
                        </a>
                    </li>
                    <span>
                        /
                    </span>
                    <li>
                        <a href="tel:+{{str_replace(' ','',$contact->phone_second)}}">
                            {{$contact->phone_second}}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--Contact end-->

 @endsection
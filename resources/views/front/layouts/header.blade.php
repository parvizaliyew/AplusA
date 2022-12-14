@php

$current = Route::current()->getName();
$categories = App\Models\Category::with('translations')->get();


@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{asset('front/')}}/./css/config.css">
    <link rel="stylesheet" href="{{asset('front/')}}/./css/reset.css">
    <link rel="stylesheet" href="{{asset('front/')}}/./css/style.css">
    <link rel="stylesheet" href="{{asset('front/')}}/./css/responsive.css">
    <link rel="stylesheet" href="{{asset('front/')}}/./css/swiper.min.css">
    <link rel="stylesheet" href="{{asset('front/')}}/css/owl.carousel.min.css">
    <title>@yield('title','A+A')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;700&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body>
    <!--Header start-->
    <header>
        <div class="container">
            <div class="row">
                <div class="logo">
                    <a href="{{route('index.'.app()->getLocale())}}">
                        <img class="logo-1" src="{{asset('front/')}}/./img/logo.svg" alt="">
                        <img class="logo-2" src="{{asset('front/')}}/./img/logo2.svg" alt="">
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a >
                            {{__('lang.haqqimizda2')}}
                            <img src="{{asset('front/')}}/./img/nav.svg" alt="">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#">
                            {{__('lang.mehsullar_heller')}}
                            <img src="{{asset('front/')}}/./img/nav.svg" alt="">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('layiheler.'.app()->getLocale())}}">
                           {{__('lang.layiheler')}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('xeberler.'.app()->getLocale())}}">
                            {{__('lang.xeberler')}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('contact.'.app()->getLocale())}}">
                            {{__('lang.contact')}}
                        </a>
                    </li>
                </ul>
                <div class="lang-src">

                  @yield('lang')

                  
                    <button class="open-src">
                        <img src="{{asset('front/')}}/./img/search.svg" alt="">
                    </button>
                    <button class="menu">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
                <div class="search-input">
                    <form action="{{route('search')}}" method="get">
                        @csrf
                        <input class="search" name="search" placeholder="M??hsullar?? axtar???? ed?? bil??rsiniz" type="text">
                        <button class="close-src" type="submit">
                            <img src="{{asset('front/')}}/./img/close.svg" alt="">
                        </button>
                    </form>       
                </div>
                <div class="about">
                    <div class="col-lg-5">
                        <ul class="nav-2">
                            <li class="nav-item">
                                <a href="{{route('about.'.app()->getLocale())}}">
                                    {{__('lang.haqqimizda')}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('galeries.'.app()->getLocale())}}">
                                    {{__('lang.qalareya')}}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-7">
                        <img src="{{asset('front/')}}/./img/stars.png" alt="">
                    </div>
                </div>
                <div class="products">
                    <div class="col-lg-5">  
                        <ul class="nav-2">
                            @foreach ($categories as $key=>$category)
                                <li class="nav-item @if ($key==0) services @elseif($key==1) wireless  @elseif($key==2) purpose @elseif($key==3) program    @else '' @endif ">
 
                                    <a href="{{ route('mehsullar.'. app()->getLocale(),$category->{'slug_'.app()->getLocale()}) }}">
                                        {{ $category->getTranslatedAttribute('name',app()->getLocale(),'az') }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-7">
                        <img src="{{asset('front/')}}/./img/stars.png" alt="">
                        <ul class="nav-ser">
                                @php
                                    $category=App\Models\Category::where('id',$categories[0]->id)->first();
                                    $products=App\Models\Product::where('category_id',$category->id)->get() ;
                                @endphp
                            @foreach ($products as $product)
                                
                            @if($product->product_id==null)
                            <li class="nav-item">
                                <a href="{{route('mehsul.'.app()->getLocale(),['slug'=>$category->{'slug_'.app()->getLocale()},'product2'=>$product->{'slug_'.app()->getLocale()}] )}}">
                                    - {{ $product->getTranslatedAttribute('name',app()->getLocale(),'az') }}
                                </a>
                            </li>
                            @endif
                               
                            @endforeach
                        </ul>
                        <ul class="nav-wire">
                            @php
                            $category=App\Models\Category::where('id',$categories[1]->id)->first();
                            $products=App\Models\Product::where('category_id',$category->id)->get() ;
                            @endphp

                            @foreach ($products as $product)
                                @if($product->product_id==null)
                                
                                    <li class="nav-item">
                                        <a href="{{route('mehsul.'.app()->getLocale(),['slug'=>$category->{'slug_'.app()->getLocale()},'product2'=>$product->{'slug_'.app()->getLocale()}] )}}">
                                            - {{ $product->getTranslatedAttribute('name',app()->getLocale(),'az') }}
                                        </a>
                                    </li>
                                
                                @endif
                        @endforeach
                        </ul>

                        <ul class="nav-purpose">
                            @php
                            $category=App\Models\Category::where('id',$categories[2]->id)->first();
                            $products=App\Models\Product::where('category_id',$category->id)->get() ;
                            @endphp

                            @foreach ($products as $product)
                            @if($product->product_id==null)
                            <li class="nav-item">
                                <a href="{{route('mehsul.'.app()->getLocale(),['slug'=>$category->{'slug_'.app()->getLocale()},'product2'=>$product->{'slug_'.app()->getLocale()}] )}}">
                                    - {{ $product->getTranslatedAttribute('name',app()->getLocale(),'az') }}
                                </a>
                            </li>
                            @endif
                        @endforeach
                        </ul>

                        <ul class="nav-program">
                            @php
                            $category=App\Models\Category::where('id',$categories[3]->id)->first();
                            $products=App\Models\Product::where('category_id',$category->id)->get() ;
                            @endphp
                            @foreach ($products as $product)
                            @if($product->product_id==null)
                            <li class="nav-item">
                                <a href="{{route('mehsul.'.app()->getLocale(),['slug'=>$category->{'slug_'.app()->getLocale()},'product2'=>$product->{'slug_'.app()->getLocale()}] )}}">
                                    - {{ $product->getTranslatedAttribute('name',app()->getLocale(),'az')  }}      
                                </a>
                            </li>
                            @endif
                           
                            @endforeach
                        </ul>

                    </div>
                </div>
                <ul class="responsive-menu">
                    <button class="close-menu">
                        <img src="{{asset('front/')}}/./img/nav-close.svg" alt="">
                    </button>
                    <li class="menu-item about_menu">
                        <a href="#">
                            {{__('lang.haqqimizda2')}}
                            <img src="{{asset('front/')}}/./img/nav.svg" alt="">
                        </a>
                        <ul class="about-menu">
                            <li class="menu-item">
                                <a href="./about.html">
                                    {{__('lang.haqqimizda')}}
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="./gallery.html">
                                    {{__('lang.qalareya')}}
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item products_menu">
                        <a href="#">
                            {{__('lang.mehsullar_heller')}}
                            <img src="{{asset('front/')}}/0./img/nav.svg" alt="">
                        </a>
                        <ul class="products-menu">
                            <li class="menu-item services-menu">
                                <a href="#">
                                    Elektron t??hl??k??sizlik sisteml??ri
                                </a>
                                <ul class="ser-menu">
                                    <li class="menu-item">
                                        <a href="./products.html">
                                            - Video m????ahid?? sisteml??ri,
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="./purpose.html">
                                            - Giri???? v?? i?? vaxt??na n??zar??t sisteml??ri,
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">
                                            - Yan????n siqnalizasiya sisteml??ri,
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">
                                            - M??hafiz?? x??b??rdarl??q sisteml??ri,
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">
                                            - ??laqbaunlar, Turniketl??r, Bollardlar v?? s,
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">
                                            - ??d??ni??li v?? ??d??ni??siz dayanacaq sisteml??ri,
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">
                                            - ????b??k?? avadanl??????
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item wireless-menu">
                                <a href="#">
                                    Simsiz telemetriya
                                </a>
                                <ul class="wire-menu">
                                    <li class="menu-item">
                                        <a href="#">
                                            - N??qliyyat vasit??l??rinin Monitorinqi v?? ??dar?? olunmas??(GPS Monitoring)
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">
                                            - Mikroiqlim?? n??zar??t,
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">
                                            - Piyada i????il??r?? n??zar??t,
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">
                                            - G??c-enerji, istehsalat v?? metrik avadanl????a n??zar??t v?? idar??etm??,
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">
                                            - Bankomatlar, ??d??ni?? terminallar?? v?? sat???? aftomatlar??na n??zar??t v??
                                            m??hafiz??
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item purpose-menu">
                                <a href="#">
                                    M??qs??dli h??ll??r
                                </a>
                                <ul class="purpose_menu">
                                    <li class="menu-item">
                                        <a href="#">
                                            - Otel kilidl??ri,seyfl??ri, minibarlar??, enerjini q??na??t ed??n cihazlar v?? s,
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">
                                            - Elektromexanik kilidl??r, qap?? dart??c??lar, panik barlar, master key
                                            sisteml??ri,
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">
                                            - X-ray avadanl??qlar??, ????r??iv?? v?? ??l metal detektolar
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">
                                            - GYanacaq doldurma m??nt??q??l??rin?? aid olan dispenserlar,nasoslar, yanaca????n
                                            s??viyy??sini ??l????n cihazlar,
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item program-menu">
                                <a href="#">
                                    Proqramla??d??rma v?? avtomatla??d??rma
                                </a>
                                <ul class="program_menu">
                                    <li class="menu-item">
                                        <a href="#">
                                            - Proqramla??d??rma
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">
                                            - Biznesin Avtomatla??d??r??lmas??
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">
                                            - ??OT
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('layiheler.'.app()->getLocale())}}">
                            {{__('lang.layiheler')}}
                         </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('xeberler.'.app()->getLocale())}}">
                            {{__('lang.xeberler')}}
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('contact.'.app()->getLocale())}}">
                            {{__('lang.contact')}}
                        </a>
                    </li>
                    <li class="menu-item">
                        @yield('lang')
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!--Header End-->
    
    <!--Footer Start-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <a href="./index.html">
                        <img src="{{asset('front/')}}/./img/foot-logo.svg" alt="">
                    </a>
                </div>
                <div class="col-lg-3">
                    <h2 class="foot-head">
                        A+A security
                    </h2>
                    <ul class="site-map">
                        <li>
                            <a href="{{route('about.'.app()->getLocale())}}">
                               {{__('lang.haqqimizda')}}
                            </a>
                        </li>
                        <li>
                            @php
                                $category= \App\Models\Category::first();
                            @endphp
                            <a href="{{route('mehsullar.'.app()->getLocale() ,$category->{'slug_'.app()->getLocale()} )}}">
                                {{__('lang.mehsullar_heller' )}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('layiheler.'.app()->getLocale())}}">
                                {{__('lang.layiheler')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('xeberler.'.app()->getLocale())}}">
                                {{__('lang.xeberler')}}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h2 class="foot-head">
                        {{__('lang.contact')}}
                    </h2>
                    <ul class="contact">
                        <li>
                            <a href="tel:+{{str_replace(' ' ,'',$contact->phone_first)}}">
                                {{$contact->phone_first}}
                            </a>
                        </li>
                        <li>
                            <a href="tel:+{{str_replace(' ' ,'',$contact->phone_first)}}">
                                {{$contact->phone_second}}
                            </a>
                        </li>
                        <li>
                            <a href="mailTo:{{$contact->email}}">
                                {{$contact->email}}
                            </a>
                        </li>
                        <li>
                            {{$contact->getTranslatedAttribute('address',app()->getLocale(),'az')}}x
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h2 class="foot-head">
                        {{__('lang.abonelik')}}
                    </h2>
                    <ul class="social-icons">
                        <li>
                            <a href="{{$contact->fb}}">
                                <img src="{{asset('front/')}}/./img/facebook.svg" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="{{$contact->ins}}">
                                <img src="{{asset('front/')}}/./img/instagram.svg" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="{{$contact->ln}}">
                                <img src="{{asset('front/')}}/./img/linkedin.svg" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="foot-end">
            <div class="container">
                <div class="row">
                    <p>
                        @php
                            use Illuminate\Support\Carbon;
                        @endphp
                        (c) {{Carbon::now()->format('Y')}} A+A Security, {{__('lang.all_rights')}}
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!--Footer End-->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('front/')}}/./js/swiper.min.js"></script>
    <script src="{{asset('front/')}}/./js/slider.js"></script>
    <script src="{{asset('front/')}}/./js/main.js"></script>
    <script src="{{asset('front/')}}/js/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
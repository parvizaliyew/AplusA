$(document).ready(function () {
    $(".open-src").click(function () {
      $(".search-input").addClass("open")
    })
    $(".close-src").click(function () {
      $(".search-input").removeClass("open")
    })
    $(".about").mouseleave(function(){
      $(".about").removeClass("active") 
      $("header").css("background","#00263E")
      $(".logo-2").css("display","none")
      $(".logo-1").css("display","block")
    })
    $(".nav .nav-item a").mouseenter(function(){
      $(".products").removeClass("active")
      $(".about").removeClass("active")
      $("header").css("background","#00263E")
      $(".logo-2").css("display","none")
      $(".logo-1").css("display","block")
    })
    $(".nav .nav-item:first-child a").mouseenter(function(){
      $(".products").removeClass("active")
      $(".about").addClass("active")
      $("header").css("background","#758592")
      $(".logo-2").css("display","block")
      $(".logo-1").css("display","none")
      $(".about").removeClass("transition-0")
      $(".products").addClass("transition-0")
      $(".search-input").removeClass("open")
    })
    $(".products").mouseleave(function(){
      $(".products").removeClass("active")
      $(".nav-ser").removeClass("active")
      $(".nav-wire").removeClass("active")
      $(".nav-purpose").removeClass("active")
      $(".nav-program").removeClass("active")
      $(".products img").css("display","block")
      $("header").css("background","#00263E")
      $(".logo-2").css("display","none")
      $(".logo-1").css("display","block")
    })
    $(".products img").mouseenter(function(){ 
      $("header").css("background","#758592")
    })
    $(".nav .nav-item:nth-child(2) a").mouseenter(function(){
      $(".about").removeClass("active")
      $(".products").addClass("active")
      $(".about").addClass("transition-0")
      $(".products").removeClass("transition-0")
      $("header").css("background","#758592")
      $(".logo-2").css("display","block")
      $(".logo-1").css("display","none")
      $(".search-input").removeClass("open")
    })
    $(".services").hover(function(){
      $(".products img").css("display","none")
      $(".nav-ser").addClass("active")
      $(".nav-wire").removeClass("active")
      $(".nav-purpose").removeClass("active")
      $(".nav-program").removeClass("active")
    })
    $(".wireless").hover(function(){
      $(".products img").css("display","none")
      $(".nav-ser").removeClass("active")
      $(".nav-wire").addClass("active")
      $(".nav-purpose").removeClass("active")
      $(".nav-program").removeClass("active")
    })
    $(".purpose").hover(function(){
      $(".products img").css("display","none")
      $(".nav-ser").removeClass("active")
      $(".nav-wire").removeClass("active")
      $(".nav-purpose").addClass("active")
      $(".nav-program").removeClass("active")
    })
    $(".program").hover(function(){
      $(".products img").css("display","none")
      $(".nav-ser").removeClass("active")
      $(".nav-wire").removeClass("active")
      $(".nav-purpose").removeClass("active")
      $(".nav-program").addClass("active")
    })
    $(".menu").click(function(){
      $(".responsive-menu").addClass("menu-open")
    })
    $(".about_menu a:not(.about-menu a)").click(function(){
      $(".about-menu").toggleClass("active")
    })
    $(".products_menu a:not(.products-menu a)").click(function(){
      $(".products-menu").toggleClass("active")
    })
    $(".services-menu").click(function(){
      $(this).toggleClass("active")
      $(".ser-menu").toggleClass("active")
      $(".products-menu li").not(this).removeClass("active")
      $(".products-menu li ul").not(".ser-menu").removeClass("active")
    })
    $(".wireless-menu").click(function(){
      $(this).toggleClass("active")
      $(".wire-menu").toggleClass("active")
      $(".products-menu li").not(this).removeClass("active")
      $(".products-menu li ul").not(".wire-menu").removeClass("active")
    })
    $(".purpose-menu").click(function(){
      $(this).toggleClass("active")
      $(".purpose_menu").toggleClass("active")
      $(".products-menu li").not(this).removeClass("active")
      $(".products-menu li ul").not(".purpose_menu").removeClass("active")
    })
    $(".program-menu").click(function(){
      $(this).toggleClass("active")
      $(".program_menu").toggleClass("active")
      $(".products-menu li").not(this).removeClass("active")
      $(".products-menu li ul").not(".program_menu").removeClass("active")
    })
    $(".close-menu").click(function(){
      $(".responsive-menu").removeClass("menu-open")
      $(".about-menu").removeClass("active")
      $(".products-menu").removeClass("active")
      $(".services-menu").removeClass("active")
      $(".purpose-menu").removeClass("active")
      $(".wireless-menu").removeClass("active")
      $(".program-menu").removeClass("active")
      $(".ser-menu").removeClass("active")
      $(".purpose_menu").removeClass("active")
      $(".wire-menu").removeClass("active")
      $(".program_menu").removeClass("active")
    })
    $(".contact-main").addClass("active")
    $(window).scroll(function() {    
      var scroll = $(window).scrollTop();
      console.log(scroll) 
      if (scroll >= 500) {
          $("#about .head-text-div").addClass("active");
      }
      else{
        $("#about .head-text-div").removeClass("active");
      } 
      if (scroll >= 1000) {
          $("#products .head-text-div").addClass("active");
      }
      else{
        $("#products .head-text-div").removeClass("active");
      }
      if (scroll >= 2000) {
        $(".infographic .head-text-div").addClass("active");
      }
      else{
        $(".infographic .head-text-div").removeClass("active");
      }
      if (scroll >= 2500) {
        $("#news .head-text-div").addClass("active");
        $(".news-images").addClass("active")
      }
      else{
        $("#news .head-text-div").removeClass("active");
        $(".news-images").removeClass("active")
      }
      if (scroll >= 3000) {
        $("#projects .head-text-div").addClass("active");
      }
      else{
        $("#projects .head-text-div").removeClass("active");
      }
      if (scroll >= 3500) {
        $("#partners .head-text-div").addClass("active");
      }
      else{
        $("#partners .head-text-div").removeClass("active");
      }
      if (scroll >= 4300) {
        $("#address .head-text-div").addClass("active");
      }
      else{
        $("#address .head-text-div").removeClass("active");
      }
    })
    $('.video').parent().click(function () {
      if($(this).children(".video").get(0).paused){        
        $(this).children(".video").get(0).play();   
        $(this).children(".playpause").fadeOut();
      }else{       
        $(this).children(".video").get(0).pause();
        $(this).children(".playpause").fadeIn();
      }
    });
    $(window).scroll(startCounter);
    AOS.init();
    function startCounter() {
      let scrollY = (window.pageYOffset || document.documentElement.scrollTop) + window.innerHeight;
      let divPos = document.querySelector('#counter-container').offsetTop;
    
      if (scrollY > divPos) {
        $(window).off("scroll", startCounter);
    
        $('.count').each(function() {
          var $this = $(this);
          jQuery({
            Counter: 0
          }).animate({
            Counter: $this.text().replace(/,/g, '')
          }, {
            duration: 1000,
            easing: 'swing',
            step: function() {
              $this.text(commaSeparateNumber(Math.floor(this.Counter)));
            },
            complete: function() {
              $this.text(commaSeparateNumber(this.Counter));
              //alert('finished');
            }
          });
        });
        $('[data-fancybox]').fancybox({
          loop: true,
        });
        function commaSeparateNumber(num) {
          return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
      }
    }
    $(window).on('scroll', function () {
      if ($(window).scrollTop() > 50) {
          $('header').addClass('sticky')
          $('.click-top').css("display","block")
      } else {
          $('header').removeClass('sticky')
          $('.click-top').css("display","none")
      }
    });
    $(".mouse").click(function(){
      window.scrollTo({ top: 900, behavior: 'smooth' })
    })
});
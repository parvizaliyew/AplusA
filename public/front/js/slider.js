$(document).ready(function () {
  new Swiper(".partners", {
      slidesPerView: 4,
      slidesPerColumn: 2,
      spaceBetween: 30,
      loop: !0,
      autoplay: { delay: 2e3, disableOnInteraction: !1 },
      slidesPerColumnFill: "column",
      pagination: { el: ".swiper-pagination" },
      breakpoints: { 640: { slidesPerView: 1 }, 992: { slidesPerView: 2 }, 1280: { slidesPerView: 3 } },
  }),
      new Swiper(".homeSlider", { effect: "fade", speed: 1e3, loop: !0, autoplay: { delay: 2e3, disableOnInteraction: !1 }, pagination: { el: ".swiper-pagination", clickable: !0 } }),
      new Swiper(".productSlider", { effect: "fade", speed: 1e3, loop: !0, autoplay: { delay: 2e3, disableOnInteraction: !1 }, pagination: { el: ".swiper-pagination", clickable: !0 } }),
      new Swiper(".newsSlider", { effect: "fade", speed: 1e3, loop: !0, autoplay: { delay: 2e3, disableOnInteraction: !1 }, pagination: { el: ".swiper-pagination", clickable: !0 } });
  $(".certificate-slider").owlCarousel({
      loop: !0,
      margin: 10,
      nav: !0,
      navText: ["<img src='/front/img/left-slide-arrow.svg'>", "<img src='/front/img/right-slide-arrow.svg'>"],
      center: !0,
      autoplay: !0,
      autoplayTimeout: 2e3,
      loop: !0,
      responsive: { 0: { items: 1 }, 600: { items: 3 } },
  }),
      $(".partners-slider").owlCarousel({ loop: !0, margin: 50, nav: !1, autoplay: !0, autoplayTimeout: 2e3, loop: !0, responsive: { 0: { items: 1 }, 600: { items: 3 }, 1e3: { items: 4 } } }),
      $(".number-select").niceSelect();
});
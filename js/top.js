$(document).ready(function () {
  "use strict";
  mvheight();

  var mySwiper = new Swiper(".mainvisual_slider", {
    loop: true,
    autoplay: {
      delay: 4000,
    },
    speed: 2000,
    effect: "fade",
    fadeEffect: {
      crossFade: true,
    },
  });

  setTimeout(function () {
    $(".mainvisual_subtitle").addClass("left");
  }, 800);

  /*------no_link------*/
  $('a[href*="no_link"]').attr("href", "javascript:void(0);");
});

function mvheight() {
  var setVhCustomVar = function () {
    var vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty("--vh", vh + "px");
  };
  setVhCustomVar();
  window.addEventListener(
    "load",
    function () {
      setVhCustomVar();
    },
    false
  );
  window.addEventListener(
    "orientationchange",
    function () {
      setTimeout(function () {
        setVhCustomVar();
      }, 400);
    },
    false
  );
}

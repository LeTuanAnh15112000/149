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

// $(window).on("scroll load resize", function () {
//   servicescroll();
// });

// function servicescroll() {
//   var scr = $(window).scrollTop();
//   var parent = $('#idx_service .inner');
//   var tgt = $("#idx_service .service_frame");
//   var t_h = tgt.innerHeight();
//   var p_h = parent.innerHeight();
//   var p_o = parent.offset().top;
//   if ($(window).width() > 768) {
//     if (scr - p_o + 80 < 0) {
//       tgt.removeClass("s_frame_fixed bottom");
//     } else if (scr - p_o - p_h + t_h + 80 > 0) {
//       tgt.removeClass("s_frame_fixed").addClass("bottom");
//     } else {
//       tgt.removeClass("bottom").addClass("s_frame_fixed");
//     }
//   }
// }





$(".collection_cate_item a").hover(
  function (e) {
    var dataCateValue = $(this).data("cate");
    const arrImage = Array.from(
      document.querySelectorAll(".collection_cate_img figure")
    );
    arrImage.forEach(img => {
      img.classList.remove("show");
    })
    const resultImg = arrImage.filter((img) => {
      return img.getAttribute("data-id") == dataCateValue;
    });
    resultImg[0].classList.add("show");
  }
);


const startElement = document.querySelector(".service_frame");
// const heightElement = document.querySelector(".service_customer_list");
const itemHeight = startElement.clientHeight / 2;
// const endElement = heightElement.clientHeight - (startElement.clientHeight / 2);
gsap.registerPlugin(ScrollTrigger);
ScrollTrigger.create({
  trigger: ".service_frame",
  pin: true,
  start: `${itemHeight}px 50%`,
  end: `3161px 50%`,
  scrub: 1,
  // markers: true,

});


ScrollTrigger.matchMedia({
  "(min-width: 769px)": function () {
    const getCateList = document.querySelector(".collection_cate_list");
    const getCateImg = document.querySelector(".collection_cate_img figure");
    
    const heightCateList = getCateList.clientHeight;
    const heightCateImg = getCateImg.clientHeight;
    const resultEndPin = heightCateList - heightCateImg;
    gsap.registerPlugin(ScrollTrigger);
    ScrollTrigger.create({
      trigger: ".collection_cate_img",
      pin: true,
      start: "top 50px",
      end: `${resultEndPin} 50px`,
      scrub: 1,
    });
  },
});
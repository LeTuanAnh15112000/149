$(document).ready(function () {
  "use strict";
  mvheight();

  var mySwiper = new Swiper(".mainvisual_slider", {
    autoplay: {
      delay: 3500,
    },
    speed: 3500,
    loop: true,
    effect: "fade",
    fadeEffect: {
      crossFade: true,
    },
  });

  setTimeout(function () {
    $(".mainvisual_subtitle").addClass("left");
  }, 1500);

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

$(window).on("scroll load resize", function () {
  servicescroll();
});

function servicescroll() {
  var scr = $(window).scrollTop();
  var parent = $("#idx_service .inner");
  var tgt = $("#idx_service .service_frame");
  var t_h = tgt.innerHeight();
  var p_h = parent.innerHeight();
  var p_o = parent.offset().top;
  if ($(window).width() > 768) {
    if (scr - p_o < 0) {
      tgt.removeClass("s_frame_fixed bottom");
    } else if (scr - p_o - p_h + t_h > 0) {
      tgt.removeClass("s_frame_fixed").addClass("bottom");
    } else {
      tgt.removeClass("bottom").addClass("s_frame_fixed");
    }
  }

  // change background
  if ($(window).width() > 768) {
    const screenHeight = window.innerHeight;
    const getService = $("#idx_service");
    const serviceTop = getService.offset().top;
    const serviceGalleryHeight = $(".service_gallery").height();
    const result = serviceTop + screenHeight + serviceGalleryHeight / 4;

    const scrollTop = $(window).scrollTop();
    if (scrollTop > result) {
      getService.addClass("color");
    } else {
      getService.removeClass("color");
    }
  }
}

window.onload = function () {
  var images = document.querySelectorAll(".collection_cate_img figure img");
  var maxHeight = 0;
  var maxImage = null;
  images.forEach(function (image) {
    var height = image.clientHeight;
    if (height > maxHeight) {
      maxHeight = height;
      maxImage = image;
    }
  });

  ScrollTrigger.matchMedia({
    "(min-width: 1025px)": function () {
      const getCateList = document.querySelector(".collection_cate_list");
      const heightCateList = getCateList.clientHeight;
      const heightCateImg = maxImage.clientHeight;
      const resultEndPin = heightCateList - heightCateImg;
      gsap.registerPlugin(ScrollTrigger);
      ScrollTrigger.create({
        trigger: ".collection_cate_img",
        pin: true,
        start: "top 50px",
        end: `${resultEndPin} 50px`,
        scrub: 1,
      });

      $(".collection_cate_item a").hover(function (e) {
        var dataCateValue = $(this).data("cate");
        const arrImage = Array.from(
          document.querySelectorAll(".collection_cate_img figure")
        );
        arrImage.forEach((img) => {
          img.classList.remove("show");
        });
        const resultImg = arrImage.filter((img) => {
          return img.getAttribute("data-id") == dataCateValue;
        });
        resultImg[0].classList.add("show");
      });
    },
  });
};

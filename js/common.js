// anchor in page
$(window).bind("load", function () {
  "use strict";
  scrolleffect();
  $(function () {
    $('a[href^="#"]').click(function () {
      if ($($(this).attr("href")).length) {
        var p = $($(this).attr("href")).offset();
        if ($(window).width() > 768) {
          $("html,body").animate(
            {
              scrollTop: p.top - 170,
            },
            600
          );
        } else {
          $("html,body").animate(
            {
              scrollTop: p.top - 60,
            },
            600
          );
        }
      }
      return false;
    });
  });
});

// anchor top page #
$(window).bind("load", function () {
  "use strict";
  var hash = location.hash;
  if (hash) {
    var p1 = $(hash).offset();
    if ($(window).width() > 768) {
      $("html,body").animate(
        {
          scrollTop: p1.top - 170,
        },
        600
      );
    } else {
      $("html,body").animate(
        {
          scrollTop: p1.top - 60,
        },
        600
      );
    }
  }
});

//totop
$(document).ready(function () {
  "use strict";
  $("#toTop").hide();
  $("#toTop a").click(function () {
    $("body,html").animate(
      {
        scrollTop: 0,
      },
      800
    );
  });
  $(window).scroll(function () {
    if ($(this).scrollTop() > 500) {
      $("#toTop").fadeIn();
    } else {
      $("#toTop").fadeOut();
    }
  });

  $("#toggle-menu").click(function (e) {
    e.preventDefault();
    $(this).toggleClass("active");
  });
});

function scrolleffect() {
  var controller = new ScrollMagic.Controller();
  $(".js_effect").each(function () {
    var headerScene = new ScrollMagic.Scene({
      triggerElement: this,
      offset: -200,
      reverse: false,
    })
      .setClassToggle(this, "js_active")
      .addTo(controller);
  });
}

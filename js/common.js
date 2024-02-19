// anchor in page
$(window).bind("load", function () {
  "use strict";
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

$(document).ready(function () {
  "use strict";
  scrolleffect();
  // menu
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
      offset: -300,
      reverse: false,
    })
      .setClassToggle(this, "js_active")
      .addTo(controller);
  });
}

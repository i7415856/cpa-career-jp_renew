$(function () {
  $(window).on("resize", function () {
    if ($(window).width() > 1001) {
      $(".header__gnav").removeAttr("style");
    }
  });

  matchHeight.init();
});

document.addEventListener("DOMContentLoaded", function () {
  //= ハンバーガーメニュー ====
  $(".header__hamburger").on("click", function () {
    $(this).toggleClass("-active");
    if ($(this).hasClass("-active")) {
      $(".header__gnav").slideDown(400);
      $("html").addClass("-fixed");
    } else {
      $(".header__gnav").slideUp(400);
      $("html").removeClass("-fixed");
    }
  });
  //= サブメニュー ====
  //= pc ====
  if ($(window).width() > 1001) {
    $(".menu__item.-has-submenu").hover(
      function () {
        $(this).addClass("-active");
      },
      function () {
        $(this).removeClass("-active");
      }
    );
  }
  //= sp ====
  else {
    $(".menu__item.-has-submenu > span").on("click", function () {
      $(this).toggleClass("-active");
      $(this).next().toggleClass("-active");
    });
  }

  //= sp popup ====
  $(".xBtn").on("click", function () {
    $(".kv__popup").addClass("-close");
  });
});

//= Match Height ====
var matchHeight = (function () {
  function init() {
    eventListeners();
    matchHeight();
  }
  function eventListeners() {
    $(window).on("resize", function () {
      matchHeight();
    });
  }
  function matchHeight() {
    var groupName = $("[data-height]");
    var groupHeights = [];
    groupName.css("min-height", "auto");
    groupName.each(function () {
      groupHeights.push($(this).outerHeight());
    });
    var maxHeight = Math.max.apply(null, groupHeights);
    groupName.css("min-height", maxHeight);
  }
  return {
    init: init,
  };
})();

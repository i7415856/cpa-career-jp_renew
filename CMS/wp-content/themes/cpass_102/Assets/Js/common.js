$(function () {
  $(window).on("resize", function () {
    if ($(window).width() > 1001) {
      $(".header__gnav").removeAttr("style");
    }
  });

  matchHeight.init();
  custom_select_field();
  smooth_scroll();
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

function custom_select_field() {
  $('.js-selectbox').each(function () {
    const selectedOption = $(this).children("option:selected").text();
    var $this = $(this),
      numberOfOptions = $(this).children('option:not([value=""])');
    $this.wrap('<div class="select"></div>');
    $this.after('<div class="select-display form-control"></div>');
    var $selectDisplay = $this.next('.select-display');
    $selectDisplay.text(selectedOption);
    var $list = $('<ul />', {
      'class': 'options'
    }).insertAfter($selectDisplay);
    for (var i = 0; i < numberOfOptions.length; i++) {
      $('<li />', {
        text: $(numberOfOptions[i]).text(),
        rel: $(numberOfOptions[i]).val(),
        class: $(numberOfOptions[i]).text() === selectedOption ? 'active' : 'false'
      }).appendTo($list);
    }
    $this.closest('.custom_select').addClass('active');
    var $listItems = $list.children('li');
    $selectDisplay.on('click', function (e) {
      e.preventDefault();
      $('.select-display.active').not(e.target).each(function () {
        $(this).removeClass('active');
        $(this).next('ul.options').hide();
      });

      $(this).toggleClass('active').next('ul.options').toggle();
    });
    $listItems.on('click', function (e) {
      e.preventDefault();
      $listItems.removeClass('active');
      $(e.target).addClass('active');
      $selectDisplay.text($(this).text()).removeClass('active');
      $this.val($(this).attr('rel')).trigger('change');
      $list.hide();
    });
  });

  $(document).on('click', function(e) {
    if ($(e.target).closest('.custom_select').length === 0) {
      $('.custom_select').each(function() {
        $(this).find('.select-display').removeClass('active');
        $(this).find('.options').hide();
      });
    }
  });
}

// smooth scroll
function smooth_scroll() {
  $('a[href^="#"]').click(function(){
    var headerHeight = $('header').outerHeight() + 20;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top-headerHeight;

    $("html, body").animate({scrollTop:position}, 550, "swing");
      return false;
  });
}

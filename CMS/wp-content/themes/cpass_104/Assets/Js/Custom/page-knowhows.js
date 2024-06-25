$(function() {



  //event_slide
  let init2 = false;
  let event_slide = $('.event_slide');
  if (event_slide) {
    function swiperCard2() {
      if (window.innerWidth < 769) {
          if (!init2) {
            init2 = true;
            event_slide = new Swiper('.event_slide', {
              slidesPerView: 1.23,
              spaceBetween: 20,
							centeredSlides: true,
							loop: true,
              autoplay: {
                delay: 7000,
              },
              navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
              },
            });
          }
      } else if (init2) {
        event_slide.destroy(true,true);
        init2 = false;
      }
    }

    swiperCard2();
    window.addEventListener('resize', swiperCard2);
  }
});

$(window).on('load resize ', function () {
  $('.tip_step .step_head').matchHeight();
  $('.tip_step .step_body').matchHeight();
  $('.tip_step .step_ttl').matchHeight();
	// $('.guide_event .event_item').matchHeight();
	$('.pageTop__career .item__head').matchHeight();

	let item_head = $(".pageTop__career").find('.item__head')
	item_head.each(function () {
		$(this).parent().css('padding-top', $(this).outerHeight() + "px")
	})
});

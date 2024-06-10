$(function() {
  $('.jobInfo_item .item_banner').matchHeight();
  $('.pageTop__career .item__head').matchHeight();

  // jobInfo_slide
  let init = false;
  let jobInfo_slide = $('.jobInfo_slide');
  if (jobInfo_slide) {
    function swiperCard() {
      if (window.innerWidth < 768) {
          if (!init) {
            init = true;
            jobInfo_slide = new Swiper('.jobInfo_slide', {
              loop: true,
              slidesPerView: 1.2,
              spaceBetween: 20,
              centeredSlides: true,
              autoplay: {
                delay: 5000,
							},
							navigation: {
								nextEl: '.swiper-button-next',
								prevEl: '.swiper-button-prev',
							},
							pagination: {
								el: '.swiper-pagination',
								clickable: true,
							},
            });
          }
      } else if (init) {
        jobInfo_slide.destroy(true,true);
        init = false;
      }
    }

    swiperCard();
    window.addEventListener('resize', swiperCard);
	}

	$(window).on('load resize ', function () {
		var windowWidth = $(window).width();
		let item_head = $(".pageTop__career").find('.item__head')
		item_head.each(function () {
			$(this).parent().css('padding-top', $(this).outerHeight() + "px")
		})

		//= 企業ロゴのスライダー ====
		new Swiper('.jobs_slide', {
			loop: true,
			slidesPerView: 1.3,
			spaceBetween: 20,
			speed: 2000,
			autoplay: {
				delay: 1000,
				disableOnInteraction: false,
			},
			breakpoints: {
				768: {
					centeredSlides: true,
					slidesPerView: 5,
					spaceBetween: 18,
				},
			},
		})

		//= sp時 ====
		if (windowWidth < 769) {

			//= 転職成功事例のスライダー ====
			const recruitCasesSwiper = new Swiper('#recruitCasesSwiper', {
				loop: true,
				slidesPerView: 1,
				spaceBetween: 30,
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev',
				},
			})
		} else {

		}

	});
});

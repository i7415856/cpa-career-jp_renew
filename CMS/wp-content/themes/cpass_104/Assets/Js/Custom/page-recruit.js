$(function () {
	//---------------------
	// 企業ロゴのスライダー
	//---------------------
	// Swiperの初期化
	const jobs_slider = new Swiper('.jobs_slide', {
		loop: true,
		slidesPerView: 1.3,
		spaceBetween: 20,
		speed: 1000, // トランジションの速度
		autoplay: {
			delay: 1000,
			disableOnInteraction: false,
			pauseOnMouseEnter: false,
		},
		loopAdditionalSlides: 3,
		breakpoints: {
			769: {
				centeredSlides: true,
				slidesPerView: 4.5,
				spaceBetween: 18,
			},
		},
	});



	//---------------------
	// 求人情報 のスライダー
	//---------------------
	let init = false;
	let jobInfo_slide = $('.jobInfo_slide');
	if (jobInfo_slide) {
		function swiperCard() {
			if (window.innerWidth < 769) {
				if (!init) {
					init = true;
					jobInfo_slide = new Swiper('.jobInfo_slide', {
						slidesPerView: 1.2,
						spaceBetween: 20,
						centeredSlides: true,
						loop: true,
						autoplay: {
							delay: 5000,
							disableOnInteraction: false,
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
				jobInfo_slide.destroy(true, true);
				init = false;
			}
		}

		swiperCard();
		window.addEventListener('resize', swiperCard);
	}

	let case_init = false;
	let recruitCasesSwiper = $('#recruitCasesSwiper');
	if (recruitCasesSwiper) {
		function swiperCard2() {
			if (window.innerWidth < 769) {
				if (!case_init) {
					case_init = true;
					recruitCasesSwiper = new Swiper('#recruitCasesSwiper', {
						slidesPerView: 1,
						spaceBetween: 30,
						loop: true,
						autoplay: {
							delay: 5000,
							disableOnInteraction: false,
						},
						navigation: {
							nextEl: '.swiper-button-next',
							prevEl: '.swiper-button-prev',
						},
						pagination: {
							el: '.recruit_cases_pagination',
							clickable: true,
						},
					});
				}
			} else if (case_init) {
				recruitCasesSwiper.destroy(true, true);
				case_init = false;
			}
		}

		swiperCard2();
		window.addEventListener('resize', swiperCard2);
	}

	$(window).on('load resize ', function () {
		$(".recruit_jobInfo .item_banner").matchHeight();
		// $(".recruit_jobInfo .item_cnt").matchHeight();
		$(".recruit_jobInfo .item_tags").matchHeight();

		let windowWidth = $(window).width();
		let item_head = $(".pageTop__career").find('.item__head')
		item_head.each(function () {
			$(this).parent().css('padding-top', $(this).outerHeight() + "px")
		})





	});
});

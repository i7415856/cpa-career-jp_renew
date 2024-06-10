$(function() {

  $('.tip_step .step_head').matchHeight();
  $('.tip_step .step_body').matchHeight();
  $('.tip_step .step_ttl').matchHeight();

  //ranking_slide
  let init = false;
  let ranking_slide = $('.ranking_slide');
  if (ranking_slide) {
    function swiperCard() {
      if (window.innerWidth < 768) {
          if (!init) {
            init = true;
            ranking_slide = new Swiper('.ranking_slide', {
              slidesPerView: 1.24,
              spaceBetween: 20,
              centeredSlides: true,
              autoplay: {
                delay: 7000,
              },
              loop: true,
              navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
              },
            });
          }
      } else if (init) {
        ranking_slide.destroy(true,true);
        init = false;
      }
    }

    swiperCard();
    window.addEventListener('resize', swiperCard);
  }

  //event_slide
  let init2 = false;
  let event_slide = $('.event_slide');
  if (event_slide) {
    function swiperCard2() {
      if (window.innerWidth < 768) {
          if (!init2) {
            init2 = true;
            event_slide = new Swiper('.event_slide', {
              slidesPerView: 1.23,
              spaceBetween: 20,
              centeredSlides: true,
              autoplay: {
                delay: 7000,
              },
              loop: true,
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

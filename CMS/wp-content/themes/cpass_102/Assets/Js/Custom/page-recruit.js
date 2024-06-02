$(function() {
  $('.jobInfo_item .item_banner').matchHeight();

  //jobs_slide
  const swiper = new Swiper('.jobs_slide', {
    loop: true,
    slidesPerView: 1.3,
    spaceBetween: 20,
    autoplay: {
    	delay: 3000,
    },
    breakpoints: {
      769: {
        slidesPerView: 5.1,
        spaceBetween: 18,
        centeredSlides: true,
      }
    }
  });


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
              }
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
});

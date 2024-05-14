$(function () {
	$(window).on('resize', function () {
		if ($(window).width() > 1001) {
			$('.header__gnav').removeAttr('style');
		}
	});
});

//= ハンバーガーメニュー ====
$('.header__hamburger').on("click", function () {
	$(this).toggleClass('-active');
	if ($(this).hasClass('-active')) {
		$('.header__gnav').slideDown(400);
		$('html').addClass('-fixed');
	} else {
		$('.header__gnav').slideUp(400);
		$('html').removeClass('-fixed');
	}
});


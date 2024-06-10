$(function () {
	var swiper = new Swiper(".company__slide", {
		slidesPerView: 2,
		spaceBetween: 21,
		speed: 2000,
		loop: true,
		centeredSlides: true,
		autoplay: {
			delay: 1000,
			disableOnInteraction: false,
		},
		breakpoints: {
			768: {
				slidesPerView: 4,
				spaceBetween: 33,
			},
			1200: {
				slidesPerView: 6,
				spaceBetween: 33,
			},
		},
	});

	// Accordion
	var speed = 400;
	$('.sec__accor .head__ttl').click(function () {
		$(this).parent().find('.ico__accor').toggleClass('-active');
		$(this).parent().next().slideToggle(speed);
	});

	$('.sec__accor .ico__accor').click(function () {
		$(this).toggleClass('-active');
		$(this).parent().next().slideToggle(speed);
	});
});


function equalizeHeights(selector) {
	var maxHeight = 0;

	// セレクタにマッチする要素の高さをリセットする
	$(selector).height('auto');

	// 最大の高さを計算する
	$(selector).each(function() {
			maxHeight = Math.max(maxHeight, $(this).height());
	});

	// 最大の高さを適用する
	$(selector).each(function() {
			$(this).height(maxHeight);
	});
}

// ドキュメントが準備完了状態になったら、ウィンドウサイズに応じて高さを調整する
$(document).ready(function() {
	// ウィンドウのリサイズイベントに関数をバインドする
	$(window).resize(function() {
			// 画面幅が789px以上の場合のみ高さを揃える
			if ($(window).width() >= 789) {
					equalizeHeights('.cnt__block');
			} else {
					// 画面幅が789px未満の場合は高さを自動に戻す
					$('.cnt__block').height('auto');
			}
	});

	// ウィンドウリサイズイベントを初回にトリガーする
	$(window).trigger('resize');
});
$(window).on('load resize ', function () {
	$('.pageTop__career .item__head').matchHeight();
	let item_head = $(".pageTop__career").find('.item__head')
	item_head.each(function () {
		$(this).parent().css('padding-top', $(this).outerHeight() + "px")
	})

});

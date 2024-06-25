$(window).on('load resize ', function () {
	$('.pageSinglecase__other .item__head').matchHeight();
	let item_head = $(".pageSinglecase__other").find('.item__head')
	item_head.each(function () {
		$(this).parent().css('padding-top', $(this).outerHeight() + "px")
	})
});

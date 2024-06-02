<?php

/**
 * Template header
 * @package WordPress
 * @subpackage Vanilla
 * @since Vanilla 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>
	<?php body_class() ?>
	dir="ltr"
	style="margin-top: 0 !important;">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
	<?php if (is_honban()) { ?>
	<!-- Google Tag Manager -->
	<script>
	(function(w, d, s, l, i) {
		w[l] = w[l] || [];
		w[l].push({
			'gtm.start': new Date().getTime(),
			event: 'gtm.js'
		});
		var f = d.getElementsByTagName(s)[0],
			j = d.createElement(s),
			dl = l != 'dataLayer' ? '&l=' + l : '';
		j.async = true;
		j.src =
			'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
		f.parentNode.insertBefore(j, f);
	})(window, document, 'script', 'dataLayer', 'GTM-KN7PZGD');
	</script>
	<?php } ?>
	<!-- End Google Tag Manager -->
	<!-- Basic information -->
	<meta http-equiv="Content-Type"
		content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"
		content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<link rel="shortcut icon"
		href="img/common/favicon.png">

	<!-- fonts -->
	<link rel="preconnect"
		href="https://fonts.googleapis.com">
	<link rel="preconnect"
		href="https://fonts.gstatic.com"
		crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP:wght@600&Poppins:wght@300;400;500;600&display=swap"
		rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&display=swap"
		rel="stylesheet">

	<!-- JQuery -->
	<script src="https://code.jquery.com/jquery-3.6.3.min.js"
		crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/protonet-jquery.inview/1.1.2/jquery.inview.min.js"
		defer></script>

	<!-- GSAPアニメーション -->
	<script src="https://cdn.jsdelivr.net/npm/gsap@3.7.0/dist/gsap.min.js"
		defer></script>
	<script src="https://cdn.jsdelivr.net/npm/gsap@3.7.0/dist/ScrollTrigger.min.js"
		defer></script>

	<!-- Swiper -->
	<link rel="stylesheet"
		href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
	<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>


	<?php wp_head() ?>


	<script src="<?php echo get_template_directory_uri() ?>/Assets/Js/common.js"></script>
</head>

<body >
	<?php if (is_honban()) { ?>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KN7PZGD"
			height="0"
			width="0"
			style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<?php } ?>

	<?php
	// 基本的にこのファイルにはhtmlコードを記述しない
	// フッターは「vanilla-header.php」に記述する
	?>

	<?php require_once(get_theme_file_path() . "/Headers/header-vanilla.php"); ?>

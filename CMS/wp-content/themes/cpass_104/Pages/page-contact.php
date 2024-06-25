<?php

/**
 * Template Name: pages/お問い合わせ
 * @Template Post Type: post, page,
 */
get_header(); ?>

<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>

<main class="pageContact pages">
	<section class="pages__kv">
		<div class="inner">
			<h2 class="kv__ttl">CONTACT</h2>
			<p class="kv__txt"><span>お問い合わせ</span></p>
		</div>
	</section>

	<section class="pages__breadcrumb">
		<div class="inner">
			<?php vanilla_breadcrumb([
				[
					'href' => home_url("/contact/"),
					'text' => 'お問い合わせ',
				],
			]) ?>
		</div>
	</section>
	<div class="inner">
		<div class="pageContactContent">
			<div class="contactForm">
				<div class="inner -maw-80rem -no-padding">

					<?php echo do_shortcode('[mwform_formkey key="' . $form_id . '"]') ?>

				</div>
			</div>
		</div>
	</div>
</main>


<script>
$(function () {
	$('input[name="tel[data][0]"]').attr('placeholder', '000')
	$('input[name="tel[data][1]"]').attr('placeholder', '0000')
	$('input[name="tel[data][2]"]').attr('placeholder', '0000')
});
</script>

<?php get_footer(); ?>

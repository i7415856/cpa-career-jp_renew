<?php

/**
 * Template Name: pages/転職成功事例一覧
 * @package WordPress
 * @Template Post Type: post, page,
 * @subpackage Vanilla
 */
get_header(); ?>

<main class="pageCase pages">
	<section class="pages__kv">
		<div class="inner">
			<h2 class="kv__ttl">SUCCESS <br class="-sp-only">STORY</h2>
			<p class="kv__txt"><span>転職成功事例</span></p>
		</div>
	</section>

	<div class="pageCase__bg">
		<section class="pagesBreadcurmb">
			<div class="inner -maw-120rem">
				<?php vanilla_breadcrumb([
					[
						'href' => home_url('/case/'),
						'text' => '転職成功事例',
					],
				]) ?>
			</div>
		</section>

		<section class="pageConsultant__career">
			<div class="inner">
				<p class="career__txt">CPASSキャリアのコンサルタントを通じて、キャリアプランを実現した方々をご紹介します。<br>これまでのご経験や転職理由に加え、どのような点で転職を決意したのかもまとめましたので、ご参考ください。</p>

				<?php
				$args = [
					'post_type' => 'case',
					'posts_per_page' => -1,
				];
				$WP_post = new WP_Query($args);
				if ($WP_post->have_posts()) {
				?>
					<div class="career__lst">
						<?php
						while ($WP_post->have_posts()) {
							$WP_post->the_post();
							career_item($post);
						} ?>
					</div>
				<?php
				}
				wp_reset_postdata();
				?>
			</div>
		</section>
	</div>
</main>

<?php get_footer(); ?>

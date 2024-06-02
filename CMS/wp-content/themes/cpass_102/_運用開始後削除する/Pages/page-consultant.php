<?php

/**
 * Template Name: コンサルタント一覧
 * @package WordPress
 * @Template Post Type: post, page,
 * @subpackage Vanilla
 */
get_header(); ?>

<main class="pageConsultant pages">
	<section class="pages__kv">
		<div class="inner">
			<h2 class="kv__ttl">CAREER CONSULTANT</h2>
			<p class="kv__txt"><span>キャリアコンサルタント</span></p>
		</div>
	</section>

	<section class="pagesBreadcurmb">
		<div class="inner -maw-120rem">
			<?php vanilla_breadcrumb([
				[
					'href' => home_url('/consultant/'),
					'text' => 'コンサルタント一覧',
				],
			]) ?>
		</div>
	</section>

	<section class="pageConsultant__infor">
		<div class="inner -maw-120rem">
			<p class="infor__txt">会計業界に特化した深い知識と経験を有した専門性の高いコンサルタントが在籍。<br>あなたのキャリアプランにあわせて、経験豊富なコンサルタントがゼロからサポートします。</p>

			<div class="infor__lst">
				<?php
				$args = [
					'post_type' => 'consultant',
					'paged' => vanilla_paged(),
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'posts_per_page' => -1,
				];
				$WP_post = new WP_Query($args);
				if ($WP_post->have_posts()) {
					while ($WP_post->have_posts()) {
						$WP_post->the_post();

						consultant_item($post);
					}
				}
				wp_reset_postdata();
				?>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>

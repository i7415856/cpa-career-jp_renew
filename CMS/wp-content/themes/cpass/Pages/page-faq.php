<?php

/**
 * Template Name: FAQ
 * @package WordPress
 * @Template Post Type: post, page,
 * @subpackage Vanilla
 */
get_header(); ?>

<?php $param = vanilla_sanitize_array($_GET); ?>

<main class="pageFaq pages">
	<section class="pages__kv">
		<div class="inner">
			<h2 class="kv__ttl">FAQ</h2>
			<p class="kv__txt"><span>よくあるご質問</span></p>
		</div>
	</section>

	<section class="pages__breadcrumb">
		<div class="inner">
			<?php vanilla_breadcrumb([
				[
					'href' => home_url('/faq/'),
					'text' => 'よくあるご質問',
				],
			]) ?>
		</div>
	</section>

	<section class="pageFaq__block">
		<div class="inner sidebarSectionWrap">

			<?php tax_sidebar('faq_category') ?>

			<div class="block__main">
				<?php
				$args = array(
					'post_type' => 'faq',
					'paged' => vanilla_paged(),
					'order' => 'DESC',
					'posts_per_page' => 10,
				);

				if ($param && isset($param['term'])) {
					$args['tax_query'] = [
						[
							'taxonomy' => 'faq_category',
							'field' => 'slug',
							'terms' => [$param['term']],
						]
					];
				}

				$WP_post = new WP_Query($args);
				if ($WP_post->have_posts()) {
				?>
					<div class="main__lst">
						<?php
						while ($WP_post->have_posts()) {
							$WP_post->the_post();
							faq_item($post);
						} ?>
					</div>
				<?php
				} else {
					echo '投稿はありません';
				}
				wp_reset_postdata();
				?>

				<div class="pageFaq__paginationWrap">
					<?php require_once(get_theme_file_path() . "/Assets/Components/c-pagination.php") ?>
				</div>

			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>

<?php

/**
 * Template Name: ニュース一覧
 * @package WordPress
 * @Template Post Type: post, page,
 * @subpackage Vanilla
 */
get_header(); ?>

<?php $param = vanilla_sanitize_array($_GET); ?>

<main class="pageNews pages">
	<section class="pages__kv">
		<div class="inner">
			<h2 class="kv__ttl">NEWS</h2>
			<p class="kv__txt"><span>ニュースリリース</span></p>
		</div>
	</section>

	<section class="pages__breadcrumb">
		<div class="inner">
			<?php vanilla_breadcrumb([
				[
					'href' => home_url('/news/'),
					'text' => 'ニュースリリース',
				],
			]) ?>
		</div>
	</section>

	<section class="pageNews__block">
		<div class="inner sidebarSectionWrap">

			<?php require_once(get_theme_file_path() . "/Assets/Components/c-sidebar-news-archive.php") ?>

			<div class="block__main">
				<h2 class="pageNews__blockTitle">
					<?php echo ($param && isset($param['archive'])) ? $param['archive'] . '年' : 'ALL'; ?>
				</h2>

				<?php
				$args = array(
					'post_type' => 'news',
					'paged' => vanilla_paged(),
					'order' => 'DESC',
					'posts_per_page' => 10,
				);

				if ($param && isset($param['archive'])) {
					$args['date_query'] = [
						[
							'year'  => $param['archive'],
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
							news_item($post);
						} ?>
					</div>
				<?php
				} else {
					echo '投稿はありません';
				}
				wp_reset_postdata();
				?>

				<div class="pageNews__paginationWrap">
					<?php require_once(get_theme_file_path() . "/Assets/Components/c-pagination.php") ?>
				</div>

			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>

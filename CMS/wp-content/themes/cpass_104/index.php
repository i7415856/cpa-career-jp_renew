<?php

/**
 * Template Name: 投稿アーカイブテンプレート
 * @package WordPress
 * @Template Post Type: post, page,
 * @subpackage Vanilla
 */
get_header(); ?>

<?php
$param = vanilla_sanitize_array($_GET);
 ?>

<main class="pageColumn pages">
	<section class="pages__kv">
		<div class="inner">
			<h2 class="kv__ttl">COLUMN</h2>
			<p class="kv__txt"><span>コラム</span></p>
		</div>
	</section>

	<section class="pages__breadcrumb">
		<div class="inner">
			<?php vanilla_breadcrumb([
				[
					'href' => home_url("/column/"),
					'text' => 'コラム',
				],
			]) ?>
		</div>
	</section>

	<section class="pageColumn__block">
		<div class="inner sidebarSectionWrap">
			<?php tax_sidebar('category') ?>

			<div class="block__main">
				<?php
				$args = array(
					'post_type' => 'post',
					'paged' => vanilla_paged(),
					'posts_per_page' => 12,
				);

				if ($param && isset($param['term'])) {
					$args['tax_query'] = [
						[
							'taxonomy' => 'category',
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
							column_item($post);
							} ?>
					</div>
				<?php
				} else {
					echo '投稿はありません';
				}
				wp_reset_postdata();
				?>

				<?php require_once(get_theme_file_path() . "/Assets/Components/c-pagination.php") ?>

			</div>
		</div>
	</section>

	<section class="pageColumn__career">
		<div class="inner">
			<h3 class="career__ttl">会計人材の<br class="-sp-only">キャリアコンテンツ</h3>

			<p class="career__txt">公認会計士を始めとした会計人材の生涯支援を目的とし、「人と繋がり、可能性を広げる場」をコンセプトに展開。CPASSラウンジでリアル交流イベントも開催。専門知識・ソフトスキル・100人のロールモデル・キャリアコラム・職場見学などの充実したコンテンツを提供いたします。</p>

			<div class="career__frame">
				<figure class="frame__logo"><img src="<?php echo get_template_directory_uri() ?>/Image/column/img_logo_career.svg" alt="CPASS"></figure>
				<a href="https://cpass-net.jp/" target="_blank" rel="noopener" class="frame__btn">詳しく見る</a>
			</div>
		</div>
	</section>


</main>

<?php get_footer(); ?>

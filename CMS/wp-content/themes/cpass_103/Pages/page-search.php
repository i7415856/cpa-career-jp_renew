<?php

/**
 * Template Name: 検索結果
 * @package WordPress
 * @Template Post Type: post, page,
 * @subpackage Vanilla
 */
get_header(); ?>

<main class="pageSearchResult pages">
	<section class="pages__breadcrumb">
		<div class="inner">
			<div class="breadcrumb">
				<ul class="breadcrumb__list">
					<li class="breadcrumb__item">
						<a href="<?php echo home_url(); ?>" class="breadcrumb__link">トップ</a>
					</li>
					<li class="breadcrumb__item">
						<a href="<?php echo home_url("/knowhows/"); ?>" class="breadcrumb__link">転職ノウハウガイド</a>
					</li>
					<li class="breadcrumb__item">
						<a href="<?php echo home_url("/search/"); ?>" class="breadcrumb__link">検索結果一覧</a>
					</li>
				</ul>
			</div>

		</div>
	</section>

	<section class="result_body">
		<div class="inner">
			<h2 class="sec__ttl result_ttl">
				<span class="-blu">検索結果一覧</span>
			</h2>

			<?php require_once(get_theme_file_path() . "/Assets/Components/c-search-form.php") ?>

			<?php
			$args = array(
				'post_type' => 'post',
				'order' => 'DESC',
				'posts_per_page' => 10,
				's' => $keyword,
				'paged' => vanilla_paged(),
				'orderby' => 'post_date',
				'tax_query' => [
					[
						'taxonomy' => 'category',
						'field' => 'slug',
						'terms' => ['knowhow'],
					]
				],
			);
			$WP_post = new WP_Query($args);
			$i = 0;
			$total_posts = $WP_post->found_posts;
			$posts_per_page = $WP_post->query_vars['posts_per_page'];
			$paged = vanilla_paged();
			$start = ($paged - 1) * $posts_per_page + 1;
			$end = min($paged * $posts_per_page, $total_posts);

			?>
			<p class="result_total">
				<span class="keyword">「<?php echo esc_html($keyword); ?>」</span>
				<span>の検索結果　</span>
				<?php if ($WP_post->have_posts()) { ?>
					<span><?php echo $total_posts; ?>件</span>　
					<span><?php echo $start; ?>〜<?php echo $end; ?>件目を表示</span>
				<?php } ?>
			</p>

			<?php if ($WP_post->have_posts()) { ?>
				<div class="result_list">
					<?php
					while ($WP_post->have_posts()) {
						$WP_post->the_post();
						++$i;
					?>
						<a href="<?php echo esc_url(get_permalink()); ?>" class="result_item">
							<figure class="item_img"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt=""></figure>
							<div class="item_cnt">

								<div class="item_head">
									<?php
									$cat = get_the_terms($post, 'category');
									if ($cat) {
									?>
										<p class="item_cat"><?php echo $cat[0]->name ?></p>
									<?php } ?>
									<p class="item_date"><?php echo get_the_date('Y.m.d'); ?></p>
								</div>
								<p class="item_ttl"><?php echo get_the_title() ?></p>
								<p class="item_txt"><?php echo wp_strip_all_tags(get_the_content()); ?></p>
							</div>
						</a>
					<?php } ?>
				</div>

				<?php require_once(get_theme_file_path() . "/Assets/Components/c-pagination.php") ?>
			<?php } else { ?>
				<br><br>
				<p class="">検索キーワード「<?php echo $keyword ?>」に該当する投稿がありません。<br>別のキーワードで検索してください。</p>
			<?php }
			wp_reset_postdata(); ?>
		</div>
	</section>

	<?php require_once(get_theme_file_path() . "/Assets/Components/c-about-cv.php") ?>
</main>

<?php get_footer(); ?>

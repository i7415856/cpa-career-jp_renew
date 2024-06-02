<?php

/**
 * Template Name: pages/検索結果
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
				'posts_per_page' => 3,
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
				の検索結果　
				<?php if ($WP_post->have_posts()) { ?>
					<?php echo $total_posts; ?>件　<?php echo $start; ?>〜<?php echo $end; ?>件目を表示
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
										<p class="item_cat">キャリア</p>
									<?php } ?>
									<p class="item_date"><?php echo get_the_date('Y.m.d'); ?></p>
								</div>
								<p class="item_ttl"><?php echo get_the_title() ?></p>
								<p class="item_txt"><?php the_content() ?></p>
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
	</section>

	<section class="pages__cpa">
		<div class="inner">
			<p class="sec__sub -pc-only">CPAグループは</p>

			<h2 class="sec__ttl"><span class="-yel">会計人材キャリアを<br class="-sp-only">サポートし続けます</span></h2>

			<div class="cpa__lst">
				<a href="https://cpa-net.jp/" class="lst__item">
					<p class="item__txt">公認会計士資格スクール</p>
					<figure class="item__img"><img src="../Image/Front/img_cpa_logo01.png" alt="CPA Certified Public Accountant"></figure>
				</a>

				<a href="__TBD__" class="lst__item">
					<p class="item__txt">CPAクオリティでUSCPA合格をサポート</p>
					<figure class="item__img"><img src="../Image/Front/img_cpa_logo02.png" alt="CPA会計学院 U.S.CPA講座"></figure>
				</a>

				<a href="https://www.cpa-learning.com/" class="lst__item">
					<p class="item__txt">簿記や会計を完全無料で学べる</p>
					<figure class="item__img"><img src="../Image/Front/img_cpa_logo03.png" alt="cpa learning"></figure>
				</a>

				<a href="https://cpass-net.jp/" class="lst__item">
					<p class="item__txt">会計人材の生涯支援プラットフォーム</p>
					<figure class="item__img"><img src="../Image/Front/img_cpa_logo04.png" alt="CPASS"></figure>
				</a>

				<a href="https://cpa-jobs.jp/" class="lst__item">
					<p class="item__txt">会計人材特化型求人サイト</p>
					<figure class="item__img"><img src="../Image/Front/img_cpa_logo05.png" alt="CPA Jobs"></figure>
				</a>

				<a href="https://www.cpa-learning.com/career-directory/" class="lst__item">
					<p class="item__txt">職種ごとに業務内容などを解説</p>
					<figure class="item__img"><img src="../Image/Front/img_cpa_logo06.png" alt="会計人材のキャリア名鑑"></figure>
				</a>
			</div>

			<div class="cpa__banners">
				<a href="__TBD__" class="banner__block">
					<figure class="block__img"><img src="../Image/Front/img_cpa01.jpg" alt="求人を掲載したい企業様へ"></figure>
					<div class="block__cnt">
						<p class="block__txt"><strong>求人を掲載したい</strong><br><span class="-yel">企業様</span>へ</p>
					</div>
				</a>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>

<?php

/**
 * Template Name: 投稿ページテンプレート
 * @Template Post Type: post, page,
 * @subpackage Vanilla
 */
get_header(); ?>

<div class="singlePost pages">
	<section class="pages__kv">
		<div class="inner">
			<p class="kv__ttl">COLUMN</p>
			<p class="kv__txt"><span>コラム</span></p>
		</div>
	</section>

	<section class="pagesBreadcurmb">
		<div class="inner -maw-120rem">
			<?php vanilla_breadcrumb([
				[
					'href' => home_url('/column/'),
					'text' => 'コラム',
				],
				[
					'href' => get_permalink(),
					'text' => get_the_title(),
				],
			]) ?>
		</div>
	</section>

	<div class="inner">
		<section class="singlePostFlex sidebarSectionWrap">
			<?php tax_sidebar('category') ?>

			<article class="singlePostMain">
				<div class="singlePostHead">
					<h1 class="singlePostHead__title"><?php echo get_the_title() ?></h1>

					<div class="singlePostHead__flex">
						<?php
						$tags = get_the_terms($post, 'post_tag');
						if ($tags) {
						?>
							<div class="singlePostHead__tagWrap">
								<p class="singlePostHead__tag">
									<?php echo $tags[0]->name ?>
								</p>
							</div>
						<?php } ?>

						<p class="singlePostHead__text -publish-date"><span class="singlePostHead__primaryText -color-primary">公開日:</span><?php echo get_the_date('Y.m.d'); ?></p>
						<p class="singlePostHead__text -modified-date"><span class="singlePostHead__primaryText -color-primary">最終更新日:</span><?php echo get_the_modified_date('Y.m.d'); ?></p>

					</div>
				</div>

				<div class="singlePostTOC">
					<?php echo do_shortcode('[ez-toc]') ?>
				</div>

				<div class="singlePostContent">
					<div class="postContentsCommonStyle">
						<?php the_content() ?>
					</div>
				</div>
			</article>

		</section>
	</div>

	<?php

	$args = [
		'post_type' => 'post',
		'paged' => vanilla_paged(),
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'posts_per_page' => 3,
	];
	$cat = get_the_terms($post, 'category');
	if ($cat) {
		$cat_slugs = array_column($cat, 'slug');
		$args['tax_query'] = [
			[
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' => $cat_slugs,
			]
		];
	}
	$WP_post = new WP_Query($args);
	if ($WP_post->have_posts() && $WP_post->found_posts >= 3) {
	?>
		<section class="singlePostColumns">
			<div class="inner -maw-90rem">
				<h2 class="singleConsultant__title">関連コラム</h2>

				<ul class="singlePostColumns__list">
					<?php
					while ($WP_post->have_posts()) {
						$WP_post->the_post();
						column_item($post);
					}
					?>
				</ul>
			</div>
		</section>
	<?php
	}
	wp_reset_postdata();
	?>
</div>

<?php get_footer();

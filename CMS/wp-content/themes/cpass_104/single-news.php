<?php

/**
 * Template Name: ニュース 詳細
 * @package WordPress
 * @Template Post Type: post, page,
 * @subpackage Vanilla
 */
get_header(); ?>

<main class="singleNews pages">
	<section class="pagesBreadcurmb">
		<div class="inner -maw-120rem">
			<?php vanilla_breadcrumb([
				[
					'href' => home_url("/news/"),
					'text' => 'ニュースリリース',
				],
				[
					'href' => get_permalink(),
					'text' => get_the_title(),
				],
			]) ?>
		</div>
	</section>

	<div class="inner -maw-90rem">
		<article class="singleNewsMain">
			<div class="singleNewsHead">
				<div class="singleNewsHead__dateCats">
					<p class="singleNewsHead__date"><?php echo get_the_date('Y.m.d'); ?></p>
					<?php
					$terms = get_the_terms($post, 'news_category');
					if ($terms) { ?>
						<div class="singleNewsHead__cats">
							<?php foreach ($terms as $term) { ?>
								<span class="singleNewsHead__cat <?php echo "-{$term->slug}" ?>">
									<?php echo $term->name ?>
								</span>
							<?php } ?>
						</div>
					<?php } ?>
				</div>

				<p class="singleNewsHead__title">
					<?php echo get_the_title($post->ID) ?>
				</p>
			</div>

			<div class="singleNews__content">
				<?php the_content() ?>
			</div>

			<?php
			$args = [
				'post_type' => 'news',
			];
			$prev_next_posts = vanilla_get_prev_next_posts($args);
			if ($prev_next_posts && count($prev_next_posts) == 2) {
			?>
				<div class="singleNews__prevNextPosts">
					<?php
					button_type1([
						'text' => '前の記事',
						'class' => '-back',
						'attr' => 'href="' . get_permalink($prev_next_posts[0]) . '"',
						'tag' => 'a',
					]);
					button_type1([
						'text' => '後の記事',
						'class' => '',
						'attr' => 'href="' . get_permalink($prev_next_posts[1]) . '"',
						'tag' => 'a',
					]);
					?>
				</div>
			<?php } ?>

			<div class="singleNews__archiveLink">
				<a href="<?php echo home_url("/news/"); ?>" class="sec__detail -back">ニュースリリース一覧に戻る</a>
			</div>
		</article>
	</div>
</main>

<?php get_footer(); ?>

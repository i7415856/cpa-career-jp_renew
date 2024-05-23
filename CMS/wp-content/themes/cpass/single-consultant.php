<?php

/**
 * Template Name: コンサルタント詳細
 * @package WordPress
 * @Template Post Type: post, page,
 * @subpackage Vanilla
 */
get_header(); ?>
<main class="singleConsultant pages">
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
				[
					'href' => get_permalink(),
					'text' => get_the_title(),
				],
			]) ?>
		</div>
	</section>


	<section class="singleConsultantContent">
		<div class="inner -maw-90rem">

			<article class="singleConsultantProfile">
				<figure class="singleConsultantProfile__figure">
					<img src="<?php echo get_field('single_consultant_profile_thumbnail') ?>" alt="<?php echo get_field('single_consultant_profile_name_ja') ?>" class="singleConsultantProfile__img">
				</figure>


				<div class="singleConsultantProfile__desc">
					<h2 class="singleConsultantProfile__title"><?php echo get_field('single_consultant_profile_phrase') ?></h2>
					<p class="singleConsultantProfile__position"><?php echo get_field('single_consultant_profile_position') ?></p>
					<p class="singleConsultantProfile__jaName"><?php echo get_field('single_consultant_profile_name_ja') ?></p>
					<p class="singleConsultantProfile__enName"><?php echo get_field('single_consultant_profile_name_en') ?></p>
					<div class="singleConsultantProfile__sns">
						<a href="<?php echo get_field('single_consultant_profile_name_x') ?>" class="singleConsultantProfile__snsLink" target="_blank" rel="noopener">
							<img src="<?php echo get_template_directory_uri() . '/Image/common/icon_x_black_1.svg' ?>" alt="x icon">
						</a>
					</div>
				</div>
			</article>

			<?php if (have_rows('single_consultant_history')) { ?>
				<article class="singleConsultantHistory">
					<h3 class="singleConsultant__title">経歴</h3>
					<ul class="singleConsultantHistory__list">
						<?php while (have_rows('single_consultant_history')) {
							the_row(); ?>
							<li class="singleConsultantHistory__item">
								<p class="singleConsultantHistory__itemYear"><?php echo the_sub_field('single_consultant_history_year') ?></p>
								<p class="singleConsultantHistory__itemText"><?php echo the_sub_field('single_consultant_history_text') ?></p>
							</li>
						<?php } ?>
					</ul>
				</article>
			<?php } ?>

			<?php if (get_the_content()) { ?>
				<article class="singleConsultantMessage__content">
					<h3 class="singleConsultant__title">メッセージ</h3>

					<div class="postContentsCommonStyle -content">
						<?php the_content() ?>
					</div>
				</article>
			<?php } ?>
		</div>
	</section>

	<article class="singelConsultantRelatedPost">
		<div class="inner">
			<h2 class="singelConsultantRelatedPost__title">その他のコンサルタント</h2>

			<div class="singelConsultantRelatedPost__list">
				<?php
				$args = [
					'post_type' => 'consultant',
				];
				$prev_next_posts = vanilla_get_prev_next_posts($args);
				consultant_item($prev_next_posts[0]);
				consultant_item($prev_next_posts[1]);
				?>
			</div>
		</div>
	</article>
</main>
<?php get_footer(); ?>

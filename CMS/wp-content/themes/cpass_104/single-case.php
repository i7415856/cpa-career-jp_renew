<?php

/**
 * Template Name: 転職成功事例詳細
 * @package WordPress
 * @Template Post Type: post, page,
 * @subpackage Vanilla
 */
get_header(); ?>
<?php
if (have_posts()) {
	while (have_posts()) {
		the_post();
?>

		<main class="pageSinglecase pages">
			<section class="pages__kv">
				<div class="inner">
					<h2 class="kv__ttl">SUCCESS <br class="-sp-only">STORY</h2>
					<p class="kv__txt">
						<span>転職成功事例</span>
					</p>
				</div>
			</section>

			<div class="pageCase__bg">
				<section class="pagesBreadcurmb">
					<div class="inner -maw-120rem">
						<?php vanilla_breadcrumb([
							[
								'href' => home_url("/case/"),
								'text' => '転職成功事例',
							],
							[
								'href' => get_permalink(),
								'text' => get_the_title(),
							],
						]) ?>
					</div>
				</section>

				<section class="pageSinglecase__generation">
					<div class="inner -maw-90rem">

						<?php if (get_field('single_case_list_copy_detail')) { ?>
							<h2 class="sec__ttl">
								<?php echo get_field('single_case_list_copy_detail') ?>
							</h2>
						<?php } ?>

						<div class="generation__block">

							<?php if (get_field('single_case_list_icon')) { ?>
								<figure class="block__img">
									<img src="<?php echo get_template_directory_uri() . '/Image/case/' . get_field('single_case_list_icon') . '.png' ?>" alt="<?php echo get_field('single_case_list_age') . get_field('single_case_list_gender') ?>">
								</figure>
							<?php } ?>
							<div class="block__cnt">

								<?php if (get_field('single_case_list_age') || get_field('single_case_list_gender')) { ?>
									<p class="cnt__ttl">
										<?php echo get_field('single_case_list_age') . get_field('single_case_list_gender') ?>
									</p>
								<?php } ?>

								<div class="cnt__procedure">
									<?php if (get_field('single_case_profile_prev_industry')) { ?>
										<p class="procedure__txt01">
											<?php echo get_field('single_case_profile_prev_industry') ?>

											<?php if (get_field('single_case_profile_prev_income')) { ?>
												<span>年収<span class="-num"><?php echo num(get_field('single_case_profile_prev_income')) ?></span>万円</span>
											<?php } ?>
										</p>
									<?php } ?>

									<?php if (get_field('single_case_profile_current_industry')) { ?>
										<p class="procedure__txt02">
											<?php echo get_field('single_case_profile_current_industry') ?>

											<?php if (get_field('single_case_profile_current_income')) { ?>
												<span>年収<span class="-num"><?php echo num(get_field('single_case_profile_current_income')) ?></span>万円</span>
											<?php } ?>
										</p>
									<?php } ?>

								</div>

								<?php if (get_field('single_case_list_phrase')) { ?>
									<div class="cnt__txt"><?php echo get_field('single_case_list_phrase') ?></div>
								<?php } ?>
							</div>
						</div>
					</div>
				</section>

				<section class="pageSinglecase__infor">
					<div class="inner -maw-90rem">
						<div class="infor__frame">
							<h3 class="frame__ttl">概要</h3>

							<?php if (have_rows('single_case_overall_list')) { ?>
								<ul class="frame__lst">
									<?php while (have_rows('single_case_overall_list')) {
										the_row(); ?>
										<?php if (get_sub_field('single_case_overall')) { ?>
											<li><?php the_sub_field('single_case_overall'); ?></li>
										<?php } ?>
									<?php } ?>
								</ul>
							<?php } ?>


							<?php if (get_field('single_case_story')) { ?>
								<h3 class="frame__ttl">転職ストーリー</h3>

								<p class="frame__txt">
									<?php echo get_field('single_case_story') ?>
								</p>
							<?php } ?>
						</div>
					</div>
				</section>

				<?php if (have_rows('single_case_point_list') || have_rows('single_case_point_incomes')) { ?>
					<section class="pageSinglecase__point">
						<div class="inner -maw-90rem">
							<div class="point__frame">
								<h3 class="frame__ttl">POINT</h3>

								<?php if (have_rows('single_case_point_list')) { ?>
									<ul class="frame__lst">
										<?php while (have_rows('single_case_point_list')) {
											the_row(); ?>
											<?php if (get_sub_field('single_case_point_text')) { ?>
												<li><?php the_sub_field('single_case_point_text'); ?></li>
											<?php } ?>
										<?php } ?>
									</ul>
								<?php } ?>

								<?php if (have_rows('single_case_point_incomes')) { ?>
									<div class="frame__trend">
										<p class="trend__tag">年収推移</p>
										<ul class="trend__lst">
											<?php while (have_rows('single_case_point_incomes')) {
												the_row(); ?>
												<?php if (get_sub_field('single_case_point_income')) { ?>
													<li><?php the_sub_field('single_case_point_income'); ?></li>
												<?php } ?>
											<?php } ?>
										</ul>
									</div>
								<?php } ?>
							</div>
						</div>
					</section>
				<?php } ?>
			</div>

			<section class="pageSinglecase__other">
				<div class="inner">
					<h2 class="other__ttl">その他の成功事例</h2>

					<div class="career__lst">
						<?php
						$args = [
							'post_type' => 'case',
							'orderby' => 'post_date',
							'order' => 'DESC',
							'posts_per_page' => -1,
						];
						$prev_next_posts = vanilla_get_prev_next_posts($args);
						if (isset($prev_next_posts[0])) {
							career_item($prev_next_posts[0]);
						}
						if (isset($prev_next_posts[1])) {
							career_item($prev_next_posts[1]);
						}
						?>
					</div>
				</div>
			</section>
		</main>
<?php  }
} ?>

<script src="<?php echo get_template_directory_uri(); ?>/Assets/Js/single-case.js"></script>


<?php get_footer(); ?>

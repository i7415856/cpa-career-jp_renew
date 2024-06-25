<?php

/**
 * Template Name: pages/求人情報
 * @package WordPress
 * @Template Post Type: post, page,
 * @subpackage Vanilla
 */
get_header(); ?>

<main class="pageRecruit pages">
	<section class="pages__kv">
		<div class="inner">
			<h2 class="kv__ttl">RECRUIT</h2>
			<p class="kv__txt">
				<span>求人情報</span>
			</p>
		</div>
	</section>

	<section class="pages__breadcrumb">
		<div class="inner">
			<div class="breadcrumb">
				<ul class="breadcrumb__list">
					<li class="breadcrumb__item">
						<a href="<?php echo home_url(); ?>" class="breadcrumb__link">トップ</a>
					</li>
					<li class="breadcrumb__item">
						<a href="<?php echo home_url("/recruit/"); ?>" class="breadcrumb__link">求人情報</a>
					</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="recruit_jobs">
		<div class="inner">
			<h3 class="jobs_ttl">
				<span class="-dot -yel">注</span>
				<span class="-dot -yel">目</span>
				<span class="-dot -yel">企</span>
				<span class="-dot -yel">業</span>
				<span class="-black -small">の</span>
				<span class="-blu">求人多数！</span>
			</h3>

			<?php if (get_field('recruit_companies_section_title')) { ?>
				<p class="jobs_subTtl">
					<?php echo get_field('recruit_companies_section_title') ?>
				</p>
			<?php } ?>

			<?php if (have_rows('recruit_companies')) { ?>
				<div class="swiper jobs_slide">
					<div class="swiper-wrapper">
						<?php while (have_rows('recruit_companies')) {
							the_row(); ?>
							<div class="jobs_item swiper-slide">
								<?php if (get_sub_field('recruit_company_img')) { ?>
									<figure class="jobs_logo">
										<img src="<?php the_sub_field('recruit_company_img'); ?>" alt="<?php the_sub_field('recruit_company_title'); ?>">
									</figure>
								<?php } ?>

								<?php if (get_sub_field('recruit_company_title')) { ?>
									<p class="jobs_company">
										<?php the_sub_field('recruit_company_title'); ?>
									</p>
								<?php } ?>

								<?php if (get_sub_field('recruit_company_department') && get_sub_field('recruit_company_in_charge')) { ?>
									<p class="jobs_inCharge">
										<?php echo (get_sub_field('recruit_company_department')) ? "担当部署：" . get_sub_field('recruit_company_department') : ''; ?>
										<br>
										<?php echo (get_sub_field('recruit_company_in_charge')) ? "担当者：" . get_sub_field('recruit_company_in_charge') : ''; ?>
									</p>
								<?php } ?>

								<?php if (get_sub_field('recruit_company_text')) { ?>
									<p class="jobs_txt">
										<?php echo get_sub_field('recruit_company_text'); ?>
									</p>
								<?php } ?>
							</div>
						<?php } ?>
						<?php while (have_rows('recruit_companies')) {
							the_row(); ?>
							<div class="jobs_item swiper-slide">
								<?php if (get_sub_field('recruit_company_img')) { ?>
									<figure class="jobs_logo">
										<img src="<?php the_sub_field('recruit_company_img'); ?>" alt="<?php the_sub_field('recruit_company_title'); ?>">
									</figure>
								<?php } ?>

								<?php if (get_sub_field('recruit_company_title')) { ?>
									<p class="jobs_company">
										<?php the_sub_field('recruit_company_title'); ?>
									</p>
								<?php } ?>

								<?php if (get_sub_field('recruit_company_department') && get_sub_field('recruit_company_in_charge')) { ?>
									<p class="jobs_inCharge">
										<?php echo (get_sub_field('recruit_company_department')) ? "担当部署：" . get_sub_field('recruit_company_department') : ''; ?>
										<br>
										<?php echo (get_sub_field('recruit_company_in_charge')) ? "担当者：" . get_sub_field('recruit_company_in_charge') : ''; ?>
									</p>
								<?php } ?>

								<?php if (get_sub_field('recruit_company_text')) { ?>
									<p class="jobs_txt">
										<?php echo get_sub_field('recruit_company_text'); ?>
									</p>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</section>

	<section class="recruit_jobInfo">
		<div class="inner">
			<h3 class="jobInfo_ttl sec__ttl">求人情報</h3>

			<?php if (get_field('recruit_tags_section_title')) { ?>
				<div class="jobInfo_subTtl">
					<?php echo get_field('recruit_tags_section_title') ?>
				</div>
			<?php } ?>

			<?php if (have_rows('recruit_tags')) { ?>
				<div class="jobInfo_cats">
					<?php while (have_rows('recruit_tags')) {
						the_row(); ?>
						<span class="jobInfo_cat">
							<?php the_sub_field('recruit_tag'); ?>
						</span>
					<?php } ?>
				</div>
			<?php } ?>

			<?php if (have_rows('recruit_cards')) { ?>
				<div class="swiper jobInfo_slide">
					<div class="swiper-wrapper jobInfo_list">
						<?php while (have_rows('recruit_cards')) {
							the_row(); ?>
							<div class="jobInfo_item swiper-slide">
								<div class="item_banner">
									<?php echo get_sub_field('recruit_card_title') ?>
								</div>

								<figure class="item_img">
									<img src="<?php echo get_sub_field('recruit_card_img') ?>" alt="<?php echo get_sub_field('recruit_card_heading') ?>のサムネイル">
								</figure>

								<div class="item_cnt">
									<?php if (have_rows('recruit_card_tags')) { ?>
										<div class="item_tags">
											<?php while (have_rows('recruit_card_tags')) {
												the_row(); ?>
												<span class="item_tag">
													<?php the_sub_field('recruit_card_tag'); ?>
												</span>
											<?php } ?>
										</div>
									<?php } ?>

									<div class="item_desc">
										<p class="item_ttl">
											<?php echo get_sub_field('recruit_card_heading') ?>
										</p>

										<div class="item_income">
											<p class="item_income_label">年収</p>

											<p class="item_income_nums">
												<span class="min">
													<span class="min_no">
														<?php echo num(get_sub_field('recruit_card_prev_income')) ?>
													</span>
													万円
												</span>
												<span class="max">〜<span class="max_no">
														<?php echo num(get_sub_field('recruit_card_next_income')) ?>
													</span>
													万円
												</span>
											</p>
										</div>

										<p class="item_txt">
											<?php echo get_sub_field('recruit_card_desc') ?>
										</p>
									</div>

								</div>
								<?php if (get_sub_field('recruit_card_link')) { ?>
									<div class="item_btn_wrap">
										<a href="<?php echo get_sub_field('recruit_card_link') ?>" class="item_btn" target="_blank" rel="noopener">
											<span>求人を紹介してもらう</span>
										</a>
									</div>
								<?php } ?>
							</div>
						<?php } ?>
					</div>

					<div class="jobInfo_slide_pagination swiper-pagination"></div>
					<div class="jobInfo_slide_button swiper-button-prev -prev"></div>
					<div class="jobInfo_slide_button swiper-button-next -next"></div>
				</div>
			<?php } ?>
		</div>
	</section>


	<section class="recruit_others">
		<div class="inner">
			<h3 class="others_ttl">その他非公開求人も<br class="-sp-only">多数あり！</h3>
			<p class="others_subTtl">気になる方はぜひご登録ください</p>

			<div class="others_box">
				<h4 class="box_ttl">非公開求人とは<span class="-yel">サイト上で<br class="-sp-only">公開されない求人</span>です。</h4>
				<p class="box_txt">いと考えていたときに、たまたま父親が手術を受けたのですが、かなり痛そうに見えました。でもその後、良く<br class="-pc-only">
					なっていくのを見て、医師はこういう形で病気から回復する患者さんに携われる職業なのだと思いました。当時<br class="-pc-only">
					は子どもに何かを教えるのは未来があるようでいいなという気持ちから、教師にも憧れていたのですが、人間を<br class="-pc-only">
					知りたいということと父の病気といった経験がうまくマッチして、医師を目</p>
			</div>

			<a href="https://ef.cpa-career.jp/CPASSCAREER_entryform/" target="_blank" rel="noopener" class="others_btn sec__btn">
				<span>非公開求人を紹介してもらう</span>
			</a>
		</div>
	</section>

	<?php if ($recruit_case_posts = get_field('recruit_case_posts')) { ?>
		<section class="pageTop__career">
			<div class="inner">
				<h2 class="sec__ttl">
					<span class="-blu">転職成功事例</span>
				</h2>

				<?php if ($recruit_case_section_title = get_field('recruit_case_section_title')) { ?>
					<p class="career__txt">
						<?php echo $recruit_case_section_title ?>
					</p>
				<?php } ?>

				<div class="swiper" id="recruitCasesSwiper">
					<div class="swiper-wrapper career__lst">
						<?php
						foreach ($recruit_case_posts as $recruit_case_post) {
							career_item($recruit_case_post, 'swiper-slide');
						} ?>
					</div>

					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
					<div class="recruit_cases_pagination swiper-pagination"></div>
				</div>


				<a href="<?php echo home_url("/case/"); ?>" class="sec__detail">詳細はこちら</a>
			</div>
		</section>
	<?php } ?>

	<section class="guide_other" id="guide_other">
		<?php if (have_rows('recruit_others')) { ?>
			<div class="inner">
				<h2 class="sec__ttl other_ttl">
					<span class="-blu"><?php echo get_field('recruit_others_title') ?></span>
				</h2>
				<p class="other_subTtl">
					<?php echo get_field('recruit_others_text') ?>
				</p>

				<div class="other_list">
					<?php while (have_rows('recruit_others')) {
						the_row(); ?>
						<a class="other_item" <?php echo get_sub_field('recruit_other_link') ? ' target="_blank" rel="noopener" href="' . get_sub_field('recruit_other_link') . '"' : "" ?>>
							<figure class="other_img"><img src="<?php the_sub_field('recruit_other_img'); ?>" alt="<?php the_sub_field('recruit_other_text'); ?>"></figure>
							<p class="other_txt"><?php the_sub_field('recruit_other_text'); ?></p>
						</a>
					<?php } ?>
				</div>
			</div>
		<?php } ?>

		<?php require_once(get_theme_file_path() . "/Assets/Components/c-about-cv.php") ?>

	</section>

</main>


<script src="<?php echo get_template_directory_uri(); ?>/Assets/Js/Custom/page-recruit.js">

</script>
<?php get_footer(); ?>

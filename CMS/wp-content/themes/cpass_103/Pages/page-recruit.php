<?php

/**
 * Template Name: 求人情報
 * @package WordPress
 * @Template Post Type: post, page,
 * @subpackage Vanilla
 */
get_header(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js"></script>


<main class="pageRecruit pages">
	<section class="pages__kv">
		<div class="inner">
			<h2 class="kv__ttl">RECRUIT</h2>
			<p class="kv__txt"><span>求人情報</span></p>
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

			<p class="jobs_subTtl">（仮テキスト）CPASSキャリアの転職支援サービスを利用し、<br class="-pc-only">
				理想のキャリアを歩むことに成功した方々をご紹介！</p>


			<?php if (have_rows('recruit_companies')) { ?>
				<div class="swiper jobs_slide">
					<div class="swiper-wrapper">
						<?php while (have_rows('recruit_companies')) {
							the_row(); ?>
							<a class="jobs_item swiper-slide" href="<?php the_sub_field('recruit_company_link'); ?>">
								<figure class="jobs_logo"><img src="<?php the_sub_field('recruit_company_img'); ?>" alt="<?php the_sub_field('recruit_company_title'); ?>"></figure>
								<p class="jobs_company"><?php the_sub_field('recruit_company_title'); ?></p>
								<p class="jobs_inCharge">
									担当部署：<?php the_sub_field('recruit_company_department'); ?><br>
									担当者：<?php the_sub_field('recruit_company_in_charge'); ?>
								</p>
								<p class="jobs_txt"><?php the_sub_field('recruit_company_text'); ?></p>
							</a>
						<?php } ?>
					</div>
				</div>
			<?php } ?>

		</div>
	</section>



	<section class="recruit_jobInfo">
		<div class="inner">
			<h3 class="jobInfo_ttl sec__ttl">求人情報</h3>
			<p class="jobInfo_subTtl"><span class="-yel">あなたの希望を叶える</span>会計人材求人多数</p>

			<?php if (have_rows('recruit_tags')) { ?>
				<div class="jobInfo_cats">
					<?php while (have_rows('recruit_tags')) {
						the_row(); ?>
						<span class="jobInfo_cat"><?php the_sub_field('recruit_tag'); ?></span>
					<?php } ?>
				</div>
			<?php } ?>

			<?php if (have_rows('recruit_cards')) { ?>
				<div class="swiper jobInfo_slide">
					<div class="swiper-wrapper jobInfo_list">
						<?php while (have_rows('recruit_cards')) {
							the_row(); ?>
							<?php the_sub_field('sub_field_name'); ?>
							<div class="jobInfo_item swiper-slide">
								<div class="item_banner">
									<?php echo get_sub_field('recruit_card_title') ?>
								</div>
								<figure class="item_img"><img src="<?php echo get_sub_field('recruit_card_img') ?>" alt=""></figure>
								<div class="item_cnt">

									<?php if (have_rows('recruit_card_tags')) { ?>
										<div class="item_tags">
											<?php while (have_rows('recruit_card_tags')) {
												the_row(); ?>
												<span class="item_tag"><?php the_sub_field('recruit_card_tag'); ?></span>
											<?php } ?>
										</div>
									<?php } ?>

									<p class="item_ttl"><?php echo get_sub_field('recruit_card_heading') ?></p>

									<p class="item_income">
										<span class="min"><span class="min_no"><?php echo get_sub_field('recruit_card_prev_income') ?></span>万円</span>
										<span class="max">〜<span class="max_no"><?php echo get_sub_field('recruit_card_next_income') ?></span>万円</span>
									</p>

									<p class="item_txt"><?php echo get_sub_field('recruit_card_desc') ?></p>
									<a href="<?php echo get_sub_field('recruit_card_link') ?>" class="item_btn" target="_blank" rel="noopener"><span>求人を紹介してもらう</span></a>
								</div>
							</div>
							<div class="jobInfo_item swiper-slide">
								<div class="item_banner">
									<?php echo get_sub_field('recruit_card_title') ?>
								</div>
								<figure class="item_img"><img src="<?php echo get_sub_field('recruit_card_img') ?>" alt=""></figure>
								<div class="item_cnt">

									<?php if (have_rows('recruit_card_tags')) { ?>
										<div class="item_tags">
											<?php while (have_rows('recruit_card_tags')) {
												the_row(); ?>
												<span class="item_tag"><?php the_sub_field('recruit_card_tag'); ?></span>
											<?php } ?>
										</div>
									<?php } ?>

									<p class="item_ttl"><?php echo get_sub_field('recruit_card_heading') ?></p>

									<p class="item_income">
										<span class="min"><span class="min_no"><?php echo get_sub_field('recruit_card_prev_income') ?></span>万円</span>
										<span class="max">〜<span class="max_no"><?php echo get_sub_field('recruit_card_next_income') ?></span>万円</span>
									</p>

									<p class="item_txt"><?php echo get_sub_field('recruit_card_desc') ?></p>
									<a href="<?php echo get_sub_field('recruit_card_link') ?>" class="item_btn" target="_blank" rel="noopener"><span>求人を紹介してもらう</span></a>
								</div>
							</div>
							<div class="jobInfo_item swiper-slide">
								<div class="item_banner">
									<?php echo get_sub_field('recruit_card_title') ?>
								</div>
								<figure class="item_img"><img src="<?php echo get_sub_field('recruit_card_img') ?>" alt=""></figure>
								<div class="item_cnt">

									<?php if (have_rows('recruit_card_tags')) { ?>
										<div class="item_tags">
											<?php while (have_rows('recruit_card_tags')) {
												the_row(); ?>
												<span class="item_tag"><?php the_sub_field('recruit_card_tag'); ?></span>
											<?php } ?>
										</div>
									<?php } ?>

									<p class="item_ttl"><?php echo get_sub_field('recruit_card_heading') ?></p>

									<p class="item_income">
										<span class="min"><span class="min_no"><?php echo get_sub_field('recruit_card_prev_income') ?></span>万円</span>
										<span class="max">〜<span class="max_no"><?php echo get_sub_field('recruit_card_next_income') ?></span>万円</span>
									</p>

									<p class="item_txt"><?php echo get_sub_field('recruit_card_desc') ?></p>
									<a href="<?php echo get_sub_field('recruit_card_link') ?>" class="item_btn" target="_blank" rel="noopener"><span>求人を紹介してもらう</span></a>
								</div>
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

			<a href="__TBD__" class="others_btn sec__btn"><span>非公開求人を紹介してもらう</span></a>
		</div>
	</section>

	<section class="pageTop__career">
		<div class="inner">
			<h2 class="sec__ttl">
				<span class="-blu">転職成功事例</span>
			</h2>

			<p class="career__txt">
				CPASSキャリアの転職支援サービスを利用し、<br class="-pc-only">
				理想のキャリアを歩むことに成功した方々をご紹介！
			</p>

			<?php
			$args = [
				'post_type' => 'case',
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'posts_per_page' => 4,
			];
			$WP_post = new WP_Query($args);
			if ($WP_post->have_posts()) {
			?>
				<div class="swiper" id="recruitCasesSwiper">
					<div class="swiper-wrapper career__lst">
						<?php
						while ($WP_post->have_posts()) {
							$WP_post->the_post();
							career_item($post, 'swiper-slide');
						} ?>
					</div>

					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				</div>
			<?php
			}
			wp_reset_postdata();
			?>

			<a href="<?php echo home_url("/case/"); ?>" class="sec__detail">詳細はこちら</a>
		</div>
	</section>
</main>


<script src="<?php echo get_template_directory_uri(); ?>/Assets/Js/Custom/page-recruit.js"></script>
<?php get_footer(); ?>

<?php

/**
 * Template Name: FAQ 詳細
 * @package WordPress
 * @Template Post Type: post, page,
 * @subpackage Vanilla
 */
get_header(); ?>

<main class="singleFaq pages">
	<section class="pagesBreadcurmb">
		<div class="inner -maw-120rem">
			<?php vanilla_breadcrumb([
				[
					'href' => home_url("/faq/"),
					'text' => 'よくあるご質問',
				],
				[
					'href' => get_permalink(),
					'text' => get_the_title(),
				],
			]) ?>
		</div>
	</section>

	<div class="inner -maw-90rem">
		<article class="singleFaqMain">
			<div class="singleFaqHead singleFaqSection -q">
				<div class="singleFaqHead__desc">
					<?php
					$terms = get_the_terms($post, 'faq_category');
					if ($terms) { ?>
						<div class="singleFaqHead__cats">
							<?php foreach ($terms as $term) {
							?>
								<span class="singleFaqHead__cat">
									<?php echo $term->name ?>
								</span>
							<?php } ?>
						</div>
					<?php } ?>
					<h1 class="singleFaqHead__title"><?php echo get_the_title() ?></h1>
				</div>
			</div>

			<div class="singleFaqSection -a">
				<div class="singleFaq__content">
					<?php the_content() ?>
				</div>
			</div>
		</article>

		<section class="singleFaqInformation">
			<p class="singleFaqInformation__txt">
				個別で<span class="-blu">会計人材専門コンサルタント</span><br>
				に<span class="-blu">ご相談</span>したい方は<span class="-blu">こちら！</span>
			</p>

			<?php require(get_theme_file_path() . "/Assets/Components/c-sec-btn.php") ?>
		</section>
	</div>


	<?php if ($single_faq_related_posts = get_field('single_faq_related_posts')) { ?>
		<section class="singleOtherPosts">
			<div class="inner -maw-90rem">
				<h2 class="singleOtherPosts__title">その他の関連するご質問はこちら</h2>

				<ul class="singleOtherPosts__list">
					<?php
					foreach ($single_faq_related_posts as $post) {
						faq_item($post);
					}
					?>
				</ul>

				<div class="singleOtherPosts__bottonWrap">
					<?php button_type1([
						'text' => 'よくあるご質問一覧に戻る',
						'class' => '-back',
						'attr' => 'href="' . home_url("/faq/") . '"',
						'tag' => 'a',
					]) ?>
				</div>
			</div>
		</section>
	<?php } ?>

</main>



<?php get_footer(); ?>

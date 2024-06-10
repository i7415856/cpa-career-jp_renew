<?php

/**
 * Template Name: 転職ノウハウ
 * @package WordPress
 * @Template Post Type: post, page,
 * @subpackage Vanilla
 */
get_header(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js"></script>

<main class="pageGuide pages">
	<section class="pages__kv">
		<div class="inner">
			<p class="kv__txt"><span>高度会計人材転職</span></p>
			<h2 class="kv__ttl2">転職ノウハウガイド</h2>
			<p class="kv__txt2">CPASSキャリアが、転職・復職・<br class="-sp-only">キャリアアップなど<br class="-pc-only">
				会計人材が転職する際に<br class="-sp-only">役立つ様々な情報をご紹介します！</p>
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
						<a href="<?php echo home_url("/knowhows/"); ?>" class="breadcrumb__link">転職ノウハウガイド</a>
					</li>
				</ul>

			</div>

		</div>
	</section>

	<section class="guide_anchor">
		<div class="inner">
			<div class="anchor_list">
				<a href="#guide_tip" class="anchor_item">転職ノウハウ</a>
				<a href="#guide_ranking" class="anchor_item">人気コラム<br class="-sp-only">ランキング</a>
				<a href="#cases" class="anchor_item">転職成功事例</a>
				<a href="#faq" class="anchor_item">転職Q&A</a>
				<a href="#guide_event" class="anchor_item">セミナー・<br class="-sp-only">イベント情報</a>
			</div>
		</div>
	</section>

	<section class="guide_tip" id="guide_tip">
		<div class="inner">
			<h2 class="sec__ttl tip_ttl">
				<span class="-blu">CPASSキャリアが教える<br>転職ノウハウ</span>
			</h2>

			<?php if (have_rows('knowhows_steps')) { ?>
				<div class="tip_steps">
					<?php
					$step_i = 0;
					while (have_rows('knowhows_steps')) {
						the_row();
						++$step_i;
					?>

						<div class="tip_step">
							<div class="step_head">
								<p class="step_no"><?php echo zero_pad($step_i) ?></p>
								<figure class="step_img"><img src="<?php echo get_sub_field('knowhows_step_img') ?>" alt=""></figure>
								<p class="step_ttl"><?php echo get_sub_field('knowhows_step_title') ?></p>
							</div>

							<div class="step_body">
								<?php if (have_rows('knowhows_step_posts')) { ?>
									<div class="step_list">
										<?php while (have_rows('knowhows_step_posts')) {
											the_row();
											$knowhows_step_post = get_sub_field('knowhows_step_post')[0];
										?>
											<a href="<?php echo esc_url(get_permalink($knowhows_step_post->ID)); ?>"><?php echo (get_sub_field('knowhows_step_post_text')) ? get_sub_field('knowhows_step_post_text') :  $knowhows_step_post->post_title ?></a>
										<?php } ?>
									</div>
								<?php } ?>
							</div>

							<a href="<?php echo get_sub_field('knowhows_step_link') ?>" class="step_more sec__detail">もっと見る</a>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</section>

	<section class="guide_ranking">
		<div class="inner" id="guide_ranking">

			<div class="guide_search">
				<div class="search_head">
					<p>フリーワード検索</p>
				</div>
				<div class="search_body">
					<?php require_once(get_theme_file_path() . "/Assets/Components/c-search-form.php") ?>
				</div>
			</div>

			<h2 class="sec__ttl ranking_ttl">
				<span class="-blu">人気コラムランキング</span>
			</h2>

			<?php
			$args = array(
				'post_type' => 'post',
				'order' => 'DESC',
				'posts_per_page' => 3,
				'meta_key' => 'post_views_count', // メタキーを指定
				'orderby' => 'meta_value_num', // メタキーの数値でソート
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
			if ($WP_post->have_posts()) {
			?>
				<div class="ranking_list -list1">
					<?php
					while ($WP_post->have_posts()) {
						$WP_post->the_post();
						++$i;
					?>
						<a class="ranking_item" href="<?php echo esc_url(get_permalink()); ?>">
							<p class="ranking_no"><?php echo zero_pad($i) ?></p>
							<figure class="ranking_img"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt=""></figure>

							<div class="ranking__desc">
								<div class="ranking_head">

									<?php
									$cat = get_the_terms($post, 'category');
									if ($cat) {
									?>
										<p class="ranking_cat"><?php echo $cat[0]->name ?></p>
									<?php } ?>
									<p class="ranking_date"><?php echo get_the_date('Y.m.d'); ?></p>
								</div>
								<p class="ranking_txt"><?php echo get_the_title() ?></p>
							</div>
						</a>
					<?php } ?>
				</div>
			<?php
			} else {
			?>
				<p class="-tac">投稿がありません。</p>
				<br><br>
			<?php
			}
			wp_reset_postdata();
			?>

			<?php
			$args['posts_per_page'] = 8;
			$args['offset'] = 3;
			$WP_post = new WP_Query($args);
			if ($WP_post->have_posts()) {
			?>
				<div class="swiper ranking_slide">
					<div class="swiper-wrapper ranking_list -list2">

						<?php
						while ($WP_post->have_posts()) {
							$WP_post->the_post();
							++$i;
						?>
							<a class="ranking_item swiper-slide" href="<?php echo esc_url(get_permalink()); ?>">
								<p class="ranking_no"><?php echo zero_pad($i) ?></p>
								<figure class="ranking_img"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt=""></figure>

								<div class="ranking__desc">
									<div class="ranking_head">
										<?php
										$cat = get_the_terms($post, 'category');
										if ($cat) {
										?>
											<p class="ranking_cat"><?php echo $cat[0]->name ?></p>
										<?php } ?>
										<p class="ranking_date"><?php echo get_the_date('Y.m.d'); ?></p>
									</div>
									<p class="ranking_txt"><?php echo get_the_title() ?></p>
								</div>
							</a>
						<?php } ?>
					</div>

					<div class="swiper_nav">
						<div class="swiper-button-prev"></div>
						<div class="swiper-button-next"></div>
					</div>
				</div>
			<?php }
			wp_reset_postdata(); ?>

			<a href="<?php echo home_url("/column/?term=knowhow/"); ?>" class="sec__detail ranking_detail">もっと見る</a>
		</div>

		<section class="pageTop__career" id="cases">
			<div class="inner">
				<h2 class="sec__ttl">
					<span class="-blu">転職成功事例</span>
				</h2>

				<p class="career__txt">
					CPASSキャリアの転職支援サービスを利用し、<br>
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
					<div class="career__lst">
						<?php
						while ($WP_post->have_posts()) {
							$WP_post->the_post();
							career_item($post);
						} ?>
					</div>
				<?php
				}
				wp_reset_postdata();
				?>

				<a href="<?php echo home_url("/case/"); ?>" class="sec__detail">もっと見る</a>
			</div>
		</section>
	</section>

	<section class="pageTop__faq" id="faq">
		<div class="inner">
			<h2 class="sec__ttl">
				<span class="-blu">転職Q&A</span>
			</h2>

			<p class="career__txt">
				（仮テキスト）CPASSキャリアの転職支援サービスを利用し、<br>
				理想のキャリアを歩むことに成功した方々をご紹介！
			</p>

			<div class="faq__lst">
				<dl class="faq__block sec__accor">
					<dt class="block__head">
						<p class="head__ico">Q</p>
						<p class="head__ttl">他のコンサルタントと何が違うんですか？</p>
						<span class="ico__accor">

						</span>
					</dt>
					<dd class="block__cnt">
						<p class="faq__txt">
							転職コンサルタント歴が10～20年のキャリアコンサルタントと、現役で活躍している複数の公認会計士がご相談に応じます。キャリアのプロの見解と、公認会計士同士だからこその意見交換の場が同時に得られます。
						</p>
					</dd>
				</dl>

				<dl class="faq__block sec__accor">
					<dt class="block__head">
						<p class="head__ico">Q</p>
						<p class="head__ttl">今すぐに転職を考えていないのですが、相談に応じていただけますか？</p>
						<span class="ico__accor">

						</span>
					</dt>
					<dd class="block__cnt">
						<p class="faq__txt">はい。1年後でも2年後でも構いません。キャリアについて少し考え始めたタイミングから気軽にご相談ください。</p>
					</dd>
				</dl>

				<dl class="faq__block sec__accor">
					<dt class="block__head">
						<p class="head__ico">Q</p>
						<p class="head__ttl">サービス費用はどのくらいかかるのですか？</p>
						<span class="ico__accor"></span>
					</dt>
					<dd class="block__cnt">
						<p class="faq__txt">費用は一切かかりません。安心してお申込みください。</p>
					</dd>
				</dl>

				<dl class="faq__block sec__accor">
					<dt class="block__head">
						<p class="head__ico">Q</p>
						<p class="head__ttl">オンラインでの相談は対応可能でしょうか？</p>
						<span class="ico__accor"></span>
					</dt>
					<dd class="block__cnt">
						<p class="faq__txt">はい。もちろん可能です。直接対面でもオンラインでもどちらでもご対応いたします。</p>
					</dd>
				</dl>
			</div>

			<a href="<?php echo home_url("/faq/"); ?>" class="sec__detail">もっと見る</a>
		</div>
	</section>

	<section class="guide_event" id="guide_event">
		<div class="inner">
			<h2 class="sec__ttl event_ttl">
				<span class="-blu">セミナー・イベント情報</span>
			</h2>

			<p class="career__txt">
				気になるイベントがあれば、お気軽にご参加ください
			</p>

			<?php
			//WrodPressのfeed.phpの呼び出し
			include_once ABSPATH . WPINC . '/feed.php';
			// 目的のFeedを取得
			$rss_link = "https://cpass-net.jp/rss/YIFFeiOoE77L8uHCJ313";
			$feed = fetch_feed($rss_link);
			if (is_wp_error($feed)) {
				$max_items = 0;
			?>
				<p class="-tac">現在表示可能なイベントはありません。</p>
				<?php
			} else {
				//５件取得
				$max_items = $feed->get_item_quantity(6);
				$feeds = $feed->get_items(0, $max_items);
				if ($max_items) {
				?>
					<div class="swiper event_slide">
						<div class="event_list swiper-wrapper">
							<?php foreach ($feeds as $feed_item) {
								//== サムネイル ====
								if ($enclosure = $feed_item->get_enclosure()) {
									$thumbnail = $enclosure->get_link();
								}

								//== タグやカテゴリ ====
								$categories = [];
								$feed_item_categories = $feed_item->get_item_tags('', 'category');
								if ($feed_item_categories) {
									foreach ($feed_item_categories as $category) {
										$categories[] = $category['data'];
									}
								}

								//== カスタムフィールドから募集中か否かを取得 ====
								$namespace = 'http://cpass-net.jp/rss/';
								$is_recruiting = $feed_item->get_item_tags($namespace, 'recruiting');
								$recruiting_status = ($is_recruiting && $is_recruiting[0]['data'] == 'true') ? '募集中' : '募集中ではない';
							?>
								<a class="event_item swiper-slide" href="<?php echo $feed_item->get_permalink(); ?>" target="_blank" rel="noopener">
									<?php if ($thumbnail) { ?>
										<figure class="event_img"><img src="<?php echo $thumbnail; ?>" alt=""></figure>
									<?php } ?>

									<div class="event_head">
										<p class="event_cat"><?php echo $recruiting_status ?></p>
										<p class="event_date"><?php echo $feed_item->get_date('Y.m.d'); ?></p>
									</div>
									<p class="event_txt">
										<?php echo $feed_item->get_title(); ?>
									</p>

									<?php if ($categories) { ?>
										<ul class="event_tags">
											<?php foreach ($categories as $cat) { ?>
												<li class="event_tag"><?php echo $cat ?></li>
											<?php } ?>
										</ul>
									<?php } ?>
								</a>
							<?php } ?>

						</div>
						<div class="swiper_nav">
							<div class="swiper-button-prev"></div>
							<div class="swiper-button-next"></div>
						</div>
					</div>
				<?php } ?>
			<?php } ?>


			<a href="https://cpass-net.jp/events" target="_blank" rel="noopener" class="sec__detail event_detail">もっと見る</a>
		</div>
	</section>

	<?php if (have_rows('knowhows_others')) { ?>
		<section class="guide_other" id="guide_other">
			<div class="inner">
				<h2 class="sec__ttl other_ttl">
					<span class="-blu">タイトルが入ります</span>
				</h2>
				<p class="other_subTtl">（仮テキスト）CPASSキャリアの転職支援サービスを利用し、<br class="-pc-only">理想のキャリアを歩むことに成功した方々をご紹介！</p>

				<div class="other_list">
					<?php while (have_rows('knowhows_others')) {
						the_row(); ?>
						<a class="other_item" href="<?php the_sub_field('knowhows_other_link'); ?>">
							<figure class="other_img"><img src="<?php the_sub_field('knowhows_other_img'); ?>" alt=""></figure>
							<p class="other_txt"><?php the_sub_field('knowhows_other_text'); ?></p>
						</a>
					<?php } ?>
				</div>
			</div>

			<?php require_once(get_theme_file_path() . "/Assets/Components/c-about-cv.php") ?>

		</section>
	<?php } ?>
</main>

<script src="<?php echo get_template_directory_uri() . '/' ?>/Assets/Js/top.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/Assets/Js/Custom/page-guide.js"></script>
<?php get_footer(); ?>

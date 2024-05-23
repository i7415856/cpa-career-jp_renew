<?php

/**
 * Template Name: 転職ノウハウ
 * @package WordPress
 * @Template Post Type: post, page,
 * @subpackage Vanilla
 */
get_header(); ?>

<?php
$param = vanilla_sanitize_array($_GET);
?>
<main class="pageKnowhows pages">
	<section class="pages__kv">
		<div class="inner">
			<h2 class="kv__ttl">KNOWHOW</h2>
			<p class="kv__txt"><span>転職ノウハウガイド</span></p>
		</div>
	</section>

	<section class="pages__breadcrumb">
		<div class="inner">
			<?php vanilla_breadcrumb([
				[
					'href' => home_url('/knwohows/'),
					'text' => '転職ノウハウガイド',
				],
			]) ?>
		</div>
	</section>

	<div class="inner">
		<section class="pageKnowhowsSteps">
			<h2 class="sec__ttl">
				<span class="-blu">転職ノウハウ</span>
			</h2>
		</section>

		<section class="pageKnowhowsColumns">
			<h2 class="sec__ttl">
				<span class="-blu">コラム</span>
			</h2>

			<?php
			$popular_keywords = vanilla_fetch_popular_keywords() ?>

			<form class="pageKnowhowsSearch">
				<input type="text" name="keyword" id="keyword" value="<?php echo @$param['keyword'] ?>">
				<select name="popular_keywords" id="popularKeywords" >
					<option value="">人気キーワード</option>

					<?php foreach ($popular_keywords as $popular_keyword) { ?>
						<?php if (isset($popular_keyword['word'])) { ?>
							<option value="<?php echo $popular_keyword['word'] ?>"><?php echo $popular_keyword['word'] ?></option>
						<?php } ?>
					<?php } ?>
				</select>
				<input type="submit" id="searchKeywordSubmit">
			</form>


			<script>
				$('#popularKeywords').on('change', function() {
					let popular_keyword = $(this).val()
					$('#keyword').val(popular_keyword)
					$(this).val('')
				})

				document.addEventListener('DOMContentLoaded', function() {
					const form = document.querySelector('.pageKnowhowsSearch');
					form.addEventListener('submit', function(event) {
						event.preventDefault();
						const keyword = document.getElementById('keyword').value;

						fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
								method: 'POST',
								credentials: 'same-origin',
								headers: {
									'Content-Type': 'application/x-www-form-urlencoded',
								},
								body: 'action=vanilla_save_search_keyword&keyword=' + encodeURIComponent(keyword)
							})
							.then(response => response.json())
							.then(data => {
								if (data.success) {
									console.log('Keyword saved: ', keyword);
								} else {
									console.log('Error: ', data.message);
								}
							});

						form.submit()
					});
				});
			</script>


		</section>

		<section class="pageKnowhowsCases">
			<h2 class="sec__ttl">
				<span class="-blu">転職成功事例</span>
			</h2>

			<?php
			$args = [
				'post_type' => 'case',
				'orderby' => 'post_date',
				'order' => 'DESC',
				'posts_per_page' => -1,
			];
			$WP_post = new WP_Query($args);
			if ($WP_post->have_posts()) {
			?>
				<div class="career__lst -col-3">
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
		</section>

		<section class="pageTop__faq">
			<div class="inner">
				<h2 class="sec__ttl">
					<span class="-blu">よくあるご質問</span>
				</h2>

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
							<span class="ico__accor">

							</span>
						</dt>
						<dd class="block__cnt">
							<p class="faq__txt">費用は一切かかりません。安心してお申込みください。</p>
						</dd>
					</dl>

					<dl class="faq__block sec__accor">
						<dt class="block__head">
							<p class="head__ico">Q</p>
							<p class="head__ttl">オンラインでの相談は対応可能でしょうか？</p>
							<span class="ico__accor">

							</span>
						</dt>
						<dd class="block__cnt">
							<p class="faq__txt">はい。もちろん可能です。直接対面でもオンラインでもどちらでもご対応いたします。</p>
						</dd>
					</dl>
				</div>
			</div>
		</section>


	</div>


</main>

<script src="<?php echo get_template_directory_uri() . '/' ?>/Assets/Js/top.js"></script>

<?php get_footer(); ?>

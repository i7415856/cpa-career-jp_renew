<?php

/**
 * Template Name: pages/運営会社
 * @Template Post Type: post, page,
 * @subpackage Vanilla
 */

get_header(); ?>

<main class="pageCompany pages">
		<section class="pages__kv">
			<div class="inner">
				<h2 class="kv__ttl">COMPANY</h2>
				<p class="kv__txt"><span>運営会社</span></p>
			</div>
		</section>

		<section class="pageCompany__about">
			<div class="inner -maw-80rem">
				<h2 class="sec__ttl02">会社情報</h2>

				<div class="about__tbl">
					<dl>
						<dt>社名</dt>
						<dd>CPAキャリアサポート株式会社</dd>
					</dl>
					<dl>
						<dt>代表者</dt>
						<dd>代表取締役　 中園 隼人</dd>
					</dl>
					<dl>
						<dt>設立</dt>
						<dd>2015年4月</dd>
					</dl>
					<dl>
						<dt>有料職業紹介事業<br>許可番号</dt>
						<dd>13－ユ－313028</dd>
					</dl>
					<dl>
						<dt>事業内容</dt>
						<dd>会計人材の転職サポート「CPASSキャリア」の運営、その他付随する業務等</dd>
					</dl>
				</div>

				<div class="about__gallery">
					<figure class="gallery__img01"><img src="<?php echo get_template_directory_uri() ?>/Image/company/img01.jpg" alt="広々とした現代的なオフィススペース。天井には露出した配管やエアコンがあり、中央には長い共有テーブルが配置され、その周りに複数の椅子が並べられています。両側には個別の作業スペースと観葉植物が飾られ、全体的に明るく清潔な雰囲気です。"></figure>
					<figure class="gallery__img02"><img src="<?php echo get_template_directory_uri() ?>/Image/company/img02.jpg" alt="オフィスの背景でグループ写真を撮る13人のチームメンバー。後列には5人の男性が立ち、前列には8人の女性が座っています。全員が「CPASS」と書かれたTシャツを着ています。"></figure>
				</div>
			</div>
		</section>

		<section class="pageCompany__access">
			<div class="inner -maw-80rem">
				<h2 class="sec__ttl02">アクセス</h2>

				<div class="access__intro">
					<p class="intro__txt"><span class="-bg">新宿の伊勢丹メンズ館のすぐ隣り、新宿三丁目駅B5出口から徒歩2分、B3出口から徒歩3分</span>の好立地にオフィスを移転いたしました。</p>

					<p class="intro__txt">CPA会計学院新宿校と同じビルに入っています。同フロアには日本最大級の会計人材の社交の場「CPASS LOUNGE（シーパスラウンジ：<a href="https://cpass-net.jp/cpasslounge" class="-link" target="_blank" rel="noopener">https://cpass-net.jp/cpasslounge</a>）も併設されています。<br>新宿にお買い物に来たついでに、CPA会計学院の新宿校に遊びに来たついでに、CPASS LOUNGEのイベントが開催する前に、是非とも気軽にご相談にいらしてください。</p>

					<figure class="intro__img"><img src="<?php echo get_template_directory_uri() ?>/Image/company/img03.png" alt="CPASSラウンジの複数のアングルからの写真コラージュ。明るく開放的なオフィススペース、天井に吊るされた植物、座席エリア、コーヒーメーカーがあるカウンター、夜間の照明が点いた状態のラウンジ、そしてCPASS LOUNGEのサインが含まれています。"></figure>
				</div>

				<div class="access__map">
					<p class="map__txt"><span class="-tag">オフィス所在地</span><br class="-sp-only">〒160-0022 東京都新宿区新宿3-14-20　新宿テアトルビル6F</p>

					<div class="map__frame">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.3805802407187!2d139.70264717623158!3d35.6922511293677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188cdb95fd9d25%3A0x3da5eee9df986a7d!2z44OG44Ki44OI44Or5paw5a6_!5e0!3m2!1sja!2s!4v1703435875243!5m2!1sja!2s" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
			</div>
		</section>
	</main>

<?php get_footer();

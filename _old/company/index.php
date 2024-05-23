<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website:http://ogp.me/ns/website#">
	<?php require_once("../components/common.php") ?>
	<?php require_once("../components/gtm.php") ?>

	<title>運営会社｜<?php echo $page_title_end ?></title>
	<meta property="og:url" content="<?php echo $home_url ?>/company" />
	<meta property="og:title" content="運営会社｜<?php echo $page_title_end ?>" />
	<meta property="og:description" content=" 運営会社情報のページです。CPASSキャリアは公認会計士をはじめとした会計人のための転職支援サービス。実務経験の長いキャリアコンサルタントと、公認会計士のサポーターが協力しながら、あなたの転職をご支援いたします。非常勤や副業など様々な働き方までをご提案。" />

	<?php require_once("../components/head.php") ?>
</head>

<body>
	<?php require_once("../components/gtm-ns.php") ?>

	<?php require_once("../components/header.php") ?>

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
					<figure class="gallery__img01"><img src="<?php echo $home_url ?>/Image/company/img01.jpg" alt=""></figure>
					<figure class="gallery__img02"><img src="<?php echo $home_url ?>/Image/company/img02.jpg" alt=""></figure>
				</div>
			</div>
		</section>

		<section class="pageCompany__access">
			<div class="inner -maw-80rem">
				<h2 class="sec__ttl02">アクセス</h2>

				<div class="access__intro">
					<p class="intro__txt"><span class="-bg">新宿の伊勢丹メンズ館のすぐ隣り、新宿三丁目駅B5出口から徒歩2分、B3出口から徒歩3分</span>の好立地にオフィスを移転いたしました。</p>

					<p class="intro__txt">CPA会計学院新宿校と同じビルに入っています。同フロアには日本最大級の会計人材の社交の場「CPASS LOUNGE（シーパスラウンジ：<a href="https://cpass-net.jp/cpasslounge" class="-link">https://cpass-net.jp/cpasslounge</a>）も併設されています。<br>新宿にお買い物に来たついでに、CPA会計学院の新宿校に遊びに来たついでに、CPASS LOUNGEのイベントが開催する前に、是非とも気軽にご相談にいらしてください。</p>

					<figure class="intro__img"><img src="<?php echo $home_url ?>/Image/company/img03.png" alt=""></figure>
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

	<?php require_once("../components/footer.php") ?>

	<script src="../Assets/Js/footer.js"></script>
</body>

</html>

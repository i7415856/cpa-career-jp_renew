<?php if (!is_page('reasons')) { ?>
	<section class="pages__cpa">
		<div class="inner">
			<p class="sec__sub -pc-only">CPAグループは</p>

			<h2 class="sec__ttl">
				<span class="-sub -sp-only">CPAグループは</span><br class="-sp-only">
				<span class="-yel">会計人材キャリアを<br class="-sp-only">サポートし続けます</span>
			</h2>

			<div class="cpa__lst">
				<a href="https://cpa-net.jp/" target="_blank" rel="noopener" class="lst__item">
					<p class="item__txt">公認会計士資格スクール</p>
					<figure class="item__img">
						<img src="<?php echo get_template_directory_uri() ?>/Image/Front/img_cpa_logo01.png" alt="CPA Certified Public Accountant">
					</figure>
				</a>

				<a href="https://cpa-net.jp/course/uscpa/" target="_blank" rel="noopener" class="lst__item">
					<p class="item__txt">CPAクオリティでUSCPA合格をサポート</p>
					<figure class="item__img">
						<img src="<?php echo get_template_directory_uri() ?>/Image/Front/img_cpa_logo02.png" alt="CPA会計学院 U.S.CPA講座">
					</figure>
				</a>

				<a href="https://www.cpa-learning.com/" target="_blank" rel="noopener" class="lst__item">
					<p class="item__txt">簿記や会計を完全無料で学べる</p>
					<figure class="item__img">
						<img src="<?php echo get_template_directory_uri() ?>/Image/Front/img_cpa_logo03.png" alt="cpa learning">
					</figure>
				</a>

				<a href="https://cpass-net.jp/" target="_blank" rel="noopener" class="lst__item">
					<p class="item__txt">会計人材の生涯支援プラットフォーム</p>
					<figure class="item__img">
						<img src="<?php echo get_template_directory_uri() ?>/Image/Front/img_cpa_logo04.png" alt="CPASS">
					</figure>
				</a>

				<a href="https://cpa-jobs.jp/" target="_blank" rel="noopener" class="lst__item">
					<p class="item__txt">会計人材特化型求人サイト</p>
					<figure class="item__img">
						<img src="<?php echo get_template_directory_uri() ?>/Image/Front/img_cpa_logo05.png" alt="CPA Jobs">
					</figure>
				</a>

				<a href="https://www.cpa-learning.com/career-directory/" target="_blank" rel="noopener" class="lst__item">
					<p class="item__txt">職種ごとに業務内容などを解説</p>
					<figure class="item__img">
						<img src="<?php echo get_template_directory_uri() ?>/Image/Front/img_cpa_logo06.png" alt="会計人材のキャリア名鑑">
					</figure>
				</a>
			</div>

			<div class="cpa__banners">
				<a href="https://media.cpa-jobs.jp/lp/b-3/" target="_blank" rel="noopener" class="banner__block">
					<figure class="block__img">
						<img src="<?php echo get_template_directory_uri() ?>/Image/Front/img_cpa01.jpg" alt="求人を掲載したい企業様へ">
					</figure>
					<div class="block__cnt">
						<p class="block__txt">
							<strong>求人を掲載したい</strong>
							<br>
							<span class="-yel">企業様</span>へ
						</p>
					</div>
				</a>
			</div>
		</div>
	</section>
<?php } ?>

<footer id="footer">
	<div class="footer__inner -pc-only">
		<div class="footer__cnt">
			<a href="<?php echo home_url(); ?>" class="footer__logo">
				<img src="<?php echo get_template_directory_uri() ?>/Image/common/img_logo_f.svg" alt="CPASS CAREER">

			</a>
			<div class="footer__menu">
				<ul class="menu__lst">
					<li class="lst__item">
						<a href="<?php echo home_url("/recruit/"); ?>">
							求人
						</a>
					</li>

					<li class="lst__item">
						<a href="<?php echo home_url("/consultant/"); ?>">
							コンサルタント
						</a>
					</li>
					<li class="lst__item">
						サービス紹介

						<ul class="sub_menu">
							<li class="sub__item">
								<a href="<?php echo home_url("/reasons/"); ?>">CPASSキャリアについて</a>
							</li>
							<li class="sub__item">
								<a href="<?php echo home_url("/faq/"); ?>">FAQ</a>
							</li>
							<li class="sub__item">
								<a href="https://www.cpa-learning.com/career-directory" target="_blank" rel="noopener">キャリア名鑑</a>
							</li>
							<li class="sub__item">
								<a href="https://cpass-net.jp/events" target="_blank" rel="noopener">CPASSイベント</a>
							</li>
						</ul>
					</li>
				</ul>

				<ul class="menu__lst">
					<li class="lst__item">
						<a href="<?php echo home_url("/column/"); ?>">
							コラム
						</a>

						<ul class="sub_menu">
							<li class="sub__item">
								<a href="<?php echo home_url("/column/"); ?>">コラム一覧</a>
							</li>
							<li class="sub__item">
								<a href="<?php echo home_url("/knowhows/"); ?>">転職ノウハウ</a>
							</li>
						</ul>
					</li>
					<li class="lst__item">
						<a href="<?php echo home_url("/case/"); ?>">
							転職成功事例
						</a>
					</li>
					<li class="lst__item">
						<a href="https://media.cpa-jobs.jp/lp/b-3" target="_blank" rel="noopener">
							求人企業の皆様へ
						</a>
					</li>
					<li class="lst__item">
						<a href="https://cpa-excellent-partners.co.jp/recruit" target="_blank" rel="noopener">
							採用情報
						</a>
					</li>
					<li class="lst__item">
							<a href="<?php echo home_url("/news/"); ?>">
								ニュースリリース
							</a>
						</li>
				</ul>
				<ul class="menu__lst">
					<li class="lst__item">
						<a href="<?php echo home_url("/contact/"); ?>" target="_blank" rel="noopener">
							お問い合わせ
						</a>
					</li>
					<li class="lst__item">
						<a href="<?php echo home_url("/company/"); ?>">
							運営会社情報
						</a>
					</li>
					<li class="lst__item">
						<a href="<?php echo home_url("/privacypolicy/"); ?>">
							プライバシーポリシー
						</a>
					</li>
					<li class="lst__item">
						<a href="<?php echo home_url("/terms/"); ?>">
							利用規約
						</a>
					</li>
				</ul>
				<ul class="menu__lst">
					<li class="lst__item">
						グループサービス

						<ul class="sub_menu">
							<li class="sub__item">
								<a href="https://cpa-net.jp/" target="_blank" rel="noopener">
									公認会計士資格スクール<br>「CPA会計学院」
								</a>
							</li>
							<li class="sub__item">
								<a href="https://www.cpa-learning.com/" target="_blank" rel="noopener">
									簿記や会計を完全無料で学べる<br>「CPAラーニング」
								</a>
							</li>
							<li class="sub__item">
								<a href="https://cpa-jobs.jp/" target="_blank" rel="noopener">
									会計人材特化型 求人サイト<br>「CPA ジョブズ」
								</a>
							</li>
							<li class="sub__item">
								<a href="https://cpass-net.jp/" target="_blank" rel="noopener">
									会計人材の生涯支援プラットフォーム<br>「CPASS」
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>

		<div class="footer__bottom">
			<div class="footer__bottomRight">
				<a href="https://twitter.com/cpa__career" target="_blank" rel="noopener" class="footer__bottomRightX">
					<img src="<?php echo get_template_directory_uri() . '/Image/common/logo_x_white_1.svg' ?>" alt="xのロゴ">
				</a>

				<p class="copyright">&copy; CPAキャリアサポート株式会社</p>
			</div>

			<div class="footer__bottomLeft">
				<div class="footer__bottomLeftFlex">
					<a href="https://cpass-net.jp/" target="_blank" rel="noopener" class="footer__bottomLeftLink">
						<img src="<?php echo get_template_directory_uri() . '/Image/common/banner_footer_1.png' ?>" alt="CPASS 人繋がり、可能性を広げる場">
					</a>
					<a href="https://www.cpa-learning.com/career-directory/" target="_blank" rel="noopener" class="footer__bottomLeftLink">
						<img src="<?php echo get_template_directory_uri() . '/Image/common/banner_footer_2.png' ?>" alt="会計人材のキャリア名鑑">
					</a>
					<a href="https://cpa-career-new-journey.studio.site/" target="_blank" rel="noopener" class="footer__bottomLeftLink">
						<img src="<?php echo get_template_directory_uri() . '/Image/common/banner_footer_3.png' ?>" alt="公認会計士試験 学習経験者向け 就活ポータル">
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="footer__inner footer__inner--sp -sp-only">
		<div class="footer__cnt">
			<a href="<?php echo home_url(); ?>" class="footer__logo">
				<img src="<?php echo get_template_directory_uri() ?>/Image/common/img_logo_f.svg" alt="CPASS CAREER">
			</a>
			<div class="footer__menu">
				<div class="footer__menu--left">
					<ul class="menu__lst">
						<li class="lst__item">
							<a href="<?php echo home_url("/recruit/"); ?>">
								求人
							</a>
						</li>

						<li class="lst__item">
							<a href="<?php echo home_url("/consultant/"); ?>">
								コンサルタント
							</a>
						</li>

						<li class="lst__item">
							サービス紹介
							<ul class="sub_menu">
								<li class="sub__item">
									<a href="<?php echo home_url("/reasons/"); ?>">CPASSキャリアについて</a>
								</li>
								<li class="sub__item">
									<a href="<?php echo home_url("/faq/"); ?>">FAQ</a>
								</li>
							</ul>
						</li>

						<li class="lst__item -column-menu">
							コラム
							<ul class="sub_menu">
								<li class="sub__item">
									<a href="<?php echo home_url("/column/"); ?>">コラム一覧</a>
								</li>
								<li class="sub__item">
									<a href="<?php echo home_url("/knowhows/"); ?>">転職ノウハウ</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="footer__menu--right">
					<ul class="menu__lst">
						<li class="lst__item">
							<a href="<?php echo home_url("/case/"); ?>">
								転職成功事例
							</a>
						</li>
						<li class="lst__item">
							<a href="https://media.cpa-jobs.jp/lp/b-3/" target="_blank" rel="noopener">
								求人企業の皆様へ
							</a>
						</li>
						<li class="lst__item">
							<a href="https://cpa-excellent-partners.co.jp/recruit/" target="_blank" rel="noopener">
								採用情報
							</a>
						</li>
						<li class="lst__item">
							<a href="<?php echo home_url("/news/"); ?>">
								ニュースリリース
							</a>
						</li>
					</ul>

					<ul class="menu__lst -fz-small">
						<li class="lst__item">
							<a href="<?php echo home_url("/contact/"); ?>" target="_blank" rel="noopener">
								お問い合わせ
							</a>
						</li>
						<li class="lst__item">
							<a href="<?php echo home_url("/company/"); ?>">
								運営会社情報
							</a>
						</li>
						<li class="lst__item">
							<a href="<?php echo home_url("/privacypolicy/"); ?>">
								プライバシーポリシー
							</a>
						</li>
						<li class="lst__item">
							<a href="<?php echo home_url("/terms/"); ?>">
								利用規約
							</a>
						</li>
					</ul>
				</div>
				<ul class="menu__lst">
					<li class="lst__item">
						グループサービス

						<ul class="sub_menu">
							<li class="sub__item">
								<a href="https://cpa-net.jp/" target="_blank" rel="noopener">
									公認会計士資格スクール「CPA会計学院」
								</a>
							</li>
							<li class="sub__item">
								<a href="https://www.cpa-learning.com/" target="_blank" rel="noopener">
									簿記や会計を完全無料で学べる「CPAラーニング」
								</a>
							</li>
							<li class="sub__item">
								<a href="https://cpa-jobs.jp/" target="_blank" rel="noopener">
									会計人材特化型 求人サイト「CPA ジョブズ」
								</a>
							</li>
							<li class="sub__item">
								<a href="https://cpass-net.jp/" target="_blank" rel="noopener">
									会計人材の生涯支援プラットフォーム「CPASS」
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>

		<div class="footer__bottom">
			<div class="footer__bottomRight">
				<a href="https://twitter.com/cpa__career" target="_blank" rel="noopener" class="footer__bottomRightX">
					<img src="<?php echo get_template_directory_uri() . '/Image/common/logo_x_white_1.svg' ?>" alt="xのロゴ">
				</a>

				<p class="copyright">&copy; CPAキャリアサポート株式会社</p>
			</div>

			<div class="footer__bottomLeft">
				<div class="footer__bottomLeftFlex">
					<a href="https://cpass-net.jp/" target="_blank" rel="noopener" class="footer__bottomLeftLink">
						<img src="<?php echo get_template_directory_uri() . '/Image/common/banner_footer_1.png' ?>" alt="CPASS 人繋がり、可能性を広げる場">
					</a>
					<a href="https://www.cpa-learning.com/career-directory/" target="_blank" rel="noopener" class="footer__bottomLeftLink">
						<img src="<?php echo get_template_directory_uri() . '/Image/common/banner_footer_2.png' ?>" alt="会計人材のキャリア名鑑">
					</a>
					<a href="https://cpa-career-new-journey.studio.site/" target="_blank" rel="noopener" class="footer__bottomLeftLink">
						<img src="<?php echo get_template_directory_uri() . '/Image/common/banner_footer_3.png' ?>" alt="公認会計士試験 学習経験者向け 就活ポータル">
					</a>
				</div>

			</div>
		</div>
	</div>
</footer>

<script src="<?php echo get_template_directory_uri(); ?>/Assets/Js/footer.js"></script>

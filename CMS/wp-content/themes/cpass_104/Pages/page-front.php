<?php

/**
 * Template Name: pages/トップページ
 * @Template Post Type: post, page,
 * @subpackage Vanilla
 */

get_header(); ?>


<main class="pageTop pages">
	<section class="pageTop__kv">
		<div class="kv__inr">
			<h2 class="kv__ttl">
				<img class="-pc-only" src="<?php echo get_template_directory_uri() . '/' ?>Image/Front/img_kv_ttl.svg" alt>

				<img class="-sp-only" src="<?php echo get_template_directory_uri() . '/' ?>Image/Front/img_kv_ttl_sp.svg" alt>
			</h2>

			<div class="kv__banner">
				<div class="banner__inr">
					<p class="banner__ttl">
						<span class="-sm">専門知識豊富なコンサルタントが</span>
						<br>
						<span class="-yel">さまざまなキャリアの実現に向けて</span>
						<br>共に考えます
					</p>
					<ul class="banner__tags">
						<li>公認会計士</li>
						<li>税理士</li>
						<li>USCPA</li>
						<li>CFO</li>
						<li>経理・財務・税務マネジャー候補</li>
					</ul>
					<div class="banner__frame">
						<p class="frame__num">年収<span class="-num">
								<span class="-lg">6</span>00</span>万円〜<span class="-num">
								<span class="-lg">2</span>,000</span>万円の</p>
						<p class="frame__txt">
							<span class="-yel">非公開求人</span>多数
						</p>
					</div>
				</div>
			</div>

			<div class="kv__popup">
				<a href="https://cpa-career-new-journey.studio.site/" target="_blank" rel="noopener" class="sec__btn sec__btn--portal">
					<span class="sec__btnText">公認会計士試験から<span class="-yel-underline">転向</span>を<br class="-sp-only">
						考えている方はこちら</span>
				</a>
				<div class="xBtn"></div>
			</div>

			<p class="kv__btn">
				<a href="https://ef.cpa-career.jp/CPASSCAREER_entryform/" target="_blank" rel="noopener" class="sec__btn">
					<span class="sec__btnText">無料転職支援サービス<span class="-yel">お申し込み</span></span>
				</a>
				<span class="kv__btnCaption -pc-only">ご登録済みの方は<a href="https://cpass.eeasy.jp/cpass/20240522hp" target="_blank" rel="noopener" class="kv__btnCaptionLink -td-u -color-primary">こちら</a></span>
				<a class="kv__buttonPerson -yellow" href="https://cpass.eeasy.jp/cpass/20240522hp" target="_blank" rel="noopener">ご登録済みの方は<span class="kv__buttonPersonText">こちら</span></a>
			</p>
		</div>
	</section>

	<section class="pageTop__company">
		<div class="inner">
			<h2 class="sec__ttl">
				<span class="-yel">注</span>
				<span class="-yel">目</span>
				<span class="-yel">企</span>
				<span class="-yel">業</span>の<span class="-blu">求人多数！</span>
			</h2>
		</div>

		<div class="company__slide swiper">
			<div class="swiper-wrapper">
				<div class="slide__item swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/Image/Front/logo_1.png" alt></div>
				<div class="slide__item swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/Image/Front/logo_16.png" alt></div>
				<div class="slide__item swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/Image/Front/logo_2.png" alt></div>
				<div class="slide__item swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/Image/Front/logo_3.png" alt></div>
				<div class="slide__item swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/Image/Front/logo_4.png" alt></div>
				<div class="slide__item swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/Image/Front/logo_5.png" alt></div>
				<div class="slide__item swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/Image/Front/logo_6.png" alt></div>
				<div class="slide__item swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/Image/Front/logo_7.png" alt></div>
				<div class="slide__item swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/Image/Front/logo_8.png" alt></div>
				<div class="slide__item swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/Image/Front/logo_9.png" alt></div>
				<div class="slide__item swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/Image/Front/logo_10.png" alt></div>
				<div class="slide__item swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/Image/Front/logo_11.png" alt></div>
				<div class="slide__item swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/Image/Front/logo_12.png" alt></div>
				<div class="slide__item swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/Image/Front/logo_13.png" alt></div>
				<div class="slide__item swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/Image/Front/logo_14.png" alt></div>
				<div class="slide__item swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/Image/Front/logo_15.png" alt></div>
			</div>
		</div>
	</section>

	<?php if (have_rows('front_recruit_cards')) { ?>

		<section class="pageTop__information">
			<div class="inner">
				<h2 class="sec__ttl">求人情報</h2>

				<p class="sec__txt">
					<span class="-yel">あなたの希望を叶える</span>会計人材求人多数
				</p>

				<?php if (have_rows('front_recruit_tags')) { ?>
					<ul class="information__cateLst">
						<?php while (have_rows('front_recruit_tags')) {
							the_row(); ?>
							<li><?php the_sub_field('front_recruit_tag'); ?></li>
						<?php } ?>
					</ul>
				<?php } ?>

				<div class="information__banners">
					<?php while (have_rows('front_recruit_cards')) {
						the_row(); ?>
						<div class="banner__item">
							<div class="banner__head">
								<div class="head__ttl"><?php echo get_sub_field('front_recruit_card_title') ?></div>

							</div>
							<div class="banner__cnt">
								<div class="cnt__block">
									<div class="block__sub">
										<span class="-cate"><?php echo get_sub_field('front_recruit_card_tag') ?></span><?php echo get_sub_field('front_recruit_card_job') ?>
									</div>
									<p class="block__txt"><?php echo get_sub_field('front_recruit_card_heading') ?></p>
								</div>

								<div class="cnt__block">
									<p class="block__tag">年収</p>
									<p class="block__price">
										<span class="block__priceMin"><span class="-md"><?php echo num(get_sub_field('front_recruit_card_prev_income')); ?></span>万円</span><span class="block__priceMax">〜<span class="-lg"><?php echo num(get_sub_field('front_recruit_card_next_income')); ?></span>万円</span>
									</p>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>

				<a href="<?php echo home_url("/recruit/"); ?>" class="sec__detail">詳細はこちら</a>

				<p class="information__txt">会計人材専門コンサルタントならではの<br>
					<span class="-blu">非公開求人を見る</span>なら、<span class="-blu">今すぐ！</span>
				</p>

				<?php require(get_theme_file_path() . "/Assets/Components/c-sec-btn.php") ?>
			</div>
		</section>
	<?php } ?>

	<?php if ($front_case_posts = get_field('front_case_posts')) { ?>

		<section class="pageTop__career">
			<div class="inner">
				<h2 class="sec__ttl">
					<span class="-blu">転職成功事例</span>
				</h2>

				<p class="sec__txt">CPASSキャリアで<br class="-sp-only">
					<span class="-g__yel">理想のキャリアを歩む会計人材たち</span>
				</p>

				<p class="career__txt">
					CPASSキャリアの転職支援サービスを利用し、理想のキャリアを歩むことに成功した方々を紹介します。転職のきっかけやどのように転職先を決定したかなど、具体的な事例を紹介しておりますので、転職を検討している方はご参考ください。
				</p>

				<div class="career__lst -col-3">
					<?php
					foreach ($front_case_posts as $front_case_post) {
						career_item($front_case_post);
					} ?>
				</div>

				<a href="<?php echo home_url("/case/"); ?>" class="sec__detail">詳細はこちら</a>

			</div>
		</section>
	<?php } ?>

	<section class="pageTop__account">
		<div class="inner">
			<p class="sec__sub">会計人材を知り尽くした</p>

			<h2 class="sec__ttl">
				<span class="-b__yel">一流コンサルタント</span>が<br class="-sp-only">
				<span class="-blu">徹底サポート</span>
			</h2>

			<p class="account__txt -txt01">20年以上の支援実績、会計士資格保持者など、<br class="-pc-only"><span class="-w__yel">経験豊富なコンサルタントがゼロからあなたのキャリアをサポートします。</span>
			</p>

			<div class="account__lst">
				<a href="<?php echo home_url("/consultant/nakazono_hayato.html"); ?>" class="account__item">

					<figure class="item__img">
						<img src="<?php echo get_template_directory_uri() ?>/Image/Front/img_account01.jpg" alt>
					</figure>
					<p class="item__ttl">
						<span>3,000名以上の</span>
						<br>
						<span>転職支援実績</span>
					</p>
					<p class="item__name">中園 隼人</p>
				</a>

				<a href="<?php echo home_url("/consultant/komai_shigeru.html"); ?>" class="account__item">
					<figure class="item__img">
						<img src="<?php echo get_template_directory_uri() ?>/Image/Front/img_account02.jpg" alt>
					</figure>
					<p class="item__ttl">
						<span>心から納得できる</span>
						<br>
						<span>転職を目指して</span>
					</p>
					<p class="item__name">駒井 滋</p>
				</a>

				<a href="<?php echo home_url("/consultant/shimizu_tomomi.html"); ?>" class="account__item">
					<figure class="item__img">
						<img src="<?php echo get_template_directory_uri() ?>/Image/Front/img_account03.jpg" alt>
					</figure>
					<p class="item__ttl">
						<span>コンサルタント歴10年</span>
						<br>
						<span>の経験を活かして</span>
					</p>
					<p class="item__name">清水 知美</p>
				</a>

				<a href="<?php echo home_url("/consultant/sugai_go.html"); ?>" class="account__item">
					<figure class="item__img">
						<img src="<?php echo get_template_directory_uri() ?>/Image/Front/img_account04.jpg" alt>
					</figure>
					<p class="item__ttl">
						<span>会計士だから</span>
						<br>
						<span>できるサポートを</span>
					</p>
					<p class="item__name">菅井 剛</p>
				</a>
			</div>

			<a href="<?php echo home_url("/consultant/"); ?>" class="sec__detail">詳細はこちら</a>

			<p class="account__txt -txt02">会計人材専門コンサルタントならではの<br>
				<span class="-blu">非公開求人を見る</span>なら、<span class="-blu">今すぐ！</span>
			</p>

			<?php require(get_theme_file_path() . "/Assets/Components/c-sec-btn.php") ?>
		</div>
	</section>


	<section class="pageTop__cpass">
		<div class="inner">
			<h2 class="sec__ttl">CPASSキャリアが<br class="-sp-only">
				<span class="-yel">選ばれる理由</span>
			</h2>

			<p class="sec__txt">
				会計人材のキャリアに理解のある<br class="-sp-only">CPASSキャリアならではの強み
			</p>

			<div class="cpass__reason">
				<div class="reason__block">
					<p class="block__num">reason<span class="-num">01</span>
					</p>
					<h3 class="block__ttl">
						会計人材のインフラ企業<br>だからこそ集まる、<br>ハイクラス求人に出会える
					</h3>
					<p class="block__txt">
						約7,000人の会計士との繋がりなど、<span class="-yel">会計業界とのネットワーク</span>を駆使して得た<span class="-yel">オリジナル求人</span>を多数ご紹介可能
					</p>
				</div>

				<div class="reason__block">
					<p class="block__num">reason<span class="-num">02</span>
					</p>
					<h3 class="block__ttl">
						会計人材を知り尽くした<br>一流コンサルタントが<br>徹底サポート
					</h3>
					<p class="block__txt">
						<span class="-yel">会計業界に特化</span>した<span class="-yel">深い知識</span>と<span class="-yel">経験</span>を有し、専門性の高いキャリアサポートを提供。人材紹介歴の長いコンサルタントや公認会計士資格を有しているコンサルタントなど、様々なタイプのコンサルタントに相談可能
					</p>
				</div>

				<div class="reason__block">
					<p class="block__num">reason<span class="-num">03</span>
					</p>
					<h3 class="block__ttl">
						学びと交流の視点からも<br>あなたのキャリアを<br>生涯にわたってサポート
					</h3>
					<p class="block__txt">
						ニーズに応じて定期的なフォローはもちろん、グループサービスとして展開している<span class="-yel">交流事業</span>や<span class="-yel">学び</span>のサポートであなたの<span class="-yel">キャリアを生涯にわたってサポート</span>
					</p>
				</div>
			</div>

			<div class="cpass__banner">
				<div class="banner__head">
					<p class="banner__stamp">
						<span class="-blu">会計のビジネス書</span>として<span class="-blu -lg">ご好評</span>いただいております
					</p>
					<p class="banner__note">中園 隼人監修<br>「会計人材のキャリア名鑑<br>（2023年5月発行）」</p>
					<figure class="banner__img">
						<img src="<?php echo get_template_directory_uri() ?>/Image/Front/img_cpass01.png" alt>
					</figure>
				</div>
				<div class="banner__cnt">
					<p class="banner__txt">キャリア名鑑・キャリア診断など会計人材のための<br class="-pc-only">
						<span class="-w__yel">キャリアサポートコンテンツを多数提供</span>している<br class="-pc-only">
						<span class="-w__yel">CPAグループの転職コンサルタントサービス</span> だから、<span class="-w__yel -sm">多くの方にご支持</span>
						いただいています。
					</p>
				</div>
			</div>

			<div class="cpass__reasonsButtonWrap">
				<a href="<?php echo home_url("/reasons/"); ?>" class="sec__detail">詳細はこちら</a>
			</div>

		</div>
	</section>

	<section class="pageTop__usage">
		<div class="usage__bg">
			<div class="inner">
				<h2 class="sec__ttl">
					<span class="-blu">ご利用の流れ</span>
				</h2>

				<p class="sec__txt">CPASSキャリアで<br class="-sp-only">
					<span class="-g__yel">理想のキャリアを歩む会計人材たち</span>
				</p>

				<div class="usage__step">
					<dl class="step__block sec__accor">
						<dt class="block__head">
							<p class="head__tag">STEP 01</p>
							<p class="head__ttl">利用登録</p>
							<span class="ico__accor">

							</span>
						</dt>
						<dd class="block__cnt">
							<p class="step__txt">まずは<a href="https://ef.cpa-career.jp/CPASSCAREER_entryform/" target="_blank" rel="noopener">登録フォーム</a>にて、サービスの前提となるいくつかの情報についてお知らせください。<br>※所要時間２分</p>
						</dd>
					</dl>

					<dl class="step__block sec__accor">
						<dt class="block__head">
							<p class="head__tag">STEP 02</p>
							<p class="head__ttl">来談もしくはオンラインでご相談</p>
							<span class="ico__accor">

							</span>
						</dt>
						<dd class="block__cnt">
							<p class="step__txt">
								フォーム登録後、メールにてご連絡を差し上げます。<br>
								ヒアリングに基づき、自己分析を一緒に行い、1人ひとりに合ったキャリアプランをお伝えします。
							</p>
						</dd>
					</dl>

					<dl class="step__block sec__accor">
						<dt class="block__head">
							<p class="head__tag">STEP 03</p>
							<p class="head__ttl">求人紹介</p>
							<span class="ico__accor">

							</span>
						</dt>
						<dd class="block__cnt">
							<p class="step__txt">
								自己分析を行っていただくことであなたのキャリアプランに合ったベストな求人をご提案することができます。<br>また、転職だけではなく、独立の選択肢や現職での成長を支援することもあります。
							</p>
						</dd>
					</dl>

					<dl class="step__block sec__accor">
						<dt class="block__head">
							<p class="head__tag">STEP 04</p>
							<p class="head__ttl">面接まで徹底サポート</p>
							<span class="ico__accor">

							</span>
						</dt>
						<dd class="block__cnt">
							<p class="step__txt">
								転職という選択肢を選ばれた方は、コンサルタントが履歴書、職務経歴書の添削、面接対策など全てのプロセスを支援します。
							</p>
						</dd>
					</dl>

					<dl class="step__block sec__accor">
						<dt class="block__head">
							<p class="head__tag">STEP 05</p>
							<p class="head__ttl">面接・内定</p>
							<span class="ico__accor">

							</span>
						</dt>
						<dd class="block__cnt">
							<p class="step__txt">
								自己分析とキャリアプランから逆算して厳選したマッチ度の高い企業と面接を実施していただくことで、後悔しない職場選びを実現します。
							</p>
						</dd>
					</dl>

					<dl class="step__block sec__accor">
						<dt class="block__head">
							<p class="head__tag">STEP 06</p>
							<p class="head__ttl">ご入社・アフターフォロー</p>
							<span class="ico__accor">

							</span>
						</dt>
						<dd class="block__cnt">
							<p class="step__txt">
								入社後もコンサルタントが長期的にフォローします。また、現職の退職についてのアドバイスも受けることが可能です。
							</p>
						</dd>
					</dl>
				</div>

				<div class="usageCTA">
					<p class="usage__txt">会計人材専門コンサルタントならではの<br>
						<span class="-blu">非公開求人を見る</span>なら、<span class="-blu">今すぐ！</span>
					</p>

					<?php require(get_theme_file_path() . "/Assets/Components/c-sec-btn.php") ?>
				</div>
			</div>
		</div>
	</section>

	<section class="pageTop__carrier">
		<div class="inner">
			<h2 class="sec__ttl">CPASSキャリアなら<br>
				<span class="-yel">ご登録前の<br class="-sp-only">サポートも充実。</span>
			</h2>

			<div class="carrier__banners">
				<div class="banner__block">
					<p class="block__ttl">
						<span class="-blu">キャリア診断</span>なら
					</p>
					<a href="https://www.cpa-learning.com/career-directory/diagnosis/" target="_blank" rel="noopener" class="block__btn">
						<img src="<?php echo get_template_directory_uri() ?>/Image/Front/btn_carrier01.png" alt="キャリア診断 はこちら！" class="-pc-only">
						<img src="<?php echo get_template_directory_uri() ?>/Image/Front/btn_carrier01-sp.png" alt="キャリア診断 はこちら！" class="-sp-only">
					</a>
				</div>

				<div class="banner__block">
					<p class="block__ttl">
						<span class="-blu">キャリアの種類</span>を知るなら
					</p>
					<a href="https://www.cpa-learning.com/career-directory/" class="block__btn" target="_blank" rel="noopener">
						<img src="<?php echo get_template_directory_uri() ?>/Image/Front/btn_carrier02.png" alt="会計人材のキャリア名鑑" class="-pc-only">
						<img src="<?php echo get_template_directory_uri() ?>/Image/Front/btn_carrier02-sp.png" alt="会計人材のキャリア名鑑" class="-sp-only">
					</a>
				</div>
			</div>

			<div class="carrier__frame">
				<h3 class="frame__ttl">
					<span class="-yel">CPASSキャリア</span>と<br>総合人材紹介エージェントとの<span class="-yel">違い</span>とは？
				</h3>

				<p class="frame__txt">
					CPASSキャリアの転職エージェントサービスと総合人材紹介エージェントの比較を行いました。CPASSキャリアは、会計業界に特化した知識と経験があるからこそ、質の高いアドバイスや専門性の高いサポートを提供することができますので、会計業界でキャリアにお悩みの方は、ぜひご利用ください。
				</p>

				<div class="frame__tbl">
					<table>
						<tr>
							<th>

							</th>
							<th>
								<img src="<?php echo get_template_directory_uri() ?>/Image/Front/img_carrier_logo01.svg" alt="CPASS CAREER" class="-img01">
							</th>
							<th class="-pc-only">
								<p>総合人材紹介エージェント</p>
							</th>
						</tr>
						<tr>
							<th>
								<p class="-ttl">業界知識</p>
							</th>
							<td>
								<p class="-txt -p__cir">
									<span class="-pik">会計業界に特化した<br>深い知識と経験を有し、<br>専門性の高いキャリアサポートを提供</span>
								</p>
							</td>
							<td class="-pc-only">
								<p class="-txt -g__tri">幅広い業界をカバーしているため、<br class="-pc-only">会計業界の知識は不足している</p>
							</td>
						</tr>

						<tr>
							<th>
								<p class="-ttl">紹介求人</p>
							</th>

							<td>
								<p class="-txt -p__cir">約7,000人の会計士との繋がりなど、<br>
									<span class="-pik">会計業界とのネットワークを<br>駆使</span>して得た<span class="-pik">オリジナル求人</span>を<br>多数ご紹介可能
								</p>
							</td>
							<td class="-pc-only">
								<p class="-txt -g__cir">職種問わず幅広い求人を保有</p>
							</td>
						</tr>

						<tr>
							<th>
								<p class="-ttl">コンサル<br class="-sp-only">タント</p>
							</th>

							<td>
								<p class="-txt -p__cir">プロフェッショナルファームや<br>一般事業会社の会計職など、<br>
									<span class="-pik">各分野に特化</span>したコンサルタントが多数在籍。<br>人材紹介歴の長いコンサルタントや<br>公認会計士資格を有している<br>コンサルタントなど<br>
									<span class="-pik">様々なタイプのコンサルタントに相談可能</span>
								</p>
							</td>
							<td class="-pc-only">
								<p class="-txt -g__cir">様々な業界に精通した<br>コンサルタントが在籍</p>
							</td>
						</tr>

						<tr>
							<th>
								<p class="-ttl">転職<br>アドバイス</p>
							</th>

							<td>
								<p class="-txt -p__cir">
									<span class="-pik">公認会計士資格を有している<br>コンサルタントも複数在籍しているため、<br>会計の専門家の目線から<br>企業や求人の選別や<br>質の高いアドバイスを提供可能</span>
								</p>
							</td>
							<td class="-pc-only">
								<p class="-txt -g__cir">一般的な転職ノウハウに基づいた<br>アドバイスを提供</p>
							</td>
						</tr>

						<tr>
							<th>
								<p class="-ttl">アフター<br>フォロー</p>
							</th>

							<td>
								<p class="-txt -p__cir">ニーズに応じて<br>定期的なフォローはもちろん、<br>グループサービスとして展開している<br>
									<span class="-pik">交流</span>事業や<span class="-pik">学び</span>のサポートで<br>あなたの<span class="-pik">キャリアを<br>生涯にわたってサポート</span>
								</p>
							</td>
							<td class="-pc-only">
								<p class="-txt -g__tri">3ヶ月〜半年程度、<br>入社後フォローを実施</p>
							</td>
						</tr>
					</table>

					<table class="-sp-only">
						<tr>
							<th></th>
							<th>
								<p>総合人材紹介<br>エージェント</p>
							</th>
						</tr>

						<tr>
							<th>
								<p class="-ttl">業界知識</p>
							</th>
							<td>
								<p class="-txt -g__tri">幅広い業界をカバーしているため、<br>会計業界の知識は不足している</p>
							</td>
						</tr>

						<tr>
							<th>
								<p class="-ttl">紹介求人</p>
							</th>
							<td>
								<p class="-txt -g__cir">職種問わず幅広い求人を保有</p>
							</td>
						</tr>

						<tr>
							<th>
								<p class="-ttl">コンサル<br class="-sp-only">タント</p>
							</th>

							<td>
								<p class="-txt -g__cir">様々な業界に精通した<br>コンサルタントが在籍</p>
							</td>
						</tr>

						<tr>
							<th>
								<p class="-ttl">転職<br>アドバイス</p>
							</th>

							<td>
								<p class="-txt -g__cir">一般的な転職ノウハウに基づいた<br>アドバイスを提供</p>
							</td>
						</tr>

						<tr>
							<th>
								<p class="-ttl">アフター<br>フォロー</p>
							</th>

							<td>
								<p class="-txt -g__tri">3ヶ月〜半年程度、<br>入社後フォローを実施</p>
							</td>
						</tr>
					</table>
				</div>
			</div>

			<div class="usageCTA">
				<p class="usage__txt">会計人材専門コンサルタントならではの<br>
					<span class="-blu">非公開求人を見る</span>なら、<span class="-blu">今すぐ！</span>
				</p>

				<?php require(get_theme_file_path() . "/Assets/Components/c-sec-btn.php") ?>
			</div>

			<div class="carrier__site">
				<p class="site__txt">
					<span class="-blu">会計人材向け転職サイト</span>
					<br>をお探しならこちらも
				</p>
				<a href="https://cpa-jobs.jp/" target="_blank" rel="noopener" class="site__btn">
					<img src="<?php echo get_template_directory_uri() . '/' ?>Image/Front/btn_carrier03.png" alt="CPA Jobs">
				</a>
			</div>
		</div>
	</section>

	<?php $args = [
		'post_type' => 'post',
		'posts_per_page' => 3,
	];

	$WP_post = new WP_Query($args);
	if ($WP_post->have_posts() && $WP_post->found_posts >= 3) {
	?>
		<section class="pageTopColumn">
			<div class="inner -maw-90rem">
				<h2 class="pageTopColumn__title">コラム</h2>

				<ul class="pageTopColumn__list">
					<?php
					while ($WP_post->have_posts()) {
						$WP_post->the_post();
						column_item($post);
					}
					?>
				</ul>

				<a href="<?php echo home_url("/column/"); ?>" class="sec__detail">もっと見る</a>
			</div>
		</section>
	<?php
	}
	wp_reset_postdata();
	?>
	<?php if ($front_faq_list = get_field('front_faq_list')) { ?>
		<section class="pageTop__faq">
			<div class="inner -maw-100rem">
				<h2 class="sec__ttl">
					<span class="-blu">よくあるご質問</span>
				</h2>

				<div class="faq__lst">
					<?php foreach ($front_faq_list as $front_faq) { ?>
						<dl class="faq__block sec__accor">
							<dt class="block__head">
								<p class="head__ico">Q</p>
								<p class="head__ttl"><?php echo $front_faq->post_title ?></p>
								<span class="ico__accor"></span>
							</dt>
							<dd class="block__cnt">
								<p class="faq__txt">
									<?php echo wp_strip_all_tags($front_faq->post_content) ?>
								</p>
							</dd>
						</dl>
					<?php } ?>
				</div>

				<a href="<?php echo home_url("/faq/"); ?>" class="sec__detail">もっと見る</a>
			</div>
		</section>
	<?php } ?>

	<section class="pageTop__news">
		<div class="inner -maw-100rem">
			<h2 class="sec__ttl">
				<span class="-blu">ニュースリリース</span>
			</h2>

			<?php
			$args = array(
				'post_type' => 'news',
				'paged' => vanilla_paged(),
				'order' => 'DESC',
				'posts_per_page' => 3,
			);

			$WP_post = new WP_Query($args);
			if ($WP_post->have_posts()) {
			?>
				<div class="main__lst">
					<?php
					while ($WP_post->have_posts()) {
						$WP_post->the_post();
						news_item($post);
					} ?>
				</div>
			<?php
			} else {
				echo '投稿はありません';
			}
			wp_reset_postdata();
			?>

			<a href="<?php echo home_url("/news/"); ?>" class="sec__detail">もっと見る</a>
		</div>
	</section>
</main>

<script src="<?php echo get_template_directory_uri() . '/' ?>/Assets/Js/top.js"></script>
<script src="<?php echo get_template_directory_uri() . '/' ?>/Assets/Js/footer.js"></script>

<style>
	@media screen and (max-width: 768px) {
		#footer {
			padding-bottom: 20rem;
		}
	}
</style>

<?php get_footer();

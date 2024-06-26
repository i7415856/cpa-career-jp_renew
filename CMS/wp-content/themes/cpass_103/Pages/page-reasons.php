<?php

/**
 * Template Name: 選ばれる理由
 * @package WordPress
 * @Template Post Type: post, page,
 * @subpackage Vanilla
 */
get_header(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/Assets/Js/Custom/auto-height.js"></script>
<main class="pageAbout pages">
	<section class="pages__breadcrumb">
		<div class="inner">
			<div class="breadcrumb">
				<ul class="breadcrumb__list">
					<li class="breadcrumb__item">
						<a href="<?php echo home_url(); ?>" class="breadcrumb__link">トップ</a>
					</li>
					<li class="breadcrumb__item">
						<a href="<?php echo home_url("/reasons/"); ?>" class="breadcrumb__link">CPASSキャリアについて</a>
					</li>
				</ul>
			</div>

		</div>
	</section>

	<section class="about_kv">
		<div class="inner">
			<h2 class="kv_ttl">About CPASS CAREER</h2>
			<figure class="kv_txt">
				<img src="<?php echo get_template_directory_uri() . '/' ?>Image/about/kv_txt.svg" alt="会計人材に特化すると、転職サービスはここまで変わる" class="-pc-only">
				<img src="<?php echo get_template_directory_uri() . '/' ?>Image/about/kv_txt_sp.svg" alt="会計人材に特化すると、転職サービスはここまで変わる" class="-sp-only">
			</figure>
			<figure class="kv_bg"><img src="<?php echo get_template_directory_uri() . '/' ?>Image/about/kv_bg.png" alt=""></figure>
		</div>
	</section>

	<section class="about_info">
		<div class="inner -maw-90rem">
			<div class="info_box -box1">
				<p class="info_txt">数え切れないほど多くの職種や業界がある中で、<br class="-pc-only">私達は会計人材に関係のある職種と業界にのみ特化してサービスを提供しています。<br class="-pc-only">会計人材に特化することで、会計業界特有のニーズやキャリアパスを深く理解することが可能になるからです。</p>
				<p class="info_txt">最初の就職先、何年間の実務経験があるか、お持ちの資格を簡単に教えていただければ、<br class="-pc-only">そこから広がるキャリアの可能性や、転職可能性に至るまで、ほぼ的確に言い当てられる自信があります。</p>
				<p class="info_txt">だから、到底無理と思われるご提案は一切しませんし、無理強いをすることもありません。<br class="-pc-only">ただし、前向きなチャレンジに対してのご支援となれば話は別です。全力でご支援させていただきます。</p>
				<p class="info_txt">また、どうしても叶えたいキャリアがあって、そこに行くために必要な経験が足りないような状況であれば、<br class="-pc-only">私たちはその時が訪れるまで何年でも待つつもりです。<br class="-pc-only">そして、然るべきタイミングで然るべきご支援をさせていただきます。</p>
				<p class="info_txt">転職活動は戦略と計画も大切です。<br>
					まずはご自身の現状把握をすることから始めてみてください。</p>
				<p class="info_txt">私たちで宜しければ、喜んでそのお手伝いをさせていただきます。</p>
			</div>

			<div class="info_box -box2">
				<figure class="info_head"><img src="<?php echo get_template_directory_uri() . '/' ?>Image/about/about_cpass.svg" alt="CPASS CAREER とは"></figure>
				<p class="info_txt">CPASSキャリアは、<br class="-pc-only">公認会計士の資格スクール『CPA会計学院』と共に会計人材のキャリア構築のサポートをするために誕生しました。<br>
					私たちは、「絶対に転職を煽るようなことはしない」、「マッチ度合いの低い案件を薦めたりしない」、<br class="-pc-only">「相手のペースを大切にする」という姿勢を大切に、<br class="-pc-only">本当の求職者第一主義を貫く転職エージェントを目指すことを約束します。</p>
			</div>
		</div>
	</section>

	<section class="about_reason">
		<div class="inner">
			<h3 class="reason_ttl about_secTtl">
				<span class="en">Reason For Choosing</span>
				<span class="jp">CPASSキャリアが<br class="-sp-only">選ばれる理由</span>
			</h3>

			<div class="reason_list">
				<div class="reason_item -reason1">
					<p class="reason_no">Reason <span>01</span></p>
					<h3 class="reason_head"><span class="reason_head_highlight">会計人材のインフラ企業</span>だからこそ集まる、<br class="-pc-only"><span class="reason_head_highlight">ハイクラス求人</span>に出会える</h3>
					<div class="-pc-only">
						<p class="reason_txt">私たちはCPA会計学院のOB・OGを含む約7,000人の会計士との強固なネットワークを誇ります。この独自のネットワークを活かし、他にはないオリジナル求人を数多くご紹介することが可能です。私たちは「学び」「キャリア」「交流」の3つの領域から、総合的に皆様をサポートするインフラ企業として、ハイクラスな求人情報を豊富に取り揃えています。このような充実したサポート体制により、皆様に質の高いキャリアチャンスを提供することができます。</p>
					</div>

					<div class="-sp-only">
						<div class="reason_txt">私たちはCPA会計学院のOB・OGを含む約7,000人の会計士との強固なネットワークを誇ります。この独自のネットワークを活かし、他にはないオリジナル<span class="-js_more_dots">…</span>
							<p class="-js_more_ttl">もっと読む</p><span class=" -js_more_cnt">求人を数多くご紹介することが可能です。私たちは「学び」「キャリア」「交流」の3つの領域から、総合的に皆様をサポートするインフラ企業として、ハイクラスな求人情報を豊富に取り揃えています。このような充実したサポート体制により、皆様に質の高いキャリアチャンスを提供することができます。</span>
						</div>
					</div>

					<figure class="reason_img"><img src="<?php echo get_template_directory_uri() . '/' ?>Image/about/reason_img_01.png" alt="CPASS CAREER"></figure>
					<a href="https://sub.cpa-career.jp/recruit" target="_blank" rel="noopener" class="reason_btn"><span>求人情報はこちら</span></a>
					<p class="reason_highlight">high class</p>
				</div>

				<div class="reason_item -reason2">
					<p class="reason_no">Reason <span>02</span></p>
					<h3 class="reason_head">会計人材を知り尽くした<br><span class="reason_head_highlight">一流コンサルタント</span>が徹底サポート</h3>
					<div class="-pc-only">
						<p class="reason_txt ">CPASSキャリアの強みは、会計人材に特化した一流コンサルタントによる徹底サポートです。プロフェッショナルファームや一般事業会社の会計職など、各分野に精通したコンサルタントが多数在籍。人材紹介歴20年以上のコンサルタントや公認会計士資格を有するコンサルタントが、業界情報や人脈を駆使し、皆様の転職を支援します。</p>
					</div>

					<div class="-sp-only">
						<div class="reason_txt">CPASSキャリアの強みは、会計人材に特化した一流コンサルタントによる徹底サポートです。プロフェッショナルファームや一般事業会社の会計職など、<span class="-js_more_dots">…</span>
							<p class="-js_more_ttl">もっと読む</p><span class="-js_more_cnt">各分野に精通したコンサルタントが多数在籍。人材紹介歴20年以上のコンサルタントや公認会計士資格を有するコンサルタントが、業界情報や人脈を駆使し、皆様の転職を支援します。</span>
						</div>
					</div>

					<figure class="reason_img">
						<img src="<?php echo get_template_directory_uri() . '/' ?>Image/about/reason_img_02.png" alt="CPASS CAREER" class="">
					</figure>
					<a href="<?php echo home_url("/consultant/"); ?>" class="reason_btn"><span>コンサルタント紹介はこちら</span></a>
					<p class="reason_highlight">consultant</p>
				</div>

				<div class="reason_item -reason3">
					<p class="reason_no">Reason <span>03</span></p>
					<h3 class="reason_head"><span class="reason_head_highlight">学びと交流</span>の視点からも<br class="-sp-only">あなたのキャリアを<br><span class="reason_head_highlight">生涯にわたってサポート</span></h3>
					<div class="-pc-only">
						<p class="reason_txt">CPASSキャリアは、あなたのキャリアを生涯にわたってサポートします。ニーズに応じた定期的なフォローだけでなく、グループサービスで展開する交流事業や学びのサポートも提供しています。3つの事業を通じて、すべての会計人材の可能性を広げ、人生を豊かにする応援をします。交流と学びの機会を活用し、キャリアの可能性を最大限に引き出してください。</p>
					</div>

					<div class="-sp-only">
						<div class="reason_txt">CPASSキャリアは、あなたのキャリアを生涯にわたってサポートします。ニーズに応じた定期的なフォローだけでなく、グループサービスで展開する交流事<span class="-js_more_dots">…</span>
							<p class="-js_more_ttl">もっと読む</p><span class="-js_more_cnt">業や学びのサポートも提供しています。3つの事業を通じて、すべての会計人材の可能性を広げ、人生を豊かにする応援をします。交流と学びの機会を活用し、キャリアの可能性を最大限に引き出してください。</span>
						</div>
					</div>

					<figure class="reason_img">
						<img src="<?php echo get_template_directory_uri() . '/' ?>Image/about/reason_img_03.svg" alt="会計人材に貢献するインフラ企業になる" class="-pc-only">
						<img src="<?php echo get_template_directory_uri() . '/' ?>Image/about/reason_img_03_sp.svg" alt="会計人材に貢献するインフラ企業になる" class="-sp-only">
					</figure>
					<a href="https://cpa-excellent-partners.co.jp/business/" target="_blank" rel="noopener" class="reason_btn"><span>詳しくはこちら</span></a>
					<p class="reason_highlight">career <br class="-pc-only">support</p>
				</div>
			</div>
		</div>
	</section>

	<section class="about_flow">
		<div class="inner -maw-100rem">
			<h3 class="flow_ttl about_secTtl">
				<span class="en">Flow of using CPASS CAREER</span>
				<span class="jp">CPASSキャリア<br class="-sp-only">ご利用の流れ</span>
			</h3>

			<div class="flow_list">
				<div class="flow_item">
					<p class="flow_no">01</p>
					<p class="flow_head -js_collapse_ttl_sp">利用登録</p>
					<div class="-js_collapse_cnt_sp">
						<p class="flow_txt">まずは<a href="https://ef.cpa-career.jp/CPASSCAREER_entryform/" target="_blank" rel="noopener" class="flow_link">登録フォーム</a>にて、現状について教えてください。<br class="-pc-only">
							（所要時間2分）</p>
					</div>
				</div>

				<div class="flow_item">
					<p class="flow_no">02</p>
					<p class="flow_head -js_collapse_ttl_sp">来談もしくは<br class="-sp-only">オンラインでご相談</p>
					<div class="-js_collapse_cnt_sp">
						<p class="flow_txt">フォーム登録後、メールにてご連絡を差し上げます。ヒアリングに基づき、自己分析を一緒に行い、<br>1人ひとりに合ったキャリアプランをお伝えします。</p>
					</div>
				</div>

				<div class="flow_item">
					<p class="flow_no">03</p>
					<p class="flow_head -js_collapse_ttl_sp">求人紹介</p>
					<div class="-js_collapse_cnt_sp">
						<p class="flow_txt">自己分析を行っていただくことであなたのキャリアプランに合ったベストな求人を<br>
							ご提案することができます。<br>
							また、転職だけではなく、独立の選択肢や現職での成長を支援することもあります。</p>
					</div>
				</div>

				<div class="flow_item">
					<p class="flow_no">04</p>
					<p class="flow_head -js_collapse_ttl_sp">面接まで徹底サポート</p>
					<div class="-js_collapse_cnt_sp">
						<p class="flow_txt">転職という選択肢を選ばれた方は、コンサルタントが履歴書、職務経歴書の添削、面接対策など<br>
							全てのプロセスを支援します。</p>
					</div>
				</div>

				<div class="flow_item">
					<p class="flow_no">05</p>
					<p class="flow_head -js_collapse_ttl_sp">面接・内定</p>
					<div class="-js_collapse_cnt_sp">
						<p class="flow_txt">自己分析とキャリアプランから逆算して厳選したマッチ度の高い企業と面接を実施していただくことで、後悔しない職場選びを実現します。</p>
					</div>
				</div>

				<div class="flow_item">
					<p class="flow_no">06</p>
					<p class="flow_head -js_collapse_ttl_sp">ご入社・アフターフォロー</p>
					<div class="-js_collapse_cnt_sp">
						<p class="flow_txt">入社後もコンサルタントが長期的にフォローします。<br>また、現職の退職についてのアドバイスも受けることが可能です。</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php require_once(get_theme_file_path() . "/Assets/Components/c-about-cv.php") ?>

</main>

<script>
	$(".-js_more_ttl").click(function() {
		$(this).toggleClass("-active"),
			$(this).prev(".-js_more_dots").toggleClass("-active"),
			$(this).next(".-js_more_cnt").addClass("-active")
	})

	$(".-js_collapse_ttl_sp").click(function() {
		if ($(window).width() < 769) {
			$(this).toggleClass("-active"),
				$(this).next(".-js_collapse_cnt_sp").slideToggle()
		}
	})

	$(window).resize(function() {


		if ($(window).width() >= 769) {
			$(".-js_collapse_ttl_sp").removeAttr('style');
		}
	});

	$(window).on('load resize', function() {
		$('.flow_head').autoHeight();
	});
</script>

<?php get_footer(); ?>

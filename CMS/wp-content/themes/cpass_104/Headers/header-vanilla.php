<header id="header">
    <div class="header__inner">

        <h1 class="header__logo">
            <img src="<?php echo get_template_directory_uri()  ?>/Image/common/img_logo_red.svg"
                alt="会計人材特化型 転職エージェント CPASS CAREER" class="">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri()  ?>/Image/common/img_logo_h_r1.svg"
                    alt="会計人材特化型 転職エージェント CPASS CAREER">
            </a>
        </h1>


        <div class="header__gnav">
            <ul class="gnav__menu">
                <li class="menu__item">
                    <a class="menu__link" href="<?php echo home_url("/recruit/"); ?>">求人</a>
                </li>

                <li class="menu__item">
                    <a class="menu__link" href="<?php echo home_url("/consultant/"); ?>">コンサルタント</a>
                </li>
                <li class="menu__item -has-submenu">
                    <span class="menu__link ">サービス紹介</span>
                    <ul class="submenu -wide">
                        <li class="submenu__item -sp-order1">
                            <a href="<?php echo home_url("/reasons/"); ?>" class="submenu__link">CPASSキャリアについて</a>
                        </li>
                        <li class="submenu__item -sp-order3">
                            <a href="https://www.cpa-learning.com/career-directory/"
                                class="submenu__link -external-link" target="_blank" rel="noopener">キャリア名鑑</a>
                        </li>
                        <li class="submenu__item -sp-order2">
                            <a href="<?php echo home_url("/faq/"); ?>" class="submenu__link">FAQ</a>
                        </li>
                        <li class="submenu__item -sp-order4">
                            <a href="https://cpass-net.jp/events" class="submenu__link -external-link" target="_blank"
                                rel="noopener">CPASSイベント</a>
                        </li>
                    </ul>
                </li>

                <li class="menu__item -has-submenu">
                    <span class="menu__link">コラム</span>
                    <ul class="submenu -tight">
                        <li class="submenu__item">
                            <a href="<?php echo home_url("/column/"); ?>" class="submenu__link">コラム一覧</a>
                        </li>
                        <li class="submenu__item">
                            <a href="<?php echo home_url("/knowhows/"); ?>" class="submenu__link">転職ノウハウ</a>
                        </li>
                    </ul>
                </li>

                <li class="menu__item">
                    <a class="menu__link" href="<?php echo home_url("/case/"); ?>">転職成功事例</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="https://media.cpa-jobs.jp/lp/b-3/" target="_blank"
                        rel="noopener">求人企業の皆様へ</a>
                </li>
            </ul>
            <div class="menu__buttons">
                <div class="menu__buttonWrap">
                    <a href="https://cpa-career-new-journey.studio.site/" target="_blank" rel="noopener"
                        class="sec__btn sec__btn--portal">
                        <span class="sec__btnText">公認会計士試験から<span class="-yel-underline">転向</span>を<br class="-sp-only">考えている方はこちら</span>
                    </a>
                    <a href="https://ef.cpa-career.jp/CPASSCAREER_entryform/" target="_blank" rel="noopener"
                        class="sec__btn">
                        <span class="sec__btnText">無料転職支援サービス<span class="-yel">お申し込み</span></span>
                    </a>
                </div>
                <span class="menu__btnCaption">ご登録済みの方は<a href="https://cpass.eeasy.jp/cpass/20240522hp" target="_blank"
                        rel="noopener" class="menu__btnCaptionLink -td-u -color-primary">こちら</a></span>
            </div>

            <ul class="gnav__side">
                <li class="side__item">
                    <a href="<?php echo home_url("/contact/"); ?>">お問い合わせ</a>
                </li>
                <li class="side__item">
                    <a href="<?php echo home_url("/company/"); ?>">運営会社情報</a>
                </li>
                <li class="side__item">
                    <a href="<?php echo home_url("/privacypolicy/"); ?>">プライバシーポリシー</a>
                </li>
                <li class="side__item">
                    <a href="<?php echo home_url("/terms/"); ?>">利用規約</a>
                </li>
            </ul>
        </div>

        <div class="header__hamburger">
            <div>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</header>

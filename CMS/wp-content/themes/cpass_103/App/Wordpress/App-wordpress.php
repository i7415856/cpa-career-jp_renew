<?php

/**
 * metaタグ設定
 */
$site_title = "CPASSキャリア（シーパスキャリア）";
$site_description = "公認会計士をはじめとした高度会計人材のための転職支援サービス。実務経験の長いキャリアコンサルタントと、公認会計士のサポーターが協力しながら、あなたの転職をご支援いたします。会計人材のインフラ企業だからこそ集まる、ハイクラスな求人情報を多数ご紹介。";

function vanilla_meta_ogp() {
	global $site_title, $site_description;
	if (!is_admin()) {

		//== 初期設定 ====
		$ogp_image = get_template_directory_uri() . '/Image/common/ogpimage.png';

		//== Twitterのアカウント名 (@xxx) ====
		$twitter_site = '';
		$twitter_card = 'summary_large_image';
		$facebook_app_id = '';

		global $post;


		//== 記事＆固定ページ ====
		if (is_singular()) {
			setup_postdata($post);
			$seo_title = vanilla_get_post_seo_title($post);
			$seo_description = vanilla_get_post_seo_description($post);
			$ogp_title = "{$seo_title}";
			$ogp_description = $seo_description;
			$ogp_url = get_permalink();
			wp_reset_postdata();
		}
		//== index.phpの時 ====
		elseif (is_home()) {
			$posts_page_id = get_option('page_for_posts');
			$post = get_post($posts_page_id);
			$ogp_title = vanilla_get_post_seo_title($post);
			$ogp_description = vanilla_get_post_seo_description($post);
			$ogp_url = get_permalink();
		} else {
			$ogp_title = $site_title;
			$ogp_description = $site_description;
			$ogp_url = home_url();
		}

		//== og:type ====
		$ogp_type = (is_front_page() || is_home()) ? 'website' : 'article';
		$ogp_description = strip_tags(strip_shortcodes($ogp_description));
		$ogp_description = preg_replace('/\s+/', ' ', $ogp_description);
		$ogp_description = mb_substr($ogp_description, 0, 160, 'UTF-8');

		//== favicon ====
		$favicon = get_template_directory_uri() . '/Image/common/favicon.png';


		// 出力するOGPタグをまとめる
		$html = "\n";
		$html .= "<title>{$ogp_title}</title> \n";
		$html .= "<link rel='shortcut icon' href='{$favicon}'> \n";
		$html .= "<meta name='description' content='{$ogp_description}'> \n";
		$html .= "<meta property='og:locale' content='ja_JP'> \n";
		$html .= '<meta property="og:title" content="' . esc_attr($ogp_title) . '">' . "\n";
		$html .= '<meta property="og:description" content="' . $ogp_description . '">' . "\n";
		$html .= '<meta property="og:type" content="' . $ogp_type . '">' . "\n";
		$html .= '<meta property="og:url" content="' . esc_url($ogp_url) . '">' . "\n";
		$html .= '<meta property="og:image" content="' . esc_url($ogp_image) . '">' . "\n";
		$html .= '<meta property="og:site_name" content="' . esc_attr($site_title) . '">' . "\n";
		$html .= '<meta name="twitter:card" content="' . $twitter_card . '">' . "\n";
		$html .= '<meta name="twitter:site" content="' . $twitter_site . '">' . "\n";
		$html .= '<meta property="og:locale" content="ja_JP">' . "\n";

		if ($facebook_app_id != "") {
			$html .= '<meta property="fb:app_id" content="' . $facebook_app_id . '">' . "\n";
		}

		echo $html;
	}
}
// headタグ内にOGPを出力する
add_action('wp_head', 'vanilla_meta_ogp');

/**
 * Yoast SEOのOpen Graphメタタグを削除
 *
 */
function  remove_yoast_seo_meta_tags() {
	remove_all_actions('wpseo_head');
}
add_action('wp_head', 'remove_yoast_seo_meta_tags', 1);


function vanilla_custom_admin_style() {
?>
	<style>
		.singleCaseListIcon .acf-radio-list {
			flex-wrap: wrap;
			display: flex;
			justify-content: space-between;
		}

		.singleCaseListIcon .acf-radio-list>li {
			width: 20%;
		}

		.singleCaseListIcon .acf-radio-list>li img {
			display: inline-block;
			width: 100%;
		}
	</style>
<?php
}
add_action('admin_footer', 'vanilla_custom_admin_style');

/**
 * 投稿保存時に新規投稿のスラッグを「投稿タイプ-連番」に設定する。
 *
 * @param int $post_id 投稿ID。
 * @param WP_Post $post 投稿オブジェクト。
 * @param bool $update 投稿が更新されたかどうか。
 */
function vanilla_set_custom_post_slug($post_id, $post, $update) {
	// 更新時にはスラッグを変更しない
	if ($update) {
			return;
	}

	if (in_array($post->post_type, ['faq', 'news'])) {
			$count_posts = wp_count_posts($post->post_type)->publish;
			$new_slug = $post->post_type . '-' . ($count_posts + 1);

			// スラッグを設定
			$post_data = array(
					'ID' => $post_id,
					'post_name' => $new_slug
			);
			wp_update_post($post_data);
	}
}
add_action('save_post', 'vanilla_set_custom_post_slug', 10, 3);

/**
* カスタム投稿タイプのパーマリンクをカスタマイズする。
*
* @param string $post_link デフォルトのパーマリンク。
* @param WP_Post $post 投稿オブジェクト。
* @return string カスタマイズされたパーマリンク。
*/
function vanilla_custom_post_type_link($post_link, $post) {
	if (is_object($post) && in_array($post->post_type, ['faq', 'news'])) {
			return home_url('/' . $post->post_type . '/' . $post->post_name . '/');
	}
	return $post_link;
}
// add_filter('post_type_link', 'vanilla_custom_post_type_link', 10, 2);

/**
* カスタム投稿タイプのリライトルールを追加する。
*/
function vanilla_custom_rewrite_rules() {
	add_rewrite_rule('^faq/([a-z0-9-]+)/?', 'index.php?post_type=faq&name=$matches[1]', 'top');
	add_rewrite_rule('^news/([a-z0-9-]+)/?', 'index.php?post_type=news&name=$matches[1]', 'top');
}
// add_action('init', 'vanilla_custom_rewrite_rules');

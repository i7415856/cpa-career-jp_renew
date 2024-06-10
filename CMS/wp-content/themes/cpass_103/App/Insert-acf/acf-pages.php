<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group(array(
		'key' => 'tdk_acf',
		'title' => 'TDK',
		'fields' => [
			[
				'key' => 'seo_title',
				'label' => 'タイトル',
				'name' => 'seo_title',
				'type' => 'text',
				'instructions' => '空欄の場合、投稿タイトルが反映されます。（{ページタイトル}｜CPASSキャリア（シーパスキャリア）',
			],
			[
				'key' => 'seo_description',
				'label' => 'ディスクリプション',
				'name' => 'seo_description',
				'type' => 'textarea',
				'instructions' => '空欄の場合、投稿コンテンツが反映されます。投稿コンテンツがない場合は、サイトディスクリプション（公認会計士をはじめとした高度会計人材のための転職支援サービス。実務経験の長いキャリアコンサルタントと、公認会計士のサポーターが協力しながら、あなたの転職をご支援いたします。会計人材のインフラ企業だからこそ集まる、ハイクラスな求人情報を多数ご紹介。）',
			],
		],
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => "page",
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => "post",
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => "consultant",
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => "case",
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => "faq",
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => "news",
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
	));
}

/**
 * カスタムカラムを追加する
 *
 * @param array $columns 既存のカラム配列。
 * @return array 変更されたカラム配列。
 */
function vanilla_add_seo_columns($columns) {
	$columns['seo_title'] = 'SEO title';
	$columns['seo_description'] = 'SEO Description';
	return $columns;
}
add_filter('manage_pages_columns', 'vanilla_add_seo_columns');
add_action('manage_pages_columns', 'vanilla_add_seo_columns', 90, 2);
add_action('manage_post_posts_columns', 'vanilla_add_seo_columns', 90, 2);
add_action('manage_faq_posts_columns', 'vanilla_add_seo_columns', 90, 2);
add_action('manage_consultant_posts_columns', 'vanilla_add_seo_columns', 90, 2);
add_action('manage_news_posts_columns', 'vanilla_add_seo_columns', 90, 2);
add_action('manage_case_posts_columns', 'vanilla_add_seo_columns', 90, 2);

/**
 * カスタムカラムにデータを表示する
 *
 * @param string $column 現在のカラム名。
 * @param int $post_id 現在の投稿ID。
 */
function vanilla_display_seo_columns($column, $post_id) {
	if ('seo_title' === $column) {
		$seo_title = get_post_meta($post_id, 'seo_title', true);
		echo esc_html($seo_title);
	}
	if ('seo_description' === $column) {
		$seo_description = get_post_meta($post_id, 'seo_description', true);
		echo esc_html($seo_description);
	}
}
add_action('manage_pages_custom_column', 'vanilla_display_seo_columns', 90, 2);
add_action('manage_post_posts_custom_column', 'vanilla_display_seo_columns', 90, 2);

/**
 * 投稿保存時にSEOタイトルが空の場合、投稿タイトルをSEOタイトルとして設定する
 *
 * @param int $post_id 現在の投稿ID。
 */
function vanilla_set_default_seo_title($post_id) {
	global $site_title;
	$post = get_post($post_id);

	if (!$post->post_type) {
		return;
	}
	// 自動保存の場合は何もしない
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	//========================
	// 変数定義
	//========================
	$post_title = get_the_title($post_id);
	$seo_title = get_field('seo_title', $post_id);

	//========================
	// seo_title が空の場合、投稿タイトルを設定
	//========================
	if (!$seo_title) {
		//== 投稿タイプ「 コンサルタント 」 ====
		if ($post->post_type === 'consultant') {
			$consultant_name = get_field('single_consultant_profile_name_ja', $post_id);
			update_field('seo_title', "{$consultant_name}｜{$site_title}", $post_id);
		}
		//== 投稿タイプ「 転職成功事例 」 ====
		elseif ($post->post_type === 'case') {
			update_field('seo_title', "転職成功事例 {$post_title}｜{$site_title}", $post_id);
		}
		//== その他 ====
		else {
			update_field('seo_title', "{$post_title}｜{$site_title}", $post_id);
		}
	}
}
add_action('save_post', 'vanilla_set_default_seo_title');

/**
 * 投稿保存時にSEOディスクリプションが空の場合の設定
 *
 * @param int $post_id 現在の投稿ID。
 */
function vanilla_set_default_seo_description($post_id) {
	global $site_description;
	$post = get_post($post_id);

	if (!$post->post_type) {
		return;
	}
	// 自動保存の場合は何もしない
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	//========================
	// seo_description が空の場合
	//========================
	$seo_description = get_field('seo_description', $post_id);
	if (!$seo_description) {
		if ($post->post_type === 'consultant') {
			$consultant_name = get_field('single_consultant_profile_name_ja', $post_id);
			$consultant_seo_description = "CPASSキャリアのコンサルタント{$consultant_name}のご紹介。CPASSキャリアは公認会計士をはじめとした高度会計人材のための転職支援サービス。実務経験の長いキャリアコンサルタントと、公認会計士のサポーターが協力しながら、あなたの転職をご支援いたします。非常勤や副業など様々な働き方までをご提案。";
			update_field('seo_description', $consultant_seo_description, $post_id);
		} else {
			$post_content = wp_strip_all_tags(get_the_content($post_id), false);
			if ($post_content) {
				$post_content = preg_replace('/\s+/', ' ', $post_content);
				$post_content = mb_substr($post_content, 0, 160, 'UTF-8');
				update_field('seo_description', $post_content, $post_id);
			} else {
				update_field('seo_description', $site_description, $post_id);
			}
		}
	}
}
add_action('save_post', 'vanilla_set_default_seo_description');

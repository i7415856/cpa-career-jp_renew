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
				'instruction' => '空欄の場合、投稿タイトルが反映されます',
			],
			[
				'key' => 'seo_description',
				'label' => 'ディスクリプション',
				'name' => 'seo_description',
				'type' => 'textarea',
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

/**
* 投稿保存時にSEOタイトルが空の場合、投稿タイトルをSEOタイトルとして設定する
*
* @param int $post_id 現在の投稿ID。
*/
function vanilla_set_default_seo_title($post_id) {
	// 自動保存の場合は何もしない
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
	}

	// 現在のカスタムフィールドの値を取得
	$seo_title = get_field('seo_title', $post_id);

	// seo_title が空の場合、投稿タイトルを設定
	if (empty($seo_title)) {
			$post_title = get_the_title($post_id);
			update_field('seo_title', $post_title, $post_id);
	}
}
add_action('save_post', 'vanilla_set_default_seo_title');

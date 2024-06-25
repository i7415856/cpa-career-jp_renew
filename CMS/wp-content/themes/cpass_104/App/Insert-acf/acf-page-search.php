<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group(array(
		'key' => 'search_acf',
		'title' => '検索結果ページのカスタムフィールド',
		'fields' => [
			[
				'key' => 'search_keywords_tab',
				'label' => '人気キーワード',
				'name' => 'search_keywords_tab',
				'type' => 'tab',
			],
			[
				'key' => 'search_keywords',
				'label' => '人気キーワード 一覧',
				'name' => 'search_keywords',
				'type' => 'repeater',
				'sub_fields' => [
					[
						'key' => 'search_keyword',
						'label' => '人気キーワード',
						'name' => 'search_keyword',
						'type' => 'text',
						'required' => 1,
						'instructions' => "推奨文字数 : 12文字以下 <br><a href='" . home_url("/wp-admin/admin.php?page=vanilla_keyword_management") . "'>検索キーワードページ</a>からサイト訪問者の実際の検索キーワードを確認できます。",

					]
				],
			],
		],
		'location' => array(
			array(
				array(
					'param' => 'page',
					'operator' => '==',
					'value' => get_page_by_path('search')->ID,
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

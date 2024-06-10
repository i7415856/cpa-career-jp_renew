<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group(array(
		'key' => 'singe_faq_acf',
		'title' => 'よくある質問のカスタムフィールド',
		'fields' => [
			//========================
			// 一覧表示
			//========================
			[
				'key' => 'single_faq_list_tab',
				'label' => 'その他の関連するご質問',
				'name' => 'single_faq_list_tab',
				'type' => 'tab',
			],
			[
				'key' => 'single_faq_related_posts',
				'label' => 'その他の関連するご質問',
				'name' => 'single_faq_related_posts',
				'type' => 'relationship',
				'post_type' => ['faq'],
				'post_status' => [],
				'taxonomy' => [],
			],

		],

		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'faq',
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

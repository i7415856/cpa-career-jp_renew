<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group(array(
		'key' => 'singe_consultant_acf',
		'title' => 'コンサルタントのカスタムフィールド',
		'fields' => [
			//========================
			// プロフィール
			//========================
			[
				'key' => 'single_consultant_profile_tab',
				'label' => 'プロフィール',
				'name' => 'single_consultant_profile_tab',
				'type' => 'tab',
			],
			[
				'key' => 'single_consultant_profile_thumbnail',
				'label' => 'プロフィール画像',
				'name' => 'single_consultant_profile_thumbnail',
				'type' => 'image',
				'return_format' => 'url',
				'required' => 1,
			],
			[
				'key' => 'single_consultant_profile_phrase',
				'label' => 'キャッチフレーズ',
				'name' => 'single_consultant_profile_phrase',
				'type' => 'textarea',
				'required' => 1,
			],
			[
				'key' => 'single_consultant_profile_position',
				'label' => '役職・ポジション',
				'name' => 'single_consultant_profile_position',
				'type' => 'text',
				'required' => 1,
			],
			[
				'key' => 'single_consultant_profile_name_ja',
				'label' => '氏名（日本語）',
				'name' => 'single_consultant_profile_name_ja',
				'type' => 'text',
				'required' => 1,
			],
			[
				'key' => 'single_consultant_profile_name_en',
				'label' => '氏名（英語）',
				'name' => 'single_consultant_profile_name_en',
				'type' => 'text',
				'required' => 1,
			],
			[
				'key' => 'single_consultant_profile_expert_area',
				'label' => '得意分野',
				'name' => 'single_consultant_profile_expert_area',
				'type' => 'repeater',
				'sub_fields' => [
					[
						'key' => 'single_consultant_profile_expert_area_text',
						'label' => '得意分野',
						'name' => 'single_consultant_profile_expert_area_text',
						'type' => 'text',
					]
				],
			],
			[
				'key' => 'single_consultant_profile_name_x',
				'label' => 'Xのリンク',
				'name' => 'single_consultant_profile_name_x',
				'type' => 'url',
			],
			//========================
			// 経歴
			//========================
			[
				'key' => 'single_consultant_history_tab',
				'label' => '経歴',
				'name' => 'single_consultant_history_tab',
				'type' => 'tab',
			],
			[
				'key' => 'single_consultant_history',
				'label' => '経歴',
				'name' => 'single_consultant_history',
				'type' => 'repeater',
				'sub_fields' => [
					[
						'key' => 'single_consultant_history_year',
						'label' => '年月',
						'name' => 'single_consultant_history_year',
						'type' => 'text',
					],
					[
						'key' => 'single_consultant_history_text',
						'label' => 'テキスト',
						'name' => 'single_consultant_history_text',
						'type' => 'text',
					],
				],
			]
		],

		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'consultant',
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

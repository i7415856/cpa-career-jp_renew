<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group(array(
		'key' => 'recruit_page_acf',
		'title' => '求人情報のカスタムフィールド',
		'fields' => [
			//== 企業一覧 ====
			[
				'key' => 'recruit_companies_tab',
				'label' => '企業一覧',
				'name' => 'recruit_companies_tab',
				'type' => 'tab',
			],
			[
				'key' => 'recruit_companies',
				'label' => '企業一覧',
				'name' => 'recruit_companies',
				'type' => 'repeater',
				'layout' => 'block',
				'sub_fields' => [
					[
						'key' => 'recruit_company_img',
						'label' => '画像',
						'name' => 'recruit_company_img',
						'type' => 'image',
						'return_format' => 'url',
					],
					[
						'key' => 'recruit_company_title',
						'label' => 'タイトル',
						'name' => 'recruit_company_title',
						'type' => 'text',
					],
					[
						'key' => 'recruit_company_department',
						'label' => '担当部署',
						'name' => 'recruit_company_department',
						'type' => 'text',
					],
					[
						'key' => 'recruit_company_in_charge',
						'label' => '担当者',
						'name' => 'recruit_company_in_charge',
						'type' => 'text',
					],
					[
						'key' => 'recruit_company_text',
						'label' => '本文',
						'name' => 'recruit_company_text',
						'type' => 'textarea',
					],
					[
						'key' => 'recruit_company_link',
						'label' => 'リンク',
						'name' => 'recruit_company_link',
						'type' => 'url',
					],
				],
			],
			//== 求人情報タグ一覧 ====
			[
				'key' => 'recruit_tags_tab',
				'label' => '求人情報タグ一覧',
				'name' => 'recruit_tags_tab',
				'type' => 'tab',
			],
			[
				'key' => 'recruit_tags',
				'label' => '求人情報タグ一覧',
				'name' => 'recruit_tags',
				'type' => 'repeater',
				'sub_fields' => [
					[
						'key' => 'recruit_tag',
						'label' => 'タグ名',
						'name' => 'recruit_tag',
						'type' => 'text',
					]
				],
			],
			//== 求人情報一覧 ====
			[
				'key' => 'recruit_cards_tab',
				'label' => '求人情報一覧',
				'name' => 'recruit_cards_tab',
				'type' => 'tab',
			],
			[
				'key' => 'recruit_cards',
				'label' => '求人情報一覧',
				'name' => 'recruit_cards',
				'type' => 'repeater',
				'layout' => 'block',
				'sub_fields' => [
					[
						'key' => 'recruit_card_title',
						'label' => 'タイトル',
						'name' => 'recruit_card_title',
						'type' => 'wysiwyg',
						'tabs' => 'visual',
						'toolbar' => 'bold_only',
						'media_upload' => 0,
						'instructions' => '太字（Ctrl + B）の箇所が黄色文字になります。',
					],
					[
						'key' => 'recruit_card_img',
						'label' => '画像',
						'name' => 'recruit_card_img',
						'type' => 'image',
						'return_format' => 'url',
					],
					[
						'key' => 'recruit_card_tags',
						'label' => 'タグ一覧',
						'name' => 'recruit_card_tags',
						'type' => 'repeater',
						'sub_fields' => [
							[
								'key' => 'recruit_card_tag',
								'label' => 'タグ',
								'name' => 'recruit_card_tag',
								'type' => 'text',
							]
						],
					],
					[
						'key' => 'recruit_card_heading',
						'label' => '見出し',
						'name' => 'recruit_card_heading',
						'type' => 'text',
					],
					[
						'key' => 'recruit_card_prev_income',
						'label' => '転職前年収',
						'name' => 'recruit_card_prev_income',
						'type' => 'text',
					],
					[
						'key' => 'recruit_card_next_income',
						'label' => '転職後年収',
						'name' => 'recruit_card_next_income',
						'type' => 'text',
					],
					[
						'key' => 'recruit_card_desc',
						'label' => '本文',
						'name' => 'recruit_card_desc',
						'type' => 'textarea',
					],
					[
						'key' => 'recruit_card_link',
						'label' => 'URL',
						'name' => 'recruit_card_link',
						'type' => 'url',
					],
				],
			],
		],
		'location' => array(
			array(
				array(
					'param' => 'page',
					'operator' => '==',
					'value' => get_page_by_path('recruit')->ID,
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

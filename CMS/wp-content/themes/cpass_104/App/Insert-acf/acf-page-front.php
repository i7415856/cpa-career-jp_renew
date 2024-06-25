<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group(array(
		'key' => 'front_acf',
		'title' => 'トップページのカスタムフィールド',
		'fields' => [

			//== 求人情報 ====
			[
				'key' => 'front_recruit_tab',
				'label' => '求人情報一覧',
				'name' => 'front_recruit_tab',
				'type' => 'tab',
			],
			[
				'key' => 'front_recruit_tags',
				'label' => '求人情報タグ 一覧',
				'name' => 'front_recruit_tags',
				'type' => 'repeater',
				'sub_fields' => [
					[
						'key' => 'front_recruit_tag',
						'label' => '求人情報タグ名',
						'name' => 'front_recruit_tag',
						'type' => 'text',
						'required' => 1,
						'maxlength' => 25,
						'instructions' => "最大25文字まで入力可能（＊10文字以下推奨）",
					]
				],
			],
			[
				'key' => 'front_recruit_cards',
				'label' => '求人情報一覧',
				'name' => 'front_recruit_cards',
				'type' => 'repeater',
				'layout' => 'block',
				'max' => 6,
				'instructions' => 'トップページ「求人情報」」のカード一覧を設定します。設定がない場合セクションごと非表示になります。＊最大6つ。',
				'sub_fields' => [
					[
						'key' => 'front_recruit_card_title',
						'label' => 'タイトル',
						'name' => 'front_recruit_card_title',
						'type' => 'wysiwyg',
						'tabs' => 'visual',
						'toolbar' => 'bold_only',
						'media_upload' => 0,
						'instructions' => '太字（Ctrl + B）の箇所が黄色文字になります。',
						'required' => 1,
					],
					[
						'key' => 'front_recruit_card_tag',
						'label' => 'タグ',
						'name' => 'front_recruit_card_tag',
						'type' => 'text',
						'required' => 1,
						'maxlength' => 15,
						'instructions' => "最大15文字まで入力可能（推奨文字数 : 8文字以下）",
					],
					[
						'key' => 'front_recruit_card_job',
						'label' => '職種',
						'name' => 'front_recruit_card_job',
						'type' => 'text',
						'required' => 1,
						'maxlength' => 15,
						'instructions' => "最大15文字まで入力可能（推奨文字数 : 8文字以下）",
					],
					[
						'key' => 'front_recruit_card_heading',
						'label' => '見出し',
						'name' => 'front_recruit_card_heading',
						'type' => 'text',
						'required' => 1,
						'maxlength' => 20,
						'instructions' => "最大20文字まで入力可能（推奨文字数 : 10文字以下）",
					],
					[
						'key' => 'front_recruit_card_prev_income',
						'label' => '転職前年収',
						'name' => 'front_recruit_card_prev_income',
						'type' => 'number',
						'required' => 1,
						'append' => '万円',
						'max' => 9999,
						'instructions' => "最大4桁まで入力可能",
					],
					[
						'key' => 'front_recruit_card_next_income',
						'label' => '転職後年収',
						'name' => 'front_recruit_card_next_income',
						'type' => 'number',
						'required' => 1,
						'append' => '万円',
						'max' => 9999,
						'instructions' => "最大4桁まで入力可能",
					],
				],
			],
			//== 転職成功事例 ====
			[
				'key' => 'front_case_tab',
				'label' => '転職成功事例',
				'name' => 'front_case_tab',
				'type' => 'tab',
			],
			[
				'key' => 'front_case_posts',
				'label' => '転職成功事例',
				'name' => 'front_case_posts',
				'type' => 'relationship',
				'post_type' => ['case'],
				'instructions' => "選んだ投稿がトップページの「転職成功事例」に表示されます。一つも選択されない場合はセクションごと非表示になります。",
			],
			//== よくある質問 ====
			[
				'key' => 'front_faq_list_tab',
				'label' => 'よくある質問',
				'name' => 'front_faq_list_tab',
				'type' => 'tab',
			],
			[
				'key' => 'front_faq_list',
				'label' => 'よくある質問',
				'name' => 'front_faq_list',
				'type' => 'relationship',
				'post_type' => ['faq'],
				'instructions' => "選んだ投稿がトップページの「よくあるご質問」に表示されます。一つも選択されない場合はセクションごと非表示になります。",
			],
		],
		'location' => array(
			array(
				array(
					'param' => 'page',
					'operator' => '==',
					'value' => get_page_by_path('front')->ID,
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

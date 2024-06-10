<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group(array(
		'key' => 'singe_case_acf',
		'title' => '転職成功事例のカスタムフィールド',
		'fields' => [
			//========================
			// 一覧表示
			//========================
			[
				'key' => 'single_case_list_tab',
				'label' => '一覧表示',
				'name' => 'single_case_list_tab',
				'type' => 'tab',
			],
			[
				'key' => 'single_case_list_copy',
				'label' => 'キャッチコピー（一覧）',
				'name' => 'single_case_list_copy',
				'type' => 'wysiwyg',
				'tabs' => 'visual',
				'instructions' => '太字にするとフロント画面で文字が黄色になります。',
				'required' => 1,
				'toolbar' => 'bold_only',
				'media_upload' => 0,
			],
			[
				'key' => 'single_case_list_copy_detail',
				'label' => 'キャッチコピー（詳細）',
				'name' => 'single_case_list_copy_detail',
				'type' => 'wysiwyg',
				'tabs' => 'visual',
				'instructions' => '太字にするとフロント画面で文字が黄色になります。',
				'required' => 1,
				'toolbar' => 'bold_only',
				'media_upload' => 0,
			],
			[
				'key' => 'single_case_list_age',
				'label' => '年代',
				'name' => 'single_case_list_age',
				'type' => 'select',
				'choices' => [
				"10代" => '10代',
				"20代" => '20代',
				"30代" => '30代',
				"40代" => '40代',
				"50代" => '50代',
				"60代" => '60代',
				"70代" => '70代',
				"80代" => '80代',
				"90代" => '90代',],
				'required' => 1,
			],
			[
				'key' => 'single_case_list_gender',
				'label' => '性別',
				'name' => 'single_case_list_gender',
				'type' => 'select',
				'choices' => [
				"男性" => '男性',
				"女性" => '女性',
				"その他" => 'その他'],
				'required' => 1,
			],
			[
				'key' => 'single_case_list_icon',
				'label' => 'アイコン',
				'name' => 'single_case_list_icon',
				'type' => 'radio',
				'wrapper' => array(
					'width' => '',
					'class' => 'singleCaseListIcon',
					'id' => '',
				),
				'choices' => [
					"img_career01" => '<img src="' . get_template_directory_uri() . '/Image/case/img_career01.png' . '">',
					"img_career02" => '<img src="' . get_template_directory_uri() . '/Image/case/img_career02.png' . '">',
					"img_career03" => '<img src="' . get_template_directory_uri() . '/Image/case/img_career03.png' . '">',
					"img_career04" => '<img src="' . get_template_directory_uri() . '/Image/case/img_career04.png' . '">',
				],
				'required' => 1,
			],
			[
				'key' => 'single_case_list_phrase',
				'label' => '一言',
				'name' => 'single_case_list_phrase',
				'type' => 'text',
			],
			//========================
			// プロフィール
			//========================
			[
				'key' => 'single_case_profile_tab',
				'label' => 'プロフィール',
				'name' => 'single_case_profile_tab',
				'type' => 'tab',
			],
			[
				'key' => 'single_case_profile_prev_industry',
				'label' => '元のキャリア 業界職種',
				'name' => 'single_case_profile_prev_industry',
				'type' => 'text',
				'required' => 1,
			],
			[

				'key' => 'single_case_profile_current_industry',
				'label' => '転職後 業界職種',
				'name' => 'single_case_profile_current_industry',
				'type' => 'text',
				'required' => 1,
			],
			[
				'key' => 'single_case_profile_prev_income',
				'label' => '元のキャリア 年収',
				'name' => 'single_case_profile_prev_income',
				'type' => 'number',
				'required' => 1,
				'app' => '万円',
			],
			[
				'key' => 'single_case_profile_current_industry',
				'label' => '転職後 業界職種',
				'name' => 'single_case_profile_current_industry',
				'type' => 'text',
				'required' => 1,
			],
			[
				'key' => 'single_case_profile_current_income',
				'label' => '転職後 年収',
				'name' => 'single_case_profile_current_income',
				'type' => 'number',
				'app' => '万円',
				'required' => 1,
			],
			//========================
			// 概要
			//========================
			[
				'key' => 'single_case_overall_tab',
				'label' => '概要',
				'name' => 'single_case_overall_tab',
				'type' => 'tab',
			],
			[
				'key' => 'single_case_overall_list',
				'label' => '概要',
				'name' => 'single_case_overall_list',
				'type' => 'repeater',
				'sub_fields' => [
					[
						'key' => 'single_case_overall',
						'label' => '概要',
						'name' => 'single_case_overall',
						'type' => 'wysiwyg',
						'instrctions' => '太字にするとフロント画面で白文字青背景になります。',
						'toolbar' => 'bold_only',
						'media_upload' => 0,
					]
				],
			],
			//========================
			// 転職ストーリー
			//========================
			[
				'key' => 'single_case_story_tab',
				'label' => '転職ストーリー',
				'name' => 'single_case_story_tab',
				'type' => 'tab',
			],
			[
				'key' => 'single_case_story',
				'label' => '転職ストーリー',
				'name' => 'single_case_story',
				'type' => 'textarea',
			],
			//========================
			// POINT
			//========================
			[
				'key' => 'single_case_point_tab',
				'label' => 'POINT',
				'name' => 'single_case_point_tab',
				'type' => 'tab',
			],
			[
				'key' => 'single_case_point_list',
				'label' => 'POINT',
				'name' => 'single_case_point_list',
				'type' => 'repeater',
				'sub_fields' => [
					[
						'key' => 'single_case_point_text',
						'label' => 'テキスト(箇条書き)',
						'name' => 'single_case_point_text',
						'type' => 'textarea',
					],
				],
			],
			[
				'key' => 'single_case_point_incomes',
				'label' => 'POINT',
				'name' => 'single_case_point_incomes',
				'type' => 'repeater',
				'sub_fields' => [
					[
						'key' => 'single_case_point_income',
						'label' => '年収移行',
						'name' => 'single_case_point_income',
						'type' => 'wysiwyg',
						'toolbar' => 'bold_only',
						'media_upload' => 0,
					],
				],
			],
		],

		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'case',
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

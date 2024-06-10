<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group(array(
		'key' => 'knowhows_page_acf',
		'title' => '転職ノウハウのカスタムフィールド',
		'fields' => [
			[
				'key' => 'knowhows_steps_tab',
				'label' => 'ステップ',
				'name' => 'knowhows_steps_tab',
				'type' => 'tab',
			],
			[
				'key' => 'knowhows_steps',
				'label' => 'ステップ',
				'name' => 'knowhows_steps',
				'type' => 'repeater',
				'layout' => 'block',
				'sub_fields' => [
					[
						'key' => 'knowhows_step_img',
						'label' => '画像',
						'name' => 'knowhows_step_img',
						'type' => 'image',
						'return_format' => 'url',
					],
					[
						'key' => 'knowhows_step_title',
						'label' => 'タイトル',
						'name' => 'knowhows_step_title',
						'type' => 'textarea',
					],
					[
						'key' => 'knowhows_step_posts',
						'label' => 'ノウハウ投稿リスト',
						'name' => 'knowhows_step_posts',
						'type' => 'repeater',
						'sub_fields' => [
							[
								'key' => 'knowhows_step_post',
								'label' => 'ノウハウ投稿',
								'name' => 'knowhows_step_post',
								'type' => 'relationship',
								'post_type' => ['post'],
								'max' => 1,
								'required' => 1,
								'filters' => ['search', 'taxonomy'], // タクソノミーのフィルタを有効にします
								'elements' => ['featured_image'],
								'taxonomy' => [
									[
										'taxonomy' => 'category',
										'field' => 'slug',
										'terms' => 'knowhow', // 絞り込みたいタームのスラッグを指定します
									],
								],
							],
							[
								'key' => 'knowhows_step_post_text',
								'label' => 'ノウハウ投稿 タイトル',
								'name' => 'knowhows_step_post_text',
								'type' => 'text',
								'instructions' => 'こちらに入力した場合こちらのテキストが、入力しない場合は「ノウハウ投稿」の投稿タイトルがページに表示されます',
							]
						],
					],
					[
						'key' => 'knowhows_step_link',
						'label' => '「もっと見る」リンク',
						'name' => 'knowhows_step_link',
						'type' => 'url',
					],
				],
			],
			[
				'key' => 'knowhows_others_tab',
				'label' => 'その他',
				'name' => 'knowhows_others_tab',
				'type' => 'tab',
			],
			[
				'key' => 'knowhows_others',
				'label' => 'タイトルが入ります',
				'name' => 'knowhows_others',
				'type' => 'repeater',
				'layout' => 'block',
				'sub_fields' => [
					[
						'key' => 'knowhows_other_img',
						'label' => '画像',
						'name' => 'knowhows_other_img',
						'type' => 'image',
						'return_format' => 'url',
					],
					[
						'key' => 'knowhows_other_text',
						'label' => 'テキスト',
						'name' => 'knowhows_other_text',
						'type' => 'textarea',
					],
					[
						'key' => 'knowhows_other_link',
						'label' => 'リンク',
						'name' => 'knowhows_other_link',
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
					'value' => get_page_by_path('knowhows')->ID,
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

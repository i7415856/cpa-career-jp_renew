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
				'min' => 1,
				'max' => 5,
				'sub_fields' => [
					[
						'key' => 'knowhows_step_img',
						'label' => '画像',
						'name' => 'knowhows_step_img',
						'type' => 'image',
						'return_format' => 'url',
						'required' => 1,
						'instructions' => "ステップのアイコン画像です。横100px、縦70pxほどの大きさを想定。",
					],
					[
						'key' => 'knowhows_step_title',
						'label' => 'タイトル',
						'name' => 'knowhows_step_title',
						'type' => 'textarea',
						'required' => 1,
						'maxlength' => 30,
						'instructions' => "日本語で10文字だとPC時に1行に収まります。7~15文字程度推奨。＊最大30文字",
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
								'taxonomy' => ["category:knowhow"],
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
						//== 外部リンクなのでblankを設定 ====
						'key' => 'knowhows_step_link',
						'label' => '「もっと見る」リンク',
						'name' => 'knowhows_step_link',
						'type' => 'url',
						'required' => 1,
					],
				],
			],

			//== 人気コラム ====
			[
				'key' => 'knowhows_popular_tab',
				'label' => '人気コラム',
				'name' => 'knowhows_popular_tab',
				'type' => 'tab',
			],
			[
				'key' => 'knowhows_popular_posts',
				'label' => '人気コラムランキング 一覧',
				'name' => 'knowhows_popular_posts',
				'type' => 'relationship',
				'post_type' => ['post'],
				'filters' => ['search', 'taxonomy'], // タクソノミーのフィルタを有効にします
				'instructions' => "「人気コラムランキング」セクションに表示させる投稿を選んで下さい。 *選択可能数 3~11投稿",
				'min' => 3,
				'max' => 11,
			],
			[
				'key' => 'knowhows_popular_boolean',
				'label' => '「人気コラムランキング 一覧」の並び順を採用する',
				'name' => 'knowhows_popular_boolean',
				'type' => 'true_false',
				'instructions' => 'チェックをつけると「人気コラムランキング 一覧」の並び順が採用されます。<br>チェックを外すとコラムの閲覧数が多い順番に表示されます。',
				'message' => '「人気コラムランキング 一覧」の並び順を採用する',
			],
			//== 転職成功事例 ====
			[
				'key' => 'knowhows_recruit_tab',
				'label' => '転職成功事例',
				'name' => 'knowhows_recruit_tab',
				'type' => 'tab',
			],
			[
				'key' => 'knowhows_recruit_section_title',
				'label' => 'セクションタイトル',
				'name' => 'knowhows_recruit_section_title',
				'type' => 'textarea',
				'instructions' => "1行あたり17~25文字程度を推奨。",
			],
			[
				'key' => 'knowhows_recruit_posts',
				'label' => '転職成功事例 一覧',
				'name' => 'knowhows_recruit_posts',
				'type' => 'relationship',
				'post_type' => 'case',
				'required' => 1,
			],


			//== よくある質問 ====
			[
				'key' => 'knowhows_faq_list_tab',
				'label' => 'よくある質問',
				'name' => 'knowhows_faq_list_tab',
				'type' => 'tab',
			],
			[
				'key' => 'knowhows_faq_section_title',
				'label' => 'セクション リード文章',
				'name' => 'knowhows_faq_section_title',
				'type' => 'textarea',
				'required' => 1,
				'instructions' => "1行あたり17~25文字程度を推奨。",
			],
			[
				'key' => 'knowhows_faq_list',
				'label' => 'よくある質問',
				'name' => 'knowhows_faq_list',
				'type' => 'relationship',
				'post_type' => ['faq'],
				'instructions' => "値がない場合はセクションごと削除されます。",
			],
			//== セミナー・イベント情報 ====
			[
				'key' => 'knowhows_seminars_tab',
				'label' => 'セミナー・イベント情報',
				'name' => 'knowhows_seminars_tab',
				'type' => 'tab',
			],
			[
				'key' => 'knowhows_seminars_section_title',
				'label' => 'セクション リード文章',
				'name' => 'knowhows_seminars_section_title',
				'type' => 'textarea',
				'required' => 1,
				'instructions' => "推奨文字数 : 1行あたり17~25文字",
			],

			//== その他 ====
			[
				'key' => 'knowhows_others_tab',
				'label' => 'その他',
				'name' => 'knowhows_others_tab',
				'type' => 'tab',
			],
			[
				'key' => 'knowhows_others_title',
				'label' => 'セクションタイトル',
				'name' => 'knowhows_others_title',
				'type' => 'text',
				'instructions' => "推奨文字数 : 7~15文字",
			],
			[
				'key' => 'knowhows_others_text',
				'label' => 'セクション リード文章',
				'name' => 'knowhows_others_text',
				'type' => 'textarea',
				'instructions' => "推奨文字数 : 1行あたり17~25文字",
			],
			[
				'key' => 'knowhows_others',
				'label' => 'カード一覧',
				'name' => 'knowhows_others',
				'type' => 'repeater',
				'layout' => 'block',
				'instructions' => '入力がない場合はセクションごと消えます。',
				'sub_fields' => [
					[
						'key' => 'knowhows_other_img',
						'label' => '画像',
						'name' => 'knowhows_other_img',
						'type' => 'image',
						'return_format' => 'url',
						'required' => 1,
						'instructions' => "推奨画像サイズ : 横250px 縦150px",
					],
					[
						'key' => 'knowhows_other_text',
						'label' => 'テキスト',
						'name' => 'knowhows_other_text',
						'type' => 'textarea',
						'required' => 1,
						'instructions' => "推奨文字数 : 30~40文字",
					],
					[
						//== 外部リンクなのでblankを設定 ====
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

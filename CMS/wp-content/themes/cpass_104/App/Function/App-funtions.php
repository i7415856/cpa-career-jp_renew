<?php
$site_title = "CPASSキャリア（シーパスキャリア）";
$site_description = "公認会計士をはじめとした高度会計人材のための転職支援サービス。実務経験の長いキャリアコンサルタントと、公認会計士のサポーターが協力しながら、あなたの転職をご支援いたします。会計人材のインフラ企業だからこそ集まる、ハイクラスな求人情報を多数ご紹介。";

/**
 * ブロックエディタの使用可能ブロックを設定する
 *
 * @param array $allowed_blocks
 * @return array $allowed_blocks
 */
function vanilla_allowed_block_types($allowed_blocks) {
	$allowed_blocks = array(
		'vanilla-custom-block/column-heading-h2',
		'vanilla-custom-block/column-heading-h3',
		'core/paragraph',
		'core/image',
		'core/freeform',
		'core/table',
		'core/embed',
		'core/html',
		'core/list',
		'core/list-item',
		'core/separator',
		'core/spacer',
		'core/buttons',
		'core/columns',
		// 他の許可したいブロックをここに追加
	);

	return $allowed_blocks;
}
add_filter('allowed_block_types_all', 'vanilla_allowed_block_types', 10, 2);

/**
 * newsのアーカイブページで年別のアーカイブを取得する関数
 *
 * @return array $years
 */
function vanilla_get_news_yearly_archive() {
	$years = array();
	$args = array(
		'post_type'      => 'news',
		'posts_per_page' => -1, // 全ての投稿を取得
		'orderby'        => 'date',
		'order'          => 'DESC'
	);

	$posts = get_posts($args);

	foreach ($posts as $post) {
		$year = get_the_date('Y', $post->ID);
		if (!in_array($year, $years)) {
			$years[] = $year;
		}
	}

	return $years;
}

/**
 * sidebarで現在のページからアーカイブページの名前を取得する
 *
 * @return string $page_name
 */
function vanilla_get_archive_page_name() {
	if (is_home() || is_singular('post')) {
		$page_name = 'column';
	} elseif (is_page('faq') || is_singular('faq')) {
		$page_name = 'faq';
	} elseif (is_page('news') || is_singular('news')) {
		$page_name = 'news';
	} else {
		$page_name = "column";
	}

	return $page_name;
}

/**
 * singleページで前後の投稿を配列で取得する
 *
 * @param array $args WP_Queryの$argsを同じものを指定できる
 * @return array $prev_next_posts
 */
function vanilla_get_prev_next_posts($args) {
	global $post;
	$defaults = [
		'post_type' => 'post',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'posts_per_page' => -1,
	];

	//--------------------------------------------------
	// 変数の変更
	//--------------------------------------------------
	$args = wp_parse_args($args, $defaults);

	$WP_post = new WP_Query($args);
	$case_posts = $WP_post->posts;
	// IDが165の投稿の前後の投稿を探す
	$target_index = null;
	foreach ($case_posts as $index => $case_post) {
		if ($case_post->ID == $post->ID) {
			$target_index = $index;
			break;
		}
	}

	// 前後の投稿を取得（リング状にする）
	if ($target_index !== null) {
		// 前の投稿を取得、存在しない場合は配列の最後の投稿
		$prev_post = ($target_index > 0) ? $case_posts[$target_index - 1] : $case_posts[count($case_posts) - 1];

		// 次の投稿を取得、存在しない場合は配列の最初の投稿
		$next_post = ($target_index < count($case_posts) - 1) ? $case_posts[$target_index + 1] : $case_posts[0];
	} else {
		// ターゲットが見つからない場合（このスクリプトでは考慮しないが、完全性のために記載）
		$prev_post = null;
		$next_post = null;
	}

	$prev_next_posts = [
		$prev_post,
		$next_post
	];
	return $prev_next_posts;
}



/**
 * デフォルトのタグ機能を無効にします。
 */
function vanilla_remove_default_tags() {
	// 'post_tag'カスタム分類法を削除
	unregister_taxonomy('post_tag');
}
add_action('init', 'vanilla_remove_default_tags');

/**
 * 管理画面のサイドバーからタグメニューを削除します。
 */
function vanilla_remove_tags_menu() {
	remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
}
add_action('admin_menu', 'vanilla_remove_tags_menu');


/**
 * 投稿の閲覧数を記録する関数
 *
 * @param int $postID 投稿のID
 */
function vanilla_set_post_views($postID) {
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	} else {
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}

/**
 * 投稿の閲覧数を表示する関数
 *
 * @param int $postID 投稿のID
 * @return string 閲覧数を表す文字列
 */
function vanilla_get_post_views($postID) {
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0 View";
	}
	return $count . ' Views';
}

/**
 * 投稿が表示されたときに閲覧数をカウントする関数
 *
 * @param int $post_id 投稿のID
 */
function vanilla_track_post_views($post_id) {
	if (!is_single()) return;
	if (empty($post_id)) {
		global $post;
		$post_id = $post->ID;
	}
	vanilla_set_post_views($post_id);
}
add_action('wp_head', 'vanilla_track_post_views');

/**
 * ショートコードを追加してテンプレート内で使用可能にする
 */
add_shortcode('post_views', 'vanilla_get_post_views');

/**
 * 管理画面のカラムに閲覧数を表示する関数
 *
 * @param array $defaults 既存のカラム
 * @return array 閲覧数カラムを追加した配列
 */
function vanilla_posts_column_views($defaults) {
	$defaults['post_views'] = __('Views');
	return $defaults;
}

/**
 * 管理画面のカラムに閲覧数を表示する関数
 *
 * @param string $column_name カラム名
 * @param int $id 投稿のID
 */
function vaniila_posts_custom_column_views($column_name, $id) {
	if ($column_name === 'post_views') {
		echo vanilla_get_post_views(get_the_ID());
	}
}
add_filter('manage_posts_columns', 'vanilla_posts_column_views');
add_action('manage_posts_custom_column', 'vaniila_posts_custom_column_views', 5, 2);

/**
 * 管理画面の投稿リストで閲覧数によるソートオプションを追加します。
 *
 * @param array $columns 既存の列の配列
 * @return array ソート可能な閲覧数列を追加した配列
 */
function vanilla_add_views_sortable_column($columns) {
	$columns['post_views'] = 'post_views';
	return $columns;
}
add_filter('manage_edit-post_sortable_columns', 'vanilla_add_views_sortable_column');

/**
 * 管理画面の投稿リストクエリをカスタマイズして、閲覧数でソートできるようにします。
 *
 * @param WP_Query $query WordPress のクエリオブジェクト
 */
function vanilla_sort_posts_by_views($query) {
	if (!is_admin() || !$query->is_main_query()) {
		return;
	}

	if ('post_views' === $query->get('orderby')) {
		$query->set('meta_key', 'post_views_count');
		$query->set('orderby', 'meta_value_num');
		$query->set('order', $query->get('order')); // 降順に設定
	}
}
add_action('pre_get_posts', 'vanilla_sort_posts_by_views');



/**
 * 数値をゼロ埋めする関数
 *
 * @param int $number 数値
 * @return string ゼロ埋めされた数値
 */
function zero_pad($number) {
	return str_pad($number, 2, '0', STR_PAD_LEFT);
}


/**
 * ACFのWYSIWYGツールバーをカスタマイズする関数。
 *
 * @param array $toolbars 現在のツールバー設定の配列。
 * @return array カスタマイズされたツールバー設定の配列。
 */
function vanilla_acf_wysiwyg_toolbars($toolbars) {
	// デバッグ用にツールバー設定を確認
	error_log(print_r($toolbars, true));

	// すべてのツールバーをリセット
	$toolbars = array();

	// カスタムツールバーの定義
	$toolbars['Bold Only'] = array();
	$toolbars['Bold Only'][1] = array('bold'); // 必要なボタンを追加


	return $toolbars;
}
add_filter('acf/fields/wysiwyg/toolbars', 'vanilla_acf_wysiwyg_toolbars');

/**
 * TinyMCEの初期設定を変更する関数。
 *
 * @param array $settings 現在のTinyMCE設定の配列。
 * @return array カスタマイズされたTinyMCE設定の配列。
 */
function vanilla_acf_wysiwyg_remove_toolbar_buttons($settings) {
	// デフォルトのTinyMCE設定を取得
	$default_toolbar = 'bold';

	// ツールバーの設定
	$settings['toolbar1'] = $default_toolbar;
	$settings['toolbar2'] = '';

	// メニューバーを非表示にする
	$settings['menubar'] = false;

	return $settings;
}
add_filter('tiny_mce_before_init', 'vanilla_acf_wysiwyg_remove_toolbar_buttons');


/**
 * 指定された投稿のSEOタイトルを取得する関数
 *
 * この関数は、指定された投稿のカスタムフィールド 'seo_title' を取得し、
 * 存在しない場合は投稿のタイトルとサイトのタイトルを組み合わせたSEOタイトルを返します。
 *
 * @param WP_Post $post SEOタイトルを取得する対象の投稿オブジェクト
 * @return string SEOタイトル
 */
function vanilla_get_post_seo_title($post) {
	global $site_title;
	$seo_title = get_field('seo_title', $post->ID) ?: get_the_title($post);
	if ($seo_title && strpos($seo_title, $site_title) !== false) {
		$seo_title = str_replace("｜{$site_title}", '', $seo_title);
	}
	$seo_title = $seo_title . " | " . $site_title;
	return $seo_title;
}

/**
 * 指定された投稿のSEOディスクリプションを取得する関数
 *
 * この関数は、指定された投稿のカスタムフィールド 'seo_description' を取得し、
 * 存在しない場合は投稿の内容を使用し、それでも存在しない場合はサイト全体のディスクリプションを返します。
 *
 * @param WP_Post $post SEOディスクリプションを取得する対象の投稿オブジェクト
 * @return string SEOディスクリプション
 */
function vanilla_get_post_seo_description($post) {
	global $site_description;
	$seo_description = get_field('seo_description', $post->ID) ?: (get_the_content($post) ?: $site_description);
	return $seo_description;
}


//===================================
//
// プレビュー投稿でもカスタムフィールドの値を参照するための関数たち
//
//===================================
/**
 * ajax用のscriptを読み込む
 *
 */
function vanilla_enqueue_preview_ajax_script() {
	wp_enqueue_script('my-preview-ajax-script', get_template_directory_uri() . '/Assets/Js/my-preview-ajax.js', array('jquery'), null, true);

	wp_localize_script('my-preview-ajax-script', 'myPreviewAjax', array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'nonce'    => wp_create_nonce('my-preview-nonce'),
	));
}
add_action('admin_enqueue_scripts', 'vanilla_enqueue_preview_ajax_script');

/**
 * 管理画面のカスタムフィールドの値をajax経由で受け取る関数
 *
 */
function vanilla_handle_acf_changes_in_admin() {
	check_ajax_referer('my-preview-nonce', 'nonce');

	$acf_data = isset($_POST['acf_data']) ? ($_POST['acf_data']) : 0;
	$post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;

	//== 編集権限を持つユーザーかつ、$acf_dataと$post_idが送信されている時 ====
	if (current_user_can('edit_posts') && $acf_data && $post_id) {
		$preview = (wp_get_post_autosave($post_id)) ? wp_get_post_autosave($post_id) : wp_get_post_revision($post_id);

		foreach ($acf_data as $meta_key => $meta_value) {
			$meta_value = (is_array($meta_value)) ? maybe_serialize($meta_value) : $meta_value;
			vanilla_update_post_meta_by_wpdb($preview->ID, $meta_key, $meta_value);
		}

		wp_send_json_success('Meta data saved for post ID ' . $post_id);
	} else {
		wp_send_json_error('ajax handling acf value failed.');
	}
}
add_action('wp_ajax_vanilla_handle_acf_changes_in_admin', 'vanilla_handle_acf_changes_in_admin');


/**
 * WordPressに標準実装されているupdate_post_meta()を$wpdbを使用してsqlで直接データを挿入するための関数
 * プレビューの段階ではupdate_post_meta()は使用できないためsqlで直接入れるようにしています
 *
 * @param int $post_id 投稿のID
 * @param string $meta_key メタキー
 * @param string $meta_value メタバリュー
 */
function vanilla_update_post_meta_by_wpdb($post_id, $meta_key, $meta_value) {
	global $wpdb;

	//== メタデータが既に存在するかどうかを確認 ====
	$meta_exists = $wpdb->get_var($wpdb->prepare(
		"SELECT COUNT(*) FROM $wpdb->postmeta WHERE post_id = %d AND meta_key = %s",
		$post_id,
		$meta_key
	));

	//== メタデータが存在する場合、値を更新 ====
	if ($meta_exists) {
		$wpdb->update(
			$wpdb->postmeta,
			array('meta_value' => $meta_value), // 新しいメタバリュー
			array('post_id' => $post_id, 'meta_key' => $meta_key) // WHERE条件
		);
	}
	//== メタデータが存在しない場合、新しく挿入 ====
	else {
		$wpdb->insert(
			$wpdb->postmeta,
			array(
				'post_id' => $post_id,
				'meta_key' => $meta_key,
				'meta_value' => $meta_value
			)
		);
	}
}


/**
 * キーワードをハイライトする関数
 *
 * @param string $text 元のテキスト
 * @param string $keyword 検索キーワード
 * @return string $highlighted_string ハイライトされた文字列
 */
function highlight_keyword($text, $keyword) {
	if (empty($keyword)) return esc_html($text);

	// 半角スペースまたは全角スペースでキーワードを分割
	$keywords = preg_split('/[ 　]+/u', $keyword);

	$highlighted_string = $text; // 初期値として$textを設定

	foreach ($keywords as $word) {
			if (!empty($word)) { // 空の文字列を無視
					$escaped_word = esc_html($word);
					$highlighted_string = str_replace($escaped_word, '<span class="-highlight">' . $escaped_word . '</span>', $highlighted_string);
			}
	}

	return $highlighted_string;
}



/**
 * 指定されたキーワードに基づいてWordPressの投稿を検索し、
 * キーワードの出現回数と優先度に基づいてソートされた投稿IDの配列を返します。
 *
 * @param string $keyword 検索キーワード。半角スペースまたは全角スペースで区切られた複数のキーワードに対応。
 * @return array ソートされた投稿IDの配列。キーワードにマッチする投稿がない場合は空の配列を返します。
 *
 * この関数は、以下の基準で投稿をソートします：
 * 1. タイトルとコンテンツの両方にキーワードが含まれる投稿（優先度1）
 * 2. タイトルのみにキーワードが含まれる投稿（優先度2）
 * 3. コンテンツのみにキーワードが含まれる投稿（優先度3）
 * キーワードが含まれない投稿はリストに含まれません。
 *
 * 優先度が同じ場合、キーワードの出現回数の合計に基づいて降順でソートされます。
 *
 * 使用例:
 * $keyword = 'ドラゴンボール';
 * $sorted_post_ids = vanilla_search_posts($keyword);
 * // $sorted_post_ids には、検索条件にマッチした投稿のIDが優先度と出現回数に基づいてソートされて格納されます。
 */
function vanilla_search_posts($keyword) {
	$initial_args = array(
		'post_type' => 'post',
		'order' => 'DESC',
		'posts_per_page' => -1,
		'orderby' => 'post_date',
		'status' => 'publish',
	);

	$initial_query = new WP_Query($initial_args);
	$posts = $initial_query->posts;
	$sorted_posts = [];

	if ($posts) {

		$keyword = trim($keyword); // 入力をトリムして前後の空白を除去

		if (preg_match('/[ 　]/u', $keyword)) {
			// 半角スペースまたは全角スペースが含まれている場合、UTF-8 エンコーディングを明示
			$keywords = preg_split('/[ 　]+/u', $keyword);
		} else {
			// スペースが含まれていない場合、キーワードをそのまま配列に格納
			$keywords = [$keyword];
		}

		// 空の要素を除外
		$keywords = array_filter($keywords, function ($word) {
			return !empty($word);
		});

		// キーワードが空の場合は全ての投稿をそのまま返す
		if (empty($keywords)) {
			return array_map(function ($post) {
				return $post->ID;
			}, $posts);
		}

		foreach ($posts as $post) {
			$title_count = 0;
			$content_count = 0;
			foreach ($keywords as $word) {
				$title_count += substr_count(strtolower($post->post_title), strtolower($word));
				$content_count += substr_count(strtolower(wp_strip_all_tags($post->post_content)), strtolower($word));
			}

			// キーワードが少なくとも一つ含まれている場合のみ処理を続ける
			if ($title_count > 0 || $content_count > 0) {
				if (!array_key_exists($post->ID, $sorted_posts)) {
					$sorted_posts[$post->ID] = [
						'id' => $post->ID,
						'title_count' => $title_count,
						'content_count' => $content_count,
						'total_count' => $title_count + $content_count,
						'priority' => ($title_count > 0 && $content_count > 0) ? 1 : (($title_count > 0) ? 2 : (($content_count > 0) ? 3 : 4)),
					];
				} else {
					// 既に存在する場合はカウントを更新
					$sorted_posts[$post->ID]['title_count'] += $title_count;
					$sorted_posts[$post->ID]['content_count'] += $content_count;
					$sorted_posts[$post->ID]['total_count'] += ($title_count + $content_count);
				}
			}
		}

		// カスタムソートの配列へ変換
		$sorted_posts = array_values($sorted_posts);
		// カスタムソート
		usort($sorted_posts, function ($a, $b) {
			// 優先度でソート（昇順）
			if ($a['priority'] === $b['priority']) {
				// 優先度が同じ場合は出現回数でソート（降順）
				if ($a['total_count'] === $b['total_count']) {
					return 0;
				}
				return $b['total_count'] - $a['total_count'];
			}
			return $a['priority'] - $b['priority'];
		});

		$sorted_post_ids = array_column($sorted_posts, 'id');
	} else {
		$sorted_post_ids = [];
	}


	return $sorted_post_ids;
}

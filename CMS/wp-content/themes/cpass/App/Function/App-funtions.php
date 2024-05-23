<?php



function privacy_policiy_link() {
	$privacy_policiy_link = home_url('/privacypolicy/');
	return $privacy_policiy_link;
}
add_shortcode('privacy_policiy_link', 'privacy_policiy_link');

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
 * 指定したスラッグを持つ固定ページを下書きに更新します。
 *
 * @param string $slug 固定ページのスラッグ。
 */
function vanilla_draft_page_by_slug($slug) {
	// 指定したスラッグの投稿を取得
	$page = get_page_by_path($slug, OBJECT, 'page');

	if ($page) {
			// 投稿ステータスを'draft'に更新
			$page_update = array(
					'ID'           => $page->ID,
					'post_status'  => 'draft',
			);

			wp_update_post($page_update);
	}
}

/**
 * WordPressのinitアクションにフックして、スラッグが'reasons'の固定ページを下書きにします。
 * 5/31に消す
 */
add_action('init', function() {
	if (!is_local()) {
		vanilla_draft_page_by_slug('reasons');
		vanilla_draft_page_by_slug('knowhows');
		vanilla_draft_page_by_slug('recruit');
	}
});

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

<?php
date_default_timezone_set('Asia/Tokyo');

//*--------------------------------------------------
/* ファイルインクルード
/*------------------------------------------------*/
require_once(get_theme_file_path() . "/Build/Build.php");
require_once(get_theme_file_path() . "/App/App.php");



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
 */
add_action('init', function() {
	if (!is_local()) {
		vanilla_draft_page_by_slug('knowhows');
		vanilla_draft_page_by_slug('recruit');
		vanilla_draft_page_by_slug('search');
	}
});

function create_knowhow_category() {
	$category_slug = 'knowhow';
	$category_name = '転職ノウハウ';

	// Check if the term already exists
	if ( ! term_exists( $category_slug, 'category' ) ) {
			// Create the term
			wp_insert_term(
					$category_name,   // The term name
					'category',       // The taxonomy
					array(
							'slug' => $category_slug, // The term slug
					)
			);
	}
}

// Hook into WordPress init action to ensure the taxonomy is registered
add_action( 'init', 'create_knowhow_category' );

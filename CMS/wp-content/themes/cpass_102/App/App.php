<?php
/*--------------------------------------------------
/* /App内の全てのコアファイル
/*------------------------------------------------*/

//= 案件共有の変数 ====
require_once(get_theme_file_path() . "/App/Variables/App-variables.php");

//= 案件共有の関数 ====
require_once(get_theme_file_path() . "/App/Function/App-funtions.php");

//= 見出しやボタンなどモジュール ====
require_once(get_theme_file_path() . "/App/Modules/App-modules.php");

//= カスタム投稿挿入 ====
require_once(get_theme_file_path() . "/App/Insert-csv-post-types/App-insert-post-types.php");

//= タクソノミー投稿挿入 ====
require_once(get_theme_file_path() . "/App/Insert-csv-taxonomies/App-insert-taxonomies.php");

// //= ターム投稿挿入 ====
// require_once(get_theme_file_path() . "/App/Insert-csv-terms/App-insert-terms.php");

//= wpの設定（主に管理画面） ====
require_once(get_theme_file_path() . "/App/Wordpress/App-wordpress.php");

//= カスタムフィールドの登録 ====
require_once(get_theme_file_path() . "/App/Insert-acf/App-insert-acf.php");

//= mw wp form ====
require_once(get_theme_file_path() . "/App/Mw-wp-form-customize/p0-app-mw-customize.php");

//== search keywords ====
require_once(get_theme_file_path() . "/App/Search-Keywords/App-search-keywords.php");
//== カスタムブロック ====
require_once(get_theme_file_path() . "/App/App-custom-block/column-heading-h2/column-heading-h2.php");
require_once(get_theme_file_path() . "/App/App-custom-block/column-heading-h3/column-heading-h3.php");

//========================
//挿入系 (本番公開時にはコメントアウトする)
//========================
//= 固定ページの挿入 ====
// require_once(get_theme_file_path() . "/App/Insert-pages/App-insert-pages.php");

// ---------- 投稿・固定ページ作成 ----------
$post_type = "page";
$post_name = "search";
if (!vanilla_the_slug_exists($post_name)) {

	$post_title = "検索結果";
	$post_content = "";
	$post_array = array(
	"post_type" => $post_type,
	"post_name" => $post_name,
	"post_title" => $post_title,
	"post_content" => $post_content,
	"post_status" => "publish",
	"post_author" => 1,
	"post_parent" => 0,
	"comment_status" => "closed"
	);
	$inserted_page_id = wp_insert_post( $post_array );
}

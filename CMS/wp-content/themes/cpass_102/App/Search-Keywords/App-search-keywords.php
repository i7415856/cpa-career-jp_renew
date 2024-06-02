<?php

/**
 * search_keywordsとng_wordsのテーブルを削除する関数
 *
 * @param
 * @return
 */
function vanilla_drop_table() {
	global $wpdb;

	// テーブル名をプレフィックスを使って指定
	$table_search_keywords = $wpdb->prefix . 'search_keywords';
	$table_ng_words = $wpdb->prefix . 'ng_words';

	// SQL文でテーブルを削除
	$wpdb->query("DROP TABLE IF EXISTS $table_search_keywords");
	$wpdb->query("DROP TABLE IF EXISTS $table_ng_words");
}
// add_action('init', 'vanilla_drop_table');

/**
 * テーブルを作成する関数
 *
 * @param string $table_name テーブル名
 * @return
 */
function vanilla_create_table(string $table_name) {
	global $wpdb;
	$table_name = $wpdb->prefix . $table_name;

	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		word varchar(255) NOT NULL,
		frequency mediumint(9) DEFAULT 1 NOT NULL,
		PRIMARY KEY  (id)
) $charset_collate;";

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
}


/**
 * search_keywordsテーブルを作成する関数
 */
function vanilla_create_search_keywords_table() {
	vanilla_create_table('search_keywords');
}
add_action('init', 'vanilla_create_search_keywords_table');

/**
 * ng_wordsテーブルを作成する関数
 */
function vanilla_create_ng_words_table() {
	vanilla_create_table('ng_words');
}
add_action('init', 'vanilla_create_ng_words_table');

/**
 * 検索キーワードを保存する関数。
 *
 * POSTリクエストから`keyword`を受け取り、そのキーワードがNGワードでない場合に保存処理を行います。
 * キーワードがNGワードリストに含まれていない場合、データベースにキーワードを追加または更新します。
 * すでにデータベースに存在するキーワードの場合は、その頻度をインクリメントします。
 * キーワードがNGワードリストに含まれている場合は、エラーメッセージを返します。
 *
 * @global wpdb $wpdb WordPressデータベースクラスのインスタンス。
 * @return void JSON形式で結果を返します。成功時には成功メッセージ、NGワードの場合はエラーメッセージを返します。
 * @throws Exception 不正なリクエストやデータベースエラー時に例外が発生する可能性があります。
 */

function vanilla_save_search_keyword() {
	global $wpdb;
	$keyword = sanitize_text_field($_POST['keyword']);
	if (!$keyword) {
		return false;
	}
	$ng_table = $wpdb->prefix . 'ng_words';
	$keyword_table = $wpdb->prefix . 'search_keywords';

	// NGワードテーブルでキーワードをチェック
	$is_ng_word = $wpdb->get_var($wpdb->prepare(
		"SELECT COUNT(*) FROM $ng_table WHERE word = %s",
		$keyword
	));

	if ($is_ng_word == 0) {
		// キーワードが既に存在するか確認
		$existing_keyword = $wpdb->get_row($wpdb->prepare(
			"SELECT id, frequency FROM $keyword_table WHERE word = %s",
			$keyword
		));

		if (null !== $existing_keyword) {
			// 既存のキーワードの frequency をインクリメント
			$wpdb->update(
				$keyword_table,
				array('frequency' => $existing_keyword->frequency + 1),
				array('id' => $existing_keyword->id),
				array('%d'),
				array('%d')
			);
		} else {
			// 新しいキーワードを追加
			$wpdb->insert(
				$keyword_table,
				array('word' => $keyword, 'frequency' => 1),
				array('%s', '%d')
			);
		}
		wp_send_json_success(array('message' => 'Keyword saved successfully.'));
	} else {
		wp_send_json_error(array('message' => 'Keyword is a blocked word.'));
	}
}
add_action('wp_ajax_vanilla_save_search_keyword', 'vanilla_save_search_keyword');
add_action('wp_ajax_nopriv_vanilla_save_search_keyword', 'vanilla_save_search_keyword');

/**
 * WordPressの管理画面に新しいメニューページを追加します。
 *
 * この関数は「検索キーワード管理」という新しいメニューページをWordPressの管理画面に追加します。
 * メニュータイトルは改行を含む形式で表示され、「検索キーワード管理」となります。
 * ページの表示には「manage_options」という権限が必要です。
 * メニューページの内容は 'vanilla_keyword_management_page' 関数によって提供されます。
 *
 * @global wpdb $wpdb WordPressデータベースクラスのインスタンス（ここでは直接使用されませんが、追加されるページ内で利用される可能性があります）。
 * @return void この関数はメニューページを追加するためのもので、直接的な戻り値はありません。
 */

function vanilla_add_admin_page() {
	add_menu_page(
		'検索キーワード管理', // Page title
		'検索キーワード<br>管理', // Menu title
		'manage_options',     // Capability
		'vanilla_keyword_management', // Menu slug
		'vanilla_keyword_management_page' // Function to display the page
	);
}
add_action('admin_menu', 'vanilla_add_admin_page');

/**
 * 検索キーワード管理ページを表示する関数。
 *
 * WordPressの管理画面に「検索キーワード管理」というセクションを追加し、登録されている検索キーワードの一覧と、
 * それぞれのキーワードが検索された回数を表示します。また、ページネーションをサポートし、指定した数のキーワードだけを一ページに表示します。
 * ユーザーはキーワードを選択して削除することができます。このページはカスタム管理ページとして機能し、
 * 管理者は検索キーワードを効率的に管理できるようになります。
 *
 * @global wpdb $wpdb WordPressデータベースクラスのインスタンス。
 * @return void この関数はHTMLを直接出力し、戻り値はありません。
 */
function vanilla_keyword_management_page() {
	global $wpdb;
	$keyword_table = $wpdb->prefix . 'search_keywords';

	// ページネーション用の変数
	$per_page = 20; // 1ページあたりのアイテム数
	$page = isset($_GET['paged']) ? max(0, intval($_GET['paged']) - 1) : 0;
	$offset = $page * $per_page;

	// キーワードリストを取得
	$total_query = "SELECT COUNT(1) FROM {$keyword_table}";
	$total = $wpdb->get_var($total_query);
	$num_pages = ceil($total / $per_page);

	$query = $wpdb->prepare(
		"SELECT * FROM $keyword_table ORDER BY word ASC LIMIT %d OFFSET %d;",
		$per_page,
		$offset
	);
	$keywords = $wpdb->get_results($query);

	// ページネーション用のURLを生成
	$current_url = menu_page_url('vanilla_keyword_management', false);
?>
	<style>
		.keywordCheckbox {
			pointer-events: none;
		}

		.keyword-row:hover {
			background-color: #F0F0F0;
		}

		.highlighted {
			background-color: #dddddd !important;
		}

		/* ページネーションのスタイル調整 */
		.tablenav .tablenav-pages {
			float: left;
			/* 左寄せにする */
			color: #555;
			/* テキスト色を少し暗めに設定 */

		}

		.pagination-links a,
		.pagination-links span {
			text-decoration: none;
			padding: 2px 5px;
			/* パディングを適用 */
		}
	</style>

	<div class="wrap">
		<h2>検索キーワード管理</h2>
		<form method="post" action="">
			<?php wp_nonce_field('vanilla_update_keywords', 'vanilla_keywords_nonce'); ?>
			<table class="widefat fixed" cellspacing="0" id="keywordTable">
				<thead>
					<tr>
						<th style="width:30px">編集</th>
						<th>検索されたキーワード</th>
						<th>検索回数</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($keywords as $keyword) : ?>
						<tr class="keyword-row">
							<td style="text-align:center"><input type="checkbox" class="keywordCheckbox" name="keywords[]" value="<?php echo esc_attr($keyword->id); ?>"></td>
							<td><?php echo esc_html($keyword->word); ?></td>
							<td><?php echo esc_html($keyword->frequency); ?>回</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

			<?php if ($num_pages > 1) : ?>
				<div class="tablenav">
					<div class="tablenav-pages">
						<span class="pagination-links">
							<?php if ($page > 0) : ?>
								<a class="first-page" href="<?php echo esc_url($current_url . '&paged=1'); ?>">&laquo;</a>
								<a class="prev-page" href="<?php echo esc_url($current_url . '&paged=' . $page); ?>">&lsaquo;</a>
							<?php endif; ?>
							<span class="paging-input">
								<span class="current-page"><?php echo $page + 1; ?></span> of
								<span class="total-pages"><?php echo $num_pages; ?></span>
							</span>
							<?php if ($page + 1 < $num_pages) : ?>
								<a class="next-page" href="<?php echo esc_url($current_url . '&paged=' . ($page + 2)); ?>">&rsaquo;</a>
								<a class="last-page" href="<?php echo esc_url($current_url . '&paged=' . $num_pages); ?>">&raquo;</a>
							<?php endif; ?>
						</span>
					</div>
				</div>
			<?php endif; ?>

			<input type="submit" value="キーワードを削除する" class="button button-primary" name="submit_keywords">
		</form>
	</div>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const rows = document.querySelectorAll('#keywordTable .keyword-row');
			rows.forEach(row => {
				row.addEventListener('click', function(event) {
					// チェックボックス以外のエリアがクリックされた場合のみトグルする
					if (event.target.type !== 'checkbox') {
						const checkbox = this.querySelector('input[type="checkbox"]');
						checkbox.checked = !checkbox.checked;
						toggleHighlight(this, checkbox.checked);
					}
				});
			});

			function toggleHighlight(row, checked) {
				if (checked) {
					row.classList.add('highlighted');
				} else {
					row.classList.remove('highlighted');
				}
			}
		});
	</script>
<?php
}

/**
 * キーワードの削除とNGワードへの追加処理を行う関数。
 *
 * この関数は、管理画面から送信されたキーワードを削除し、それらをNGワードリストに追加します。
 * フォームから送信されたキーワードのIDを受け取り、それぞれのキーワードを`search_keywords`テーブルから削除し、
 * `ng_words`テーブルに追加します。この処理は、適切な権限を持つユーザーからのリクエストにのみ応答します。
 * WordPressのnonce機能を用いてリクエストの検証を行うことで、セキュリティを保持しています。
 *
 * @global wpdb $wpdb WordPressデータベースクラスのインスタンス。
 * @return void この関数はデータベースの更新操作を行い、戻り値はありません。
 */

function vanilla_process_keyword_submission() {
	if (isset($_POST['submit_keywords'], $_POST['vanilla_keywords_nonce']) && wp_verify_nonce($_POST['vanilla_keywords_nonce'], 'vanilla_update_keywords')) {
		global $wpdb;
		$keyword_table = $wpdb->prefix . 'search_keywords';
		$ng_table = $wpdb->prefix . 'ng_words';

		$keyword_ids = $_POST['keywords'];
		if (!empty($keyword_ids)) {
			foreach ($keyword_ids as $id) {
				$id = intval($id);  // Ensure $id is an integer
				$word = $wpdb->get_var($wpdb->prepare("SELECT word FROM $keyword_table WHERE id = %d", $id));

				// Insert into ng_words
				$wpdb->insert($ng_table, ['word' => $word], ['%s']);

				// Delete from search_keywords
				$wpdb->delete($keyword_table, ['id' => $id], ['%d']);
			}
		}
	}
}
add_action('admin_init', 'vanilla_process_keyword_submission');

/**
 * データベースから頻度が最も高いトップ10の検索キーワードを取得する関数。
 *
 * この関数は、`search_keywords` テーブルからキーワードの出現頻度に基づき、
 * 最も多く検索されたトップ10のキーワードを取得します。各キーワードは頻度と共に配列形式で返されます。
 * 配列の各要素はキーワードを示す 'word' とそのキーワードの検索回数を示す 'frequency' のキーを持ちます。
 *
 * @global wpdb $wpdb WordPressデータベースクラスのインスタンス。
 * @return array 検索頻度が高いトップ10のキーワードとその頻度を含む連想配列。
 */

function vanilla_fetch_popular_keywords() {
	global $wpdb;
	$table_name = $wpdb->prefix . 'search_keywords';

	// データベースからfrequencyが高いトップ10のキーワードを取得
	$popular_keywords = $wpdb->get_results("
			SELECT word, frequency
			FROM $table_name
			ORDER BY frequency DESC
			LIMIT 10
	", ARRAY_A);

	return $popular_keywords;
}

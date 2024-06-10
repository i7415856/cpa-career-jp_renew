<?php
//================================================
// 変数
//================================================
$domain = (str_replace("www.", "", $_SERVER['HTTP_HOST']));
$from_email = (is_local())  ? 's.kawakatsu@roseaupensant.jp' : '先方にメールアドレス';


//================================================
// 関数
//================================================
/**
 * お問合せフォームのmw formのIDを取得
 * (投稿がなければ生成)
 */
function contact_form_id($contact_form_name) {
	$form_id = get_page_by_path($contact_form_name, OBJECT, 'mw-wp-form')->ID;

	if (!$form_id) {
		$post_type = 'mw-wp-form';
		$post_title = $contact_form_name;
		// ---------- 投稿・固定ページ作成 ----------
		$post_array = array(
			"post_type"      => $post_type,
			"post_title"     => $post_title,
			"post_status"    => "publish",
			"post_author"    => 1,
			"post_parent"    => 0,
			"comment_status" => "closed"
		);
		$form_id =  wp_insert_post($post_array);
	}

	return $form_id;
}

function message_post_content() {
	$message = "■お問い合わせ内容 \n";
	$message .= "お名前 : {name} \n";
	$message .= "\n";
	$message .= "フリガナ : {kana} \n";
	$message .= "\n";
	$message .= "ご年齢 : {age} \n";
	$message .= "\n";
	$message .= "Email : {email} \n";
	$message .= "\n";
	$message .= "電話番号 : {tel} \n";
	$message .= "\n";
	$message .= "お問い合わせ内容 : {notes} \n";
	return $message;
}
/**
 * ユーザー宛のメッセージ
 *
 * @param
 * @return
 */
function message_to_user() {
	$message = "{name}様 \n";
	$message .= "\n";
	$message .= "\n";
	$message .= "下記内容でお問い合わせを受け付けました。\n";
	$message .= " \n";
	$message .= message_post_content();
	$message .= " \n";
	$message .= "内容を確認の上、一週間以内に返信させていただきます。 \n";
	return $message;
}

//=====================================================================
// 法人のお客様
//======================================================================
$form_content = file_get_contents(get_theme_file_path() . "/App/Mw-wp-form-customize/c-contact-form-content.php");
$form_id = get_page_by_path("お問い合わせ", OBJECT, 'mw-wp-form')->ID;
/**
 * 管理者宛のメッセージ
 *
 * @param
 * @return
 */
function message_to_admin() {
	$message = "下記内容でお問い合わせを承りました。 \n\r";
	$message .= message_post_content();
	$message .= "\n";
	$message .= "\n";
	$message .= '--------------------------------------';

	return $message;
}


$form_aettings = [
	//= ユーザー宛メール ====
	'mail_subject' => 'お問い合わせありがとうございます（CPASSキャリア）',
	'mail_from' => $from_email,
	'mail_sender' => 'CPASSキャリア',
	'mail_reply_to' => '',
	'mail_content' => message_to_user(), // message_to_user('get_form_inputs')
	'automatic_reply_email' => 'email',

	//= 管理者宛メール ====
	'mail_to' => 'cpass@cpa-net.jp',
	'mail_cc' => '',
	'mail_bcc' => '',
	'admin_mail_reply_to' => '',
	'admin_mail_subject' => '{name}様よりお問い合わせを承りました（CPASSキャリア）',
	'mail_return_path' => '',
	'admin_mail_from' => 'cpass@cpa-net.jp',
	'admin_mail_sender' => 'CPASSキャリア',
	'admin_mail_content' => message_to_admin(),
	'complete_message' => '',
	'validation_error_url' => '/contact/',
	'input_url' => '/contact/',
	'confirmation_url' => '/contact/',
	'complete_url' => '/thanks/',

	// //== 設定 ========
	// 'querystring' => 1,
	'usedb' => 0,
];

if (is_local()) {
	$form_aettings['mail_to'] = 's.kawakatsu@roseaupensant.jp';
}

// update_post_meta($form_id, 'mw-wp-form', $form_aettings);

/**
 * フォームのコンテンツを変更する
 *
 * @param
 * @return
 */
add_action('init', function () {
	global $form_id, $form_content;
	$post_id = wp_update_post([
		'ID' => $form_id,
		'post_content' => $form_content,
	]);
});


/**
 * my_validation_rule
 * @param object $Validation
 * @param array $data
 * @param MW_WP_Form_Data $Data
 * $Validation::set_ruleの引数は name属性値, バリデーション名, オプション
 */
function form_validation_rule($Validation, $data, $Data) {
	$Validation->set_rule('name', 'noEmpty');
	$Validation->set_rule('kana', 'noEmpty');
	$Validation->set_rule('age', 'noEmpty');
	$Validation->set_rule('email', 'noEmpty');
	$Validation->set_rule('email', 'mail', array( 'message' => '正しい形式でメールアドレスを入力してください。' ) );
	$Validation->set_rule('notes', 'noEmpty');

	return $Validation;
}
add_filter('mwform_validation_mw-wp-form-' . $form_id, 'form_validation_rule', 10, 3);

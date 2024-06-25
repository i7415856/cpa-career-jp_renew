<?php
//================================================
// 変数
//================================================
$domain = (str_replace("www.", "", $_SERVER['HTTP_HOST']));


//================================================
// 関数
//================================================
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
// お問い合わせ周り設定
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

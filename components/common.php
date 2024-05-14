<?php
$scheme = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ? 'https' : 'http';
$domain = $_SERVER['HTTP_HOST'];
$honban_domain = 'cpa-career.jp';
$staging_domain = 'dev-roseaupensant.jp';
$home = "{$scheme}://{$domain}";

/**
 * ローカル環境の条件分岐
 */
function is_local($whitelist = ['127.0.0.1', '::1']) {
	return in_array($_SERVER['REMOTE_ADDR'], $whitelist);
}

/**
 * ステージング環境の条件分岐
 */
function is_stg() {
	global $domain, $staging_domain;
	if ($domain === $staging_domain) {
		return true;
	} else {
		return false;
	}
}

/**
 * 本番境の条件分岐
 */
function is_honban() {
	global $domain, $honban_domain;
	if ($domain === $honban_domain) {
		return true;
	} else {
		return false;
	}
}

$home_url = (is_stg()) ?  "{$home}/cpa-cpass" :  $home;
$page_title_end = "CPASSキャリア（シーパスキャリア）";
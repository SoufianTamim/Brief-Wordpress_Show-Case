<?php 
/*
Plugin Name: WordPress Store+
Plugin URI: https://www.methemes.com/
Description: WordPress store+.
Author: Ken
Version: 1.0.1
Author URI: https://www.methemes.com/
Licence: GNU
*/

ini_set ('memory_limit', '256M');//128-256
$ssl = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
define('WPssl', $ssl);
function wb_wsplus_redirect($plugin) {
	$n = wp_create_nonce( 'wb_wsplus' );
	$url = admin_url( 'themes.php?page=wb_wsplust_'.$n, WPssl );
	exit( wp_redirect( $url ) );
}
function wb_wsplus_activate($plugin) {
add_action( 'activated_plugin', 'wb_wsplus_redirect' );
}
register_activation_hook( __FILE__, 'wb_wsplus_activate' );

require_once ('wb-wpstore-inc.php' );
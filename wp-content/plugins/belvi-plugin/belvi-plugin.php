<?php
/**
 * Plugin Name: Belvi Plugin
 * Description: A simple WordPress plugin with JavaScript, CSS, and a custom API endpoint.
 * Version: 1.0
 * Author: Filip Rudaković
 *  Author URI:  https://rudakovic.com/
 */

if (!defined('ABSPATH')) {
	exit;
}

function belvi_enqueue_assets() {
//	wp_enqueue_style('belvi-style', plugin_dir_url(__FILE__) . 'assets/belvi-style.css');

	wp_enqueue_script('belvi-script', plugin_dir_url(__FILE__) . 'assets/belvi-script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'belvi_enqueue_assets');

include_once plugin_dir_path(__FILE__) . 'inc/api.php';

function redirect_all_except_one_to_specific_page() {
	$allowed_post_id = 28;  // The only post/page allowed
	$redirect_to_id = 393;   // The page to redirect everything else to

	if (is_single() || is_page()) {
		$current_post_id = get_queried_object_id();
		if ($current_post_id != $allowed_post_id) {
			wp_redirect(get_permalink($redirect_to_id), 301); // 301 = Permanent Redirect
			exit;
		}
	}
}
add_action('template_redirect', 'redirect_all_except_one_to_specific_page');
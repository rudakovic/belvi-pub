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

// Enqueue Scripts and Styles
function belvi_enqueue_assets() {
	// CSS in head
	wp_enqueue_style('belvi-style', plugin_dir_url(__FILE__) . 'assets/belvi-style.css');

	// JS in footer
	wp_enqueue_script('belvi-script', plugin_dir_url(__FILE__) . 'assets/belvi-script.js', array('jquery'), null, true);

	$nonce = wp_create_nonce('belvi_nonce_action');

	// Pass nonce to JavaScript
	wp_localize_script('belvi-plugin-js', 'belviPlugin', array(
		'nonce' => $nonce,
		'api_url' => esc_url(rest_url('belvi/v1/get-beer/')),
	));
}
add_action('wp_enqueue_scripts', 'belvi_enqueue_assets');

// Include API file
include_once plugin_dir_path(__FILE__) . 'inc/api.php';
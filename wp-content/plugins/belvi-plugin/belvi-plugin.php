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
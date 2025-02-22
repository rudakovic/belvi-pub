<?php

if (!defined('ABSPATH')) {
	exit;
}

function belvi_register_api_routes() {
	register_rest_route('belvi/v1', '/get-beer/(?P<id>\d+)', array(
		'methods'  => 'GET',
		'callback' => 'belvi_get_custom_posts',
		'permission_callback' => '__return_true',
	));
}

add_action('rest_api_init', 'belvi_register_api_routes');

function belvi_get_custom_posts($request) {
	$post_id = $request->get_param('id');

	$args = [
		'post_type'      => 'beer',
		'posts_per_page' => 1,
	];

	if ($post_id) {
		$args['p'] = intval($post_id);
	}

	$query = new WP_Query($args);
	$posts = [];

	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			$brewery = get_field('brewery');

			$posts[] = [
				'id'        => get_the_ID(),
				'title'     => get_the_title(),
				'content'   => get_the_content(),
				'brewery'   => $brewery,
			];
		}
		wp_reset_postdata();
	}

	if (empty($posts)) {
		return new WP_Error('no_post', 'No post found', ['status' => 404]);
	}

	return rest_ensure_response($posts);
}
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
	$post_id = (int) $request['id'];

	$args = [
		'post_type'      => 'beer',
		'posts_per_page' => 1,
	];

	if ($post_id) {
		$args['p'] = intval($post_id);
	}

	$query = new WP_Query($args);
	$post = [];

	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			$brewery = get_field('brewery');
			$beer_style = get_field('beer_style');
			$brewery_icon = get_field('brewery_icon');
			$abv = get_field('abv');
			$ibu = get_field('ibu');
			$featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');

			$post = [
				'id'        => get_the_ID(),
				'title'     => get_the_title(),
				'content'   => get_the_content(),
				'image'     => $featured_image,
				'brewery'   => $brewery,
				'beer_style'   => $beer_style,
				'brewery_icon'   => $brewery_icon,
				'abv'   => $abv,
				'ibu'   => $ibu,
			];
		}
		wp_reset_postdata();
	}

	if (empty($post)) {
		return new WP_Error('no_post', 'No post found', ['status' => 404]);
	}

	return rest_ensure_response($post);
}
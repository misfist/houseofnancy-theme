<?php
/**
 * Theme set-up functions
 * 
 * @package WordPress
 * @subpackage HON
 * @since 1.0
 */

namespace HON;

/**
 * Adds theme support for post formats.
 *
 * @since 1.0
 *
 * @return void
 */
function post_format_setup() {
	add_theme_support(
		'post-formats',
		array(
			'audio',
			'chat',
			'gallery',
			'image',
			'link',
			'quote',
			'status',
			'video',
		)
	);
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\post_format_setup' );

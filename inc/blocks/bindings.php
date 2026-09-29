<?php
/**
 * Theme block bindings functions
 *
 * @package WordPress
 * @subpackage HON
 * @since 1.0
 */

namespace HON;

/**
 * Registers the post format block binding source.
 *
 * @since 1.0
 *
 * @return void
 */
function register_block_bindings(): void {
	register_block_bindings_source(
		'house-of-nancy/format',
		array(
			'label'              => _x( 'Post format name', 'Label for the block binding placeholder in the editor', 'hon' ),
			'get_value_callback' => 'format_binding',
		)
	);
}
add_action( 'init', __NAMESPACE__ . '\register_block_bindings' );

/**
 * Callback function for the post format name block binding source.
 *
 * @since 1.0
 *
 * @return string|void Post format name, or nothing if the format is 'standard'.
 */
function format_binding() {
	$post_format_slug = get_post_format();

	if ( $post_format_slug && 'standard' !== $post_format_slug ) {
		return get_post_format_string( $post_format_slug );
	}
}

<?php
/**
 * Theme block category functions
 *
 * @package WordPress
 * @subpackage HON
 * @since 1.0
 */

namespace HON;

/**
 * Registers pattern categories.
 *
 * @since 1.0
 *
 * @return void
 */
function pattern_categories(): void {

	register_block_pattern_category(
		'page',
		array(
			'label'       => __( 'Pages', 'hon' ),
			'description' => __( 'A collection of full page layouts.', 'hon' ),
		)
	);

	register_block_pattern_category(
		'post-format',
		array(
			'label'       => __( 'Post formats', 'hon' ),
			'description' => __( 'A collection of post format patterns.', 'hon' ),
		)
	);
}
add_action( 'init', __NAMESPACE__ . '\pattern_categories' );

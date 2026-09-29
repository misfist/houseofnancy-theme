<?php
/**
 * Theme block style functions
 *
 * @package WordPress
 * @subpackage HON
 * @since 1.0
 */

namespace HON;

/**
 * Registers custom block styles.
 *
 * @since 1.0
 *
 * @return void
 */
function block_styles(): void {
	register_block_style(
		'core/list',
		array(
			'name'         => 'checkmark-list',
			'label'        => __( 'Checkmark', 'hon' ),
			'inline_style' => '
			ul.is-style-checkmark-list {
				list-style-type: "\2713";
			}

			ul.is-style-checkmark-list li {
				padding-inline-start: 1ch;
			}',
		)
	);
}
add_action( 'init', __NAMESPACE__ . '\block_styles' );

<?php
/**
 * Theme enqueue functions
 *
 * @package WordPress
 * @subpackage HON
 * @since 1.0
 */

namespace HON;

/**
 * Enqueues editor-style.css in the editors.
 *
 * @since 1.0
 *
 * @return void
 */
function editor_style(): void {
	add_editor_style( 'build/editor.css' );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\editor_style' );

/**
 * Enqueues the theme stylesheet on the front.
 *
 * @since 1.0
 *
 * @return void
 */
function enqueue_assets(): void {
	$dir = get_template_directory();
	$uri = get_template_directory_uri();

	$asset = include $dir . '/build/index.asset.php';
	// $interactivity_asset        = include $dir . '/build/interactivity.asset.php';
	$interactivity_dependencies = array(
		array(
			'id'     => '@wordpress/interactivity',
			'import' => 'static',
		),
	);

	wp_enqueue_style(
		'house-of-nancy-style',
		$uri . '/build/index.css',
		array(),
		$asset['version']
	);

	wp_style_add_data(
		'house-of-nancy-style',
		'path',
		get_parent_theme_file_path( $src )
	);

	wp_enqueue_script(
		'house-of-nancy-scripts',
		$uri . '/build/index.js',
		$asset['dependencies'],
		$asset['version'],
		true
	);

	wp_enqueue_script_module(
		'house-of-nancy-interactivity',
		$uri . '/build/interactivity.js',
		$interactivity_dependencies,
		$asset['version'],
	);
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );

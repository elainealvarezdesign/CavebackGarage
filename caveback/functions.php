<?php
/**
 * Caveback child theme (Home Services Blocks).
 *
 * The parent theme enqueues get_stylesheet_uri(), which in a child theme is
 * this theme's style.css, so styles load without an extra enqueue here.
 *
 * @package caveback
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CAVEBACK_VERSION', '0.2.0' );

/**
 * Fonts (Inter, Instrument Serif) and the front-end script.
 */
function caveback_assets() {
	wp_enqueue_style(
		'caveback-inter',
		'https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400..900&family=Instrument+Serif:ital@0;1&display=swap',
		array(),
		null
	);
	wp_enqueue_script(
		'caveback',
		get_stylesheet_directory_uri() . '/assets/js/caveback.js',
		array(),
		CAVEBACK_VERSION,
		array( 'in_footer' => true, 'strategy' => 'defer' )
	);
}
add_action( 'wp_enqueue_scripts', 'caveback_assets', 20 );

/**
 * The parent's animation and icon-font assets are not used by this design.
 */
function caveback_dequeue_parent_extras() {
	wp_dequeue_style( 'animate-css' );
	wp_dequeue_style( 'fontawesome' );
	wp_dequeue_script( 'wow-js' );
}
add_action( 'wp_enqueue_scripts', 'caveback_dequeue_parent_extras', 30 );

/**
 * Match the editor to the front end.
 */
function caveback_setup() {
	add_editor_style( array( 'style.css' ) );
	// The parent redirects to its dashboard page on activation; skip that.
	remove_action( 'after_switch_theme', 'home_services_blocks_redirect_after_activation' );
}
add_action( 'after_setup_theme', 'caveback_setup', 20 );

/**
 * Pattern category for the one-page sections.
 */
function caveback_pattern_category() {
	register_block_pattern_category( 'caveback', array( 'label' => __( 'Caveback', 'caveback' ) ) );
}
add_action( 'init', 'caveback_pattern_category' );

/**
 * URL of a file in assets/images.
 *
 * @param string $file File name.
 * @return string
 */
function caveback_img( $file ) {
	return esc_url( get_stylesheet_directory_uri() . '/assets/images/' . $file );
}

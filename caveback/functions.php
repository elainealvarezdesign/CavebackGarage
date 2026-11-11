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

define( 'CAVEBACK_VERSION', '0.1.0' );

/**
 * Fonts and the small front-end script (sliders, before/after, forms).
 */
function caveback_assets() {
	wp_enqueue_style(
		'caveback-inter',
		'https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400..900&display=swap',
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

/**
 * Inline stroke icon. Decorative: hidden from assistive technology.
 *
 * @param string $name  Icon name.
 * @param string $class Extra class.
 * @return string
 */
function caveback_icon( $name, $class = '' ) {
	$paths = array(
		'arrow-right' => '<path d="M5 12h14M13 6l6 6-6 6"/>',
		'arrow-left'  => '<path d="M19 12H5M11 18l-6-6 6-6"/>',
		'phone'       => '<path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"/>',
		'video'       => '<path d="M23 7l-7 5 7 5V7z"/><rect x="1" y="5" width="15" height="14" rx="2"/>',
		'play'        => '<path d="M8 5v14l11-7z"/>',
		'users'       => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.9M16 3.1a4 4 0 0 1 0 7.8"/>',
		'box'         => '<path d="M21 16V8a2 2 0 0 0-1-1.7l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.7l7 4a2 2 0 0 0 2 0l7-4a2 2 0 0 0 1-1.7z"/><path d="M3.3 7L12 12l8.7-5M12 22V12"/>',
		'shield'      => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/>',
		'trash'       => '<path d="M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m3 0v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M10 11v6M14 11v6"/>',
		'layers'      => '<path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5M2 12l10 5 10-5"/>',
		'tote'        => '<rect x="3" y="8" width="18" height="13" rx="1"/><path d="M1 4h22v4H1zM10 12h4"/>',
		'wall'        => '<rect x="3" y="3" width="18" height="18" rx="1"/><path d="M3 9h18M3 15h18M9 9v6M15 9v6"/>',
		'floor'       => '<path d="M2 20h20M4 20l3-8h10l3 8"/><path d="M9 12l-1 8M15 12l1 8M5.5 16h13"/>',
		'clipboard'   => '<rect x="8" y="2" width="8" height="4" rx="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M9 14l2 2 4-4"/>',
		'truck'       => '<rect x="1" y="3" width="15" height="13"/><path d="M16 8h4l3 3v5h-7V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/>',
		'grid'        => '<rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>',
		'check'       => '<path d="M20 6L9 17l-5-5"/>',
		'swap'        => '<path d="M9 6l-6 6 6 6M15 6l6 6-6 6"/>',
		'download'    => '<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M7 10l5 5 5-5M12 15V3"/>',
		'upload'      => '<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M17 8l-5-5-5 5M12 3v12"/>',
		'home'        => '<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><path d="M9 22V12h6v10"/>',
		'heart'       => '<path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1-1.1a5.5 5.5 0 0 0-7.8 7.8l1 1.1L12 21.2l7.8-7.8 1-1.1a5.5 5.5 0 0 0 0-7.7z"/>',
		'refresh'     => '<path d="M23 4v6h-6M1 20v-6h6"/><path d="M3.5 9a9 9 0 0 1 14.8-3.4L23 10M1 14l4.6 4.4A9 9 0 0 0 20.5 15"/>',
		'message'     => '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>',
		'mail'        => '<rect x="2" y="4" width="20" height="16" rx="2"/><path d="M22 6l-10 7L2 6"/>',
		'pin'         => '<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>',
		'instagram'   => '<rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r=".5"/>',
		'facebook'    => '<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>',
	);
	if ( ! isset( $paths[ $name ] ) ) {
		return '';
	}
	return '<svg class="cb-icon ' . esc_attr( $class ) . '" viewBox="0 0 24 24" aria-hidden="true" focusable="false">' . $paths[ $name ] . '</svg>';
}

<?php
/**
 * Robin 2026 theme setup.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function robin2026_setup() {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Navigation', 'robin-2026' ),
			'footer'  => __( 'Footer Family Links', 'robin-2026' ),
		)
	);
}
add_action( 'after_setup_theme', 'robin2026_setup' );

function robin2026_register_block_patterns() {
	$patterns = array(
		'robin2026/header'            => __DIR__ . '/patterns/header.php',
		'robin2026/hero'              => __DIR__ . '/patterns/hero.php',
		'robin2026/model-strip'       => __DIR__ . '/patterns/model-strip.php',
		'robin2026/artist-spotlight'  => __DIR__ . '/patterns/artist-spotlight.php',
		'robin2026/cross-promo-rg'    => __DIR__ . '/patterns/cross-promo-riogrande.php',
		'robin2026/cross-promo-sb'    => __DIR__ . '/patterns/cross-promo-steamboat.php',
		'robin2026/instagram-strip'   => __DIR__ . '/patterns/instagram-strip.php',
		'robin2026/newsletter'        => __DIR__ . '/patterns/newsletter.php',
	);

	foreach ( $patterns as $name => $file ) {
		if ( file_exists( $file ) ) {
			register_block_pattern( $name, robin2026_load_pattern( $file ) );
		}
	}
}
add_action( 'init', 'robin2026_register_block_patterns' );

/**
 * Pattern files return an array with 'title', 'categories', and 'content'.
 */
function robin2026_load_pattern( $file ) {
	return include $file;
}

/**
 * theme.json ships the self-hosted @font-face declarations; nothing extra
 * to enqueue here. Editor styles pick up the same fonts automatically.
 */
function robin2026_enqueue_assets() {
	wp_enqueue_style(
		'robin2026-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'robin2026_enqueue_assets' );

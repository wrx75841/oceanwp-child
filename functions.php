<?php
/**
 * Fanclub Jadzi - functions.php (child theme OceanWP)
 */

function fanclub_jadzi_enqueue_styles() {
    $parent = wp_get_theme( 'OceanWP' );

    wp_enqueue_style( 'oceanwp-style', get_template_directory_uri() . '/style.css', array(), $parent->get( 'Version' ) );
    wp_enqueue_style( 'fanclub-jadzi-child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'fanclub_jadzi_enqueue_styles' );

function fanclub_jadzi_enqueue_script() {
    wp_enqueue_script(
        'fanclub-jadzi-script',
        get_stylesheet_directory_uri() . '/script.js',
        array(),
        wp_get_theme()->get( 'Version' ),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'fanclub_jadzi_enqueue_script' );

function fanclub_jadzi_theme_support() {
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'fanclub_jadzi_theme_support' );

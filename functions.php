<?php
/**
 * Hello Elementor Child functions and definitions
 */

function hello_elementor_child_enqueue_styles() {
    // Enqueue parent styles
    wp_enqueue_style( 'hello-elementor-parent-style', get_template_directory_uri() . '/style.css' );
    
    // Enqueue child styles
    wp_enqueue_style( 'hello-elementor-child-style', get_stylesheet_directory_uri() . '/style.css', array('hello-elementor-parent-style'), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_styles' );

/**
 * Register Global Colors for Elementor and WordPress
 */
function tys_register_colors() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name'  => __( 'TYS Teal', 'tys' ),
            'slug'  => 'tys-teal',
            'color' => '#5EB5C0',
        ),
        array(
            'name'  => __( 'TYS Light Blue', 'tys' ),
            'slug'  => 'tys-light-blue',
            'color' => '#F0F8FA',
        ),
        array(
            'name'  => __( 'TYS Yellow', 'tys' ),
            'slug'  => 'tys-yellow',
            'color' => '#FFF9E6',
        ),
    ) );
}
add_action( 'after_setup_theme', 'tys_register_colors' );

/**
 * Custom Shortcode for the "At a Glance" Stats
 * Usage: [tys_stats number="1,954" title="Students"]
 */
function tys_stats_shortcode( $atts ) {
    $a = shortcode_atts( array(
        'number' => '0',
        'title'  => 'Label',
    ), $atts );

    return '<div class="tys-counter">
                <div class="elementor-counter-number-wrapper">' . esc_html($a['number']) . '</div>
                <div class="elementor-counter-title">' . esc_html($a['title']) . '</div>
            </div>';
}
add_shortcode( 'tys_stats', 'tys_stats_shortcode' );

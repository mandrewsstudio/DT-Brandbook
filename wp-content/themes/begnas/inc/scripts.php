<?php
/**
 * Load CSS and JavaScripts.
 *
 * @package begnas
 * @since 1.0
 */

namespace Begnas;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function enqueue_front_scripts() {

    $suffix = get_script_suffix();

    $style_folder = $suffix ? 'minified' : 'unminified';

    wp_enqueue_style( BEGNAS_SLUG, get_template_directory_uri() . '/assets/css/' . $style_folder . '/style' . $suffix . '.css', array(), BEGNAS_VERSION );
}

add_action( 'wp_enqueue_scripts', BEGNAS_NS . 'enqueue_front_scripts' );

function is_script_debug() {

    return ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG );
}

function get_script_suffix() {

    return is_script_debug() ? '' : '.min';
}

/**
 * Register pattern categories.
 */
 if ( ! function_exists( 'register_pattern_categories' ) ) :
	/**
	 * Register pattern categories
	 *
	 * @since Begnas 1.0.2
	 * @return void
	 */
    function register_pattern_categories() {

        register_block_pattern_category(
            'begnas-landing-page',
            array(
                'label' => esc_html__( 'Landing Pages', 'begnas' )
            )
        );
    }
endif;

add_action( 'init', BEGNAS_NS . 'register_pattern_categories' );


/** ======================================== Admin Scripts ======================================== **/

if ( ! function_exists( 'enqueue_admin_scripts' ) ) :
	/**
	 * Load admin scripts
	 *
	 * @since Begnas 1.0.3
	 * @return void
	 */
    function enqueue_admin_scripts() {

        wp_enqueue_style( BEGNAS_SLUG, get_template_directory_uri() . '/assets/admin/css/notice.css', array(), BEGNAS_VERSION );
    }
endif;

add_action( 'admin_enqueue_scripts', BEGNAS_NS . 'enqueue_admin_scripts' );

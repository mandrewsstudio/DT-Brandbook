<?php
/**
 * After theme setup.
 *
 * @package begnas
 * @since 1.0
 */

namespace Begnas;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function after_setup() {

    remove_theme_support( 'core-block-patterns' );

    /*
    * Make theme translation ready.
    */
    load_theme_textdomain( 'begnas', get_template_directory() . '/languages' );
}

add_action( 'after_setup_theme', BEGNAS_NS . 'after_setup' );

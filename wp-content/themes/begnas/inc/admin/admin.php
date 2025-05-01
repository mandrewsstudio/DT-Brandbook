<?php
/**
 * Admin notices.
 *
 * @package begnas
 * @since Begnas 1.0.3
 */

namespace Begnas;

// Exit if accessed directly.
defined('ABSPATH') || exit;

/**
 * Show welcome notice on theme activation
 * 
 * @package begnas
 * @since Begnas 1.0.3
 */
function welcome_notice() {

    $is_dismiss_button_clicked = get_option( 'begnas_admin_notice_welcome' );

    // Return, if dismiss icon clicked.
    if ( $is_dismiss_button_clicked ) {

        return;
    }

    $dismiss_url = wp_nonce_url(

        remove_query_arg( array( 'activated' ), add_query_arg( 'begnas-hide-notice', 'welcome' ) ),
        'begnas_hide_notices_nonce',
        '_begnas_notice_nonce'
    );

    $args = array(
        'type'               => 'info',
        'dismissible'        => true,
        'paragraph_wrap'     => false,
        'additional_classes' => array( 'begnas-welcome-notice' ),
    );

    $message = '
    <div class="begnas-welcome-notice__content">
        <div class="begnas-welcome-notice__text">
            <h2>' . esc_html__( 'Thanks for installing Begnas theme', 'begnas' ) . ' </h2>
            <p>' . esc_html__( 'Welcome to Begnas Theme! To ensure a smooth onboarding experience, we\'ve compiled some helpful resources for you', 'begnas' ) . ' </p>
        </div>

        <div class="begnas-welcome-notice__buttons">
            <a class="button button-primary" target="_blank" href="' . esc_url( 'https://artifyweb.com/docs/begnas-theme-knowledge-base/' ) . '">' . esc_html__( 'Read Documentation', 'begnas' ) . '</a>
            <a class="button" target="_blank" href="' . esc_url( 'https://artifyweb.com/blog/' ) . '">' . esc_html__( 'Read Blog', 'begnas' ) . '</a>
            <a class="button" target="_blank" href="' . esc_url( 'https://artifyweb.com/contact-us/' ) . '">' . esc_html__( 'Contact Support', 'begnas' ) . '</a>
        </div>
    </div>

    <a class="begnas-message-close notice-dismiss" href="' . esc_url( $dismiss_url ) . '"></a>
    ';

    wp_admin_notice( $message, $args );
}

add_action('admin_notices', BEGNAS_NS . 'welcome_notice');


/**
 * Dismiss welcome notice
 * 
 * Save nag value in database when user clicks on dismiss button.
 * To check later the value while outputting the notice markup.
 * 
 * @package begnas
 * @since Begnas 1.0.3
 */
function update_dismiss_notice_option() {

    if ( isset( $_GET['begnas-hide-notice'] ) && isset( $_GET['_begnas_notice_nonce'] ) ) {

        // Check the nonce.
        if ( ! wp_verify_nonce( wp_unslash( $_GET['_begnas_notice_nonce'] ), 'begnas_hide_notices_nonce' ) ) {

            wp_die( __( 'Action failed. Please refresh the page and retry.', 'begnas' ) );
        }

        if ( ! current_user_can( 'manage_options' ) ) {
            
            wp_die( __( 'Cheatin&#8217; huh?', 'begnas' ) );
        }

        $hide_notice = sanitize_text_field( wp_unslash( $_GET['begnas-hide-notice'] ) );

        // Save the nag value
        if ( 'welcome' === $hide_notice ) {

            update_option( 'begnas_admin_notice_' . $hide_notice, 1 );
        }
    }
}

add_action( 'wp_loaded',  BEGNAS_NS . 'update_dismiss_notice_option', 15 );

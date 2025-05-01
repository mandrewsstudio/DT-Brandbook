<?php
/**
 * Title: Template 404 Page
 * Slug: begnas/template-404
 * Categories: template
 */
?>

<!-- wp:group {"tagName":"main","style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group"
    style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
    <!-- wp:heading {"textAlign":"center","level":1} -->
    <h1 class="wp-block-heading has-text-align-center">
        <?php esc_html_e('404', 'begnas'); ?>
    </h1>
    <!-- /wp:heading -->

    <!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"medium"} -->
    <h2 class="wp-block-heading has-text-align-center has-medium-font-size"
        style="margin-top:var(--wp--preset--spacing--20)">
        <?php esc_html_e('Oops! Page Not Found', 'begnas'); ?>
    </h2>
    <!-- /wp:heading -->

    <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"constrained","contentSize":"400px","wideSize":""}} -->
    <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--40)">
        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center">
            <?php esc_html_e('We\'re sorry, the page you requested could not be found. Please go back to the homepage.', 'begnas'); ?>
        </p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)"><!-- wp:button -->
        <div class="wp-block-button">
            <a class="wp-block-button__link wp-element-button">
                <?php esc_html_e('Go to Homepage', 'begnas'); ?>
            </a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</main>
<!-- /wp:group -->

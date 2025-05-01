<?php
/**
 * Title: Banner / Hero (Business CTA)
 * Slug: begnas/banner
 * Categories: banner, call-to-action
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-right:0;padding-left:0">
    <!-- wp:cover {"url":"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/hero-banner.jpg","id":1972,"dimRatio":0,"overlayColor":"gray-900","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--100);padding-bottom:var(--wp--preset--spacing--100)">
        <span aria-hidden="true" class="wp-block-cover__background has-gray-900-background-color has-background-dim-0 has-background-dim"></span>

        <img
            class="wp-block-cover__image-background wp-image-1972" alt=""
            src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/hero-banner.jpg"
            data-object-fit="cover" />

            <div class="wp-block-cover__inner-container"><!-- wp:columns {"verticalAlignment":"top","align":"wide"} -->
            <div class="wp-block-columns alignwide are-vertically-aligned-top">
                <!-- wp:column {"verticalAlignment":"top","width":"80%","layout":{"type":"default"}} -->
                <div class="wp-block-column is-vertically-aligned-top" style="flex-basis:80%">
                    <!-- wp:group {"layout":{"type":"default"}} -->
                    <div class="wp-block-group">
                        <!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"90px"}}} -->
                        <h1 class="wp-block-heading" style="font-size:90px"><?php esc_html_e( 'Your Gateway to Stunning Websites!', 'begnas' ); ?></h1>
                        <!-- /wp:heading -->

                        <!-- wp:group {"layout":{"type":"constrained","justifyContent":"left"}} -->
                        <div class="wp-block-group">
                            <!-- wp:paragraph {"textColor":"gray-500","fontSize":"medium"} -->
                            <p class="has-gray-500-color has-text-color has-medium-font-size"><?php esc_html_e( 'Your Premier Block Theme for Crafting Limitless Possibilities. Discover the Power of Multipurpose Design!', 'begnas' ); ?></p>
                            <!-- /wp:paragraph -->

                            <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|70"}}}} -->
                            <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--70)">
                                <!-- wp:button {"style":{"border":{"radius":"16px"},"spacing":{"padding":{"left":"var:preset|spacing|50","right":"var:preset|spacing|50","top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"small"} -->
                                <div class="wp-block-button has-custom-font-size has-small-font-size"
                                    style="font-style:normal;font-weight:400"><a
                                        class="wp-block-button__link wp-element-button" href="#"
                                        style="border-radius:16px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--50)"><?php esc_html_e( 'Get Started - Free', 'begnas' ); ?></a></div>
                                <!-- /wp:button -->
                            </div>
                            <!-- /wp:buttons -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"top","width":""} -->
                <div class="wp-block-column is-vertically-aligned-top"></div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

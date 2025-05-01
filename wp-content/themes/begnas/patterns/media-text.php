<?php
/**
 * Title: Media & Text (About CTA)
 * Slug: begnas/media-text
 * Categories: text, media, buttons, about
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"
    style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--100);padding-bottom:var(--wp--preset--spacing--100)">
    <!-- wp:media-text {"align":"wide","mediaId":2039,"mediaLink":"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/agency-building","mediaType":"image","mediaWidth":48,"mediaSizeSlug":"full","verticalAlignment":"top","className":"radius-40"} -->
    <div class="wp-block-media-text alignwide is-stacked-on-mobile is-vertically-aligned-top radius-40"
        style="grid-template-columns:48% auto">
        <figure class="wp-block-media-text__media"><img
                src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/agency-building.jpg" alt=""
                class="wp-image-2039 size-full" /></figure>
        <div class="wp-block-media-text__content">
            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|70"}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group"><!-- wp:heading {"style":{"spacing":{"margin":{"top":"0"}}}} -->
                <h2 class="wp-block-heading" style="margin-top:0"><?php esc_html_e( 'About Begnas', 'begnas' ); ?></h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"fontSize":"medium"} -->
                <p class="has-medium-font-size"><?php esc_html_e( 'Sum dolor sit amet consectetur. Nisi cras porta commodo commodo elit lacus. At et in neque morbi eros nulla arcu. Scelerisque in dolor sagittis mattis id. Porttitor at bibendum a ut.', 'begnas' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"typography":{"fontSize":"20px"}}} -->
                <p style="font-size:20px"><?php esc_html_e( 'At pretium eu lacus bibendum magna cras. Sit ligula nec platea suspendisse et adipiscing. Sed ultrices morbi felis sem vel faucibus massa hendrerit. Tortor nunc hendrerit tincidunt et. Pharetra molestie hendrerit eu mi lorem magnis sit est. Porttitor viverra aenean.', 'begnas' ); ?>
                </p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"fontSize":"x-small"} -->
                <p class="has-x-small-font-size"><?php esc_html_e( 'Sapien vehicula ornare enim felis donec et egestas. Scelerisque porttitor montes auctor tortor. Risus natoque mattis tristique amet nunc egestas odio volutpat est. Bibendum urna risus elit aliquam sed viverra tellus. Arcu sit est id placerat massa quisque nisl non. Et.', 'begnas' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"style":{"border":{"radius":"16px"},"spacing":{"padding":{"left":"var:preset|spacing|50","right":"var:preset|spacing|50","top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"small"} -->
                    <div class="wp-block-button has-custom-font-size has-small-font-size"
                        style="font-style:normal;font-weight:400"><a class="wp-block-button__link wp-element-button"
                            style="border-radius:16px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--50)"><?php esc_html_e( 'More About Theme', 'begnas' ); ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:media-text -->
</div>
<!-- /wp:group -->

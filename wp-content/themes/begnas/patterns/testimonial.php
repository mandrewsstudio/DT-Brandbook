<?php
/**
 * Title: Testimonial (Quote with background image)
 * Slug: begnas/testimonial
 * Categories: text, media, testimonials
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-right:0;padding-left:0">
    <!-- wp:cover {"url":"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/hero-banner.jpg","id":1972,"dimRatio":0,"overlayColor":"gray-900","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull"
        style="padding-top:var(--wp--preset--spacing--100);padding-bottom:var(--wp--preset--spacing--100)">
        <span aria-hidden="true" class="wp-block-cover__background has-gray-900-background-color has-background-dim-0 has-background-dim"></span>

        <img class="wp-block-cover__image-background wp-image-1972" alt=""
            src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/hero-banner.jpg"
            data-object-fit="cover" />

            <div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
            <div class="wp-block-group alignwide">
                <!-- wp:heading {"style":{"typography":{"fontSize":"64px","letterSpacing":"-0.64px","lineHeight":"1.2"},"elements":{"link":{"color":{"text":"var:preset|color|gray-500"}}}},"textColor":"gray-500"} -->
                <h2 class="wp-block-heading has-gray-500-color has-text-color has-link-color"
                    style="font-size:64px;letter-spacing:-0.64px;line-height:1.2"><?php
                    /* Translators: Testimonial pattern highlighted text markup */
                    $highlighted_text = '<mark style="background-color:var(--wp--preset--color--primary-500)" class="has-inline-color has-gray-0-color">' . esc_html__( 'Collaborative Design Process:', 'begnas' ) . '</mark>';

                    echo sprintf(
                        /* Translators: WordPress Theme by ArtifyWeb */
                        esc_html__('%1$s Delving deep into your brand essence, we innovate solutions and meticulously craft exceptional experiences to ensure success.', 'begnas'),
                        $highlighted_text
                    );
                    ?></h2>
                <!-- /wp:heading -->
            </div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->

<?php
/**
 * Title: Template Single Post
 * Slug: begnas/template-single
 * Categories: template
 */
?>

<!-- wp:group {"tagName":"main","align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull"
    style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
    <div class="wp-block-group"><!-- wp:post-title {"level":1,"align":"wide"} /-->

        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"wrap"},"fontSize":"x-small"} -->
        <div class="wp-block-group has-x-small-font-size" style="margin-top:var(--wp--preset--spacing--40)">
            <!-- wp:post-terms {"term":"category"} /-->

            <!-- wp:paragraph {"align":"left","style":{"typography":{"lineHeight":"1"}},"fontSize":"medium"} -->
            <p class="has-text-align-left has-medium-font-size" style="line-height:1">•</p>
            <!-- /wp:paragraph -->

            <!-- wp:post-author-name /-->

            <!-- wp:paragraph {"align":"left","style":{"typography":{"lineHeight":"1"}},"fontSize":"medium"} -->
            <p class="has-text-align-left has-medium-font-size" style="line-height:1">•</p>
            <!-- /wp:paragraph -->

            <!-- wp:post-date /-->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|80"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--80)">
        <!-- wp:post-featured-image {"aspectRatio":"16/9","style":{"layout":{"selfStretch":"fit","flexSize":null}}} /-->

        <!-- wp:post-content {"lock":{"move":false,"remove":false},"align":"wide","layout":{"type":"constrained"}} /-->
    </div>
    <!-- /wp:group -->
</main>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0"}}},"backgroundColor":"gray-0","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-gray-0-background-color has-background" style="margin-top:0">
    <!-- wp:comments {"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}}} -->
    <div class="wp-block-comments"
        style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
        <!-- wp:comments-title {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"x-large"} /-->

        <!-- wp:comment-template {"style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}}} -->
        <!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
        <div class="wp-block-columns"><!-- wp:column {"width":"48px"} -->
            <div class="wp-block-column" style="flex-basis:48px">
                <!-- wp:avatar {"size":48,"style":{"border":{"radius":"48px","width":"1px"}},"borderColor":"gray-300"} /-->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
            <div class="wp-block-column">
                <!-- wp:comment-author-name {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","textDecoration":"none"}},"fontSize":"small"} /-->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"4px","bottom":"12px"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex"}} -->
                <div class="wp-block-group" style="margin-top:4px;margin-bottom:12px">
                    <!-- wp:comment-date {"style":{"typography":{"textDecoration":"none"}},"fontSize":"x-small"} /-->

                    <!-- wp:comment-edit-link {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary-500"},":hover":{"color":{"text":"var:preset|color|gray-800"}}}}},"fontSize":"x-small"} /-->
                </div>
                <!-- /wp:group -->

                <!-- wp:comment-content /-->

                <!-- wp:comment-reply-link {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary-500"},":hover":{"color":{"text":"var:preset|color|gray-800"}}}},"spacing":{"margin":{"top":"12px"}}},"fontSize":"small"} /-->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
        <!-- /wp:comment-template -->

        <!-- wp:comments-pagination -->
        <!-- wp:comments-pagination-previous /-->

        <!-- wp:comments-pagination-numbers /-->

        <!-- wp:comments-pagination-next /-->
        <!-- /wp:comments-pagination -->

        <!-- wp:post-comments-form /-->

        <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|70"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--70)">
            <!-- wp:post-navigation-link {"type":"previous","arrow":"chevron"} /-->

            <!-- wp:post-navigation-link {"arrow":"chevron"} /-->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:comments -->
</div>
<!-- /wp:group -->

<?php
/**
 * Title: Posts, 1 Column
 * Slug: begnas/posts
 * Categories: query
 * Block Types: core/query
 */
?>

<!-- wp:query {"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->
<div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|70"}}} -->
    <!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"}},"border":{"radius":"4px","width":"1px"}},"borderColor":"gray-300","backgroundColor":"gray-0","layout":{"type":"constrained"}} -->
    <div class="wp-block-group has-border-color has-gray-300-border-color has-gray-0-background-color has-background"
                style="border-width:1px;border-radius:4px;padding-right:0;padding-left:0">
        <!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50","top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"blockGap":"0"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
        <div class="wp-block-group"
            style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)">
            <!-- wp:post-featured-image {"isLink":true,"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} /-->

            <!-- wp:post-terms {"term":"category","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary-500"}}},"spacing":{"margin":{"bottom":"8px"}}},"fontSize":"x-small"} /-->

            <!-- wp:post-title {"isLink":true,"style":{"typography":{"textDecoration":"none"}}} /-->

            <!-- wp:post-excerpt {"moreText":"","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} /-->

            <!-- wp:read-more {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} /-->
        </div>
        <!-- /wp:group -->

        <!-- wp:separator {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"gray-300","className":"is-style-default"} -->
            <hr class="wp-block-separator alignwide has-text-color has-gray-300-color has-alpha-channel-opacity has-gray-300-background-color has-background is-style-default" style="margin-top:0;margin-bottom:0"/>
        <!-- /wp:separator -->

        <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"wrap"},"fontSize":"x-small"} -->
        <div class="wp-block-group has-x-small-font-size"
            style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--50)">
            <!-- wp:post-author-name /-->

            <!-- wp:paragraph {"align":"left","style":{"typography":{"lineHeight":"1"}},"fontSize":"medium"} -->
            <p class="has-text-align-left has-medium-font-size" style="line-height:1">•</p>
            <!-- /wp:paragraph -->

            <!-- wp:post-date /-->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
    <!-- /wp:post-template -->

    <!-- wp:query-pagination {"paginationArrow":"chevron","layout":{"type":"flex","justifyContent":"left"}} -->
    <!-- wp:query-pagination-previous /-->

    <!-- wp:query-pagination-numbers /-->

    <!-- wp:query-pagination-next /-->
    <!-- /wp:query-pagination -->

    <!-- wp:query-no-results -->
    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|70"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
    <div class="wp-block-group">
        <!-- wp:group {"layout":{"type":"constrained","contentSize":"540px","wideSize":""}} -->
        <div class="wp-block-group">
            <!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"0"}}}} -->
            <h2 class="wp-block-heading has-text-align-center" style="margin-bottom:0"><?php esc_html_e( 'No results found', 'begnas' ); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","style":{"layout":{"selfStretch":"fit","flexSize":null},"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
            <p class="has-text-align-center" style="margin-top:var(--wp--preset--spacing--40)">
                <?php esc_html_e( 'We could not find any results for your search. Use more generic words or double check your spelling.', 'begnas' ); ?>
            </p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"layout":{"type":"constrained"}} -->
        <div class="wp-block-group">
            <!-- wp:search {"label":"Search","showLabel":false,"width":50,"widthUnit":"%","buttonText":"Search","buttonPosition":"no-button","buttonUseIcon":true,"align":"center","style":{"border":{"color":"#cccccc","radius":"4px"},"typography":{"lineHeight":"1.6"}},"fontSize":"small"} /-->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
    <!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->

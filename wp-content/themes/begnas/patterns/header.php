<?php
/**
 * Title: Main Header (Logo left, navigation and search right)
 * Slug: begnas/header
 * Categories: header
 * Block Types: core/template-part/header
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"backgroundColor":"gray-0","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-gray-0-background-color has-background"
    style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
    <div class="wp-block-group alignwide"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group"><!-- wp:site-logo /-->

            <!-- wp:site-title {"level":0,"style":{"typography":{"fontSize":"24px","textDecoration":"none","lineHeight":"1.1"},"elements":{"link":{"color":{"text":"var:preset|color|gray-900"}}}},"textColor":"gray-900"} /-->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
        <div class="wp-block-group">
            <!-- wp:navigation {"ref":4,"icon":"menu","layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"fontSize":"x-small"} /-->

            <!-- wp:search {"label":"<?php echo esc_attr_x( 'Search', 'search form label', 'begnas' ); ?>","showLabel":false,"widthUnit":"%","buttonText":"<?php echo esc_attr_x( 'Search', 'search button text', 'begnas' ); ?>","buttonPosition":"button-only","buttonUseIcon":true,"isSearchFieldHidden":true,"style":{"border":{"radius":"4px"}},"borderColor":"gray-300","fontSize":"x-small"} /-->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->

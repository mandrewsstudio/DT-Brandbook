<?php
/**
 * Template Name: Contact
 *
 * @package WordPress
 */

// Get the header
get_header();
?>

<input type="hidden" id="associated_page" original="<?php echo get_permalink($post->ID); ?>" value="<?php echo get_permalink($post->ID); ?>">

<div id="primary" class="content-area primary_home">
  <main id="main" class="site-main" role="main">
    <div class="page_content_container">
      <div class="page_content_container_wrapper" id="contact">
        <div class="contact_container section_container">
          <?php $contact_items = get_post_meta($post->ID, 'contact_items', true); ?>

          <div class="contact_details clear">
            <?php foreach ($contact_items as $contact_item) {
              $main_title = $contact_item['main_title'];
              $column_1 = $contact_item['column_1'];
              $column_2 = $contact_item['column_2'];
            ?>
              <div class="contact_details_item clear">
                <div class="main_title contact_details_main_title" data-aos="fade-up">
                  <?php echo nl2br($main_title); ?>
                </div>
                <div class="contact_details_text clear">
                  <div class="contact_details_column contact_details_column1">
                    <?php echo wpautop(do_shortcode($column_1)); ?>
                  </div>
                  <div class="contact_details_column contact_details_column2">
                    <?php echo wpautop(do_shortcode($column_2)); ?>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>

<?php
// Get the footer
get_footer();
?>

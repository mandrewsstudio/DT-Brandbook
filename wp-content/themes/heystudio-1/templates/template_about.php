<?php
/**
 * Template Name: About
 *
 * @package WordPress
 */

// Get the header
get_header();

// Shuffle general colors
global $general_colors;
shuffle($general_colors);
?>

<input type="hidden" id="associated_page" original="<?php echo get_permalink($post->ID); ?>" value="<?php echo get_permalink($post->ID); ?>">

<div id="primary" class="content-area primary_home">
  <main id="main" class="site-main" role="main">
    <div class="page_content_container">
      <div class="page_content_container_wrapper" id="values">
        <div class="values_container">
          <div class="main_title" data-aos="fade-up">
            <?php echo wpautop($post->post_content); ?>
          </div>
          <div class="values_list">
            <?php
            // Get about_list from custom fields
            $about_list = get_post_meta($post->ID, '_heystudio_about_fields', true);
            $color_index = 0;

            foreach ($about_list as $about_item) {
              if (!$general_colors[$color_index]) {
                $color_index = 0;
              }

              $color = $general_colors[$color_index]['general_color'];
              $title = $about_item['title'];
              $text = $about_item['text'];
              $text = str_replace("'", "’", $text);
            ?>
              <div class="value_item clear">
                <div class="value_item_title" data-aos="fade-up" style="color:<?php echo $color; ?>">
                  <?php echo wpautop($title); ?>
                </div>
                <div class="value_item_text" data-aos="fade-up">
                  <?php echo wpautop($text); ?>
                </div>
              </div>
            <?php
              $color_index++;
            }
            ?>
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

<?php
// Get the header
get_header();

// Get the home page
$home_page = get_page_by_path('work');
?>
<input type="hidden" id="associated_page" original="<?php echo get_permalink($home_page->ID); ?>" value="<?php echo get_permalink($home_page->ID); ?>">
<input type="hidden" id="this_project_id" value="<?php echo ($post->ID); ?>">

<div id="primary" class="content-area primary_home">
  <main id="main" class="site-main" role="main">
    <div class="page_content_container">
      <div class="page_content_container_wrapper" id="home">
        <div class="project_container">
          <?php
          global $posts_colors;
          $title = $post->post_title;
          $content = get_post_meta($post->ID, '_heystudio_content', true);
          $content = str_replace("'", "’", $content);
          $big_title = get_post_meta($post->ID, '_heystudio_big_title', true);
          $big_title = str_replace("'", "’", $big_title);
          $colored_text = get_post_meta($post->ID, '_heystudio_colored_text', true);
          $colored_text = str_replace("'", "’", $colored_text);
          $client = get_post_meta($post->ID, '_heystudio_client', true);
          $hero_image = get_post_meta($post->ID, '_heystudio_hero_image', true);
          $hero_video_url = get_post_meta($post->ID, '_heystudio_hero_video_url', true);
          $home_page = get_page_by_path('work');
          if ($posts_colors[$post->ID]) {
            $project_color = $posts_colors[$post->ID];
          }
          $taxonomy_industy = array();
          $taxonomy_services = array();

          // Get the industry terms
          $industry_terms = wp_get_post_terms($post->ID, 'industry');
          if (!empty($industry_terms)) {
            foreach ($industry_terms as $term) {
              $taxonomy_industy[] = '<a href="' . get_permalink($home_page->ID) . '?industry=' . $term->slug . '">' . $term->name . '</a>';
            }
          }

          // Get the service terms
          $service_terms = wp_get_post_terms($post->ID, 'service');
          if (!empty($service_terms)) {
            foreach ($service_terms as $term) {
              $taxonomy_services[] = '<a href="' . get_permalink($home_page->ID) . '?service=' . $term->slug . '">' . $term->name . '</a>';
            }
          }
          ?>
          <div class="project_colors_styles">
            <!-- <style>
              .section_color {
                color: <?php echo $project_color; ?>;
              }

              .section_color .underline:after {
                background-color: <?php echo $project_color; ?>;
              }
            </style> -->
          </div>
          <?php
          if (!empty($hero_image)) {
            $img_src = wp_get_attachment_image_src($hero_image, 'full', false, '');
          ?>
            <div class="project_hero_container" data-aos="fade-up">
              <div class="project_hero_image <?php echo (!empty($hero_video_url)) ? 'has_video' : ''; ?>" <?php echo (!empty($hero_video_url)) ? 'video_url="' . $hero_video_url . '"' : ''; ?> style="background-image:url(<?php echo $img_src[0]; ?>)">
              </div>
            </div>
          <?php } ?>
          <div class="project_body">
            <div class="project_header">
              <div class="project_title section_color" data-aos="fade-up"><?php echo $title; ?></div>
              <?php if (!empty($big_title)) { ?>
                <div class="project_big_text" data-aos="fade-up"><?php echo nl2br($big_title); ?></div>
              <?php } ?>
            </div>
            <div class="project_main_content clear">
              <div class="project_credits underline_link">
                <div class="project_credit_item">
                  <div class="project_credit_title section_color underline_links" data-aos="fade-up">
                    Client
                  </div>
                  <div class="project_credit_title underline_link" data-aos="fade-up">
                    <?php echo $client; ?>
                  </div>
                </div>
                <div class="project_credit_item">
                  <div class="project_credit_title section_color underline_links" data-aos="fade-up">
                    Services
                  </div>
                  <div class="project_credit_title underline_link" data-aos="fade-up">
                    <?php echo implode('<br/>', $taxonomy_services) ?>
                  </div>
                </div>
                <div class="project_credit_item">
                  <div class="project_credit_title section_color underline_links" data-aos="fade-up">
                    Industry
                  </div>
                  <div class="project_credit_title underline_link" data-aos="fade-up">
                    <?php echo implode('<br/>', $taxonomy_industy) ?>
                  </div>
                </div>
              </div>
              <div class="project_main_text">
                <?php if (!empty($colored_text)) { ?>
                  <div class="project_main_text_item underline_links add_fade section_color"><?php echo wpautop($colored_text) ?></div>
                <?php } ?>
                <div class="project_main_text_item underline_links add_fade">
                  <div class="mobile_accordion">
                    <div class="mobile_accordion_header mobile">
                      <div class="mobile_accordion_header_btn">
                        <label></label><span><?php echo get_select_arrow(); ?></span>
                      </div>
                    </div>
                    <div class="mobile_accordion_body">
                      <?php echo wpautop($content) ?>
                      <div class="project_credits underline_link mobile">
                        <div class="project_credit_item">
                          <div class="project_credit_title section_color underline_links" data-aos="fade-up">
                            Client
                          </div>
                          <div class="project_credit_title underline_link" data-aos="fade-up">
                            <?php echo $client; ?>
                          </div>
                        </div>
                        <div class="project_credit_item">
                          <div class="project_credit_title section_color underline_links" data-aos="fade-up">
                            Services
                          </div>
                          <div class="project_credit_title underline_link" data-aos="fade-up">
                            <?php echo implode('<br/>', $taxonomy_services) ?>
                          </div>
                        </div>
                        <div class="project_credit_item">
                          <div class="project_credit_title section_color underline_links" data-aos="fade-up">
                            Industry
                          </div>
                          <div class="project_credit_title underline_link" data-aos="fade-up">
                            <?php echo implode('<br/>', $taxonomy_industy) ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="project_images">
              <?php
              $image_sets = get_post_meta(get_the_ID(), 'project_image_sets', true);
              foreach ($image_sets as $key => $set) {
                $set_size = count($set['images']); // Calculate the size of the set (1, 2, 3, or 4)
                $set_class = 'project_' . ($set_size == 1 ? 'one' : ($set_size == 2 ? 'two' : ($set_size == 3 ? 'three' : 'four'))) . '_images clear'; // Set the class for the container div
                echo '<div class="' . $set_class . '">';
                foreach ($set['images'] as $set_key => $set_array) {
                  $has_video_class = !empty($set_array['video_url']) ? 'has_video' : '';
                  $delay_class = 'fade_delay' . ($set_key - 1); // Calculate the delay class
                  echo '<div class="project_image_container">';
                  echo '<div class="project_image ' . $has_video_class . ' ' . $delay_class . ' " data-aos="fade-up"';
                  if (!empty($set_array['video_url'])) {
                    echo ' video_url="' . esc_attr($set_array['video_url']) . '"';
                  }
                  echo '>';
                  echo '<img src="' . wp_get_attachment_url($set_array['image']) . '" />';
                  echo '</div>';
                  echo '</div>';
                }
                echo '</div>';
              }
              ?>
            </div>
          </div>
        </div>
        <?php
        $related = get_related_projects($post->ID);
        if (!empty($related)) {
        ?>
          <div class="related_projects">
            <div class="related_projects_title" data-aos="fade-up">You may also like...</div>
            <div class="main_grid_container">
              <div class="main_grid clear">
                <?php
                foreach ($related as $related_id) {
                  $post_item_ob = get_post($related_id);
                  get_grid_item($post_item_ob);
                }
                ?>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </main>
</div>

<?php
// Get the footer
get_footer();
?>

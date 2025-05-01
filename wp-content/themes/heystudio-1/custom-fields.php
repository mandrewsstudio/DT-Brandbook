<?php
// Add Hey Configuration menu page to the admin menu
function heystudio_theme_settings_page() {
    add_menu_page(
        'Hey Configuration',              // Page title
        'Hey Configuration',              // Menu title
        'manage_options',                 // Capability
        'heystudio-settings',             // Menu slug
        'heystudio_theme_settings_page_content', // Callback function
        'dashicons-admin-generic',        // Icon URL (using a dashicon)
        60                                // Menu position
    );
}
add_action('admin_menu', 'heystudio_theme_settings_page');

// Callback function for Hey Configuration menu page content
function heystudio_theme_settings_page_content() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('heystudio_theme_settings');
            do_settings_sections('heystudio-settings');
            submit_button('Save Settings');
            ?>
        </form>
    </div>
    <?php
}

// Initialize Hey Configuration theme settings
function heystudio_theme_settings_init() {
    // Register logo text setting
    register_setting('heystudio_theme_settings', 'heystudio_logo_text');

    // Logo Settings section
    add_settings_section(
        'heystudio_logo_section', // ID
        'Logo Settings',          // Title
        '',                       // Callback function (left empty as we don't need any description)
        'heystudio-settings'      // Page
    );

    // Adding the logo text field
    add_settings_field(
        'heystudio_logo_text_field',   // ID
        'Logo',                  // Title
        'heystudio_logo_text_field_cb', // Callback
        'heystudio-settings',        // Page
        'heystudio_logo_section'     // Section
    );

    // Register favicon setting
    register_setting('heystudio_theme_settings', 'heystudio_favicon');

    // Favicon Settings section
    add_settings_section(
        'heystudio_favicon_section', // ID
        'Favicon Settings',         // Title
        '',                         // Callback function (left empty as we don't need any description)
        'heystudio-settings'        // Page
    );
   // Register new settings for background and text color
    register_setting('heystudio_theme_settings', 'heystudio_background_color');
    register_setting('heystudio_theme_settings', 'heystudio_text_color');

    // Add settings fields for background and text color
    add_settings_field(
        'heystudio_background_color_field',     // ID
        'Background Color',                     // Title
        'heystudio_background_color_field_cb',  // Callback
        'heystudio-settings',                   // Page
        'heystudio_colors_section'              // Section
    );

    add_settings_field(
        'heystudio_text_color_field',           // ID
        'Text Color',                           // Title
        'heystudio_text_color_field_cb',        // Callback
        'heystudio-settings',                   // Page
        'heystudio_colors_section'              // Section
    );
    // Adding the favicon image field
    add_settings_field(
        'heystudio_favicon_field',      // ID
        'Favicon Image',               // Title
        'heystudio_favicon_field_cb',  // Callback
        'heystudio-settings',          // Page
        'heystudio_favicon_section'    // Section
    );

    // Register general colors setting
    register_setting('heystudio_theme_settings', 'heystudio_general_colors', 'sanitize_colors_array');

    // Color Settings section
    add_settings_section(
        'heystudio_colors_section',
        'Color Settings',
        '',
        'heystudio-settings'
    );

    // Adding the general colors field
    add_settings_field(
        'heystudio_general_colors_field',
        'General Colors',
        'heystudio_general_colors_field_cb',
        'heystudio-settings',
        'heystudio_colors_section'
    );

    // Register Mailchimp settings
    register_setting('heystudio_theme_settings', 'mailchimp_api_key');
    register_setting('heystudio_theme_settings', 'mailchimp_list_id');

    // Mailchimp Settings section
    add_settings_section(
        'heystudio_mailchimp_section', // ID
        'Newsletter (Mailchimp)',      // Title
        '',                            // Callback function (left empty as we don't need any description)
        'heystudio-settings'           // Page
    );

    // Adding the Mailchimp API KEY field
    add_settings_field(
        'heystudio_mailchimp_api_key_field',   // ID
        'Mailchimp API KEY',                  // Title
        'heystudio_mailchimp_api_key_field_cb', // Callback
        'heystudio-settings',                 // Page
        'heystudio_mailchimp_section'         // Section
    );

    // Adding the Mailchimp LIST ID field
    add_settings_field(
        'heystudio_mailchimp_list_id_field',   // ID
        'Mailchimp List ID',                  // Title
        'heystudio_mailchimp_list_id_field_cb', // Callback
        'heystudio-settings',                 // Page
        'heystudio_mailchimp_section'         // Section
    );

    // Register Footer settings
    register_setting('heystudio_theme_settings', 'heystudio_footer_copyrights');
    register_setting('heystudio_theme_settings', 'heystudio_footer_contact_email');

    // Footer Settings section
    add_settings_section(
        'heystudio_footer_section',  // ID
        'Footer',                    // Title
        '',                          // Callback function (left empty as we don't need any description)
        'heystudio-settings'         // Page
    );

    // Adding the Copyrights field
    add_settings_field(
        'heystudio_footer_copyrights_field',  // ID
        'Copyrights',                          // Title
        'heystudio_footer_copyrights_field_cb', // Callback
        'heystudio-settings',                  // Page
        'heystudio_footer_section'             // Section
    );

    // Adding the Contact Email field
    add_settings_field(
        'heystudio_footer_contact_email_field', // ID
        'Contact Email',                        // Title
        'heystudio_footer_contact_email_field_cb', // Callback
        'heystudio-settings',                   // Page
        'heystudio_footer_section'              // Section
    );

    // News Settings section
    add_settings_section(
        'heystudio_news_section',  // ID
        'News',                    // Title
        '',                          // Callback function (left empty as we don't need any description)
        'heystudio-settings'         // Page
    );

    // Register News settings
    register_setting('heystudio_theme_settings', 'heystudio_news_fields');
    register_setting('heystudio_theme_settings', 'heystudio_show_news');

    // Adding the Show News field
    add_settings_field(
        'heystudio_show_news_field',
        'Show News',
        'heystudio_show_news_field_cb',
        'heystudio-settings', // Use the same page slug
        'heystudio_news_section' // Use the same section ID
    );

    // Adding the News Items field
    add_settings_field(
        'heystudio_news_repeater_field',
        'News Items',
        'heystudio_news_repeater_field_cb',
        'heystudio-settings', // Use the same page slug
        'heystudio_news_section' // Use the same section ID
    );
}
add_action('admin_init', 'heystudio_theme_settings_init');

// Callback function for the logo text field
function heystudio_logo_text_field_cb() {
    $logo_text = get_option('heystudio_logo_text', '');
    ?>
    <input type="text" name="heystudio_logo_text" id="heystudio_logo_text" value="<?php echo esc_attr($logo_text); ?>" style="width:40%;">
    <?php
}

// Callback function for the favicon image field
function heystudio_favicon_field_cb() {
    $favicon_url = get_option('heystudio_favicon', '');
    ?>
    <div class="heystudio_field_container heystudio_image_field_content favicon_image_module">
        <input class="heystudio_image" type="hidden" name="heystudio_favicon" value="<?php echo $favicon_url; ?>">
        <div class="heystudio_image_field_container <?php echo (!empty($favicon_url) ? 'has_image' : ''); ?>">
            <img class="heystudio_image_preview" src="<?php echo wp_get_attachment_url($favicon_url); ?>" />
            <button class="button heystudio_upload_image_btn" type="button" title="Upload Image">Upload Image</button>
            <button class="button heystudio_remove_image_btn" type="button" title="Remove">X</button>
        </div>
    </div>
    <?php
}

// Enqueue media scripts for image upload
function heystudio_enqueue_media_scripts($hook) {
    if ('toplevel_page_heystudio-settings' !== $hook) {
        return;
    }
    wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'heystudio_enqueue_media_scripts');

// Sanitize colors array
function sanitize_colors_array($colors_array) {
    if (!is_array($colors_array)) return array();
    return $colors_array;
}
// Callback function for general colors field
function heystudio_general_colors_field_cb() {
    $colors = get_option('heystudio_general_colors', array());
    ?>
    <div id="heystudio_colors_container">
        <?php foreach ($colors as $index => $color) : ?>
            <div class="heystudio_single_color">
                <input type="text" name="heystudio_general_colors[][general_color]" class="heystudio-color-field" value="<?php echo esc_attr($color['general_color']); ?>">
                <button class="button heystudio_remove_color">Remove</button>
            </div>
        <?php endforeach; ?>
    </div>
    <button class="button" id="heystudio_add_color">Add Color</button>
    <script>
        jQuery(document).ready(function($) {
            // Initiate color picker
            $('.heystudio-color-field').wpColorPicker();

            // Add new color input
            $('#heystudio_add_color').on('click', function(e) {
                e.preventDefault();
                var newColor = $('<div class="heystudio_single_color"><input type="text" name="heystudio_general_colors[][general_color]" class="heystudio-color-field" value=""><button class="button heystudio_remove_color">Remove</button></div>');
                $('#heystudio_colors_container').append(newColor);
                newColor.find('.heystudio-color-field').wpColorPicker();
            });

            // Remove color input
            $('#heystudio_colors_container').on('click', '.heystudio_remove_color', function(e) {
                e.preventDefault();
                $(this).closest('.heystudio_single_color').remove();
            });
        });
    </script>
    <?php
}

// Enqueue color picker scripts and styles
function heystudio_enqueue_color_picker($hook) {
    if ('toplevel_page_heystudio-settings' !== $hook) {
        return;
    }
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
}
add_action('admin_enqueue_scripts', 'heystudio_enqueue_color_picker');

// Callback function for Mailchimp API KEY field
function heystudio_mailchimp_api_key_field_cb() {
    $apiKey = get_option('mailchimp_api_key', '');
    ?>
    <input type="text" name="mailchimp_api_key" id="mailchimp_api_key" placeholder="add your mailchimp API KEY" value="<?php echo esc_attr($apiKey); ?>" style="width:40%;">
    <?php
}

// Callback function for Mailchimp List ID field
function heystudio_mailchimp_list_id_field_cb() {
    $listId = get_option('mailchimp_list_id', '');
    ?>
    <input type="text" name="mailchimp_list_id" id="mailchimp_list_id" placeholder="add your mailchimp list ID" value="<?php echo esc_attr($listId); ?>" style="width:40%;">
    <?php
}

// Callback function for Footer Copyrights field
function heystudio_footer_copyrights_field_cb() {
    $copyrights = get_option('heystudio_footer_copyrights', '');
    ?>
    <input type="text" name="heystudio_footer_copyrights" id="heystudio_footer_copyrights" value="<?php echo esc_attr($copyrights); ?>" style="width:40%;">
    <?php
}

// Callback function for Footer Contact Email field
function heystudio_footer_contact_email_field_cb() {
    $contact_email = get_option('heystudio_footer_contact_email', '');
    ?>
    <input type="email" name="heystudio_footer_contact_email" id="heystudio_footer_contact_email" value="<?php echo esc_attr($contact_email); ?>" style="width:40%;">
    <?php
}

// Callback function for News Repeater field
function heystudio_news_repeater_field_cb() {
    $news_list = get_option('heystudio_news_fields', array());
	  if (!is_array($news_list)) {
    $news_list = array($news_list);
	}
    ?>
    <div id="heystudio_news_repeater_container" class="heystudio_repeater_container heystudio_news_repeater_container">
        <div class="heystudio_repeater_table">
            <div class="heystudio_repeater_table_head">
                <div class="heystudio_repeater_table_head_row repeater_row">
                    <div class="heystudio_repeater_table_cell repeater_cell index_cell"></div>
                    <div class="heystudio_repeater_table_cell repeater_cell field_cell">Image</div>
                    <div class="heystudio_repeater_table_cell repeater_cell field_cell">Title</div>
                    <div class="heystudio_repeater_table_cell repeater_cell field_cell">URL</div>
                    <div class="heystudio_repeater_table_cell repeater_cell action_cell"></div>
                </div>
            </div>
            <div class="heystudio_repeater_table_body">
                <?php
                if ($news_list) {
                    foreach ($news_list as $i => $news_item) {
                        ?>
                        <div class="heystudio_repeater_item repeater_row">
                            <div class="heystudio_repeater_item_index repeater_cell index_cell"><label><?php echo $i + 1; ?></label></div>
                            <div class="heystudio_repeater_item_field repeater_cell field_cell">
                                <div class="heystudio_field_container heystudio_image_field_content">
                                    <input class="heystudio_image" type="hidden" name="heystudio_news_fields[<?php echo $i;?>][image]" value="<?php echo $news_item['image']; ?>">
                                    <div class="heystudio_image_field_container <?php echo (!empty($news_item['image']) ? 'has_image' : ''); ?>">
                                        <img class="heystudio_image_preview" src="<?php echo wp_get_attachment_url($news_item['image']); ?>" />
                                        <button class="button heystudio_upload_image_btn" type="button" title="Upload Image">Upload Image</button>
                                        <button class="button heystudio_remove_image_btn" type="button" title="Remove">X</button>
                                    </div>
                                </div>
                            </div>
                            <div class="heystudio_repeater_item_field repeater_cell field_cell">
                                <textarea class="heystudio_input" name="heystudio_news_fields[<?php echo $i;?>][title]"><?php echo esc_textarea($news_item['title']); ?></textarea>
                            </div>
                            <div class="heystudio_repeater_item_field repeater_cell field_cell">
                                <input type="url" class="heystudio_input" name="heystudio_news_fields[<?php echo $i;?>][url]" value="<?php echo esc_url($news_item['url']); ?>">
                            </div>
                            <div class="heystudio_repeater_item_actions repeater_cell action_cell">
                                <button class="button heystudio_remove_news_item">Remove</button>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="heystudio_repeater_footer">
            <button class="button button-primary" id="heystudio_add_news_item">Add News</button>
        </div>
    </div>
<?php 
 $count = 0;
    if (is_array($news_list) || $news_list instanceof Countable) {
    	$count = count($news_list);
    }
?>
    <script>
        jQuery(document).ready(function ($) {
            init_news_fields(<?php echo $count; ?>);
        });
    </script>
    <?php
}

// Callback function for Show News field
function heystudio_show_news_field_cb() {
    $show_news = get_option('heystudio_show_news', '');
    ?>
    <input type="checkbox" name="heystudio_show_news" id="heystudio_show_news" <?php echo $show_news=='1'?'checked':''?> value="1">
    <?php
}


// About Meta Box for Pages
function heystudio_about_meta_box() {
    add_meta_box(
        'heystudio_about_meta_box',    // Metabox ID
        'About',                // Title
        'heystudio_about_meta_box_cb', // Callback function
        'page'                         // Post type
    );
}
add_action('add_meta_boxes', 'heystudio_about_meta_box');

// Callback function for About Meta Box
function heystudio_about_meta_box_cb($post) {
    wp_nonce_field(basename(__FILE__), 'heystudio_about_nonce');
    
    $values_list = get_post_meta($post->ID, '_heystudio_about_fields', true);
   
    echo '<div id="heystudio_about_repeater_container" class="heystudio_repeater_container heystudio_about_repeater_container">';
    echo '<div class="heystudio_repeater_table">';
    echo '<div class="heystudio_repeater_table_head">';
    echo '<div class="heystudio_repeater_table_head_row repeater_row">';
    echo '<div class="heystudio_repeater_table_cell repeater_cell index_cell"></div>';
    echo '<div class="heystudio_repeater_table_cell repeater_cell field_cell">Title</div>';
    echo '<div class="heystudio_repeater_table_cell repeater_cell field_cell">Text</div>';
    echo '<div class="heystudio_repeater_table_cell repeater_cell action_cell"></div>';
    echo '</div>';
    echo '</div>';
    echo '<div class="heystudio_repeater_table_body">';
    if (!empty($values_list)) {
        foreach($values_list as $i => $values_item) {
            ?>
            <div class="heystudio_repeater_item repeater_row">
                <div class="heystudio_repeater_item_index repeater_cell index_cell"><label><?php echo $i+1; ?></label></div>
                <div class="heystudio_repeater_item_field repeater_cell field_cell">
                    <input type="text" class="heystudio_input" name="heystudio_about_title[]" value="<?php echo esc_attr($values_item['title']); ?>">
                </div>
                <div class="heystudio_repeater_item_field repeater_cell field_cell">
                    <textarea class="heystudio_editor" name="heystudio_about_text[]" id="heystudio-editor-<?php echo $i; ?>" rows="12"><?php echo esc_textarea($values_item['text']); ?></textarea>
                </div>
                <div class="heystudio_repeater_item_actions repeater_cell action_cell">
                    <button class="button heystudio_remove_item">Remove</button>
                </div>
            </div>
            <?php
        }
    }
    echo '</div>';
    echo '</div>';
    echo '<div class="heystudio_repeater_footer"><button class="components-button is-primary" id="heystudio_add_item">Add Item</button></div>';
    echo '</div>'; // Close repeater container
    $count = 0;
    if (is_array($values_list) || $values_list instanceof Countable) {
    	$count = count($values_list);
    }
    ?>
    <script>
        $(document).ready(function() {
            init_about_fields(<?php echo $count; ?>);
        });
    </script>
    <?php
}
// Function to save about fields
function heystudio_save_about_fields($post_id) {
    // Check nonce for security
    if (!isset($_POST['heystudio_about_nonce']) || !wp_verify_nonce($_POST['heystudio_about_nonce'], basename(__FILE__))) {
        return;
    }

    // Check auto save
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Check if POST data exists before accessing it
    $titles = isset($_POST['heystudio_about_title']) ? $_POST['heystudio_about_title'] : array();
    $texts = isset($_POST['heystudio_about_text']) ? $_POST['heystudio_about_text'] : array();

    $values_list = array();

    for ($i = 0; $i < count($titles); $i++) {
        if (!empty($titles[$i]) || !empty($texts[$i])) {
            $values_list[] = array(
                'title' => sanitize_text_field($titles[$i]),
                'text'  => wp_kses_post($texts[$i])
            );
        }
    }

    update_post_meta($post_id, '_heystudio_about_fields', $values_list);
}
add_action('save_post', 'heystudio_save_about_fields');

// Function to enqueue scripts
function heystudio_admin_enqueue_scripts($hook) {
    if ('post.php' === $hook || 'post-new.php' === $hook) {
        wp_enqueue_script('jquery-ui-sortable');
    }
}
add_action('admin_enqueue_scripts', 'heystudio_admin_enqueue_scripts');

// Function for admin footer JavaScript
function heystudio_admin_footer_js() {
    // Only run this script on the post editing screen
    $screen = get_current_screen();
    if ($screen->base != 'post') return;
    ?>

    <script type="text/javascript">
        hideShowMetaboxes();
    </script>

    <?php
}
add_action('admin_footer', 'heystudio_admin_footer_js');

// Function to create contact meta box
function heystudio_contact_meta_box() {
    add_meta_box(
        'heystudio_contact_meta_box',    // Metabox ID
        'Contact Items',                 // Title
        'heystudio_contact_meta_box_cb', // Callback function
        'page'                           // Post type
    );
}
add_action('add_meta_boxes', 'heystudio_contact_meta_box');

// Callback function for contact meta box
function heystudio_contact_meta_box_cb($post) {
    wp_nonce_field(basename(__FILE__), 'heystudio_contact_nonce');
    
    $contact_items = get_post_meta($post->ID, 'contact_items', true);
    echo '<div id="heystudio_about_repeater_container" class="heystudio_repeater_container heystudio_contact_repeater_container">';
    echo '<div  class="heystudio_repeater_table">';
    echo '<div  class="heystudio_repeater_table_head">';
    echo '<div  class="heystudio_repeater_table_head_row repeater_row">';
    echo '<div  class="heystudio_repeater_table_cell repeater_cell index_cell"></div>';
    echo '<div  class="heystudio_repeater_table_cell repeater_cell field_cell">Main Title</div>';
    echo '<div  class="heystudio_repeater_table_cell repeater_cell field_cell">Column 1</div>';
    echo '<div  class="heystudio_repeater_table_cell repeater_cell field_cell">Column 2</div>';
    echo '<div  class="heystudio_repeater_table_cell  repeater_cell action_cell"></div>';
    echo '</div>';
    echo '</div>';
    echo '<div  class="heystudio_repeater_table_body">';
    
    if (!empty($contact_items)) {
        foreach($contact_items as $i => $contact_item) {
            ?>
             <div class="heystudio_repeater_item repeater_row">
                <div class="heystudio_repeater_item_index repeater_cell index_cell"><label><?php echo $i+1; ?></label></div>
                    <div class="heystudio_repeater_item_field repeater_cell field_cell">
                    <textarea name="contact_main_title[]" rows="3"><?php echo esc_textarea($contact_item['main_title']); ?></textarea>
                </div>
                <div class="heystudio_repeater_item_field repeater_cell field_cell">
                    <textarea name="contact_column_1[]" class="heystudio_editor" id="heystudio-contact-column1-<?php echo $i; ?>" rows="12"><?php echo esc_textarea($contact_item['column_1']); ?></textarea>
                </div>
                <div class="heystudio_repeater_item_field repeater_cell field_cell">
                    <textarea name="contact_column_2[]" class="heystudio_editor" id="heystudio-contact-column2-<?php echo $i; ?>" rows="12"><?php echo esc_textarea($contact_item['column_2']); ?></textarea>
                </div>
                <div class="heystudio_repeater_item_actions repeater_cell action_cell">
                    <button class="button heystudio_remove_contact_item">Remove</button>
                </div>
            </div>
            <?php
        }
    }
    echo '</div>';
    echo '</div>'; 
    echo '<div  class="heystudio_repeater_footer"><button class="components-button is-primary" id="heystudio_add_contact_item">Add Item</button></div>';
    echo '</div>'; // Close repeater container
 $count = 0;
    if (is_array($contact_items) || $contact_items instanceof Countable) {
    	$count = count($contact_items);
    }
    ?>
    <script>
        $(document).ready(function() {
            init_contact_fields(<?php echo $count; ?>,<?php echo $count; ?>);
        });
    </script>
    <?php
}

// Function to save contact fields
function heystudio_save_contact_fields($post_id) {
    // Check nonce for security
    if (!isset($_POST['heystudio_contact_nonce']) || !wp_verify_nonce($_POST['heystudio_contact_nonce'], basename(__FILE__))) {
        return;
    }

    // Check auto save
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Check if POST data exists before accessing it
    $main_titles = isset($_POST['contact_main_title']) ? $_POST['contact_main_title'] : array();
    $column_1s = isset($_POST['contact_column_1']) ? $_POST['contact_column_1'] : array();
    $column_2s = isset($_POST['contact_column_2']) ? $_POST['contact_column_2'] : array();

    $contact_items = array();

    for ($i = 0; $i < count($main_titles); $i++) {
        $contact_items[] = array(
            'main_title' => sanitize_textarea_field($main_titles[$i]),
            'column_1'  => wp_kses_post($column_1s[$i]),
            'column_2'  => wp_kses_post($column_2s[$i])
        );
    }

    update_post_meta($post_id, 'contact_items', $contact_items);
}
add_action('save_post', 'heystudio_save_contact_fields');

// Function to enqueue project admin script
function enqueue_project_admin_script() {
    global $post;

    $screen = get_current_screen();

    // Check if we're on the edit or post-new page of 'project' post type.
    if ( ($screen->base == 'post' || $screen->base == 'post-new') && $screen->post_type == 'project' ) {
        echo "<script type='text/javascript'>
                init_projects_fields();
        </script>";
    }
}
add_action('admin_footer', 'enqueue_project_admin_script');

// Function to create preview meta box
function heystudio_preview_meta_box() {
    add_meta_box(
        'heystudio_preview_meta_box',
        'Preview',
        'heystudio_preview_meta_box_cb',
        'project'
    );
}
add_action('add_meta_boxes_project', 'heystudio_preview_meta_box');

// Callback function for preview meta box
function heystudio_preview_meta_box_cb($post) {
    wp_nonce_field(basename(__FILE__), 'heystudio_preview_nonce');

    $image = get_post_meta($post->ID, '_heystudio_image', true);
    $video_url = get_post_meta($post->ID, '_heystudio_video_url', true);
    echo '<div class="heystudio_field_container heystudio_image_field_content">';
    echo '<input class="heystudio_image" type="hidden" name="heystudio_image" value="' . esc_attr($image) . '">';
    echo '<div class="heystudio_image_field_container '.(!empty($image)?'has_image':'').'">';
    echo '<img class="heystudio_image_preview" src="' . wp_get_attachment_url($image) . '" />';
    echo '<button class="button heystudio_upload_image_btn" type="button" title="Upload Image">Upload Image</button>';
    echo '<button class="button heystudio_remove_image_btn" type="button" title="Remove">X</button>';
    echo '</div>';
    echo '</div>';
    
    echo '<div class="heystudio_field_container">';
    echo '<label>Video URL:</label>';
    echo '<input type="url"  class="heystudio_field"  name="heystudio_video_url" value="' . esc_url($video_url) . '">';
    echo '</div>';
}

// Function to save preview meta
function heystudio_save_preview_meta($post_id) {
    if (!isset($_POST['heystudio_preview_nonce']) || !wp_verify_nonce($_POST['heystudio_preview_nonce'], basename(__FILE__))) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    update_post_meta($post_id, '_heystudio_image', sanitize_text_field($_POST['heystudio_image']));
    update_post_meta($post_id, '_heystudio_video_url', sanitize_text_field($_POST['heystudio_video_url']));
}
add_action('save_post_project', 'heystudio_save_preview_meta');

// Function to create client meta box
function heystudio_client_meta_box() {
    add_meta_box(
        'heystudio_client_meta_box',
        'Client',
        'heystudio_client_meta_box_cb',
        'project'
    );
}

// Adding a client meta box
add_action('add_meta_boxes_project', 'heystudio_client_meta_box');

function heystudio_client_meta_box_cb($post) {
    wp_nonce_field(basename(__FILE__), 'heystudio_client_nonce');
    $client = get_post_meta($post->ID, '_heystudio_client', true);
    echo '<input type="text" class="heystudio_field" name="heystudio_client" value="' . esc_attr($client) . '">';
}

function heystudio_save_client_meta($post_id) {
    if (!isset($_POST['heystudio_client_nonce']) || !wp_verify_nonce($_POST['heystudio_client_nonce'], basename(__FILE__))) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    update_post_meta($post_id, '_heystudio_client', sanitize_text_field($_POST['heystudio_client']));
}
add_action('save_post_project', 'heystudio_save_client_meta');

// Adding a subtitle meta box
function heystudio_subtitle_meta_box() {
    add_meta_box(
        'heystudio_subtitle_meta_box',
        'Subtitle',
        'heystudio_subtitle_meta_box_cb',
        'project'
    );
}
add_action('add_meta_boxes_project', 'heystudio_subtitle_meta_box');

function heystudio_subtitle_meta_box_cb($post) {
    wp_nonce_field(basename(__FILE__), 'heystudio_subtitle_nonce');
    $subtitle = get_post_meta($post->ID, '_heystudio_subtitle', true);
    echo '<textarea class="heystudio_field" name="heystudio_subtitle">' . esc_textarea($subtitle) . '</textarea>';
}

function heystudio_save_subtitle_meta($post_id) {
    if (!isset($_POST['heystudio_subtitle_nonce']) || !wp_verify_nonce($_POST['heystudio_subtitle_nonce'], basename(__FILE__))) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    update_post_meta($post_id, '_heystudio_subtitle', sanitize_textarea_field($_POST['heystudio_subtitle']));
}
add_action('save_post_project', 'heystudio_save_subtitle_meta');

// Adding a project header meta box
function heystudio_project_header_meta_box() {
    add_meta_box(
        'heystudio_project_header_meta_box',
        'Project Header',
        'heystudio_project_header_meta_box_cb',
        'project'
    );
}
add_action('add_meta_boxes_project', 'heystudio_project_header_meta_box');

function heystudio_project_header_meta_box_cb($post) {
    wp_nonce_field(basename(__FILE__), 'heystudio_project_header_nonce');

    $big_title = get_post_meta($post->ID, '_heystudio_big_title', true);
    $colored_text = get_post_meta($post->ID, '_heystudio_colored_text', true);
    $content = get_post_meta($post->ID, '_heystudio_content', true);

    echo '<div class="heystudio_field_container">';
    echo '<label>Big Title:</label>';
    echo '<textarea class="heystudio_field" name="heystudio_big_title">' . esc_textarea($big_title) . '</textarea>';
    echo '</div>';
    
    echo '<div class="heystudio_field_container">';
    echo '<label>Title:</label>';
    echo '<textarea name="heystudio_colored_text" class="heystudio_editor" id="heystudio_colored_text" rows="4">'.esc_textarea($colored_text).'</textarea>';
    echo '</div>';
    
    echo '<div class="heystudio_field_container">';
    echo '<label>Text:</label>';
    echo '<textarea name="heystudio_content" class="heystudio_editor" id="heystudio_content" rows="12">'.esc_textarea($content).'</textarea>';
    echo '</div>';
}

function heystudio_save_project_header_meta($post_id) {
    if (!isset($_POST['heystudio_project_header_nonce']) || !wp_verify_nonce($_POST['heystudio_project_header_nonce'], basename(__FILE__))) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    update_post_meta($post_id, '_heystudio_big_title', sanitize_textarea_field($_POST['heystudio_big_title']));
    update_post_meta($post_id, '_heystudio_colored_text', wp_kses_post($_POST['heystudio_colored_text']));
    update_post_meta($post_id, '_heystudio_content', wp_kses_post($_POST['heystudio_content']));
}
add_action('save_post_project', 'heystudio_save_project_header_meta');



add_action('save_post', 'update_post_content_from_custom_field');

// Adding a hero image meta box
function heystudio_hero_image_meta_box() {
    add_meta_box(
        'heystudio_hero_image_meta_box',
        'Hero Image',
        'heystudio_hero_image_meta_box_cb',
        'project'
    );
}
add_action('add_meta_boxes_project', 'heystudio_hero_image_meta_box');

function heystudio_hero_image_meta_box_cb($post) {
    wp_nonce_field(basename(__FILE__), 'heystudio_hero_image_nonce');

    $hero_image = get_post_meta($post->ID, '_heystudio_hero_image', true);
    $hero_video_url = get_post_meta($post->ID, '_heystudio_hero_video_url', true);

    echo '<div class="heystudio_field_container heystudio_image_field_content">';
    echo '<input class="heystudio_image" type="hidden" name="heystudio_hero_image" value="' . esc_attr($hero_image) . '">';
    echo '<div class="heystudio_image_field_container '.(!empty($hero_image)?'has_image':'').'">';
    echo '<img class="heystudio_image_preview" src="' . wp_get_attachment_url($hero_image) . '" />';
    echo '<button class="button heystudio_upload_image_btn" type="button" title="Upload Image">Upload Image</button>';
    echo '<button class="button heystudio_remove_image_btn" type="button" title="Remove">X</button>';
    echo '</div>';
    echo '</div>';
    
    echo '<div class="heystudio_field_container">';
    echo '<label>Video URL:</label>';
    echo '<input type="url" class="heystudio_field" name="heystudio_hero_video_url" value="' . esc_url($hero_video_url) . '" />';
    echo '</div>';
}

function heystudio_save_hero_image_meta($post_id) {
    if (!isset($_POST['heystudio_hero_image_nonce']) || !wp_verify_nonce($_POST['heystudio_hero_image_nonce'], basename(__FILE__))) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    update_post_meta($post_id, '_heystudio_hero_image', sanitize_text_field($_POST['heystudio_hero_image']));
    update_post_meta($post_id, '_heystudio_hero_video_url', sanitize_text_field($_POST['heystudio_hero_video_url']));
}
add_action('save_post_project', 'heystudio_save_hero_image_meta');

// Enqueue media uploader
function heystudio_enqueue_media_uploader() {
    global $typenow;

    // Only for our post type
    if ($typenow == 'project') {
        wp_enqueue_media();
    }
}
add_action('admin_footer', 'heystudio_enqueue_media_uploader');

// Adding a project images metabox
function project_add_images_metabox() {
    add_meta_box(
        'project_images_metabox', 
        'Project Images', 
        'project_images_metabox_callback', 
        'project', 
        'normal'
    );
}
add_action('add_meta_boxes', 'project_add_images_metabox');

function project_images_metabox_callback($post) {
    wp_nonce_field('project_images_metabox', 'project_images_metabox_nonce');

    // Fetch the saved image sets
    $image_sets = get_post_meta($post->ID, 'project_image_sets', true);
	     if (!is_array($image_sets)) {
    $image_sets = array($image_sets);
	}
    ?>
    <div id="heystudio_projects_images_flexible_content_container" class="heystudio_flexible_content_container heystudio_projects_images_flexible_content_container">
        <div id="images_container">
            <?php
            echo '<div  class="heystudio_flexible_content_table">';
            echo '<div  class="heystudio_flexible_content_table_body">';
            foreach ($image_sets as $key=> $set) {
                echo '<div class="heystudio_flexible_content_item flexible_content_row">';
                echo '<div class="heystudio_flexible_content_item_index flexible_content_cell index_cell"><label>'.($key+1).'</label></div>';
                echo '<div class="heystudio_flexible_content_item_field flexible_content_cell field_cell">';
                echo '<div class="image-set " columns="'.(count($set['images'])).'" >';
                foreach($set['images'] as $set_key => $set_array){
                    echo '<div class="image-set-column">';
                    echo '<div class="heystudio_field_container heystudio_image_field_content">';
                    echo '<input class="heystudio_image" type="hidden" name="project_image_sets[' . $key . '][images]['.$set_key.'][image]" value="' . esc_attr($set_array['image']) . '">';
                    echo '<div class="heystudio_image_field_container '.(!empty($set_array['image'])?'has_image':'').'">';
                    echo '<img class="heystudio_image_preview" src="' . wp_get_attachment_url($set_array['image']) . '" />';
                    echo '<button class="button heystudio_upload_image_btn" type="button" title="Upload Image">Upload Image</button>';
                    echo '<button class="button heystudio_remove_image_btn" type="button" title="Remove">X</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="heystudio_field_container">';
                    echo '<label>Video Url:</label>';
                    echo '<input type="url" class="heystudio_field" name="project_image_sets[' . $key . '][images]['.$set_key.'][video_url]" value="' . esc_attr($set_array['video_url']) . '">';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
                echo '</div>';
                echo '<div class="heystudio_flexible_content_item_actions flexible_content_cell action_cell">';
                echo '<button type="button" class="button remove_set_btn">Remove</button>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';
             $count = 0;
    if (is_array($image_sets) || $image_sets instanceof Countable) {
    	$count = count($image_sets);
    }
            ?>
            <script>
                var flexible_content_count = <?php echo $count;?>;
            </script>
        </div>

        <div  class="heystudio_flexible_content_footer">
            <div  class="heystudio_flexible_content_footer_select">
                <label for="number_of_images">Select Number of Images per row:</label>
                <select id="number_of_images">
                    <option value="1">1 Image</option>
                    <option value="2">2 Images</option>
                    <option value="3">3 Images</option>
                    <option value="4">4 Images</option>
                </select>
            </div>
            <button class="components-button is-primary"  type="button" id="add_images_btn">Add Images</button>
        </div>
    </div>
    <?php
}
// Callback function for background color field
function heystudio_background_color_field_cb() {
    // Get the value of the setting
    $background_color = get_option('heystudio_background_color');
    // Display the color picker
    echo '<input type="text" name="heystudio_background_color" value="' . esc_attr($background_color) . '" class="heystudio-color-field" />';
}

// Callback function for text color field
function heystudio_text_color_field_cb() {
    // Get the value of the setting
    $text_color = get_option('heystudio_text_color');
    // Display the color picker
    echo '<input type="text" name="heystudio_text_color" value="' . esc_attr($text_color) . '" class="heystudio-color-field" />';
}

function project_save_postdata($post_id) {
    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Verify nonce to ensure data came from our meta box
    if (!isset($_POST['project_images_metabox_nonce']) || !wp_verify_nonce($_POST['project_images_metabox_nonce'], 'project_images_metabox')) {
        return;
    }

    // Check permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    update_post_meta($post_id, 'project_image_sets',  array_values($_POST['project_image_sets']));
}

add_action('save_post', 'project_save_postdata');

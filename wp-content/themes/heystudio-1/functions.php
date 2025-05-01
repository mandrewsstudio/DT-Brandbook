<?php
if ( ! function_exists( 'heystudio_setup' ) ) :
function heystudio_setup() {
	load_theme_textdomain( 'heystudio', get_template_directory() . '/languages' );
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );
		register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'twentyfifteen' ),
		'social'  => __( 'Social Links Menu', 'twentyfifteen' ),
	) );
}
endif;
add_action( 'after_setup_theme', 'heystudio_setup' );


function heystudio_scripts() {
	wp_enqueue_script( 'heystudio-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );
	wp_localize_script( 'heystudio-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'heystudio' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'heystudio' ) . '</span>',
	) );
}
add_action( 'wp_enqueue_scripts', 'heystudio_scripts' );


function heystudio_enqueue_admin_style_script() {
	   // Enqueue custom admin CSS
    wp_enqueue_style('heystudio-admin-style', get_template_directory_uri() . '/admin-theme/admin-style.css');
    // Enqueue custom admin JS
    wp_enqueue_script('heystudio-admin-script', get_template_directory_uri() . '/admin-theme/admin-script.js');
}

add_action('admin_enqueue_scripts', 'heystudio_enqueue_admin_style_script');


function remove_site_icon_customizer($wp_customize) {
    $wp_customize->remove_control('site_icon');
}
add_action('customize_register', 'remove_site_icon_customizer');

add_action('after_setup_theme', 'remove_admin_bar' );

	function remove_admin_bar() {
	show_admin_bar(false);
	}

function get_main_menu(){
	global $post;
	$front_page_id = get_option('page_on_front');
	?>

	<header id="masthead" class="site-header" role="banner">
		<div class="header_wrapper clear">
			<a href="<?php echo get_home_url();?>" class="logo"><?php echo get_logo();?></a>
			<div class="main_menu">
				     <ul class="main-nav" ><?php
                    $menu_name = 'main_menu';
                    $menu_object = wp_get_nav_menu_object( $menu_name );
                    $menuitems = wp_get_nav_menu_items( $menu_object->term_id, array( 'order' => 'DESC' ) );
                    $count = 0;
                    if(!empty($menuitems)){
                        foreach( $menuitems as $item ):
                            $title = $item->title;
                            $link = $item->url;
                            $target = $item->target;
                            ?><li class="item" id="menu_item_<?php echo $count; ?>" item_id="<?php echo $item->ID; ?>">
                                <a href="<?php echo $link; ?>" <?php echo $target?'target="_blank"':'';?> class="title pointer underline">
                                    <?php echo $title;?>
                                </a>
                            </li><?php $count++; endforeach;
                    } ?></ul>
			</div>
		</div>
	</header>
<?php
 $show_news = get_option('heystudio_show_news', '');
 if($show_news){
$news_list = get_option('heystudio_news_fields', array());
	if(!empty($news_list)){
	?>
	
	<div class="news_slider_container">
		<div class="news_slider_container_wrapper">
			<div class="swiper mySwiper">
    <div class="swiper-wrapper" >
    	<?php foreach($news_list as $news_item){ 
    		$image = $news_item['image'];
			$image_url = wp_get_attachment_image_src($image, 'medium', false, '');
			$title = $news_item['title'];
			$url = $news_item['url'];
    		?>
      <div class="swiper-slide">
      	<a href="<?php echo $url;?>" class="news_item">
      		<div class="news_item_container clear">
      			<div class="news_item_image">
      			<div class="news_item_image_ob" style="background-image:url(<?php echo $image_url[0] ;?>);">
      			</div>
      			</div>
      				
      			<div class="news_item_text"><?php echo nl2br($title); ?></div>
      		</div>
      	</a>
      </div>
     <?php } ?>
    </div>
    <div class="swiper-button-next" ><?php echo get_select_arrow();?></div>
    <div class="swiper-button-prev" ><?php echo get_select_arrow();?></div>
		</div>
	</div>
	</div>

	<?php
	}
	}

}
function get_logo() {
    $logo_text = get_option('heystudio_logo_text', '');
    $general_colors = get_option('heystudio_general_colors', array());
    $split_logo_text = mb_str_split($logo_text); // Use mb_str_split
    shuffle($general_colors);
    $output = '';
    $colorIndex = 0;

    foreach ($split_logo_text as $char) {
        $color = $general_colors[$colorIndex]['general_color'];
        $output .= '<span style="color: ' . $color . '">' . $char . '</span>';
        $colorIndex = ($colorIndex + 1) % count($general_colors);
    }

    echo $output; // Changed to echo $output instead of $logo_text
}
function get_select_arrow(){
	return '<svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1 0.999999L8 8L15 0.999999" stroke="white" stroke-width="2"/>
</svg>';

	
}
function get_select_circle(){
		return '<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="6.5" cy="6.5" r="5.5" stroke="white" stroke-width="2"/>
</svg>';

	
}

  function get_grid_item($post_ob){
  		global $posts_colors;
		$industries_list = get_the_terms( $post_ob->ID, 'industry' );
		$services_list = get_the_terms( $post_ob->ID, 'service' );
		$cats = array();
			foreach($industries_list as $category_item){
			$cats[] = $category_item->slug;
		}
		foreach($services_list as $category_item){
			$cats[] = $category_item->slug;
		}
		$image_id = get_post_meta($post_ob->ID,'_heystudio_image',true);
		$video_url = get_post_meta($post_ob->ID,'_heystudio_video_url',true);
		$img_src = wp_get_attachment_image_src($image_id, 'large', false, '');
		$title = $post_ob->post_title;
		$excerpt = get_post_meta( $post_ob->ID,'_heystudio_subtitle',true );
		$excerpt = str_replace("'", "’", $excerpt);
	 	 
	  
		$url = get_permalink($post_ob->ID );
		if($posts_colors[$post_ob->ID]){
		$color = $posts_colors[$post_ob->ID];
		}
		?>
		<div class="grid_item <?php echo implode(" ", $cats);?>" >
			<a href="<?php echo $url;?>" data-aos="fade-up" >
				<div class="grid_item_image scale_prop" <?php echo (!empty($video_url))?'video_url="'.$video_url.'"':'';?> o_width ="<?php echo $img_src[1];?>" o_height= "<?php echo $img_src[2];?>" >
					<div class="grid_item_image_ob" bk_image="<?php echo $img_src[0];?>"></div>
				</div>
				<div class="grid_item_footer">
					<!-- <div class="grid_item_title" style="color:<?php echo $color;?>"><?php echo  $title;?></div> -->
					<div class="grid_item_title change_colors_js"  project_id="<?php echo $post_ob->ID ?>"><?php echo  $title;?></div>
					<div class="grid_item_excerpt"><?php echo  nl2br($excerpt);?></div>
				</div>
			</a>
		</div>
		<?php
}
  function get_work_posts($post_type='project'){
					$args = array(
				    'post_type' => $post_type,
				    'posts_per_page' =>-1,
				    'orderby'        => 'menu_order',
				    'order'        => 'ASC',
					'post_status' => 'publish'
					
				);
				$the_posts = new WP_Query($args);
				return $the_posts->posts;
}
function get_related_projects($current_post_id) {
    $industry_terms = wp_get_post_terms($current_post_id, 'industry');
    $service_terms = wp_get_post_terms($current_post_id, 'service');

    $args = array(
        'post_type' => 'project',
        'posts_per_page' => 5,
        'orderby' => 'rand',
        'post__not_in' => array($current_post_id),
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'industry',
                'field' => 'slug',
                'terms' => wp_list_pluck($industry_terms, 'slug'),
            ),
            array(
                'taxonomy' => 'service',
                'field' => 'slug',
                'terms' => wp_list_pluck($service_terms, 'slug'),
            ),
        ),
    );

    $random_projects = new WP_Query($args);
    $related_projects = array();

    if ($random_projects->have_posts()) {
        while ($random_projects->have_posts()) {
            $random_projects->the_post();
            if (get_the_ID() != $current_post_id && !in_array(get_the_ID(), $related_projects)) {
                $related_projects[] = get_the_ID();
            }
        }
        wp_reset_postdata();
    }

    // If only 2 posts found, try again with OR relation
    if (count($related_projects) < 5) {
        $args['tax_query']['relation'] = 'OR';
        $args['tax_query'][1]['operator'] = 'NOT IN';
        $args['tax_query'][1]['terms'] = $related_projects;
        $random_projects = new WP_Query($args);
        if ($random_projects->have_posts()) {
            while ($random_projects->have_posts()) {
                $random_projects->the_post();
                if (get_the_ID() != $current_post_id && !in_array(get_the_ID(), $related_projects)) {
                    $related_projects[] = get_the_ID();
                    if (count($related_projects) == 5) break;
                }
            }
            wp_reset_postdata();
        }
    }

    return $related_projects;
}
function my_newsletter_shortcode() {
	$apiKey = get_option('mailchimp_api_key', '');;
    $listId = get_option('mailchimp_list_id', '');
	  ob_start();
	if($apiKey && $listId){
	  ?>
<div class="newsletter_module"><div class="newsletter_title" data-aos="fade-up">Subscribe to our Newsletter</div><div class="newsletter_form_container"><div class="newsletter_form_content"><form class="newsletter_form" method="post" action="<?php echo admin_url('admin-ajax.php'); ?>"><div><div class="newsletter_content"><div class="newsletter_form_inputs clear" data-aos="fade-up"><div class="newsletter_form_input_container newsletter_email_container clear"><input type='text' class="newsletter_email" name="newsletter_email" placeholder="Your email"/></div><div class="newsletter_form_input_container submit_input_container clear"><input type='submit' class="newsletter_submit cursor_pointer" disabled name="newsletter_submit" value="Subscribe"/></div></div><div class="newsletter_error">Ops! Please check if your email is correct 🤔</div><div class="newsletter_thanks_wrapper"><div class="newsletter_thanks_container"><label>Thanks for subscribing! You’ll hear from us soon 🎉</label></div></div></div><input type="hidden" name="action" value="add_to_newsletter" /></div></form></div></div></div>

	  <?php
	  }
      return ob_get_clean();
}

add_shortcode('newsletter_form', 'my_newsletter_shortcode');

add_action( 'wp_ajax_nopriv_add_to_newsletter', 'add_to_newsletter' );
add_action( 'wp_ajax_add_to_newsletter', 'add_to_newsletter' );
function add_to_newsletter(){
$email= $_POST['newsletter_email'];
$res = suscribe_mailchimp($email);
echo '0';
exit;
}
function suscribe_mailchimp($email){
		$apiKey = get_option('mailchimp_api_key', '');;
    $listId = get_option('mailchimp_list_id', '');
if($apiKey && $listId && $email ){
    $server = substr($apiKey, strpos($apiKey, '-') + 1); // extracting the datacenter (usXX) from the API key

    $url = 'https://' . $server . '.api.mailchimp.com/3.0/lists/' . $listId . '/members/';

    $data = array(
        'email_address' => $email,
        'status' => 'subscribed', // "subscribed" or "pending" (pending will send a confirmation email)
    );

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey); // Authentication
    curl_setopt($ch, CURLOPT_HTTPHEADER,  array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

return true;
}
return false;
}
function register_project_post_type() {

    $labels = array(
        'name'                  => _x( 'Projects', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Projects', 'text_domain' ),
        'name_admin_bar'        => __( 'Project', 'text_domain' ),
        'add_new_item'          => __( 'Add Project', 'text_domain' ),
    );

    $args = array(
        'label'                 => __( 'Project', 'text_domain' ),
        'description'           => __( 'Custom post type for projects', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor','excerpt' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 21,
        'menu_icon'             => 'dashicons-cover-image',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );

    register_post_type( 'project', $args );

}
add_action( 'init', 'register_project_post_type', 0 );

function enqueue_custom_admin_css() {
    // Check if we are on the edit screen of the "project" post type
    global $post_type;
    if ($post_type === 'project') {
        echo '<style>
            .wp-block-post-content {
                display: none !important;
            }
        </style>';
    }
}
add_action('admin_head', 'enqueue_custom_admin_css');
// Register Custom Taxonomy: Industry
function register_industry_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Industries', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Industry', 'Taxonomy Singular Name', 'text_domain' ),
        'add_new_item'               => __( 'Add Industry', 'text_domain' ),
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
         'show_in_rest'               => true
    );

    register_taxonomy( 'industry', array( 'project' ), $args );

}
add_action( 'init', 'register_industry_taxonomy', 0 );

// Register Custom Taxonomy: Service
function register_service_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Services', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Service', 'Taxonomy Singular Name', 'text_domain' ),
        'add_new_item'               => __( 'Add Service', 'text_domain' ),
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
         'show_in_rest'               => true
    );

    register_taxonomy( 'service', array( 'project' ), $args );

}
add_action( 'init', 'register_service_taxonomy', 0 );

// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status() {
    return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
    $comments = array();
    return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');
function df_remove_posts_menu() {
    remove_menu_page('edit.php');
}
add_action('admin_menu', 'df_remove_posts_menu');

function custom_duplicate_post_link($actions, $post) {
    if ($post->post_type == 'project') {
        $nonce = wp_create_nonce('duplicate_post_' . $post->ID);
        $actions['duplicate'] = '<a href="' . admin_url('admin.php?action=duplicate_post_as_draft&post=' . $post->ID . '&_wpnonce=' . $nonce) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
    }
    return $actions;
}

function duplicate_post_as_draft() {
    if (isset($_GET['action']) && $_GET['action'] == 'duplicate_post_as_draft' && current_user_can('edit_posts')) {
        check_admin_referer('duplicate_post_' . $_GET['post']);
        $post_id = (isset($_GET['post']) ? absint($_GET['post']) : 0);
        $post = get_post($post_id);

        if (isset($post) && $post != null) {
            $new_post = array(
                'post_title' => $post->post_title . ' (Copy)',
                'post_content' => $post->post_content,
                'post_status' => 'draft',
                'post_type' => $post->post_type,
                'post_author' => $post->post_author,
                'post_date' => current_time('mysql'),
                'post_date_gmt' => get_gmt_from_date(current_time('mysql'))
            );

            $new_post_id = wp_insert_post($new_post);

            $post_metas = get_post_meta($post_id);
            foreach ($post_metas as $key => $values) {
                if ($key == 'project_image_sets') { // Handle the project_image_sets field
                    $project_image_sets = get_post_meta($post_id, 'project_image_sets', true);
                    if (!empty($project_image_sets)) {
                        update_post_meta($new_post_id, 'project_image_sets', $project_image_sets);
                    }
                } else { // Copy all other post meta
                    foreach ($values as $value) {
                        update_post_meta($new_post_id, $key, maybe_unserialize($value));
                    }
                }
            }
			  $taxonomies = get_object_taxonomies($post->post_type); // Retrieves all taxonomies associated with the post type
            foreach ($taxonomies as $taxonomy) {
                $post_terms = wp_get_post_terms($post_id, $taxonomy, array('fields' => 'slugs'));
                wp_set_object_terms($new_post_id, $post_terms, $taxonomy);
            }
			update_post_content_from_custom_field($new_post_id);
            wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
            exit;
        } else {
            wp_die('Post creation failed, could not find original post: ' . esc_html($post_id));
        }
    }
}

add_filter('post_row_actions', 'custom_duplicate_post_link', 10, 2);
add_action('admin_init', 'duplicate_post_as_draft');



function heystudio_theme_activation() {
    // Check if theme is being activated for the first time
    if (false === get_option('heystudio_theme_activated')) {
        // Set default settings or perform any other one-time actions
        // Mark the theme as activated
        update_option('heystudio_theme_activated', true);
		send_theme_activation_data();
		build_theme_content();
		

    }
}
function send_theme_activation_data() {
    // Set the timezone to Barcelona
    date_default_timezone_set('Europe/Madrid'); // Barcelona shares the same timezone as Madrid

    $website_url = get_site_url();
    $website_name = get_bloginfo('name');
    $admin_email = get_bloginfo('admin_email');
    $activation_date = date('Y-m-d H:i:s'); // Get current date and time

    $remote_url = 'https://heystudio.es/theme-activations/';
    $response = wp_remote_post($remote_url, array(
        'body' => array(
            'website_url' => $website_url,
            'website_name' => $website_name,
            'admin_email' => $admin_email,
            'activation_date' => $activation_date // Send date and time of activation
        )
    ));
}
add_action('after_switch_theme', 'heystudio_theme_activation');
function build_theme_content() {
require_once get_template_directory() . '/content/content.php';
$general_content = $content['general'];
update_option('heystudio_logo_text', $general_content['heystudio_logo_text']);
$favicon_attachment_id = upload_image_to_media_library($general_content['heystudio_favicon']);
update_option('heystudio_favicon', $favicon_attachment_id);
update_option('heystudio_background_color', $general_content['heystudio_background_color']);
update_option('heystudio_text_color', $general_content['heystudio_text_color']);
update_option('heystudio_general_colors', $general_content['heystudio_general_colors']);
update_option('heystudio_footer_copyrights',$general_content['heystudio_footer_copyrights']);
update_option('heystudio_footer_contact_email',$general_content['heystudio_footer_contact_email']);
update_option('heystudio_show_news',$general_content['heystudio_show_news']);
$news_array = $general_content['heystudio_news_fields'];
$real_news_array = $news_array;
foreach($news_array as $key=>$news_array_item){
	$real_news_array[$key]['image'] = upload_image_to_media_library($news_array_item['image']);
}
update_option('heystudio_news_fields',$real_news_array);

$taxonomies = $content['taxonomies'];
if(!empty($taxonomies)){
  foreach ($taxonomies as $taxonomy => $terms) {
        foreach ($terms as $term) {
            if (!term_exists($term['name'], $taxonomy)) {
                wp_insert_term(
                    $term['name'], // the term
                    $taxonomy, // the taxonomy
                    array(
                        'description'=> '',
                        'slug' => $term['label']
                    )
                );
            }
        }
    }
     }

$pages = $content['pages'];
if(!empty($pages)){
foreach ( $pages as $page_index=>$page ) {
    // Check if the page already exists
    $existing_page = get_page_by_path( $page['post_name'], OBJECT, 'page' );

    // If the page doesn't already exist, create it
    if ( !$existing_page ) {
        $page_data = array(
            'post_title'    => wp_strip_all_tags( $page['title'] ),
            'post_content'  => $page['content'],
            'post_name'     => $page['post_name'],
            'post_status'   => $page['status'],
            'post_type'     => $page['post_type'],
            'post_author'   => 1, // or the ID of the author
            'menu_order'    => $page_index,
            'page_template' => $page['template'],
        );

        // Insert the post into the database
        $page_id = wp_insert_post( $page_data );

        // If the page is set to be the front page, update the WordPress option
        if ( $page_id && $page['is_front_page'] ) {
            update_option( 'page_on_front', $page_id );
            update_option( 'show_on_front', 'page' );
        }

        // Add post meta data if available
        if ( !empty($page['postmeta']) && !empty($page_id) ) {
            update_post_meta($page_id, $page['postmeta']['meta_key'], $page['postmeta']['meta_value']);
        }
    }
}

}

$projects = $content['projects'];
if(!empty($projects)){
foreach ( $projects as $menu_order=>$project ) {
	
    // Check if the page already exists
    $existing_page = get_page_by_path( $project['post_name'], OBJECT, 'project' );

    // If the page doesn't already exist, create it
    if ( !$existing_page ) {
        $project_data = array(
            'post_title'    => wp_strip_all_tags( $project['title'] ),
            'post_content'  => $project['content'],
            'post_name'     => $project['post_name'],
                'post_excerpt'  => $project['excerpt'],
            'post_status'   => $project['status'],
            'post_type'     => $project['post_type'],
            'post_author'   => 1, // or the ID of the author
            'menu_order'    => $menu_order
                    );
        // Insert the post into the database
        $project_id = wp_insert_post( $project_data );
		
		$taxonomies = $project['taxonomies'];
		if(!empty($taxonomies)){
						foreach($taxonomies as $taxonomy => $terms){
						   foreach ($terms as $term_slug) {
				        // Append each term to the project, one by one
				        $term = get_term_by('slug', $term_slug, $taxonomy);
				        if ($term !== false) {
				            wp_set_object_terms($project_id, $term->term_id, $taxonomy, true);
				        }
						   }
						}
						}
        // Add post meta data if available
        if ( !empty($project['postmeta']) && !empty($project_id) ) {
        	foreach($project['postmeta'] as $meta){
        		switch ($meta['meta_key']) {
					case '_heystudio_image':
					case '_heystudio_hero_image':
						$image_path = $meta['meta_value'];
						$image_attachment_id = upload_image_to_media_library($image_path);
						if(!empty($image_attachment_id)){
							update_post_meta($project_id, $meta['meta_key'], $image_attachment_id);
						}
						break;
					case 'project_image_sets':
						$content_images_set =array();
						$images = $meta['meta_value'];
						foreach($images as $image_index => $image_item){
							foreach($image_item['images'] as $key => $image){
								
						$image_path = $image['image'];
						$image_attachment_id = upload_image_to_media_library($image_path);
						if($image_attachment_id){
						$content_images_set[$image_index]['images'][$key]['image'] =$image_attachment_id;
						$content_images_set[$image_index]['images'][$key]['video_url'] =$image['video_url'];
						}
							}
						}
						update_post_meta($project_id, $meta['meta_key'], $content_images_set);
						break;
						case '_heystudio_content':
							update_post_meta($project_id, $meta['meta_key'], $meta['meta_value']);
						   wp_update_post(array(
			                'ID'           => $project_id,
			                'post_content' => $meta['meta_value'],
			            ));	
						
						break;		
					default:
						update_post_meta($project_id, $meta['meta_key'], $meta['meta_value']);
						break;
				}
        	}
            
        }
    }
}

}
   // Check if the menu exists
    $menu_name   = 'main_menu';
    $menu_exists = wp_get_nav_menu_object( $menu_name );

    // If it doesn't exist, let's create it.
    if( !$menu_exists){
        $menu_id = wp_create_nav_menu($menu_name);

        // Set up default menu items
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  __('Work'),
            'menu-item-url' => home_url( '/' ), 
            'menu-item-status' => 'publish'));

		wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  __('About'),
            'menu-item-url' => home_url( '/about/' ), 
            'menu-item-status' => 'publish'));

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  __('Contact'),
            'menu-item-url' => home_url( '/contact/' ), 
            'menu-item-status' => 'publish'));

    }
}
function upload_image_to_media_library($image_url, $description = '') {
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    require_once(ABSPATH . 'wp-admin/includes/media.php');

    // Extract the filename from the image URL
    $filename = basename($image_url);

    // Check if an image with the same filename exists in the media library
    $existing_attachment_id = get_attachment_id_by_url( $image_url );
    if ($existing_attachment_id) {
        // If the image exists, return the existing attachment ID
        return $existing_attachment_id;
    }

    // Add the action here, it will use the function defined outside
    add_action('add_attachment', 'grab_attachment_id_for_sideloaded_image');

    // Sideload the image, which will add it to the media library and return the HTML for an img element
    $media = media_sideload_image($image_url, 0, $description);

    // If there was an error, return it
    if (is_wp_error($media)) {
        // Remove the action to prevent it from being called again if there is an error
        remove_action('add_attachment', 'grab_attachment_id_for_sideloaded_image');
        return $media;
    }

    // Otherwise, return the attachment ID from the global variable
    global $temp_attachment_id;
	
	if (!is_wp_error($attachment_id)) {
    return $temp_attachment_id;
} else {
   return '';
}
	
   
}
function grab_attachment_id_for_sideloaded_image($attachment_id) {
    // Store the attachment ID in a global variable or pass it via a reference to a function
    global $temp_attachment_id;
    $temp_attachment_id = $attachment_id;
    // Remove the action to prevent it from being called again
    remove_action('add_attachment', 'grab_attachment_id_for_sideloaded_image');
}

// Updating post content from custom field
function update_post_content_from_custom_field($post_id) {
    // Check if the post type is "project"
    if (get_post_type($post_id) === 'project') {
        // Check if it's an autosave or revision
        if (wp_is_post_autosave($post_id) || wp_is_post_revision($post_id)) {
            return;
        }

        // Get the custom field value
        $custom_content = get_post_meta($post_id, '_heystudio_content', true);

        // Get the current post content
        $current_content = get_post_field('post_content', $post_id);

        // Remove slashes added by WordPress
        $custom_content = wp_unslash($custom_content);

        // Check if the custom field value has changed
        if ($custom_content !== $current_content) {
            // Update the post_content
            wp_update_post(array(
                'ID'           => $post_id,
                'post_content' => $custom_content,
            ));
        }
    }
}
function get_attachment_id_by_url( $image_url ) {
    global $wpdb;

    // Extract the filename from the URL
    $parsed_url = parse_url( $image_url );
    $path_parts = pathinfo( $parsed_url['path'] );
    $filename = $path_parts['basename'];

    // Prepare the query to check if the filename exists in the database
    $query = "SELECT post_id FROM $wpdb->postmeta WHERE meta_value LIKE '%/$filename' LIMIT 1";
    $result = $wpdb->get_var( $query );

    return $result ? $result : false;
}
require_once get_template_directory() . '/custom-fields.php';
	?>
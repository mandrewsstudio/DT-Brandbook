<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
$show_news = get_option('heystudio_show_news', '');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js <?php echo !$show_news?'hide_news':'';?>">
<head>
		<?php 
		global $general_colors;
	$front_page_id = get_option('page_on_front');
	 $general_colors = get_option('heystudio_general_colors', array());
	?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	 <meta name="theme-color" content="black">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
<?php
$favicon_id = get_option('heystudio_favicon', '');

// If there's no favicon set by the user, use the default one from the theme
if (empty($favicon_id)) {
    $favicon_url = get_template_directory_uri() . '/favicon.png';
}else{
	$favicon_url =wp_get_attachment_url($favicon_id);
}
?>
<link rel="icon" href="<?php echo $favicon_url;?>" type="image/x-icon">
	
	<?php 
		global $mobile;
		require_once ('Mobile_Detect.php');
		$detect = new Mobile_Detect(); 
		$class="desktop_version";
		$mobile = false;
		if($detect->isMobile() || $detect->isTablet()){
		$class="mobile_version";
			$mobile = true;
		}
		?>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css"/>
<?php 
if($class!="mobile_version"){
	?>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/hovers.css"/>			
	<?php
}else{
	?>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/mobile_hovers.css"/>			
	<?php	
}
?>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/mobile.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/swiper-bundle.min.css"/>
<script type="text/javascript">
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    var theme_url = "<?php echo get_stylesheet_directory_uri(); ?>";
    var home_url="<?php echo get_home_url(); ?>/";
    
</script>
	<?php wp_head(); ?>
</head>
<body  >
	<?php 
	global $posts_colors;
	
		$posts_list =get_work_posts();
					if(!empty($posts_list)){
						foreach($posts_list as $post_item_ob){
						$random_values_post = array_rand($general_colors);
						$posts_colors[$post_item_ob->ID] = $general_colors[$random_values_post];
						}
					}
	?>
	<script>
	var posts_colors = <?php echo json_encode($posts_colors); ?>;
	var general_colors = JSON.parse('<?php echo json_encode($general_colors); ?>');
		
</script>
	<div class="site_container">
<div id ="site_container" class="<?php echo $class;?>">
<div id="page" class="hfeed site">
<?php 
$background_color = get_option('heystudio_background_color');
$text_color = get_option('heystudio_text_color');
if(!empty($background_color) && !empty($text_color)){
	?>
	<style>
		body,
		#masthead,
		.filters_container .filters_container_selector,
		.filters_container .filter_options .filter_labels_container,
		.filters_container .filter_options .filter_labels_container .categories_filters_option{
			background-color:<?php echo $background_color;?>;
			color:<?php echo $text_color;?>;
		}
		.filters_container .filter_options .filter_labels_container .categories_filters_option.active{
			color:<?php echo $background_color;?>;
			background-color:<?php echo $text_color;?>;
		}
		body a,
		.newsletter_module .newsletter_form_container .newsletter_form_content form .newsletter_content .newsletter_form_inputs .newsletter_form_input_container.newsletter_email_container input,
		.newsletter_module .newsletter_form_container .newsletter_form_content form .newsletter_content .newsletter_form_inputs .newsletter_form_input_container.submit_input_container input{
			color:<?php echo $text_color;?>;
		}
		.filters_container .filters_container_selector .filter_item,
		#colophon,
		.news_slider_container,
		.filters_container .filters_container_selector,
		.filters_container .filters_container_selector .filter_item,
			.filters_container .filter_options .filter_labels_container .categories_filters_option,
			.newsletter_module .newsletter_form_container .newsletter_form_content form .newsletter_content .newsletter_form_inputs,
			#masthead{
				border-color:<?php echo $text_color;?>;
		}
		.filters_container .filters_container_selector .filter_item .select_arrow svg circle{
			stroke:<?php echo $text_color;?>;
		}
		.underline:after{
			background: <?php echo $text_color;?>;
		}
		
		.newsletter_module .newsletter_form_container .newsletter_form_content form .newsletter_content .newsletter_form_inputs .newsletter_form_input_container.newsletter_form_input_container input::placeholder {
		color:<?php echo $text_color;?>;
		}
		
		.newsletter_module .newsletter_form_container .newsletter_form_content form .newsletter_content .newsletter_form_inputs .newsletter_form_input_container.newsletter_form_input_container input:-ms-input-placeholder {
		color:<?php echo $text_color;?>;
		}
		
		.newsletter_module .newsletter_form_container .newsletter_form_content form .newsletter_content .newsletter_form_inputs .newsletter_form_input_container.newsletter_form_input_container input::-ms-input-placeholder {
		color:<?php echo $text_color;?>;
		}
		
		.newsletter_module .newsletter_form_container .newsletter_form_content form .newsletter_content .newsletter_form_inputs .newsletter_form_input_container.newsletter_form_input_container input::-webkit-input-placeholder {
		color:<?php echo $text_color;?>;
		}
		<?php 
		if(!$mobile){
		?>
		.filters_container .filter_options .filter_labels_container .categories_filters_option:hover{
    	background:<?php echo $text_color;?>;
		color:<?php echo $background_color;?>;
		}
		
		<?php 
		}else{
			?>
		.filters_container .filter_options .filter_labels_container .categories_filters_option.mobile_hover{
    	background:<?php echo $text_color;?>;
		color:<?php echo $background_color;?>;
		}
		<?php 
		}
		?>
		.news_slider_container .news_slider_container_wrapper .swiper:after, .news_slider_container .news_slider_container_wrapper .swiper:before{
		    background: linear-gradient(90deg, <?php echo $background_color;?> 0%, transparent 100%);
		}
		.news_slider_container .news_slider_container_wrapper .swiper:after{
			background: linear-gradient(-90deg, <?php echo $background_color;?> 0%, transparent 100%)
		}
	</style>
	<?php
}
?>	
<?php get_main_menu(); 
?>
	<div id="content" class="site-content">
				<?php 
	$template_slug = get_page_template_slug( get_the_ID() );

// Extract the name from the slug
$template_name = '';
if ( preg_match( '/template_(\w+)\.php$/', $template_slug, $matches ) ) {
    $template_name = $matches[1];
}
		?>
<input type="hidden" id="page_name" value="<?php echo $post->post_type=='project'?'project':$template_name;?>" />
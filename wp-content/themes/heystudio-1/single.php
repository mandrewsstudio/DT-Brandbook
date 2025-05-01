<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
 $post_type = get_post_type($post);
	global $share_slug;
		$share = false;;
		$js ="";
		switch ($post_type) {
			case 'project':
				
				include_once('templates/template_project.php');
			break;	
			default:	
		include_once('404.php');
				
				break;
		}
		if($include!=""){
		include_once($include);

			}
			?>
					
<?php
$object= $wp_query->query;
$post_type= $object['post_type'];
	global $share_slug;
		$share = false;;
		$js ="";
		if(empty($post_type)){
		$obj = get_queried_object();
$post_type = $obj->taxonomy;
		}
		switch ($post_type) {
			default:
		include_once('404.php');
				
				break;
		}
		if($include!=""){
		include_once($include);

			}
			?>
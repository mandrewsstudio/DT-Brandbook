<?php
/**
* Template Name: Work
*
* @package WordPress
*/
get_header();
$service = $_GET['service'];
$industry = $_GET['industry'];
?>
<input type="hidden" id="associated_page" original="<?php echo get_permalink($post -> ID); ?>" value="<?php echo get_permalink($post -> ID); ?>">
<div id="primary" class="content-area primary_home">
  <main id="main" class="site-main" role="main">
    <div class="page_content_container" >
      <div class="page_content_container_wrapper" id="home">
      	<div class="home_container">
      		<div class="filters_container">
      			<div class="filters_container_selector clear">
      			<?php 
      			$taxonomies = get_object_taxonomies('project');
				$taxonomies= array_reverse($taxonomies);
      			foreach ($taxonomies as $taxonomy) {
      				$taxonomy_object = get_taxonomy($taxonomy);
				    echo '<div class="filter_item" filter="'.$taxonomy.'"><span>' .  $taxonomy_object->labels->name . '</span><div class="selected_count"></div><div class="select_arrow">'.get_select_circle().'</div></div>';
				}
      			?>
      		</div>
      		<div class="filter_options">
      			<?php 
      			foreach ($taxonomies as $taxonomy) {
					$list = get_terms($taxonomy, array(
													    'hide_empty' => false,
					) );
					?>
					<div class="filter_labels_container" filter="<?php echo $taxonomy;?>">
						<div class="filter_labels_container_wrapper clear">
					<?php
					foreach($list as $list_item){
				    ?>
				    <div class="categories_filters_option <?php echo ($taxonomy=='service' && $list_item->slug==$service)?'active':'';?> <?php echo ($taxonomy=='industry' && $list_item->slug==$industry)?'active':'';?>" filter_val="<?php echo $list_item->slug; ?>"><?php echo $list_item->name; ?></div>
				    <?php
				}
				?> 
				</div>
				</div>
				<?php
				}
      			?>
      		</div>
      		</div>
      			<div class="main_grid_container">
				<div class="main_grid clear">
					<?php 
					$posts_list =get_work_posts();
					if(!empty($posts_list)){
						foreach($posts_list as $post_item_ob){
							get_grid_item($post_item_ob);
						}
					}
					?>	
				</div>
			</div>
      	</div>
      </div>
    </div>
  </main>
</div>
<?php 
get_footer(); ?>

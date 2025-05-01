<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

	</div><!-- .site-content -->

</div><!-- .site -->
<footer id="colophon" class="site-footer" role="contentinfo">
  <div class="footer_wrapper clear">
   			<div class="footer_menu">
				     <ul class="footer-nav" >
				     	<?php 
				     	   $copyrights = get_option('heystudio_footer_copyrights', '');
				     	?>
				     	<li>
                             <a  class="underline inverted_underline">
                                 <?php echo $copyrights;?>
                                </a></li>
                                <?php 
				     	$contact_email = get_option('heystudio_footer_contact_email', '');
						if(!empty($contact_email)){
				     	?>
				     	<li>
                             <a href="mailto:<?php echo $contact_email; ?>" class="underline inverted_underline">
                                  Let’s talk!
                                </a></li>
                                <?php } ?>
                                </ul>
			</div>
  </div>
</footer>
<?php wp_footer(); ?>
<script type="text/javascript"   src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.documentsize.js"></script>
<script type="text/javascript"   src="<?php echo get_stylesheet_directory_uri(); ?>/js/swiper-bundle.js"></script>
<script type="text/javascript"   src="<?php echo get_stylesheet_directory_uri(); ?>/js/ajaxify.min.js"></script>
<script type="text/javascript"   src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.form.js"></script>
<script type="text/javascript"   src="<?php echo get_stylesheet_directory_uri(); ?>/js/isotope.js"></script>
<script type="text/javascript"   src="<?php echo get_stylesheet_directory_uri(); ?>/js/common.js"></script>
</div>	
</div>
	<div id="body_cursor"><div class="cursor_inner"><span></span></div>
</body>
</html>

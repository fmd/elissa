		<div id="footer" class="clearfix">
			<div class="frame">
				<div class="bar">
					<div class="footer-left">
						<?php wp_nav_menu(array('menu_id' => 'menu-footer', 'theme_location' => 'footer', 'menu_class' => 'footernav')); ?>
						<div style="clear:both;"></div>
						<p class="copyright">&copy; <?php echo date("Y"); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a> | <?php bloginfo('description'); ?></p>
					</div>
					
					<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Right') ) : else : ?>		
					<?php endif; ?>
				</div><!--bar-->
			</div><!--frame-->
		</div><!--footer-->
		<div style="clear:both;"></div>
	</div><!-- wrapper -->

	<!-- tracking code -->
	<?php if (of_get_option('of_tracking_code') == true) { ?>
		<?php echo of_get_option('of_tracking_code', 'no entry' ); ?>
	<?php } ?>
	
	<?php wp_footer(); ?>

</body>
</html>
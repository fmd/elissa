<?php 
/* 
Template Name: Custom Archive
*/ 
?>

<?php get_header(); ?>
		
		<!-- grab the sidebar -->
		<?php get_sidebar(); ?>
		
		<div id="content" class="filter-posts">
			
			<!-- grab the posts -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div data-id="post-<?php the_ID(); ?>" data-type="post-<?php the_ID(); ?>" class="post-<?php the_ID(); ?> post clearfix project">
				<div class="box">
					
					<div class="frame">
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						
						
						<div class="post-content">
							
							<div id="archive">
								<div class="columnize">
									<h3><?php _e('Archive By Day','okay'); ?></h3>
									<ul>
										<?php wp_get_archives('type=daily&limit=15'); ?>
									</ul>
									
									<h3><?php _e('Archive By Month','okay'); ?></h3>
									<ul>
										<?php wp_get_archives('type=monthly&limit=12'); ?>
									</ul>
									
									<h3><?php _e('Archive By Year','okay'); ?></h3>
									<ul>
										<?php wp_get_archives('type=yearly&limit=12'); ?>
									</ul>
								</div>
								
								<div class="columnize">
									<h3><?php _e('Latest Posts','okay'); ?></h3>
									<ul>
										<?php wp_get_archives('type=postbypost&limit=20'); ?>
									</ul>
								</div>
								
								<div class="columnize">
									<h3><?php _e('Contributors','okay'); ?></h3>
									<ul>
										<?php wp_list_authors('show_fullname=1&optioncount=1&orderby=post_count&order=DESC'); ?>
									</ul>
									
									<h3><?php _e('Pages','okay'); ?></h3>
									<ul>
										<?php wp_list_pages('sort_column=menu_order&title_li='); ?>
									</ul>
									
									<h3><?php _e('Categories','okay'); ?></h3>
									<ul>
										<?php wp_list_categories('orderby=name&title_li='); ?> 
									</ul>
								</div>
							</div>
							
						</div>
					</div><!-- frame -->
					
					
				</div><!-- box -->
			</div><!--writing post-->				
			
			<?php endwhile; ?>
			<?php endif; ?>
		
			<div style="clear:both;"> </div>
			
		</div><!--content-->

		<!-- grab footer -->
		<?php get_footer(); ?>
	</div><!--main-->
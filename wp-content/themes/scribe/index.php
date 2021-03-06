<?php get_header(); ?>
		
		<!-- grab the sidebar -->
		<?php get_sidebar(); ?>
		
		<div id="content" class="filter-posts">
			
			<!-- grab the posts -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div <?php post_class('post clearfix'); ?>>
				<div class="box">
					
					<div class="frame">
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="post-image">
								<a class="large-image" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'large-image' ); ?></a>
								
								<a class="expand lightbox" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" title="<?php the_title(); ?> post image"><img src="<?php echo get_template_directory_uri(); ?>/images/expand.png" alt="expand" /></a>
							</div>
						<?php } ?>
						
						<div class="date-circle">
							<?php if(is_page()) { ?>
							<?php } else { ?>
							
							<div class="date">
								<span class="month"><?php the_time('M'); ?></span>
								<strong class="day"><?php the_time('d'); ?></strong>
							</div>
							
							<?php } ?>
						</div>
						
						<?php if ( get_post_meta($post->ID, 'okvideo', true) ) { ?>
					    	<div class="okvideo">
					    		<?php echo get_post_meta($post->ID, 'okvideo', true) ?>
							</div>
						<?php } ?>
													
						<div style="display:none;">
						<?php if(is_single()) { ?>
							<?php if ( has_post_thumbnail() ) { ?>
								<a class="post-thumb lightbox" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" title="<?php the_title(); ?>" ><?php the_post_thumbnail('post-image'); ?></a>
							<?php } ?>
						<?php } else { ?>
							<?php if ( has_post_thumbnail() ) { ?>
								<a class="post-thumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('post-image'); ?></a>
							<?php } ?>
						<?php } ?>
						</div>
						
						<div class="post-content">
							<?php the_content('Read more &rarr;'); ?>
						</div>
					</div><!-- frame -->
					
					<!-- meta info bar -->
					<div class="bar" <?php if(is_page()) { ?>style="display:none;"<?php } ?>>
						<div class="bar-frame clearfix">
							<div class="author">
								<strong class="title"><?php _e('Author','okay'); ?></strong>
								<?php the_author_link(); ?>
							</div>
							<div class="categories">
								<strong class="title"><?php _e('Category','okay'); ?></strong>
								<?php the_category(', '); ?>
							</div>
							<div class="comments">
								<strong class="title"><?php _e('Comments','okay'); ?></strong>
								<a href="<?php the_permalink(); ?>/#comments"><?php comments_number(__('No Comments','okay'),__('1 Comment','okay'),__( '% Comments','okay') );?></a>
							</div>								
						  	
						  	<?php the_tags('<div class="tags">
						  		<strong class="title">Tags</strong>
						  		',', ','
						  	</div>'); ?>
						  	
							<div class="share" >
								<div class="share-circle">
									<a class="share-twitter" onclick="window.open('http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>','twitter','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="<?php the_title(); ?>" target="blank"><img src="<?php echo get_template_directory_uri(); ?>/images/share-twitter.png" alt="twitter share" /></a>
								</div>
								<div class="share-circle">
									<a class="share-facebook" onclick="window.open('http://www.facebook.com/share.php?u=<?php the_permalink(); ?>','facebook','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" title="<?php the_title(); ?>"  target="blank"><img src="<?php echo get_template_directory_uri(); ?>/images/share-facebook.png" alt="facebook share" /></a>
								</div>
								
								<div class="share-circle">
									<a class="share-google" href="https://m.google.com/app/plus/x/?v=compose&amp;content=<?php the_title(); ?> - <?php the_permalink(); ?>" onclick="window.open('https://m.google.com/app/plus/x/?v=compose&amp;content=<?php the_title(); ?> - <?php the_permalink(); ?>','gplusshare','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;"><img src="<?php echo get_template_directory_uri(); ?>/images/share-google.png" alt="google plus share" /></a>
								</div>
							</div>
							
						</div><!-- bar frame -->
					</div><!-- bar -->
				</div><!-- box -->
			</div><!--writing post-->	
			
			<?php if(is_single()) { ?>
				<!-- next and previous posts -->	
				<div class="next-prev">
					<?php previous_post_link('<div class="prev-post"><strong class="title">&larr; Previous Post</strong><span>%link</span></div>'); ?>
					<?php next_post_link('<div class="next-post"><strong class="title">Next Post &rarr;</strong><span>%link</span></div>'); ?>
				</div>	
			<?php } ?>			
			
			<?php endwhile; ?>
			
			<div style="clear:both;"></div>
							
			<?php if(is_single()) { } else { ?>	
				<div class="post-nav">
					<div class="postnav-left"><?php previous_posts_link(__('Newer Entries &rarr;', 'okay')) ?></div>
					<div class="postnav-right"><?php next_posts_link(__('&larr; Older Entries', 'okay')) ?></div>
					<div style="clear:both;"> </div>
				</div><!--end post navigation-->
			<?php } ?>
			
			<?php endif; ?>
			
			<!-- grab comments on single pages -->
			<?php if(is_single ()) { ?>
				<div class="comments">
					<?php comments_template(); ?>
				</div>
			<?php } ?>
		</div><!--content-->
	
		<!-- grab footer -->
		<?php get_footer(); ?>
	
	</div><!--main-->
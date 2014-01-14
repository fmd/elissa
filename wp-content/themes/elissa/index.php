<?php get_header(); ?>
<div class="index-head">
	<h5>The collective musings of</h5>
	<h1>Belgian Waffler</h1>
</div>

		<?php $posts_cols = 3; ?>
		<?php $current_col = 0; ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php if ($current_col % $posts_cols == 0): ?>
					<div class="container row post-row">
				<?php endif; ?>

				<div class="col span_<?php echo 24 / $posts_cols; ?>">
					<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<div class="head">
							<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
						</div>
						<div class="body">
							<?php the_content(); ?>
						</div>
						<?php //include (TEMPLATEPATH . '/_/inc/meta.php' ); ?>

						<!--
							<div class="entry">
								<?php //the_content(); ?>
							</div>
						-->

					</article>
				</div>
				<?php if ($current_col % $posts_cols == $posts_cols-1): ?>
					</div>
				<?php endif; ?>
				<?php $current_col++; ?>
		<?php endwhile; ?>

	</div>

	<?php include (TEMPLATEPATH . '/_/inc/nav.php' ); ?>

	<?php else : ?>

		<h2>Not Found</h2>

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

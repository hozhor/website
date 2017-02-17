<?php get_header(); ?>


<div class="container-1200">
	<div class="onerow">
				<div id="AD" class="air12">
<?php timer_stop(1); ?>
				<?php echo get_num_queries(); ?>
					
					<?php echo get_posts_count_from_today(); ?>
				</div>
	</div>
	<div class="onerow">
				<div class="air10">
<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>
			<?php the_title(); ?> 
			<?php the_author(); ?>
			<?php the_time(); ?>        
		<?php endwhile; ?>
	<?php endif; ?> 
				</div>
				<div class="air2 last">col2</div>
	</div>


</div>


<?php get_footer(); ?>

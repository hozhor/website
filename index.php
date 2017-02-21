<?php get_header(); ?>


<div class="container-1200">
	<div class="onerow">
				<div id="AD" class="air12 bg_w">
				<?php include (TEMPLATEPATH . '/AD.php'); ?>
				</div>
	</div>
	<div class="onerow">
				<div class="air4 bg_w">

					<?php
    $cats = get_categories();
    foreach ( $cats as $cat ) {
    query_posts( 'showposts=10&cat=' . $cat->cat_ID );
?>
	<aside id="cat" class="widget bg_w">
    <h3><?php echo $cat->cat_name; ?></h3>
    <ul class="sitemap-list">
        <?php while ( have_posts() ) { the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php } wp_reset_query(); ?>
    </ul>
    </aside>
<?php } ?>

				</div>
				<div class="air8 last bg_w">









					<?php if(have_posts()) : ?>
							<?php while(have_posts()) : the_post(); ?>
					<article  id="post-<?php the_ID(); ?>" class="post ">
				
							<figure class="thumbnail"><a href="<?php the_permalink() ?>"><?php
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail();
}
?></a></figure>							
						<div class="centent-article">	
						</div>

						<div class="title-article">
							<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
						</div>
						<div class="tag-article container">
							<span class="label label-zan"><i class="icon-tags"></i> <?php the_time(n月d日); ?></span>
							<span class="label label-zan"><i class="icon-user"></i> <?php get_post_views($post -> ID); ?> views</span>
							
						</div>

					</article>

							<?php endwhile; ?>
						<?php endif; ?> 


</div>
				<div class="air6">

				</div>

	</div>


</div>


<?php get_footer(); ?>

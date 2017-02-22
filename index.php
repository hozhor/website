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

<header class="entry-header"><h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2> </header>

<div class="entry-content"> <span class="entry-meta"> <span class="date"><?php the_time(n月d日); ?>&nbsp;&nbsp;</span><span class="views"><i class="fa fa-eye"></i><?php get_post_views($post -> ID); ?></span><span class="comment">&nbsp;&nbsp;<a href="http://zmingcx.com/choose-new-window-to-open-the-link.html#comments" rel="external nofollow"><i class="fa fa-comment-o"></i> 19</a></span> </span><div class="clear"></div></div>


					</article>

							<?php endwhile; ?>
						<?php endif; ?> 


</div>
				<div class="air6">

				</div>

	</div>


</div>


<?php get_footer(); ?>

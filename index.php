<?php get_header(); ?>


<div class="container-1200">
	<div class="onerow">
				<div id="AD" class="white air12">
				<?php include (TEMPLATEPATH . '/AD.php'); ?>
				</div>
	</div>
	<div class="onerow">
				<div class="white air4">

					<?php
    $cats = get_categories();
    foreach ( $cats as $cat ) {
    query_posts( 'showposts=10&cat=' . $cat->cat_ID );
?>
	<aside id="cat" class="white">
    <h3><?php echo $cat->cat_name; ?></h3>
    <ul class="sitemap-list">
        <?php while ( have_posts() ) { the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php } wp_reset_query(); ?>
    </ul>
    </aside>
<?php } ?>

				</div>
				<div class="white air8 last">









					<?php if(have_posts()) : ?>
							<?php while(have_posts()) : the_post(); ?>
					<section id="post" class="white hidden-xs">
						<div class="centent-article">					
							<?php $thumb_img = has_post_thumbnail() ? get_the_post_thumbnail( $post->
							ID, array(730, 300), array('alt' => trim(strip_tags( $post->post_title )),'title'=> trim(strip_tags( $post->post_title ))) ) : get_post_img( 730, 300, 1);?>
							<figure class="thumbnail hidden-xs"><a href="<?php the_permalink() ?>"><?php echo $thumb_img;?></a></figure>							

						</div>

						<div class="title-article">
							<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
						</div>
						<div class="tag-article container">
							<span class="label label-zan"><i class="icon-tags"></i> <?php the_time(n月d日); ?></span>
							<span class="label label-zan"><i class="icon-user"></i> <?php get_post_views($post -> ID); ?> views</span>
							
						</div>

					</section>

							<?php endwhile; ?>
						<?php endif; ?> 


</div>
				<div class="air6">

				</div>

	</div>


</div>


<?php get_footer(); ?>

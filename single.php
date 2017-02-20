<?php get_header(); ?>


<div class="container-1200">
    <div class="onerow">
                <div id="AD" class="white air12">
<?php/* echo my_entry_published_link(); */







?>


<?php include (TEMPLATEPATH . '/AD.php'); ?>



<?php/* echo my_entry_published_link(); */











?>

                </div>
    </div>
    <div class="onerow">
             <div id="breadcrumb" class="white air12">
             <?php the_breadcrumb(); ?>
             </div>
                <div class="white air8">
                    <article>
<?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>                     
<header class="entry-header"><h1 class="entry-title"> <?php the_title(); ?> </h1> </header>

<div class="entry-content">
<div class="single-content">
 <?php the_content(); ?> 
<blockquote>提示信息
</blockquote>
</div>

<div class="page-links">   
</div>
<div class="s-weixin-one">
<div class="weimg-one">
 <img src="http://imgs.zmingcx.com/wp-content/uploads/2016/04/weixin.jpg" alt="weinxin">
 <div class="weixin-h">
 <strong>我的微信</strong>
 </div>
 <div class="weixin-h-w">分享交流WordPress经验与技巧，关注前端设计与网站制作。仅用于功能演示。
 </div>
 <div class="clear"></div>
 </div>
 </div>
 <div class="clear"></div>
 <div id="social">
<div class="social-main">
 <span class="like">
  <i class="fa fa-thumbs-up">      
  </i>赞 <i class="count"> 21</i>
  </span>
<div class="share-sd"></div>
<div class="clear"></div>
</div>
</div>
<div class="ad-pc ad-site">
<a href="http://zmingcx.com/begin.html" target="_blank">
<img src="http://imgs.zmingcx.com/wp-content/uploads/2016/11/beginb.png" alt="Begin主题购买">
</a>
</div>
</div>
           <footer class="single-footer">
           <ul class="single-meta">
           <li class="print">
           <a href="javascript:printme()" target="_self" title="打印"><i class="fa fa-print"></i></a>
           </li>
           <li class="comment"><a href="http://zmingcx.com/wordpress-code-highlight.html#comments" rel="external nofollow"><i class="fa fa-comment-o"></i> 247</a></li>
           <li class="views"><i class="fa fa-eye"></i> 78,960</li>
           <li class="r-hide"><a href="javascript:pr()" title="侧边栏"><i class="fa fa-caret-left"></i> <i class="fa fa-caret-right"></i></a></li></ul><ul id="fontsize"><li>A+</li></ul><div class="single-cat-tag"><div class="single-cat">所属分类：<a href="http://zmingcx.com/category/share/wordpress/" rel="category tag">WordPress</a></div></div> </footer>                 
        <?php endwhile; ?>
    <?php endif; ?>
    </article> 
                </div>
              
                <div class="white air4 last"><?php include (TEMPLATEPATH . '/archive-time.php'); ?></div>

                 
    </div>


</div>


<?php get_footer(); ?>

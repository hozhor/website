<?php 
//添加导航
    register_nav_menus(array(
      'left-menu' => '左边栏菜单',
      'top-menu' => '顶部菜单',
    )); 
 
 ?>


<?php  
//文章时间轴 
add_shortcode( 'entry-link-published', 'my_entry_published_link' );   
function my_entry_published_link() {   
    /* 获取当前日志的年,月,日. */  
    $year = get_the_time( 'Y' );   
    $month = get_the_time( 'm' );   
    $day = get_the_time( 'd' );   
    $out = '';   
    /* 添加链接到年存档. */  
    $out .= '<a href="' . get_year_link( $year ) . '" title="查看所有' . esc_attr( $year ) . '年文章">' . $year . '年</a>';   
    /* 添加链接到月存档. */  
    $out .= '<a href="' . get_month_link( $year, $month ) . '" title="查看所有' . esc_attr( get_the_time( 'Y年m月' ) ) . '文章">' . get_the_time( 'm月' ) . '</a>';   
    /* 添加链接到日存档. */  
    $out .= '<a href="' . get_day_link( $year, $month, $day ) . '" title="查看所有' . esc_attr( get_the_time( 'Y年m月d日' ) ) . '文章">' . $day . '日</a>';   
    return $out;   
}   
?>  

 

 <?php 
// 获得文章导引图像
function get_post_img($width="100",$height="100",$sizeTag=2) {   
    global $post, $posts;   
    $first_img = '';   
       
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
      
    $first_img = '<img src="'. $matches[1][0] .'" width="'.$width.'" height="'.$height.'" alt="'.$post->post_title .'"/>';  
      
    return false;
      
} 



//后台文章导引图像管理
if (function_exists('add_theme_support') )
 add_theme_support('post-thumbnails');
add_image_size('large', 730, 300, true);
add_image_size('thumbnail', 140, 100, true);
add_image_size('medium', 110, 110,true);




//文章阅览次数
function get_post_views ($post_id) {   
  
    $count_key = 'views';   
    $count = get_post_meta($post_id, $count_key, true);   
  
    if ($count == '') {   
        delete_post_meta($post_id, $count_key);   
        add_post_meta($post_id, $count_key, '0');   
        $count = '0';   
    }   
  
    echo number_format_i18n($count);   
  
}   
  
function set_post_views () {   
  
    global $post;   
  
    $post_id = $post -> ID;   
    $count_key = 'views';   
    $count = get_post_meta($post_id, $count_key, true);   
  
    if (is_single() || is_page()) {   
  
        if ($count == '') {   
            delete_post_meta($post_id, $count_key);   
            add_post_meta($post_id, $count_key, '0');   
        } else {   
            update_post_meta($post_id, $count_key, $count + 1);   
        }   
    }    
}   
add_action('get_header', 'set_post_views');  






  ?>



  <?php 
  //面包屑
function the_breadcrumb() {
                echo '<ul id="crumbs">';
        if (!is_home()) {
                echo '<li><a href="';
                echo get_option('home');
                echo '"><i class="fa fa-home"></i>';
                echo 'Home';
                echo "</a></li>";
                if (is_category() || is_single()) {
                        echo '<li>';
                        echo '<i class="fa fa-angle-right"></i>';
                        the_category(' </li><li> ');
                        if (is_single()) {
                                echo "</li><li>";
                                echo '<i class="fa fa-angle-right"></i>';
                                the_title();
                                echo '</li>';
                        }
                } elseif (is_page()) {
                        echo '<li>';
                        echo '<i class="fa fa-angle-right"></i>';
                        echo the_title();
                        echo '</li>';
                }
        }
        elseif (is_tag()) {single_tag_title();}
        elseif (is_day()) { echo '<li><i class="fa fa-angle-right"></i>';echo"Archive for "; the_time('F jS, Y'); echo'</li>';}
        elseif (is_month()) {echo '<li><i class="fa fa-angle-right"></i>';echo"Archive for "; the_time('F, Y'); echo'</li>';}
        elseif (is_year()) {echo '<li><i class="fa fa-angle-right"></i>';echo"Archive for "; the_time('Y'); echo'</li>';}
        elseif (is_author()) {echo '<li><i class="fa fa-angle-right"></i>';echo"Author Archive"; echo'</li>';}
        elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo '<li><i class="fa fa-angle-right"></i>';echo"Blog Archives"; echo'</li>';}
        elseif (is_search()) {echo '<li><i class="fa fa-angle-right"></i>';echo"Search Results"; echo'</li>';}
        echo '</ul>';
}




   ?>



   <?php 
   //禁止代码标点转换
remove_filter('the_content', 'wptexturize');
 ?>
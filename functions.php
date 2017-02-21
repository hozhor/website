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
//使WordPress支持post thumbnail
 
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}

the_post_thumbnail();                  // 无参数，默认调用Thumbnail 
the_post_thumbnail('thumbnail');       // Thumbnail (默认尺寸 150px x 150px max)
the_post_thumbnail('medium');          // Medium resolution (default 300px x 300px max)
the_post_thumbnail('large');           // Large resolution (default 640px x 640px max)
the_post_thumbnail('full');            // Full resolution (original size uploaded)
  
the_post_thumbnail( array(100,100) );  // Other resolutions


//自动将文章第一个图设为WordPress特色图像
function wpforce_featured() {
    global $post;
    $already_has_thumb = has_post_thumbnail($post->ID);
    if (!$already_has_thumb)  {
        $attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );
        if ($attached_image) {
            foreach ($attached_image as $attachment_id => $attachment) {
                set_post_thumbnail($post->ID, $attachment_id);
            }
        } else {
            set_post_thumbnail($post->ID, '50');
        }
    }
}  //end function
add_action('the_post', 'wpforce_featured');
add_action('save_post', 'wpforce_featured');
add_action('draft_to_publish', 'wpforce_featured');
add_action('new_to_publish', 'wpforce_featured');
add_action('pending_to_publish', 'wpforce_featured');
add_action('future_to_publish', 'wpforce_featured');
?>


 <?php 

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
/////////////////////////////////////////////////////////////////////////////
//点赞  
add_action('wp_ajax_nopriv_bigfa_like', 'bigfa_like');
add_action('wp_ajax_bigfa_like', 'bigfa_like');
function bigfa_like(){
    global $wpdb,$post;
    $id = $_POST["um_id"];
    $action = $_POST["um_action"];
    if ( $action == 'ding'){
		$bigfa_raters = get_post_meta($id,'bigfa_ding',true);
		$expire = time() + 99999999;
		$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; // make cookies work with localhost
		setcookie('bigfa_ding_'.$id,$id,$expire,'/',$domain,false);
		if (!$bigfa_raters || !is_numeric($bigfa_raters)) {
			update_post_meta($id, 'bigfa_ding', 1);
		}else {
			update_post_meta($id, 'bigfa_ding', ($bigfa_raters + 1));
		}   
		echo get_post_meta($id,'bigfa_ding',true);    
    }     
    die;
}
/////////////////////////////////////////////////////////////////////////////
 ?>


   <?php 
   //禁止代码标点转换
remove_filter('the_content', 'wptexturize');
 ?>
<?php 
//添加导航
    register_nav_menus(array(
      'left-menu' => '左边栏菜单',
      'top-menu' => '顶部菜单',
    )); 
 


/**
 * [get_posts_count_from_today 获取今天内发布的文章数量]
 * https://www.wpdaxue.com/count-posts-or-custom-post-types-from-last-24-hours-or-from-today.html
 * @param  string $post_type [参数默认为 post 这个类型，你可以填写其他文章类型]
 */
function get_posts_count_from_today($post_type ='post') {
    global $wpdb;
    $numposts = $wpdb->get_var(
        $wpdb->prepare(
            "SELECT COUNT(ID) ".
            "FROM {$wpdb->posts} ".
            "WHERE post_status='publish' ".
                "AND post_type= %s ".
                "AND DATE_FORMAT(post_date, '%Y-%m-%d') = %s",
            $post_type, date('Y-m-d', time())
        )
    );
    return $numposts;
}

 ?>


 
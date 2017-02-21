<!DOCTYPE html>
<html >
<head>
	<meta  charset=UTF-8">
	<title> My resume</title>
	<link type="text/css" rel="stylesheet" href=" <?php bloginfo('template_url');?>/style.css " />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/highlight.css" />
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-3.1.0.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/myjs.js"></script>
	<?php wp_head(); ?>
</head>
<body>
<header id="header" class="a_c full">
		<div id="logo" class="full">
		<div class="logosvg">
		<a href="http://localhost/wordpress/">
		<img src="<?php
		bloginfo('template_directory');
		?>/logo.svg"/>
		</a>
		</div>
		<div class="logo-tag">
		<a href="http://localhost/wordpress/">
		<img src="<?php
		bloginfo('template_directory');
		?>/images/logo.jpg" alt="<?php bloginfo(
		‘name’ ); ?>" width="160"
		height="160"/>
		</a>
		</div>
		</div>
		<div class="top-navber-tag full">
		<nav id="navber" class="a_c">
		<div class="navber-buttn"> 
		<i class="fa fa-reorder"></i>
		</div>
				<?php 
				  if(function_exists('wp_nav_menu')) {
				      wp_nav_menu(array( 'theme_location' => 'top-menu','container_id'=>'menu-top','container_class' => 'menu') ); 
				  }
				?>			
		</nav>
		</div>

</header>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title><?php bloginfo('name');?><?php wp_title(); ?></title>
<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet" type="text/css" />
<?php if ( has_post_thumbnail() ): ?>
	<?php $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>
	<style>
		header{
			background-color: #444;
    		background:url(<?php echo $full_image_url[0]; ?>); 
			background-position: center center;
    		background-repeat: no-repeat;
    		background-size: cover;
		}
	</style>
<?php endif; ?>
</head>
<body>
<header>
	<div class="container">
    	<div class="ctl ctl1">
			<div class="title">
				<h1><?php the_title(); ?></h1>
				<div id="back"><?php the_time('Y-m-d G:i'); ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php bloginfo('url'); ?>">回首页</a></div>
    		</div>
    	</div>
    </div>
</header>

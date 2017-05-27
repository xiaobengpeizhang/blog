<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php bloginfo('name');?><?php wp_title(); ?></title>
<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="wrapper">
<div id="header">
	<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1><?php bloginfo('description'); ?>
</div>
<div id="container">
	<?php if(have_posts()): ?><?php while(have_posts()):the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
    		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><?php the_title(); ?></a></h2>
    		<div class="entry">
				<?php the_excerpt(); ?>              
			</div>
   		</div>
    <?php endwhile; ?>
    	<div class="nav">
        	<?php posts_nav_link(); ?>
        </div>
    <?php else : ?>
    	<div class="post">
        	<h2><?php _e('暂时还没有志'); ?></h2>
    <?php endif; ?>
</div>
<div class="sidebar">
	<ul>
    	<?php wp_list_pages('title_li=<h2>Pages</h2>'); ?>
    	<li><h2><?php _e('Categories'); ?></h2></li>
        	<ul><?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?></ul>
    </ul>
</div>
</div>
</body>
</html>

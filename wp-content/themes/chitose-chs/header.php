<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<title><?php if(is_home()){bloginfo('title'); echo (" | "); bloginfo('description');} elseif(is_category()){single_cat_title(); echo (" | ");bloginfo("title");} elseif(is_single() || is_page()){single_post_title();echo (" | ");bloginfo("title");} elseif(is_404()){echo ("页面未找到!");echo (" | ");bloginfo("title");} else {wp_title(”,true);} ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/all.js"></script>
	<?php if (get_option('chitose_hidden-pic')) : ?>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.lazyload.js"></script>
	<?php else : endif; ?>
	<?php wp_head(); ?>
</head>
<body>
	<div id="wrapp">
		<div id="navbar" class="main">
			<a id="tbToggle" class="tbOpen" href="javascript:openToolbar()"></a>
			<div id="logo"><a class="logo" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?> &raquo; 首页"></a></div>
			<div id="menu" class="main">
			<ul class="basicMenu">
				<li><a href="<?php bloginfo("url"); ?>" <?php if(is_single() or is_home()) : ?>class="current"<?php endif; ?>>首　页</a></li>
			</ul>
			<?php
				wp_nav_menu(array(
					'theme_location'    =>'main-menu'
				));
			?>
				<div class="search-box">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
		<div id="navbar" class="toolbar">
			<a id="tbToggle" class="tbClose" href="javascript:closeToolbar()"></a>
			<div id="logo">
				<a class="logo" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?> &raquo; 首頁"></a>
			</div>
			<span class="description"><?php bloginfo('description'); ?></span>
			<div id="menu">
				<a id="btn" class="rss" href="<?php bloginfo('rss2_url'); ?>">订阅本站</a>
				<h2><span style="color: #F28500;">社</span>交网站 / SNS</h2>
				<?php if (get_option('chitose_facebook-stat')) : ?><a id="btn" class="facebook" target="_blank" href="<?php echo get_option('chitose_facebook'); ?>">Facebook</a><?php endif; ?>
				<?php if (get_option('chitose_twitter-stat')) : ?><a id="btn" class="twitter" target="_blank" href="<?php echo get_option('chitose_twitter'); ?>">Twitter</a><?php endif; ?>
				<?php if (get_option('chitose_gplus-stat')) : ?><a id="btn" class="gplus" target="_blank" href="<?php echo get_option('chitose_gplus'); ?>">Google+</a><?php endif; ?>
				<?php if (get_option('chitose_weibo-stat')) : ?><a id="btn" class="sinaweibo" target="_blank" href="<?php echo get_option('chitose_weibo'); ?>">新浪微博</a><?php endif; ?>
			</div>
		</div>
		<div id="content" <?php if (get_option('chitose_banner')) : ?>style="border-top: 1px solid #F3F3F3; "<?php endif; ?>>
		<?php if (get_option('chitose_banner')) : else: ?>
		<div id="banner">
			<?php if (get_option('chitose_banner-close')) : else : ?>
			<span class="close"><a href="javascript:closeBannerAnimation()"></a></span>
			<?php endif; ?>
			<div id="banner-wrapp">
				<?php if (get_option('chitose_banner-none-link')) : else : ?>
				<ul>
					<li class="btn"><a href="<?php echo get_option('chitose_lnk-1-rel') ?>"><span class="title"><?php echo get_option('chitose_lnk-1-first') ?></span><span class="sec-title">- <?php echo get_option('chitose_lnk-1-second') ?> -</span></a></li>
					<li class="btn"><a href="<?php echo get_option('chitose_lnk-2-rel') ?>"><span class="title"><?php echo get_option('chitose_lnk-2-first') ?></span><span class="sec-title">- <?php echo get_option('chitose_lnk-2-second') ?> -</span></a></li>
					<li class="btn"><a href="<?php echo get_option('chitose_lnk-3-rel') ?>"><span class="title"><?php echo get_option('chitose_lnk-3-first') ?></span><span class="sec-title">- <?php echo get_option('chitose_lnk-3-second') ?> -</span></a></li>
				</ul>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
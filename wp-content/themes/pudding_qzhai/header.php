<!--主题作者：admin@qzhai.top -->
<!doctype html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<?php include('include/seo.php'); ?>
	<?php wp_head();?>
	<?php of_get('tclr') ? $q_css = of_get('tclr') :$q_css = 'cheng';?>
	<link rel='stylesheet' href='<?php echo get_template_directory_uri();?>/css/<?php echo $q_css;?>.css?ver=4.4' type='text/css' />
</head>
	<body>
		<?php if(of_get('baidu')){include_once("baidu_js_push.php");}?>
		<div id="hd" class="am-g am-g-fixed">
		<h1 id="logo">
		<a href="<?php echo get_option('home'); ?>" class="logo uk-float-left">
			<?php
			if(of_get('logois')== 1 or of_get('logois')== 3 ){
				echo '<img src="'.of_get('logoimg').'" />';
			}
			if(of_get('logois')== 2 or of_get('logois')== 3 ){
				echo bloginfo('name');
			}
			echo '</a>';
			if(of_get('logospan') && of_get('head') != 'top'){
				echo '<span id="subhead" class="am-hide-sm-down"> - ';
				bloginfo('description');
				echo '</span>';
			} ?>
	</h1>
	<div class="topbar">
			<button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-show-sm-only" data-am-collapse="{target: '#nav'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>
			<div id="nav" class="am-collapse am-topbar-collapse">
				<?php
			    if(has_nav_menu('main-menu')) {
				    wp_nav_menu(
			    		array(
			    			'theme_location'=>'main-menu',
			    			'menu_id'=>'nav-top',
			    			'menu_class'=>'am-nav am-nav-pills am-topbar-nav',
			    			'container'=>'ul',
			    			'walker' => new qzhai_menu(),
			    			'depth'=>'2',
			    			));

				    }else{
				    	echo '<ul class="uk-navbar-nav"><li><a href="#">请在后台主题 - 菜单中 创建一个主菜单并勾选导航菜单</a></li></ul>';
				    }
			    ?>
			</div>
		</div><!--nav-->
	</div>
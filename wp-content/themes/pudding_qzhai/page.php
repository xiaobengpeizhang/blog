<?php get_header(); ?>
	<div id="main" class="am-g am-g-fixed am-g-collapse">
		<div id="main-left" class="am-u-sm-12 am-u-md-9 am-u-lg-8">
			<div id="breadcrumb">
				<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
			</div>
			<!--左-->
			<div id="single" class="am-article">
			  <div class="am-article-hd">
			  	<h2><?php the_title(); ?></h2>
			  </div>
			    
			  <div class="am-article-bd">
			    <?php 
					while ( have_posts() ) : the_post();
						the_content();
					endwhile;
					?>
			  </div>
			</div>
			<?php if ( comments_open() || get_comments_number() ) {?>
			<div id="comments">
				<?php comments_template(); ?>
			</div>
			<?php }?>
		</div>
		<div id="main-right" class="am-u-sm-0 am-u-md-3 am-u-lg-4 am-hide-sm-down">
			<!--右-->
			<?php include('sidebar_page.php'); ?>
		</div>
	</div>
<?php get_footer(); ?>

<?php get_header(); ?>
	<div id="main" class="am-g am-g-fixed am-g-collapse">
		<div id="main-left" class="am-u-sm-12 am-u-md-9 am-u-lg-8">
			<div id="breadcrumb">
				<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
			</div>
			<!--左-->
			<div id="single" class="am-article">
				<div class="am-article-hd">
				<h1 class="am-article-title"><?php the_title(); ?></h1>		
					<ol class="am-article-meta am-breadcrumb am-breadcrumb-slash">
					  <li class="am-active"><?php the_time('Y年n月j日') ?></li>
					  <?php
						$category = get_the_category();
						foreach ($category as $value) {
							echo '<li><a href="'.get_category_link($value->cat_ID).'">'.$value->cat_name.'</a></li>';
						}
						?>
						
						<li><?php comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭'); ?><?php edit_post_link('编辑', ' &bull; ', ''); ?></li>
					</ol>

				</div>
				<div class="am-article-bd">
				<?php 
					while ( have_posts() ) : the_post();
						the_content();
					endwhile;
					?>
				</div>
				<small><?php the_tags('<i class="am-icon-bookmark"></i> ',',',''); ?></small>				
			</div>
			<?php include('sidebar_single_bottom.php'); ?>
			<?php if ( comments_open() || get_comments_number() ) {?>
				<div id="comments">
					<?php comments_template(); ?>
				</div>
			<?php }?>
		</div>
		<div id="main-right" class="am-u-sm-0 am-u-md-3 am-u-lg-4 am-hide-sm-down">
			<!--右-->
			<?php include('sidebar_single.php'); ?>
		</div>
	</div>
<?php get_footer(); ?>

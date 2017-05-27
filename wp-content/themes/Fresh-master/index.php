<?php get_header(); ?>
<section>
	<div class="container">
		<div class="ctl ctl1">
			<?php if(have_posts()): ?><?php while(have_posts()):the_post(); ?>
				<div class="post" id="post-<?php the_ID(); ?>">
    				<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><?php the_title(); ?></a></h3>
    				<div class="entry"><?php the_content(); ?></div>
   				</div>
    		<?php endwhile; ?>
    			<div class="nav"><?php posts_nav_link(); ?></div>
    		<?php else : ?>
    			<div class="post">
        			<h2><?php _e('暂时还没有日志'); ?></h2>
       			</div>
    		<?php endif; ?>
		</div>
    </div>
</section>
<div style="clear:both;"></div>
<?php get_footer(); ?>

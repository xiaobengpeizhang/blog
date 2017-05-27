<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<span class="datetime"><?php the_time('d / m / Y') ?></span>
<div id="post-entry">
	<?php echo get_avatar(get_the_author_email(),42); ?>
	<div id="wrapp">
		<div class="content-wrapp">
		<?php the_content('',FALSE,''); ?>
		</div>
	</div>
</div>
<div id="information">
	<span class="tags"></span>
	<?php the_title('<span class="title"><a href="'.esc_url(get_permalink()).'" rel="bookmark">','</a></span>'); ?>
	<div class="tag-wrapp">
	<?php if(has_tag()) : ?>
	<span style="float: left; margin-right: 10px; ">标签:</span>
	<?php the_tags('<span class="tag-links">', '', '</span>'); ?>
	<?php else : ?>
	<span style="float: left; ">无标签信息</span>
	<?php endif; ?>
	<span style="float: left; margin: 0 10px 0 15px; padding-left: 15px; border-left: 1px solid #C2C2C2; ">分类:</span>
	<?php the_category(); ?>
	<span style="float: left; margin: 0 10px 0 15px; padding-left: 15px; border-left: 1px solid #C2C2C2; ">评论:</span>
	<?php comments_popup_link( __( '0 条', 'chitose' ), __( '1 条', 'chitose' ), __( '% 条', 'chitose' ) ); ?>
	</div>
</div>
</div>
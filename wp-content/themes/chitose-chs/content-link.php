<div id="post-<?php the_ID(); ?>" class="page links">
<div id="post-entry">
	<?php echo get_avatar(get_the_author_email(),42); ?>
	<div id="wrapp">
		<div id="title">
			<?php the_title('<span class="title">','</span>'); ?>
			<div id="info">
				<span class="author"><?php the_author_link() ?></span>
				<span class="date"><?php the_time('d / m / Y') ?></span>
				<span class="category"><?php the_category(); ?></span>
			</div>
		</div>
		<div class="content-wrapp single">
			<ul>
			<?php if (function_exists(blogroll)) blogroll();?>
			</ul>
		</div>
	</div>
</div>
<div id="information">
	<span class="tags"></a></span>
	<?php if(has_tag()) : ?>
	<?php the_tags('<span class="tag-links">', ' , ', '</span>'); ?>
	<?php else : ?>
	<span style="float: left; ">无标签信息</span>
	<?php endif; ?>
	<div class="right">
		<?php comments_popup_link( __( '0', 'chitose' ), __( '1', 'chitose' ), __( '%', 'chitose' ) ); ?>
	</div>
</div>
</div>
<div id="comment">
	<?php comments_template(); ?>
</div>
<?php get_header(); ?>

	<?php
	if (have_posts()):
		while (have_posts()):the_post();
			get_template_part('content');
		endwhile;
	else: ?>
	<div class="page">
		<div id="post-entry" style="padding-top: 15px; ">Error 404: 找不到您要搜索的内容，请更改关键词后重新尝试搜索</div>
	</div>
	<?php endif;
	?>
<?php get_footer(); ?>
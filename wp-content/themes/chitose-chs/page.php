<?php get_header(); ?>

	<?php
	if (have_posts()):
		while (have_posts()):the_post();
			get_template_part('content','post');
		endwhile;
	else:
		
	endif;
	?>
<?php get_footer(); ?>
<?php
/*
Template Name: 友情链接
*/
get_header();
?>

	<?php
	if (have_posts()):
		while (have_posts()):the_post();
			get_template_part('content','link');
		endwhile;
	else:
		
	endif;
	?>
<?php get_footer(); ?>
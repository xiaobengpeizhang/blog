<?php get_header(); ?>
	<div id="main" class="am-g am-g-fixed am-g-collapse">
		<div id="main-left" class="am-u-sm-12 am-u-md-9 am-u-lg-8">
			<!--左-->
			<?php
		    	echo '<article id="single" class="am-article">';
		    		echo '<p class="am-article-lead">404了...</p>';
		    	echo '</article>';
			?>
	    	<?php par_pagenavi(); ?>
		</div>
		<div id="main-right" class="am-u-sm-0 am-u-md-3 am-u-lg-4 am-hide-sm-down">
			<!--右-->
			<?php get_sidebar(); ?>
		</div>

	</div>
<?php get_footer(); ?>

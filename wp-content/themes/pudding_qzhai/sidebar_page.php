<form class="am-form am-form-inline" id="searchform" method="get" action="<?php bloginfo('wpurl'); ?>">
	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="搜索" />
</form>
<ul id="sidebar" class="am-form">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('widget_home') ) : ?><?php endif; ?>
	<div data-am-sticky>
		<ul>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('widget_page_sticky') ) : ?><?php endif; ?>
	</ul>
	</div>
</div>
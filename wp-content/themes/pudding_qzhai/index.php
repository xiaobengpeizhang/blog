<?php get_header(); ?>
	<div id="main" class="am-g am-g-fixed am-g-collapse">
		<div id="main-left" class="am-u-sm-12 am-u-md-9 am-u-lg-8">
			<!--左-->
			<?php
				if (have_posts()) {
		        while (have_posts()) {
		            the_post();
		            echo '<div class="list-article">';
		            if (has_post_thumbnail()) {
		                echo '<a href="';
		                	the_permalink();
		                echo '">';
		                	the_post_thumbnail(array(640, 115, ' uk-overlay-scale'));
		                echo '</a>';
		            } else {
		                if ($images = get_children(array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image'))) {
		                    echo '<a href="';
		                    	the_permalink();
		                    echo '">';
		                    $image = current($images);
		                    $image = wp_get_attachment_image_src($image->ID, array(640, 115));
		                    echo '<img class="uk-overlay-scale" src="' . $image[0] . '"  />';
		                    echo '</a>';
		                }
		            }
		            echo '<h2><a href="';
		            	the_permalink();
		            echo '" >';
		            	the_title();
		            echo '</a></h2>';
		            echo '<p>';
		            	$content = get_the_content();
		            	$trimmed_content = wp_trim_words($content, 120, '...');
		            	echo $trimmed_content;
		            echo '</p>';
		            echo '<div class="am-cf">
								<div class="am-fl">
									<time>
										<i class="am-icon-calendar-check-o am-icon-fw"></i>';
		            						the_time('Y年n月j日');
		            echo ' · <i class="am-icon-ellipsis-v am-icon-fw"></i>';
		            $category = get_the_category();
		            foreach ($category as $value) {
		                echo '<a href="' . get_category_link($value->cat_ID) . '">' . $value->cat_name . '</a> ';
		            }
		            echo '</time></div>
		            		<div class="am-fr">
		            		 	<a href="';
		            				the_permalink();
		            echo '" class="am-btn btn-link am-btn-xs"> 阅读全文</a></div>';
		            echo '</div>';
		            echo '</div>';
		        }
		    } else {
		    	echo '<article id="single" class="am-article">';
		    		echo '<p class="am-article-lead">没发现什么...</p>';
		    	echo '</article>';
		    }
			?>
	    	<?php par_pagenavi(); ?>
		</div>
		<div id="main-right" class=" am-u-md-3 am-u-lg-4 am-hide-sm-down">
			<!--右-->
			<?php get_sidebar(); ?>
		</div>

	</div>
<?php get_footer(); ?>

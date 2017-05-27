<?php
    if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('清不要直接打开评论页！');
    if ( post_password_required() ) { ?>
    	<div class="uk-alert" data-uk-alert>
    		<a href="" class="uk-alert-close uk-close"></a>
			<p class="nocomments"><?php _e('必须输入密码，才能查看评论！'); ?></p>
		</div>
	<?php
		return;
	}

    if (!empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) { 
        // if there's a password
        // and it doesn't match the cookie
    ?>
    	<div class="uk-alert" data-uk-alert>
    		<a href="" class="uk-alert-close uk-close"></a>
        	<p>请输入密码再查看评论内容.</p>
        </div>

    <?php 
        } else if ( !comments_open() ) {
    ?>
  		<div class="am-alert">
        	<p>评论功能已经关闭!</p>
        </div>

    <?php 
        } else if ( !have_comments() ) { 
    ?>
    	<div class="am-alert">
        	<p>还没有任何评论，你来说两句吧</p>
    	</div>
 
    <?php 
        } else {
            echo '<ul class="am-comments-list am-comments-list-flip">';
                wp_list_comments('type=comment&callback=aurelius_comment');
            echo '</ul>';
	        echo '<ul class="am-pagination">';
			echo '<li class="am-pagination-prev">';
			     previous_comments_link();
			echo '</li>';
			echo '<li class="am-pagination-next">';
			     next_comments_link();
			echo '</li>';
			echo '</ul>';
            ?>
            
            <?php

        }
    ?>
	<?php 
    if ( !comments_open() ) :
    elseif ( get_option('comment_registration') && !is_user_logged_in() ) : 
?>
<div class="am-alert">
	<p>你必须 <a href="<?php echo wp_login_url( get_permalink() ); ?>">登录</a> 才能发表评论.</p>
</div>
<?php else  : ?>
	<div id="comment_form" class="am-form">
    <?php comment_form(); ?>
    </div>
</form>
<?php endif; ?>
	<!-- Comment Form -->

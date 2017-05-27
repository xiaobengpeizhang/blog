<?php if (post_password_required()) return; ?>
<div id="comments-list">
	<?php if($comments): ?>
	<ol class="comment-list">
		<?php wp_list_comments(array('callback'=>'tsin_comment','style'=>'ol')); ?>
	</ol>
	<?php endif; ?>
</div>
<?php if (get_comments_number()==0) : ?>
<div id="respond-frame" style="width: 718px; ">
<?php else : ?>
<div id="respond-frame">
<?php 
	endif;
	$comments_args = array(

	'fields'=> array(
	'author' =>
		'<div id="black-wrapp"><div class="login"><span class="title">用户信息<a class="close" href="javascript:closeLoginWindow()"></a></span><p class="comment-form-author"><label for="author">' .
		'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		'" size="30"' . $aria_req . ' /></p>',

	  'email' =>
		'<p class="comment-form-email"><label for="email">' .
		'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		'" size="30"' . $aria_req . ' /></p>',

	  'url' =>
		'<p class="comment-form-url"><label for="url">' .
		'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
		'" size="30" /></p><input class="submit" type="button" value="确定" onclick="closeLoginCheck()"/></div></div>',
	),


	'comment_notes_before' =>'',
	'comment_notes_after' => '',
	'label_submit'=>'',

	 );
	 
	comment_form($comments_args); 

?>
<div id="control">
	<span class="dot"></span>
	<span id="control-f" class="control-text"><span class="label text">文字</span></span>
	<a id="control-f" class="control-pic" href="javascript:addPic()"><span class="label">图片</span></a>
	<a id="control-f" class="control-link" href="javascript:addWebUrl()"><span class="label">链接</span></a>
<?php if (!is_user_logged_in() && !empty($comment_author)) :  
	$email = esc_attr($comment_author_email);
?>
	<div class="author" onclick="showLoginWindow()"><?php echo get_avatar($email,35); ?></div>
<?php
	elseif (is_user_logged_in()) : 
	else : 
?>
	<?php if (get_comments_number()==0) : ?>
	<label class="notice" style="margin: -75px 0 0 148px; ">#若要发表评论，请先 <a href="javascript:showLoginWindow()">登录</a></label>
	<?php else : ?>
	<label class="notice">#若要发表评论，请先 <a href="javascript:showLoginWindow()">登录</a></label>
	<?php endif; ?>
	<script type="text/javascript">window.onload = function() {textAreaDisable();}</script>
<?php
	endif;
?>
</div>
</div>
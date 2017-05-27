<?php
//註冊選單
if( function_exists('register_nav_menus') ){
    register_nav_menus(
        array(
            'main-menu' => '导航菜单',
        )
    );
}
/*分頁*/
function par_pagenavi($range = 10){
	global $paged, $wp_query;
	$range = 4;
	if (!$max_page) {$max_page = $wp_query->max_num_pages;}
	if($max_page > 1){if(!$paged){$paged = 1;}
	if($paged != 1){echo "<a href='" . get_pagenum_link(1) . "' class='extend'
	title='跳转到首页'>&laquo;</a>";}
	if($max_page > $range){
	if($paged < $range){for($i = 1; $i <= ($range + 1); $i++)
	{echo "<a href='" . get_pagenum_link($i) ."'";
	if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	elseif($paged >= ($max_page - ceil(($range/2)))){
	for($i = $max_page - $range; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
	if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
	for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++)
	{echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}
	else{for($i = 1; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
	if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	if($paged != $max_page){echo "<a href='" . get_pagenum_link($max_page) . "' class='extend'
	title='跳转到末页'>&raquo;</a>";}}
}
//評論
function tsin_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :TSiN
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'TSiN' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(编辑)', 'TSiN' ), '<span class="edit-link">', '</span>' ); ?></p>
	</li>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>" >
		<div id="comments-only">
		<div id="comments-left"><?php echo get_avatar($comment,40); ?></div>
		<div id="comments-right">
			<span class="dot"></span>
			<span id="comments-vcard">
				<span class="left">
					<label class="author"><?php echo get_comment_author_link(); ?></label>
				</span>
				<span class="right">
					<label class="date"><?php comment_date('d / m / Y'); ?></label>
					<label class="reply"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '回复', 'TSiN' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></label>
				</span>
			</span>
			<div class="comment-post-wrapp">
				<?php echo substr(apply_filters('comment_text', $comment -> comment_content), 0, -5) ?>
			</div>
		</div>
		</div>
	<?php
		break;
	endswitch; // end comment_type check
}
//主題設定
add_action('admin_menu', 'chitose_page');
function chitose_page (){
	if ( count($_POST) > 0 && isset($_POST['chitose_settings']) ){
		$options = array ('banner','weibo','weibo-stat','twitter','twitter-stat','facebook','facebook-stat','gplus','gplus-stat','banner-close','banner-none-link','lnk-1-first','lnk-2-first','lnk-3-first','lnk-1-second','lnk-2-second','lnk-3-second','lnk-1-rel','lnk-2-rel','lnk-3-rel','hidden-pic','blogroll');
		foreach ( $options as $opt ){
			delete_option ( 'chitose_'.$opt, $_POST[$opt] );
			add_option ( 'chitose_'.$opt, $_POST[$opt] );	
		}
	}
	add_theme_page(__('模板设置'), __('模板设置'), 'edit_themes', basename(__FILE__), 'chitose_settings');
}
function chitose_settings(){?>

<style>
	#wrap #top a {margin-right: 10px; padding: 5px 8px; background-color: #E0E0E0; color: #2EA2CC; text-decoration: none; }
	#wrap #top a:hover {background-color: #2EA2CC; color: #FFF; }
	#wrap #top a.current {background-color: #2EA2CC; color: #FFF; }
	#wrap #top {padding: 20px 0; }
	#wrap #bottom #sns-set, #wrap #bottom #banner-set, #wrap #bottom #links-set {display: none; }
</style>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
<script type="text/javascript">
	function showGenSet() {
		$("#sns-set-rel, #banner-set-rel, #links-set-rel").removeClass("current");
		$("#gen-set-rel").addClass("current");
		$("#sns-set, #banner-set, #links-set").css({'display':'none'});
		$("#gen-set").css({'display':'block'});
	};
	function showSnsSet() {
		$("#gen-set-rel, #banner-set-rel, #links-set-rel").removeClass("current");
		$("#sns-set-rel").addClass("current");
		$("#gen-set, #banner-set, #links-set").css({'display':'none'});
		$("#sns-set").css({'display':'block'});
	};
	function showBannerSet() {
		$("#gen-set-rel, #sns-set-rel, #links-set-rel").removeClass("current");
		$("#banner-set-rel").addClass("current");
		$("#gen-set, #sns-set, #links-set").css({'display':'none'});
		$("#banner-set").css({'display':'block'});
	};
	function showLinksSet() {
		$("#gen-set-rel, #sns-set-rel, #banner-set-rel").removeClass("current");
		$("#links-set-rel").addClass("current");
		$("#gen-set, #sns-set, #banner-set").css({'display':'none'});
		$("#links-set").css({'display':'block'});
	};
</script>
<div id="wrap">
	<div id="top">
		<a href="javascript:showGenSet()" id="gen-set-rel" class="current">基本设置</a>
		<a href="javascript:showSnsSet()" id="sns-set-rel">社交网站链接</a>
		<a href="javascript:showBannerSet()" id="banner-set-rel">Banner</a>
		<a href="javascript:showLinksSet()" id="links-set-rel">友情链接</a>
	</div>
	<div id="bottom">
	<form method="post" action="">
		<div id="gen-set">
			<h2>基本设置</h2>
			<fieldset class="block">
				<p><input type="checkbox" name="banner" id="banner" value="on" <?php if (get_option('chitose_banner')) : ?>checked="checked"<?php endif; ?>>不显示Banner</input></p>
				<p><input type="checkbox" name="hidden-pic" id="hidden-pic" value="on" <?php if (get_option('chitose_hidden-pic')) : ?>checked="checked"<?php endif; ?>>图片延迟加载</input></p>
			</fieldset>
			<input type="submit" name="Submit" class="button-primary" value="保存" />
			<input type="hidden" name="chitose_settings" value="save" style="display:none;" />
		</div>
		<div id="sns-set">
			<h2>社交网站链接</h2>
			<fieldset class="block">
				<p><label>Facebook</label><input type="text" name="facebook" id="facebook" value="<?php echo get_option('chitose_facebook'); ?>"/><input type="checkbox" name="facebook-stat" id="facebook-stat" value="on" <?php if (get_option('chitose_facebook-stat')) : ?>checked="checked"<?php endif; ?>>开启</input></p>
				<p><label>Twitter</label><input type="text" name="twitter" id="twitter" value="<?php echo get_option('chitose_twitter'); ?>"/><input type="checkbox" name="twitter-stat" id="twitter-stat" value="on" <?php if (get_option('chitose_twitter-stat')) : ?>checked="checked"<?php endif; ?>>开启</input></p>
				<p><label>Google+</label><input type="text" name="gplus" id="gplus" value="<?php echo get_option('chitose_gplus'); ?>"/><input type="checkbox" name="gplus-stat" id="gplus-stat" value="on" <?php if (get_option('chitose_gplus-stat')) : ?>checked="checked"<?php endif; ?>>开启</input></p>
				<p><label>新浪微博</label><input type="text" name="weibo" id="weibo" value="<?php echo get_option('chitose_weibo'); ?>"/><input type="checkbox" name="weibo-stat" id="weibo-stat" value="on" <?php if (get_option('chitose_weibo-stat')) : ?>checked="checked"<?php endif; ?>>开启</input></p>
			</fieldset>
			<input type="submit" name="Submit" class="button-primary" value="保存" />
			<input type="hidden" name="chitose_settings" value="save" style="display:none;" />
		</div>
		<div id="banner-set">
			<h2>Banner</h2>
			<fieldset class="block">
				<p><label>链接一</label></p>
					<p><label>标题</label><input type="text" name="lnk-1-first" id="lnk-1-first" value="<?php echo get_option('chitose_lnk-1-first'); ?>"/>
					<label>副标题</label><input type="text" name="lnk-1-second" id="lnk-1-second" value="<?php echo get_option('chitose_lnk-1-second'); ?>"/></p>
					<p><label>链接</label><input type="text" name="lnk-1-rel" id="lnk-1-rel" value="<?php echo get_option('chitose_lnk-1-rel'); ?>"/></p>
				<p><label>链接二</label></p>
					<p><label>标题</label><input type="text" name="lnk-2-first" id="lnk-2-first" value="<?php echo get_option('chitose_lnk-2-first'); ?>"/>
					<label>副标题</label><input type="text" name="lnk-2-second" id="lnk-2-second" value="<?php echo get_option('chitose_lnk-2-second'); ?>"/></p>
					<p><label>链接</label><input type="text" name="lnk-2-rel" id="lnk-2-rel" value="<?php echo get_option('chitose_lnk-2-rel'); ?>"/></p>
				<p><label>链接三</label></p>
					<p><label>标题</label><input type="text" name="lnk-3-first" id="lnk-3-first" value="<?php echo get_option('chitose_lnk-3-first'); ?>"/>
					<label>副标题</label><input type="text" name="lnk-3-second" id="lnk-3-second" value="<?php echo get_option('chitose_lnk-3-second'); ?>"/></p>
					<p><label>链接</label><input type="text" name="lnk-3-rel" id="lnk-3-rel" value="<?php echo get_option('chitose_lnk-3-rel'); ?>"/></p>
				<p><input type="checkbox" name="banner-close" id="banner-close" value="on" <?php if (get_option('chitose_banner-close')) : ?>checked="checked"<?php endif; ?>>不允许关闭</input></p>
				<p><input type="checkbox" name="banner-none-link" id="banner-none-link" value="on" <?php if (get_option('chitose_banner-none-link')) : ?>checked="checked"<?php endif; ?>>不显示链接</input></p>
			</fieldset>
			<input type="submit" name="Submit" class="button-primary" value="保存" />
			<input type="hidden" name="chitose_settings" value="save" style="display:none;" />
		</div>
		<div id="links-set">
			<h2>友情链接</h2>
			<p><textarea name="blogroll" rows="10" cols="50" id="blogroll" class="large-text code"><?php echo get_option('chitose_blogroll'); ?></textarea></p>
			<p><label>格式: 链接 | 名称 | 简介 | 图标(无请填'null')</label></p>
			<input type="submit" name="Submit" class="button-primary" value="保存" />
			<input type="hidden" name="chitose_settings" value="save" style="display:none;" />
		</div>
		</form>
	</div>
</div>

<?php };
function blogroll(){
    $blogroll_setting =  get_option('chitose_blogroll');
    if($blogroll_setting){
        $blogrolls = explode("\n", $blogroll_setting);
        foreach ($blogrolls as $blogroll) {
            $blogroll = explode("|", $blogroll );
			echo '<li>';
			if (esc_attr(trim($blogroll[3]))!= 'null') :
				echo '<img src="'.esc_attr(trim($blogroll[3])).'" />';
			else :
				echo '<img src="'.get_bloginfo('template_url').'/images/default-link.png"/>';
			endif;
			echo '<a href="'.esc_attr(trim($blogroll[0])).'">'.trim($blogroll[1]).'</a>';
			echo '<p>'.trim($blogroll[2]).'</p>';
			echo '</li>';
        }
    }
}
?>
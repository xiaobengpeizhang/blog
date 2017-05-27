<?php 
	$name="post";
	get_header("post");
?>
<section>
	<div class="container">
		<div class="ctl ctl1">
			<?php if(have_posts()): ?><?php while(have_posts()):the_post(); ?>
				<div class="post" id="post-<?php the_ID(); ?>">
    				<div class="entry"><?php the_content(); ?></div>
              		<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
               	<div class="comments-template"><?php comments_template(); ?></div>  
   				</div>
    		<?php endwhile; ?>
    			<div class="nav"><?php posts_nav_link(); ?></div>
    		<?php else : ?>
    			<div class="post">
        			<h2><?php _e('暂时还没有志'); ?></h2>
       			</div>
    		<?php endif; ?>
		</div>
    </div>
</section>
<div style="clear:both;"></div>
<?php get_footer(); ?>
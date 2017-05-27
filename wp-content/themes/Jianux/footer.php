<a class="go-top"><i class="icon-circle-arrow-up"></i></a>
<footer>
  <div class="copyright">
    ©2012-2014 <a href="/" target="_blank"><?php bloginfo('name'); ?></a>
    <br>
    萌ICP备20140702号-3
  </div>
  <div class="contact">
  <a href="http://iaro.cn" target="_blank">主题作者</a>
  ·
    <a href="<?php echo home_url(); ?>/about" target="_blank">关于简书</a>
    ·
    <a href="http://<?php home_url(); ?>/wp-admin" target="_blank">管理后台</a>
    ·
    关注我们:
    <a href="http://weibo.com/linsu412" target="_blank"><i class="icon-weibo"></i></a>
    <a href="https://twitter.com/233" target="_blank"><i class="icon-twitter"></i></a>
    <br>
    <a href="http://www.google.com/chrome" class="use-chrome">建议使用谷歌的 Chrome 浏览器访问以获得最佳用户体验</a><br><a href="http://windows.microsoft.com/zh-CN/internet-explorer/download-ie" class="upgrade-ie">本网站不支持 IE6/IE7，如果您希望继续使用 IE 浏览器，请升级至IE8及以上版本</a>
  </div>
</footer>
    <script src="http://upcdn.b0.upaiyun.com/libs/jquery/jquery-1.10.2.min.js"></script>
<script>
    var week = new Date().getDay();
$('.cover-img').css("background-image","url(/wp-content/themes/jianux/images/"+week+".jpg)");  
</script>         
    <script src="<?php bloginfo('template_url'); ?>/js/full.js"></script>
<?php if( is_singular() ){ ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/comments-ajax.js"></script>
<?php } ?>
<?php wp_footer(); ?>
  </body>
</html>

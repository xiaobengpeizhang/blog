		<div id="ft" class="am-g am-g-fixed">
			<p><?php echo of_get('footer'); ?></p>
		</div>
		<div data-am-widget="gotop" class="am-gotop am-gotop-fixed" >
		    <a href="#top" title="回到顶部">
		        <span class="am-gotop-title">回到顶部</span>
		          <i class="am-gotop-icon am-icon-chevron-up"></i>
		    </a>
	  	</div>
		<!--[if (gte IE 9)|!(IE)]><!-->
		<script src="<?php echo get_template_directory_uri();?>/js/jquery.min.js"></script>
		<!--<![endif]-->
		<!--[if lte IE 8 ]>
		<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
		<![endif]-->
		<?php wp_footer(); ?>
	</body>
</html>
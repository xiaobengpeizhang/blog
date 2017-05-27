<?php  
add_action('widgets_init', create_function('', 'return register_widget("qzhai_img");'));
class qzhai_img extends WP_Widget {
	function qzhai_img() {
		$this->WP_Widget('qzhai_img', 'Qzhai-通用：单图 ', array( 'description' => '单张图片链接'));
	}
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		$src = $instance['src'];
		$url = $instance['url'];

		echo '<div class="adimg">';
			echo '<a href="'.$url.'" target="_blank" ><img src="'.$src.'"></a>';
		echo '</div>';


	}
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['src'] = $new_instance['src'];
		$instance['url'] = $new_instance['url'];
		return $instance;
	}
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 
			'title' => '',
			'src' => '',
			'url' => '',

			) 
		);
		$title = $instance['title'];
		$src = $instance['src'];
		$url = $instance['url'];

?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">标题 (不在前台显示)</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
	    <p>
      		<label for="<?php echo $this->get_field_id('src'); ?>">背景图片:</label><br />
			<input type="hidden" name="<?php echo $this->get_field_name('src'); ?>" id="<?php echo $this->get_field_id('src'); ?>" value="<?php echo $src; ?>" />
			<input class="button" onClick="bl_open_uploader(this, 'image_src')" id="bluth_image_upload" value="上传" />
	    </p>
      	<p class="image_src">
      		<img src="<?php echo $src; ?>" style="width:100%;">
      	</p>
      	<hr style="background:#ddd;height: 1px;margin: 15px 0px;border:none;">
	    <p>
      		<label for="<?php echo $this->get_field_id('url'); ?>">链接:</label><br />
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" value="<?php echo $url; ?>">
	    </p>

<?php
	}
}
if(!function_exists('hrw_enqueue')){
	function hrw_enqueue()
	{
	  wp_enqueue_media();
	  wp_enqueue_script('hrw', get_template_directory_uri().'/js/admin-script.js', array('jquery'), null, true);
	}
	add_action('admin_enqueue_scripts', 'hrw_enqueue');
}
?>
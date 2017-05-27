<?php  
add_action('widgets_init', create_function('', 'return register_widget("qzhai_author");'));
class qzhai_author extends WP_Widget {
	function qzhai_author() {
		$this->WP_Widget('qzhai_author', 'Qzhai-通用：作者挂件 ', array( 'description' => '作者信息'));
	}
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		$bt = $instance['bt'];
		$bj = $instance['bj'];
		$tx = $instance['tx'];
		$mc = $instance['mc'];
		$jj = $instance['jj'];
		echo $before_widget;
		if($bt)
		echo '<h4>'.$bt.'</h4>';
		echo '<div class="author">';
			echo '<img src="'.$bj.'">';
			echo '<div class="jj">';
				echo '<div class="tx">';
					echo '<img src="'.$tx.'">';
					echo '<h3>'.$mc.'</h3>';
				echo '</div>';
				echo '<p>'.$jj.'</p>'; 
				
			echo '</div>';
		echo '</div>';
		echo $after_widget;

	}
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['bt'] = $new_instance['bt'];
		$instance['bj'] = $new_instance['bj'];
		$instance['tx'] = $new_instance['tx'];
		$instance['mc'] = $new_instance['mc'];
		$instance['jj'] = $new_instance['jj'];
		return $instance;
	}
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 
			'bt' => '',
			'bj' => '',
			'tx' => '',
			'mc' => '',
			'jj' => '',

			) 
		);
		$jj = $instance['jj'];
		$mc = $instance['mc'];
		$tx = $instance['tx'];
		$bj = $instance['bj'];
		$bt = $instance['bt'];

?>
		<p>
			<label for="<?php echo $this->get_field_id('bt'); ?>">标题</label>
			<input class="widefat" id="<?php echo $this->get_field_id('bt'); ?>" name="<?php echo $this->get_field_name('bt'); ?>" type="text" value="<?php echo esc_attr($bt); ?>" />
		</p>
	    <p>
      		<label for="<?php echo $this->get_field_id('bj'); ?>">背景图片:<small>推荐( 320x150 )</small></label><br />
			<input type="hidden" name="<?php echo $this->get_field_name('bj'); ?>" id="<?php echo $this->get_field_id('bj'); ?>" value="<?php echo $bj; ?>" />
			<input class="button" onClick="bl_open_uploader(this, 'uploaded_bg_image')" id="bluth_image_upload" value="上传" />
	    </p>
      	<p class="uploaded_bg_image">
      		<img src="<?php echo $bj; ?>" style="width:100%;">
      	</p>
      	<hr style="background:#ddd;height: 1px;margin: 15px 0px;border:none;">
	    <p>
      		<label for="<?php echo $this->get_field_id('tx'); ?>">您的头像: <small>推荐 1:1 ( 80x80 )</small></label><br />
			<input type="hidden" name="<?php echo $this->get_field_name('tx'); ?>" id="<?php echo $this->get_field_id('tx'); ?>" value="<?php echo $tx; ?>" />
			<input class="button" onClick="bl_open_uploader(this, 'uploaded_author_image')" id="bluth_image_upload" value="上传" />
	    </p>
      	<p class="uploaded_author_image">
      		<img src="<?php echo $tx; ?>" style="width:100%;">
      	</p>
      	<hr style="background:#ddd;height: 1px;margin: 15px 0px;border:none;">
	    <p>
      		<label for="<?php echo $this->get_field_id('mc'); ?>">您的名字:</label><br />
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('mc'); ?>" name="<?php echo $this->get_field_name('mc'); ?>" value="<?php echo $mc; ?>">
	    </p>
	    <p>
      		<label for="<?php echo $this->get_field_id('jj'); ?>">描述介绍:</label><br />
			<textarea class="widefat" rows="5" id="<?php echo $this->get_field_id('jj'); ?>" name="<?php echo $this->get_field_name('jj'); ?>"><?php echo $jj; ?></textarea>
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
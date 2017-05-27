<?php


function optionsframework_option_name() {

	// 从样式表获取主题名称
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}



function optionsframework_options() {

	$tcolor_array = array(
		'hong' => __('红色', 'options_framework_theme'),
		'cheng' => __('橙色', 'options_framework_theme'),
		'huang' => __('黄色', 'options_framework_theme'),
		'lv' => __('绿色', 'options_framework_theme'),
		'qing' => __('青色', 'options_framework_theme'),
		'lan' => __('蓝色', 'options_framework_theme'),
		'zi' => __('紫色', 'options_framework_theme'),
		'fen' => __('粉色', 'options_framework_theme'),
	);

	// 如果使用图片单选按钮
	$imagepath =  get_template_directory_uri() . '/img/';

	$options = array();

	$options[] = array(
		'name' => __('基本设置', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => "logo显示方式",
		'desc' => "",
		'id' => "logois",
		'std' => "2",
		'type' => "images",
		'options' => array(
			'1' => $imagepath . 'logois02.png',
			'2' => $imagepath . 'logois03.png',
			'3' => $imagepath . 'logois01.png')
	);
	
	$options[] = array(
		'name' => __('logo 图片', 'options_framework_theme'),
		'desc' => __('请上传logo', 'options_framework_theme'),
		'id' => 'logoimg',
		'type' => 'upload');

	$options[] = array(
		'name' => __('副标题', 'options_framework_theme'),
		'desc' => __('是否显示副标题', 'options_framework_theme'),
		'id' => 'logospan',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('favicon 图片', 'options_framework_theme'),
		'desc' => __('32像素x32像素 favicon 就是在浏览器标题左面显示的图标', 'options_framework_theme'),
		'id' => 'favicon',
		'type' => 'upload');

	$options[] = array(
		'name' => __('app icon 图片', 'options_framework_theme'),
		'desc' => __('144像素x144像素 app - icon 当被用户收藏网站后在收藏夹显示的图标', 'options_framework_theme'),
		'id' => 'app_icon',
		'type' => 'upload');

	$options[] = array(
		'name' => __('主题颜色', 'options_framework_theme'),
		'id' => 'tclr',
		'std' => '橙色',
		'type' => 'select',
		'class' => 'mini', 
		'options' => $tcolor_array);

	$options[] = array(
		'name' => __('页脚文本', 'options_framework_theme'),
		'id' => 'footer',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'name' => __('SEO设置', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('关键词', 'options_framework_theme'),
		'desc' => __('请用英文逗号分隔', 'options_framework_theme'),
		'id' => 'keywords',
		'std' => '衫小寨',
		'type' => 'text');

	$options[] = array(
		'name' => "网站描述",
		'desc' => "",
		'id' => "description",
		'std' => "衫小寨",
		'type' => 'textarea');

	$options[] = array(
		'name' => __('副标题', 'options_framework_theme'),
		'desc' => __('勾选后在title最后面显示副标题', 'options_framework_theme'),
		'id' => 'logospanseo',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('百度自动连接提交', 'options_framework_theme'),
		'desc' => __('自动推送是百度提高站点新增网页发现速度推出的工具,勾选后在页面被访问时，页面URL将立即被推送给百度', 'options_framework_theme'),
		'id' => 'baidu',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('头部预留', 'options_framework_theme'),
		'desc' => __( '此位置在 head 之前 ', 'options_framework_theme' ),
		'id' => 'headtext',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'name' => __('联系我们', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('衫小寨', 'options_framework_theme'),
		'desc' => __('如果您在使用中出现什么问题或有什么好的建议欢迎来我们小寨 <a href="http://qzhai.top" target="_black">点击进入</a>', 'options_framework_theme'),
		'type' => 'info');
	return $options;
}
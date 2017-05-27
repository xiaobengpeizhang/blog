<?php
#######################################################################
############################- 屏蔽 emojis -############################
######################################################################
function disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
}
add_action('init', 'disable_emojis');
function disable_emojis_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}
#######################################################################
############################- 加载css和js -############################
######################################################################
function mytheme_enqueue_style()
{
    wp_enqueue_style('amazeui', get_template_directory_uri() . '/assets/css/amazeui.min.css');
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_style');
function myfooter()
{
    wp_enqueue_script('qzhai', get_template_directory_uri() . '/assets/js/amazeui.min.js');
    if (comments_open() || get_comments_number()) {
        echo '<script type="text/javascript">
                $(function(){
                    $(\'.am-comment img\').addClass(\'am-comment-avatar\');
                })
        </script>';
    }
}
add_action('wp_footer', 'myfooter');
#######################################################################
############################- 清楚谷歌字体 -############################
######################################################################
function coolwp_remove_open_sans_from_wp_core()
{
    wp_deregister_style('open-sans');
    wp_register_style('open-sans', false);
    wp_enqueue_style('open-sans', '');
}
add_action('init', 'coolwp_remove_open_sans_from_wp_core');
#######################################################################
############################- 加载主题设置 -############################
######################################################################
if (!function_exists('optionsframework_init')) {
    define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/');
    require_once dirname(__FILE__) . '/inc/options-framework.php';
}
#######################################################################
############################- 替换头像路径 -############################
######################################################################
function fox_get_https_avatar($avatar)
{
    $avatar = str_replace(array('www.gravatar.com', '0.gravatar.com', '1.gravatar.com', '2.gravatar.com'), 'gravatar.duoshuo.com', $avatar);
    return $avatar;
}
add_filter('get_avatar', 'fox_get_https_avatar');
#######################################################################
##########################- 加载小工具位置 -############################
######################################################################
if (function_exists('register_sidebar')) {
    register_sidebar(array('name' => '通用边栏（所有页面）', 'id' => 'widget_home', 'before_widget' => '<li>', 'after_widget' => '</li>', 'before_title' => '<h4>', 'after_title' => '</h4>'));
    register_sidebar(array('name' => '首页边栏下方-固定', 'id' => 'widget_home_sticky', 'before_widget' => '<li>', 'after_widget' => '</li>', 'before_title' => '<h4>', 'after_title' => '</h4>'));
    register_sidebar(array('name' => '文章页边栏下方-固定', 'id' => 'widget_single_sticky', 'before_widget' => '<li>', 'after_widget' => '</li>', 'before_title' => '<h4>', 'after_title' => '</h4>'));
    register_sidebar(array('name' => '文章页内容下方', 'id' => 'widget_single_bottom', 'before_widget' => '<li>', 'after_widget' => '</li>', 'before_title' => '<h4>', 'after_title' => '</h4>'));
    register_sidebar(array('name' => '页面页边栏下方-固定', 'id' => 'widget_page_sticky', 'before_widget' => '<li>', 'after_widget' => '</li>', 'before_title' => '<h4>', 'after_title' => '</h4>'));
    register_sidebar(array('name' => '页面页内容下方', 'id' => 'widget_page_bottom', 'before_widget' => '<li>', 'after_widget' => '</li>', 'before_title' => '<h4>', 'after_title' => '</h4>'));
}
#######################################################################
#############################- 加载小工具 -#############################
######################################################################
include 'widget/widget.php';
#######################################################################
############################- 加载菜单 -###############################
######################################################################
include 'include/qzhai_menu.class.php';
if (function_exists('register_nav_menus')) {
    register_nav_menus(array('main-menu' => '主菜单', 'ft-menu' => '页脚导航'));
}
#######################################################################
###############################- 分页 -################################
######################################################################
include 'include/pagination.php';
#######################################################################
############################- 图片缩略图 -##############################
######################################################################
add_theme_support('post-thumbnails');
add_image_size('thumbnail', 640, 220, true);
#######################################################################
############################- 加载评论 -############################
######################################################################
function aurelius_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    echo '<li id="li-comment-<?php comment_ID();?>" class="am-comment">';
    if (function_exists('get_avatar') && get_option('show_avatars')) {
        echo get_avatar($comment, 48);
    }
    echo '<div class="am-comment-main">
            <header class="am-comment-hd">
                <div class="am-comment-meta">';
    printf(__('<cite class="am-comment-author">%s</cite>'), get_comment_author_link());
    echo '发表于：<time><?php echo get_comment_time("Y-m-d H:i");?></time>';
    echo '</div>
            <div class="am-comment-actions">';
    edit_comment_link('修改');
    comment_reply_link(array_merge($args, array('reply_text' => '回复', 'depth' => $depth, 'max_depth' => $args['max_depth'])));
    echo '</div>
        </header>
        <div class="am-comment-bd">';
    if ($comment->comment_approved == '0') {
        echo ' <div class="am-alert am-alert-success">
                你的评论正在审核，稍后会显示出来！
            </div>';
    }
    comment_text();
    echo '</div>
    </li>';
}
#######################################################################
############################- 面包屑      -############################
######################################################################
function cmp_breadcrumbs() {
    $before = '<li class="am-active"><span>'; // 在当前链接前插入
    $after = '</span></li>'; // 在当前链接后插入
    if ( !is_home() && !is_front_page() || is_paged() ) {
        echo '<ol class="am-breadcrumb" >';
        global $post;
        $homeLink = home_url();
        echo '<li> <a  href="' . $homeLink . '" class="am-icon-home" > 首页 </a> </li> ';
        if ( is_category() ) { // 分类 存档
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0){
                $cat_code = get_category_parents($parentCat, TRUE, '  ');
                echo '<li>'.$cat_code.'</li>';
            }
            echo '<li>'.$before . '' . single_cat_title('', false) . '' . $after.'</li>';
        } elseif ( is_day() ) { // 天 存档
            echo '<li><a  href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>  </li>';
            echo '<li><a   href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a>  </li>';
            echo $before . get_the_time('d') . $after;
        } elseif ( is_month() ) { // 月 存档
            echo '<li><a  href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> </li> ';
            echo $before . get_the_time('F') . $after;
        } elseif ( is_year() ) { // 年 存档
            echo $before . get_the_time('Y') . $after;
        } elseif ( is_single() && !is_attachment() ) { // 文章
            if ( get_post_type() != 'post' ) { // 自定义文章类型
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<li><a  href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> </li> ';
                echo $before . get_the_title() . $after;
            } else { // 文章 post
                $cat = get_the_category(); $cat = $cat[0];
                $cat_code = get_category_parents($cat, TRUE, '  ');
                echo '<li>'.$cat_code.'</li>';
                echo $before . get_the_title() . $after;
            }
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif ( is_attachment() ) { // 附件
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            echo '<li><a  href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>  </li>';
            echo $before . get_the_title() . $after;
        } elseif ( is_page() && !$post->post_parent ) { // 页面
            echo $before . get_the_title() . $after;
        } 
        if ( get_query_var('paged') ) { // 分页
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
                echo sprintf( __( '( Page %s )', 'cmp' ), get_query_var('paged') );
        }
        echo '</ol>';
    }
}

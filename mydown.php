<?php
/*
	Plugin Name: 下载中心插件
    Version: 1.5.7
    Plugin URI:  http://www.iiexe.com/
    Description: 所有要下载的内容会集中到一个页面去下载。= 2014-6-6 1.5.5 =
1.修改下载计数不准确的问题！设置为1小时内点击下载不增加计数。
2.修改文章页面下载按钮样式
3.文章页面下载按钮样式的颜色选择
4.增加文章页面下载按钮样式的大小选择，以适应不同模板
    Author:      爱程序-Exploit
    Copyright 2014 爱程序.By:exploit  (email : info@iiexe.com)
	Author URI: http://www.iiexe.com/
	License: GPLv3
*/

// Setup Contants
defined( 'VP_PLUGIN_VERSION' ) or define( 'VP_PLUGIN_VERSION', '2.0' );
defined( 'VP_PLUGIN_URL' )     or define( 'VP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
defined( 'VP_PLUGIN_DIR' )     or define( 'VP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
defined( 'VP_PLUGIN_FILE' )    or define( 'VP_PLUGIN_FILE', __FILE__ );

// Load Languages 不在加载多语言
//add_action('plugins_loaded', 'vp_pl_load_textdomain');

//function vp_pl_load_textdomain()
//{
//	load_plugin_textdomain( 'vp_textdomain', false, dirname( plugin_basename( __FILE__ ) //. '/lang/' ) ); 
//}

// Require Bootstrap
require 'vafpress-framework/bootstrap.php';
require_once 'admin/data_sources.php';


//post
// metaboxes
/*
$tmpl_mb1  = VP_PLUGIN_DIR . '/admin/metabox/sample_1.php';*/
$tmpl_mb2  = VP_PLUGIN_DIR . '/admin/metabox/sample_2.php';/*
$tmpl_mb3  = VP_PLUGIN_DIR . '/admin/metabox/sample_3.php';
$tmpl_mb4  = VP_PLUGIN_DIR . '/admin/metabox/sample_4.php';
$tmpl_mb5  = VP_PLUGIN_DIR . '/admin/metabox/sample_5.php';
$tmpl_mb6  = VP_PLUGIN_DIR . '/admin/metabox/sample_6.php';
$tmpl_mb6  = VP_PLUGIN_DIR . '/admin/metabox/sample_6.php';
$tmpl_mb7  = VP_PLUGIN_DIR . '/admin/metabox/sample_7.php';
$tmpl_mb8  = VP_PLUGIN_DIR . '/admin/metabox/sample_8.php';
*/



// options
$tmpl_opt  = VP_PLUGIN_DIR . '/admin/option/option.php';
/**
 * Create instance of Options
 */
$theme_options = new VP_Option(array(
	'is_dev_mode'           => false,                                  // dev mode, default to false
	'option_key'            => 'down_option',                           // options key in db, required
	'page_slug'             => 'down_option',                           // options page slug, required
	'template'              => $tmpl_opt,                              // template file path or array, required
	'menu_page'             => 'plugins.php',                           // parent menu slug or supply `array` (can contains 'icon_url' & 'position') for top level menu
	'use_auto_group_naming' => true,                                   // default to true
	'use_util_menu'         => true,                                   // default to true, shows utility menu
	'minimum_role'          => 'edit_theme_options',                   // default to 'edit_theme_options'
	'layout'                => 'fixed',                                // fluid or fixed, default to fixed
	'page_title'            => __( '下载中心插件', 'vp_textdomain' ), // page title
	'menu_label'            => __( '下载中心插件', 'vp_textdomain' ), // menu label
));



/**
 * Create instances of Metaboxes
 */
//$mb1 = new VP_Metabox($tmpl_mb1);
$mb2 = new VP_Metabox($tmpl_mb2);
//$mb3 = new VP_Metabox($tmpl_mb3);
//$mb4 = new VP_Metabox($tmpl_mb4);
//$mb5 = new VP_Metabox($tmpl_mb5);
//$mb6 = new VP_Metabox($tmpl_mb6);
//$mb7 = new VP_Metabox($tmpl_mb7);
//$mb8 = new VP_Metabox($tmpl_mb8);

/**
 * Create instances of Shortcode Generator
 */
//发送到页面代码
function myhtml($outer){

	if(!is_single()){ return $outer; }


	$buffer = vp_metabox('_post_format_options.format_video_embed');
    $vodin2 = vp_metabox('_post_format_options.format_video_embed1');



    $bg_auto = vp_option('down_option.bg_1');//获取大小选择器
    $nameid = get_the_ID();//获取当前文章ID
    $dbname = get_post_meta($nameid, 'iiexe_db', true); //下载数
    $demo = $vodin2[0][name2];//演示地址
    $myname = $vodin2[0][name1];//文件名称

    if (!empty($bg_auto)) {
     	$bg_error= '<li style="display: block;">
		<a href="'.$bg_auto.'" target="_blank"><i class="icon-envelope"></i>报告错误</a>
		</li>';
     }
    
	
 if (!empty($demo)) {
     	$cmm = '<li style="display: block;">
		<a href="'.$demo.'" target="_blank"><i class="icon-th"></i>演示地址</a>
		</li>';
     }

    $outer = '';
	$navss = '<li style="display: block;">
		<a href="JavaScript:void(0)"><i class="icon-bullhorn"></i>下载数'.$dbname.'次</a></li>';

	$mydownname = '<li style="display: block;">
		<a href="JavaScript:void(0)"><i class="icon-bullhorn"></i>文件名称：'.$myname.'</a>
		</li>';
	
	$outer .= '<div class="mydownclass"><ul class="flexy-menu orange">
	     <li class="showhide" style="display: none;"></li>

		<li class="active" style="display: block;">
		<a><i class="icon-heart"></i>演示/下载</a>
		</li>

		<li style="display: block;">
		<a href="'.VP_PLUGIN_URL.'tp/cool/md5.php?p='.$nameid.'" target="_blank"><i class="icon-cogs"></i>下载地址</a>
		</li>

		'.$cmm.'
		
'.$mydownname.'
           
           
'.$navss.'
  
		'.$bg_error.'
        </ul>';

	$outer .= "\n<!-- End of myhtml --></div>\n";
    



    $oui = get_the_content();
    $mydownok = get_the_content().$outer;

	if (!empty($myname)){ return $mydownok; }
      return get_the_content();
}
add_action( 'the_content', 'myhtml', 9, 9 );




//加载统计代码
//
//加载插件css
function myScripts() {  
	 wp_register_style( 'mydown', VP_PLUGIN_URL. 'css/flexy-menu.css' );
	 wp_register_style( 'mydown1', VP_PLUGIN_URL. 'css/font-awesome.css' );
	  wp_register_script( 'mydown', VP_PLUGIN_URL. 'js/flexy-menu.js' );
    if ( is_single() ) { 
        wp_enqueue_script( 'mydown' );  
        wp_enqueue_style( 'mydown' );  
         wp_enqueue_style( 'mydown1' );  

    }  
}  
add_action( 'wp_enqueue_scripts', 'myScripts' );

//加载颜色选择器 


function yanse_page_api() {
/* 得到站点描述 */

$yanse_auto = vp_option('down_option.ys_1');//获取颜色选择器
$daxiao_auto = vp_option('down_option.xz_1');//获取大小选择器

switch ($daxiao_auto)
{
case ndx_1:
  $iemode = '20px 22px';
  break;
case ndx_2:
  $iemode = '13px 15px';
  break;
case ndx_3:
  $iemode = '0.5em 0.3em';
  break;
default:
  $iemode = '0.5em 0.3em';
}

if (empty($yanse_auto)) {
	$yanse_auto = '#ff670f';
}
$yanse_api = '<style type="text/css">
.orange li:hover>a,.orange li.active a{background:'.$yanse_auto.';color:#fff!important}.flexy-menu>li>a{/*padding:20px 22px*/padding:'.$iemode.';color:#ccc;text-decoration:none;display:block;text-transform:uppercase;-webkit-transition:color .2s linear,background .2s linear;-moz-transition:color .2s linear,background .2s linear;-o-transition:color .2s linear,background .2s linear;transition:color .2s linear,background .2s linear}</style>';
echo $yanse_api;
}
add_action( 'wp_head', 'yanse_page_api' );
?>
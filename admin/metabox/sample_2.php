<?php

return array(
	'id'          => '_post_format_options',
	'types'       => array('post'),
	'title'       => __('文件下载', 'vp_textdomain'),
	'priority'    => 'high',
	'template'    => array(
        ///文件明字段
        array(
    'type'      => 'group',
    'repeating' => false,
    'length'    => 1,
    'name'      => 'format_video_embed1',
    'title'     => __('文件名称设置', 'vp_textdomain'),
    'fields'    => array(
   		        array(
					'type' => 'textbox',
					'name' => 'name1',
					'label' => __('文件名称', 'vp_textdomain'),
					'description' => __('要下载的文件名', 'vp_textdomain'),
			 ),
				array(
					'type' => 'textbox',
					'name' => 'name2',
					'label' => __('演示地址', 'vp_textdomain'),
					'description' => __('要下载文件的演示介绍地址.', 'vp_textdomain'),
             
             ),
   		        array(
					'type' => 'codeeditor',
					'name' => 'namedb',
					'label' => __('文件描述', 'vp_textdomain'),
					'description' => __('要下载文件的描述', 'vp_textdomain'),
             ),

        /* more controls fields or even nested group ... */
    ),
),



		///下载字段
		array(
			'type'      => 'group',
			'repeating' => true,
			'name'      => 'format_video_embed',
			'title'     => __('下载设置', 'vp_textdomain'),
			'fields'    => array(
				
				array(
					'type' => 'textbox',
					'name' => 'name',
					'label' => __('网盘名称', 'vp_textdomain'),
					'description' => __('外链网盘的名称', 'vp_textdomain'),
				),
				array(
					'type' => 'textbox',
					'name' => 'url',
					'label' => __('下载地址', 'vp_textdomain'),
					'description' => __('网盘下载页面地址', 'vp_textdomain'),
				),
				array(
					'type' => 'upload',
					'name' => 'image',
					'label' => __('上传文件', 'vp_textdomain'),
					'description' => __('上传文件', 'vp_textdomain'),
				),

			),
		),
	),
);

/**
 * EOF
 */

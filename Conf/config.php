<?php
return array(
	//'配置项'=>'配置值'
    'DB_TYPE'               => 'mysql',     // 数据库类型
    'DB_HOST'               => 'localhost', // 服务器地址
    'DB_NAME'               => 'jfwj',          // 数据库名
    'DB_USER'               => 'root',      // 用户名
    'DB_PWD'                => 'root',          // 密码
    'DB_PORT'               => '',        // 端口
    'DB_PREFIX'             => 'qd_',    // 数据库表前缀
    'TMPL_FILE_DEPR'        =>'_',//为了避免目录结构太深，将默认参数'/'改成'_'
    'SHOW_PAGE_TRACE'       =>false,
    'URL_MODEL'             =>'2',
    'URL_HTML_SUFFIX'       => 'html',  // URL伪静态后缀设置

    'WEB_TITLE'             =>'容商天下询价系统',
    'TMPL_ACTION_ERROR'     =>  'Public/message',
    'TMPL_ACTION_SUCCESS'   =>  'Public/message',
);
?>
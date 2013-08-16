<?php
date_default_timezone_set('PRC');//时间区域设置 PRC   等价于  utc+8  表示北京时间
$appName="jddf.com";//配置项目目录
$env="1"; //环境如果配置为1 就表示为开发环境   2=表示为生产环境
$sys_title="酒店订房系统欢迎你";
$moduleConf=array("denglu","dingfang","jichushuju",'main');
$rootPath=$_SERVER['DOCUMENT_ROOT'].'/'.$appName;//获取服务器所在的根目录
$serverName='http://'.$_SERVER['SERVER_NAME'];//获取当前服务器的域名
$serverPort=$_SERVER['SERVER_PORT'];//获取端口
$server=($serverPort == 80)?$serverName:$serverName.':'.$serverPort;//依据端口的不同组装不同域名
$rootUri=($env == '1')?$server.'/'.$appName:$server;//依据环境配置不同组装不同的 uri
$header=$rootPath.'/module/public/header.php';//网页头部公共目录地址
$footer=$rootPath.'/module/public/footer.php';//网页尾部公共目录地址
$static_style=$rootUri.'/static/style';// css样式公共目录
$static_js=$rootUri.'/static/js';//js脚本公共目录
$static_image=$rootUri.'/static/images';//image图片公共目录
$webFrameworkPath=$rootUri.'/static/webFramework';//前端框架目录配置


<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rjgcxy
 * Date: 13-7-22
 * Time: 上午10:52
 * To change this template use File | Settings | File Templates.
 */
//加载配置文件
require_once '../config/config.php';
require_once '../common/dbConnect.php';
//退出登录  销毁当前登录用户变量
unset($_SESSION['userOnline']);
//回收mysql资源
mysql_close($conn);
//回到登录页面
include_once $rootPath.'/module/public/succeed.php';

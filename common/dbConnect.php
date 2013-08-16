<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-7-17
 * Time: 下午3:33
 * To change this template use File | Settings | File Templates.
 */
$conn=mysql_connect("127.0.0.1",'root','root') or die('数据库服务器连接失败');
mysql_select_db('jddf') or die("数据库连接失败");
mysql_set_charset('utf8');

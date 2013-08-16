<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rjgcxy
 * Date: 13-7-23
 * Time: 下午4:04
 * To change this template use File | Settings | File Templates.
 */
//加载配置文件
require_once '../config/config.php';
require_once '../common/dbConnect.php';
//判断用户点击登录
if(isset($_POST['qdlr'])){
//获取数据
    extract($_POST);
    $sql="insert into room values(null,'$room_number','$room_type','$room_grade','$room_price',default,default,default,default,default)";
    $res=mysql_query($sql);
    if($res){
        $uriPath=$rootUri.'/index.php?m=jichushuju&a=kfdj';  //友好提示页面的变量
        $msg='新增房间成功!'; //友好提示页面的变量
        include_once $rootPath.'/module/public/vectoring.php';
    }else{
        $uriPath=$rootUri.'/index.php?m=jichushuju&a=kfdj';  //友好提示页面的变量
        $msg='新增房间失败!'; //友好提示页面的变量
        include_once $rootPath.'/module/public/vectoring.php';
    }
}


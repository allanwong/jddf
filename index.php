<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-7-16
 * Time: 下午2:24
 * To change this template use File | Settings | File Templates.
 */
//程序入口文件
//加载配置文件
require_once 'config/config.php';
require_once 'common/dbConnect.php';

//判断是否存在 $_GET['m'] ,如果不存在就直接加载登录模块，否则加载指定模块
if(isset($_GET['m'])){
   //获取模块值
    $module=$_GET['m'];
    //session 保存当前状态
    $status=$_GET['status'];

    $call=( $status === 'c')?'e':null;
    //记录当前用户的错误登陆次数
    if( ! empty($call)){
         $_SESSION['status']='e';
        if(isset($_COOKIE['cs'])){
             if($_COOKIE['cs'] < 4){
                 //记录当前用户的错误登陆次数
                 setcookie('cs',$_COOKIE['cs']+1,time()+180);
             }
         }else{
            setcookie('cs',1,time()+180);
         }
     }else{
      $_SESSION['status']=0;
    }

    //再一次记住用户名
    $u_name=$_SESSION['userOnline'];
    $_SESSION['userOnline']=$u_name;


   //判断用户输入的模型是否存在与模型数组中
    if(in_array($module,$moduleConf)){
         //判断是否存在 $_GET['a']
          if(isset($_GET['a'])){
               //组装url 文件路径
              $file=$rootPath.'/module/'.$module.'/'.$_GET['a'].'.php';
             // echo $file;
               //判断是否存在该文件
              if(file_exists($file)){
                    //echo $file.'ddddddddd';
                 include_once $file;
                 }else{
                  include_once $rootPath.'/module/public/404.php';
              }
          }else{
            include_once $rootPath.'/module/'.$module.'/index.php';  //加载物理绝对路径
          }
     }else{
        include_once $rootPath.'/module/public/404.php';
    }
}else{
    $_SESSION['status']=0;
    include_once $rootPath.'/module/denglu/index.php';
}


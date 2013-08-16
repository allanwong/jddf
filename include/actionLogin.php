<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-7-17
 * Time: 上午11:28
 * To change this template use File | Settings | File Templates.
 */
//加载配置文件
require_once '../config/config.php';
require_once '../common/dbConnect.php';
//判断用户是否点击提交
if(isset($_POST['dl'])){
    //获取数据
    $username=trim($_POST['username']);
    //获取密码password
   $userassword=trim($_POST['password']);
   //获取验证码
    $yzm=trim($_POST['yzm']);
    //记住我
    $remember=trim($_POST['remember']);
    //获取session里面的验证码
    $yzmcode=$_SESSION['yzmStr'];
    //判断验证码是否成功
    if($yzm == $yzmcode){
          //验证用户名和密码是否存在
            $sql="select u_name from users where u_name='$username' and  u_pwd='$userassword'";
           //执行sql
            $result=mysql_query($sql);
            //获取资源结果集
            $data=mysql_fetch_assoc($result);
            //判断是否存在数据
            if( ! empty($data['u_name'])){
                //记住我 功能代码模块--登陆成功后就完成记住当前用户的功能
                  //判断 $remember 是否为空 ，如果为空就表示，不需要记住，否则就需要记住
               if( ! empty($remember)){
                    setcookie("Myremember",$username."@".$userassword,time()+86400*7); //在本机设置cookie
                 }
                  setcookie('uname',$username,time()+86400);
                  $_SESSION['userOnline']=$username;
                  //判断用户实现加载的页面不同
                  if($username == 'admin'){
                      //如果成功跳转到后台主页面
                      header("Location: {$rootUri}/index.php?m=main");
                  }else{
                      header("Location: {$rootUri}/index.php?m=dingfang");
                  }
               }else{
                //否则就继续登录
                header("Location: {$rootUri}/index.php?m=denglu&status=c");
            }

    }else{
      //否则就继续登录,登陆失败后 get参数 status=c 表示验证码错误
      header("Location: {$rootUri}/index.php?m=denglu&status=c");

    }


}


?>

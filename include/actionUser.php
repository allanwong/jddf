<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-7-19
 * Time: 上午9:44
 * To change this template use File | Settings | File Templates.
 */
//加载配置文件
require_once '../config/config.php';
require_once '../common/dbConnect.php';
//检测用户名是否重复
if(isset($_POST['ajax_uname'])){
   $name=$_POST['ajax_uname'];
    //查询数据库中是否存在该用户
    $sql="select count(*) from users where u_name='$name'";
    $result=mysql_query($sql);
     $rows=mysql_fetch_row($result);
     if($rows[0] == 1){
         unset($result);
         echo '1'; //表示存在
     }
 }

//数据提交
 if(isset($_POST['ubtn'])){
    //获取数据
     extract($_POST);
     $time=date("y-m-d H:i:s",time());
     //$acc='g'.time().$uNameaa;
     //准备sql --注意：在实际的开发中我们是不相信任何的外来数据
    $sql="insert into users values(null,'$acc','$uNameaa','$uPwd','$uPhone','$uQQ','$uEmail','$uAddrs','$time','g','0','0.00')";
    $result= mysql_query($sql);
     if($result){
         $uriPath=$rootUri.'/index.php?m=jichushuju&a=user';  //友好提示页面的变量
         $msg='新增用户成功!'; //友好提示页面的变量
         include_once $rootPath.'/module/public/vectoring.php';
        }else{
         $uriPath=$rootUri.'/index.php?m=jichushuju&a=user';  //友好提示页面的变量
         $msg='新增用户失败!'; //友好提示页面的变量
         include_once $rootPath.'/module/public/vectoring.php';
     }
 }

//ajax 修改密码
if(isset($_POST['passwordValue'])){
     $pwd=trim($_POST['passwordValue']);
     //php中正则 ： passwordValue  数字 字母  6 -12
    //定义正则
    $pattern='/[0-9A-Za-z]{6,12}/';
    preg_match($pattern,$pwd,$mattch);
    if(empty($mattch)){
         echo '0';
    }else{
         $uname=$_SESSION['userOnline'];
        //修改数据库
        $sql="update users set u_pwd='$pwd' where u_name='$uname'";
         $res=mysql_query($sql);
        if($res){
            echo  '1';
        }else{
            echo '0';
        }
     }
 }
//给用户充值
if(isset($_POST['backBut'])){
     $b_date=date("y-m-d H:i:s",time());
        extract($_POST); //获取数据
        //总金额 =现在冲的钱+原来的钱===他们原来的钱 在user表中的 money 字段中
        //1--查询当前充值的这个用户的原来的余额
        $sql="select u_money from users where u_acount='$u_acount'";
        $res=mysql_query($sql);
        $old_money=mysql_fetch_assoc($res);
       // print_r($old_money);
        $b_sum=$old_money['u_money']+$b_money;
       $sql2="insert into money values(null,'$u_acount','$b_acount','$bank','$b_number','$b_money','$b_sum','$b_date')";
       $res2=mysql_query($sql2);
        if($res2){
            //如果执行成功，修改用户表的money
            $sql3="update users set u_money=$b_sum where u_acount='$u_acount'";
            $res3=mysql_query($sql3);
            if($res3){
                  //加载友好提示页面
                $uriPath=$rootUri.'/index.php?m=jichushuju&a=money';  //友好提示页面的变量
                $msg='充值成功'; //友好提示页面的变量
                include_once $rootPath.'/module/public/vectoring.php';
             }else{
                $uriPath=$rootUri.'/index.php?m=jichushuju&a=money';  //友好提示页面的变量
                $msg='充值失败'; //友好提示页面的变量
                include_once $rootPath.'/module/public/vectoring.php';
            }

        }
}

//ajax 查询选中用户的银行账号
  if(isset($_POST['changeBankAcount'])){
     $UserAcount=$_POST['changeBankAcount']; //获取当前发生改变用户银行的账号
     $sql="select b_acount from  money where u_acount='$UserAcount'";
     $res=mysql_query($sql);
      $assocs=mysql_fetch_assoc($res);
       if(empty($assocs)){
           echo '0';
       }else{
           echo $assocs['b_acount'];
       }
    }




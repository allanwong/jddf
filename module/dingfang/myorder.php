<?php session_start(); ?>
<?PHP  include_once $rootPath.'/module/public/header.php';?>
<?php
   //查询当前用户的信息
$u_acount=$_SESSION['uacount']; //获取用户账号
if(empty($u_acount)){
     $u_name=$_SESSION['userOnline'];
    if(empty($u_name)){
         $u_name=$_COOKIE['uname'];
    }

     //依据name 查询出账号
     $sql="select u_acount from users  where u_name='$u_name'";
    $result=mysql_query($sql);
    $rows=mysql_fetch_assoc($result);
    $u_acount=$rows['u_acount'];
}
//查询我的预订
 $sql2="select * from room where r_u_acount='$u_acount'";
 $result2=mysql_query($sql2);
 $data=array();
$sumPrice=0; //总价
  while($rows2=mysql_fetch_assoc($result2)){
      $data[]=$rows2;
      $sumPrice+=$rows2['r_price'];

}
 $count=count($data);
//判断用户的余额是否足够，如果足够直接扣除费用，否则。提示订单正在审核，请等待。
$sql3="select u_money  from users where u_acount='$u_acount'";
$result3=mysql_query($sql3);
$ass=mysql_fetch_assoc($result3);
$uMoney=$ass['u_money'];
//判断
$flag=0; //定义变量判断用户是否需要审核订单

//判断 r_room_is 是否是y  如果不是y 就运行下面的代码
$sql7="select r_room_is from room where r_u_acount='$u_acount'";
 $result7=mysql_query($sql7);
$ass2=mysql_fetch_assoc($result7);
if($ass2['r_room_is'] == 'n'){
    if($uMoney >  $sumPrice){
        //执行修改
        $sql4="update users set u_money=u_money-{$sumPrice} where u_acount='$u_acount'";
        $newSum=$uMoney-$sumPrice;
        $sql5="update money set b_sum=$newSum where u_acount='$u_acount'";
        $sql6="update room set r_room_is='y' where r_u_acount='$u_acount'";
        $result4=mysql_query($sql4);
        $result5=mysql_query($sql5);
        $result6=mysql_query($sql6);
        $flag=1;
    }
}
?>


<?php include_once $rootPath.'/module/public/main_left.php'; ?>
    <div class="content">

        <div class="header">

            <h1 class="page-title">订房模块</h1>
        </div>

        <ul class="breadcrumb">

            <li><a href="users.html">订单管理</a> <span class="divider">/</span></li>
            <li class="active">我的订单</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="btn-toolbar">
                     <div class="btn-group">
                    </div>
                </div>
                <div class="well">
                    <div class="row-fluid">
                        <div class="block span12">
                            <a href="#tablewidget" class="block-heading" data-toggle="collapse">我的预定房间列表（说明:以每天12:00为结算期）<span class="label label-warning">+<?php  echo $count; ?></span></a>
                            <div id="tablewidget" class="block-body collapse in">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>用户账号</th>
                                        <th>房间号</th>
                                        <th>房间类型</th>
                                        <th>房间等级</th>
                                        <th>订房时间</th>
                                        <th>退房时间</th>
                                        <th>单价</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                       foreach($data as $key=>$value){
                                        ?>
                                           <tr>
                                               <td><?php echo $value['r_u_acount'];  ?></td>
                                               <td><?php echo $value['r_number'];  ?></td>
                                               <td><?php echo $value['r_type']=='1'?"单人房间":"双人房间";  ?></td>
                                               <td><?php echo $value['r_grade']=='vip'?"VIP客房":"普通商务客房";  ?></td>
                                               <td><?php echo $value['r_start'];  ?></td>
                                               <td><?php echo $value['r_end'];  ?></td>
                                               <td><?php echo $value['r_price'];  ?></td>
                                           </tr>
                                         <?php
                                       }
                                     ?>
                                    <tr>
                                       <td >总价;</td>
                                        <td colspan="6">￥<?php echo $sumPrice; ?>.00</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <p>说明：<label>
                                         <?php
                                           if($flag == 0){
                                             echo '你的余额不足!你可以联系管理员充值，或者等待高层审核你的订单';
                                           }else{
                                               echo '你的订单已经生成!欢迎入住';
                                           }
                                        ?>
                                        </label></p>
                            </div>
                        </div>

                    </div>



                    <footer>
                        <hr>

                        <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
                        <p class="pull-right">@ <a href="http://www.portnine.com/bootstrap-themes" target="_blank">版权所有</a> by <a href="http://www.portnine.com" target="_blank">
                                php10天实训班
                            </a></p>

                        <p>&copy; 2013<a href="http://www.portnine.com" target="_blank">Portnine</a></p>
                    </footer>

                </div>
            </div>
        </div>




<?php  include_once $rootPath.'/module/public/footer.php'; ?>
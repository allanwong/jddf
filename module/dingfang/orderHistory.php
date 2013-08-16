<?php session_start(); ?>
<?PHP  include_once $rootPath.'/module/public/header.php';?>
<?php
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


?>
<?php include_once $rootPath.'/module/public/main_left.php'; ?>
<div class="content">

    <div class="header">

        <h1 class="page-title">订房模块</h1>
    </div>

    <ul class="breadcrumb">

        <li><a href="users.html">订单管理</a> <span class="divider">/</span></li>
        <li class="active">我的历史订单</li>
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
                        <a href="#tablewidget" class="block-heading" data-toggle="collapse">我的历史订单<span class="label label-warning">+<?php  echo $count; ?></span></a>
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
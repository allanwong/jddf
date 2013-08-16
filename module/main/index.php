<?php session_start(); ?>
<?PHP  include_once $rootPath.'/module/public/header.php';?>
<?php
  //实现查询
   $sql="SELECT u.u_acount, u.u_name, r.r_number, r.r_start, r.r_end, r.r_grade, r.r_type, r.r_price, r.r_room_is
FROM room AS r, users AS u
WHERE r.r_flag =1
AND r.r_u_acount = u.u_acount
LIMIT 0 , 30 ";
   $result=mysql_query($sql);
  // echo $sql;
   $data=array();
   while($rows=mysql_fetch_assoc($result)){
       $data[]=$rows;
   }
 $conut=count($data);

//统计查询 ---- 单人房间 VIP 客房统计  总数量  已经被预定的数量
$sql2="select r_flag from room where r_type='1' and r_grade='vip'";
 $result2=mysql_query($sql2);
 $data2=array();
while($rows=mysql_fetch_assoc($result2)){
    $data2[]=$rows;
}
$i=0;
$countOneVip=count($data2);
foreach($data2 as $value){
     if($value['r_flag'] == '1'){
         $i++;
     }
}

//单人房间 普通 客房统计
$sql3="select r_flag from room where r_type='1' and r_grade='pt'";
$result3=mysql_query($sql3);
$data3=array();
while($rows=mysql_fetch_assoc($result3)){
    $data3[]=$rows;
}
$j=0;
$countOnept=count($data3);
foreach($data3 as $value){
    if($value['r_flag'] == '1'){
        $j++;
    }
}
//双人房间 VIP 客房统计
$sql4="select r_flag from room where r_type='2' and r_grade='vip'";
$result4=mysql_query($sql4);
$data4=array();
while($rows=mysql_fetch_assoc($result4)){
    $data4[]=$rows;
}
$k=0;
$countTwoVip=count($data4);
foreach($data4 as $value){
    if($value['r_flag'] == '1'){
        $k++;
    }
}

//双人房间 普通 客房统计
$sql5="select r_flag from room where r_type='2' and r_grade='pt'";
$result5=mysql_query($sql5);
$data4=array();
while($rows=mysql_fetch_assoc($result5)){
    $data5[]=$rows;
}
$m=0;
$countTwopt=count($data5);
foreach($data5 as $value){
    if($value['r_flag'] == '1'){
        $m++;
    }
}
?>



<?php include_once $rootPath.'/module/public/main_left.php'; ?>
<div class="content">
        <ul class="breadcrumb">
            <li><a href="index.php">基础数据</a> <span class="divider">/</span></li>
            <li class="active">Home</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">
     <div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">酒店房间价格表</a>
        <div id="page-stats" class="block-body collapse in">

            <div class="stat-widget-container">
                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title">$1,500</p>
                        <p class="detail">尊贵套房</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title">$2,000</p>
                        <p class="detail">桃园套房</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title">$2,500</p>
                        <p class="detail">爵士套房</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title">$3,000</p>
                        <p class="detail">总统套房</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="block span12">
        <a href="#tablewidget" class="block-heading" data-toggle="collapse">最新用户订房信息<span class="label label-warning">+<?php echo $conut;  ?></span></a>
        <div id="tablewidget" class="block-body collapse in">
            <table class="table">
                <thead>
                <tr>
                    <th>身份证号</th>
                    <th>姓名</th>
                    <th>房号</th>
                    <th>预时间</th>
                    <th>退时间</th>
                    <th>房等级</th>
                    <th>房类型</th>
                    <th>房价格</th>
                    <th>是否成功</th>
                    <th>操作</th>
                </tr>
                </tr>
                </thead>
                <tbody>
                <?php
                   foreach ($data as $key=>$value){
                       ?>
                       <tr>
                           <td id="uacount_sh"><?php echo $value['u_acount']; ?></td>
                           <td><?php echo $value['u_name']; ?></td>
                           <td><?php echo $value['r_number']; ?></td>
                           <td><?php echo $value['r_start']; ?></td>
                           <td><?php echo $value['r_end']; ?></td>
                           <td><?php echo $value['r_grade']=="vip"?"vip客房":"普通客房"; ?></td>
                           <td><?php echo $value['r_type']=='1'?"单人房间":"双人房间"; ?></td>
                           <td><?php echo $value['r_price']; ?></td>
                           <td><?php echo $value['r_room_is']; ?></td>
                           <td style="cursor: pointer;" onclick="sh(this.id)" id="<?php echo $value['r_room_is']; ?>"><?php echo $value['r_room_is']=='y'?"成功订单":"需审核"; ?></td>
                       </tr>
                    <?php
                   }
                ?>

              </tbody>
            </table>
        </div>
    </div>

</div>


<div class="row-fluid">
    <div class="block span12">
        <div class="block-heading">
            <span class="block-icon pull-right">
                <a href="#" class="demo-cancel-click" rel="tooltip" title="Click to refresh"><i class="icon-refresh"></i></a>
            </span>

            <a href="#widget2container" data-toggle="collapse">统计面板</a>
        </div>
        <div id="widget2container" class="block-body collapse in">
            <table class="table list">
              <tbody>
                  <tr>
                      <td>
                          <p><i class="icon-user"></i>单人房间 VIP 客房统计</p>
                      </td>
                      <td>
                          <p>总数量:<?php  echo $countOneVip; ?></p>
                      </td>
                      <td>
                          <p>预定数量:<?php echo $i;  ?></p>

                      </td>
                  </tr>
                  <tr>
                      <td>
                          <p><i class="icon-user"></i> 单人房间 普通 客房统计</p>
                      </td>
                      <td>
                          <p>总数量:<?php  echo $countOnept; ?></p>
                      </td>
                      <td>
                          <p>预定数量:<?php echo $j;  ?></p>
                     </td>
                  </tr>
                  <tr>
                      <td>
                          <p><i class="icon-user"></i> 双人房间 VIP 客房统计</p>
                      </td>
                      <td>
                          <p>总数量:<?php  echo $countTwoVip; ?></p>
                      </td>
                      <td>
                          <p>预定数量:<?php echo $k; ?></p>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <p><i class="icon-user"></i>双人房间 普通 客房统计</p>
                      </td>
                      <td>
                          <p>总数量:<?php  echo $countTwopt; ?></p>
                      </td>
                      <td>
                          <p>预定数量:<?php echo $m; ?></p>
                      </td>
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
    



    




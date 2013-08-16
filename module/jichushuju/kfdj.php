<?php session_start(); ?>
<?PHP  include_once $rootPath.'/module/public/header.php';?>
<?php
  //查询单人房间信息
  $sql="select * from room";
  $res=mysql_query($sql);
  $datas=array();
  while($rows=mysql_fetch_assoc($res)){
       $datas[]=$rows;
  }
//对数组进行分组
$oneRoom=array();
$towRoom=array();
 foreach($datas as $key=>$value){
      if($value['r_type'] == '1'){
          $oneRoom[]=$value;
      }else if($value['r_type'] == '2'){
          $towRoom[]=$value;
      }
 }




?>


<?php include_once $rootPath.'/module/public/main_left.php'; ?>


    <div class="content">

        <div class="header">

            <h1 class="page-title">客房等级管理</h1>
        </div>

        <ul class="breadcrumb">

            <li><a href="users.html">客房等级管理</a> <span class="divider">/</span></li>
            <li class="active">客房等级设置</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="btn-toolbar">
                    <button class="btn btn-primary"><i class="icon-save"></i> 编辑</button>
                    <div class="btn-group">
                    </div>
                </div>
                <div class="well">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab">单人间</a></li>
                        <li><a href="#profile" data-toggle="tab">双人间</a></li>
                        <li><a href="#profile2" data-toggle="tab">房号编辑</a></li>
                    </ul>

                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active in" id="home">
                            <div class="block span12">
                                <a href="#tablewidget" class="block-heading" data-toggle="collapse">单人间房号列表</a>
                                <div id="tablewidget" class="block-body collapse in">
                                    <table class="table">
                                        <tbody>
                                          <!--查询单人房间信息-->
                                          <?php
                                             //循环单人房间
                                            foreach($oneRoom as $key=>$value){
                                               ?>
                                                <tr>
                                                    <td><span>房号:<?php echo $value['r_number'] ;  ?></span>
                                                        <label class="radio"><input type="checkbox" name="roomType" id="optionsRadios1"  <?php  if($value['r_grade'] == 'vip'){ ?> checked="true" <?php } ?> disabled="true">vip</label>
                                                        <label class="radio"><input type="checkbox" name="roomType2" id="optionsRadios1"   <?php  echo ($value['r_grade'] == 'pt')?"checked='checked''":null;     ?> disabled="true">普通</label>
                                                        <label class="radio"><input type="checkbox" name="roomType3" id="optionsRadios1"  <?php  echo ($value['r_flag'] == '1')?"checked='checked'":null;     ?> disabled="true">是否被预定</label>
                                                        <label class="radio">价格:<?php echo $value['r_price'];?></label>
                                                        <label class="radio" style="cursor: pointer;">详情</label>
                                                    </td>
                                                </tr>
                                             <?php
                                            }
                                           ?>
                                        </tbody>
                                    </table>
                                </div>
                               </div>
                        </div>
                        <div class="tab-pane fade" id="profile">
                            <div class="block span12">
                                <a href="#tablewidget" class="block-heading" data-toggle="collapse">双人间房号列表</a>
                                <div id="tablewidget" class="block-body collapse in">
                                    <table class="table">
                                        <tbody>
                                        <?php
                                        //循环双人房间
                                        foreach($towRoom as $key=>$value){
                                            ?>
                                            <tr>
                                                <td><span>房号:<?php echo $value['r_number'] ;  ?></span>
                                                    <label class="radio"><input type="checkbox" name="roomType" id="optionsRadios1"   <?php  echo ($value['r_grade'] == 'vip')?"checked='true'":null;     ?> disabled="true">vip</label>
                                                    <label class="radio"><input type="checkbox" name="roomType" id="optionsRadios1"   <?php  echo ($value['r_grade'] == 'pt')?"checked='true'":null;     ?> disabled="true">普通</label>
                                                    <label class="radio"><input type="checkbox" name="roomType" id="optionsRadios1"   <?php  echo ($value['r_flag'] == '1')?"checked='true'":null;     ?> disabled="true">是否被预定</label>
                                                    <label class="radio">价格:<?php echo $value['r_price'];?></label>
                                                    <label class="radio" style="cursor: pointer;">详情</label>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile2">
                            <form action="<?php echo $rootUri.'/include/actionkfdj.php'; ?>" method="post">
                            <label>房号编码:</label>
                            <input type="text"  class="input-xlarge span4" name="room_number">
                            <label>房间类型:</label>
                            <div class="controls">
                                <select id="selectError3" name="room_type">
                                    <option value="0">请选择房间类型</option>
                                    <option value="1">单人房间</option>
                                    <option value="2">双人房间</option>
                                </select>
                            </div>
                            <label>房间等级:</label>
                            <div class="controls">
                                <select id="selectError3" name="room_grade">
                                    <option>请选择房间等级</option>
                                    <option value="vip">vip客房</option>
                                    <option value="pt">普通客房</option>
                                </select>
                            </div>
                            <label>房间价格:</label>
                            <div class="controls">
                                <select id="selectError3" name="room_price">
                                    <option>请选择房间价格</option>
                                    <option value="180">$180</option>
                                    <option value="280">$280</option>
                                    <option  value="380">$380</option>
                                    <option value="480">$480</option>
                                    <option  value="588">$588</option>
                                </select>
                            </div>
                            <div>
                                <button class="btn btn-primary" name="qdlr">确定录入</button>
                            </div>
                            </form>
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
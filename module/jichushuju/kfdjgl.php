<?php session_start(); ?>
<?PHP  include_once $rootPath.'/module/public/header.php';?>
<?php include_once $rootPath.'/module/public/main_left.php'; ?>
<div class="content">

    <div class="header">

        <h1 class="page-title">客房订单管理</h1>
    </div>

    <ul class="breadcrumb">

        <li><a href="users.html">客房订单管理</a> <span class="divider">/</span></li>
        <li class="active">管理主界面</li>
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
                    <li class="active"><a href="#home" data-toggle="tab">查询订单</a></li>
                    <li><a href="#ddlist" data-toggle="tab">订单列表</a></li>
                    <li><a href="#profile" data-toggle="tab">审核订单</a></li>

                </ul>
            <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="home">
                        <div class="block span12">
                            <a href="#tablewidget" class="block-heading" data-toggle="collapse">查询各等级客房在指定时间的预定数量</a>
                           <label>请选择开始时间:</label>
                            <input type="text" class="input-xlarge datepicker" id="date03" name="b_date">
                            <label>请选择结束时间:</label>
                            <input type="text" class="input-xlarge datepicker" id="date04" name="b_date">
                            <label >请选择等级:</label>
                            <label class="radio"><input type="radio" name="bank2" id="optionsRadios1" value="vip" >vip客房</label>
                            <label class="radio"><input type="radio" name="bank2" id="optionsRadios1" value="pt" >普通客房</label>
                            <div>
                                <button class="btn btn-primary" name="sjcx">确定</button>
                            </div>
                        </div>
                        <div class="block">
                            <a href="#tablewidget" class="block-heading" data-toggle="collapse">最新用户订房信息<span class="label label-warning">+10</span></a>
                            <div id="tablewidget" class="block-body collapse in">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Mark</td>
                                        <td>Tompson</td>
                                        <td>the_mark7</td>
                                    </tr>
                                    <tr>
                                        <td>Ashley</td>
                                        <td>Jacobs</td>
                                        <td>ash11927</td>
                                    </tr>
                                    <tr>
                                        <td>Audrey</td>
                                        <td>Ann</td>
                                        <td>audann84</td>
                                    </tr>
                                    <tr>
                                        <td>John</td>
                                        <td>Robinson</td>
                                        <td>jr5527</td>
                                    </tr>
                                    <tr>
                                        <td>Aaron</td>
                                        <td>Butler</td>
                                        <td>aaron_butler</td>
                                    </tr>
                                    <tr>
                                        <td>Chris</td>
                                        <td>Albert</td>
                                        <td>cab79</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                          </div>
                    </div>
                    <div class="tab-pane fade" id="ddlist">
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
                    <div class="tab-pane fade" id="profile">
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
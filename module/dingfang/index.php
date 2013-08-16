<?php session_start(); ?>
<?PHP  include_once $rootPath.'/module/public/header.php';?>
<?php include_once $rootPath.'/module/public/main_left.php'; ?>
<div class="content">

    <div class="header">

        <h1 class="page-title">订房模块</h1>
    </div>

    <ul class="breadcrumb">

        <li><a href="users.html">订房管理</a> <span class="divider">/</span></li>
        <li class="active">我的订房</li>
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
                    <li class="active"><a href="#home" data-toggle="tab">订房设置</a></li>

                </ul>

                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="home">
                        <div class="block span12">
                            <a href="#tablewidget" class="block-heading" data-toggle="collapse">选房参数设置</a>
                            <div id="tablewidget" class="block-body collapse in">

                                    <label>请选择房间类型</label>
                                    <div class="controls">
                                        <label class="radio"><input type="checkbox" name="roomType" id="roomCheck1" class="roomCheck" value="1">单人房间</label>
                                        <label class="radio"><input type="checkbox" name="roomType2" id="roomCheck2" class="roomCheck" value="2">双人房间</label>
                                    </div>
                                    <label>请选择房间等级</label>
                                    <div class="controls">
                                        <label class="radio"><input type="checkbox" name="roomgrade" id="roomCheck3" class="roomCheck" value="vip">VIP客房</label>
                                        <label class="radio"><input type="checkbox" name="roomgrade2" id="roomCheck4" class="roomCheck" value="pt">普通客房</label>
                                    </div>
                                    <label>请选择价格</label>
                                    <div class="controls">
                                        <label class="radio"><input type="checkbox" name="roomPrice" id="roomCheck5" class="roomCheck" value="180.00">180</label>
                                        <label class="radio"><input type="checkbox" name="roomPrice2" id="roomCheck6" class="roomCheck" value="280.00">280</label>
                                        <label class="radio"><input type="checkbox" name="roomPrice3" id="roomCheck7" class="roomCheck" value="380.00">380</label>
                                        <label class="radio"><input type="checkbox" name="roomPrice4" id="roomCheck8" class="roomCheck" value="480.00">480</label>
                                        <label class="radio"><input type="checkbox" name="roomPrice5" id="roomCheck9" class="roomCheck" value="588.00">588</label>
                                    </div>
                                <label>请设置时间</label>
                                <div class="controls">
                                    <label class="radio">开始: <input type="text" class="input-xlarge datepicker" id="date01" name="start"></label>
                                    <label class="radio">结束: <input type="text" class="input-xlarge datepicker" id="date02" name="end"></label>
                                </div>
                                    <div>
                                        <button class="btn btn-primary" name="csqd"  id="csqd">参数确定</button>
                                    </div>
                                <div id="demoDiv" >


                                </div>


                            </div>
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
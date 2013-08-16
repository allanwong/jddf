<?php session_start(); ?>
<?PHP  include_once $rootPath.'/module/public/header.php';?>
<?php
 //查询出所有的普通用户 u_acount 帐号 u_name
 $sql="select u_acount,u_name from users where u_type='g'";
 $res=mysql_query($sql);
 $data=array();
 while($rows=mysql_fetch_assoc($res)){
   $data[]=$rows;
 }

//充值流水号
 $b_number='ABC'.time();




?>


<?php include_once $rootPath.'/module/public/main_left.php'; ?>
<div class="content">

        <div class="header">
            <h1 class="page-title">账户余额充值</h1>
        </div>

        <ul class="breadcrumb">

            <li><a href="users.html">账户余额管理</a> <span class="divider">/</span></li>
            <li class="active">余额充值</li>
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
                        <li class="active"><a href="#home" data-toggle="tab">票据信息</a></li>
                        <li><a href="#profile" data-toggle="tab">修改银行账号</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active in" id="home">
                            <form id="tab" action="<?php echo $rootUri.'/include/actionUser.php'; ?>" method="post">
                                <!----查询出所有的普通用户--->
                                <label>充值用户名：</label>
                                <select name="u_acount">
                                    <option value="0">请选择充值用户</option>
                                    <?php
                                       foreach($data as $key=>$value){
                                           ?>

                                           <option value="<?php echo $value['u_acount']; ?>"><?php  echo $value['u_name'];?></option>
                                           <?php
                                       }
                                    ?>
                                 </select>
                                <label>银行账户号：</label>
                                 <!----去查询这个用户是否有银行账号-------->
                                <input type="text"  class="input-xlarge" name="b_acount" >
                                <div class="khh">
                                    <label >开户行：</label>
                                    <!--如果有账号就设为选中---->
                                    <label class="radio"><input type="radio" name="bank" id="optionsRadios1" value="zh" >中国银行 </label>
                                    <label class="radio"><input type="radio" name="bank" id="optionsRadios1" value="jc" >建设银行</label>
                                    <label class="radio"><input type="radio" name="bank" id="optionsRadios1" value="gs" >工商银行</label><br>
                                    <label class="radio"><input type="radio" name="bank" id="optionsRadios1" value="ly">农业银行</label>
                                    <label class="radio"><input type="radio" name="bank" id="optionsRadios1" value="ms">民生银行</label>
                                    <label class="radio"><input type="radio" name="bank" id="optionsRadios1" value="xy">兴业银行</label>

                                </div>





                                <label>充值流水号：</label>
                                <input type="text"  class="input-xlarge" name="b_number" value="<?php echo $b_number;?>" disabled="true">
                                <label>充值金额:</label>
                                <input type="text" class="input-xlarge" name="b_money">
                                <label>充值时间</label>
                                 <input type="text" class="input-xlarge datepicker" id="date01" name="b_date">
                                <br><button class="btn btn-primary" name="backBut">确定</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="profile">
                            <form id="tab2">
                                <label>新的开户行：</label>
                                <label>开户行：</label>
                                <label class="radio2"><input type="radio" name="bank2" id="optionsRadios1" value="zh" >中国银行 </label>
                                <label class="radio2"><input type="radio" name="bank2" id="optionsRadios1" value="jc" >建设银行</label>
                                <label class="radio2"><input type="radio" name="bank2" id="optionsRadios1" value="gs" >工商银行</label><br>
                                <label class="radio2"><input type="radio" name="bank2" id="optionsRadios1" value="ly">农业银行</label>
                                <label class="radio2"><input type="radio" name="bank2" id="optionsRadios1" value="ms">民生银行</label>
                                <label class="radio2"><input type="radio" name="bank2" id="optionsRadios1" value="xy">兴业银行</label>


                                <label>新的银行账户号：</label>
                                <input type="password"  class="input-xlarge">
                                <div>
                                    <button class="btn btn-primary">Update</button>
                                </div>
                            </form>
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
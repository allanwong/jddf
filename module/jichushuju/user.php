<?php session_start(); ?>
<?PHP  include_once $rootPath.'/module/public/header.php';?>
 <?php include_once $rootPath.'/module/public/main_left.php'; ?>


<div class="content">

    <div class="header">

        <h1 class="page-title">创建用户账户</h1>
    </div>

    <ul class="breadcrumb">

        <li><a href="users.html">用户管理</a> <span class="divider">/</span></li>
        <li class="active">创建新用户</li>
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
                    <li class="active"><a href="#home" data-toggle="tab">基本数据</a></li>
                    <li><a href="#profile" data-toggle="tab">修改密码</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="home">
                        <form id="tab" name="formUserInfo" method="post" action="<?php echo $rootUri.'/include/actionUser.php';  ?>" onsubmit="return checkformUserInfo()">
                            <label>用户账号（身份证号码）：</label>
                            <input type="text"  class="input-xlarge" name="acc" >
                            <label>用户名：</label>
                            <input type="text"  class="input-xlarge" name="uNameaa" >
                            <span class="showMsg" ></span>
                            <label>密  码：</label>
                            <input type="password"  class="input-xlarge" name="uPwd">
                            <span class="showMsg2" ></span>
                            <label>联系电话</label>
                            <input type="text"  class="input-xlarge" name="uPhone">
                            <span class="showMsg3" ></span>
                            <label>QQ号码</label>
                            <input type="text" class="input-xlarge" name="uQQ">
                            <label>Email邮件</label>
                            <input type="text"  class="input-xlarge" name="uEmail">
                            <label>家庭住址:</label>
                            <textarea value="Smith" rows="3" class="input-xlarge" name="uAddrs" ></textarea>
                            <label>注册时间</label>
                            <input type="text" class="input-xlarge datepicker" id="date02" name="uDate">
                            <br><button class="btn btn-primary" name="ubtn">确定</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="profile">
                           <label>请输入你的新密码:</label>
                            <input type="password" class="input-xlarge" name="passwordUpdateData">
                            <div>
                                <button class="btn btn-primary" name="updateUserPwd" >Update</button>
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
    



    




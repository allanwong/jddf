<?php
session_start();
//程序逻辑部分：
$title="酒店订房系统登录";
//判断是否存在cookie['remember']
if(isset($_COOKIE['remember'])){
    //获取cookie
    $userLoginInfo=$_COOKIE['remember'];
    //字符串分割，获取用户名 和 密码
    $userInfo=explode('@',$userLoginInfo); //返回一个数组
    $username=$userInfo[0]; //分割后的第一个元素是 用户名
    $userassword=$userInfo[1]; //分割后的第二个元素是 密码
}


include_once $rootPath.'/module/public/header.php';

?>


<div class="container-fluid">
    <div class="row-fluid">

        <div class="row-fluid">
            <div class="span12 center login-header">
                <h2>酒店订房系统登录界面</h2>
            </div><!--/span-->
        </div><!--/row-->

        <div class="row-fluid">
            <div class="well span5 center login-box">
                <div class="alert alert-info control-group error">
                    <!--有好提示：-->
                    <?php
                       if($_COOKIE['cs'] == 4){
                       ?>
                           <label class="control-label" for="inputError">你的账号将暂时锁定,请等一会儿再试!</label>
                       <?php
                       }

                    //判断$_SESSION['status'] == 'e' 表示登陆失败 并提示
                    if( $_SESSION['status'] === 'e'){
                        // 提示错误
                       ?>
                       <label class="control-label" for="inputError">登陆失败，请再试一试!</label>
                     <?php
                    }else{

                        ?>
                        请输入你的用户名和密码
                    <?php
                    }
                   ?>
                </div>
                <form class="form-horizontal" action="<?php echo $rootUri.'/include/actionLogin.php'  ?>" method="post">
                    <fieldset>
                         <div class="input-prepend control-group" id="username" title="请输入用户名" data-rel="tooltip" for="inputborder">
                            <span class="add-on"><i class="icon-user"></i></span>
                            <input type="text" class="input-large span10" name="username" value="<?echo $username; ?>"  onblur="checkName(this.value)" onfocus="setName()">
                         </div>
                        <div class="clearfix"></div>
                        <div class="input-prepend control-group" title="请输入密码" id="password" data-rel="tooltip" for="inputborder">
                            <span class="add-on"><i class="icon-lock"></i></span>
                            <input class="input-large span10" name="password"  value="<?php echo $userassword; ?>" type="password"  onblur="checkpwd(this.value)" onfocus="setpwd()"/>
                        </div>
                        <div class="clearfix"></div>
                        <div class="input-prepend control-group"  id="yzmCode"  for="inputborder"  data-rel="popover" data-content="请输入验证码">
                            <span class="add-on"><i class="icon-pencil"></i></span>
                            <input class="input-large span10"   name="yzm"  type="text"  onblur="checkyzm(this.value)" onfocus="setyzm()" />
                        </div>
                        <div class="clearfix"></div>
                        <div class="input-prepend">
                             <img  src="<?php echo $rootUri?>/common/yzmCode.php" title="看不清，清猛点这里!" style="cursor: pointer; " onclick="changePic(this)" >
                        </div>
                        <div class="clearfix"></div>

                        <div class="input-prepend">
                            <label class="remember" for="remember">
                                <input type="checkbox" id="remember" name="remember"  value="remember"/>记住我!</label>
                        </div>
                        <div class="clearfix"></div>

                        <p class="center span5">
                            <button type="submit" name="dl" class="btn btn-primary" <?php   echo  $_COOKIE['cs'] == 4 ? 'disabled=""':''; ?>  >登录</button>
                        </p>
                    </fieldset>
                </form>
            </div><!--/span-->
        </div><!--/row-->
    </div><!--/fluid-row-->

</div><!--/.fluid-container-->
<?php  include_once $rootPath.'/module/public/footer.php'; ?>

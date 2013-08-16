<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rjgcxy
 * Date: 13-7-22
 * Time: 上午10:59
 * To change this template use File | Settings | File Templates.
 */
//加载配置文件
require_once '../config/config.php';
header("refresh:3;url=$rootUri");
?>
<?PHP  include_once $rootPath.'/module/public/header.php';?>


<div class="row-fluid">
    <div class="http-error">
        <h1>Oops!</h1>
        <p class="info">欢迎你下次再来!谢谢使用</p>
        <p><i class="icon-home"></i></p>
        <p><a href="<?php echo $rootUri;  ?>">系统将在3秒后,跳转到登录页面</a></p>
    </div>
</div>
<?php  include_once $rootPath.'/module/public/footer.php'; ?>

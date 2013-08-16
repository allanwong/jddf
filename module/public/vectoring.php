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
//@header("refresh:3;url=$uriPath");
?>
<?PHP  include_once $rootPath.'/module/public/header.php';?>
<meta http-equiv="refresh" content="3;url=<?php echo $uriPath;?>">
<div class="row-fluid">
    <div class="http-error">
        <h1>Oops!</h1>
        <p class="info"><?php echo $msg;?></p>
        <p><i class="icon-home"></i></p>
        <p><a href="<?php echo $uriPath;?>">系统将在3秒后，自动跳转</a></p>
        <p><a href="<?php echo $uriPath;?>">如果没有跳转请点击这里</a></p>
    </div>
</div>
<?php  include_once $rootPath.'/module/public/footer.php'; ?>

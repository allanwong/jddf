<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-7-18
 * Time: 下午2:39
 * To change this template use File | Settings | File Templates.
 */
?>
<?PHP  include_once $rootPath.'/module/public/header.php';?>
<div class="row-fluid">
    <div class="http-error">
        <h1>Oops!</h1>
        <p class="info">你访问的文件不存在.</p>
        <p><i class="icon-home"></i></p>
        <p><a href="<?php echo $rootUri ?>/index.php?m=denglu">点击回到首页</a></p>
    </div>
</div>
<?php  include_once $rootPath.'/module/public/footer.php'; ?>


<style type="text/css">
    #line-chart {
        height:300px;
        width:800px;
        margin: 0px auto;
        margin-top: 1em;
    }
    .brand { font-family: georgia, serif; }
    .brand .first {
        color: #ccc;
        font-style: italic;
    }
    .brand .second {
        color: #fff;
        font-weight: bold;
    }
</style>
<div class="navbar">
    <div class="navbar-inner">
        <ul class="nav pull-right">

            <li id="fat-menu" >
                <a href="#"  class="dropdown-toggle" >
                    <i class="icon-user"></i>
                    <?php
                      if($_SESSION['userOnline'] == 'admin'){
                          ?>
                          管理员<?php echo  $_SESSION['userOnline'];  ?>
                      <?php
                      }else{
                          ?>
                          房客  <?php echo  $_SESSION['userOnline'];  ?>
                    <?php
                      }
                     ?>
                     欢迎回来
                </a>
            </li>
            <li><a href="<?php echo $rootUri ?>/include/outLogin.php" class="hidden-phone visible-tablet visible-desktop" role="button">
              <i class="icon-off"></i>退出登录</a></li>
            <li><a href="#" class="hidden-phone visible-tablet visible-desktop" role="button">模板设置</a></li>
        </ul>
        <a class="brand" href="index.php"><span class="second">酒店管理系统</span></a>

    </div>
</div>
<div class="sidebar-nav">
    <!---依据不同的用户显示不同的功能
       如果是普通用户登录
    --->
    <?php
       if($_SESSION['userOnline'] == 'admin'){
           ?>
           <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>基础数据<span class="label label-info">+4</span></a>
           <ul id="dashboard-menu" class="nav nav-list collapse in">
               <li><a href="<?php echo $rootUri ?>/index.php?m=main">Home</a></li>
               <li><a href="<?php echo $rootUri ?>/index.php?m=jichushuju&a=user">用户账户管理</a></li>
               <li ><a href="<?php echo $rootUri ?>/index.php?m=jichushuju&a=money">账户余额管理</a></li>
               <li ><a href="<?php echo $rootUri ?>/index.php?m=jichushuju&a=kfdj">客房管理</a></li>

           </ul>
    <?php
       }else{
         ?>
           <a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>订房模块<span class="label label-info">+3</span></a>
           <ul id="accounts-menu" class="nav nav-list collapse">
               <li ><a href="<?php echo $rootUri; ?>/index.php?m=dingfang&a=index">我要订房</a></li>
               <li ><a href="<?php echo $rootUri; ?>/index.php?m=dingfang&a=myorder">我的订单</a></li>
               <li ><a href="<?php echo $rootUri; ?>/index.php?m=dingfang&a=orderHistory">历史订单</a></li>
           </ul>
    <?php
       }
    ?>


</div>
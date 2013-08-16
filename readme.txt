php的全局数组
  $_SERVER
    [SERVER_NAME] => 127.0.0.1 服务器域名
    [SERVER_ADDR] => 127.0.0.1 服务器ip
    [SERVER_PORT] => 80  端口
    [REMOTE_ADDR] => 127.0.0.1 客户端ip
    [DOCUMENT_ROOT] => D:/Zend/Apache2/htdocs  服务器根目录
    [SCRIPT_FILENAME] => D:/Zend/Apache2/htdocs/demo/demo3.php

   数据传递的一种方式
   $_POST  使用form表单传递数据
   $_GET    form 需要指定传递方式为 get ,通常我们习惯指通过url地址栏传递数据。


   $_COOKIE
     设置cookie  setcookie("cookie名称",cookie值,cookie的过期时间);
     setcookie("name",'zhangsan',time()+180);

    time()  返回的是从1970-1-1-1 0:0:0 到目前为止的秒

   $_SESSION

      //打开session
              session_start();  注意session_start() 前面不能有输出语句
              $_SESSION['KEY']="value"
     
 

函数： 
  is_...

  is_array()  检测变量是否是数组



is_dir — 判断给定文件名是否是一个目录


is_file — 判断给定文件名是否为一个正常的文件  

is_int — 检测变量是否是整数

is_null — 检测变量是否为 NULL 

is_numeric — 检测变量是否为数字或数字字符串

变量判断函数

  isset()  ---判断一个变量是否存在
  empty()   ---判断一个变量为空 返回true

php的加载函数
  require  include


php常用字符串函数
  strlen — 获取字符串长度
  strstr -返回搜索到字符之后的字符串
  substr — 返回字符串的子串
  str_replace — 子字符串替换
  str_shuffle — 随机打乱一个字符串

php常用的数组函数
  range — 建立一个包含指定范围单元的数组
  array_rand — 从数组中随机取出一个或多个单元
  array_merge — 合并一个或多个数组 
  array_search — 在数组中搜索给定的值，如果成功则返回相应的键名 
  in_array — 检查数组中是否存在某个值
  
  end — 将数组的内部指针指向最后一个单元 
  list — 把数组中的值赋给一些变量 
  count — 计算数组中的单元数目或对象中的属性个数
 
php时间函数 
  date("Y-m-d H:i:s",time());
php web
   form表单


---mysql数据库操作

 CREATETABLE`user` (
 `id` INT NOTNULLAUTO_INCREMENTPRIMARYKEY ,
 `name` VARCHAR( 30)NOTNULL ,
 `pwd` VARCHAR( 30)NOTNULL 
) ENGINE=MYISAM ;

  

----php操作数据库

-----项目目录

  
  jddf.com--酒店订房系统
    ---common ---系统公共目录
    ---config ---系统配置目录
    ---include  ---业务逻辑处理 
    ---static  ---静态公共目录
       ----style  ---css样式
       ----js     ---js脚本文件
       ----images  ---图片文件
       ----plug    ---插件文件
    ----index.php   ---入口文件
    ---module      ---模块文件
        ---denglu  ---登录模块
            ----index.php
       ---jichushuju  ---基础数据模块
       ---dingfang    ----订房模块


系统约定：
    模块调用约定：
       http://127.0.0.1/jddf.com/index.php?m=模块名


    开发环境约定：
      config/config.php 
      $env=1; 开发环境  http://127.0.0.1/appName
	  $env=2; 生产环境   http://127.0.0.1/-->指向工程目录


数据库见表

	u_id  int primary key auto increment;改表得顺序id
	u_account  char(30) not null;用户帐号
	u_name char(30) not null;用户名
	u_pwd  char(30) not null;密码
	u_type char(4) not null; 用户类型 s=系统用户 g=客户用户 
	u_islock tinyint not null define 0 ;  用户的账户是否锁定 如果是1--锁定 0--开启
	u_phone char(20) not null;客户电话
	u_money decimal(8,2) null;用户的账户余额
	
表引擎 -myisam

http://localhost/jddf/index.php?m=module&a=filename
 
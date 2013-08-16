<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-7-17
 * Time: 上午10:23
 * To change this template use File | Settings | File Templates.
 */
//声明当前验证码的类型
header("Content-type: image/png");
//打开session
session_start();
//准备数据
$nuberArr=range(1,9);
$lower=range('a','z');
$upper=range('A','Z');
//数组合并
$data=array_merge($nuberArr,$lower,$upper);
 //随机打乱
shuffle($data);
//取出其中4个元素
$dataKeys=array_rand($data,4);
//验证码字符串组装
$yzmcode='';
for($i=0;$i<4;$i++){
    $yzmcode.=$data[$dataKeys[$i]];
}
$_SESSION['yzmStr']=$yzmcode;
//创建图片
$im=imagecreatetruecolor(85,35); //创建画布
$color=imagecolorallocate($im,186,48,160); //设置画布颜色
imagefill($im,0,0,$color); //填充颜色
$fontcolor=imagecolorallocate($im,65,236,98); //设置文字颜色
$fontfile='../static/fonts/segoeprb.ttf'; //设置字体样式
imagettftext($im,14,8,14,26,$fontcolor,$fontfile,$yzmcode); //填充字体
imagepng($im); //显示图形
imagedestroy($im); //销毁资源





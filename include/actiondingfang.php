<?php
require_once '../config/config.php';
require_once '../common/dbConnect.php';
if(isset($_POST['args'])){
//获取数据
    extract($_POST);
//保存时间参数
    $_SESSION['start']=$start;
    $_SESSION['end']=$end;
//分割字符串
    $arr=explode(',',$args);
    $data=array();
    foreach($arr as $key=>$value){
        $s=explode(':',$value);
        $data[$s[0]]=$s[1];
    }
    extract($data);
//构建查询sql
    $where='';
    $where2='';
    $where3='';
//房间类型
    if(isset($roomType) && isset($roomType2)){
        $where.='(r_type="'.$roomType.'"  or  r_type="'.$roomType2.'")';
    }else if(isset($roomType)){
        $where.='(r_type="'.$roomType.'")';
    }else  if(isset($roomType2)){
        $where.='(r_type="'.$roomType2.'")';
    }

//房间等级
    if(isset($roomgrade) && isset($roomgrade2)){
        $where2.='(r_grade="'.$roomgrade.'" or r_grade="'.$roomgrade2.'")';
    }else if(isset($roomgrade)){
        $where2.='(r_grade="'.$roomgrade.'")';
    }else if(isset($roomgrade2)){
        $where2.='(r_grade="'.$roomgrade2.'")';
    }
//房间价格roomPrice
    if(isset($roomPrice) && isset($roomPrice2) && isset($roomPrice3)&& isset($roomPrice4)&& isset($roomPrice5)){
        $where3.=' (r_price="'.$roomPrice.'" or  r_price="'.$roomPrice2.'" or  r_price="'.$roomPrice3.'" or  r_price="'.$roomPrice4.'"or r_price="'.$roomPrice5.'")';
    }else if(isset($roomPrice) && isset($roomPrice2) && isset($roomPrice3)&& isset($roomPrice4)){
        $where3.=' (r_price="'.$roomPrice.'" or r_price="'.$roomPrice2.'" or r_price="'.$roomPrice3.'" or r_price="'.$roomPrice4.'")';
    }else if(isset($roomPrice) && isset($roomPrice3) && isset($roomPrice4)&& isset($roomPrice5)){
        $where3.=' (r_price="'.$roomPrice.'" or r_price="'.$roomPrice3.'" or r_price="'.$roomPrice4.'" or r_price="'.$roomPrice5.'")';
    }else if(isset($roomPrice) && isset($roomPrice2) && isset($roomPrice4)&& isset($roomPrice5)){
        $where3.=' (r_price="'.$roomPrice.'" or r_price="'.$roomPrice2.'" or r_price="'.$roomPrice4.'" or r_price="'.$roomPrice5.'")';
    }else if(isset($roomPrice2) && isset($roomPrice3) && isset($roomPrice4)&& isset($roomPrice5)){
        $where3.=' (r_price="'.$roomPrice2.'" or r_price="'.$roomPrice3.'" or r_price="'.$roomPrice4.'" or r_price="'.$roomPrice5.'")';
    }else if(isset($roomPrice) && isset($roomPrice2) && isset($roomPrice3)){
        $where3.=' (r_price="'.$roomPrice.'" or r_price="'.$roomPrice2.'" or r_price="'.$roomPrice3.'")';
    }else if(isset($roomPrice) && isset($roomPrice2) && isset($roomPrice4)){
        $where3.=' (r_price="'.$roomPrice.'" or r_price="'.$roomPrice2.'" or r_price="'.$roomPrice4.'")';
    }else if(isset($roomPrice) && isset($roomPrice2) && isset($roomPrice5)){
        $where3.=' (r_price="'.$roomPrice.'" or r_price="'.$roomPrice2.'" or r_price="'.$roomPrice5.'")';
    }else if(isset($roomPrice) && isset($roomPrice3) && isset($roomPrice4)){
        $where3.=' (r_price="'.$roomPrice.'" or r_price="'.$roomPrice3.'" or r_price="'.$roomPrice4.'")';
    } else if(isset($roomPrice) && isset($roomPrice3) && isset($roomPrice5)){
        $where3.=' (r_price="'.$roomPrice.'" or r_price="'.$roomPrice3.'" or r_price="'.$roomPrice5.'")';
    }else if(isset($roomPrice) && isset($roomPrice4) && isset($roomPrice5)){
        $where3.=' (r_price="'.$roomPrice.'" or r_price="'.$roomPrice4.'" or r_price="'.$roomPrice5.'")';
    }else if(isset($roomPrice2) && isset($roomPrice3) && isset($roomPrice4)){
        $where3.='(r_price="'.$roomPrice2.'" or r_price="'.$roomPrice3.'" or r_price="'.$roomPrice4.'")';
    }else if(isset($roomPrice2) && isset($roomPrice4) && isset($roomPrice5)){
        $where3.=' (r_price="'.$roomPrice2.'" or r_price="'.$roomPrice4.'" or r_price="'.$roomPrice5.'")';
    } else if(isset($roomPrice) && isset($roomPrice2)){
        $where3.=' (r_price="'.$roomPrice.'" or r_price="'.$roomPrice2.'")';
    }else if(isset($roomPrice) && isset($roomPrice3)){
        $where3.=' (r_price="'.$roomPrice.'" or r_price="'.$roomPrice3.'")';
    }else if(isset($roomPrice) && isset($roomPrice4)){
        $where3.=' (r_price="'.$roomPrice.'" or r_price="'.$roomPrice4.'")';
    }else if(isset($roomPrice) && isset($roomPrice5)){
        $where3.=' (r_price="'.$roomPrice.'" or r_price="'.$roomPrice5.'")';
    }else if(isset($roomPrice2) && isset($roomPrice3)){
        $where3.=' (r_price="'.$roomPrice2.'" or r_price="'.$roomPrice3.'")';
    }else if(isset($roomPrice2) && isset($roomPrice4)){
        $where3.=' (r_price="'.$roomPrice2.'" or r_price="'.$roomPrice4.'")';
    }else if(isset($roomPrice2) && isset($roomPrice5)){
        $where3.=' (r_price="'.$roomPrice2.'" or r_price="'.$roomPrice5.'")';
    }else if(isset($roomPrice3) && isset($roomPrice4)){
        $where3.=' (r_price="'.$roomPrice3.'" or r_price="'.$roomPrice4.'")';
    }else if(isset($roomPrice3) && isset($roomPrice5)){
        $where3.=' (r_price="'.$roomPrice3.'" or r_price="'.$roomPrice5.'")';
    }else if(isset($roomPrice4) && isset($roomPrice5)){
        $where3.=' (r_price="'.$roomPrice4.'" or r_price="'.$roomPrice5.'")';
    }else if(isset($roomPrice)){
        $where3.=' (r_price="'.$roomPrice.'")';
    }else if(isset($roomPrice2)){
        $where3.=' (r_price="'.$roomPrice2.'")';
    }else if(isset($roomPrice3)){
        $where3.=' (r_price="'.$roomPrice3.'")';
    }else if(isset($roomPrice4)){
        $where3.=' (r_price="'.$roomPrice4.'")';
    }else if(isset($roomPrice5)){
        $where3.=' (r_price="'.$roomPrice5.'")';
    }
//构建sql  select * from room where  r_type=“$roomType2." or  sss=bvvv;
    $sql="select * from room where $where and $where2 and $where3 and (r_flag='0')";
//抛出异常
    try{
//执行sql
        $result=mysql_query($sql);
//声明数组
        $data=array();
//循环取出数据
        while($rows=mysql_fetch_assoc($result)){
            $data[]=$rows;
        }
    }catch (Exception $e){
        echo "参数不完整，sql出错";
    }
    $contentData="";
    foreach($data as $key=>$values){
        $contentData.="<tr>
    <td>$values[id]</td>
    <td>$values[r_number]</td>
    <td>$values[r_type]</td>
    <td>$values[r_grade]</td>
    <td> $values[r_price]</td>
    <td><input type='checkbox' name='myroom_{$key}' value='$values[r_number]'></td></tr>";
    }
    $html_text="
<form action={$rootUri}/include/actiondingfang.php  method=post>
    <table>
        <tr><th>序列号</th><th>房间编号</th><th>房间类型</th><th>房间等级</th><th>房间价格</th><th>确定订房</th></tr>
        $contentData
    </table>
    <input type='submit' name='myFormxf' value='确定提交'>
</form>";
    echo $html_text;
}
//处理用户的数据
if(isset($_POST['myFormxf'])){
//查询出当前登录用户的账号--身份证号码
    $uname=$_SESSION['userOnline'];
    $sql="select u_acount from users where u_name='$uname' ";//查询当前用户的账号
    $result=mysql_query($sql);
    $data2=mysql_fetch_assoc($result);
    if(empty($_SESSION['uacount'])){
        $_SESSION['uacount']=$data2['u_acount'];
    }
    $uacount=$_SESSION['uacount'];
    $start=$_SESSION['start'];
    $end=$_SESSION['end'];
//构建修改语句where 条件
    $where4='';
    foreach($_POST as $key=>$vlaue){
        if($key != 'myFormxf'){
            $where4.= '"'.$_POST[$key].'",';
        }
    }
    $where5=substr($where4,0,strlen($where4)-1);
//修改订房表
    $sql2="update room set r_flag='1',r_u_acount='$uacount',r_start='$start',r_end='$end' where r_number in($where5)";
    $res=mysql_query($sql2);
    if($res){
        $uriPath=$rootUri.'/index.php?m=dingfang&a=myorder';  //友好提示页面的变量
        $msg='订房成功！等待审核'; //友好提示页面的变量
        include_once $rootPath.'/module/public/vectoring.php';
    }
}


//判断是否需要修改
if(isset($_POST['issh'])){
     $uacount_sh=$_POST['uacount_sh'];
     $sql="update room set r_room_is='y' where r_flag=1 and r_u_acount =$uacount_sh";
     $result=mysql_query($sql);
    if($result){
         echo '1';
    }
}
/**
 * Created with JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-7-17
 * Time: 上午11:16
 * To change this template use File | Settings | File Templates.
 */
//检测用户名--光标移出文本框
function checkName(value){
     if(value == ''){
        $('#username').addClass('error');
       }else{
         $('#username').addClass('success');
     }
}
//光标移入文本框
function setName(){
    $('#username').removeClass('error');
}

//光标移出密码框

function checkpwd(value){
    if(value == ''){
        $('#password').addClass('error');
    }else{
        $('#password').addClass('success');
    }
}
//光标移入文本框
function setpwd(){
    $('#password').removeClass('error');
}
//光标移出验证码框
function checkyzm(value){
    if(value == ''){
        $('#yzmCode').addClass('error');
    }else{
        $('#yzmCode').addClass('success');
    }
}
//光标移入文本框
function setyzm(){
    $('#yzmCode').removeClass('error');
}
//更换验证码
 function changePic(o){
    var _src= o.src;
     o.src=_src+'?'+Math.random();
 }
/**
 * 管理员新增用户 检测用户是否存在
 */

$(document).ready(function(){
     //正则验证 ajax 验证用户名密码
   $('input[name="uNameaa"]').bind("blur",function(){
       var vv=$(this).val();
       $.post('/jddf.com/include/actionUser.php',{ajax_uname:vv},function(data){
            if(data == '1'){
                 $('.showMsg').css({color:"red","fontSize":"12px"}).text("用户名已经被占用，请更换一个");
               }else{
                $('.showMsg').css({color:"blue","fontSize":"12px"}).text("用户名可以使用");
            }
         });
       });


    //ajax修改用户密码 ---//ajax技术实现--密码修改 ---在php中实现正则验证
     $('button[name="updateUserPwd"]').bind("click",function(){
         var val=$('input[name="passwordUpdateData"]').val();
         $.post('/jddf.com/include/actionUser.php',{"passwordValue":val},function(data){
           // alert(data);
           if(data == '1'){
                 $.right({msg:"修改成功!",title:"酒店订房系统提示"});
             }else{
                 $.error({msg:"修改失败!",title:"酒店订房系统提示"});
             }
         })
     });


    //ajax 实现用户银行账号实时更换
     $('select[name="u_acount"]').bind("change",function(){
          var val=$(this).val();
         $.post("/jddf.com/include/actionUser.php",{"changeBankAcount":val},function(data){
               if(data != 0){
                   //var arrs=data.split('&');
                   $('input[name="b_acount"]').val(data).attr("disabled",true);
                    $('.khh').hide();
               }else{
                   $('input[name="b_acount"]').attr("disabled",false).val("")
                   $('.khh').show();
               }
         });
     });

    //用户选房参数 查询
    var str='';
    $('#csqd').click(function(){
        $('.roomCheck').each(function(key,o){
            if($(o).attr("checked") == "checked"){
                var name=$(o).attr('name');
                var val=$(o).val();
                str+=name+':'+val+',';
            }
        });
        //构建参数
        var args=str.substr(0,str.length-1);
        //时间参数
         var start=$('#date01').val();
         var end=$('#date02').val();
            var date1=new Date(start); //开始时间
           var  date2=new Date(end);//结束时间
           var date3=new Date(); //现在时间

           //判断开始时间是否小于现在时间
          if( date1.getTime()  <  date3.getTime()-87000000 ){
              $.alert({msg:"开始时间不能小于当前时间",title:"系统提示"});
          }else if(date2.getTime() <= date1.getTime()){ //判断结束时间不能小于开始时间
              $.alert({msg:"结束时间不能小于开始时间",title:"系统提示"});
          }else{
             $.post("/jddf.com/include/actiondingfang.php",{'args':args,'start':start,'end':end},function(data){
                 $.custom({ content: data, width:350, height:350,title:"请选择你需要房间"});
             });
          }
      });





  })

//检测form 表单
 function checkformUserInfo(){
       //js 获取值
       var pwd=formUserInfo.uPwd.value;  //字母 数字  6 -12
       var phone=formUserInfo.uPhone.value;  //手机 11  数字
        //写正则
       var patternPwd=/[a-zA-Z0-9]{6,12}/;
       var patternPhone=/^1\d{10}/;
         if(patternPwd.test(pwd)){
            if(patternPhone.test(phone)){
                return true;
              }else{
                  $('.showMsg3').css({color:"red","fontSize":"12px"}).text("手机号码非法");
                  return false;
              }
         }else{
             $('.showMsg2').css({color:"red","fontSize":"12px"}).text("密码非法");
             return false;
         }
           return false;
 }

//ajax 实现审核事件
function sh(forVal){
    if(forVal == 'n'){
        $.confirm({ msg:"你确定通过审核吗？",callback: function (result) {
            if (result) {
                 var uacount_sh=$('#uacount_sh').html();
                //ajax 传值到服务器器端，修改 字段 n 为 y
                $.post('/jddf.com/include/actiondingfang.php',{'issh':'y','uacount_sh':uacount_sh},function(data){
                      if(data == '1'){
                           window.location.reload();

                      }
                });

        }
        } });
    }
}














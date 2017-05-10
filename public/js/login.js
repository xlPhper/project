/**
 * Created by Administrator on 2017/5/10.
 */

$(document).ready(function(){

    $('.m-b').on('click',function(){
        var username=$('.form-control').eq(0).val();
        var password=$('.form-control').eq(1).val();
        $.ajax({
            url:'/login',
            dataType:"json",
            data:{'username':username,'password':password},
            type:'post',
            async: false,
            success:function(res){
                if(res.status==200){
                    window.location.href="/home"
                }else{
                    Alert({msg: res.msg, type: 'error'});
                }

            }
        })
    })

});

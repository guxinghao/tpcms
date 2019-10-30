//判断账号是否在别处登录  如果是 则跳转登录页面
function checkLogin(){
    let _url = $('#check_login').val();
    if (_url) {
        $.ajax({
            type: "post",
            url: _url,
            data: {},
            dataType: "json",
            async: false,
            success: function (e) {

            }
        });
    }
}
setTimeout("checkLogin()",5000);

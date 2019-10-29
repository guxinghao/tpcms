<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:83:"E:\phpstudy\PHPTutorial\WWW\tpcms\public/../application/index\view\login\index.html";i:1572343510;s:73:"E:\phpstudy\PHPTutorial\WWW\tpcms\application\index\view\public\foot.html";i:1572346264;}*/ ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>登 录</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/static/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="/static/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="/static/css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="/static/css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="/static/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/static/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/static/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/static/img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <style type="text/css">
        .error_alert{
            background-image: url(/static/img/error_login.png);
            width: 20px;
            height: 20px;
            background-size: contain;
            position: relative;
            top: 5px;
            margin-right: 7px;
        }
    </style>
  </head>
  <body>
    <div class="page login-page" style="background-image: url(/static/img/banner_3.jpg);background-repeat: round;">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner" style="margin: 0 auto;">
            <div class="logo text-uppercase"><span>欢迎登录</span><strong class="text-primary">后台管理系统</strong></div>
            <p>Welcome to the background management system.</p>
            <form method="get" class="text-left form-validate">
              <div class="form-group-material">
                <input id="login-username" type="text" name="loginUsername" required data-msg="用户名不能为空" class="input-material">
                <label for="login-username" class="label-material">用 户 名</label>
              </div>
              <div class="form-group-material">
                <input id="login-password" type="password" name="loginPassword" required data-msg="登录密码不能为空" class="input-material">
                <label for="login-password" class="label-material">登 录 密 码</label>
              </div>
              <div class="form-group-material checkLogin" style="display: none;">
                <p style="color: #dc3545;text-align: center;font-size: 18px;"><i class="error_alert"></i><span class="error_text">账号密码错误</span></p>
              </div>
              <div class="form-group text-center">
                <input id="login" class="btn btn-primary submit" style="width: 100px;border-radius: 5%;" type="submit" value="登　录">
                <!-- This should be submit button but I replaced it with <a> for demo purposes-->
              </div>
            </form><small>Notice ! </small><a href="JavaScript:;" class="signup">Please remember login password</a><a href="JavaScript:;" class="forgot-pass">Forgot Password? Please contact the administrator</a>
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="/static/jquery/jquery.min.js"></script>
<script src="/static/popper.js/umd/popper.min.js"> </script>
<script src="/static/bootstrap/js/bootstrap.min.js"></script>
<script src="/static/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
<script src="/static/jquery.cookie/jquery.cookie.js"> </script>
<script src="/static/jquery-validation/jquery.validate.min.js"></script>
<script src="/static/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- Main File-->
<script src="/static/js/front.js"></script>
<script type="text/javascript">
    let _name = $.cookie('n');
    $('.ses_user_name').html(_name);
    //退出登录
    $('.logout').click(function(event) {
        let _user_id = $.cookie('u');
        $.ajax({
            type: "post",
            url: "<?php echo Url('Login/loginOut'); ?>",
            data: {user_id:_user_id},
            dataType: "json",
            async: false,
            success: function (e) {
                $.removeCookie('n');
                $.removeCookie('u');
                setTimeout("window.location.href = '<?php echo Url('login/index'); ?>';",1000);
            }
        });
    });
</script>

  </body>
  <script type="text/javascript">
        $.validator.setDefaults({
            submitHandler: function() {
                let _name = $('#login-username').val();
                let _pwd = $('#login-password').val();
                $.ajax({
                    type: "post",
                    url: "<?php echo Url('Login/login'); ?>",
                    data: {user_name:_name,pwd:_pwd},
                    dataType: "json",
                    async: false,
                    success: function (e) {
                        if (e.status==250) {
                            $('.error_text').html(e.msg);
                            $('.checkLogin').show();
                            setTimeout("hide_alert()",5000);
                        }else{
                            let u = e.id;
                            let n = e.user_name;
                            $.cookie('u',u,{ expires: 1, path: '/' });
                            $.cookie('n',n,{ expires: 1, path: '/' });
                            window.location.href = "<?php echo Url('index/index'); ?>";
                        }
                    }
                });
            }
        });
        function hide_alert(){
            $('.checkLogin').hide();
        }
  </script>
</html>

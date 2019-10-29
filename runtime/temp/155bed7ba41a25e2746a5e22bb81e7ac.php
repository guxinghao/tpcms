<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:83:"E:\phpstudy\PHPTutorial\WWW\tpcms\public/../application/index\view\index\index.html";i:1572002688;s:78:"E:\phpstudy\PHPTutorial\WWW\tpcms\application\index\view\public\container.html";i:1571998722;s:78:"E:\phpstudy\PHPTutorial\WWW\tpcms\application\index\view\public\left_menu.html";i:1572337585;s:73:"E:\phpstudy\PHPTutorial\WWW\tpcms\application\index\view\public\head.html";i:1572337638;s:73:"E:\phpstudy\PHPTutorial\WWW\tpcms\application\index\view\public\foot.html";i:1572337852;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
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
        
    </head>
    <body>
        <nav class="side-navbar">
  <div class="side-navbar-wrapper">
    <!-- Sidebar Header    -->
    <div class="sidenav-header d-flex align-items-center justify-content-center">
      <!-- User Info-->
      <div class="sidenav-header-inner text-center">
        <img src="/static/img/avatar-7.jpg" alt="person" class="img-fluid rounded-circle">
        <h2 class="h5">后台管理系统</h2><span class="user_name"></span>
      </div>
      <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>B</strong><strong>D</strong></a></div>
    </div>
    <!-- Sidebar Navigation Menus-->
    <div class="main-menu">
      <ul id="side-main-menu" class="side-menu list-unstyled">
        <li><a href="<?php echo Url('index/wxChat'); ?>"> <i class="icon-home"></i>公众号信息</a></li>
        <li><a href="forms.html"> <i class="icon-form"></i>职员信息</a></li>
      </ul>
    </div>
  </div>
</nav>


        
<div class="page">
    <!-- head-->
    <header class="header">
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-holder d-flex align-items-center justify-content-between">
            <div class="navbar-header">
                <a id="toggle-btn" href="#" class="menu-btn">
                    <i class="icon-bars"> </i>
                </a>
                <a href="index.html" class="navbar-brand">
                    <div class="brand-text d-none d-md-inline-block">
                        <span>CRM </span>
                        <strong class="text-primary">后台管理系统</strong>
                    </div>
                </a>
            </div>
            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Log out-->
                <li class="nav-item">
                    <a href="JavaScript:;" class="nav-link logout">
                        <span class="d-none d-sm-inline-block">退出</span>
                        <i class="fa fa-sign-out"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</header>

</div>

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
    $('.user_name').html(_name);
    //退出登录
    $('.logout').click(function(event) {
        $.removeCookie('n');
        $.removeCookie('u');
        setTimeout("window.location.href = 'login.html';",3000);
    });
</script>

        
    </body>
</html>

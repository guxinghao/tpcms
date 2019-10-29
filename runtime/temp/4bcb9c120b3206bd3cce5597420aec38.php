<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:85:"E:\phpstudy\PHPTutorial\WWW\tpcms\public/../application/index\view\index\wx_chat.html";i:1572330617;s:78:"E:\phpstudy\PHPTutorial\WWW\tpcms\application\index\view\public\container.html";i:1571998722;s:78:"E:\phpstudy\PHPTutorial\WWW\tpcms\application\index\view\public\left_menu.html";i:1572329440;s:73:"E:\phpstudy\PHPTutorial\WWW\tpcms\application\index\view\public\head.html";i:1571994113;s:73:"E:\phpstudy\PHPTutorial\WWW\tpcms\application\index\view\public\foot.html";i:1571996305;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>
    微信数据列表
</title>
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
        <h2 class="h5">后台管理系统</h2><span>My Admin</span>
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


        
<link rel="stylesheet" href="/static/css/page.css">
    <style type="text/css">
        .addButton{
            width: 74px;
            height: 35px;
            color: #fff!important;
            line-height: 36px;
            text-align: center;
            border-radius: 8%;
            float: right;
            cursor: pointer;
            margin-bottom: 6px;
        }
        .addButton a{
            color: #fff!important;
            text-decoration:none;
        }
        .myAlert{
            height: 38px;
            position: fixed;
            z-index: 99999;
            border: 1px solid #fff;
            top: 26px;
            right: 10px;
            color: #fff;
            width: 300px;
        }
        .myAlert_error{
            background-color: #d9534f;
        }

        .myAlert_success{
            background-color: #5cb85c;
        }
        .myAlert p{
            line-height: 38px;
            text-align: center;
        }
        .error_alert{
            background-image: url(/static/img/error.png);
            width: 20px;
            height: 20px;
            background-size: contain;
            position: relative;
            top: 5px;
            margin-right: 7px;
        }
        .success_alert{
            background-image: url(/static/img/success.png);
            width: 20px;
            height: 20px;
            background-size: contain;
            position: relative;
            top: 5px;
            margin-right: 7px;
        }
        .pagination{
            float: right;
        }
        .mysearch{
            margin-bottom: 5px!important;
        }
        .form-inline .form-control{
            height:28px;
            border-radius:3%;
        }
        #inlineFormInputGroup11{
            font-size: 13px;
            padding-left: 8px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-top: 0px;
            width: 208px;
        }
    </style>
    <div class="page">
        <!-- navbar-->
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
                    <a href="login.html" class="nav-link logout">
                        <span class="d-none d-sm-inline-block">退出</span>
                        <i class="fa fa-sign-out"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</header>

        <!-- Breadcrumb-->
        <div class="breadcrumb-holder">
            <div class="container-fluid">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo Url('index/index'); ?>">首页</a></li>
                <li class="breadcrumb-item active">公众号列表页</li>
              </ul>
            </div>
        </div>
        <section>
        <div class="container">
                <div class="card" style="margin-bottom:5px;">
                    <div class="card-body">
                        <form class="form-inline" action="<?php echo Url('index/wxChat'); ?>">
                            <div class="form-group mysearch">
                                <input id="inlineFormInput1" value="<?php echo $get['name']; ?>" type="text" name="name" placeholder="公众号名称" class="mr-3 form-control">
                            </div>
                            <div class="form-group mysearch">
                                <input id="inlineFormInputGroup2" value="<?php echo $get['idendity']; ?>" type="text" name="idendity" placeholder="公众号ID" class="mr-3 form-control">
                            </div>
                            <div class="form-group mysearch">
                                <input id="inlineFormInputGroup3" value="<?php echo $get['main_body']; ?>" type="text" name="main_body" placeholder="公众号主体" class="mr-3 form-control">
                            </div>
                            <div class="form-group mysearch">
                                <input id="inlineFormInputGroup4" value="<?php echo $get['type']; ?>" type="text" name="type" placeholder="公众号类别" class="mr-3 form-control">
                            </div>
                            <div class="form-group mysearch">
                                <input id="inlineFormInputGroup6" value="<?php echo $get['province']; ?>" type="text" name="province" placeholder="所属省" class="mr-3 form-control">
                            </div>
                            <div class="form-group mysearch">
                                <input id="inlineFormInputGroup7" value="<?php echo $get['city']; ?>" type="text" name="city" placeholder="所属市" class="mr-3 form-control">
                            </div>
                            <div class="form-group mysearch">
                                <input id="inlineFormInputGroup8" value="<?php echo $get['district']; ?>" type="text" name="district" placeholder="所属区" class="mr-3 form-control">
                            </div>
                            <div class="form-group mysearch">
                                <input id="inlineFormInputGroup9" value="<?php echo $get['channel']; ?>" type="text" name="channel" placeholder="运营渠道" class="mr-3 form-control">
                            </div>
                            <div class="form-group mysearch">
                                <input id="inlineFormInputGroup13" type="text"  value="<?php echo $get['fans_number_st']; ?>" name="fans_number_st" style="margin-right:0!important " placeholder="粉丝区间1" class="mr-3 form-control"> 至
                                <input id="inlineFormInputGroup14" type="text"  name="fans_number_ed" placeholder="粉丝区间2" class="mr-3 form-control">
                            </div>
                            <div class="form-group mysearch">
                                <input id="inlineFormInputGroup15" type="text"  value="<?php echo $get['first_money_st']; ?>" name="first_money_st" style="margin-right:0!important " placeholder="首条成本数量1" class="mr-3 form-control"> 至
                                <input id="inlineFormInputGroup16" type="text" value="<?php echo $get['first_money_ed']; ?>"  name="first_money_ed" placeholder="首条成本区间2" class="mr-3 form-control">
                            </div>
                            <div class="form-group mysearch">
                                <input id="inlineFormInputGroup10" type="text" value="<?php echo $get['quality']; ?>" name="quality" placeholder="公众号属性" class="mr-3 form-control">
                            </div>
                            <div class="form-group mysearch">
                                <!-- <input id="inlineFormInputGroup11" type="text" name="classify" placeholder="公众号分类" class="mr-3 form-control"> -->
                                <select id="inlineFormInputGroup11" type="text" value="<?php echo $get['classify']; ?>" name="classify" class="mr-3 form-control">
                                    <!--  1订阅号 2 服务号 -->
                                    <option <?php echo !empty($get['classify'])?'':'selected=selected'; ?> value="0">请选择公众号分类</option>
                                    <option <?php echo $get['classify']==1?'selected=selected':''; ?> value="1">订阅号</option>
                                    <option <?php echo $get['classify']==2?'selected=selected':''; ?> value="2">服务号</option>
                                </select>
                            </div>
                            <div class="form-group mysearch" style="height: 30px;">
                                <input type="submit" style="height: 27px;line-height: 13px;width: 65px;" value="搜索" class="mr-3 btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div>
                            <!-- Button trigger modal -->
                            <p class="addButton">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="height: 30px;line-height: 14px;">添加</button>
                            </p>
                        </div>
                        <div style="width: 100%;overflow-x: auto;">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr class="head_tr">
                                        <th>编号</th>
                                        <th>公众号名称</th>
                                        <th>公众号ID</th>
                                        <th>公众号主体</th>
                                        <th>所在省</th>
                                        <th>所在市</th>
                                        <th>所在区</th>
                                        <th>公众号类别</th>
                                        <th>粉丝数量</th>
                                        <th>首条成本</th>
                                        <th>次条成本</th>
                                        <th>3-N成本</th>
                                        <th>订单次数</th>
                                        <th>运营渠道</th>
                                        <th>公众号属性</th>
                                        <th>公众号分类</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                                    <tr id="list<?php echo $item['id']; ?>">
                                        <th scope="row"><?php echo $item['id']; ?></th>
                                        <td id="name<?php echo $item['id']; ?>"><?php echo $item['name']; ?></td>
                                        <td id="idendity<?php echo $item['id']; ?>"><?php echo $item['idendity']; ?></td>
                                        <td id="main_body<?php echo $item['id']; ?>"><?php echo $item['main_body']; ?></td>
                                        <td id="province<?php echo $item['id']; ?>"><?php echo $item['province']; ?></td>
                                        <td id="city<?php echo $item['id']; ?>"><?php echo $item['city']; ?></td>
                                        <td id="district<?php echo $item['id']; ?>"><?php echo $item['district']; ?></td>
                                        <td id="type<?php echo $item['id']; ?>"><?php echo $item['type']; ?></td>
                                        <td id="fans_number<?php echo $item['id']; ?>"><?php echo $item['fans_number']; ?></td>
                                        <td id="first_money<?php echo $item['id']; ?>"><?php echo $item['first_money']; ?></td>
                                        <td id="second_money<?php echo $item['id']; ?>"><?php echo $item['second_money']; ?></td>
                                        <td id="more_money<?php echo $item['id']; ?>"><?php echo $item['more_money']; ?></td>
                                        <td id="order_number<?php echo $item['id']; ?>"><?php echo $item['order_number']; ?></td>
                                        <td id="channel<?php echo $item['id']; ?>"><?php echo $item['channel']; ?></td>
                                        <td id="quality<?php echo $item['id']; ?>"><?php echo $item['quality']; ?></td>
                                        <td id="classify<?php echo $item['id']; ?>" data-classify=<?php echo $item['classify']; ?>><?php echo $item['classify']==1?'订阅号':'服务号'; ?></td>
                                        <td><i class="fa fa-edit" data-id=<?php echo $item['id']; ?>></i><i class="fa fa-university" onclick="showDeleteModal(this,<?php echo $item['id']; ?>)"></i></td>
                                    </tr>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                            <?php echo $page; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>
    </div>

<!-- 模态框 新增数据-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document" style="width: 700px;">
    <div class="modal-content">
      <div class="modal-header" style="display: inline-block;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">添加微信公众号信息</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
            <div class="form-group row">
                <label style="text-align: right;line-height: 40px;" class="col-sm-3 form-control-label">公众号名称</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="公众号名称" class="form-control name">
                </div>
            </div>
            <div class="line"></div>
            <div class="form-group row">
                <label style="text-align: right;line-height: 40px;" class="col-sm-3 form-control-label">公众号ID</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="公众号ID" class="form-control idendity">
                </div>
            </div>
            <div class="line"></div>
            <div class="form-group row">
                <label style="text-align: right;line-height: 40px;" class="col-sm-3 form-control-label">公众号主体</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="公众号主体" class="form-control main_body">
                </div>
            </div>
            <div class="line"></div>
            <div  id="distpicker" data-toggle="distpicker">
            <div class="form-group row">
                <label style="text-align: right;line-height: 40px;" class="col-sm-3 form-control-label">所在省</label>
                <div class="col-sm-8 mb-3">
                    <select name="account" class="form-control province"  id="province">
                    </select>
                </div>
            </div>
            <div class="line"></div>
            <div class="form-group row">
                <label style="text-align: right;line-height: 40px;" class="col-sm-3 form-control-label">所在市</label>
                <div class="col-sm-8 mb-3">
                    <select name="account" class="form-control city"  id="city">
                    </select>
                </div>
            </div>
            <div class="line"></div>
            <div class="form-group row">
                <label style="text-align: right;line-height: 40px;" class="col-sm-3 form-control-label">所在区</label>
                <div class="col-sm-8 mb-3">
                    <select name="account" class="form-control district"  id="district">
                    </select>
                </div>
            </div>
            <div class="line"></div>
            </div>
            <div class="form-group row">
                <label style="text-align: right;line-height: 40px;" class="col-sm-3 form-control-label">公众号类别</label>
                <div class="col-sm-8 mb-3">
                    <input type="text" placeholder="公众号类别" class="form-control type">
                </div>
            </div>
            <div class="line"></div>
            <div class="form-group row">
                <label style="text-align: right;line-height: 40px;" class="col-sm-3 form-control-label">粉丝数量</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="粉丝数量" class="form-control fans_number">
                </div>
            </div>
            <div class="line"></div>
            <div class="form-group row">
                <label style="text-align: right;line-height: 40px;" class="col-sm-3 form-control-label">首条成本</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="首条成本" class="form-control first_money">
                </div>
            </div>
            <div class="line"></div>
            <div class="form-group row">
                <label style="text-align: right;line-height: 40px;" class="col-sm-3 form-control-label">次条成本</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="次条成本" class="form-control second_money">
                </div>
            </div>
            <div class="line"></div>
            <div class="form-group row">
                <label style="text-align: right;line-height: 40px;" class="col-sm-3 form-control-label">3-N条成本</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="3-N条成本" class="form-control more_money">
                </div>
            </div>
            <div class="line"></div>
            <div class="form-group row">
                <label style="text-align: right;line-height: 40px;" class="col-sm-3 form-control-label">订单次数</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="订单次数" class="form-control order_number">
                </div>
            </div>
            <div class="line"></div>
            <div class="form-group row">
                <label style="text-align: right;line-height: 40px;" class="col-sm-3 form-control-label">运营渠道</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="运营渠道" class="form-control channel">
                </div>
            </div>
            <div class="line"></div>
            <div class="form-group row">
                <label style="text-align: right;line-height: 40px;" class="col-sm-3 form-control-label">公众号属性</label>
                <div class="col-sm-8 mb-3">
                    <input type="text" placeholder="公众号属性" class="form-control quality">
                </div>
            </div>
            <div class="line"></div>
            <div class="form-group row">
                <label style="text-align: right;line-height: 40px;" class="col-sm-3 form-control-label">公众号分类</label>
                <div class="col-sm-8 mb-3">
                   <select name="account" class="form-control classify">
                       <option value="0">选择公众号分类</option>
                       <option value="1">订阅号</option>
                       <option value="2">服务号</option>
                    </select>
                </div>
            </div>
            <div class="line"></div>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary subBtn" id="submit_btn" data-id=0>保存</button>
      </div>
    </div>
  </div>
</div>
<!-- 弹出框 -->
<div class="myAlert" style="display: none;">
    <p><i class="alert_class"></i><span class="showMsg">提交成功</span></p>
</div>
<!-- 模态框   信息删除确认 -->
<div class="modal fade" id="delcfmOverhaul">
    <div class="modal-dialog">
        <div class="modal-content message_align">
            <div class="modal-header" style="display: inline-block;">
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">提示</h4>
            </div>
            <div class="modal-body">
                <!-- 隐藏需要删除的id -->
                <input type="hidden" id="deleteHaulId" />
                <p>您确认要删除该条信息吗？</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                    data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary"
                    id="deleteHaulBtn">确认</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->

        <script src="/static/jquery/jquery.min.js"></script>
<script src="/static/popper.js/umd/popper.min.js"> </script>
<script src="/static/bootstrap/js/bootstrap.min.js"></script>
<script src="/static/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
<script src="/static/jquery.cookie/jquery.cookie.js"> </script>
<script src="/static/jquery-validation/jquery.validate.min.js"></script>
<script src="/static/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- Main File-->
<script src="/static/js/front.js"></script>

        
<script type="text/javascript" src="/static/ve/distpicker/distpicker.data.js"></script>
<script type="text/javascript" src="/static/ve/distpicker/distpicker.js"></script>
<script type="text/javascript" src="/static/ve/distpicker/main.js"></script>
<script type="text/javascript" src="/static/js/grid.js"></script>
<script type="text/javascript">
    $('#side-main-menu li').eq(0).addClass('active');
    $('#distpicker').distpicker('reset', true);
    $("#distpicker").distpicker({
        autoSelect: false
    });
    //提交数据
    $('.subBtn').click(function(event) {
        //获取data-id  如果存在则为修改  否则为新增
        let _data_id = $(this).attr('data-id')?$(this).attr('data-id'):0;

        let _data = {
            data_id:_data_id,//用于修改或者新增的判断标识
            name:$('.name').val(),
            idendity:$('.idendity').val(),
            main_body:$('.main_body').val(),
            province:$('#province option:selected').val(),
            city:$('#city option:selected').val(),
            district:$('#district option:selected').val(),
            type:$('.type').val(),
            fans_number:$('.fans_number').val(),
            first_money:$('.first_money').val(),
            second_money:$('.second_money').val(),
            more_money:$('.more_money').val(),
            order_number:$('.order_number').val(),
            channel:$('.channel').val(),
            quality:$('.quality').val(),
            classify:$('.classify option:selected').val(),
        };
        $.ajax({
            type: "post",
            url: "<?php echo Url('index/addOrEditDate'); ?>",
            data: _data,
            dataType: "json",
            async: false,
            success: function (e) {
                if (e.status==250) {
                    $('.myAlert').addClass('myAlert_error');
                    $('.alert_class').addClass('error_alert');
                    $('.myAlert').css('display','block');
                    $('.showMsg').html(e.msg);
                    setTimeout("hide_alert()",2000);

                }else{
                    $('.myAlert').addClass('myAlert_success');
                    $('.alert_class').addClass('success_alert');
                    $('.myAlert').css('display','block');
                    setTimeout("hide_motai()",2000);
                    setTimeout("location.reload()",2000);
                }
            }
        });
    });

    //模态框隐藏
    function hide_motai(){
        $('#exampleModal').modal('hide');
        hide_alert();
    }
    //隐藏alert
    function hide_alert(){
        $('.myAlert').css('display','none');
    }

    // 打开询问是否删除的模态框并设置需要删除的大修的ID
    function showDeleteModal(obj,_id) {
        $("#deleteHaulId").val(_id);// 将模态框中需要删除的大修的ID设为需要删除的ID
        $("#delcfmOverhaul").modal({
            backdrop : 'static',
            keyboard : false
        });
    }
    // 删除数据 模态框的确定按钮的点击事件
    $("#deleteHaulBtn").click(function() {
        $('#delcfmOverhaul').modal('hide');
        let _id = $("#deleteHaulId").val();
        // ajax异步删除
        $.ajax({
            type: "post",
            url: "<?php echo Url('index/delDate'); ?>",
            data: {id:_id},
            dataType: "json",
            async: false,
            success: function (e) {
                if (e.status==250) {
                    $('.myAlert').addClass('myAlert_error');
                    $('.alert_class').addClass('error_alert');
                    $('.myAlert').css('display','block');
                    $('.showMsg').html(e.msg);
                    setTimeout("hide_alert()",2000);

                }else{
                    $('.myAlert').addClass('myAlert_success');
                    $('.alert_class').addClass('success_alert');
                    $('.showMsg').html('删除成功');
                    $('.myAlert').css('display','block');
                    setTimeout("location.reload()",2000);
                }
            }
        });
    });

    //新增模态框消失的时候 触发  重置地区插件 清空数据
    $('#exampleModal').on('hide.bs.modal', function () {
        $('#exampleModalLabel').html('添加微信公众号信息');
        $('.name').val('');
        $('.idendity').val('');
        $('.main_body').val('');
        $('.main_body').val('');
        $('.type').val('');
        $('.fans_number').val('');
        $('.first_money').val('');
        $('.second_money').val('');
        $('.more_money').val('');
        $('.order_number').val('');
        $('.channel').val('');
        $('.quality').val('');
        $('.quality').val('');
        $(".classify").val(0);
        $('#distpicker').distpicker('reset', true);
        $('#submit_btn').attr('data-id',0);
    })

    //编辑数据的时候 使用 初始化原始数据
    $('.fa-edit').on('click', function (e) {
        let _id = $(this).attr('data-id')?$(this).attr('data-id'):0;
        if (!_id) {
            $('.myAlert').addClass('myAlert_error');
            $('.alert_class').addClass('error_alert');
            $('.myAlert').css('display','block');
            $('.showMsg').html('数据异常');
            setTimeout("hide_alert()",2000);
        }
        //将原始数据拼接到页面中
        $('#exampleModalLabel').html('修改微信公众号信息');
        $('.name').val($('#name'+_id).html());
        $('.idendity').val($('#idendity'+_id).html());
        $('.main_body').val($('#main_body'+_id).html());
        $('.main_body').val($('#main_body'+_id).html());

        //初始化三级联动
        let province = $('#province'+_id).html();
        let city = $('#city'+_id).html();
        let district = $('#district'+_id).html();
        $('#distpicker').distpicker('destroy');
        $('#distpicker').distpicker({province:province,city:city,district:district});

        $('.type').val($('#type'+_id).html());
        $('.fans_number').val($('#fans_number'+_id).html());
        $('.first_money').val($('#first_money'+_id).html());
        $('.second_money').val($('#second_money'+_id).html());
        $('.more_money').val($('#more_money'+_id).html());
        $('.order_number').val($('#order_number'+_id).html());
        $('.channel').val($('#channel'+_id).html());
        $('.quality').val($('#quality'+_id).html());
        $('.quality').val($('#quality'+_id).html());
        let _classify = $('#classify'+_id).attr('data-classify');
        $(".classify").val(_classify);
        $('#submit_btn').attr('data-id',_id);
        $('#exampleModal').modal('show');
    })
</script>

    </body>
</html>

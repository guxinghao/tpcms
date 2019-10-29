$(function () {
    var type = getQueryString("type");
    if(type == 3 ){
        // console.log(123);
        // var h1= document.getElementsByTagName("h1")[0];
        $("h1").html("零担货");
    }else{
        $("h1").html("找车");
    }
    function loadInfo(){
        $.ajax({
            type: "post",
            url: ApiUrl + "/index.php?ctl=Ve_Certification&met=getInfo&type=2&typ=json",
            data: { k: getCookie('key'), u: getCookie('id')},
            dataType: "json",
            async: false,
            success: function (e) {

                if(e.status == 200){
                    if(e.data.id){
                        if(e.data.status == 2){
                            $(".verifying p").html("您的实名认证未通过！");
                            $("#submit").html("点击重新填写");
                            $(".form-group").addClass("hidden");
                        }else if(e.data.status == 0){
                            $(".verifying p").html("您的实名认证审核中！");
                            $(".form-group").addClass("hidden");
                            $(":button").addClass("hidden");
                            $("#submit").addClass("hidden");
                        }else{
                             $(".verifying").addClass("hidden");
                        }

                    }else{
                        $(".verifying p").html("您还未实名认证！");
                        $("#submit").html("去实名认证");
                        $(".form-group").addClass("hidden");
                        $(":button").addClass("hidden");
                    }
                }else{
                    $(".verifying").addClass("hidden");
                    Zepto.sDialog({
                            skin: "red",
                            content: e.msg,
                            okBtn: false,
                            cancelBtn: false
                    });
                    window.location.href = WapSiteUrl;
                    return false
                }

            }
        })
    }
    loadInfo();
    var k = getCookie("key");
    var u = getCookie("id");
    $("#distpicker").distpicker({
        autoSelect: false
    });

    //图片上传
    // var i = 0;


    $("#image1").ajaxUploadImage({
        url: ApiUrl + "/index.php?ctl=Upload&action=uploadVideoOrImg",
        data: {key: k},
        success: function (e, res) {
            //判断文件类型  选择显示方式 image 或者 video
            $('.file_value').val(res.url);//将图片链接赋值
            if (res.state == 'SUCCESS') {
                if (res.type == '.mp4') {
                    $("#video_div").attr("src",res.url);
                    $(".pic_div").hide();
                    $(".vie_div").css('display','block');
                }else{
                    $(".vie_div").hide();
                    $("#job_pic").attr("src",res.url);
                    $(".pic_div").css('display','block');
                }
            } else {
                let _content = res.info?res.info:'文件上传失败,请重新上传!';
                Zepto.sDialog({
                    skin: "red",
                    content: _content,
                    okBtn: false,
                    cancelBtn: false
                });
                return false
            }

            if ($('.heart-upimg-items').find('li').length == 9) {
                $(".swiper-add-image").addClass('hide');
            }
        }
    });
        $("#sm").click(function(){

        var data = {};
            data.cargo_name         = $("#cargo_name").val();
            data.cargo_price        = $("#cargo_price").val();
            data.cargo_weight       = $("#cargo_weight").val();
            data.cargo_volume       = $("#cargo_volume").val();
            data.contacts           = $("#contacts").val();
            data.mobile             = $("#mobile").val();
            data.content            = $("#content").val();
            data.province1          = $('#province1 option:selected').val();
            data.city1              = $('#city1 option:selected').val();
            data.district1          = $('#district1 option:selected').val();
            data.province2          = $('#province2 option:selected').val();
            data.city2              = $('#city2 option:selected').val();
            data.district2          = $('#district2 option:selected').val();
            data.pic                = $('.file_value').val();//图片
            data.addr_lbs           = $('#addr_lbs').val();
            data.lng                = $('#lng').val();
            data.lat                = $('#lat').val();
            data.type               = type;
            if(!data.cargo_name){
                Zepto.sDialog({
                    skin: "red",
                    content: "请输入货物名称！",
                    okBtn: false,
                    cancelBtn: false
                });
                return false
            }
            if(!data.cargo_price){
                Zepto.sDialog({
                    skin: "red",
                    content: "请输入货物价值！",
                    okBtn: false,
                    cancelBtn: false
                });
                return false
            }
            if(!data.cargo_weight){
                Zepto.sDialog({
                    skin: "red",
                    content: "请输入货物重量！",
                    okBtn: false,
                    cancelBtn: false
                });
                return false
            }
            if(!data.cargo_volume){
                Zepto.sDialog({
                    skin: "red",
                    content: "请输入货物体积！",
                    okBtn: false,
                    cancelBtn: false
                });
                return false
            }
            if(!data.contacts){
                Zepto.sDialog({
                    skin: "red",
                    content: "请输入描述！",
                    okBtn: false,
                    cancelBtn: false
                });
                return false
            }
            if(!data.province1){
                Zepto.sDialog({
                    skin: "red",
                    content: "请选择发货地！",
                    okBtn: false,
                    cancelBtn: false
                });
                return false
            }
            if(!data.province2){
                Zepto.sDialog({
                    skin: "red",
                    content: "请选择收货地！",
                    okBtn: false,
                    cancelBtn: false
                });
                return false
            }
            if(!data.pic){
                Zepto.sDialog({
                    skin: "red",
                    content: "请上传图片！",
                    okBtn: false,
                    cancelBtn: false
                });
                return false
            }

        $.ajax({
            type: "post",
            url: ApiUrl + "/index.php?ctl=Ve_Logistics&met=addLogisticsCar&typ=json",
            data: {data, k: getCookie('key'), u: getCookie('id')},
            dataType: "json",
            async: false,
            success: function (e) {
                if(e.status == 200){
                    Zepto.sDialog({
                        skin: "red",
                        content: e.msg,
                        okBtn: false,
                        cancelBtn: false
                    });
                    window.location.href = WapSiteUrl;
                }else{
                    Zepto.sDialog({
                        skin: "red",
                        content: e.msg,
                        okBtn: false,
                        cancelBtn: false
                    });

                    return false
                }

            }
        })
    })




});



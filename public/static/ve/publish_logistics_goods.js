$(function () {
    var type = getQueryString("type");
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
        $("button").click(function(){

        var data = {};
            data.cargo_name         = $("#cargo_name").val();
            data.cargo_price        = $("#cargo_price").val();
            data.cargo_weight       = $("#cargo_weight").val();
            data.contacts           = $("#contacts").val();
            data.mobile             = $("#mobile").val();
            data.content            = $("#content").val();
            data.pic                = $('.file_value').val();//图片
            data.type               = type;
            if(!data.cargo_name){
                Zepto.sDialog({
                    skin: "red",
                    content: "请输入车辆类型！",
                    okBtn: false,
                    cancelBtn: false
                });
                return false
            }
            if(!data.cargo_price){
                Zepto.sDialog({
                    skin: "red",
                    content: "请输入运价！",
                    okBtn: false,
                    cancelBtn: false
                });
                return false
            }
            if(!data.cargo_weight){
                Zepto.sDialog({
                    skin: "red",
                    content: "请输入载重！",
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
            if(!data.content){
                Zepto.sDialog({
                    skin: "red",
                    content: "请输入联系人！",
                    okBtn: false,
                    cancelBtn: false
                });
                return false
            }
             if(!data.mobile){
                Zepto.sDialog({
                    skin: "red",
                    content: "请输入联系方式！",
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
            url: ApiUrl + "/index.php?ctl=Ve_Logistics&met=addLogisticsGoods&typ=json",
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



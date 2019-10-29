$(function () {
    function loadInfo(){
        $.ajax({
            type: "post",
            url: ApiUrl + "/index.php?ctl=Ve_Certification&met=getInfo&type=0&typ=json",
            data: { k: getCookie('key'), u: getCookie('id')},
            dataType: "json",
            async: false,
            success: function (e) {
                if(e.status == 200){
                   var data = e.data;
                   if(data.id){
                        $(".image1").attr('src',data.idcard_image_front);
                        $(".image2").attr('src',data.idcard_image_back);
                        $(".image3").attr('src',data.hand_idcard_image);
                        $("#user_name").attr({"value":data.user_name});
                        $("#mobile").attr({"value":data.mobile});
                        if(data.status == 2){
                            $(":button").html("审核不通过，重新提交");
                        }else{
                            $(":input").attr("disabled", "disabled");
                            if(data.status == 1){
                                $(":button").html("已认证");
                            }else{
                                $(":button").html("审核中");
                            }
                        }
                        
                   }
                }else{
                    return false
                }
                
            }
        })
    }
    loadInfo();
    var k = getCookie("key");
    var u = getCookie("id");

    //图片上传
    var i = 0;
    
   
    $("#image1").ajaxUploadImage({
        url: ApiUrl + "/index.php?ctl=Upload&action=uploadImage",
        data: {key: k},
        success: function (e, res) {
            if (res.state == 'SUCCESS') {
                $(".image1").attr("src",res.url);
                $(".img1").css('display','block');
                // var jq = JQuery.noConflict(true);
                // $.sDialog({skin: "red", content: "图片尺寸过大！", okBtn: false, cancelBtn: false});
                // return false
            } else {
                Zepto.sDialog({
                        skin: "red",
                        content: "图片尺寸过大！",
                        okBtn: false,
                        cancelBtn: false
                    });
                // $.sDialog({skin: "red", content: "图片尺寸过大！", okBtn: false, cancelBtn: false});
                return false
            }

            if ($('.heart-upimg-items').find('li').length == 9) {
                $(".swiper-add-image").addClass('hide');
            }
        }
    });
    $("#image2").ajaxUploadImage({
        url: ApiUrl + "/index.php?ctl=Upload&action=uploadImage",
        data: {key: k},
        success: function (e, res) {
            if (res.state == 'SUCCESS') {
                $(".image2").attr("src",res.url);
                $(".img2").css('display','block');
            } else {
                 Zepto.sDialog({
                        skin: "red",
                        content: "图片尺寸过大！",
                        okBtn: false,
                        cancelBtn: false
                    });
                // $.sDialog({skin: "red", content: "图片尺寸过大！", okBtn: false, cancelBtn: false});
                return false
            }

            if ($('.heart-upimg-items').find('li').length == 9) {
                $(".swiper-add-image").addClass('hide');
            }
        }
    });
    $("#image3").ajaxUploadImage({
        url: ApiUrl + "/index.php?ctl=Upload&action=uploadImage",
        data: {key: k},
        success: function (e, res) {
            if (res.state == 'SUCCESS') {
                $(".image3").attr("src",res.url);
                $(".img3").css('display','block');
            } else {
                 Zepto.sDialog({
                        skin: "red",
                        content: "图片尺寸过大！",
                        okBtn: false,
                        cancelBtn: false
                    });
                // $.sDialog({skin: "red", content: "图片尺寸过大！", okBtn: false, cancelBtn: false});
                return false
            }

            if ($('.heart-upimg-items').find('li').length == 9) {
                $(".swiper-add-image").addClass('hide');
            }
        }
    });
    $(".btn-sm").click(function(){
      
        var data = {};
            data.idcard_image_front = $(".image1").attr('src');
            data.idcard_image_back  = $(".image2").attr('src');
            data.hand_idcard_image  = $(".image3").attr('src');
            data.user_name          = $("#user_name").val();
            data.mobile             = $("#mobile").val();
            if(!data.idcard_image_front){
                Zepto.sDialog({
                    skin: "red",
                    content: "请上传身份证正面照！",
                    okBtn: false,
                    cancelBtn: false
                });
                return false
            }
            if(!data.idcard_image_back){
                Zepto.sDialog({
                    skin: "red",
                    content: "请上传身份证反面照！",
                    okBtn: false,
                    cancelBtn: false
                });
                return false
            }
            if(!data.hand_idcard_image){
                Zepto.sDialog({
                    skin: "red",
                    content: "请上传手持身份证照片！",
                    okBtn: false,
                    cancelBtn: false
                });
                return false
            }
            if(!data.user_name){
                Zepto.sDialog({
                    skin: "red",
                    content: "请填写真实姓名！",
                    okBtn: false,
                    cancelBtn: false
                });
                return false
            }
            if(!data.mobile){
                Zepto.sDialog({
                    skin: "red",
                    content: "请填写联系方式！",
                    okBtn: false,
                    cancelBtn: false
                });
                return false
            }
        $.ajax({
            type: "post",
            url: ApiUrl + "/index.php?ctl=Ve_Certification&met=addPersionCertifion&typ=json",
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



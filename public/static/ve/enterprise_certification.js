$(function () {
    window.onload = function() {

            // 格式
           
            new Jdate({
                el: '#start',
                format: 'YYYY-MM-DD',
                beginYear: 2000,
                endYear: 2100
            })
            new Jdate({
                el: '#end',
                format: 'YYYY-MM-DD',
                beginYear: 2000,
                endYear: 2100
            })
          
           
            // 自定义语言
            var lang = {
                title: '自定义标题',
                cancel: '取消',
                confirm: '确认',
                year: '年',
                month: '月',
                day: '日',
                hour: '时',
                min: '分',
                sec: '秒'
            };
       
        }
    function loadInfo(){
        $.ajax({
            type: "post",
            url: ApiUrl + "/index.php?ctl=Ve_Certification&met=getInfo&typ=json",
            data: { k: getCookie('key'), u: getCookie('id')},
            dataType: "json",
            async: false,
            success: function (e) {
                if(e.status == 200){
                   var data = e.data;

                   if(data.status){
                    $(".image1").css('display','block');
                    $(".image2").css('display','block');
                    $(".image3").css('display','block');
                        $(".image1").attr('src',data.business_license);
                        // console.log(data.business_license);
                        $(".image2").attr('src',data.office_space);
                        $(".image3").attr('src',data.main_products);
                        $("#business_name").attr({"value":data.business_name});
                        $("#registration_num").attr({"value":data.registration_num});
                        $("#deputy_name").attr({"value":data.deputy_name});
                        $("#start").attr({"value":data.start});
                        $("#end").attr({"value":data.end});
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
                $(".image1").css('display','block');
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
                $(".image2").css('display','block');
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
                $(".image3").css('display','block');
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
        var start = $("#start").val();
        var end   = $("#end").val();
        var data = {};
            data.business_license = $(".image1").attr('src');
            data.office_space = $(".image2").attr('src');
            data.main_products = $(".image3").attr('src');
            data.business_name = $("#business_name").val();
            data.registration_num = $("#registration_num").val();
            data.deputy_name = $("#deputy_name").val();
            data.business_term = start + "至" + end;
        $.ajax({
            type: "post",
            url: ApiUrl + "/index.php?ctl=Ve_Certification&met=addCertifion&typ=json",
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
                    window.location.href = WapSiteUrl + '/tmpl/ve/enterprise_certification.php';
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



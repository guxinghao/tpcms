var k = getCookie("key");
var product_type = getQueryString("type");

$("#distpicker").distpicker({
    autoSelect: false
});

$(function () {

    if (!k) {
        tip_msg('需要登录');
        setInterval("location.href = WapSiteUrl+'/tmpl/member/login.html'",2000);
        return;
    }

    if(product_type == 1)
    {
        $('.header-title h1').text('出售特价商品');
    }else
    {
        $('.header-title h1').text('求购特价商品');
        $('.form-price').css('display','none');
    }
    // 百度地图API功能
    var map = new BMap.Map("allmap");
    var point = new BMap.Point(116.331398,39.897445);
    map.centerAndZoom(point,12);

    var geolocation = new BMap.Geolocation();
    geolocation.getCurrentPosition(function(r){
        if(this.getStatus() == BMAP_STATUS_SUCCESS){
            var mk = new BMap.Marker(r.point);
            map.addOverlay(mk);
            map.panTo(r.point);
            //根据经纬度获取当前位置
            $.ajax({
                type: "post",
                url: ApiUrl + "/index.php?ctl=Ve_Action&met=locationByGPS&typ=json",
                data: {lng: r.point.lng, lat: r.point.lat},
                dataType: "json",
                async: false,
                success: function (e) {
                    if(e.status == 200){

                        $('#form-lbs').html(e.data.province);
                        $('#addr_lbs').attr('value',e.data.province);
                        $('#lng').attr('value',e.data.lng);
                        $('#lat').attr('value',e.data.lat);
                        return false;

                    }else{
                        tip_msg(e.msg);
                        return false;
                    }
                }
            });
        }
        else {
            alert('failed'+this.getStatus());
        }
    },{enableHighAccuracy: true})

});

$(".upload-button").ajaxUploadImage({
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

    }
});


$('#addFactory').click(function(){

    var result = {};
    result.product_name = $('#product_name').val();
    result.contacts = $('#contacts').val();
    result.mobile = $('#mobile').val();
    result.content = $('#content').val();
    result.pic = $('.file_value').val();//图片
    result.price = $('#price').val();
    result.product_type = product_type;
    result.addr_lbs = $('#addr_lbs').val();
    result.lng = $('#lng').val();
    result.lat = $('#lat').val();


    var pattern = /^1[34578]\d{9}$/;
    if(!result.contacts)
    {
        tip_msg('联系人不能为空');
        return false;
    }

    if(result.mobile == '')
    {
        tip_msg('联系方式不能为空');
        return false;
    }
    else if(result.mobile.length != 11)
    {
        tip_msg('请输入有效的手机号');
        return false;
    }
    else if(!pattern.test(result.mobile))
    {
        tip_msg('请输入有效的手机号');
        return false;
    }


    var mianyi = $('input[name=mianyi]:checked').val();
    if(mianyi && result.price)
    {
        tip_msg('只能填写价格或选择面议');
        return false;
    }
    if (product_type == 1) {
        if (mianyi) {
            result.price = '面议';
        }else{
            if (!result.price) {
                tip_msg('请填写完整的薪资');
                return;
            }
        }
    }

    $.ajax({
        type: "post",
        url: ApiUrl + "/index.php?ctl=Ve_Action&met=addProduct&typ=json",
        data: {result, k: getCookie('key'), u: getCookie('id')},
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

                setInterval("load_url()",2000);

            }else{
                tip_msg(e.msg);
                return false;
            }
        }
    });

});

function load_url()
{
    window.location.href = WapSiteUrl;
}

function tip_msg(message)
{
    Zepto.sDialog({
        skin: "red",
        content: message,
        okBtn: false,
        cancelBtn: false
    });
}

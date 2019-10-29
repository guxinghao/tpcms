let k = getCookie('key');
let job_type = getQueryString("type");
let _renzheng_type;


$(function(){
    if (!k) {
        tip_msg('需要登录');
        setInterval("location.href = WapSiteUrl+'/tmpl/member/login.html'",2000);
        return;
    }
    //等于1 个人认证 其他 企业认证
    if (job_type==1) {
        _renzheng_type = 0;

        //根据不同类型 修改跳转链接
        $('#submit').attr('href','persion_certification.html');
    }else{
        _renzheng_type = 1;
        //根据不同类型 修改跳转链接
        $('#submit').attr('href','enterprise_certification.html');
    }
    $.ajax({
        type: "post",
        url: ApiUrl + "/index.php?ctl=Ve_Action&met=getCertificationInfo&typ=json",
        data: { k: getCookie('key'), u: getCookie('id'), type:_renzheng_type},
        dataType: "json",
        async: false,
        success: function (e) {
            //认证不通过 延时跳转
            if (e.status == 250) {
                $('.verifying').css('display','block');
            }else{
                $('.form-style').css('display','block');
            }
        }
    })
    $('.myradio').click(function(){
        var $radio = $(this);
        if ($radio.data('waschecked') == true){
            $radio.prop('checked', false);
            $radio.data('waschecked', false);
        } else {
            $radio.prop('checked', true);
            $radio.data('waschecked', true);
        }
    });

    //根据类型  修改显示内容
    if(job_type == 1){
        $('.header-title h1').text('找工作');
        $('.job_title').html('期望薪资');
        $('.gangwei_need').html('需求岗位');
    }else if(job_type == 2){
        $('.job_title').html('岗位薪资');
        $('.gangwei_need').html('我要招聘');
        $('.header-title h1').text('全职招聘');
        $('.educational').css('display','flex');
        $('.job_address').css('display','flex');
    }else if(job_type == 3){
        $('.job_title').html('岗位薪资');
        $('.gangwei_need').html('我要招聘');
        $('.header-title h1').text('兼职招聘');
        $('.educational').css('display','flex');
        $('.job_address').css('display','flex');
    }

    //获取职位信息
    $.ajax({
        type: "post",
        url: ApiUrl + "/index.php?ctl=Ve_Action&met=getJobTitleList&typ=json",
        data: {k: k, u: getCookie('id')},
        dataType: "json",
        async: false,
        success: function (e) {
            if(e.status == 200){
                let data = e.data.items;
                let _length = data.length;
                if (_length>0) {
                    let _str = '<option value=0>请选择</option>';
                    for (var i = 0; i < _length; i++) {
                        _str += `<option value=${data[i].id}>${data[i].job_title}</option>`
                    }
                    $('#jobTitle').html(_str);

                }
            }else{

            }
        }
    });

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
                        $('.baidu-position').css('display','block')
                        return false;

                    }else{
                        tip_msg(e.msg);
                        return false;
                    }
                }
            });
        }else {
            alert('failed'+this.getStatus());
        }
    },{enableHighAccuracy: true})

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

});
$("#distpicker").distpicker({
    autoSelect: false
});

//提交事件
function postData(){
    var result = {};
    let _position = $('#jobTitle').val();//需求岗位
    result.working_life = $('.working_life').val();//工作年限
    var val = $('input:radio[name="mianyi"]:checked').val();

    var start_money = $('.start_money').val();//岗位薪资(起始)
    var end_money = $('.end_money').val();//岗位薪资(结束)
    result.contacts = $('#contacts').val();//联系人
    result.mobile = $('#mobile').val();//电话
    result.city = $('#city option:selected').val();
    result.district = $('#district option:selected').val();
    result.content = $('#exampleFormControlTextarea1').val();//描述
    result.pic = $('.file_value').val();//图片
    result.job_type = job_type;
    result.addr_lbs = $('#addr_lbs').val();
    result.lng = $('#lng').val();
    result.lat = $('#lat').val();

    if (_position == '0') {
        tip_msg('请选择岗位');
        return false;
    }
    result.position = $('#jobTitle option:selected').text();//选中的文本
    if (!result.working_life) {
        tip_msg('请填写工作年限');
        return false;
    }

    if(val=='on' && start_money && end_money)
    {
        tip_msg('只能填写薪资或选择面议');
        return false;
    }
    if (val=='on') {
        result.want_money = '面议';
    }else{
        if (!start_money || !end_money) {
            tip_msg('请填写完整的薪资');
            return;
        }else{
            if (isNaN(start_money) || isNaN(end_money)) {
                tip_msg('请填写以数字形式的薪资');
                return;
            }
            if (parseFloat(start_money) > parseFloat(end_money)) {
                tip_msg('请填写正确的薪资');
                return;
            }
            result.want_money = start_money+'——'+end_money;
        }
    }

    //不为找工作 判断地点  ----暂时判断
    /*if (job_type!=1) {
        let _province = $('#province option:selected').val();
        let _city = $('#city option:selected').val();
        let _district = $('#district option:selected').val();

        if (!_province || !_city || _district) {
            tip_msg('请选择工作地点');
            return false;
        }
    }*/

    // let _education = $('#educational_detail option:selected').val();
    result.education = $('#educational_detail option:selected').text();
    result.province = $('#province option:selected').val();
    result.city = $('#city option:selected').val();
    result.district = $('#district option:selected').val();

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

    $.ajax({
        type: "post",
        url: ApiUrl + "/index.php?ctl=Ve_Action&met=addJob&typ=json",
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
}

function load_url()
{
    window.history.go(-1);
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

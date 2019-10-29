$(function () {
    var factory_id = getQueryString("issue_id");

    var param = {
        factory_id: factory_id
    };

    $.ajax({
        url: ApiUrl + "/index.php?ctl=Ve_Factory&met=getDetailById&typ=json",
        type: 'get',
        dataType: 'json',
        data: param,
        success: function(data) {
            if ( data.status == 200 ) {
                let item = data.data;

                //[1=>'出售',2=>'出租',3=>'求购',4=>'求租']
                let _factory_type;
                switch (item.factory_type_ys) {
                    case '1':
                        _factory_type = '出售';
                        $('.tag').addClass('csfactory');
                        $('.new_title').html('厂房出售详情');
                        break;
                    case '2':
                        _factory_type = '出租';
                        $('.tag').addClass('czfactory');
                        $('.new_title').html('厂房出租详情');
                        break;
                    case '3':
                        _factory_type = '求购';
                        $('.tag').addClass('qgfactory');
                        $('.new_title').html('厂房求购详情');
                        $('.ep1').html('求购面积');
                        $('.ep2').text('求购地区');//地区
                        $('.ep3').css('display','none');
                        $('.bussiness_name').css('display','none');
                        break;
                    default:
                        _factory_type = '求租';
                        $('.tag').addClass('qzfactory');
                        $('.new_title').html('厂房求租详情');
                        $('.ep1').html('求租面积');
                        $('.ep2').text('求租地区');//地区
                        $('.ep3').css('display','none');
                        $('.bussiness_name').css('display','none');
                        break;
                }

                let _src =  item.user_logo?item.user_logo:'../../images/icon-user.png';
                $('.user_logo').attr('src',_src);//用户头像
                if (!item.user_logo) {
                    $('.avatar').addClass('no-avatar');
                }
                $('.customer-name').text(item.user_name?item.user_name:'匿名用户');//用户昵称
                $('.user-update-time').text(item.tran_time);//发布时间

                if (item.pic) {
                    let _str = '';
                    if(item.file_type == 0){
                        _str = `<img src="${item.pic}">`;
                    }else{
                        _str = `<video src="${item.pic}" style="width: 100%;" controls="controls"></video>`;
                    }
                    $('.detail-image').html(_str);

                }else{
                    $('.detail-image').css('display','none');
                }

                $('.bussiness_name_detail').text(item.business_name);//企业名称
                if (!item.price) {
                    if (item.price = '面议') {
                        $('.bussiness_name_price').text(item.price);//价钱
                    }else{
                        $('.bussiness_name_price').text('￥'+item.price);//价钱
                    }
                }
                $('.factory_area').text(item.factory_area);//面积


                $('.tag').text(_factory_type);//类型
                $('.area').text(item.area);//地区
                $('.address').text(item.address);//薪资
                $('.contacts').text(item.contacts);//联系人
                $('.mobile').text(item.mobile);//联系电话
                $('.content_my').text(item.content);//描述

            }else{
                $.sDialog({skin: "red", content: data.msg, okBtn: false, cancelBtn: false});
                setTimeout(function (){
                    window.history.go(-1);
                },3000);
            }
        }
    });
});


$(function () {
    var job_id = getQueryString("issue_id");

    var param = {
        job_id: job_id
    };

    $.ajax({
        url: ApiUrl + "/index.php?ctl=Ve_Job&met=getDetailById&typ=json",
        type: 'get',
        dataType: 'json',
        data: param,
        success: function(data) {
            if ( data.status == 200 ) {
                let item = data.data;

                //1为找工作 2为全职招聘 3为兼职招聘
                let _job_type;
                switch (item.job_type_ys) {
                    case '2':
                        _job_type = '全职';
                        $('.tag').addClass('quanzhi');
                        $('.new_title').html('全职招聘详情');
                        break;
                    case '3':
                        _job_type = '兼职';
                        $('.tag').addClass('jianzhi');
                        $('.new_title').html('兼职招聘详情');
                        break;
                    default:
                        _job_type = '找工作';
                        $('.tag').css({
                            display: 'none',
                        });
                        $('.new_title').html('找工作详情');
                        $('.gangwei_name').html('需求岗位');
                        $('.par_education').css('display','none');
                        $('.want_money_title').html('期望薪资');
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
                    //判断是图片还是视频 做不同显示
                    let _str = '';
                    if (!item.file_type) {
                        _str = `<img src="${item.pic}">`;
                    }else{
                        _str = `<video width="100%;" height="100%;" id="video_div" controls="controls" src="${item.pic}" controls="controls">your browser does not support the video tag</video>`;
                    }
                    $('.detail-image').html(_str);
                    $('.detail-image').css('display','block');
                }
                $('.bussiness_name').text(item.business_name);//企业名称
                $('.job_name').text(item.position);//职位


                $('.tag').text(_job_type);//类型
                $('.job_year').text(item.working_life);//工作经验
                $('.want_money').text(item.want_money);//薪资
                $('.education').text(item.education);//学历
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


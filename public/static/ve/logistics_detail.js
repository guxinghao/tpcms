$(function () {
    var logistics_id = getQueryString("issue_id");

    var param = {
        logistics_id: logistics_id,
    };

    $.ajax({
        url: ApiUrl + "/index.php?ctl=Ve_Logistics&met=getDetailById&typ=json",
        type: 'get',
        dataType: 'json',
        data: param,
        success: function(data) {
            if ( data.status == 200 ) {
                var t = data.data;
                if(t.logistics_type_ys == 2){
                    $("#logistics").html(template.render("logistics_goods", t));
                    $('.header-title h1').text('找货详情');
                    $('title').html('找货详情');
                }else{
                    $("#logistics").html(template.render("logistics_car", t));
                    if (t.logistics_type_ys == 1) {
                        $('.header-title h1').text('找车详情');
                        $('title').html('找车详情');
                    }else{
                        $('.header-title h1').text('零担货详情');
                        $('title').html('零担货详情');
                    }
                }
            }else{
                $.sDialog({skin: "red", content: data.msg, okBtn: false, cancelBtn: false});
                setTimeout(function (){
                    window.history.go(-1);
                },3000);
            }
        }
    });
});


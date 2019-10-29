var i = new ncScrollLoad;
var k = getCookie("key");
var u = getCookie("id");
$(function () {
    $('#publish-btn').click(function() {
        let publishBtns = $(this).siblings('.publish-btn-bg');
        publishBtns.toggleClass('publish-btn-active');
        publishBtns = null;
    })
});

function getDate(type=0,obj=null){
    if (!k) { checkLogin(0); return; }
    //判断登录
    i.loadInit({
        url: ApiUrl + "/index.php?ctl=Ve_Action&met=myPublish&typ=json",
        getparam: {status:type,user_id:u,key:k},
        tmplid: "infoLists",
        containerobj: $("#infoList"),
        iIntervalId: true,
        data: {WapSiteUrl: WapSiteUrl},
    });

    //修改table的样式
    if (obj != null) {
        let _this = $(obj);
        $('.tab-text').removeClass('active');
        _this.find('span').addClass('active');
    }

}
getDate();


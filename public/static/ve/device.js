var i = new ncScrollLoad;
$(function () {
    $('#publish-btn').click(function() {
        let publishBtns = $(this).siblings('.publish-btn-bg');
        publishBtns.toggleClass('publish-btn-active');
        publishBtns = null;
    })
});

function getDate(type=0,obj=null){
    i.loadInit({
        url: ApiUrl + "/index.php?ctl=Ve_Device&met=getInfoLists&typ=json",
        getparam: {type:type},
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

function addClick(obj){
    let _this = $(obj);
    let _id = _this.attr('data-issue-id');
    $.ajax({
        type: "post",
        url: ApiUrl + "/index.php?ctl=Ve_Job&met=addClickNum&typ=json",
        data: {id:_id},
        dataType: "json",
        async: false,
        success: function (e) {
            //认证不通过 延时跳转
            if (e.status == 200) {
                return true;
            }
        }
    })
}

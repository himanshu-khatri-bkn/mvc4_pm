const ROOT = "http://localhost/batch4pm_2022/mvc/";
function ctask(url, msg = '') {
    if (!msg) {
        msg = "Do you want to do this task?";
    }
    if (confirm(msg))
        location.href = ROOT+url;
}
function loadAjax(url,data,id) {
        $.ajax({
            url:ROOT+url,
            data:data,
            type:"get",
            success:function(r){
                   //alert(r);
                $(`#${id}`).html(r);
            },
            error:function(e){
                alert("error he");
            }

         })
    }
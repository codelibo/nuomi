/*页面 全屏-添加*/
function o2o_edit(title,url){
    var index = layer.open({
        type: 2,
        title: title,
        content: url
    });
    layer.full(index);
}

/*添加或者编辑缩小的屏幕*/
function o2o_s_edit(title,url,w,h){
    layer_show(title,url,w,h);
}
/*-删除*/
function o2o_del(url){
    layer.confirm('确认要删除吗？',function(index){
        window.location.href=url;
    });
}

$('.listorder input').blur(function() {
    // 获取主键id
    var id = $(this).attr("attr-id");
    // alert(id);
    // 获取排序的值
    var listorder = $(this).val();
    // alert(listorder);
    var postData = {
        'id': id,
        'listorder': listorder
    };
    var url = SCOPE.listorder_url;
    $.post(url, postData, function(result) {
        if(result.code == 1) {
            location.href = result.data;
        } else {
            alert(result.msg);
        }
    }, "json");
});
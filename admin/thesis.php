

<?php
include 'base.php';
?>
    <title>论文管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
    <span class="c-gray en">&gt;</span>
    期刊会议
    <span class="c-gray en">&gt;</span>
    论文管理
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>

<div class="text-c"><br>
    <form class="Huiform" method="post" action="" target="_self">
			<span class="btn-upload form-group">
			<input class="input-text upload-url" type="text" name="uploadfile-2" id="uploadfile-2" readonly style="width:200px">
			<a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 选择论文</a>
			<input type="file" multiple name="file-2" class="input-file">
			</span><button type="button" style="margin-left: 10px" class="btn btn-success" onClick="picture_colume_add(this);"><i class="Hui-iconfont">&#xe600;</i> 添加</button>
    </form><br>
    <div class="text-c"> 日期范围：
        <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
        -
        <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
        <input type="text" class="input-text" style="width:250px" placeholder="输入名称"  name="name">
        <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜信息</button>
    </div>
</div>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
		</span>
        <span class="r">共有数据：<strong><?php echo $row2[0];?></strong> 条</span>
    </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort">
            <tr class="text-c">
                <th width="70">ID</th>
                <th>名称</th>
                <th width="120">下载</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>
            <tr class="text-c">
                <td>1</td>
                <td class="text-l"> 东鹏</td>
                <td class="f-14 product-brand-manage"><a href="#">点击下载</a></td>
                <td class="f-14 product-brand-manage"> <a style="text-decoration:none" class="ml-5" onClick="active_del(this,'10001')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="../static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="../static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="../lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="../lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
    $('.table-sort').dataTable({
        "bStateSave": true,//状态保存
    });
    function system_data_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'GET',
                url: 'delThesis.php?id='+id,
                dataType: 'text',
                success: function(data){
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
        });
    }
</script>
</body>
</html>
<?php
/*
include_once "sqlhelper.php";
$mysqli = new sqlhelper();
$sql = "SELECT research.id,research.name,research.introduction,research.time,research.way FROM research";
$res = $mysqli->execute_dql($sql);
$sql2 = "SELECT COUNT(id) FROM research";
$res2 = $mysqli->execute_dql($sql2);
$row2 = $res2 ->fetch_row();
$mysqli->close_sql();

if(isset($_GET['articletitle'])){
    $mysqli = new sqlhelper();
    $sql  = "";
    $res = $mysqli->execute_dml($sql);
}*/
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="lib/html5shiv.js"></script>
    <script type="text/javascript" src="lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>娱乐管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
    <span class="c-gray en">&gt;</span>
    休闲娱乐
    <span class="c-gray en">&gt;</span>
    信息管理
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>

<div class="text-c">
    <form class="Huiform" method="post" action="entertainment_add.php" target="_self" enctype="multipart/form-data">
            <input type="hidden" name ="MAX_FILE_SIZE" value="4000000000"/>
            <span class="btn-upload form-group">
			<input class="input-text upload-url" type="text" name="uploadfile-2" id="uploadfile-2" readonly style="width:200px">
			<a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 选择文件</a>
			<input type="file" multiple  name="myfile" class="input-file">
			</span> <span class="select-box" style="width:150px">
			<select class="select" name="type" size="1">
				<option value="pic"  selected>图片</option>
				<option value="video">视频</option>
				<option value="radio">音频</option>
				<option value="doc" >文档</option>
			</select>
			</span><button type="submit" class="btn btn-success" onClick="picture_colume_add(this);"><i class="Hui-iconfont">&#xe600;</i> 添加</button>
    </form><br>
</div>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
		</span>
        <span class="r">共有数据：<strong><?php include "./about_db/print_list.php"; echo get_sum('relax','entertainment',$connect);?></strong> 条</span>
    </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort">
            <thead>
            <tr class="text-c">
                <th width="70">名称</th>
                <th width="120">分类</th>
                <th>查看</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <?php
            include "connect.php";
            $arr_type = array('doc','radio','pic','video');
            $arr_name = array('文档','音频','图片','视频');
            $dir="../fun/upload/";
            for($i=0;$i<4;$i++)
            {
                $sql = "SELECT * FROM relax_type_{$arr_type[$i]}";
                $result = mysqli_query($connect, $sql);
                while($field_infor=mysqli_fetch_array($result))
                {
                    echo "<tbody>";
                    echo "	<tr class='text-c'>";
                    echo "		<td>{$field_infor['name']}</td>";
                    echo "	   <td>{$arr_name["$i"]}</td>";
                    echo "			<td><a href='$dir{$arr_type["$i"]}/{$field_infor['name']}'>点击查看</a></td>";
                    echo "		<td class='f-14 product-brand-manage'><a style='text-decoration:none' class='ml-5' onClick='active_del(this,'10001')' href='./upload/file_del.php?fn={$arr_type["$i"]}/{$field_infor['name']}&tn=relax_type_{$arr_type["$i"]}&md=entertainment' title='删除'><i class='Hui-iconfont'>&#xe6e2;</i></a></td>";
                    echo "	</tr>";
                    echo "</tbody>";
                }
            }
            ?>
        </table>
    </div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
    $('.table-sort').dataTable({
        "aaSorting": [[ 1, "desc" ]],//默认第几个排序
        "bStateSave": true,//状态保存
        "aoColumnDefs": [
            //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
            {"orderable":false,"aTargets":[0,3]}// 制定列不参与排序
        ]
    });
    function system_data_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'GET',
                url: 'delEn.php?id='+id,
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

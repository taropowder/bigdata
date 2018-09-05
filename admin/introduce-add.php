<?php
include_once "sqlhelper.php";
$mysqli = new sqlhelper();
if (isset($_FILES['introduce'])){
    $name = $_FILES['introduce']['name'];
    $file_data = $_FILES['introduce']['tmp_name'];
    $upload_path = "../introduce/file/";
    $path = $upload_path . $name;
    $file_path = move_uploaded_file($file_data, $path);
    if ($file_path == false) {
        echo "<script>alert('文件保存失败！');</script>";
    }else{
        $sql  = "INSERT INTO introduce(file_name) VALUE ('$name')";
        $res = $mysqli->execute_dml($sql);
        echo "<script>alert('文件保存成功！');</script>";
    }
}
if(isset($_GET['name'])){
    $name = addslashes($_GET['name']);
    $file = "../introduce/file/".$name;
    $sql  = "DELETE FROM introduce WHERE file_name = '$name'";
    $res = $mysqli->execute_dml($sql);
    if ($res == 1){
        echo "1";
        unlink($file);
        exit();
    }
}
$sql = "SELECT id,file_name FROM introduce";
$res = $mysqli->execute_dql($sql);
$sql2 = "SELECT COUNT(id) FROM introduce";
$res2 = $mysqli->execute_dql($sql2);
$row2 = $res2->fetch_row();
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
    实验室介绍
    <span class="c-gray en">&gt;</span>
    头图管理
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>

<div class="text-c">
    <form class="Huiform" method="post" action="introduce-add.php" target="_self" enctype="multipart/form-data">
			<span class="btn-upload form-group">
			<input class="input-text upload-url" type="text" name="uploadfile-2" id="uploadfile-2" readonly style="width:200px">
			<a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 选择文件</a>
			<input type="file"  name="introduce" class="input-file">
			</span> <input type="submit" class="btn btn-success" onClick="picture_colume_add(this);"/>
    </form><br>
</div>

<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
		</span>
        <span class="r">共有数据：<strong><?php echo $row2[0]; ?></strong> 条</span>
    </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort">
            <thead>
            <tr class="text-c">
                <th width="70">ID</th>
                <th width="120">文件名</th>
                <th>查看</th>
                <th width="100">删除</th>
            </tr>
            </thead>
            <tbody>
            <?php

                while ($row = $res->fetch_row()){
                    echo "<tr class='text-c'>";
                    echo "<td>$row[0]</td>";
                    echo "<td>$row[1]</td>";
                    echo "<td><a href='../introduce/'>点击查看</a></td>";
                    echo"<td class=\"f-14\">
						<a title=\"删除\" href=\"javascript:;\" onclick=\"system_data_del(this,'$row[1]')\" class=\"ml-5\" style=\"text-decoration:none\"><i class=\"Hui-iconfont\">&#xe6e2;</i></a></td>";
                    echo "</tr>";
                }

            ?>
            </tbody>
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
    function system_data_del(obj,name){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'GET',
                url: 'introduce-add.php?name='+name,
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
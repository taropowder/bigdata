<?php
include_once "sqlhelper.php";
$mysqli = new sqlhelper();
$sql = "SELECT id,name,introduction,time,way from research order by id desc";
$res = $mysqli->execute_dql($sql);
$datacount=$res->num_rows;
$sql2 = "SELECT COUNT(id) FROM research";
$res2 = $mysqli->execute_dql($sql2);
$row2 = $res2 ->fetch_row();
$mysqli->close_sql();
date_default_timezone_set('Asia/Shanghai');

/*if(isset($_GET['articletitle'])){
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
    <title>科研动态</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
    <span class="c-gray en">&gt;</span>
    科研动态
    <span class="c-gray en">&gt;</span>
    动态管理
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
            <a class="btn btn-primary radius" data-title="添加" data-href="scientific-add.php" onclick="Hui_admin_tab(this)" href="scientific-add.php"><i class="Hui-iconfont">&#xe600;</i> 添加</a>
		</span>
        <span class="r">共有数据：<strong><?php echo $row2[0];?></strong> 条</span>
    </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort">
            <thead>

            <tr class="text-c">
                <th width="150">名称</th>
                <th>简介</th>
                <th width="80">查看</th>
                <th width="105">类型</th>
                <th width="105">发表时间</th>
                <th width="80">操作</th>
            </tr>
            </thead>
            <?php
            if($datacount)
            {
                echo"<tbody>";
                for ($i = 0; $i <$datacount; $i++) {
                    //$result = mysqli_fetch_assoc($res);
                    $result_arr = mysqli_fetch_array($res);//返回表中每条数据的具体内容
                    $icon = $result_arr['introduction'];
                    $name = $result_arr['name'];
                    $id = $result_arr['id'];
                    $time=$result_arr['time'];
                    $way=$result_arr['way'];
                    echo"<tr class='text-c'>";

                    echo "<td>$name</td><td>";
                    echo"$icon";
                    echo "<td><a href='../research/research.php?id=$id'>点击查看详情</a></td>";
                    echo"<td>$way</td>";
                    echo"<td>$time</td>";
                    echo"<td > <a  href='scientific-delect.php?id=$id'>删除</a></td>";
                    echo"</tr>";
                }
                echo"</tbody>";
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
        "bStateSave": true,//状态保存
    });
    function system_data_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'GET',
                url: 'delSc.php?id='+id,
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
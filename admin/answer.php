<?php
include_once "sqlhelper.php";
$mysqli = new sqlhelper();
if (isset($_GET['id'])){
    $i=addslashes($_GET['id']);
    $sql = "delete FROM answer WHERE id = '$i'";
    $res= $mysqli->execute_dql($sql);
    if($res)
    {
        echo"<script>alert('删除成功');</script>";
    }
    else
    {
        echo"<script>alert('删除失败');</script>";
    }
}
$sql = "SELECT id,p_id,user,answer,time from answer";
$res = $mysqli->execute_dql($sql);
$datacount=$res->num_rows;
$sql2 = "SELECT COUNT(id) FROM question";
$res2 = $mysqli->execute_dql($sql2);
$row2 = $res2 ->num_rows;


$mysqli->close_sql();
?>

<?php
include 'base.php';
?>

    <title>论坛管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 技术论坛 <span class="c-gray en">&gt;</span>论坛管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> </span> <span class="r">共有数据：<strong><?php echo"$datacount";?></strong> 条</span> </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="100">答案ID</th>
                <th width="100">问题ID</th>
                <th width="200">回答者</th>
                <th>答案</th>
                <th width="200">回答时间</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <?php
            if($datacount)
            {
                echo"<tbody>";
                for ($i = 0; $i <$datacount; $i++) {
                    //$result = mysqli_fetch_assoc($res);
                    $result_arr = mysqli_fetch_array($res);//返回表中每条数据的具体内容
                    $p_id = $result_arr['p_id'];
                    $time=$result_arr['time'];
                    $name = $result_arr['user'];
                    $answer = $result_arr['answer'];
                    $id = $result_arr['id'];
                    echo"<tr class='text-c'>";

                    echo "<td>$id</td>";
                    echo "<td>$p_id</td>";
                    echo "<td>$name</td>";
                    echo "<td>$answer</td>";
                    echo "<td>$time</td>";
                    echo"<td > <a  href='answer.php?id=$id'>删除</a></td>";
                    echo"</tr>";
                }
                echo"</tbody>";
            }
            ?>
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
    $(function(){
        $('.table-sort').dataTable({
            "aaSorting": [[ 1, "desc" ]],//默认第几个排序
            "bStateSave": true,//状态保存
            "aoColumnDefs": [
                //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
                {"orderable":false,"aTargets":[0,2,4]}// 制定列不参与排序
            ]
        });

    });
    /*用户-添加*/
    function member_add(title,url,w,h){
        layer_show(title,url,w,h);
    }
    /*用户-查看*/
    function member_show(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*用户-停用*/
    function member_stop(obj,id){
        layer.confirm('确认要停用吗？',function(index){
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
            $(obj).remove();
            layer.msg('已停用!',{icon: 5,time:1000});
        });
    }

    /*用户-启用*/
    function member_start(obj,id){
        layer.confirm('确认要启用吗？',function(index){
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
            $(obj).remove();
            layer.msg('已启用!',{icon: 6,time:1000});
        });
    }
    /*用户-编辑*/
    function member_edit(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*密码-修改*/
    function change_password(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*用户-删除*/
    function member_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '',
                dataType: 'json',
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
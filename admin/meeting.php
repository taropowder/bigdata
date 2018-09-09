

<?php
include 'base.php';
?>
    <title>会议动态</title>
</head>
<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
    <span class="c-gray en">&gt;</span>
    动态管理　
    <span class="c-gray en">&gt;</span>
    会议动态
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>

<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
            <a class="btn btn-primary radius" data-title="添加" data-href="meeting-add.html" href="meeting-add.html"><i class="Hui-iconfont">&#xe600;</i> 添加</a>
		</span>

    </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort">
            <thead>
            <tr class="text-c">
                <th width="80">ID</th>
                <th width="80">标题</th>
                <th width="150">查看</th>
                <th width="120">发布时间</th>
                <th width="120">操作</th>
            </tr>
            </thead>

            <?php
            include("sqlhelper.php");
            $mysqli = new sqlhelper();
            echo"<meta charset='utf-8'>";
            $sql="SELECT id,name,time FROM meeting";
            $res= $mysqli->execute_dql($sql);

            $dataCount=$res->num_rows;
            /*while($row=$res->num_rows)
            {
                echo"<tbody>";
                $name=$row[1];
                $id=$row[0];
                $content=$row[2];
                $time=$row[3];*/
           if($dataCount) {
               echo "<tbody>";
               for ($i = 0; $i < $dataCount; $i++) {
                   //$result = mysqli_fetch_assoc($res);
                   $result_arr = mysqli_fetch_array($res);//返回表中每条数据的具体内容

                   $name = $result_arr['name'];
                   $id = $result_arr['id'];
                   $time = $result_arr['time'];
                   echo "<tr class='text-c'>";
                   echo "<td>$result_arr[id]</td>";
                   echo "<td>$name</td>";
                   echo "<td><a href='../meeting/meeting.php?id=$id'>点击查看</a></td>";
                   echo "<td>$time</td>";
                   echo "<td > <a  href='meeting-delect.php?id=$id'>删除</a></td>";
                   echo "</tr>";

               }

               echo "</tbody>";
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
    $('.table-sort').dataTable({
        "aaSorting": [[ 0, "desc" ]],//默认第几个排序
        "bStateSave": true,//状态保存
        "aoColumnDefs": [
           // {"bVisible": false, "aTargets": [ 2 ]} //控制列的隐藏显示
            {"orderable":false,"aTargets":[2,4]}// 制定列不参与排序
        ]
    });
    function system_data_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'GET',
                url: 'delUp.php?id='+id,
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
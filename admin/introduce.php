<?php
/**
 * Created by PhpStorm.
 * User: 19502
 * Date: 2018/8/1
 * Time: 20:23
 */
include_once"sqlhelper.php";
$mysqli = new sqlhelper();

if(isset($_POST['introduce']))
{
    $content=$_POST['introduce'];

    $sql = "UPDATE introduction  SET content = '$content'";
    $res=$mysqli->execute_dql($sql);
    if($res){
        echo"<script>alert('更新成功')</script>";
    }
    else
        echo"<script>alert('更新失败')</script>";
}
$sql = "SELECT * FROM introduction";
$res = $mysqli->execute_dql($sql);
$row = $res->fetch_row();
$mysqli->close_sql();
?>

<?php
include 'base.php';
?>
    <title>更新介绍</title>
</head>
<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 实验室信息 <span class="c-gray en">&gt;</span> 实验室介绍更新 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<div class="page-container">

    <form method="post" action="introduce.php">
        <div>
        <textarea class="textarea" placeholder="实验室介绍" name="introduce">
            <?php echo $row[0];?>
        </textarea>
        </div>
        <div class="mt-20 text-c">
            <input name="system-base-save" id="system-base-save" class="btn btn-success radius" type="submit" ><i class="icon-ok"></i> </input>
        </div>
    </form>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="../static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="../static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="../lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="../lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">

</script>
</body>
</html>

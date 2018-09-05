<?php
/**
 * Created by PhpStorm.
 * User: 19502
 * Date: 2018/8/10
 * Time: 19:48
 */
include("sqlhelper.php");
$mysqli = new sqlhelper();
echo"<meta charset='utf-8'>";
$i=$_GET['id'];
$sql = "delete FROM question WHERE id = '$i'";
$res= $mysqli->execute_dql($sql);
if($res)
{
    echo"<script>alert('删除成功');</script>";
}
else
{
    echo"<script>alert('删除失败');</script>";
}
echo "<script>window.location.href='forum.php'</script>";
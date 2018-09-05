<?php
/**
 * Created by PhpStorm.
 * User: 19502
 * Date: 2018/8/2
 * Time: 10:36
 */
include("sqlhelper.php");
$mysqli = new sqlhelper();
echo"<meta charset='utf-8'>";

$i=$_GET['id'];


$sql = "delete FROM meeting WHERE id = '$i'";
//            echo $sql;
$res= $mysqli->execute_dql($sql);
if($res)
{
    echo"<script>alert('删除成功');</script>";
}
else
{
    echo"<script>alert('删除失败');</script>";
}
?>
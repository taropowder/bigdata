<?php
include("sqlhelper.php");
$mysqli = new sqlhelper();
echo"<meta charset='utf-8'>";

$i=$_GET['id'];


$sql = "delete FROM research WHERE id = '$i'";
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
echo "<script>window.location.href='scientific.php'</script>";
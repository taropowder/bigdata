<?php
/**
 * Created by PhpStorm.
 * User: 19502
 * Date: 2018/8/2
 * Time: 10:17
 */
if(isset($_POST['articletitle'])&&isset($_POST['abstract']))
{
    $title=$_POST['articletitle'];
    $content=$_POST['abstract'];
    $time=$_POST['time'];
}
include('sqlhelper.php');
$mysqli=new sqlhelper();
$sql="INSERT INTO meeting(name,content,time) VALUE ('$title','$content','$time')";
$res=$mysqli->execute_dql($sql);
if($res)
    echo"<script>alert('添加成功')</script>";
else
    echo"<script>alert('添加失败')</script>";
echo "<script>window.location.href='meeting.php'</script>";

?>
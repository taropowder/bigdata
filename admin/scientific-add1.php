<?php
/**
 * Created by PhpStorm.
 * User: 19502
 * Date: 2018/8/11
 * Time: 20:41
 */
if(isset($_POST['articletitle'])&&isset($_POST['abstract'])&&isset($_POST['articletitle2'])&&isset($_POST['type']))
{
    $name=$_POST['articletitle'];
    $introduce=$_POST['articletitle2'];
    $way=$_POST['type'];
    $content=$_POST['abstract'];
    $time=$_POST['time'];
}
include('sqlhelper.php');
$mysqli=new sqlhelper();
$sql="INSERT INTO research(name,introduction,way,content,time) VALUE ('$name','$introduce','$way','$content','$time')";
$res=$mysqli->execute_dml($sql);
if($res) {
    header("location:scientific.php");
    echo "<script>alert('添加成功')</script>";
}
else
    echo"<script>alert('添加失败,重新添加')</script>";

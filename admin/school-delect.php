<?php
include("sqlhelper.php");
$mysqli = new sqlhelper();
echo"<meta charset='utf-8'>";
$i=addslashes($_GET['id']);

$file_path = "../school/file/";
$sql = "delete FROM school WHERE id = '$i'";
//            echo $sql;
$res= $mysqli->execute_dql($sql);
if($res)
{
    $sql = "SELECT file_name FROM school_file WHERE school_id = '$i' ";
    $res = $mysqli->execute_dql($sql);
    while ($row = $res->fetch_row()){
        unlink($file_path.$row[0]);
    }
    echo"<script>alert('删除成功');</script>";
}
else
{
    echo"<script>alert('删除失败');</script>";
}
echo "<script>window.location.href='school.php'</script>";
?>

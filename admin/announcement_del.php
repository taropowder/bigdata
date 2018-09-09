<?php
include("sqlhelper.php");
$mysqli = new sqlhelper();
echo"<meta charset='utf-8'>";
$i=addslashes($_GET['id']);

$file_path = "../announcement/file/";

$sql = "SELECT file_name FROM announcement_file WHERE announcement_id = '$i' ";
$res_del = $mysqli->execute_dql($sql);

$sql = "DELETE FROM announcement_file where announcement_id = '$i'";
$res = $mysqli->execute_dql($sql);

$sql = "delete FROM announcement WHERE id = '$i'";
$res= $mysqli->execute_dql($sql);

if($res)
{
    while ($row = $res_del->fetch_row()){
        unlink($file_path.$row[0]);
    }
    echo"<script>alert('删除成功');</script>";
}
else
{
    echo"<script>alert('删除失败$i');</script>";
}
echo "<script>window.location.href='announcement.php'</script>";
?>

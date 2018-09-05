<?php
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
include_once "connect.php";
if(isset($_GET['fn']))
$file_name_untreated = $_GET['fn'];
$table_name = $_GET['tn'];
$del_mode = $_GET['md'];
$file_name_arr = preg_split("/\//",$file_name_untreated);
$file_name = end($file_name_arr);
if ($del_mode == 'upload')
{
    $del_target = "../../upload/upload/file_upload/$file_name_untreated";
    $url = '../upload.php';
}
elseif ($del_mode == 'entertainment')
{
    $del_target = "../../fun/upload/$file_name_untreated";
    $url = '../entertainment.php';
}
$del_sql = "delete from $table_name where name='$file_name'";
if (unlink($del_target) && mysqli_query($connect,$del_sql))
{
    echo "<script>alert('删除成功');window.location = \"$url\";</script>";
}
else
{
    echo "<script>alert('删除失败');window.location = \"$url\";</script>";
}
mysqli_close($connect);
?>

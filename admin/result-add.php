<?php
/**
 * Created by PhpStorm.
 * User: 19502
 * Date: 2018/7/30
 * Time: 20:16
 */
include("sqlhelper.php");
$mysqli=new sqlhelper();
echo"<meta charset='utf-8'>";
date_default_timezone_set('Asia/Shanghai');
if(isset($_POST['article2'])&&isset($_POST['abstract']))
{
    $title = $_POST['article2'];
    $content = $_POST['abstract'];
    $time = date('Y-m-d');
}

//$sql = "INSERT INTO school (id,title, content, time) VALUES ('$id','$title','$content','$time')";
$sql="INSERT INTO result (title,content)VALUES('$title','$content')";
$res=$mysqli->execute_dql($sql);
if(!$res)
{
    echo"<script>alert('上传失败')</script>";
}
else
    echo"<script>alert('上传成功')</script>";

$pic_name = $_FILES['pic']['name'];
$pic_file_data = $_FILES['pic']['tmp_name'];

if (is_array($pic_name))
{

    $str="SELECT id FROM result WHERE content= '$content' ";
    $res=$mysqli->execute_dql($str);
    $row=$res->fetch_row();
    if($row)
    {
        for ($i = 0; $i < count($pic_name); $i++) {
            $type='图片';
            $sql = "INSERT INTO result_file(result_id,name,type) VALUES('$row[0]','$pic_name[$i]','$type')";
            $res = $mysqli->execute_dql($sql);
            if (!$res) {
                echo "<script>alert('上传失败')</script>";
            }
            $upload_path = "../introduce/file/";
            $path = $upload_path . $pic_name[$i];
            $file_path = move_uploaded_file($pic_file_data[$i], $path);
            if ($file_path == false) {
                echo "<script>alert('文件保存失败！');</script>";
            }
        }

    }
}

$doc_name = $_FILES['doc']['name'];
$doc_file_data = $_FILES['doc']['tmp_name'];

if (is_array($doc_name))
{

    $str="SELECT id FROM result WHERE content= '$content' ";
    $res=$mysqli->execute_dql($str);
    $row=$res->fetch_row();
    if($row)
    {
        for ($i = 0; $i < count($doc_name); $i++) {
            $type='文件';
            $sql = "INSERT INTO result_file(result_id,name,type) VALUES('$row[0]','$doc_name[$i]','$type')";
            $res = $mysqli->execute_dql($sql);
            if (!$res) {
                echo "<script>alert('上传失败')</script>";
            }
            $upload_path = "../introduce/file/";
            $path = $upload_path . $doc_name[$i];
            $file_path = move_uploaded_file($doc_file_data[$i], $path);
            if ($file_path == false) {
                echo "<script>alert('文件保存失败！');</script>";
            }
        }

    }
}


echo "<script>window.location.href='result.php'</script>";
$mysqli->close_sql();
?>
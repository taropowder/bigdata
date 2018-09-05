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
    $time = $_POST['time'];

}

//$sql = "INSERT INTO school (id,title, content, time) VALUES ('$id','$title','$content','$time')";
$sql="INSERT INTO school (title,content,time)VALUES('$title','$content','$time')";
$res=$mysqli->execute_dql($sql);
if(!$res)
{
    echo"<script>alert('上传失败')</script>";
}
else
    echo"<script>alert('上传成功')</script>";

       $name = $_FILES['file-2']['name'];
       $file_data = $_FILES['file-2']['tmp_name'];

   if (is_array($name))
   {

           $str="SELECT id FROM school WHERE content='$content'";
           $res=$mysqli->execute_dql($str);
           $row=$res->fetch_row();
           if($row)
           {
               for ($i = 0; $i < count($name); $i++) {
           $sql = "INSERT INTO school_file(school_id,file_name) VALUES('$row[0]','$name[$i]')";
           $res = $mysqli->execute_dql($sql);
           if (!$res) {
               echo "<script>alert('上传失败')</script>";
           }
           $upload_path = "../school/file/";
           $path = $upload_path . $name[$i];
           $file_path = move_uploaded_file($file_data[$i], $path);
           if ($file_path == false) {
               echo "<script>alert('文件保存失败！');</script>";
           }
           }

       }
   }
   echo "<script>window.location.href='school.php'</script>";

?>

<?php
/**
 * Created by PhpStorm.
 * User: taro
 * Date: 18-7-13
 * Time: 下午10:03
 */
include "sqlhelper.php";
include_once 'login_require.php';
$userid = $_SESSION['userid'];
if (isset($_GET['id'])){
   $mysqli = new sqlhelper();
   $id = addslashes($_GET['id']);
   $sql = "SELECT * FROM blog_like WHERE blogid='$id' AND userid = '$userid'";
   $res = $mysqli->execute_dql($sql);
   if ($res->num_rows){
       echo "<script>alert('您已经点赞过了');window.location.href=\"blog.php?id=$id\";  </script>";
   }else{
       $time = date("Y-m-d H:i:s");
       $sql = "INSERT INTO `blog_like`(`blogid`, `userid`, `time`) VALUES ('$id','$userid','$time')";
       $mysqli->execute_dml($sql);
       header("location: blog.php?id=$id");
   }

}

?>
<!--<script>-->
<!--    history.back();-->
<!--</script>-->

<?php
/**
 * Created by PhpStorm.
 * User: YOGA710
 * Date: 2018/7/20
 * Time: 16:54
 */

session_start();
include_once "login_require.php";
error_reporting(E_ERROR | E_PARSE);
include ('connect.php');
if(!empty($_POST))
{
    header('content-type:text/html;charset=utf8');
    $answer=$_POST['comment'];
    $p_id = $_POST['p_id'];
    $title=$_POST['title'];
    $user=$_SESSION['user'];
    date_default_timezone_set("Asia/Shanghai");
    $time=date('Y-m-d H:i:s');

    if($title==''||$answer==''){
        echo "<script>alert('标题或回答不能为空！');window.location.href='view.php?id=$p_id'</script>";
    }
    else {

        mysqli_query($link, "insert into answer (answer,user,time,p_id) values('{$answer}','{$user}','{$time}','{$p_id}')") or die("存入数据库失败" . mysqli_error());
        mysqli_query($link, "insert into forum_answer_question (user,time,answer_question) values('{$user}','{$time}','{$title}')") or die("存入数据库失败" . mysqli_error());
        header("location:view.php?id=$p_id");
    }
        mysqli_close($link);

}

?>
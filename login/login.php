<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/7/21
 * Time: 下午2:02
 */
include_once "AES.php";
include_once "../sqlhelper.php";
session_start();
date_default_timezone_set('Asia/Shanghai');
if (isset($_POST['username'])) {
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
    $code = addslashes(($_POST['code']));
    $mysqli = new sqlhelper();
    $sql = "SELECT id,username,password FROM user WHERE username = '$username'";
    $res = $mysqli->execute_dql($sql);
    if ($res) {
        $row = $res->fetch_row();
        if ($row[2]===encrypt($password)){
            //TODO
            $_SESSION['logintime'] = date("Y-m-d H:i:s");
            $_SESSION['userid'] = $row[0];
            $_SESSION['username'] = $row[1];
            echo "<script>alert('登陆成功');window.location.href='../index.php';</script>";
        }else{
            echo "<script>alert('登陆失败');</script>";
        }
    }else{
        echo "<script>alert('没有这个用户名');</script>";
    }



}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

</body>
</html>
<a href="logout.php" type="button" >注销</a>
<form action="index.php" method="POST">
    登录
    <input type="text" name="username" size="20" maxlength="15" placeholder="请填写用户名及域名">
    <br>
    密码
    <input type="password" name="password" size="20" maxlength="15">
    <br>
    <input type="text" name="code" />
    <img  src="check.php" id = "refresh" title="刷新验证码" align="absmiddle" onclick="document.getElementById('refresh').src='image.php' ">
    <font color="#ffffff">点击图片刷新</font>
    <br>
    <input type="submit" value="登录">
    <input type="button" onclick="window.location.href='register.php'" value="注册">
</form>

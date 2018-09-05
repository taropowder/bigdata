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
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
<title>登录</title>
<link rel="stylesheet" type="text/css" href="css/body.css"/> 
</head>
<body>
<div class="container">
	<section id="content">
		<form action="" method="post">
			<h1>登录</h1>
			<div>
				<input type="text" placeholder="用户名" required="" id="username" name="username" />
			</div>
			<div>
				<input type="password" placeholder="密码" required="" id="password" name="password"/>
			</div>
			<div>
				<input type="text" placeholder="验证码" required="" id="code_input" value="" />
				<div id="v_container" style="width: 40%;height: 47px;"></div>

			</div>
			 <div class="">
				<span class="help-block u-errormessage" id="js-server-helpinfo">&nbsp;</span>			</div> 
			<div>
				<input type="submit" value="登录" class="btn btn-primary" id="js-btn-login"/>
				<a href="#">忘记密码?</a>
				 <a href="../register">注册</a>
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div>
</body>
<script src="js/gVerify.js"></script>
<script>
    var verifyCode = new GVerify("v_container");

    document.getElementById("js-btn-login").onclick = function(){
        var res = verifyCode.validate(document.getElementById("code_input").value);
        if(res==false){
            document.getElementById("code_input").value='';
            alert("验证码输入错误");
            return false;
        }
    }
</script>
</html>
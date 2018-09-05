<?php
include "../../sqlhelper.php";
session_start();
if (isset($_POST['password'])){
    $password = addslashes($_POST['password']);
    $username = addslashes($_POST['username']);
    $mysqli = new sqlhelper();
    $sql = "SELECT id,name,password FROM admin WHERE name = '$username'";
    $res = $mysqli->execute_dql($sql);
    $row = $res->fetch_row();
    $pass = $row[2];
    $mysqli->close_sql();
    if ($pass == md5($password)){
        $_SESSION['adminid'] = $row[0];
        $_SESSION['adminname'] = $row[1];
        echo"<script>alert('登陆成功');</script>";
        echo "<script>window.location.href='../'</script>";
    }else{
        echo"<script>alert('登陆失败');</script>";
    }
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理登录 - </title>

<link href="css/main.css" rel="stylesheet" type="text/css" />

</head>
<body>


<div class="login">
    <div class="box png">
		<!--<div class="logo png"></div>-->
		<div class="input">
			<div class="log">
			<form method="post" >
				<div class="name">
					用户名<input type="text" class="text" id="value_1" placeholder="用户名" name="username" tabindex="1">
				</div>
				<div class="pwd">
					密　码<input type="password" class="text" id="value_2" placeholder="密码" name="password" tabindex="2">
					<input class="button" type="submit" tabindex="3" value="登录">
					<div class="check"></div>
				</div>
				</form>
				<div class="tip"></div>
			</div>
		</div>
	</div>
    <div class="air-balloon ab-1 png"></div>
	<div class="air-balloon ab-2 png"></div>
    <div class="footer"></div>
</div>

<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="js/fun.base.js"></script>
<script type="text/javascript" src="js/script.js"></script>


<!--[if IE 6]>
<script src="js/DD_belatedPNG.js" type="text/javascript"></script>
<script>DD_belatedPNG.fix('.png')</script>
<![endif]-->
<!--<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
<p>适用浏览器：360、FireFox、Chrome、Safari、Opera、傲游、搜狗、世界之窗. 不支持IE8及以下浏览器。</p>
<p>More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
</div>
-->
</body>
</html>
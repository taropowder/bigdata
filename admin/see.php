<?php
include("conn.php");
$mysqli = new sqlhelper();
echo"<meta charset='utf-8'>";
$name=$_GET['p_url'];
echo"$name";
echo"<img src='upload/$name'>";
?>

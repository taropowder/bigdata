<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/7/29
 * Time: 下午2:06
 */
include_once "../sqlhelper.php";
include_once "login_require.php";
$mysqli = new sqlhelper();
$userid = $_SESSION['userid'];
$enter_time = $_SESSION['journaltime'];
unset($_SESSION['journaltime']);
$now = date("Y-m-d H:i:s");
$sql = "INSERT INTO journal_login (userid, enter_time, leave_time) VALUE ('$userid','$enter_time','$now')";
$mysqli->execute_dml($sql);
header("Location: ../index.php");
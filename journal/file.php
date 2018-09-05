<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/7/21
 * Time: 下午10:24
 */
include_once "../sqlhelper.php";
include_once "login_require.php";
if (isset($_GET['file'])){
    $file = $_GET['file'];
    $userid = $_SESSION['userid'];
    $time = date("Y-m-d H:i:s");
    $mysqli= new sqlhelper();
    $sql = "INSERT INTO data_journal_download(userid, filename, time) VALUE ('$userid','$file','$time')";
    $mysqli->execute_dml($sql);
    header("Location: file/$file");
}
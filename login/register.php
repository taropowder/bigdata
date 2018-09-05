<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/7/21
 * Time: 下午1:19
 */
function get_onlineip()
{
    $onlineip = '';
    if (getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
        $onlineip = getenv('HTTP_CLIENT_IP');
    } elseif (getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
        $onlineip = getenv('HTTP_X_FORWARDED_FOR');
    } elseif (getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
        $onlineip = getenv('REMOTE_ADDR');
    } elseif (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
        $onlineip = $_SERVER['REMOTE_ADDR'];
    }

    return $onlineip;
}

include_once "../sqlhelper.php";
include_once "AES.php";
session_start();
date_default_timezone_set('Asia/Shanghai');
if (isset($_POST['username'])) {
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
    $description = addslashes($_POST['description']);
    $email = addslashes($_POST['email']);
    $time = date("Y-m-d H:i:s");
    $ip = get_onlineip();
    $password = encrypt($password);
    $mysqli = new sqlhelper();
    $sql = "INSERT INTO user ( username, password, description, email, register_IP, regster_time )
VALUES('$username','$password','$description','$email','$ip','$time')";
    $res = $mysqli->execute_dml($sql);
    if ($res==1){
        //TODO
        echo "<script>alert('注册成功');window.location.href='index.php';</script>";
    }else{
        echo "<script>alert('注册失败,用户名已被占用');</script>";
    }


}

?>


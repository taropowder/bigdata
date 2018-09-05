<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/8/20
 * Time: 下午8:52
 */
session_start();
header('Content-type:text/html;charset=utf-8');
if(isset($_SESSION['adminname'])){
    session_unset();//free all session variable
    session_destroy();//销毁一个会话中的全部数据

}
header('location:../index.php');
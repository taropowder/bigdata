<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/8/20
 * Time: 下午8:28
 */
session_start();
date_default_timezone_set('Asia/Shanghai');
if (!isset($_SESSION['adminid'])){
    header('Location: login');
    exit();
}
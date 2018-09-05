<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/7/21
 * Time: 下午2:32
 */
date_default_timezone_set('Asia/Shanghai');
if (!isset($_SESSION['userid'])){
    header('Location: ../login');
    exit();
}

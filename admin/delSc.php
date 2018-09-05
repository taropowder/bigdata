<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/7/15
 * Time: 下午6:21
 */
include_once "sqlhelper.php";

if(isset($_GET['id'])){
    $mysqli = new sqlhelper();
    $id = addslashes($_GET['id']);
    $sql  = "DELETE FROM research WHERE id = $id";
    $res = $mysqli->execute_dml($sql);
    if ($res == 1){
        echo "1";
    }
}
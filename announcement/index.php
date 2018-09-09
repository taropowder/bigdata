
<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/9/9
 * Time: 下午5:08
 */
include_once "../sqlhelper.php";
$mysqli = new sqlhelper();
$sql = "SELECT  id,title,time FROM announcement ORDER BY time";
$res = $mysqli->execute_dql($sql);
while ($row = $res->fetch_row()){
    echo "<a href='announcement.php?id=$row[0]'>$row[1]</a>：发布时间:$row[2]";
}

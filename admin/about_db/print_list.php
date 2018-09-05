<?php
include_once "connect.php";
function get_count($mode,$table_name,$connect)
//参数含义
//mode：控制输出文件上传表或休闲娱乐表
//table_name：控制具体输出哪个表
//connect：连接到数据库
{
    $sql = "SELECT count(*) FROM {$mode}_type_$table_name";
    $result = mysqli_query($connect,$sql);
    if (empty($result))
        $flag = 0;
    else
    {
        $rows = mysqli_fetch_row($result);
        $flag = $rows[0];
    }
    return $flag;
}
function get_sum($type,$arr,$connect)
//参数含义
//type：控制输出文件上传表或休闲娱乐表
//arr：控制具体输出哪些表
//connect：连接到数据库
{
    $upload = array('doc','file','pic','tool');
    $entertainment = array('doc','radio','pic','video');
    $sum = 0;
    for($i=0;$i<4;$i++)
        $sum = $sum + get_count($type,"{$$arr["$i"]}",$connect);
    return $sum;
}
?>
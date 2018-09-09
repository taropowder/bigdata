<?php
session_start();
date_default_timezone_set('PRC'); //设置时区
include_once "../connect.php";
//获取要下载的文件名
if(isset($_GET['filename']))
{
    ob_clean();
    $file_path = $_GET['filename'];
    $file_size = filesize($file_path);
    $file_name = basename($file_path);
    if (file_exists($file_path))
    {
        $file_data = fopen($file_path,"r");
        header("Content-type:application/octet-stream");
        header("Accept-ranges:bytes");
        header("Accept-length:" . $file_size);
        header("Content-Disposition:attachment;filename = " . $file_name);
        $buffer=1024;
        $buffer_count=0;
        while(!feof($file_data)&&$file_size-$buffer_count>0){
            $data=fread($file_data,$buffer);
            $buffer_count+=$buffer;
            echo $data;
        }
        fclose($file_data);
    }
    else
    {
        echo "<script>alert('文件不存在')</script>";
    }
    /*
    //设置头信息
    header('Content-Disposition:attachment;filename=' . basename($file_data));
    header('Content-Length:' . filesize($file_data));
    //读取文件并写入到输出缓冲
    readfile($file_data);
    */
    $time = date("Y-m-d H-i-s");
    $sql = "insert into download(name,time,userid) values('$file_name','$time',{$_SESSION['userid']})";
    mysqli_query($connect, $sql);
}
?>

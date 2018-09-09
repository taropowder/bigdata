<?php
include_once "connect.php";
include_once "entertainment_add.php";
//为优化语句定义下列变量
$file_name = $uploaded_name;
$upload_time=$time;

//插入数据
$insertdata="insert into relax_type_$data_table_name(name,time) values('$file_name','$upload_time')";
mysqli_query($connect, $insertdata);

/*/***********数据测试*************
if (mysqli_query($connect, $insertdata))
{
    echo "插入数据成功";
}
else
{
    echo "Error insert data: " . $connect->error;
}

 */
//关闭数据库
mysqli_close($connect);
?>

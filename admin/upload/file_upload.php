<?php
header("Content-type: text/html; charset=utf-8");
include_once "connect.php";
include_once "file_change.php";
date_default_timezone_set('PRC'); //用于设置时区

$time=date("Y-m-d H-i-s",time());//获取上传时间

//被上传的文件信息
$uploaded_name = $_FILES[ 'myfile' ][ 'name' ];
$uploaded_size = $_FILES[ 'myfile' ][ 'size' ];
$uploaded_tmp  = $_FILES[ 'myfile' ][ 'tmp_name' ];

$target_path='../../upload/upload/file_upload/';//安装好后修改一下路径
//isset($_POST['myfile']) &&
$data_table_name='';

if (isset($_POST['type']))
{
    //上传到的路径
    $target_folder=$_POST['type'];//目标文件夹
    $target_path="$target_path"."$target_folder"."/";//上传路径
    if (file_filter($uploaded_name))//如果被上传文件符合过滤规则
    {
        if (file_exists($target_path.$uploaded_name))
        {
            die("  <script>
                    alert('上传失败，文件已存在');
                    window.location.href = '../';
                    </script>
                  ");//上传文件
        }
        else
        {
            //$uploaded_name=iconv("gbk","UTF-8", $uploaded_name);//防中文乱码
            move_uploaded_file($uploaded_tmp,$target_path."$uploaded_name");
        }
        $data_table_name=$target_folder;
        include_once "data_insert.php";
        echo "  <script>
                    alert('上传成功');
                    window.location.href = '../';
                    </script>
                  ";//上传文件

    }
    else
    {
        die("	<script>
				alert('非法文件，请检查您的文件');
				window.location.href = '../';
                </script></script>");
    }
}
?>




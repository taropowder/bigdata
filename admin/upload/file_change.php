<?php
function file_filter($file_name)
//文件过滤函数
{
	$flag=false;
	$ban_ext = array("php");//黑名单
	$temp_name=explode(".","$file_name");
	$ext = end($temp_name);
	if (in_array($ext,$ban_ext))
		die("<script>alert('文件类型错误！')</script>");
	else
		$flag=true;
	return $flag;
}

function file_rename($real_file_name)
//重命名函数
{
	$time=date("Y-m-d H-i-s",time());
	$temp=explode(".",$real_file_name);
	$ext = end($temp);
	$file_name="$time.$ext";
	return $file_name;
}


/*
function file_upload($tmp_name,$target_path)
//文件上传函数
{
	move_uploaded_file($tmp_name,$target_path."$tmp_name");
	echo "<script>alert('上传成功')</script>";
}
*/
?>
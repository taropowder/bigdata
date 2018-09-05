<?php
include("sqlhelper.php");
$mysqli = new sqlhelper();
 echo"<meta charset='utf-8'>";
/* if (isset($_POST['submit'])){
	
    $name = $_FILES['wenjian']['name'];
 }

   $sql = "SELECT id FROM result WHERE  name= '$name'";

            $res= $mysqli->execute_dql($sql);
//            var_dump($res->num_rows);
            if ($res->num_rows!=0)
			{
                $row = $res->fetch_array(MYSQLI_NUM);
                $id = $row[0];
               // echo"$id";

				
			}
			else
				echo"错误";
			*/
$i=addslashes($_GET['id']);

$file_path = "../introduce/file/";
$sql = "delete FROM result WHERE id = '$i'";
//            echo $sql;
        $res= $mysqli->execute_dql($sql);
	if($res)
	{
		$sql = "SELECT name FROM result_file WHERE result_id = '$i' ";
		$res = $mysqli->execute_dql($sql);
		while ($row = $res->fetch_row()){
			unlink($file_path.$row[0]);
		}
		echo"<script>alert('删除成功');</script>";
	}
	else
	{
		echo"<script>alert('删除失败');</script>";
	}
echo "<script>window.location.href='result.php'</script>";
?>

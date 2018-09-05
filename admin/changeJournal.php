<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/8/19
 * Time: 下午2:04
 */
include("sqlhelper.php");
if (isset($_GET['del'])) {
    $mysqli = new sqlhelper();
    $i = addslashes($_GET['del']);

    $file_path = "../journal/file/";
    $sql = "delete FROM journal WHERE id = '$i'";
    $res = $mysqli->execute_dql($sql);
    if ($res) {
        $sql = "SELECT name FROM journal_file WHERE journal_id = '$i' ";
        $res = $mysqli->execute_dql($sql);
        while ($row = $res->fetch_row()) {
            echo $file_path . $row[0];
            unlink($file_path . $row[0]);
        }
        $sql = "DELETE FROM journal_file WHERE journal_id ='$i' ";
        $mysqli->execute_dml($sql);
        echo "1";
    } else {
        echo "0";
    }
}
if (isset($_POST['title'])) {
    $mysqli = new sqlhelper();
    if (isset($_POST['title'])) {
        $title = addslashes($_POST['title']);
        $keyword = addslashes($_POST['keyword']);
        $author = addslashes($_POST['author']);
        $abstract = addslashes($_POST['abstract']);
        $time = addslashes($_POST['time']);

    }

    $sql = "INSERT INTO journal (name, time, abstract, keyword, author)
      VALUES ('$title','$time', '$abstract', '$keyword', '$author')";

    $res = $mysqli->execute_dml($sql);
    if (!$res) {
        echo $sql;
        echo "<script>alert('上传失败')</script>";
    } else
        echo "<script>alert('上传成功')</script>";

    $name = $_FILES['file-2']['name'];
    $file_data = $_FILES['file-2']['tmp_name'];

    if (is_array($name)) {

        $str = "SELECT id FROM journal WHERE name='$title'";
        $res = $mysqli->execute_dql($str);
        $row = $res->fetch_row();
        if ($row) {
            for ($i = 0; $i < count($name); $i++) {
                $sql = "INSERT INTO journal_file(journal_id,name) VALUES('$row[0]','$name[$i]')";
                $res = $mysqli->execute_dql($sql);
                if (!$res) {
                    echo "<script>alert('上传失败')</script>";
                }else{
                    $upload_path = "../journal/file/";
                    $path = $upload_path . $name[$i];
                    $file_path = move_uploaded_file($file_data[$i], $path);
                    if ($file_path == false) {
                        echo "<script>alert('文件保存失败！');</script>";
                    }
                }

            }

        }
    }
    echo "<script>window.location.href='journal.php'</script>";

}
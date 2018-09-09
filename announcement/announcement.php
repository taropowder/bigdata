<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/9/9
 * Time: 下午5:18
 */
if (isset($_GET['id'])) {
    include_once "../sqlhelper.php";
    $mysqli = new sqlhelper();
    $id = addslashes($_GET['id']);
    $sql = "SELECT
  announcement.id,
  announcement.time,
  announcement.content,
  announcement.content,
  announcement_file.file_name
FROM announcement, announcement_file
WHERE announcement.id = announcement_file.announcement_id
      AND announcement.id = $id";

    $res = $mysqli->execute_dql($sql);
    $row = $res->fetch_row();

    foreach ($row as $value){
        echo $value."<br/>";
    }
}
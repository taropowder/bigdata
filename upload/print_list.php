<?php

function get_count($table_name,$connect)
{
    $sql = "SELECT count(*) FROM file_type_$table_name";
    $result = mysqli_query($connect,$sql);
    if (empty($result))
        $flag = 0;
    else
    $rows = mysqli_fetch_row($result);
    $flag = $rows[0];
    return $flag;
}


?>
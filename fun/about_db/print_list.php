<?php
function get_count($table_name,$connect)
{
    $sql = "SELECT count(*) FROM relax_type_$table_name";
    $result = mysqli_query($connect,$sql);
    $rows = mysqli_fetch_row($result);
    $count = $rows[0];
    if ( empty($count) )
        $count = 0;
    return $count;
}
?>
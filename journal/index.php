<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/7/21
 * Time: 下午10:15
 */
include 'base.php';
include_once "../sqlhelper.php";
date_default_timezone_set('Asia/Shanghai');
if (!isset($_SESSION['userid'])){
    header('Location: ../login');
    exit();
}
if (!isset($_SESSION['journaltime'])){
    $_SESSION['journaltime'] = date("Y-m-d H:i:s");
}
$mysqli = new sqlhelper();
$userid = $_SESSION['userid'];
$sql = "SELECT id,name,time,keyword FROM journal";
$res = $mysqli->execute_dql($sql);
if (isset($_GET['time'])){
    $now = date("Y-m-d H:i:s");
    $id = addslashes($_GET['id']);
    $time = $_GET['time'];
    $sql = "INSERT INTO data_journal (journalid, enter_time, leave_time, userid) VALUE ('$id','$time','$now','$userid')";
    $mysqli->execute_dml($sql);
}
?>


<div class="banner-sec" >
    <div class="container">
        <div class="menu-bar">
            <ul>
                <li >
                    <p class="active">期刊会议 </p>
                </li>
            </ul>
        </div>
    </div>
</div>
<section class="blog-single">
    <div class="container">
        <div class="education-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 left-grid">
                        <ul class="left-items">
                            <?php
                            $i=0;
                            while ($row = $res->fetch_row()){
                                if($i%2==0){
                                    echo "<li>
                                        <a href='journal.php?id=$row[0]' title='点击查看'><h3>$row[1]</h3></a><h4>$row[2]</h4>
                                       <span></span>
                                       </li>";
                                }
                                $i++;}
                            ?>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="right-items">
                            <?php
                            $i=0;
                            mysqli_data_seek($res,0);
                            while ($row = $res->fetch_row()){
                                if($i%2!=0){
                                    echo "<li>
                                        <a href='journal.php?id=$row[0]' title='点击查看'><h3>$row[1]</h3></a><h4>$row[2]</h4>
                                       <span></span>
                                       </li>";
                                }
                                $i++;}
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include "../footer.php";
?>

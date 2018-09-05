<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/7/21
 * Time: 下午9:40
 */
include '../base.php';
include_once "../sqlhelper.php";
date_default_timezone_set('Asia/Shanghai');
if (!isset($_SESSION['userid'])){
    header('Location: ../login');
    exit();
}
$mysqli = new sqlhelper();
$userid = $_SESSION['userid'];
$sql2 = "SELECT id,name,introduction,time FROM research WHERE way = '人工智能'  ORDER BY time DESC";
$res2 = $mysqli->execute_dql($sql2);


?>

<section class="portfolio-section portfolio-inner">
    <div class="main-container section-padding">
        <div id="portfolio">
            <div class="menu_item"><br><br><br><br>
                <ul class="project-menu">
                    <a href="index.php"><li class="filter item" >人类行为预测</li></a>
                    <a href="AI.php"><li class="filter item  LiActive">人工智能</li></a>
                    <a href="security.php"><li class="filter item" >网络安全</li></a>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="blog-single">
    <div class="container">
        <div class="education-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 left-grid">
                        <ul class="left-items">
                            <?php
                            $i=0;
                            while ($row2 = $res2->fetch_row()){
                                if($i%2==0){
                                    echo "<li>
                                <a title='点击查看' href='research.php?id=$row2[0]'><h3>$row2[1]</h3></a>
                                <h4>$row2[2]</h4>
                                <h4>$row2[3]</h4>
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
                            mysqli_data_seek($res2,0);
                            $i=0;
                            while ($row2 = $res2->fetch_row()){
                                if($i%2!=0){
                                    echo "<li>
                                <a title='点击查看' href='research.php?id=$row2[0]'><h3>$row2[1]</h3></a>
                                <h4>$row2[2]</h4>
                                <h4>$row2[3]</h4>
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
include '../footer.php';
?>




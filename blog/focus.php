<?php
include 'base.php';
include 'sqlhelper.php';
$userid = $_SESSION['userid'];
$mysqli = new sqlhelper();
$time = date("Y-m-d H:i:s");
$sql = "SELECT user.id,user.username,follow.id FROM follow,user WHERE follow.followeduser=user.id AND follow.followuser = $userid ";
$res=$mysqli->execute_dql($sql);
if (isset($_GET['id'])){
    $id=addslashes($_GET['id']);
    $sql2 = "INSERT INTO `follow`(`followeduser`, `followuser`, `time`) VALUES ('$id','$userid','$time')";
    $mysqli->execute_dml($sql2);
}
if (isset($_GET['no'])){
    $id=addslashes($_GET['no']);
    $sql3 = "DELETE FROM follow WHERE id = $id";
    $mysqli->execute_dml($sql3);
}
$res=$mysqli->execute_dql($sql);
?>
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
                                <a title=\"点击查看\" href='user.php?id=$row[0]'><h3>$row[1]</h3></a>
                                <a title=\"点击取消关注\" href=\"?no=$row[2]\">取消关注</a>
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
                                <a title=\"点击查看\" href='blog.php?id=$row[0]'><h3>$row[1]</h3></a>
                                <a title=\"点击取消关注\" href=\"?no=$row[2]\">取消关注</a>
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
include "footer.php";
?>
<script>
    $(document).ready(function() {
        $('li').removeClass('active');
        $('#focus').addClass('active');
    });
</script>




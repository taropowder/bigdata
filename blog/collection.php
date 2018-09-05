<?php
include 'base.php';
include 'sqlhelper.php';
$userid = $_SESSION['userid'];
$mysqli = new sqlhelper();
$time = date("Y-m-d H:i:s");
$sql = "SELECT
  blog.id,
  blog.title,
  collection.time
FROM blog, collection
WHERE collection.blogid=blog.id and collection.userid = $userid ORDER BY blog.time ";

if (isset($_GET['id'])) {
    $id = addslashes($_GET['id']);
    $sql3 = "SELECT * FROM collection WHERE blogid='$id' AND userid = '$userid'";
    $res3 = $mysqli->execute_dql($sql3);
    if ($res3->num_rows) {
        echo "<script>alert('您已经收藏过了');window.location.href=\"blog.php?id=$id\";  </script>";
    } else {
        $sql2 = "INSERT INTO `collection`(`blogid`, `userid`, `time`) VALUES ('$id','$userid','$time')";
        $mysqli->execute_dml($sql2);
    }
}
if (isset($_GET['no'])) {
    $id = addslashes($_GET['no']);
    $sql3 = "DELETE FROM collection WHERE blogid=$id";
    $mysqli->execute_dml($sql3);
}
$res = $mysqli->execute_dql($sql);
?>
<section class="blod-inner-sec">
    <div class="container">
        <div class="blog-sec">
            <div class="row blog-posts">
                <div class="col-md-6 left-sec">
                    <?php
                    $i = 0;
                    mysqli_data_seek($res, 0);
                    while ($row = $res->fetch_row()) {
                        if ($i % 2 == 0) {
                            echo "<div class=\"blog-item\">
                        <h3><a href='blog.php?id=$row[0]'>$row[1]</a></h3>
                        <h5>$row[2]</h5>
                        <a href=\"collection.php?no=$row[0]\">取消收藏</a>
                        <span class=\"icon-sec\"><i class=\"far fa-newspaper\"></i></span>
                    </div>";
                        }
                        $i++;
                    }
                    ?>
                </div>
                <div class="col-md-6 right-sec">
                    <?php
                    $i = 0;
                    mysqli_data_seek($res, 0);
                    while ($row = $res->fetch_row()) {
                        if ($i % 2 != 0) {
                            echo "<div class=\"blog-item\">
                        <h3><a href='blog.php?id=$row[0]'>$row[1]</a></h3>
                        <h5>$row[2]</h5>
                        <a href=\"collection.php?no=$row[0]\">取消收藏</a>
                        <span class=\"icon-sec\"><i class=\"far fa-newspaper\"></i></span>
                    </div>";
                        }
                        $i++;
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>
<?php
include 'footer.php';
?>
<script>
    $(document).ready(function() {
        $('li').removeClass('active');
        $('#star').addClass('active');
    });
</script>
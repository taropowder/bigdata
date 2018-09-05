<!DOCTYPE html>
<html lang="en">
<?php
include "sqlhelper.php";
include_once "login_require.php";
$mysqli = new sqlhelper();
$blogid = @$_GET['id'];
$userid = $_SESSION['userid'];
$sql6 = "SELECT * FROM blog_like WHERE blogid='$blogid' AND userid = '$userid'";
$res6 = $mysqli->execute_dql($sql6);
$sql7 = "SELECT * FROM collection WHERE blogid='$blogid' AND userid = '$userid'";
$res7 = $mysqli->execute_dql($sql7);
if (isset($_GET['id'])){

    $time = date("Y-m-d H:i:s");
    $sql = "SELECT blog.id,blog.title,blog.content,blog.userid,blog.time,user.username,user.id FROM blog,user WHERE user.id=blog.userid AND blog.id = $blogid";
    $res=$mysqli->execute_dql($sql);
    $row  = $res->fetch_row();
    if (isset($_POST['comment'])){
        $content = addslashes($_POST['comment']);


        $sql3 = "INSERT INTO `comment`(`content`, `time`, `userid`, `blogid`) VALUES ('$content','$time','$userid','$blogid') ";
        $mysqli->execute_dml($sql3);
    }
    $sql2 = "SELECT
  comment.id,
  comment.content,
  comment.time,
  user.username
FROM comment, user
WHERE user.id = comment.userid AND blogid = $blogid ORDER BY comment.time DESC ";
    $res2 = $mysqli->execute_dql($sql2);
    $sql4 = "SELECT COUNT(collection.id) FROM collection WHERE collection.blogid=$blogid";
    $res3 = $mysqli->execute_dql($sql4);
    $row3 = $res3->fetch_row();
    $sql5 = "SELECT COUNT(blog_like.id) FROM blog_like WHERE blog_like.blogid=$blogid";
    $res4 = $mysqli->execute_dql($sql5);
    $row4 = $res4->fetch_row();
    $sql = "INSERT INTO data_view (blogid, userid, time) VALUE ('$blogid','$userid','$time')";
    $mysqli->execute_dml($sql);

}

?>
<head>
    <meta charset="UTF-8">
    <title><?php echo $row[1];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="../css/fonts.googleapis.css" rel="stylesheet">
    <link href="../css/googleapls.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/prettyPhoto.css" />
    <link href="../css/jquery.bsPhotoGallery.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="new.css">
</head>

<body>
<header>
    <div class="container">
        <a href="../index.php" class="download-sec right">退出</a>
        <div class="profile-img">
            <a href="index.php" title="主页">
                <img src="../images/photo.png" alt="img" width="360px" height="330px">
            </a>
        </div>
    </div>
</header>
    <section class="blog-single">
        <div class="container">
            <div class="blog-ttl-sec"><br><br><br><br><br><br><br><br><br>
                <span class="icon-sec"><i class="far fa-newspaper"></i></span>
                <h1><?php echo $row[1];?></h1>
                <h3><a href="user.php?id=<?php echo $row[6];?> "><?php echo $row[5];?> </a>  <a href="focus.php?id=<?php echo $row[6];?>">关注</a></h3>
                <?php
                if ($res6->num_rows) {
                    echo "<i class='fa fa-thumbs-up fa-2x '></i>
                <span class='count'>$row4[0]&nbsp;&nbsp;&nbsp;</span>";
                }
                else{
                    echo "<a href='like.php?id=$row[0]' title='点赞'><i class='far fa-thumbs-up fa-2x po'></i></a>
                     <span class='count'>$row4[0]&nbsp;&nbsp;&nbsp;</span>";
                }
                if ($res7->num_rows) {

                    echo "<i class='fas fa-star fa-2x '></i>
                <span class='count'>$row3[0]</span>";
                }
                else
                    {
                echo "<a href='collection.php?id=$row[0]' title='收藏'><i class='far fa-star fa-2x po'></i></a>
                <span class='count'> $row3[0]</span>";
                }
                ?>
            </div>
            <div class="main-content">

                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php
                echo   str_replace("\n","<br/>",$row[2]);
                    ?>

            </p>
            </div>
        </div>
    </section>
<section class="blog-comment">

    <div class="container">
        <div class="main-content">
            <form action="?id=<?php echo $blogid;?>" method="post">
            <h3>评论：</h3><br>
            <div class="tex">

                <textarea name="comment">
                </textarea>
                <button type="submit" class="btn right">发表评论</button>
            </form>
            </div>
            <?php
            while ($row2= $res2->fetch_row()){
                echo "<div class=\"comment\">
                <p>$row2[3]</p><br>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$row2[1]</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    $row2[2]</p>
            </div>";
            }
            ?>

        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 ">
                <img src="../images/footer-sign.png" alt="sign">
            </div>
            <div class="col-md-6 col-sm-6">
                <h6 class="right copy-right">(C) 2018. 大数据与网络安全实验室</h6>
            </div>
        </div>
    </div>

</footer>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js">
    </script>
    <script src="../js/fontawesome.js"></script>
<script src="../js/new.js"></script>
    <script src="../js/jquery.mixitup.min.js"></script>
    <script type="text/javascript" src="../js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="../js/jquery.isotope.js"></script>
    <script src="../js/jquery.bsPhotoGallery.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
    <script>
    $(document).ready(function() {
        $('ul.first').bsPhotoGallery({
            "classes": "col-md-3 col-sm-4 col-2 ",
            "hasModal": true,
            // "fullHeight" : false
        });
    });
    </script>
</body>

</html>
<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/7/21
 * Time: 下午9:53
 */
include_once "../sqlhelper.php";
include_once "login_require.php";
if (isset($_GET['id'])) {
    $mysqli = new sqlhelper();
    $id = addslashes($_GET['id']);
    $sql = "SELECT name,introduction,time,content,way FROM research WHERE id = $id";
    $res = $mysqli->execute_dql($sql);
    $row = $res->fetch_assoc();
    $time = date("Y-m-d H:i:s");
    $mysqli->close_sql();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $row['name'];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="../css/fonts.googleapis.css" rel="stylesheet">
    <link href="../css/googleapls.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/prettyPhoto.css" />
    <link href="../css/jquery.bsPhotoGallery.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/new.css">
</head>

<body>
<header>
    <div class="container">
        <a href="index.php?time=<?php echo $time;?>&id=<?php echo $id;?>"   class="download-sec right">返回</a>
        <div class="profile-img">
            <img src="../images/photo.png" alt="img" width="360px" height="330px">
        </div>
    </div>
</header>
<section class="blog-single">
    <div class="container">
        <div class="blog-ttl-sec"><br><br><br><br><br><br><br><br><br>
            <span class="icon-sec"><i class="far fa-newspaper"></i></span>
            <h1><?php echo $row['name'];?></h1>
        </div>
        <div class="main-content">

            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php
                echo   str_replace("\n","<br/>",$row['content']);
                ?>
            </p>
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

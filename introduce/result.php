<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/7/21
 * Time: 下午8:25
 */
if (isset($_GET['id'])){
    $id = $_GET['id'];
    include_once "../sqlhelper.php";
    $mysqli = new sqlhelper();
    $sql = "SELECT id,title,content FROM result WHERE id = $id";
    $res = $mysqli->execute_dql($sql);
    $row = $res->fetch_row();
    $sql = "SELECT name,type FROM result_file WHERE result_id = $id";
    $res2 = $mysqli->execute_dql($sql);
   /* while ($row2 = $res2->fetch_row()){
        if ($row2[1]=='图片'){
            echo "<li><img src='file/$row2[0]' alt=\"$row[1]\" /></li>";
        }elseif ($row2[1]=='文件'){
            echo "<li><a href='file/$row2[0]'>$row2[0]</a></li>";
        }
    }*/
}
?>
<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" type="text/css" href="../css/new.css">
</head>

<body>
<header>
    <div class="container">
        <a href="index.php"  class="download-sec right">返回</a>
        <div class="profile-img">
            <img src="../images/photo.png" alt="img" width="360px" height="330px">
        </div>
    </div>
</header>
<section class="blog-single">
    <div class="container">
        <div class="blog-ttl-sec"><br><br><br><br><br><br><br><br><br>
            <span class="icon-sec"><i class="far fa-newspaper"></i></span>
            <h1><?php echo $row[1];?></h1>
        </div>
        <div class="main-content">

            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php
                echo "<h3>$row[2]</h3><br><br>";
                while ($row2 = $res2->fetch_row()){
                    if ($row2[1]=='图片'){
                        echo "<img src='file/$row2[0]' alt=\"$row[1]\" />";
                    }elseif ($row2[1]=='文件'){
                        echo "<a href='file/$row2[0]'>$row2[0]</a><br/>";
                    }
                }
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
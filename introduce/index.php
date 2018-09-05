<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/7/21
 * Time: 下午5:42
 */
include_once "../sqlhelper.php";
$mysqli = new sqlhelper();
$sql = "SELECT * FROM introduction";
$res = $mysqli->execute_dql($sql);
$row = $res->fetch_row();
$sql = "SELECT id,file_name FROM introduce";
$res2 = $mysqli->execute_dql($sql);
$sql = "SELECT result.id,result.title,result.content FROM result";
$res3 = $mysqli->execute_dql($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Big Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- css files -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/chromagallery.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- /css files -->
    <!-- fonts -->
    <link href='../css/fon1.css' rel='stylesheet' type='text/css'>
    <link href='../css/fon2.css' rel='stylesheet' type='text/css'>
    <!-- /fonts -->
    <!-- js files -->
    <script src="js/modernizr.custom.js"></script>
    <!-- /js files -->
</head>
<body id="index.html" data-spy="scroll" data-target=".navbar" data-offset="60">
<!-- Top Bar -->
<div class="navbar-wrapper">
    <div class="container">
        <nav class="navbar navbar-inverse navbar-static-top cl-effect-21">
            <div class="container">
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="../index.php">Big Data and network security</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- /Navigation Bar -->
<!-- Banner Section -->
<!-- Carousel
   ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php $flag=1;
        $count = $res2->num_rows;
        $i = 0;
        while ($i<$count){
            ?>
            <li data-target="#myCarousel" data-slide-to="<?php echo $i; if ($flag){echo 'class="active"';$flag=0;}?>" ></li>
        <?php
            $i++;
        }
        $flag = 1;
        ?>


    </ol>
    <div class="carousel-inner" role="listbox">
        <?php

        while ($row2 = $res2->fetch_row()){

        ?>

        <div class="item <?php if ($flag){echo 'active';$flag=0;}?>">
            <img class="slide" src="file/<?php echo $row2[1];?>" ?>">
            <div class="container">
                <div class="carousel-caption">

                </div>
            </div>
        </div>
        <?php
        }

        ?>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->
<section class="about-us" id="about">
    <h3 class="text-center slideanim">实验室介绍</h3>
    <p class="text-center slideanim"><?php echo $row[0];?></p>
</section>
<!-- /About Section -->
<!-- Our Services -->
<section class="our-services" id="services">
    <h3 class="text-center slideanim">实验室成果</h3>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <?php
                while ($row3 = $res3->fetch_row()) {
                    $sql = "SELECT name FROM result_file WHERE result_id = $row3[0] AND type= '图片'";
                    $res4 = $mysqli->execute_dql($sql);
                    $row4 = $res4->fetch_row();
                    ?>
                <div class='serv-details'>
                    <div class='row'>
                        <div class='col-sm-6 col-xs-6'>
                            <img src='file/<?php echo $row4[0];?>' alt='' class='img-responsive slideanim'>
                        </div>
                        <div class='col-sm-6 col-xs-6'>
                            <div class='serv-img-details slideanim'>
                                <a href='result.php?id=<?php echo $row3[0];?>' ><h4><?php echo $row3[1];?></h4></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='serv-info slideanim'>
                    <p><?php echo $row3[2];?></p>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>
<a href="#0" class="cd-top">Top</a>
<?php
$mysqli->close_sql();
include "footer.php";
?>




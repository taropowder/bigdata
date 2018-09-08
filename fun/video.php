<?php
session_start();
include_once "./about_db/print_list.php";
include_once "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>休闲娱乐</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="css/fonts.googleapis.css" rel="stylesheet">
    <script src="js/new.js"></script>
    <link href="css/googleapls.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/prettyPhoto.css" />
    <link href="css/jquery.bsPhotoGallery.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/new.css">
    <!--[if IE 6]>
    <script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
</head>

<body>
<header>
    <div class="container">
        <a href="../" class="download-sec right">退出</a>
        <div class="profile-img">
            <a href="index.php" title="主页">
                <img src="images/photo.png" alt="img" width="360px" height="330px">
            </a>
        </div>
    </div>
</header>
<section class="portfolio-section portfolio-inner" id="upl">
    <div class="main-container section-padding">
        <div id="portfolio">
            <div class="menu_item"><br><br><br><br>
                <ul class="project-menu">
                    <a href="index.php"><li class="filter item" >图片</li></a>
                    <a href="video.php"><li class="filter item   LiActive">视频</li></a>
                    <a href="radio.php"><li class="filter item" > 音频</li></a>
                    <a href="doc.php"><li class="filter item" >文档</li></a>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="blog-single">


    <div class="container">
        <div class="page-container">
            <div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
		</span>
                <span class="r">共有数据：<strong><?php echo get_count('video',$connect); ?></strong> 条</span>
            </div>
            <div class="mt-20" id="tab">
                <table class="table table-border table-bordered table-bg table-hover table-sort">
                    <thead>
                    <tr class="text-c">
                        <th width="80">ID</th>
                        <th width="100">视频</th>
                        <th>视频名称</th>
                        <th width="150">时间</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $dir="./upload/video/";
                    $sql = "SELECT * FROM relax_type_video";
                    $result = mysqli_query($connect, $sql);
                    while(@$data=mysqli_fetch_array($result))
                    {
                        echo "<tr class='text-c'>";
                        echo "	<td>{$data['id']}</td>";
                        echo "	<td><a href='#' title='点击查看'>";
                        echo "		<div class='folio_small'>";
                        echo "		   <a href='./shiPin.php?file_name={$data['name']}'>";
                        echo "			   <video src='$dir{$data['name']}' width='100%' height='100%' autoplay='false' loop='true'></video>";
                        echo "		   </a>";
                        echo "		</div>";
                        echo "	</a></td>";
                        echo "	<td class='text-c'>{$data['name']}</td>";
                        echo "	<td>{$data['time']}</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section><br><br><br><br><br><br>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 ">
                <img src="images/footer-sign.png" alt="sign">
            </div>
            <div class="col-md-6 col-sm-6">
                <h6 class="right copy-right">(C) 2018. 大数据与网络安全实验室</h6>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script src="js/fontawesome.js"></script>
<script src="js/jquery.mixitup.min.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="js/jquery.isotope.js"></script>
<script src="js/jquery.bsPhotoGallery.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script>
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
    $('.table-sort').dataTable({
        "aaSorting": [[0, "desc" ]],//默认第几个排序
        "bStateSave": true,//状态保存
        "aoColumnDefs": [
            //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
            {"orderable":false,"aTargets":[1]}// 制定列不参与排序
        ]
    });
</script>
</body>

</html>
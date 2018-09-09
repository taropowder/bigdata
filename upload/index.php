<?php
session_start();
include_once "login_require.php";
include_once "./about_db/print_list.php";
include_once "connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>上传/下载</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="../css/fonts.googleapis.css" rel="stylesheet">
    <script src="../js/new.js"></script>
    <link href="../css/googleapls.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/prettyPhoto.css" />
    <link href="../css/jquery.bsPhotoGallery.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="../static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="../lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="../static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="../static/h-ui.admin/css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/new.css">
    <!--[if IE 6]>
    <script type="text/javascript" src="../lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
</head>

<body>
<header>
    <div class="container">
        <a href="upload.php" class="download-sec left" id="upload">上传</a>
        <a href="../" class="download-sec right">退出</a>
        <div class="profile-img">
            <a href="../index.php" title="主页">
                <img src="../images/photo.png" alt="img" width="360px" height="330px">
            </a>
        </div>
    </div>
</header>
<body>
<!--获取当前文件名-->


<section class="portfolio-section portfolio-inner" id="upl">
    <div class="main-container section-padding">
        <div id="portfolio">
            <div class="menu_item"><br><br><br><br>
                <ul class="project-menu">
                    <a href="index.php"><li class="filter item   LiActive" >图片</li></a>
                    <a href="file.php"><li class="filter item">文件</li></a>
                    <a href="doc.php"><li class="filter item" > 文档</li></a>
                    <a href="tool.php"><li class="filter item" >工具</li></a>
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
                <span class="r">共有数据：<strong id="count">
				<?php
					echo get_count('pic',$connect);
				?>
				</strong> 条</span>
            </div>
            <div class="mt-20" id="tab">
                <table class="table table-border table-bordered table-bg table-hover table-sort">
                    <thead>
                    <tr class="text-c">
                        <th width="80">ID</th>
                        <th width="100">图片</th>
                        <th width="100">图片名称</th>
                        <th width="190">时间</th>
                    </tr>
                    </thead>
                    <tbody>
					<!--用于将已上传文件信息打印出来-->
					<?php
						$dir="./upload/file_upload/pic/";
						$sql = "SELECT * FROM file_type_pic";
						$result = mysqli_query($connect, $sql);
						while($data=mysqli_fetch_array($result))
						{
							echo "<tr class='text-c'>";
							echo "<td>{$data['id']}</td>";
							echo "<td><a href='./upload/download.php?filename=$dir{$data['name']}' title='点击查看'>";
							echo "<div class='folio_small'>";
							echo "<img src='$dir{$data['name']}'  width='100%' height='100%'/>";
							echo "<div class='zoom-icons'>";
							echo "<p>{$data['name']}</p>";
							echo "</div>";
							echo "</div>";
							echo "</a></td>";
							echo "<td class='text-c'>{$data['name']}</td>";
							echo "<td>{$data['time']}</td>";
							echo "</tr>";
						}
					?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section><br><br><br><br><br><br>
<?php
include 'footer.php';
?>

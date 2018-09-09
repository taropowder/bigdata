<?php
include 'base.php';
?>
<body>
<header>
    <div class="container">
        <a href="#" class="download-sec right">退出</a>
        <div class="profile-img">
            <a href="index.php" title="主页">
                <img src=../images/photo.png" alt="img" width="360px" height="330px">
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
                    <a href="video.php"><li class="filter item">视频</li></a>
                    <a href="radio.php"><li class="filter item   LiActive" > 音频</li></a>
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
                <span class="r">共有数据：<strong><?php echo get_count('radio',$connect); ?></strong> 条</span>
            </div>
            <div class="mt-20" id="tab">
                <table class="table table-border table-bordered table-bg table-hover table-sort">
                    <thead>
                    <tr class="text-c">
                        <th width="80">ID</th>
                        <th width="100">音频</th>
                        <th>音频名称</th>
                        <th width="150">时间</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $dir="./upload/radio/";
                    $sql = "SELECT * FROM relax_type_radio";
                    $result = mysqli_query($connect, $sql);
                    while(@$data=mysqli_fetch_array($result))
                    {
                        echo "<tr class='text-c'>";
                        echo "<td>{$data['id']}</td>";
                        echo "<td><a href='$dir{$data['name']}' title='点击查看'>";
                        echo "<audio controls='controls'>";
                        echo "<source src='$dir{$data['name']}' type='audio/mp3' />";
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
include '../upload/footer.php';
?>
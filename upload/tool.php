<?php
session_start();
include_once "login_require.php";
include_once "./about_db/print_list.php";
include_once "connect.php";
?>
<?php
include 'base.php';
?>
<section class="portfolio-section portfolio-inner" id="upl">
    <div class="main-container section-padding">
        <div id="portfolio">
            <div class="menu_item"><br><br><br><br>
                <ul class="project-menu">
                    <a href="index.php"><li class="filter item" >图片</li></a>
                    <a href="file.php"><li class="filter item">文件</li></a>
                    <a href="doc.php"><li class="filter item" > 文档</li></a>
                    <a href="tool.php"><li class="filter item   LiActive" >工具</li></a>
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
                <span class="r">共有数据：
                    <strong>
                        <?php
                        echo get_count('tool',$connect);
                        ?>
                    </strong> 条</span>
            </div>
            <div class="mt-20" id="tab">
                <table class="table table-border table-bordered table-bg table-hover table-sort">
                    <thead>
                    <tr class="text-c">
                        <th width="70">ID</th>
                        <th width="150">名称</th>
                        <th width="150">时间</th>
                        <th width="150">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include_once "connect.php";
                    $dir="./upload/file_upload/tool/";
                    $download_dir = "file_upload/tool/";
                    $sql = "SELECT * FROM file_type_tool";
                    $result = mysqli_query($connect, $sql);
                    while(@$data=mysqli_fetch_array($result))
                    {
                        echo "<tr class='text-c'>";
                        echo "<td>{$data['id']}</td>";
                        echo "<td>{$data['name']}</td>";
                        echo "<td>{$data['time']}</td>";
                        echo "<td><a href='./upload/download.php?filename=$download_dir{$data['name']}'>点击下载</a></td>";
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

<?php
include 'base.php';
include "sqlhelper.php";
if (isset($_POST['title'])){
    $title = addslashes($_POST['title']);
    $content = addslashes($_POST['content']);
    $userid = $_SESSION['userid'];
    $starttime = addslashes($_POST['starttime']);
    $time = date("Y-m-d H:i:s");
    $mysqli = new sqlhelper();
    $sql  = "INSERT INTO `blog`(`title`, `content`, `userid`,`time`,`starttime`) VALUES ('$title','$content','$userid','$time','$starttime')";
    $mysqli->execute_dml($sql);
    $sql2 = "SELECT id FROM blog WHERE title = '$title'";
    $res= $mysqli->execute_dql($sql2);
    $row = $res->fetch_row();
    header("location: blog.php?id=$row[0]");
}
$starttime = date("Y-m-d H:i:s");
?>
    <section class="blod-inner-sec">
<div class="getin-sec" id="contact-sec">
        <div class="container">
            <div class="row"  >
                <div class="col-md-12 col-sm-24"  >
                    <div class="form">
                        <h3>写博客</h3>
                        <form method="post">
                            <ul class="row">

                                    <li class="col-md-12">
                                        <input type="text" name="title" placeholder="请输入标题" required >
                                    </li>
                                    <li class="col-md-12">
                                        <textarea placeholder="请输入内容" name="content" required></textarea>
                                    </li>
                                    <li class="col-md-12">
                                        <button type="submit" class="btn right">发表</button>
                                    </li>


                            </ul>
                            <input type="hidden" name="starttime" value="<?php echo $starttime;?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
<?php
include 'footer.php';
?>
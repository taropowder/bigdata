<?php
include 'base.php';
include "sqlhelper.php";
if (isset($_POST['id'])){
    $title = addslashes($_POST['title']);
    $content = addslashes($_POST['content']);
    $starttime = addslashes($_POST['starttime']);
    $id = addslashes($_POST['id']);
    $userid = $_SESSION['userid'];
    $time = date("Y-m-d H:i:s");
    $mysqli = new sqlhelper();
    $sql  = "UPDATE `blog` SET `title`='$title',`content`='$content' WHERE id = $id";
    $mysqli->execute_dml($sql);
    $sql = "INSERT INTO blogedit (blogid, starttime, overtime) VALUE ('$id','$starttime','$time')";
    $mysqli->execute_dml($sql);
    header("location: blog.php?id=$id");
}
if (isset($_GET['id'])){
    $id = addslashes($_GET['id']);
    $mysqli = new sqlhelper();
    $sql = "SELECT * FROM blog WHERE id = $id";
    $res= $mysqli->execute_dql($sql);
    $row= $res->fetch_row();
    $starttime = date("Y-m-d H:i:s");

}
?>
    <section class="blod-inner-sec">
<div class="getin-sec" id="contact-sec">
        <div class="container">
            <div class="row"  >
                <div class="col-md-12 col-sm-24"  >
                    <div class="form">
                        <h3>编辑博客</h3>
                        <form method="post">
                            <ul class="row">

                                    <li class="col-md-12">
                                        <input type="text" name="title" placeholder="请输入标题" value="<?php echo $row[1];?>" required >
                                    </li>
                                    <li class="col-md-12">
                                        <textarea placeholder="请输入内容" name="content" required><?php echo $row[2];?></textarea>
                                    </li>
                                <input type="hidden" name="id" value="<?php echo $row[0];?>">
                                    <li class="col-md-12">
                                        <button type="submit" class="btn right">确定</button>
                                    </li>
                            <input type="hidden" name="starttime" value="<?php echo $starttime;?>"

                            </ul>
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
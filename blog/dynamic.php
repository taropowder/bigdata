<?php
include 'base.php';
include 'sqlhelper.php';
$userid = $_SESSION['userid'];
$mysqli = new sqlhelper();
$sql = "SELECT blog.id,blog.title,blog.time,user.username,user.id FROM blog,user WHERE blog.userid=user.id ";
$res=$mysqli->execute_dql($sql);
?>
<section class="blod-inner-sec">
    <div class="container">
        <div class="blog-sec">
            <div class="row blog-posts">
                <div class="col-md-6 left-sec">
                    <?php
                    $i=0;
                    while ($row = $res->fetch_row()){
                        if($i%2==0){
                    echo "<div class=\"blog-item\">
                        <a title=\"点击查看\" href='blog.php?id=$row[0]' ><h3>$row[1]</h3></a>
                        <h4><a href='user.php?id=$row[4]' title='查看好友博客'>$row[3]</a> </h4><br>
                        <h5>$row[2]</h5><br>
                        <span class=\"icon-sec\"><i class=\"far fa-newspaper\"></i></span>
                    </div>";
                        }
                        $i++;}
                    ?>
                </div>
                <div class="col-md-6 right-sec">

                        <?php
                        $i=0;
                        mysqli_data_seek($res,0);
                        while ($row = $res->fetch_row()){
                            if($i%2!=0){
                                echo "<div class=\"blog-item\">
                        <a title=\"点击查看\" href='blog.php?id=$row[0]' ><h3>$row[1]</h3></a>
                        <h4><a href='user.php?id=$row[4]'>$row[3]</a> </h4><br>
                        <h5>$row[2]</h5><br>
                        <span class=\"icon-sec\"><i class=\"far fa-newspaper\"></i></span>
                    </div>";
                            }
                            $i++;}
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include "footer.php";
?>
<script>
    $(document).ready(function() {
        $('li').removeClass('active');
        $('#friend').addClass('active');
    });
</script>



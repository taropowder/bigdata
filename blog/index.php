<?php
include 'base.php';
include 'sqlhelper.php';
$userid = $_SESSION['userid'];
$mysqli = new sqlhelper();
$sql="SELECT  id,title,content,time FROM blog WHERE userid = $userid ORDER BY time DESC ";
$res=$mysqli->execute_dql($sql);
if(!isset($_SESSION['blogEnterTime'])){
    $_SESSION['blogEnterTime'] = date("Y-m-d H:i:s");
}
?>



<div  id="father">
</div>
<section class="blod-inner-sec">
    <div class="container">
        <div class="blog-sec">
            <div class="row blog-posts">



                <div class="col-md-6 left-sec">
                    <?php
                    $i=0;
                    while ($row = $res->fetch_array(MYSQLI_NUM)){
                        if($i%2==0){
                            echo "<div class='blog-item'><h3><a href='blog.php?id=$row[0]'>$row[1]</a> </h3><h5>$row[3]</h5>
                                    
                        <a href='edit.php?id=$row[0]' >编辑</a>
                        <span class='icon-sec'><i class='far fa-newspaper'></i></span></div>";

                        }
                        $i++;}
                    ?>

                </div>
                <div class="col-md-6 right-sec">
                    <?php
                    mysqli_data_seek($res,0);
                    $p=0;
                    while ($row = $res->fetch_array(MYSQLI_NUM)){
                        if($p%2==1){
                            echo "<div class='blog-item'><h3><a href='blog.php?id=$row[0]'>$row[1]</a> </h3><h5>$row[3]</h5>
                        <a href='edit.php?id=$row[0]' >编辑</a>
                        <span class='icon-sec'><i class='far fa-newspaper'></i></span></div>";

                        } $p++;}
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'footer.php';
?>
<script>
    $(document).ready(function() {
        $('li').removeClass('active');
        $('#index').addClass('active');
        });
</script>

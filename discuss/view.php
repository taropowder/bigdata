<?php
/**
 * Created by PhpStorm.
 * User: YOGA710
 * Date: 2018/7/16
 * Time: 9:36
 */
session_start();
error_reporting(E_ERROR | E_PARSE);
include_once "login_require.php";
?>

<!doctype html>
<html lang="ch">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="大数据与网络安全">
    <meta name="keywords" content="提问 回答 论坛 ">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>大数据与网络安全实验室论坛</title>

    <style>

        .question{
            width: 1000px;
            background-color: #fefffd;
            text-align:center;
        }
        .container{
            width: 1000px;
        }
        .commentbox{
            width: 800px;
            margin: 20px auto;
        }
        .mytextarea {
            width: 100%;
            overflow: auto;
            word-break: break-all;
            height: 100px;
            color: #000;
            font-size: 1em;
            resize: none;
        }

        .view{
            width: 70%;
            margin: 20px auto;
            clear: both;
            padding-top: 20px;
        }
        .comment-list{
            width: 90%;
            margin: 20px auto;
            clear: both;
            padding-top: 20px;
        }
        .comment-list .comment-info{
            position: relative;
            margin-bottom: 20px;
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
        }
        .comment-list .comment-info header{
            width: 10%;
            position: absolute;
        }
        .comment-list .comment-info header img{
            width: 100%;
            border-radius: 50%;
            padding: 5px;
        }
        .comment-list .comment-info .comment-right{
            padding:5px 2px 0px 0%;
        }
        .comment-list .comment-info .comment-right h4{
            margin: 5px 0px;
        }
        .comment-list .comment-info .comment-right .comment-content-header{
            height: 25px;
        }
        .comment-list .comment-info .comment-right .comment-content-header span,.comment-list .comment-info .comment-right .comment-content-footer span{
            padding-right: 2em;
            color: #aaa;
        }
        .comment-list .comment-info .comment-right .comment-content-header span,.comment-list .comment-info .comment-right .comment-content-footer span.reply-btn,.send,.reply-list-btn{
            cursor: pointer;
        }
    </style>




    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $(".meun-item").click(function() {
                $(".meun-item").removeClass("meun-item-active");
                $(this).addClass("meun-item-active");
                var itmeObj = $(".meun-item").find("img");
                itmeObj.each(function() {
                    var items = $(this).attr("src");
                    items = items.replace("_grey.png", ".png");
                    items = items.replace(".png", "_grey.png")
                    $(this).attr("src", items);
                });
                var attrObj = $(this).find("img").attr("src");
                ;
                attrObj = attrObj.replace("_grey.png", ".png");
                $(this).find("img").attr("src", attrObj);
            });
            $("#topAD").click(function() {
                $("#topA").toggleClass(" glyphicon-triangle-right");
                $("#topA").toggleClass(" glyphicon-triangle-bottom");
            });
            $("#topBD").click(function() {
                $("#topB").toggleClass(" glyphicon-triangle-right");
                $("#topB").toggleClass(" glyphicon-triangle-bottom");
            });
            $("#topCD").click(function() {
                $("#topC").toggleClass(" glyphicon-triangle-right");
                $("#topC").toggleClass(" glyphicon-triangle-bottom");
            });
            $(".toggle-btn").click(function() {
                $("#leftMeun").toggleClass("show");
                $("#rightContent").toggleClass("pd0px");
            })
        })
    </script>
    <!--[if lt IE 9]>
    <script src="js/html5.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="css/common.css" />
    <link rel="stylesheet" type="text/css" href="css/slide.css" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/flat-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.nouislider.css">
</head>

<body style="overflow-x:hidden">
<div id="wrap">
    <!-- 左侧菜单栏目块 -->
    <div class="leftMeun" id="leftMeun">
        <div id="logoDiv">
            <p id="logoP"><img id="logo" alt="左右结构项目" src="images/logo.png"><span>论坛</span></p>
        </div>
        <div id="personInfor">
            <p id="userName">
                <?php

                echo $_SESSION['user'];
                ?>
            </p>
            <p>
            <div>
            <form action="forum_exit_time.php">
                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteSource"><a href="forum_exit_time.php">退出</a></button>
            </form>
            </div>
            </p>
        </div>


        <div class="meun-item"><a href="forum.php">返回</a></div>
    </div>

    <div id="rightContent">
        <a class="toggle-btn" id="nimei">
            <i class="glyphicon glyphicon-align-justify"></i>
        </a>
        <!-- Tab panes -->
        <div class="tab-content">

            <?php
                $id = $_GET['id'];
                $p_id=$id;
                include ('connect.php');


                $a = mysqli_query($link,"select question from question where id=$id");
                $b = mysqli_query($link,"select time from question where id=$id");
                $c = mysqli_query($link,"select user from question where id=$id");
                $tit = mysqli_query($link,"select title from question where id=$id");
                $v = mysqli_fetch_array($a);
                $t = mysqli_fetch_array($b);
                $u = mysqli_fetch_array($c);
                $ti = mysqli_fetch_array($tit);
                $title=$ti['0'];

                date_default_timezone_set("Asia/Shanghai");
                $time=date('Y-m-d H:i:s');
                $user=$_SESSION['user'];
                $ask_user=$u['0'];
                mysqli_query($link,"insert into forum_look (user,time,ask_user,question) values('{$user}','{$time}','{$ask_user}','{$title}')") or die("存入数据库失败" . mysqli_error());
            ?>

            <div class="view">
            <div class="comment-info">
                <div class="comment-right">
                    <h4><?php echo $title;?></h4>
                    <p><?php echo $ask_user;?></p>
                    <div class="comment-content-header"><span><i class="glyphicon glyphicon-time"></i><?php echo $t['0'];?></span></div>
                    <p class="content"><?php echo $v['0'];?></p>

                </div>
            </div>
            </div>

            <br/>
            <br/>
            <br/>


<div class="container">
    <div class="commentbox">
        <form action="comment.php" method="post">
            <input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
            <input type="hidden" name="title" value="<?php echo $title; ?>">
            <textarea name="comment" cols="80" rows="50" placeholder="来说几句吧......" class="mytextarea" id="content"></textarea>
            <input type="submit" value="评论" style="background-color: #00ACEE; float: right;">
        </form>
    </div>
    <div class="comment-list">

        <?php
        include 'connect.php';

        $pagesize = 5;
        @$p = $_GET['p']?$_GET['p']:1;
        $offset = ($p-1)*$pagesize;

        $query=mysqli_query($link,"select * from answer where p_id=$p_id order by id desc limit $offset,$pagesize");
        while ($row=mysqli_fetch_array($query)) {

            ?>

            <div class="comment-info">
                <div class="comment-right">
                    <h4><?php echo $row['user']; ?></h4>
                    <div class="comment-content-header"><span><i
                                    class="glyphicon glyphicon-time"></i> <?php echo $row['time']; ?></span></div>
                    <p class="content"><?php echo $row['answer']; ?></p>

                </div>
            </div>
            <?php
        }
            //分页代码
            //计算问题总数
            $count_result = mysqli_query($link,"select count(*) as count from answer where p_id=$p_id");
            $count_array = mysqli_fetch_array($count_result);

            //计算总的页数
            $pagenum = ceil($count_array['count']/$pagesize);
            echo '共',$count_array['count'],'个回答';
            if($pagenum>1){
                for($i = 1;$i<=$pagenum;$i++){
                    if($i == $p){
                        echo '['.$i.']';

                    }else{
                        echo  ' <a href="forum.php?p='.$i.'">'.$i.'</a>';
                    }
                }
            }
        mysqli_close($link);
        ?>



    </div>
</div>
        </div>
    </div>
</div>
</body>


 <div role="tabpanel" class="tab-pane" id="chan">
            <div class="check-div">
            </div>
            <div style="width: 950px; background-color:#FFFFFF;height: 440px;margin-bottom: 20px;margin: 50px">
                <form action="publication.php" method="post">
                <input id="title" name="title" class="title" type="text" placeholder="题目" style="margin-top:30px;width: 600px; height:40px;margin-left: 150px">
                <textarea id="title" name="message" class="message" placeholder="问题详情，，，" style="width: 600px;height: 300px;margin-top: 30px;margin-left: 150px"></textarea>
                <input type="submit" value="提交" style="background-color: #00ACEE;margin-bottom: 60px">
                </form>
            </div>
        </div>

<?php
session_start();
include_once "login_require.php";
    error_reporting(E_ERROR | E_PARSE);
    header('content-type:text/html;charset=utf8');
    include ('connect.php');
    if(!empty($_POST))
    {
        $title=$_POST['title'];
        $question=$_POST['message'];
        session_start();
        $user=$_SESSION['user'];
        date_default_timezone_set("Asia/Shanghai");
        $time=date('Y-m-d H:i:s');

        if($title==""||$question=='')
        {
            echo "<script>alert('标题或问题不能为空！');window.location.href='forum.php'</script>";
        }
        else {

            mysqli_query($link, "insert into question (question,user,title,time) values('{$question}','{$user}','{$title}','{$time}')") or die("存入数据库失败" . mysqli_error());
            mysqli_query($link, "insert into forum_ask_question (user,question,time) values('{$user}','{$title}','{$time}')") or die("存入数据库失败" . mysqli_error());
            $url = "forum.php";
            header("location:$url");
        }
    }
    mysqli_close($link);
?>
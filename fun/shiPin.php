<?php
session_start();
include_once "print_list.php";
include_once "connect.php";
?>
<?php
$file_name = $_GET['file_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--<meta charset="UTF-8">-->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Title</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <style type="text/css">
        #packtpub{
            margin-left: 25px;
            margin-top: 30px;
        }
        #packt{
            padding: 20px;
        }
    </style>
</head>
<script language="javascript">
    // alert('fuck');
    window.onbeforeunload=function() {
        var xhr=new XMLHttpRequest();
        alert('fuck');
        xhr.open('get','enter_leave_time.php?old_time=<?php date_default_timezone_set('PRC');
            echo date("Y-m-d H:i:s");?>');
        xhr.send(null);
    }
</script>
<body id="packtpub">
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">
            <p class="panel-title"><?php echo $file_name;?></p>
            <div class="panel-body">
                <div class="embed-responsive embed-responsive-16by9 hidden-xs">
                    <iframe class="embed-responsive-item"
                            src="./upload/video/<?php echo $file_name;?>">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

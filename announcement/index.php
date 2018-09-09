
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
    <link rel="stylesheet" type="text/css" href="../upload/css/style.css">
    <link rel="stylesheet" type="text/css" href="../upload/css/new.css">
    <!--[if IE 6]>
    <script type="text/javascript" src="../lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
</head>

<body>
<header>
    <div class="container">
        <a href="../" class="download-sec right">退出</a>
        <div class="profile-img">
            <a href="../index.php" title="主页">
                <img src="../images/photo.png" alt="img" width="360px" height="330px">
            </a>
        </div>
    </div>
</header>

<section class="blog-single">
    <div class="container">
        <div class="page-container">
            <div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
		</span>
                <span class="r">共有数据：
                    <strong>
                        2
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
                    <tr class='text-c'>
                        <td>t</td>
                        <td>ht</td>
                        <td>nhfg</td>
                        <td><a href='anno.php'>点击查看</a></td>
                    </tr>
                    <tr class='text-c'>
                        <td>hgnfh</td>
                        <td>bbb</td>
                        <td>tnhbgf</td>
                        <td><a href='anno.php'>点击查看</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section><br><br><br><br><br><br>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 ">
                <img src="../images/footer-sign.png" alt="sign">
            </div>
            <div class="col-md-6 col-sm-6">
                <h6 class="right copy-right">(C) 2018. 大数据与网络安全实验室</h6>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

<script src="../js/fontawesome.js"></script>
<script src="../js/jquery.mixitup.min.js"></script>
<script type="text/javascript" src="../js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="../js/jquery.isotope.js"></script>
<script src="../js/jquery.bsPhotoGallery.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="../static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="../static/h-ui.admin/js/H-ui.admin.js"></script>
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="../lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="../lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
    $('.table-sort').dataTable({
        "aaSorting": [[ 1, "desc" ]],//默认第几个排序
        "bStateSave": true,//状态保存
        "aoColumnDefs": [
            //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
            {"orderable":false,"aTargets":[0,3]}// 制定列不参与排序
        ]
    });
</script>
</body>

</html>
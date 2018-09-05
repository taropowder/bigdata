<?php
include_once "login_require.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>个人博客</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="../css/fonts.googleapis.css" rel="stylesheet">
    <script src="../js/new.js"></script>
    <link href="../css/googleapls.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/prettyPhoto.css" />
    <link href="../css/jquery.bsPhotoGallery.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/new.css">
</head>

<body>
    <header>
        <div class="container">
            <a href="creat.php" class="download-sec left" >写博客</a>
            <a href="blogLogout.php" class="download-sec right">退出博客系统</a>
            <div class="profile-img">
                <a href="index.php" title="主页">
                <img src="../images/photo.png" alt="img" width="360px" height="330px">
                </a>
            </div>
        </div>
    </header>

    <div class="banner-sec" >
        <div class="container">
            <div class="menu-bar">
                <ul>
                    <li id="index">
                        <a href="index.php">我的博客 </a>
                    </li>
                    <li id="friend">
                        <a href="dynamic.php">好友动态</a>
                    </li>
                    <li id="focus">
                        <a href="focus.php">我的关注</a>
                    </li>
                    <li id="star">
                        <a href="collection.php">我的收藏</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
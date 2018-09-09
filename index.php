<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>大数据与网络安全实验室</title>
    <!-- load CSS -->
    <link rel="stylesheet" href="css/fonts.css">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="css/bootstrap.min.css">                                  <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="fontawesome/css/fontawesome-all.min.css">                <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>                       <!-- http://kenwheeler.github.io/slick/ -->
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <link rel="stylesheet" href="css/tooplate-style.css">
    <link rel="stylesheet" href="css/new.css">


</head>

<body>
    <div id="tm-bg"></div>
    <div id="tm-wrap">

        <div class="tm-main-content">
            <div class="nav">
                <ul>
                    <li><a href="announcement">公告</a></li>
                    <li><a href="upload/tool.php">工具下载</a></li>
                    <li><a href="journal">期刊会议</a></li>
                    <li><a href="meeting">会议动态</a></li>
                    <li><a href="upload">上传下载</a></li>
                    <li><a href="school/">校内资讯</a></li>
                    <?php
                    session_start();
//                    echo $_SESSION['userid'];
                    if (isset($_SESSION['userid'])){

                        echo "<li><a href=\"login/logout.php\">退出</a></li>";
                    }else{
                        echo "<li><a href=\"login\">登录</a></li>";
                        echo "<li><a href=\"register\">注册</a></li>";
                    }
                    ?>


                </ul>
            </div>
            <div class="container tm-site-header-container">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-md-col-xl-6 mb-md-0 mb-sm-4 mb-4 tm-site-header-col">
                        <div class="tm-site-header"><br>
                            <h1 class="mb-4">Big data and  network security</h1>
                            <img src="img/underline.png" class="img-fluid mb-4">
                            <p></p>
                        </div>                        
                    </div>
                   
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="content">
                            <div class="grid">

                                <div class="grid__item"  id="blog">
                                    <div class="product">
                                        <div class="tm-nav-link">
                                            <i class="fas  fa-pen-square fa-3x tm-nav-icon"></i>
                                            <span class="tm-nav-text">个人博客</span>
                                            <div class="product__bg"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid__item" id="discuss">
                                    <div class="product">
                                        <div class="tm-nav-link">
                                            <i class="fas fa-comments fa-3x tm-nav-icon"></i>
                                            <span class="tm-nav-text" id="forum">技术论坛</span>
                                            <div class="product__bg"></div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="tlinks">Collect from <a href="http://www.cssmoban.com/" >网页模板</a></div>

                                <div class="grid__item" id="fun">
                                    <div class="product">
                                        <div class="tm-nav-link">
                                            <i class="fas fa-coffee fa-3x tm-nav-icon"></i>
                                            <span class="tm-nav-text" id="enter">休闲娱乐</span>
                                            <div class="product__bg"></div>             
                                        </div>
                                    </div>
                                </div>

                                <div class="grid__item" id="research">
                                    <div class="product">
                                        <div class="tm-nav-link">
                                            <i class="fas fa-newspaper fa-3x tm-nav-icon"></i>
                                  <span class="tm-nav-text" id="dynamic">科研动态</span>
                                            <div class="product__bg"></div>             
                                        </div>                                                              
                                        <div class="product__description">
                                            <div class="pt-sm-4 pb-sm-4 pl-sm-5 pr-sm-5 pt-2 pb-2 pl-3 pr-3">
                                                <div class="row mb-3">
                                                    <div class="col-12">
                                                        <h2 class="tm-page-title">Contact Us</h2>        
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-12">
                                                        <p>Lorem ipsum dolor site amet, consectetur adipiscing elit. Aliquam interdum, nisl sed faucibus tempor, massa velit laoreet ipsum, et faucibus sapien magna at enim. Suspendisse a dictum tortor, vel rhoncus libero.</p>
                                                    </div>
                                                </div>

                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>                       
                    </div>
                </div>                
            </div>
            <footer>
                <p class="small tm-copyright-text">Copyright &copy; <span class="tm-current-year">2018</span> 大数据与网络安全实验室
                    <a href="introduce/" target="_blank" title="实验室介绍">了解我们</a>
            </footer>
        </div> <!-- .tm-main-content -->  
    </div>
    <!-- load JS -->
    <script src="js/jquery-3.2.1.slim.min.js"></script>         <!-- https://jquery.com/ -->
<script>
    window.onload=function () {
        document.getElementById("blog").onclick=function () { window.location.href="blog/" };
        document.getElementById("research").onclick=function () { window.location.href="research/" };
        document.getElementById("fun").onclick=function () { window.location.href="fun/" };
        document.getElementById("discuss").onclick=function () { window.location.href="discuss/" }
    }

</script>
</body>
</html>
<?php
include_once "requre.php";
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
	<link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>系统管理员</title>
</head>
<body>
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="../index.php" target="_blank">进入主页</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">进入主页</a>
			<!--<span class="logo navbar-slogan f-l mr-10 hidden-xs">v3.1</span>-->
			<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
		<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
			<ul class="cl">
				<li>系统管理员</li>
				<li class="dropDown dropDown_hover">
					<a href="#" class="dropDown_A"><?php echo $_SESSION['adminname'];?> <i class="Hui-iconfont">&#xe6d5;</i></a>
					<ul class="dropDown-menu menu radius box-shadow">
						<!--<li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>-->
						<!--<li><a href="#">切换账户</a></li>-->
						<li><a href="logout.php">退出</a></li>
				</ul>
			</li>
			</ul>
		</nav>
	</div>
</div>
</header>
<aside class="Hui-aside">
	<div class="menu_dropdown bk_2">
		<dl id="menu-article">
			<dt> <span class="icon-sec"><i class="fas fa-object-group"></i></span> 校内资讯<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li>
						<a data-href="school.php" data-title="资讯管理" href="javascript:void(0)">资讯管理</a></li>
			</ul>
		</dd>
	</dl>
        <dl id="menu-article">
            <dt> <span class="icon-sec"><i class="fas fa-object-group"></i></span>公告管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li>
                        <a data-href="announcement.php" data-title="公告管理" href="javascript:void(0)">公告管理</a></li>
                </ul>
            </dd>
        </dl>
		<dl id="menu-picture">
			<dt><span class="icon-sec"><i class="fas fa-newspaper"></i></span> 动态管理</a><i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="scientific.php" data-title="科研动态" href="javascript:void(0)">科研动态</a></li>
					<li><a data-href="journal.php" data-title="期刊会议" href="javascript:void(0)">期刊会议</a></li>
                    <li><a data-href="meeting.php" data-title="会议动态" href="javascript:void(0)">会议动态</a></li>
                </ul>
		</dd>
	</dl>
		<dl id="menu-product">
			<dt><span class="icon-sec"><i class="fas fa-coffee "></i></span> 休闲娱乐     <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="entertainment.php" data-title="信息管理" href="javascript:void(0)">信息管理</a></li>
			</ul>
		</dd>
	</dl>
		<dl id="menu-comments">
			<dt><span class="icon-sec"><i class="fas fa-upload"></i> 上传/下载<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="upload.php" data-title="信息管理" href="javascript:;">信息管理</a></li>
			</ul>
		</dd>
	</dl>
		<dl id="menu-member">
			<dt><span class="icon-sec"><i class="fas fa-tablet"></i></span> 实验室介绍<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="result.php" data-title="最新成果" href="javascript:;">最新成果</a></li>
					<li><a data-href="introduce-add.php" data-title="实验室介绍头图" href="javascript:;">实验室介绍头图</a></li>
					<li><a data-href="introduce.php" data-title="实验室介绍" href="javascript:;">更新介绍</a></li>
			</ul>
		</dd>
	</dl>
		<dl id="menu-admin">
			<dt><i class="fas fa-comments"></i> 技术论坛<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="forum.php" data-title="问题管理" href="javascript:void(0)">问题管理</a></li>
					<li><a data-href="answer.php" data-title="回答管理" href="javascript:void(0)">回答管理</a></li>
			</ul>
		</dd>
	</dl>
		<dl id="menu-system">
			<dt> <i class="fas  fa-pen-square"></i> 个人博客<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="blog.php" data-title="博客管理" href="javascript:void(0)">博客管理</a></li>

			</ul>
		</dd>
	</dl>
</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active">
					<span title="首页" data-href="welcome.html">首页</span>
					<em></em></li>
		</ul>
	</div>
</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe scrolling="yes" frameborder="0" src="welcome.html"></iframe>
	</div>
</div>
</section>

<div class="contextMenu" id="Huiadminmenu">
	<ul>
		<li id="closethis">关闭当前 </li>
		<li id="closeall">关闭全部 </li>
</ul>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
<script src="../js/fontawesome.js"></script>
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
<script type="text/javascript">
$(function(){
	/*$("#min_title_list li").contextMenu('Huiadminmenu', {
		bindings: {
			'closethis': function(t) {
				console.log(t);
				if(t.find("i")){
					t.find("i").trigger("click");
				}		
			},
			'closeall': function(t) {
				alert('Trigger was '+t.id+'\nAction was Email');
			},
		}
	});*/
});
/*个人信息*/
function myselfinfo(){
	layer.open({
		type: 1,
		area: ['300px','200px'],
		fix: false, //不固定
		maxmin: true,
		shade:0.4,
		title: '查看信息',
		content: '<div>管理员信息</div>'
	});
}

/*资讯-添加*/
function article_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*图片-添加*/
function picture_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*产品-添加*/
function product_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}


</script> 


</body>
</html>
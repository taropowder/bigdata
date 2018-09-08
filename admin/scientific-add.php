<?php
/*
include_once "sqlhelper.php";
if(isset($_GET['articletitle'])){
    $mysqli = new sqlhelper();
    $sql  = "UPDATE `research` SET name`=[value-2],`introduction`=[value-3],`time`=[value-4],`content`=[value-5],`way`=[value-6] WHERE 1";
    $res = $mysqli->execute_dml($sql);
    if ($res == 1){
        echo "1";
    }
}
*/
?>
<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="../lib/html5shiv.js"></script>
    <script type="text/javascript" src="../lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="../static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="../static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="../lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="../static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="../static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="../lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <!--/meta 作为公共模版分离出去-->

    <title>新增动态</title>
</head>
<body>
    <form method="post" class="form form-horizontal"  action="scientific-add1.php">
        <article class="page-container">
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
			 <span class="select-box" style="width:150px">
			<select class="select" name="type" size="1">
				<option value="人类行为预测"  selected>人类行为预测</option>
				<option value="人工智能">人工智能</option>
				<option value="网络安全">网络安全</option>
			</select>
			</span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>动态标题：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text"  placeholder=""  name="articletitle">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">动态简介：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder=""  name="articletitle2">
            </div>
        </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">动态时间：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input name="time" type="text" class="demo-input input-text" placeholder="请选择日期" id="test1">
                </div>
            </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">动态内容：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="abstract" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" ></textarea>
                <p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
            </div>
        </div>

        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <button class="btn btn-primary radius"  type="submit"><i class="Hui-iconfont">&#xe632;</i> 发布</button>
                <button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
            </div>
        </div>
    </form>
</article>

    <!--_footer 作为公共模版分离出去-->
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../lib/layer/2.4/layer.js"></script>
    <script type="text/javascript" src="../static/h-ui/js/H-ui.min.js"></script>
    <script type="text/javascript" src="../static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer /作为公共模版分离出去-->

    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="../lib/My97DatePicker/4.8/WdatePicker.js"></script>
    <script type="text/javascript" src="../lib/jquery.validation/1.14.0/jquery.validate.js"></script>
    <script type="text/javascript" src="../lib/jquery.validation/1.14.0/validate-methods.js"></script>
    <script type="text/javascript" src="../lib/jquery.validation/1.14.0/messages_zh.js"></script>
    <script type="text/javascript" src="../lib/webuploader/0.1.5/webuploader.min.js"></script>
    <script type="text/javascript" src="../lib/ueditor/1.4.3/ueditor.config.js"></script>
    <script type="text/javascript" src="../lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
    <script type="text/javascript" src="../lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
    <script src="../layDate-v5.0.9/laydate/laydate.js"></script>
    <script type="text/javascript">
    lay('#version').html('-v'+ laydate.v);

    //执行一个laydate实例
    laydate.render({
        elem: '#test1' //指定元素
    });
    $(function(){

        //表单验证
        $("#form-article-add").validate({
            rules:{
                articletitle:{
                    required:true,
                },
                articletitle2:{
                    required:true,
                },
                abstract:{
                    required:true,
                }
            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                //$(form).ajaxSubmit();
                var index = parent.layer.getFrameIndex(window.name);
                //parent.$('.btn-refresh').click();
                parent.layer.close(index);
            }
        });


        // 避免重复创建
    });

</script>
</body>
</html>
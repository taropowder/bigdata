
<?php
include 'base.php';
session_start();
include_once "login_require.php";
?>
    <section class="blod-inner-sec">
        <div class="getin-sec" id="contact-sec">
            <div class="container">
                <div class="row"  >
                    <div class="col-md-12 col-sm-24"  >
                        <div class="form">
                            <h3>上传</h3>
                            <form role="form" action="upload/file_upload.php" method="post" enctype="multipart/form-data">
                                <br>
                                <div class="form-group" id="up">
                                    <label class="btn left" for="file" id="forFile">选择文件</label>
                                            <input type="file" name="myfile" id="file" style="position:absolute;clip:rect(2px 200px 18px 75px);"></div>
                                    <!--<input type="file" id="file" class="left">-->
                                <br>

                                
								<div class="form-group">
                                    <p>请选择文件类型: </p><br>
                                    <select name="type"  id="myselect">
                                        <option value="pic">图片</option>
                                        <option value="doc">文档</option>
                                        <option value="file">文件</option>
                                        <option value="tool">工具</option>
                                    </select>
                                </div>
								
                                <br>
                                <input class="btn right" type="submit" name="sumbit" value="上传" id="sub">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
include 'footer.php';
?>
<script type="text/javascript">
    var $select = $("#select");
    var $myselect = $("#myselect");

    /**
     * 初始化插件
     */
    $myselect.goSelectInput({
        height: 30,
        width: 250
    });

</script>

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
<script>
    $(document).ready(function() {
        $('ul.first').bsPhotoGallery({
            "classes": "col-md-3 col-sm-4 col-2 ",
            "hasModal": true,
            // "fullHeight" : false
        });
        $('#creat').click(function () {
            var xhr=new XMLHttpRequest();
            xhr.open('get','001.php?');
            xhr.onload=function () {
                document.getElementById("father").innerHTML=xhr.responseText;
            };
            xhr.send(null);
            $('section').css('display','none');
            $('footer').css('display','none');
            return false;
        });
        $("a.edit").click(function () {
            var xhr=new XMLHttpRequest();
            var tit=this.dataset.title;
            var con=this.dataset.content;
            xhr.open('get','002.php?bTitle='+tit +'& bCon='+con);
            xhr.onload=function () {
                document.getElementById("father").innerHTML=xhr.responseText;
            }
            xhr.send(null);
            $('#contact-sec1').css('display','block');
            $('section').css('display','none');
            $('footer').css('display','none');
            return false;
        });
    });

</script>
</body>

</html>
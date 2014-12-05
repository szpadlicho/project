<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>interface</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="m" />
        <meta name="dcterms.created" content="mon 9 dec 2013 09:00:00" />
        <meta name="dcterms.modified" content="wed 19 nov 2014 19:29:17" />
        
        <link title="deafult" type="text/css" rel="stylesheet" href="css/reset.css" />
        <link title="deafult" type="text/css" rel="stylesheet" href="css/style.css" />
        <link title="deafult" type="text/css" rel="stylesheet" href="css/menu.css" />
        <link title="deafult" type="text/css" rel="stylesheet" href="css/option.css" />
        <link title="deafult" type="text/css" rel="stylesheet" href="css/tools.css" />
        <link title="deafult" type="text/css" rel="stylesheet" href="css/draggable.css" />
        <link title="deafult" type="text/css" rel="stylesheet" href="css/resizable.css" />
        <link title="deafult" type="text/css" rel="stylesheet" href="css/colpick.css" />
        <link title="deafult" type="text/css" rel="stylesheet" href="css/slider.css" />
        <link title="deafult" type="text/css" rel="stylesheet" href="css/fonts.css" />
        <link title="deafult" type="text/css" rel="stylesheet" href="css/font_css.php" />
        <!--
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        -->
        
        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="js/scrypt.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min-1.11.2.js"></script>
        <!--<script type="text/javascript" src="js/jquery.cookie.js"></script>-->
        <script type="text/javascript" src="js/show.js"></script>
        <script type="text/javascript" src="js/draggable.js"></script>
        <script type="text/javascript" src="js/colpick.js"></script>
        <script type="text/javascript" src="js/interface.js"></script>
        <script type="text/javascript" src="js/fonts.js"></script>

        <script type="text/javascript">
        var both = function () {
            // debugger
            var htt = $(window).height();
            var wtt = ($(window).width() - 18);
            $('#count').css({'color':'white'});
            $('#count').text(wtt+'/'+htt);
            // setup
            $( '#relative-holder' ).css({'width':wtt+'px','height':htt+'px'});
            $( '#show' ).css({'width':wtt+'px','height':htt+'px'});
        };
        $(document).ready(both);
        $(document).load(both);
        $(window).resize(both);
        </script>
    </head>
    <body>
        <section id="relative-holder">
            <header id="top-menu-ph">
                <nav id="top-menu">
                    <ul>
                        <li>File
                            <ul>
                                <li id="new-file">New file</li>
                                <li id="load-file">Upload file</li>
                                <li id="download-file"><a href="data/picture/<?php echo $_COOKIE['PHPSESSID']; ?>-preview.jpg" download="mynewimage.jpg">Download file</a></li>
                            </ul>
                        </li>
                        <li>Windows
                            <ul>
                                <li id="button-04">Create</li>
                                <li id="button-05">Letters</li>
                                <li id="button-06">Color</li>
                                <li id="button-07">Rotate & Size</li>
                                <li id="button-08">Position</li>
                                <li id="button-09">Size</li>
                                <li id="button-10">Fonts</li>
                                <li id="button-11">Debugger</li>
                                <!--
                                <li id="button-12">twelve</li>
                                <li id="button-13">thirteen</li>
                                -->
                            </ul>
                        </li>
                        <li>Options
                        <ul>
                            <li id="resize">Resize on/off</li>
                            <li id="preview">Preview on/off</li>
                        </ul>
                        <li id="add-font">Add font</li>
                        <li>About</li>
                    </ul>
                </nav>
                <span id="info" style="position:absolute; top:0; left:40%;"></span>
            </header>
            <article>
                <div id="left-option-ph">
                    <!-- Add & Reset-->
                    <div id="tool-04" class="tools">
                        <input id="btnAdd" class="btn" type="button" value="Add" /><br />
                        <input id="btnReset" class="btn" type="button" value="Reset" />
                    </div>
                    <!-- Text -->
                    <div id="tool-05" class="tools">
                        <textarea id="txt" class="txt" type="text" value="Some text" />Some text</textarea>
                    </div>
                    <!-- Color picker -->
                    <div id="tool-06" class="tools"></div>
                    <!-- Font size & Opacity & Rotation -->
                    <div id="tool-07" class="tools">
                        <!-- Font size -->
                        <div class="tool-sub-ph-v">
                            <div class="tool-sub-label-v">
                                <p id="label-size" class="label-slider-v">Size:</p>
                            </div>
                            <div class="tool-sub-slider-v">
                                <div id="slider-size" class="slider-slider-v"></div>
                            </div>
                            <div class="tool-sub-text-v">
                                <input id="text-size" class="text-slider-v" type="text" />
                            </div>
                        </div>
                        <!-- Opacity -->
                        <div class="tool-sub-ph-v">
                            <div class="tool-sub-label-v">
                                <p id="label-opacity" class="label-slider-v">Opacity:</p>
                            </div>
                            <div class="tool-sub-slider-v">
                                <div id="slider-opacity" class="slider-slider-v"></div>
                            </div>
                            <div class="tool-sub-text-v">
                                <input id="text-opacity" class="text-slider-v" type="text" />
                            </div>
                        </div>
                        <!-- Rotation -->
                        <div class="tool-sub-ph-v">
                            <div class="tool-sub-label-v">
                                <p id="label-rotation" class="label-slider-v">Rotate:</p>
                            </div>
                            <div class="tool-sub-slider-v">
                                <div id="slider-rotation" class="slider-slider-v"></div>
                            </div>
                            <div class="tool-sub-text-v">
                                <input id="text-rotation" class="text-slider-v" type="text" />
                            </div>
                        </div>
                    </div>
                    <!--<div id="tool-08" class="tools">e</div>-->
                </div>
                <div id="right-option-ph">
                    <!-- Position Top & Left -->
                    <div id="tool-08" class="tools">
                        <div id="" class="slider-float all">
                            <div id="slider-top" class="slider-top"></div>
                        </div>
                        <div id="" class="text-top all">
                            <p>Top:</p>
                            <input id="text-top-pixel" class="text-position" type="text" />&nbsp;px&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input id="text-top-procent" class="text-position" type="text" />&nbsp;%
                        </div>
                        <div id="" class="text-bottom all">
                            <p>Left:</p>
                            <input id="text-left-pixel" class="text-position" type="text" />&nbsp;px&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input id="text-left-procent" class="text-position" type="text" />&nbsp;%
                        </div>
                        <div id="" class="slider-bottom all">
                            <div id="slider-left" class="slider-left"></div>
                        </div>
                    </div>
                    <!-- Size Height & Width -->
                    <div id="tool-09" class="tools">
                        <div id="" class="slider-float all">
                            <div id="slider-height" class="slider-top"></div>
                        </div>
                        <div id="" class="text-top all">
                            <p>Height:</p>
                            <input id="text-height-pixel" class="text-position" type="text" />&nbsp;px&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input id="text-height-procent" class="text-position" type="text" />&nbsp;%
                        </div>
                        <div id="" class="text-bottom all">
                            <p>Width:</p>
                            <input id="text-width-pixel" class="text-position" type="text" />&nbsp;px&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input id="text-width-procent" class="text-position" type="text" />&nbsp;%
                        </div>
                        <div id="" class="slider-bottom all">
                            <div id="slider-width" class="slider-left"></div>
                        </div>
                    </div>
                    <!-- Font Family -->
                    <script type="text/javascript">
                        $(function() {
                            $('#form-fonts').change(function(e) {
                                e.preventDefault();
                                data = new FormData($('#form-fonts')[0]);
                                console.log('Submitting');
                                $.ajax({
                                    type: 'POST',
                                    url: 'php/upload_fonts.php',
                                    //url: 'php/show.php',
                                    data:  data,
                                    cache: false,
                                    success: function (data) {
                                        // do something
                                        //alert('Success');
                                        //alert(data);
                                        //$("#show").html(data);
                                        $("#info").html(data);
                                        location.reload();
                                    },
                                    contentType: false,
                                    processData: false
                                }).done(function(data) {
                                    console.log(data);
                                }).fail(function(jqXHR,status, errorThrown) {
                                    console.log(errorThrown);
                                    console.log(jqXHR.responseText);
                                    console.log(jqXHR.status);
                                    //$("#info").text('font upload fail');
                                });
                            });
                            $( '#add-font' ).click(function(){
                                $( '#files' ).click();
                            });
                        });
                    </script>
                    <div id="tool-10" class="tools">
                        <div id="fonts" >
                            <!--
                            <p>Fonts:</p>
                            <select id="fontChange" class="fontChange" >
                                <option value="Arial">Arial</option>
                                <option value="Verdana">Verdana</option>
                                <option value="Impact">Impact</option>
                                <option value="Comic Sans MS">Comic Sans MS</option>
                                <option value="">Default</option>
                            </select>
                            -->
                            <p>My fonts:</p>
                            <select id="fontChangeMy" class="fontChange">
                                <?php include_once('php/show_fonts.php'); ?>
                            </select><br />
                            <input id="font-size-procent" class="text-position" type="text" />
                        </div>
                        <form id="form-fonts" method="POST" enctype="multipart/form-data">
                            <input id="files" name="files" type="file" />
                        </form>
                        <form id="form-pictures" method="POST" enctype="multipart/form-data">
                            <input id="pictures" name="pictures" type="file" />
                        </form>
                    </div>
                    <!-- Unknown -->
                    <script type="text/javascript">
                    var funProcent = function(val, value){
                        var prcent = ((val / value) * 100).toFixed(0);
                        return prcent;
                    };
                    $(function() {
                        $(document).on('mousedown', '.drag', function () { //work on dynamic elements.mousedown()
                            var val2 = $( '.curent' ).children('.toText').css('font-size');
                            var val2 = parseInt(val2);
                            var value2 = $( '#image' ).width();
                            var img = document.getElementById("image");
                            //var value2 = img.naturalHeight;
                            var er = funProcent(val2, value2);
                            $( '#font-size-procent' ).val(er+'%');
                            //console.log(val2);
                            //console.log(value2);
                            //console.log(er+'%');
                        });
                    });
                    </script>
                    <div id="tool-11" class="tools">
                        <!--Color: <input id="fontColor" class="" type="text" /><br />-->
                    </div>
                    <!-- END -->
                </div>
                <!-- Image place -->
                <script type="text/javascript">
                $(document).ready(function() {
                    $("img").load(function() {
                        //alert($(this).height());
                        //alert($(this).width());
                    });
                    //var img = document.getElementById("image");
                    //alert("height:" + img.height + ", width: " + img.width);
                    //alert("natural height:" + img.naturalHeight + ", natural width: " + img.naturalWidth);
                    //alert("jquery height:" + $("#image").height() + ",jquery width: "+ $("#image").width());
                });
                </script>
                <div id="middle-ph">
                    <div id="middle">
                        <!--<img id="image" src="../repo/data/src1.jpg" />-->
                        <!--<img id="image" src="../repo/data/Bikini.jpg" />-->
                        <script type="text/javascript">
                            $(function() {
                                $('#form-pictures').change(function(e) {
                                    e.preventDefault();
                                    data = new FormData($('#form-pictures')[0]);
                                    console.log('Submitting');
                                    $.ajax({
                                        type: 'POST',
                                        url: 'php/upload_files.php',
                                        data:  data,
                                        cache: false,
                                        success: function (data) {
                                            $("#info").html(data);
                                            location.reload();
                                        },
                                        contentType: false,
                                        processData: false
                                    }).done(function(data) {
                                        console.log(data);
                                    }).fail(function(jqXHR,status, errorThrown) {
                                        console.log(errorThrown);
                                        console.log(jqXHR.responseText);
                                        console.log(jqXHR.status);
                                        $("#info").text('Picture upload fail');
                                    });
                                });
                                $( '#load-file' ).click(function(){
                                    $( '#pictures' ).click();
                                });
                            });
                        </script>
                        <img id="image" src="data/picture/<?php echo session_id();?>.jpg" />
                    </div>
                    <script type="text/javascript">
                        // $(function() {
                            // dataString = {w:'val', h:'val2'}; // array
                            // dataObject = {w:'val', h:'val2'}; // array
                            // //dataString = ['val','val2']; // array
                            // //var ary = ['fg','dfg','dddd'];
                            // //var jsonString = JSON.stringify(ary);
                            // $.ajax({
                                // type: 'POST',
                                // url: 'php/show.php',
                                // //data: {data : jsonString}, 
                                // //data: {data : dataString }, 
                                // data: {data : dataObject }, 
                                // cache: false,
                                // dataType: 'text',
                                // success: function(data){
                                    // //alert("OK");
                                    // $('#show').html(data);
                                // }
                            // });
                            // // $.ajax({
                                // // url : 'php/show.php',
                                // // dataType: "text",
                                // // success : function (data) {
                                    // // $('#show').html(data);
                                // // }
                            // // });
                        // });
                        $(function() {
                            /**
                            * Array with all parameters to create image in GD
                            **/
                            var passAndShow = function(){
                                var arry = [];
                                $( '.drag' ).each(function(){
                                    var getId = $( this ).attr('id');
                                    var top = $( this ).css('top');
                                    var left = $( this ).css('left');
                                    var size = $( this ).children('.toText').css('font-size');
                                    //var rotate = $( this ).children('.toText').css('font-family');
                                    var rotate = getRotationDegrees($(this));
                                    var color = $( this ).children('.toText').css('color');
                                    var opacity = $( this ).children('.toText').css('opacity');
                                    var value = $( this ).children('.toText').text();
                                    var family = $( this ).children('.toText').css('font-family');
                                    //var  = $( this ).css('');
                                    var workH = $( '#image' ).height();
                                    var workW = $( '#image' ).width();
                                    arry.push({top:top, left:left, size:size, rotate:rotate, color:color, opacity:opacity, value:value, family:family, workH:workH, workW:workW});
                                });
                                dataObject = {arry};
                                $.ajax({
                                    type: 'POST',
                                    url: 'php/show.php',
                                    data: {data : dataObject }, 
                                    cache: false,
                                    dataType: 'text',
                                    success: function(data){
                                        $('#show').html(data);
                                    }
                                });
                            };
                            passAndShow();
                            $(document).on( 'mousedown', 'body', function(){
                                //alert(imgsrc);
                                //var imgsrc = $( '#preview-img' ).attr( 'src' );
                                //$( '#preview-img' ).remove();
                                
                            });
                            $(document).on( 'mouseup', 'body', function(){
                                passAndShow();
                                $( '#preview-img' ).attr( 'src', $( '#preview-img' ).attr( 'src' )+"?timestamp=" + new Date().getTime());
                                //$( '#show' ).html( '<img id="#preview-img" style="width:'+$( '#image' ).width()+';" src="data/picture/<?php echo $_COOKIE['PHPSESSID']; ?>-preview.jpg?asd='+ new Date().getTime()+'" />');
                                //alert(imgsrc);
                                //console.log( $("#preview-img").attr("src") );
                                //console.log( 'mousedown' );
                                //location.reload();
                                //$("#preview-img").remove();
                            });
                            /**
                            * function do display all localStorage data
                            **/
                            function loadMenu() {
                                if (!localStorage.length < 1) {
                                    for (var i = 0; i < localStorage.length; i++) {
                                        var item = localStorage.getItem(localStorage.key(i));
                                        //alert(item);
                                        //$('#show-local').append(localStorage.key(i));
                                        //$('#show-local').append(item);
                                        //$('#show-local').append('<br />');
                                    };
                                } else {
                                    alert('no item');
                                };
                            };
                            loadMenu();
                        }); 
                    </script>
                </div>
                <!--<div id="show2"></div>-->
                <div id="show"></div>
            </article>
        </section>
        <footer>
            <div id="count" style="visibility:hidden;"></div>
        </footer>
        <?php //var_dump($_FILES); ?>
        <?php //var_dump($_POST); ?>
        <?php //var_dump($_COOKIE); ?>
        <?php?>
    </body>
</html>
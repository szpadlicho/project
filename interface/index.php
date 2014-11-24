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
        
        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="js/scrypt.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min-1.11.2.js"></script>
        <script type="text/javascript" src="js/jquery.cookie.js"></script>
        <script type="text/javascript" src="js/showContainer.js"></script>
        <script type="text/javascript" src="js/draggable.js"></script>
        <script type="text/javascript" src="js/colpick.js"></script>

        <script type="text/javascript">
        var both = function () {
            // debugger
            var htt = $(window).height();
            var wtt = $(window).width();
            $('#count').css({'color':'white'});
            $('#count').text(wtt+'/'+htt);
            // setup
            $( '#relative-holder' ).css({'width':wtt+'px','height':htt+'px'});
        };
        $(document).ready(both);
        $(document).load(both);
        $(window).resize(both);
        </script>
        <script type="text/javascript">
        /*
        $(function() {
            $( "#set div" ).draggable({ 
                stack: "#set div",
                stop: function(event, ui) {
                    var pos_x = ui.offset.left;
                    var pos_y = ui.offset.top;
                    var need = ui.helper.data("need");

                    //Do the ajax call to the server
                    $.ajax({
                        type: "POST",
                        url: "your_php_script.php",
                        data: { x: pos_x, y: pos_y, need_id: need}
                    }).done(function( msg ) {
                        alert( "Data Saved: " + msg );
                    }); 
                }
            });
        });
        */
        </script>
    </head>
    <body>
        <section id="relative-holder">
            <header id="top-menu-ph">
                <nav id="top-menu">
                    <ul>
                        <li>File
                            <ul>
                                <li id="button-01">Load file</li>
                                <li id="button-02">Save file</li>
                                <li id="button-03">Download</li>
                            </ul>
                        </li>
                        <li>Windows
                            <ul>
                                <li id="button-04">four</li>
                                <li id="button-05">five</li>
                                <li id="button-06">six</li>
                                <li id="button-07">seven</li>
                                <li id="button-08">eight</li>
                                <li id="button-09">nine</li>
                                <li id="button-10">ten</li>
                                <li id="button-11">eleven</li>
                                <li id="button-12">twelve</li>
                                <li id="button-13">thirteen</li>
                            </ul>
                        </li>
                        <li>Edycja
                            <ul>
                                
                            </ul>
                        </li>
                        <li>Zapisz</li>
                        <li>Pobierz</li>
                    </ul>
                </nav>
            </header>
            <article>
                <div id="left-option-ph">
                    <div id="tool-04" class="tools">
                        <input id="btnAdd" class="btn" type="button" value="Add" /><br />
                        <input id="btnReset" class="btn" type="button" value="Reset" />
                    </div>
                    <div id="tool-05" class="tools">
                        <textarea id="txt" class="btn" type="text" value="Some text" />Some text</textarea>
                    </div>
                    <script type="text/javascript">
                    $(document).ready(function(){
                        $('#tool-06').colpick({
                            flat:true,
                            //layout:'rgb',
                            layout:'rgbhex',
                            colorScheme:'dark',
                            submit:0
                        });
                    });
                    </script>
                    <div id="tool-06" class="tools"></div>
                    <div id="tool-07" class="tools">
                        Size: <input id="fontSize" class="" type="text" /><br />
                        Color: <input id="fontColor" class="" type="text" /><br />
                        Opacity: <input id="fontOpacity" class="" type="text" /><br />
                        Rotate: <input id="fontRotate" class="" type="text" /><br />
                    </div>
                    <div id="tool-08" class="tools">e</div>
                </div>
                <div id="right-option-ph">
                    <div id="tool-09" class="tools">f</div>
                    <div id="tool-10" class="tools">g</div>
                    <div id="tool-11" class="tools">h</div>
                    <div id="tool-12" class="tools">i</div>
                    <div id="tool-13" class="tools">j</div>
                </div>
                <script type="text/javascript">
                $(document).ready(function(){
                    /**
                        * Change, save and load text
                        * Text
                    **/
                    //var myChildren = $('.curent').children(':nth-child(4)');
                    $(document).on('keyup', '#txt', function (event) {
                        if (event.keyCode == 13) { // change enter to <br>
                            $('.curent').children(':nth-child(4)').append('<br />');
                            return false;
                        }
                        $('.curent').children(':nth-child(4)').text($(this).val());
                        var saveId = $('.curent').attr('id');
                        $.cookie(saveId,$(this).val());
                    });
                    $(document).on('mousedown', '.drag', function () {
                        var value = $(this).children(':nth-child(4)').text();
                        $('#txt').val(value);
                    });
                    $( '.drag' ).each(function(){//'p[id^="draggable-"]'
                        var getId = $( this ).attr('id');
                        var values = $.cookie(getId);
                        $('#'+getId).children(':nth-child(4)').text(values);
                    });
                });
                $(document).ready(function(){
                    /**
                        * CSS change, save and load
                        * Font-size
                    **/
                    $(document).on('keyup', '#fontSize', function (event) {
                        var size = $('#fontSize').val();
                        $('.curent').children(':nth-child(4)').css('font-size',size+'px');
                        var saveId = $('.curent').attr('id');
                        $.cookie(saveId+'font',$('.curent').children(':nth-child(4)').css('font-size'));
                        //alert($.cookie(saveId+'font'));
                    });
                    $(document).on('mousedown', '.drag', function () {
                        var size = $(this).children(':nth-child(4)').css('font-size');
                        var size = parseInt(size);
                        $('#fontSize').val(size);
                    });
                    $( '.drag' ).each(function(){//'p[id^="draggable-"]'
                        var getId = $( this ).attr('id');
                        var values = $.cookie(getId+'font');
                        $('#'+getId).children(':nth-child(4)').css('font-size',values);
                        //alert(getId+'|'+$.cookie(getId+'font'));
                    });
                });
                $(document).ready(function(){
                    /**
                        * CSS change, save and load
                        * Color
                    **/
                    $(document).on('keyup', '#fontColor', function (event) {
                        var size = $('#fontColor').val();
                        $('.curent').children(':nth-child(4)').css('color',size);
                        var saveId = $('.curent').attr('id');
                        $.cookie(saveId+'color',$('.curent').children(':nth-child(4)').css('color'));
                        //alert($.cookie(saveId+'font'));
                    });
                    $(document).on('mousedown', '.drag', function () {
                        var size = $(this).children(':nth-child(4)').css('color');
                        //var size = parseInt(size);
                        $('#fontColor').val(size);
                    });
                    $( '.drag' ).each(function(){//'p[id^="draggable-"]'
                        var getId = $( this ).attr('id');
                        var values = $.cookie(getId+'color');
                        $('#'+getId).children(':nth-child(4)').css('color',values);
                        //alert(getId+'|'+$.cookie(getId+'font'));
                    });
                });
                $(document).ready(function(){
                    /**
                        * CSS change, save and load
                        * Opacity
                    **/
                    $(document).on('keyup', '#fontOpacity', function (event) {
                        var size = $('#fontOpacity').val();
                        $('.curent').children(':nth-child(4)').css('opacity',size);
                        var saveId = $('.curent').attr('id');
                        $.cookie(saveId+'Opacity',$('.curent').children(':nth-child(4)').css('opacity'));
                        //alert($.cookie(saveId+'font'));
                    });
                    $(document).on('mousedown', '.drag', function () {
                        var size = $(this).children(':nth-child(4)').css('opacity');
                        //var size = parseInt(size);
                        $('#fontOpacity').val(size);
                    });
                    $( '.drag' ).each(function(){//'p[id^="draggable-"]'
                        var getId = $( this ).attr('id');
                        var values = $.cookie(getId+'Opacity');
                        $('#'+getId).children(':nth-child(4)').css('opacity',values);
                        //alert(getId+'|'+$.cookie(getId+'font'));
                    });
                });
                $(document).ready(function(){
                    /**
                        * CSS change, save and load
                        * Rotate transform: rotate(30deg);
                    **/
                    function getRotationDegrees(obj) {
                        var matrix = obj.css("-webkit-transform") ||
                        obj.css("-moz-transform")    ||
                        obj.css("-ms-transform")     ||
                        obj.css("-o-transform")      ||
                        obj.css("transform");
                        if(matrix !== 'none') {
                            var values = matrix.split('(')[1].split(')')[0].split(',');
                            var a = values[0];
                            var b = values[1];
                            var angle = Math.round(Math.atan2(b, a) * (180/Math.PI));
                        } else { var angle = 0; }

                        if(angle < 0) angle +=360;
                        return angle;
                    }
                    $(document).on('keyup', '#fontRotate', function (event) {
                        var size = $('#fontRotate').val();
                        $('.curent').css('transform','rotate('+size+'deg)');
                        var saveId = $('.curent').attr('id');
                        $.cookie(saveId+'Transform',$('.curent').css('transform'));
                        //alert($.cookie(saveId+'Transform'));
                    });
                    $(document).on('mousedown', '.drag', function () {
                        var size = $(this).css('transform');
                        //var size = parseInt(size);
                        var size = getRotationDegrees($(this));
                        $('#fontRotate').val(size);
                    });
                    $( '.drag' ).each(function(){//'p[id^="draggable-"]'
                        var getId = $( this ).attr('id');
                        var values = $.cookie(getId+'Transform');
                        $('#'+getId).css('transform',values);
                        //alert(getId+'|'+$.cookie(getId+'Transform'));
                    });
                });
                </script>
                <div id="middle-ph">
                    <div id="middle">
                        <!--<img id="picture" src="../repo/data/src1.jpg" />-->
                        <img id="picture" src="../repo/data/Bikini.jpg" />
                        <!--<p id="draggable-0" class="drag">
                            Napis<br />
                            <span id="posY0"></span><br />
                            <span id="posX0"></span><br />
                        </p>-->
                    </div>
                </div>
            </article>
        </section>
        <footer>
            <div id="count"></div>
        </footer>
    </body>
</html>
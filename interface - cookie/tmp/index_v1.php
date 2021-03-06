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
        <!--
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        -->
        
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
                                <li id="button-02">Save</li>
                                <li id="button-03">Download file</li>
                            </ul>
                        </li>
                        <li>Windows
                            <ul>
                                <li id="button-04">Create</li>
                                <li id="button-05">Letters</li>
                                <li id="button-06">Color</li>
                                <li id="button-07">Rotate & Size</li>
                                <li id="button-08">eight</li>
                                <li id="button-09">nine</li>
                                <li id="button-10">ten</li>
                                <li id="button-11">eleven</li>
                                <!--
                                <li id="button-12">twelve</li>
                                <li id="button-13">thirteen</li>
                                -->
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
                        /**
                        * CSS change, save and load
                        * Color
                        **/
                        $('#tool-06').colpick({
                            flat:true,
                            layout:'rgbhex',
                            //colorScheme:'dark',
                            submit:0,
                            color: '000000',
                            onChange:function(hsb,hex,rgb,el,bySetColor) {
                                //$('#tool-08').css('background-color','#'+hex);
                                //$('#tool-09').text(rgb.r);//.rgb.g.rgb.b
                                //$('#tool-10').text(rgb.g);//.rgb.g.rgb.b
                                //$('#tool-11').text(rgb.b);//.rgb.g.rgb.b
                                $('.curent').children(':nth-child(4)').css('color','#'+hex);
                                var saveId = $('.curent').attr('id');
                                $.cookie(saveId+'color',$('.curent').children(':nth-child(4)').css('color'));
                            }
                        });
                        $(document).on('mousedown', '.drag', function () {
                            var colorRGB = $(this).children(':nth-child(4)').css('color');
                            $('#fontColor').val(colorRGB);
                            /**/
                            function rgb2hex(rgb) { // Convert rgb to hex
                                rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
                                function hex(x) {
                                    return ("0" + parseInt(x).toString(16)).slice(-2);
                                }
                                //return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
                                return hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
                            }
                            /**/
                            var colorHEX = rgb2hex(colorRGB);
                            $('#tool-06').colpickSetColor(colorHEX);
                        });
                        $( '.drag' ).each(function(){//'p[id^="draggable-"]'
                            var getId = $( this ).attr('id');
                            var values = $.cookie(getId+'color');
                            $('#'+getId).children(':nth-child(4)').css('color',values);
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
                    <!--<div id="tool-08" class="tools">e</div>-->
                </div>
                <div id="right-option-ph">
                    <script type="text/javascript">
                        $(function(){
                            $("#slider-rotate").slider({
                                orientation: "horizontal",
                                range: "min",
                                min: 0,
                                max: 360,
                                value: 0,
                                step: 1,
                                slide: function( event, ui ) {
                                    $('#text-rotate').val(ui.value);
                                }
                            });
                            $( "#text-rotate" ).val( $( "#slider-rotate" ).slider( "value" ) );
                            $(document).on('keyup', '#text-rotate', function (event) {
                                $( "#slider-rotate" ).slider( "value", this.value );
                            });
                        });
                    </script>
                    <div id="tool-08" class="tools">
                        <p>
                            <label for="text-rotate">Rotate:</label>
                            <input id="text-rotate" class="text-slider" type="text" style="border:0; color:#f6931f; font-weight:bold;">
                        </p>
                        <div id="slider-rotate" class="slider-slider"></div>
                    </div>
                    <script type="text/javascript">
                        $(function() {
                            /**
                            * CSS change, save and load
                            * Font-size
                            **/
                            $( '#slider-size' ).slider({
                                orientation: 'vertical',
                                range: 'min',
                                min: 5,
                                max: 200,
                                value: 14,
                                step: 1,
                                slide: function( event, ui ) {
                                    $( '#text-size' ).val( ui.value );
                                    //
                                    $('.curent').children(':nth-child(4)').css('font-size',ui.value+'px');
                                    var saveId = $('.curent').attr('id');
                                    $.cookie(saveId+'font',$('.curent').children(':nth-child(4)').css('font-size'));
                                }
                            });
                            $( '#text-size' ).val( $( '#slider-size' ).slider( 'value' ) );
                            //**//
                            $(document).on('keyup', '#text-size', function (event) {
                                $( '#slider-size' ).slider( 'value', this.value );
                                $('.curent').children(':nth-child(4)').css('font-size',this.value+'px');
                                var saveId = $('.curent').attr('id');
                                $.cookie(saveId+'font',$('.curent').children(':nth-child(4)').css('font-size'));
                            });
                            $(document).on('mousedown', '.drag', function () {
                                var size = $(this).children(':nth-child(4)').css('font-size');
                                var size = parseInt(size);
                                $( '#text-size' ).val(size);
                                $( '#slider-size' ).slider({ value: size });
                            });
                            $( '.drag' ).each(function(){//'p[id^="draggable-"]'
                                var getId = $( this ).attr('id');
                                var values = $.cookie(getId+'font');
                                $('#'+getId).children(':nth-child(4)').css('font-size',values);
                            });
                        });
                        $(function() {
                            /**
                            * CSS change, save and load
                            * Opacity
                            **/
                            $( '#slider-opacity' ).slider({
                                orientation: 'vertical',
                                range: 'min',
                                min: 0.00,
                                max: 1.01,
                                value: 1.00,
                                step: 0.01,
                                slide: function( event, ui ) {
                                    $( '#text-opacity' ).val( ui.value );
                                    //
                                    $('.curent').children(':nth-child(4)').css('opacity',ui.value);
                                    var saveId = $('.curent').attr('id');
                                    $.cookie(saveId+'Opacity',$('.curent').children(':nth-child(4)').css('opacity'));
                                }
                            });
                            $( '#text-opacity' ).val( $( '#slider-opacity' ).slider( 'value' ) );
                            //**//
                            $(document).on('keyup', '#text-opacity', function (event) {
                                $( '#slider-opacity' ).slider( 'value', this.value );
                                $('.curent').children(':nth-child(4)').css('opacity',this.value);
                                var saveId = $('.curent').attr('id');
                                $.cookie(saveId+'Opacity',$('.curent').children(':nth-child(4)').css('opacity'));
                            });
                            $(document).on('mousedown', '.drag', function () {
                                var opac = $(this).children(':nth-child(4)').css('opacity');
                                $( '#text-opacity' ).val(opac);
                                $( '#slider-opacity' ).slider({ value: opac });
                            });
                            $( '.drag' ).each(function(){//'p[id^="draggable-"]'
                                var getId = $( this ).attr('id');
                                var values = $.cookie(getId+'Opacity');
                                $('#'+getId).children(':nth-child(4)').css('opacity',values);
                            });
                            /**/
                            $( '#slider-opacity3, #slider-opacity4' ).slider({
                                orientation: 'vertical'
                            });
                        });
                        $(function() {
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
                            $( '#slider-rotation' ).slider({
                                orientation: 'vertical',
                                range: 'min',
                                min: -360,
                                max: 360,
                                value: 0,
                                step: 1,
                                slide: function( event, ui ) {
                                    $( '#text-rotation' ).val( ui.value );
                                    //
                                    $('.curent').css('transform','rotate('+ui.value+'deg)');
                                    var saveId = $('.curent').attr('id');
                                    $.cookie(saveId+'Transform',$('.curent').css('transform'));
                                }
                            });
                            $( '#text-rotation' ).val( $( '#slider-rotation' ).slider( 'value' ) );
                            //**//
                            $(document).on('keyup', '#text-rotation', function (event) {
                                $( '#slider-rotation' ).slider( 'value', this.value );
                                $('.curent').css('transform','rotate('+ui.value+'deg)');
                                var saveId = $('.curent').attr('id');
                                $.cookie(saveId+'Transform',$('.curent').css('transform'));
                            });
                            $(document).on('mousedown', '.drag', function () {
                                var rot = $(this).css('transform');
                                var rot = getRotationDegrees($(this));
                                $( '#text-rotation' ).val(rot);
                                $( '#slider-rotation' ).slider({ value: rot });
                            });
                            $( '.drag' ).each(function(){//'p[id^="draggable-"]'
                                var getId = $( this ).attr('id');
                                var values = $.cookie(getId+'Transform');
                                $('#'+getId).css('transform',values);
                            });
                        });
                    </script>
                    <div id="tool-09" class="tools">
                        <!-- Font size -->
                        <div class="tool-sub-ph-v">
                            <div class="tool-sub-label-v">
                                <p id="label-size" class="label-slider-v">Opacity:</p>
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
                                <p id="label-rotation" class="label-slider-v">Opacity:</p>
                            </div>
                            <div class="tool-sub-slider-v">
                                <div id="slider-rotation" class="slider-slider-v"></div>
                            </div>
                            <div class="tool-sub-text-v">
                                <input id="text-rotation" class="text-slider-v" type="text" />
                            </div>
                        </div>
                        <!-- IDK -->
                        <div class="tool-sub-ph-v">
                            <div class="tool-sub-label-v">
                                <p id="label-opacity4" class="label-slider-v">Opacity:</p>
                            </div>
                            <div class="tool-sub-slider-v">
                                <div id="slider-opacity4" class="slider-slider-v"></div>
                            </div>
                            <div class="tool-sub-text-v">
                                <input id="text-opacity4" class="text-slider-v" type="text" />
                            </div>
                        </div>
                    </div>
                    <div id="tool-10" class="tools">h</div>
                    <div id="tool-11" class="tools">i</div>
                    <!--<div id="tool-13" class="tools">j</div>-->
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
                // $(document).ready(function(){
                    // /**
                        // * CSS change, save and load
                        // * Font-size
                    // **/
                    // $(document).on('keyup', '#fontSize', function (event) {
                        // var size = $('#fontSize').val();
                        // $('.curent').children(':nth-child(4)').css('font-size',size+'px');
                        // var saveId = $('.curent').attr('id');
                        // $.cookie(saveId+'font',$('.curent').children(':nth-child(4)').css('font-size'));
                        // //alert($.cookie(saveId+'font'));
                    // });
                    // $(document).on('mousedown', '.drag', function () {
                        // var size = $(this).children(':nth-child(4)').css('font-size');
                        // var size = parseInt(size);
                        // $('#fontSize').val(size);
                    // });
                    // $( '.drag' ).each(function(){//'p[id^="draggable-"]'
                        // var getId = $( this ).attr('id');
                        // var values = $.cookie(getId+'font');
                        // $('#'+getId).children(':nth-child(4)').css('font-size',values);
                        // //alert(getId+'|'+$.cookie(getId+'font'));
                    // });
                // });
                // $(document).ready(function(){
                    // /**
                        // * CSS change, save and load
                        // * Color
                    // **/
                    // $(document).on('keyup', '#fontColor', function (event) {
                        // var colorRGB = $('#fontColor').val();
                        // $('.curent').children(':nth-child(4)').css('color',colorRGB);
                        // var saveId = $('.curent').attr('id');
                        // $.cookie(saveId+'color',$('.curent').children(':nth-child(4)').css('color'));
                        // //alert($.cookie(saveId+'font'));
                    // });
                    // $(document).on('mousedown', '.drag', function () {
                        // var colorRGB = $(this).children(':nth-child(4)').css('color');
                        // //var colorRGB = parseInt(colorRGB);
                        // $('#fontColor').val(colorRGB);
                    // });
                    // $( '.drag' ).each(function(){//'p[id^="draggable-"]'
                        // var getId = $( this ).attr('id');
                        // var values = $.cookie(getId+'color');
                        // $('#'+getId).children(':nth-child(4)').css('color',values);
                        // //alert(getId+'|'+$.cookie(getId+'font'));
                    // });
                // });
                // $(document).ready(function(){
                    // /**
                        // * CSS change, save and load
                        // * Opacity
                    // **/
                    // $(document).on('keyup', '#fontOpacity', function (event) {
                        // var opac = $('#fontOpacity').val();
                        // $('.curent').children(':nth-child(4)').css('opacity',opac);
                        // var saveId = $('.curent').attr('id');
                        // $.cookie(saveId+'Opacity',$('.curent').children(':nth-child(4)').css('opacity'));
                        // //alert($.cookie(saveId+'font'));
                    // });
                    // $(document).on('mousedown', '.drag', function () {
                        // var opac = $(this).children(':nth-child(4)').css('opacity');
                        // //var opac = parseInt(opac);
                        // $('#fontOpacity').val(opac);
                    // });
                    // $( '.drag' ).each(function(){//'p[id^="draggable-"]'
                        // var getId = $( this ).attr('id');
                        // var values = $.cookie(getId+'Opacity');
                        // $('#'+getId).children(':nth-child(4)').css('opacity',values);
                        // //alert(getId+'|'+$.cookie(getId+'font'));
                    // });
                // });
                // $(document).ready(function(){
                    // /**
                        // * CSS change, save and load
                        // * Rotate transform: rotate(30deg);
                    // **/
                    // function getRotationDegrees(obj) {
                        // var matrix = obj.css("-webkit-transform") ||
                        // obj.css("-moz-transform")    ||
                        // obj.css("-ms-transform")     ||
                        // obj.css("-o-transform")      ||
                        // obj.css("transform");
                        // if(matrix !== 'none') {
                            // var values = matrix.split('(')[1].split(')')[0].split(',');
                            // var a = values[0];
                            // var b = values[1];
                            // var angle = Math.round(Math.atan2(b, a) * (180/Math.PI));
                        // } else { var angle = 0; }

                        // if(angle < 0) angle +=360;
                        // return angle;
                    // }
                    // $(document).on('keyup', '#fontRotate', function (event) {
                        // var rot = $('#fontRotate').val();
                        // $('.curent').css('transform','rotate('+rot+'deg)');
                        // var saveId = $('.curent').attr('id');
                        // $.cookie(saveId+'Transform',$('.curent').css('transform'));
                        // //alert($.cookie(saveId+'Transform'));
                    // });
                    // $(document).on('mousedown', '.drag', function () {
                        // var rot = $(this).css('transform');
                        // //var rot = parseInt(rot);
                        // var rot = getRotationDegrees($(this));
                        // $('#fontRotate').val(rot);
                    // });
                    // $( '.drag' ).each(function(){//'p[id^="draggable-"]'
                        // var getId = $( this ).attr('id');
                        // var values = $.cookie(getId+'Transform');
                        // $('#'+getId).css('transform',values);
                        // //alert(getId+'|'+$.cookie(getId+'Transform'));
                    // });
                // });
                </script>
                <div id="middle-ph">
                    <div id="middle">
                        <!--<img id="picture" src="../repo/data/src1.jpg" />-->
                        <img id="picture" src="../repo/data/Bikini.jpg" />
                    </div>
                </div>
            </article>
        </section>
        <footer>
            <div id="count"></div>
        </footer>
    </body>
</html>
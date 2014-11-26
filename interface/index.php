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
                                <li id="button-08">Position</li>
                                <li id="button-09">Size</li>
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
                                <li id="resize">resize</li>
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
                    <script type="text/javascript">
                        $(function(){
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
                    </script>
                    <div id="tool-05" class="tools">
                        <textarea id="txt" class="btn" type="text" value="Some text" />Some text</textarea>
                    </div>
                    <script type="text/javascript">
                    $(function(){
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
                            $(document).on('keyup', '#text-rotation', function (event) {
                                $( '#slider-rotation' ).slider( 'value', this.value );
                                $('.curent').css('transform','rotate('+this.value+'deg)');
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
                    <div id="tool-07" class="tools">
                        <!-- Font size -->
                        <div class="tool-sub-ph-v">
                            <div class="tool-sub-label-v">
                                <p id="label-size" class="label-slider-v">Font-size:</p>
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
                    <script type="text/javascript">
                        $(function(){
                            /**
                            *   Position Top
                            **/
                            $("#slider-top").slider({
                                orientation: "vertical",
                                range: "min",
                                min: 0,
                                max: funTopMax(),
                                value: 0,
                                step: 1,
                                slide: function( event, ui ) {
                                    var yPos = funTopMax()-ui.value;
                                    $('#text-top-pixel').val(yPos);
                                    //
                                    $('.curent').css('top',yPos+'px');
                                    var id = $( '.curent' ).attr('id').slice(-1);
                                    $.cookie('draggableTop'+id, yPos);
                                },
                            });
                            $( "#text-top-pixel" ).val( $( "#slider-top" ).slider( "value" ) );
                            $(document).on('keyup', '#text-top-pixel', function (event) {
                                var yPos = funTopMax()-this.value;
                                $( "#slider-top" ).slider( "value", yPos );
                                $('.curent').css('top',this.value+'px');
                                var id = $( '.curent' ).attr('id').slice(-1);
                                $.cookie('draggableTop'+id, this.value);
                            });
                            $(document).on('mousedown', '.drag', function () {
                                var pTop = $(this).css('top');
                                var pTop = parseInt(pTop);
                                $( '#text-top-pixel' ).val(pTop);
                                var yPos = funTopMax()-pTop;
                                $( '#slider-top' ).slider({ value: yPos });
                            });
                            /**
                            * Position Left
                            **/
                            $("#slider-left").slider({
                                orientation: "horizontal",
                                range: "min",
                                min: 0,
                                max: funLeftMax(),
                                value: 0,
                                step: 1,
                                slide: function( event, ui ) {
                                    $('#text-left-pixel').val(ui.value);
                                    //
                                    $('.curent').css('left',ui.value+'px');
                                    var id = $( '.curent' ).attr('id').slice(-1);
                                    $.cookie('draggableLeft'+id, ui.value);
                                }
                            });
                            $( "#text-left-pixel" ).val( $( "#slider-left" ).slider( "value" ) );
                            $(document).on('keyup', '#text-left-pixel', function (event) {
                                $( "#slider-left" ).slider( "value", this.value );
                                $('.curent').css('left',this.value+'px');
                                var id = $( '.curent' ).attr('id').slice(-1);
                                $.cookie('draggableLeft'+id, this.value);
                            });
                            $(document).on('mousedown', '.drag', function () {
                                var pLeft = $(this).css('left');
                                var pLeft = parseInt(pLeft);
                                $( '#text-left-pixel' ).val(pLeft);
                                $( '#slider-left' ).slider({ value: pLeft });
                            });
                        });
                    </script>
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
                    <script type="text/javascript">
                        $(function(){
                            /**
                            *   Position Height
                            **/
                            $("#slider-height").slider({
                                orientation: "vertical",
                                range: "min",
                                min: 0,
                                max: funHeightMax(),
                                value: 0,
                                step: 1,
                                slide: function( event, ui ) {
                                    var yPos = funHeightMax()-ui.value;
                                    $('#text-height-pixel').val(yPos);
                                    //
                                    $('.curent').css('height',yPos+'px');
                                    var id = $( '.curent' ).attr('id').slice(-1);
                                    //$.cookie('draggableTop'+id, yPos);
                                    $.cookie('resizableHeight'+id, yPos);
                                },
                            });
                            $( "#text-height-pixel" ).val( $( "#slider-height" ).slider( "value" ) );
                            $(document).on('keyup', '#text-height-pixel', function (event) {
                                var yPos = funHeightMax()-this.value;
                                $( "#slider-height" ).slider( "value", yPos );
                                $('.curent').css('height',this.value+'px');
                                var id = $( '.curent' ).attr('id').slice(-1);
                                //$.cookie('draggableTop'+id, this.value);
                                $.cookie('resizableHeight'+id, this.value);
                            });
                            $(document).on('mousedown', '.drag', function () {
                                var pTop = $(this).css('height');
                                var pTop = parseInt(pTop);
                                $( '#text-height-pixel' ).val(pTop);
                                var yPos = funHeightMax()-pTop;
                                $( '#slider-height' ).slider({ value: yPos });
                            });
                            /**
                            * Position Width
                            **/
                            $("#slider-width").slider({
                                orientation: "horizontal",
                                range: "min",
                                min: 0,
                                max: funWidthMax(),
                                value: 0,
                                step: 1,
                                slide: function( event, ui ) {
                                    $('#text-width-pixel').val(ui.value);
                                    //
                                    $('.curent').css('width',ui.value+'px');
                                    var id = $( '.curent' ).attr('id').slice(-1);
                                    //$.cookie('draggableLeft'+id, ui.value);
                                    $.cookie('resizableWidth'+id, ui.value);
                                }
                            });
                            $( "#text-width-pixel" ).val( $( "#slider-width" ).slider( "value" ) );
                            $(document).on('keyup', '#text-width-pixel', function (event) {
                                $( "#slider-width" ).slider( "value", this.value );
                                $('.curent').css('width',this.value+'px');
                                var id = $( '.curent' ).attr('id').slice(-1);
                                //$.cookie('draggableLeft'+id, this.value);
                                $.cookie('resizableWidth'+id, this.value);
                    
                            });
                            $(document).on('mousedown', '.drag', function () {
                                var pLeft = $(this).css('width');
                                var pLeft = parseInt(pLeft);
                                $( '#text-width-pixel' ).val(pLeft);
                                $( '#slider-width' ).slider({ value: pLeft });
                            });
                        });
                    </script>
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
                    <div id="tool-10" class="tools">h</div>
                    <div id="tool-11" class="tools">
                        Color: <input id="fontColor" class="" type="text" /><br />
                    </div>
                    <!--<div id="tool-13" class="tools">j</div>-->
                </div>
                <script type="text/javascript">
                $(document).ready(function(){
                    
                });
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
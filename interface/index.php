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
        
        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="js/scrypt.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min-1.11.2.js"></script>
        <script type="text/javascript" src="js/jquery.cookie.js"></script>
        <script type="text/javascript" src="js/showContainer.js"></script>
        <script type="text/javascript" src="js/draggable.js"></script>

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
                    <div id="tool-05" class="tools">b</div>
                    <div id="tool-06" class="tools">c</div>
                    <div id="tool-07" class="tools">d</div>
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
                    $( '.drag' ).resizable({
                        start: function(event, ui) {
                            //alert('resizing started');
                        },
                        resize: function(event, ui) {
                         
                        },
                        stop: function(event, ui) {
                            //alert('resizing stopped');
                            //$.cookie('draggableLeft'+id, ui.position.left);
                            //$.cookie('draggableTop'+id, ui.position.top);
                            //alert(ui.size.width+'|'+ui.size.height);
                        }
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
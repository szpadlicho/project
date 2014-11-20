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
        
        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="js/scrypt.js"></script>

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
        $(document).ready(function(){
            $( '#top-menu ul li ul li' ).addClass( 'active' );
            $( '#top-menu ul li ul li' ).click(function(){
                if ( $( this ).hasClass( 'active' ) ) {
                    $( this ).removeClass( 'active' );
                } else {
                    $( this ).addClass( 'active' );
                };
                
            });
            //$( '[id^="tool-"]' ).hide(); // hide the other divs
            $( '[id^="tool-"]' ).addClass( 't-show' );
            $( 'li[id^="button-"]' ).click(function(){
                if ( $( '#tool-'+this.id.slice(7) ).hasClass( 't-show' ) ) {
                    $( '#tool-'+this.id.slice(7) ).removeClass( 't-show' );
                    $( '#tool-'+this.id.slice(7) ).hide('explode').addClass( 't-hide' );
                } else {
                    $( '#tool-'+this.id.slice(7) ).removeClass( 't-hide' );
                    $( '#tool-'+this.id.slice(7) ).show('explode').addClass( 't-show' );;
                }
            });
        });
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
                <!--
                <div id="left-option-ph">
                    <div class="left-option"><span>Rozmiar</span></div>
                    <div class="left-option"><span>Czcionka</span></div>
                    <div class="left-option"><span>Napis</span></div>
                </div>
                -->
                <div id="left-option-ph">
                    <div id="tool-04" class="tools">a</div>
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
                <div id="middle-ph">
                <!--<img id="picture" src="../repo/data/src1.jpg" />-->
                <img id="picture" src="../repo/data/Bikini.jpg" />
                </div>
            </article>
        </section>
        <footer>
            <div id="count"></div>
        </footer>
    </body>
</html>
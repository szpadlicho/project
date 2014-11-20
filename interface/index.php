<!DOCTYPE HTML>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title></title>
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
            $( '#top-menu ul li ul li' ).click(function(){
                //$( '#top-menu ul li ul li' ).removeClass( 'active' );
                if ( $( this ).hasClass( 'active' ) ) {
                    $( this ).removeClass( 'active' );
                } else {
                    $( this ).addClass( 'active' );
                };
                
            });
            $( '[id^="tool-"]' ).hide(); // hide the other divs
            $( 'li[id^="button-"]' ).click(function(){
                if ( $( '#tool-'+this.id.slice(7) ).hasClass( 't-show' ) ) {
                    $( '#tool-'+this.id.slice(7) ).removeClass( 't-show' );
                    $( '#tool-'+this.id.slice(7) ).hide('explode').addClass( 't-hide' );
                } else {
                    $( '#tool-'+this.id.slice(7) ).removeClass( 't-hide' );
                    $( '#tool-'+this.id.slice(7) ).show('explode').addClass( 't-show' );;
                }
                //$( '#tool-'+this.id.slice(7) ).show('explode');
            });
        });
        </script>
    </head>
    <body>
        <section id="relative-holder">
            <header id="top-menu-ph">
                <nav id="top-menu">
                    <ul>
                        <li>Plik
                            <ul>
                                <li id="button-1">Open</li>
                                <li id="button-2">Close</li>
                                <li id="button-3">Reset</li>
                            </ul>
                        </li>
                        <li>Widok
                            <ul>
                                <li id="button-4">Rozmiar</li>
                                <li id="button-5">Czcionka</li>
                                <li id="button-6">Napis</li>
                            </ul>
                        </li>
                        <li>Edycja
                            <ul>
                                <li id="button-7">one</li>
                                <li id="button-8">two</li>
                                <li id="button-9">three</li>
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
                <div id="tool-1" class="tools">a</div>
                <div id="tool-2" class="tools">b</div>
                <div id="tool-3" class="tools">c</div>
                <div id="tool-4" class="tools">d</div>
                <div id="tool-5" class="tools">e</div>
                <div id="tool-6" class="tools">f</div>
                <div id="tool-7" class="tools">g</div>
                <div id="tool-8" class="tools">h</div>
                <div id="tool-9" class="tools">i</div>
            </article>
        </section>
        <footer>
            <div id="count"></div>
        </footer>
    </body>
</html>
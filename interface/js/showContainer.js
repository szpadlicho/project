$(document).ready(function(){
    /**
        * Show and hide container when top menu is checked or not
    **/
    $( '#top-menu ul li ul li' ).addClass( 'active' );
    $( '#button-11' ).removeClass( 'active' );
    //$( '#button-09' ).removeClass( 'active' );
    $( '#top-menu ul li ul li' ).click(function(){
        if ( $( this ).hasClass( 'active' ) ) {
            $( this ).removeClass( 'active' );
        } else {
            $( this ).addClass( 'active' );
        };
    });
    //$( '[id^="tool-"]' ).hide(); // hide the other divs
    $( '[id^="tool-"]' ).addClass( 't-show' );
    $( '#tool-11' ).removeClass( 't-show' ).addClass( 't-hide' ).hide();
    //$( '#tool-09' ).removeClass( 't-show' ).addClass( 't-hide' ).hide();
    $( 'li[id^="button-"]' ).click(function(){
        if ( $( '#tool-'+this.id.slice(7) ).hasClass( 't-show' ) ) {
            $( '#tool-'+this.id.slice(7) ).removeClass( 't-show' );
            $( '#tool-'+this.id.slice(7) ).hide( 'fold' ).addClass( 't-hide' ); // drop size scale slide fold
        } else {
            $( '#tool-'+this.id.slice(7) ).removeClass( 't-hide' );
            $( '#tool-'+this.id.slice(7) ).show( 'fold' ).addClass( 't-show' );;
        }
    });   
});
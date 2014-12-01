$(document).ready(function(){
    /**
    * Show and hide container when top menu is checked or not
    **/
    $( '[id^="button-"]' ).addClass( 'active' );
    $( '#button-11' ).removeClass( 'active' ); // hide for last dive
    $( '[id^="button-"]' ).click(function(){
        if ( $( this ).hasClass( 'active' ) ) {
            $( this ).removeClass( 'active' );
        } else {
            $( this ).addClass( 'active' );
        };
    });
    //$( '[id^="button-"]' ).hide(); // hide the other divs
    $( '[id^="tool-"]' ).addClass( 't-show' );
    $( '#tool-11' ).removeClass( 't-show' ).addClass( 't-hide' ).hide(); // hide for last dive
    $( '[id^="button-"]' ).click(function(){
        if ( $( '#tool-'+this.id.slice(7) ).hasClass( 't-show' ) ) {
            $( '#tool-'+this.id.slice(7) ).removeClass( 't-show' );
            $( '#tool-'+this.id.slice(7) ).hide( 'fold' ).addClass( 't-hide' ); // drop size scale slide fold
        } else {
            $( '#tool-'+this.id.slice(7) ).removeClass( 't-hide' );
            $( '#tool-'+this.id.slice(7) ).show( 'fold' ).addClass( 't-show' );;
        }
    });   
});
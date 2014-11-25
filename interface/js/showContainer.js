$(document).ready(function(){
    /**
        * Show and hide container when top menu is checked or not
    **/
    $( '#top-menu ul li ul li' ).addClass( 'active' );
    
    $( '#resize' ).removeClass( 'active' );
    // $( '#resize' ).click(function(){
    // });
        
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
            $( '#tool-'+this.id.slice(7) ).hide( 'fold' ).addClass( 't-hide' ); // drop size scale slide
        } else {
            $( '#tool-'+this.id.slice(7) ).removeClass( 't-hide' );
            $( '#tool-'+this.id.slice(7) ).show( 'fold' ).addClass( 't-show' );;
        }
    });
});
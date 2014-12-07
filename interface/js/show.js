$(function() {
    /**
    * Show and hide container when top menu is checked or not
    **/
    $( '[id^="button-"]' ).addClass( 'active' );
    $( '#button-11' ).removeClass( 'active' ); // hide for last dive
    $( '[id^="button-"]' ).click(function(){
        if ( $( this ).hasClass( 'active' ) ) {
            $( this ).removeClass( 'active' );
            //
            var id = $( this ).prop( 'id' );
            console.log('remove: '+id);
            localStorage.setItem(id, id);
        } else {
            $( this ).addClass( 'active' );
            //
            var id = $( this ).prop( 'id' );
            console.log('activ: '+id);
            localStorage.removeItem(id);
        };
    });
    //$( '[id^="button-"]' ).hide(); // hide the other divs
    $( '[id^="tool-"]' ).addClass( 't-show' );
    $( '#tool-11' ).removeClass( 't-show' ).addClass( 't-hide' ).hide(); // hide for last div
    $( '[id^="button-"]' ).click(function(){
        if ( $( '#tool-'+this.id.slice(7) ).hasClass( 't-show' ) ) {
            $( '#tool-'+this.id.slice(7) ).removeClass( 't-show' );
            $( '#tool-'+this.id.slice(7) ).hide( 'fold' ).addClass( 't-hide' ); // effects - drop size scale slide fold
            //
            var id = $( '#tool-'+this.id.slice(7) ).prop( 'id' );
            //console.log('hide: '+id);
            localStorage.setItem(id, id);
        } else {
            $( '#tool-'+this.id.slice(7) ).removeClass( 't-hide' );
            $( '#tool-'+this.id.slice(7) ).show( 'fold' ).addClass( 't-show' );
            //
            var id = $( '#tool-'+this.id.slice(7) ).prop( 'id' );
            //console.log('show: '+id);
            localStorage.removeItem(id);
        }
    });
    //localStorage.setItem();
    //localStorage.getItem();
    //localStorage.removeItem();
    $( '[id^="button-"]' ).each(function(e){
        var id = $( this ).prop( 'id' );
        var stre = localStorage.getItem( id );
        if ( stre != null && stre != '') {
            //console.log('detected: '+localStorage.getItem( id ));
            $( '#'+id ).removeClass( 'active' );
        }
    });
    $( '[id^="button-"]' ).each(function(e){
        var id = $( '#tool-'+this.id.slice(7) ).prop( 'id' );
        var stre = localStorage.getItem(id);
        //console.log(id);
        if ( stre != null && stre != '') {
            //console.log('detected2: '+localStorage.getItem( id ));
            $( '#'+id ).removeClass( 't-show' );
            $( '#'+id ).hide().addClass( 't-hide' );
        }
    });
    //localStorage.removeItem('tool-05');
    //localStorage.removeItem('tool-09');
});
$(function() {
    $( '#about' ).click(function(){
        $( '#dimming-about' ).show();
    });
    $( '#close-about' ).click(function(){
        $( '#dimming-about' ).hide();
    });
});
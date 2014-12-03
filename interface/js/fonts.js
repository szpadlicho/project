$(function(){
    /*
    $("#fontChange").click(function() {
        $( '.curent .toText' ).css( 'font-family', $(this).val());
        var saveId = $( '.curent' ).attr('id');
        localStorage.setItem(saveId+'fontFamily',$( '.curent .toText' ).css( 'font-family' ));
    });
    $(document).on('mousedown', '.drag', function () {
        var fontFamily = $( '.curent .toText' ).css( 'font-family');
        $("#fontChange option").each(function(){
            if($(this).val()==fontFamily){
                $( '#fontChange' ).css('font-family', fontFamily);
                $(this).attr("selected",true); 
                $("#fontChange").val(fontFamily);
            } else {
                $(this).attr("selected",false); 
            }
        });
    });
    */
    $("#fontChangeMy").click(function() {
        var value = $( '#fontChangeMy option:selected' ).text();
        $( '.curent .toText' ).css( 'font-family', value);
        //alert(value);
        var saveId = $( '.curent' ).attr('id');
        localStorage.setItem(saveId+'fontFamily',$( '.curent .toText' ).css( 'font-family' ));
        //alert($( '.curent .toText' ).css( 'font-family' ));
    });
    $(document).on('mousedown', '.drag', function () {
        var fontFamily = $( '.curent .toText' ).css( 'font-family');
        //console.log('font family: '+fontFamily);
        //var text2 = $( '#fontChangeMy option:selected' ).text();
        //console.log('text2: '+text2);
        $( '#fontChangeMy option' ).each(function(){
            //console.log('this text: '+$( this ).text());
            if($( this ).text()==fontFamily){
                //console.log('this: '+$( this ).text());
                //console.log('ff: '+fontFamily);
                //console.log('------------');
                //$(this).attr("selected",true); 
                //$("#fontChangeMy option:selected").text( $( '#fontChangeMy option:selected' ).text() );
                //$('#fontChangeMy option:contains("'+$( this ).text()+'")').prop('selected', true);
                $( '#fontChangeMy' ).css('font-family', fontFamily);
                $('#fontChangeMy option').filter(function() { 
                    return ($(this).text() == fontFamily); //To select actually font family
                }).prop('selected', true);
            } else {
                $(this).attr("selected",false); 
            }
        });
        //console.log($( '#fontChangeMy option:selected' ).text());
    });
    $( '.drag' ).each(function(){
        var getId = $( this ).attr('id');
        var values = localStorage.getItem(getId+'fontFamily');
        $('#'+getId+' .toText').css('font-family',values);
    });
});
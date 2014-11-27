$(function(){
    $("#fontChange").click(function() {
        $( '.curent .toText' ).css( 'font-family', $(this).val());
        var saveId = $( '.curent' ).attr('id');
        $.cookie(saveId+'fontFamily',$( '.curent .toText' ).css( 'font-family' ));
    });
    $(document).on('mousedown', '.drag', function () {
        var fontFamily = $( '.curent .toText' ).css( 'font-family');
        $("#fontChange option").each(function(){
            if($(this).val()==fontFamily){
                $(this).attr("selected",true); 
                $("#fontChange").val(fontFamily);
            } else {
                $(this).attr("selected",false); 
            }
        });
    });
    $( '.drag' ).each(function(){
        var getId = $( this ).attr('id');
        var values = $.cookie(getId+'fontFamily');
        $('#'+getId+' .toText').css('font-family',values);
    });
});
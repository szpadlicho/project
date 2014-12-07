$(function() {
    $( '#new-file' ).click(function(){
        $( '#dimming' ).show();
    });
    $('#create-form-colpick').colpick({
        flat:true,
        layout:'rgbhex',
        submit:0,
        color: 'ffffff',
        onChange:function(hsb,hex,rgb,el,bySetColor) {
            $('#rr').val(rgb.r);//.rgb.g.rgb.b
            $('#gg').val(rgb.g);//.rgb.g.rgb.b
            $('#bb').val(rgb.b);//.rgb.g.rgb.b
        }
    });
    $( '#create-form-ok' ).click(function(){
        if ( $( '[name="transparent-box"]' ).prop('checked') ) {//.prop('checked')
            console.log('checked');
            var opacity = true;
        } else {
            console.log('nop');
            var opacity = false;
        }
        $.ajax({
            type: 'POST',
            url: 'php/blank.php',
            data: { width: $( '#create-form-width' ).val(), height: $( '#create-form-height' ).val(), r:$( '#rr' ).val(), g:$( '#gg' ).val(), b:$( '#bb' ).val(), transparent: opacity  }, 
            cache: false,
            dataType: 'text',
            success: function(data){
                //console.log(data);
                location.reload();
            }
        });
    });
    $( '#create-form-cancel' ).click(function(){
        location.reload();
    });
});
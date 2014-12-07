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
$(function() {
    $( '#download-files' ).click(function(){
        setTimeout(function(){
            window.open("php/download.php?file=../data/picture/<?php echo $_COOKIE['PHPSESSID']; ?>-preview.<?php echo $ext; ?>");
        }, 500);
    });
});
$(function() {
    $('#form-fonts').change(function(e) {
        e.preventDefault();
        data = new FormData($('#form-fonts')[0]);
        console.log('Submitting');
        $.ajax({
            type: 'POST',
            url: 'php/upload_fonts.php',
            data:  data,
            cache: false,
            success: function (data) {
                $("#info").html(data);
                location.reload();
            },
            contentType: false,
            processData: false
        }).done(function(data) {
            console.log(data);
        }).fail(function(jqXHR,status, errorThrown) {
            console.log(errorThrown);
            console.log(jqXHR.responseText);
            console.log(jqXHR.status);
            //$("#info").text('font upload fail');
        });
    });
    $( '#add-font' ).click(function(){
        $( '#files' ).click();
    });
});
var funProcent = function(val, value){
    var prcent = ((val / value) * 100).toFixed(0);
    return prcent;
};
$(function() {
    $(document).on('mousedown', '.drag', function () {
        var val2 = $( '.curent' ).children('.toText').css('font-size');
        var val2 = parseInt(val2);
        var value2 = $( '#image' ).width();
        var img = document.getElementById("image");
        var er = funProcent(val2, value2);
        $( '#font-size-procent' ).val(er+'%');
    });
});
$(document).ready(function() {
    $("img").load(function() {
        //alert($(this).height());
        //alert($(this).width());
    });
    //var img = document.getElementById("image");
    //alert("height:" + img.height + ", width: " + img.width);
    //alert("natural height:" + img.naturalHeight + ", natural width: " + img.naturalWidth);
    //alert("jquery height:" + $("#image").height() + ",jquery width: "+ $("#image").width());
});
$(function() {
    $('#form-pictures').change(function(e) {
        e.preventDefault();
        data = new FormData($('#form-pictures')[0]);
        console.log('Submitting');
        $.ajax({
            type: 'POST',
            url: 'php/upload_files.php',
            data:  data,
            cache: false,
            success: function (data) {
                $("#info").html(data);
                location.reload();
            },
            contentType: false,
            processData: false
        }).done(function(data) {
            console.log(data);
        }).fail(function(jqXHR,status, errorThrown) {
            console.log(errorThrown);
            console.log(jqXHR.responseText);
            console.log(jqXHR.status);
            $("#info").text('Picture upload fail');
        });
    });
    $( '#load-file' ).click(function(){
        $( '#pictures' ).click();
    });
});
$(function() {
    $( '#about' ).click(function(){
        $( '#dimming-about' ).show();
    });
    $( '#close-about' ).click(function(){
        $( '#dimming-about' ).hide();
    });
});
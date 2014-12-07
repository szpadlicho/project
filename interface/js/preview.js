$(function() {
    /**
    * Array with all parameters to create image in GD
    **/
    var passAndShow = function(){
        var arry = [];
        $( '.drag' ).each(function(){
            var getId = $( this ).attr('id');
            var top = $( this ).css('top');
            var left = $( this ).css('left');
            var size = $( this ).children('.toText').css('font-size');
            var rotate = getRotationDegrees($(this));
            var color = $( this ).children('.toText').css('color');
            var opacity = $( this ).children('.toText').css('opacity');
            var value = $( this ).children('.toText').text();
            var family = $( this ).children('.toText').css('font-family');
            var workH = $( '#image' ).height();
            var workW = $( '#image' ).width();
            arry.push({top:top, left:left, size:size, rotate:rotate, color:color, opacity:opacity, value:value, family:family, workH:workH, workW:workW});
        });
        dataObject = {arry};
        $.ajax({
            type: 'POST',
            url: 'php/show.php',
            data: {data : dataObject }, 
            cache: false,
            dataType: 'text',
            success: function(data){
                //$('#show').html(data);
                setTimeout(function(){ 
                    $('#show').html(data); 
                }, 500)
            }
        });
    };
    passAndShow();
    $(document).on( 'mouseup', 'body', function(e){
        if (e.target.id != 'create-form-ok') {
            passAndShow();
            setTimeout(function(){ 
                $( '#preview-img' ).attr( 'src', $( '#preview-img' ).attr( 'src' )+"?timestamp=" + new Date().getTime()); 
            }, 500)
            //$( '#preview-img' ).attr( 'src', $( '#preview-img' ).attr( 'src' )+"?timestamp=" + new Date().getTime());
        }
    });
    /**
    * Download click create new image to download
    **/
    $( '#download-files' ).click( function(e){
        passAndShow();
    });
    /**
    * function do display all localStorage data
    **/
    function loadMenu() {
        if (!localStorage.length < 1) {
            for (var i = 0; i < localStorage.length; i++) {
                var item = localStorage.getItem(localStorage.key(i));
                //alert(item);
                //$('#show-local').append(localStorage.key(i));
                //$('#show-local').append(item);
                //$('#show-local').append('<br />');
            };
        } else {
            console.log('no item');
        };
    };
    loadMenu();
});
$(function(){
    $("#fontChange").click(function() {
        $( '.curent .toText' ).css( 'font-family', $(this).val());
        var saveId = $( '.curent' ).attr('id');
        localStorage.setItem(saveId+'fontFamily',$( '.curent .toText' ).css( 'font-family' ));
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
    $("#fontChange2").click(function() {
        var value = $( '#fontChange2 option:selected' ).text();
        $( '.curent .toText' ).css( 'font-family', value);
        //alert(value);
        var saveId = $( '.curent' ).attr('id');
        localStorage.setItem(saveId+'fontFamily',$( '.curent .toText' ).css( 'font-family' ));
        //alert($( '.curent .toText' ).css( 'font-family' ));
    });
    $(document).on('mousedown', '.drag', function () {
        var fontFamily = $( '.curent .toText' ).css( 'font-family');
        //console.log('font family: '+fontFamily);
        //var text2 = $( '#fontChange2 option:selected' ).text();
        //console.log('text2: '+text2);
        $( '#fontChange2 option' ).each(function(){
            //console.log('this text: '+$( this ).text());
            if($( this ).text()==fontFamily){
                //console.log('this: '+$( this ).text());
                //console.log('ff: '+fontFamily);
                //console.log('------------');
                //$(this).attr("selected",true); 
                //$("#fontChange2 option:selected").text( $( '#fontChange2 option:selected' ).text() );
                //$('#fontChange2 option:contains("'+$( this ).text()+'")').prop('selected', true);
                $('#fontChange2 option').filter(function() { 
                    return ($(this).text() == fontFamily); //To select actually font family
                }).prop('selected', true);
            } else {
                $(this).attr("selected",false); 
            }
        });
        //console.log($( '#fontChange2 option:selected' ).text());
    });
    $( '.drag' ).each(function(){
        var getId = $( this ).attr('id');
        var values = localStorage.getItem(getId+'fontFamily');
        $('#'+getId+' .toText').css('font-family',values);
    });
});
// $(function(){
    // $("#fontChange2").change(function() {
        // var value = $( '#fontChange2 option:selected' ).text();
        // alert(value);
        // $( 'head' ).prepend('<style type=\"text/css\">' + 
                                    // '@font-face {\n' +
                                        // '\tfont-family: \"'+value+'\";\n' + 
                                        // '\tsrc: local('☺'), url(''+$(this).val()+'') format('opentype');\n' + 
                                    // '}\n' + 
                                        // '\.curent .toText {\n' + 
                                        // '\tfont-family: '+value+' !important;\n' + 
                                    // '}\n' + 
                                // '</style>');
        
        // $( '#show-local' ).append("<style type=\"text/css\">" + 
                                    // "@font-face {\n" +
                                        // "\tfont-family: \""+value+"\";\n" + 
                                        // "\tsrc: local('☺'), url('"+$(this).val()+"') format('opentype');\n" + 
                                    // "}\n" + 
                                        // "\.curent .toText {\n" + 
                                        // "\tfont-family: "+value+" !important;\n" + 
                                    // "}\n" + 
                                // "</style>");
    // });
// });
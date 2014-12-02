var getRotationDegrees = function(obj) {
    /**
    * Function for transform matrix value to degrees.
    **/
    var matrix = obj.css("-webkit-transform") ||
    obj.css("-moz-transform")    ||
    obj.css("-ms-transform")     ||
    obj.css("-o-transform")      ||
    obj.css("transform");
    if(matrix !== 'none') {
        var values = matrix.split('(')[1].split(')')[0].split(',');
        var a = values[0];
        var b = values[1];
        var angle = Math.round(Math.atan2(b, a) * (180/Math.PI));
    } else { var angle = 0; }

    if(angle < 0) angle +=360;
    return angle;
}
$(function(){
    /**
    * Change, save and load text
    * Text
    **/
    //var myChildren = $('.curent').children(':nth-child(4)');
    $(document).on('keyup', '#txt', function (event) {
        if (event.keyCode == 13) { // change enter to <br>
            $('.curent').children(':nth-child(4)').append('<br />');
            return false;
        }
        $('.curent').children(':nth-child(4)').text($(this).val());
        var saveId = $('.curent').attr('id');
        localStorage.setItem(saveId,$(this).val());
    });
    $(document).on('mousedown', '.drag', function () {
        var value = $(this).children(':nth-child(4)').text();
        $('#txt').val(value);
    });
    $( '.drag' ).each(function(){//'p[id^="draggable-"]'
        var getId = $( this ).attr('id');
        var values = localStorage.getItem(getId);
        if (values) {
            $('#'+getId).children(':nth-child(4)').text(values);
        }
    });
});
$(function(){
    /**
    * CSS change, save and load
    * Color
    **/
    $('#tool-06').colpick({
        flat:true,
        layout:'rgbhex',
        //colorScheme:'dark',
        submit:0,
        color: '000000',
        onChange:function(hsb,hex,rgb,el,bySetColor) {
            //$('#tool-08').css('background-color','#'+hex);
            //$('#tool-09').text(rgb.r);//.rgb.g.rgb.b
            //$('#tool-10').text(rgb.g);//.rgb.g.rgb.b
            //$('#tool-11').text(rgb.b);//.rgb.g.rgb.b
            $('.curent').children(':nth-child(4)').css('color','#'+hex);
            var saveId = $('.curent').attr('id');
            localStorage.setItem(saveId+'color',$('.curent').children(':nth-child(4)').css('color'));
        }
    });
    $(document).on('mousedown', '.drag', function () {
        var colorRGB = $(this).children(':nth-child(4)').css('color');
        $('#fontColor').val(colorRGB);
        /**/
        function rgb2hex(rgb) { // Convert rgb to hex
            rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
            function hex(x) {
                return ("0" + parseInt(x).toString(16)).slice(-2);
            }
            //return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
            return hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
        }
        /**/
        var colorHEX = rgb2hex(colorRGB);
        $('#tool-06').colpickSetColor(colorHEX);
    });
    $( '.drag' ).each(function(){//'p[id^="draggable-"]'
        var getId = $( this ).attr('id');
        var values = localStorage.getItem(getId+'color');
        $('#'+getId).children(':nth-child(4)').css('color',values);
    });
});
$(function() {
    /**
    * CSS change, save and load
    * Font-size
    **/
    $( '#slider-size' ).slider({
        orientation: 'vertical',
        range: 'min',
        min: 5,
        max: 200,
        value: 14,
        step: 1,
        slide: function( event, ui ) {
            $( '.curent' ).css({'width':'','height':''});// only for handed resize setup reset
            //
            $('.curent').children(':nth-child(4)').css('font-size',ui.value+'px');
            var saveId = $('.curent').attr('id');
            localStorage.setItem(saveId+'font',$('.curent').children(':nth-child(4)').css('font-size'));
        },
        stop: function() {// only for fix resize setup
            var id = $('.curent').attr('id').slice(-1);
            localStorage.setItem('resizableWidth'+id, $( '.curent' ).width());
            localStorage.setItem('resizableHeight'+id, $( '.curent' ).height());
            //alert($( '.curent' ).width());
            //alert($( '.curent' ).height());
        }
    });
    $( '#text-size' ).val( $( '#slider-size' ).slider( 'value' ) );
    $(document).on('keyup', '#text-size', function (event) {
        $( '.curent' ).css({'width':'','height':''});//this is only for handed resize setup reset to fixed this
        $( '#slider-size' ).slider( 'value', this.value );
        $('.curent').children(':nth-child(4)').css('font-size',this.value+'px');
        var saveId = $('.curent').attr('id');
        localStorage.setItem(saveId+'font',$('.curent').children(':nth-child(4)').css('font-size'));
        // next is only for fix resize setup
        var id = $('.curent').attr('id').slice(-1);
        localStorage.setItem('resizableWidth'+id, $( '.curent' ).width());
        localStorage.setItem('resizableHeight'+id, $( '.curent' ).height());
    });
    $(document).on('mousedown', '.drag', function () {
        var size = $(this).children(':nth-child(4)').css('font-size');
        var size = parseInt(size);
        $( '#text-size' ).val(size);
        $( '#slider-size' ).slider({ value: size });
    });
    $( '.drag' ).each(function(){//'p[id^="draggable-"]'
        var getId = $( this ).attr('id');
        var values = localStorage.getItem(getId+'font');
        $('#'+getId).children(':nth-child(4)').css('font-size',values);
    });
});
$(function() {
    /**
    * CSS change, save and load
    * Opacity
    **/
    $( '#slider-opacity' ).slider({
        orientation: 'vertical',
        range: 'min',
        min: 0.00,
        max: 1.01,
        value: 1.00,
        step: 0.01,
        slide: function( event, ui ) {
            $( '#text-opacity' ).val( ui.value );
            //
            $('.curent').children(':nth-child(4)').css('opacity',ui.value);
            var saveId = $('.curent').attr('id');
            localStorage.setItem(saveId+'Opacity',$('.curent').children(':nth-child(4)').css('opacity'));
        }
    });
    $( '#text-opacity' ).val( $( '#slider-opacity' ).slider( 'value' ) );
    $(document).on('keyup', '#text-opacity', function (event) {
        $( '#slider-opacity' ).slider( 'value', this.value );
        $('.curent').children(':nth-child(4)').css('opacity',this.value);
        var saveId = $('.curent').attr('id');
        localStorage.setItem(saveId+'Opacity',$('.curent').children(':nth-child(4)').css('opacity'));
    });
    $(document).on('mousedown', '.drag', function () {
        var opac = $(this).children(':nth-child(4)').css('opacity');
        $( '#text-opacity' ).val(opac);
        $( '#slider-opacity' ).slider({ value: opac });
    });
    $( '.drag' ).each(function(){//'p[id^="draggable-"]'
        var getId = $( this ).attr('id');
        var values = localStorage.getItem(getId+'Opacity');
        $('#'+getId).children(':nth-child(4)').css('opacity',values);
    });
});
$(function() {
    /**
    * CSS change, save and load
    * Rotate transform: rotate(30deg);
    **/
    $( '#slider-rotation' ).slider({
        orientation: 'vertical',
        range: 'min',
        min: -360,
        max: 360,
        value: 0,
        step: 1,
        slide: function( event, ui ) {
            $( '#text-rotation' ).val( ui.value );
            //
            $('.curent').css('transform','rotate('+ui.value+'deg)');
            var saveId = $('.curent').attr('id');
            localStorage.setItem(saveId+'Transform',$('.curent').css('transform'));
        }
    });
    $( '#text-rotation' ).val( $( '#slider-rotation' ).slider( 'value' ) );
    $(document).on('keyup', '#text-rotation', function (event) {
        $( '#slider-rotation' ).slider( 'value', this.value );
        $('.curent').css('transform','rotate('+this.value+'deg)');
        var saveId = $('.curent').attr('id');
        localStorage.setItem(saveId+'Transform',$('.curent').css('transform'));
    });
    $(document).on('mousedown', '.drag', function () {
        var rot = $(this).css('transform');
        var rot = getRotationDegrees($(this));
        $( '#text-rotation' ).val(rot);
        $( '#slider-rotation' ).slider({ value: rot });
    });
    $( '.drag' ).each(function(){//'p[id^="draggable-"]'
        var getId = $( this ).attr('id');
        var values = localStorage.getItem(getId+'Transform');
        $('#'+getId).css('transform',values);
    });
});
$(function(){
    /**
    * Position Top
    **/
    $("#slider-top").slider({
        orientation: "vertical",
        range: "min",
        min: 0,
        max: funTopMax(),
        value: 0,
        step: 1,
        slide: function( event, ui ) {
            var yPos = funTopMax()-ui.value;
            $('#text-top-pixel').val(yPos);
            //
            $('.curent').css('top',yPos+'px');
            var id = $( '.curent' ).attr('id').slice(-1);
            localStorage.setItem('draggableTop'+id, yPos);
            //
            //var pPos = 
            var prTop = funProcent(yPos, funTopMax());
            $('#text-top-procent').val(prTop);
        },
    });
    $( "#text-top-pixel" ).val( $( "#slider-top" ).slider( "value" ) );
    $(document).on('keyup', '#text-top-pixel', function (event) {
        var yPos = funTopMax()-this.value;
        $( "#slider-top" ).slider( "value", yPos );
        $('.curent').css('top',this.value+'px');
        var id = $( '.curent' ).attr('id').slice(-1);
        localStorage.setItem('draggableTop'+id, this.value);
        //
        var prTop = funProcent(this.value, funTopMax());
        $('#text-top-procent').val(prTop);
    });
    $(document).on('keyup', '#text-top-procent', function (event) {
        var prTop = funProcentBack(this.value, funTopMax());
        var prTopSl = funTopMax() - prTop;
        $( "#slider-top" ).slider( "value", prTopSl );
        $('.curent').css('top',prTop+'px');
        var id = $( '.curent' ).attr('id').slice(-1);
        localStorage.setItem('draggableTop'+id, prTop);
        //
        //var prTop2 = funProcentBack(prTop, funTopMax());
        $('#text-top-pixel').val(prTop);
    });
    $(document).on('mousedown', '.drag', function () {
        var pTop = $(this).css('top');
        var pTop = parseInt(pTop);
        $( '#text-top-pixel' ).val(pTop);
        var yPos = funTopMax()-pTop;
        $( '#slider-top' ).slider({ value: yPos });
        //
        var prTop = funProcent(pTop, funTopMax());
        $('#text-top-procent').val(prTop);
    });
    /**
    * Position Left
    **/
    $("#slider-left").slider({
        orientation: "horizontal",
        range: "min",
        min: 0,
        max: funLeftMax(),
        value: 0,
        step: 1,
        slide: function( event, ui ) {
            $('#text-left-pixel').val(ui.value);
            //
            $('.curent').css('left',ui.value+'px');
            var id = $( '.curent' ).attr('id').slice(-1);
            localStorage.setItem('draggableLeft'+id, ui.value);
            //
            var prLeft = funProcent(ui.value, funLeftMax());
            $('#text-left-procent').val(prLeft);
            
        }
    });
    $( "#text-left-pixel" ).val( $( "#slider-left" ).slider( "value" ) );
    $(document).on('keyup', '#text-left-pixel', function (event) {
        $( "#slider-left" ).slider( "value", this.value );
        $('.curent').css('left',this.value+'px');
        var id = $( '.curent' ).attr('id').slice(-1);
        localStorage.setItem('draggableLeft'+id, this.value);
        //
        var prLeft = funProcent(this.value, funLeftMax());
        $('#text-left-procent').val(prLeft);
    });
    $(document).on('keyup', '#text-left-procent', function (event) {
        var prLeft = funProcentBack(this.value, funLeftMax());
        $( "#slider-left" ).slider( "value", prLeft );
        $('.curent').css('left',prLeft+'px');
        var id = $( '.curent' ).attr('id').slice(-1);
        localStorage.setItem('draggableLeft'+id, prLeft);
        //
        //var prLeft2 = funProcentBack(prLeft, funLeftMax());
        $('#text-left-pixel').val(prLeft);
    });
    $(document).on('mousedown', '.drag', function () {
        var pLeft = $(this).css('left');
        var pLeft = parseInt(pLeft);
        $( '#text-left-pixel' ).val(pLeft);
        $( '#slider-left' ).slider({ value: pLeft });
        //
        var prLeft = funProcent(pLeft, funLeftMax());
        $('#text-left-procent').val(prLeft);
    });
});
$(function(){
    /**
    * Size Height
    **/
    $("#slider-height").slider({
        orientation: "vertical",
        range: "min",
        min: 0,
        max: funHeightMax(),
        value: 0,
        step: 1,
        slide: function( event, ui ) {
            var yPos = funHeightMax()-ui.value;
            $('#text-height-pixel').val(yPos);
            //
            $('.curent').css('height',yPos+'px');
            var id = $( '.curent' ).attr('id').slice(-1);
            localStorage.setItem('resizableHeight'+id, yPos);
            //
            var prHeight = funProcent(yPos, funHeightMax());
            $('#text-height-procent').val(prHeight);
        },
    });
    $( "#text-height-pixel" ).val( $( "#slider-height" ).slider( "value" ) );
    $(document).on('keyup', '#text-height-pixel', function (event) {
        var yPos = funHeightMax()-this.value;
        $( "#slider-height" ).slider( "value", yPos );
        $('.curent').css('height',this.value+'px');
        var id = $( '.curent' ).attr('id').slice(-1);
        localStorage.setItem('resizableHeight'+id, this.value);
        //
        var prTop = funProcent(this.value, funHeightMax());
        $('#text-height-procent').val(prTop);
    });
    $(document).on('keyup', '#text-height-procent', function (event) {
        var prHeight = funProcentBack(this.value, funHeightMax());
        var prHeightSl = funHeightMax() - prHeight;
        $( "#slider-height" ).slider( "value", prHeightSl );
        $('.curent').css('height',prHeight+'px');
        var id = $( '.curent' ).attr('id').slice(-1);
        localStorage.setItem('resizableHeight'+id, prHeight);
        //
        $('#text-height-pixel').val(prHeight);
    });
    $(document).on('mousedown', '.drag', function () {
        var pTop = $(this).css('height');
        var pTop = parseInt(pTop);
        $( '#text-height-pixel' ).val(pTop);
        var yPos = funHeightMax()-pTop;
        $( '#slider-height' ).slider({ value: yPos });
        //
        var prTop = funProcent(pTop, funHeightMax());
        $('#text-height-procent').val(prTop);
    });
    /**
    * Size Width
    **/
    $("#slider-width").slider({
        orientation: "horizontal",
        range: "min",
        min: 0,
        max: funWidthMax(),
        value: 0,
        step: 1,
        slide: function( event, ui ) {
            $('#text-width-pixel').val(ui.value);
            //
            $('.curent').css('width',ui.value+'px');
            var id = $( '.curent' ).attr('id').slice(-1);
            localStorage.setItem('resizableWidth'+id, ui.value);
            //
            var prWidth = funProcent(ui.value, funWidthMax());
            $('#text-width-procent').val(prWidth);
        }
    });
    $( "#text-width-pixel" ).val( $( "#slider-width" ).slider( "value" ) );
    $(document).on('keyup', '#text-width-pixel', function (event) {
        $( "#slider-width" ).slider( "value", this.value );
        $('.curent').css('width',this.value+'px');
        var id = $( '.curent' ).attr('id').slice(-1);
        localStorage.setItem('resizableWidth'+id, this.value);
        //
        var prWidth = funProcent(this.value, funWidthMax());
        $('#text-width-procent').val(prWidth);

    });
    $(document).on('keyup', '#text-width-procent', function (event) {
        var prWidth = funProcentBack(this.value, funHeightMax());
        $( "#slider-width" ).slider( "value", prWidth );
        $('.curent').css('width',prWidth+'px');
        var id = $( '.curent' ).attr('id').slice(-1);
        localStorage.setItem('resizableWidth'+id, prWidth);
        //
        $('#text-width-pixel').val(prWidth);
    });
    $(document).on('mousedown', '.drag', function () {
        var pLeft = $(this).css('width');
        var pLeft = parseInt(pLeft);
        $( '#text-width-pixel' ).val(pLeft);
        $( '#slider-width' ).slider({ value: pLeft });
        //
        var prLeft = funProcent(pLeft, funHeightMax());
        $('#text-width-procent').val(prLeft);
    });
});
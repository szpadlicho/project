var funTopMax = function(){
    var h = $( '#image' ).height();
    return h;
}
var funLeftMax = function(){
    var w = $( '#image' ).width();
    return w;
}
var funHeightMax = function(){
    var h = $( '#image' ).height();
    return h;
}
var funWidthMax = function(){
    var w = $( '#image' ).width();
    return w;
}
var funProcent = function(val, value){
    var prcent = ((val / value) * 100).toFixed(0);
    return prcent;
}
var funProcentBack = function(val, value){
    var prcent = ((val / 100) * value).toFixed(0);
    return prcent;
}
$(document).ready(function(){
    /**
    * Dynamically add elements to site and save it in array
    * Save array with element to cookie
    * Remove chosen element from site and array
    **/
    //var topMax = 660; // x2 jest w projekcie w width jescze
    var setCookie = function(){
        var jsonStr = JSON.stringify(arr);//converting array into json string   
        $.cookie('arr', jsonStr);//storing it in a cookie
    };
    var getCookie = function() {
        var empString = $.cookie('arr');//retrieving data from cookie
        var empArr = $.parseJSON(empString);//converting "empString" to an array.
        return empArr;
    };
    var elements = function(){
        $( '.drag' ).each(function(index){
            var id = $(this).attr('id').slice(-1);
            $( '#draggable-'+id ).draggable({
                containment: "parent", 
                drag: function(event, ui){
                    //var offset = $(this).offset();
                    //var xPos = offset.left.toFixed(0);// number.toFixed(2) - leaves only two spots after comma
                    //var yPos = offset.top.toFixed(0);// number.toFixed(2) - leaves only two spots after comma
                    var xPos = ui.position.left;
                    var yPos = ui.position.top;
                    $('#text-left-pixel').val(xPos);
                    $('#slider-left').slider( "value", xPos );
                    $('#text-top-pixel').val(yPos);
                    var yPos2 = funTopMax() - yPos;
                    $('#slider-top').slider( "value", yPos2 );
                    //
                    var prLeft = funProcent(xPos, funLeftMax());
                    $('#text-left-procent').val(prLeft);
                    var prTop = funProcent(yPos, funTopMax());
                    $('#text-top-procent').val(prTop);
                },
                stop: function(event, ui) {
                    $.cookie('draggableLeft'+id, ui.position.left);
                    $.cookie('draggableTop'+id, ui.position.top);
                    //alert(ui.position.left);
                }
            });
            $( '#draggable-'+id ).css({left : parseInt($.cookie('draggableLeft'+id)), top : parseInt($.cookie('draggableTop'+id))});//, 'background-color':'blue'
        });
    };
    /**
    * resize function init and save
    **/
    var resize = function(){
        $( '.drag' ).each(function(index){
            var id = $(this).attr('id').slice(-1);
            $( '#draggable-'+id ).resizable({
                containment: "parent", 
                resize: function( event, ui ) {
                    $('#text-width-pixel').val(ui.size.width.toFixed(0));
                    $('#slider-width').slider( "value", ui.size.width );
                    $('#text-height-pixel').val(ui.size.height.toFixed(0));
                    var yPos = funTopMax() - ui.size.height;
                    $('#slider-height').slider( "value", yPos );
                },
                stop: function(event, ui) {
                    $.cookie('resizableWidth'+id, ui.size.width);
                    $.cookie('resizableHeight'+id, ui.size.height);
                }
            });
            $( '#draggable-'+id ).css({width : parseInt($.cookie('resizableWidth'+id)), height : parseInt($.cookie('resizableHeight'+id))});
        });
        $( '#tool-11' ).append( 'lol' );
    };
    /**
    * initiate arrays and cookies
    **/
    var empArr = [];
    var arr = [];
    if ( $.cookie('arr') != undefined ) {
        var empArr = getCookie();
    } else {
        setCookie();
    };
    if ( empArr.length > 0) {
        var arr = empArr;
    };
    var empArr = getCookie();
    $( '#middle' ).append(empArr);
    elements();
    resize();
    $( 'input[type="text"]' ).val('0');//reset for procent text box
    //alert(arr);
    /**
    * Button behavior
    **/
    $( '#btnAdd' ).click(function(){
        if ( $.cookie('lastID') != undefined ) {
            //var lastId = $('.drag').last().attr('id').split('-')[1];
            lastId = $.cookie('lastID');
            lastId++;
            $.cookie('lastID', lastId);
        } else {
            var lastId = 0;
            $.cookie('lastID', lastId);
        }
        //var elem = '<p id="draggable-'+lastId+'" class="drag"><button type="button" class="close" >&times;</button><br /><span id="posY'+lastId+'"></span><br /><span id="posX'+lastId+'"></span><br />id : '+lastId+'</p>';
        var elem = '<p id="draggable-'+lastId+'" class="drag"><button class="close" type="button" >&times;</button><span class="number">id : '+lastId+'</span><br /><span id="toText'+lastId+'" class="toText">Some Text</span></p>';
        $( '#middle' ).append(elem);
        arr.push(elem);
        setCookie();
        elements()
        resize();
    });
    $( '#btnReset' ).click(function(){
        var cookies = $.cookie();
        for(var cookie in cookies) {
           $.removeCookie(cookie);
        }
        location.reload();
    });
    $(document).on('mousedown', '.drag', function () { //work on dynamic elements.mousedown()
        $( '.drag' ).removeClass( 'curent' );
        $( this ).addClass( 'curent' );
    });
    $( '#picture' ).click(function(){
        //$( '.curent' ).removeClass( 'curent' );
    });
    $(document).on('click', '.close', function () { //work on dynamic elements
        //var idi = $(this).parents('p').attr('id').slice(-1);
        var idi = $(this).parents('p').attr('id').split('-')[1];
        $(this).parents('p').remove();
        arr.splice(idi, 1,'');
        setCookie();
    });
    /**
    * resize setup 
    * when page is load disable resizable function
    * enable when click button menu
    **/
    var resizeCheck = function(what){
        if (! $( what ).hasClass( 'active' ) ) {
            $( '.drag' ).resizable( 'disable' );
        };
        if ( $( what ).hasClass( 'active' ) ) {
            $( '.drag' ).resizable( 'enable' );
        };
    }
    //$( '#resize' ).removeClass( 'active' ); // Uncomment to active disable resize at start
    $( '#resize' ).addClass( 'active' );
    $( '#resize' ).click(function(){
        if ( $( this ).hasClass( 'active' ) ) {
            $( this ).removeClass( 'active' );
        } else {
            $( this ).addClass( 'active' );
        };
    });
    resizeCheck( '#resize' );
    $( '#resize' ).click(function(){
        resizeCheck(this);
    });
    
});
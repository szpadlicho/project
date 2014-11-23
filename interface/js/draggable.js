$(document).ready(function(){
    /**
        * Dynamically add elements to site and save it in array
        * Save array with element to cookie
        * Remove chosen element from site and array
    **/
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
                drag: function(){
                    var offset = $(this).offset();
                    var xPos = offset.left.toFixed(0);// number.toFixed(2) - leaves only two spots after comma
                    var yPos = offset.top.toFixed(0);// number.toFixed(2) - leaves only two spots after comma
                    $('#posX'+id).text('Left: ' + xPos);
                    $('#posY'+id).text('Top: ' + yPos);
                },
                stop: function(event, ui) {
                    $.cookie('draggableLeft'+id, ui.position.left);
                    $.cookie('draggableTop'+id, ui.position.top);
                }
            });
            $( '#draggable-'+id ).css({left : parseInt($.cookie('draggableLeft'+id)), top : parseInt($.cookie('draggableTop'+id))});//, 'background-color':'blue'
        });
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
        var elem = '<p id="draggable-'+lastId+'" class="drag"><button type="button" class="close" >&times;</button><br /><span id="posY'+lastId+'"></span><br /><span id="posX'+lastId+'"></span><br />id : '+lastId+'</p>';
        $( '#middle' ).append(elem);
        arr.push(elem);
        setCookie();
        elements();
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
    $(document).on('click', '.close', function () { //work on dynamic elements
        //var idi = $(this).parents('p').attr('id').slice(-1);
        var idi = $(this).parents('p').attr('id').split('-')[1];
        $(this).parents('p').remove();
        arr.splice(idi, 1,'');
        //alert(arr);
        setCookie();
    });
});
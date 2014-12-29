var funTopMax = function(){
    var h = $( '#image' ).height();
    return h;
};
var funLeftMax = function(){
    var w = $( '#image' ).width();
    return w;
};
var funHeightMax = function(){
    var h = $( '#image' ).height();
    return h;
};
var funWidthMax = function(){
    var w = $( '#image' ).width();
    return w;
};
var funProcent = function(val, value){
    var prcent = ((val / value) * 100).toFixed(0);
    return prcent;
};
var funProcentBack = function(val, value){
    var prcent = ((val / 100) * value).toFixed(0);
    return prcent;
};
$(document).ready(function(){
    /**
    * Dynamically add elements to site and save it in array
    * Save array with element to cookie
    * Remove chosen element from site and array
    **/
    var setStorageItem = function(){
        var jsonStr = JSON.stringify(arr);//converting array into json string   
        localStorage.setItem('arr', jsonStr);//storing it in a cookie
    };
    var getStorageItem = function() {
        var empString = localStorage.getItem('arr');//retrieving data from cookie
        var empArr = $.parseJSON(empString);//converting "empString" to an array.
        return empArr;
    };
    var elements = function(){
        $( '.drag' ).each(function(index){
            var id = $(this).attr('id').slice(-1);
            $( '#draggable-'+id ).draggable({
                containment: "parent", 
                drag: function(event, ui){
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
                    localStorage.setItem('draggableLeft'+id, ui.position.left);
                    localStorage.setItem('draggableTop'+id, ui.position.top);
                }
            });
            $( '#draggable-'+id ).css({left : parseInt(localStorage.getItem('draggableLeft'+id)), top : parseInt(localStorage.getItem('draggableTop'+id))});//, 'background-color':'blue'
        });
    };
    /**
    * resize function init and save
    **/
    var resize = function(){
        $( '.drag' ).each(function(index){
            var id = $(this).attr('id').slice(-1);
            var now = $(this).width();
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
                    localStorage.setItem('resizableWidth'+id, ui.size.width);
                    localStorage.setItem('resizableHeight'+id, ui.size.height);
                }
            });
            $( '#draggable-'+id ).css({width : parseInt(localStorage.getItem('resizableWidth'+id)), height : parseInt(localStorage.getItem('resizableHeight'+id))});
        });
    };
    /**
    * initiate arrays and cookies
    **/
    var empArr = [];
    var arr = [];
    if ( localStorage.getItem('arr') != null ) {
        var empArr = getStorageItem();
    } else {
        setStorageItem();
    };
    if ( empArr.length > 0) {
        var arr = empArr;
    };
    var empArr = getStorageItem();
    $( '#middle' ).append(empArr);
    elements();
    resize();
    $( 'input[type="text"]' ).val('0');//reset for procent text box
    $( '#create-form-rgb input[type="text"]' ).val('255');//for create-form blank
    $( '#create-form-width' ).val('1024');//for create-form blank
    $( '#create-form-height' ).val('768');//for create-form blank
    /**
    * Button behavior
    **/
    $( '#btnAdd' ).click(function(){
        if ( localStorage.getItem('lastID') != null ) { 
            //var lastId = $('.drag').last().attr('id').split('-')[1];
            lastId = localStorage.getItem('lastID');
            lastId++;
            localStorage.setItem('lastID', lastId);
        } else {
            var lastId = 0;
            localStorage.setItem('lastID', lastId);
        };
        var elem = '<p id="draggable-'+lastId+'" class="drag"><button class="close" type="button" >&times;</button><span class="number">id : '+lastId+'</span><span id="toText'+lastId+'" class="toText">Dutedrakus</span></p>';
        $( '#middle' ).append(elem);
        arr.push(elem);
        setStorageItem();
        elements()
        resize();
        $( '.drag' ).removeClass( 'curent' );
        $( '.drag' ).last().addClass( 'curent' );
        $('#txt').val( $( '.curent' ).children( '.toText' ).text() );
    });
    $( '#btnReset' ).click(function(){
        localStorage.clear();
        $.ajax({
            type: 'POST',
            url: 'php/delete.php',
            data: { reset: 'reset' }, 
            cache: false,
            dataType: 'text',
            success: function(data){
                //console.log(data);
                location.reload();
            }
        });
        //location.reload();
    });
    $(document).on('mousedown', '.drag', function () {
        $( '.drag' ).removeClass( 'curent' );
        $( this ).addClass( 'curent' );
        $( this ).css( 'cursor', 'grabbing' );
    });
    $(document).on('mouseup', '.drag', function () {
        $( this ).css( 'cursor', 'grab' );
    });
    $( '#picture' ).click(function(){
        //$( '.curent' ).removeClass( 'curent' );
    });
    $(document).on('click', '.close', function () {
        //var idi = $(this).parents('p').attr('id').slice(-1);
        var idi = $(this).parents('p').attr('id').split('-')[1];
        $(this).parents('p').remove();
        arr.splice(idi, 1,'');
        setStorageItem();
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
    };
    //$( '#resize' ).removeClass( 'active' ); // Uncomment to active disable resize at start
    $( '#resize' ).addClass( 'active' );
    $( '#resize' ).click(function(){
        if ( $( this ).hasClass( 'active' ) ) {
            $( this ).removeClass( 'active' );
            //
            localStorage.setItem('drag','drag');
        } else {
            $( this ).addClass( 'active' );
            //
            localStorage.removeItem('drag');
        };
        resizeCheck(this);
    });
    resizeCheck( '#resize' );
    // Remember stage resize
    var strep = localStorage.getItem('drag');
    if ( strep != null && strep != '') {
        $( '.drag' ).resizable( 'disable' );
        $( '#resize' ).removeClass( 'active' );
    }
    /**
    * Preview button
    * when page is load disable preview
    * enable when click button menu
    **/
    var previewCheck = function(what){
        if (! $( what ).hasClass( 'active' ) ) {
            $( '#show' ).css( 'display', 'none');
        };
        if ( $( what ).hasClass( 'active' ) ) {
            $( '#show' ).css( 'display', 'block');
        };
    };
    previewCheck( '#preview' );
    $( '#show' ).css( 'display', 'none');// Setup what state has to have at the beginning
    //$( '#show' ).css( 'display', 'block');// Setup what state has to have at the beginning
    $( '#preview' ).click(function(){
        if ( $( this ).hasClass( 'active' ) ) {
            $( this ).removeClass( 'active' );
            //
            var id = $( this ).prop( 'id' );
            localStorage.removeItem(id);
        } else {
            $( this ).addClass( 'active' );
            //
            var id = $( this ).prop( 'id' );
            localStorage.setItem(id, id);
        };
        previewCheck(this);
    });
    // Remember stage preview
    $( '#preview' ).each(function(e){
        var id = $( this ).prop( 'id' );
        var stre = localStorage.getItem( id );
        if ( stre != null && stre != '') {
            $( '#show' ).css( 'display', 'block');
            $( '#preview' ).addClass( 'active' );
        }
    });
    //localStorage.setItem();
    //localStorage.getItem();
    //localStorage.removeItem();
});
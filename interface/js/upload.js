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
            $("#info").text('Font upload fail');
        });
    });
    $( '#add-font' ).click(function(){
        $( '#files' ).click();
    });
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
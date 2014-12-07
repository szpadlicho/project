$(function() {
    $( '#download-files' ).click(function(){
        setTimeout(function(){
            window.open("php/download.php?file=../data/picture/<?php echo $_COOKIE['PHPSESSID']; ?>-preview.<?php echo $ext; ?>");
        }, 500);
    });
});
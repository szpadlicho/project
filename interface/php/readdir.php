<?php
//$name = session_id();
$name = $_COOKIE['PHPSESSID'];
$dir = glob('../data/picture/'.$name.'.*');
foreach ($dir as $filename) {
    //echo "$filename size " . filesize($filename) . "<br />";
    //echo basename($filename). '<br />';
    echo $ext = pathinfo($filename, PATHINFO_EXTENSION). '<br />';
}
?>

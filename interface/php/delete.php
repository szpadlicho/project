<?php

if (isset($_POST['reset'])) {
    $name = $_COOKIE['PHPSESSID'];
    $dir = glob('../data/picture/'.$name.'.*');
    //var_dump($dir);
    //$ext = pathinfo($dir[0], PATHINFO_EXTENSION);
    if($dir){
        foreach ($dir as $filename) {
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
        }
    } else {
        $ext = 'jpg';
    }
    @unlink($picture = '../data/picture/'.$_COOKIE['PHPSESSID'].'-preview.'.$ext);
    @unlink($picture = '../data/picture/'.$_COOKIE['PHPSESSID'].'.'.$ext);
}
?>
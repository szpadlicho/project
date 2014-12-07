<?php
$x = $_POST['width'];
$y = $_POST['height'];
$r = $_POST['r'];
$g = $_POST['g'];
$b = $_POST['b'];
$handle = ImageCreate($x, $y);

$path = '../data/picture/'.$_COOKIE['PHPSESSID'];
foreach (glob($path.'*.*') as $filename) {
    unlink($filename);
}

if ($_POST['transparent'] === 'true') {
    //setting completely transparent color
    ImageSaveAlpha($handle, true);
    $color = ImageColorAllocateAlpha($handle, $r, $g, $b, 127);
    ImageFill($handle, 0, 0, $color);
    ImagePNG($handle, '../data/picture/'.$_COOKIE['PHPSESSID'].'.png');
    echo $_POST['transparent'];
} else {
    $color=ImageColorAllocate($handle, $r, $g, $b);
    ImageFill($handle, 0, 0, $color);
    ImageJPEG($handle, '../data/picture/'.$_COOKIE['PHPSESSID'].'.jpg');
    echo $_POST['transparent'];
}
//Header("Content-type: image/jpeg");
//ImageJPEG($handle);

ImageDestroy($handle);


/*
$handle = imagecreatefromjpeg($picture);
$fcolor = imagecolorallocatealpha($handle, $r, $g, $b, $alpha);
imagettftext($handle, $fsize, $rotate, $y, $x, $fcolor, $font, $inscription);
imagejpeg($handle, '../data/picture/'.$_COOKIE['PHPSESSID'].'-preview.jpg');
imagedestroy($handle);
*/

//echo "<div id='preview-div'><img id='preview-img' width='".$workW."px' src=data/picture/".$_COOKIE['PHPSESSID']."-preview.jpg"."?mtime=".@filemtime($fileimg)." alt='Aby zacząć edycje prześlij obraz'/></div><br />\n";//@filemtime($fileimg) thanks this image is always refresh
?>
<?php
//ini_set('display_errors',0);
$name = $_COOKIE['PHPSESSID'];
$dir = glob('../data/picture/'.$name.'.*');
//var_dump($dir);
//$ext = pathinfo($dir[0], PATHINFO_EXTENSION);
foreach ($dir as $filename) {
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
}
//echo $ext;
function __getProcentFromNumber($number_pices, $number_all)
{
    /**
    * Obliczanie jakim procentem jednej liczby jest druga liczba
    **/
    $k = $number_pices/$number_all;
    $j = $k*100;
    return $j;
}
function __getNumberFromProcent($number_procent, $number_from)
{
    /**
    * Obliczanie procentu danej liczby
    **/
    $n = $number_procent/100;
    $m = $n*$number_from;
    return $m;
}
if (file_exists('../data/picture/'.$_COOKIE['PHPSESSID'].'-preview.'.$ext)) {
    @unlink($picture = '../data/picture/'.$_COOKIE['PHPSESSID'].'-preview.'.$ext);
};
$picture = '../data/picture/'.$_COOKIE['PHPSESSID'].'.'.$ext;
list($width, $height, $type, $attr) = getimagesize($picture); // get file size and type to array

$data = $_POST['data'];
$count = count($data['arry']);
for ($i = 0; $i < $count; $i++) {
    if (file_exists('../data/picture/'.$_COOKIE['PHPSESSID'].'-preview.'.$ext)) {
        $picture = '../data/picture/'.$_COOKIE['PHPSESSID'].'-preview.'.$ext;
    };
    /**
    * Color
    **/
    $color = $data['arry'][$i]['color'];// here color set
    $color = str_replace(array('rgb(', ')', ' '), '', $color);
    $rgb = explode(',', $color);
    $r = $rgb[0];
    $g = $rgb[1];
    $b = $rgb[2];
    /**
    * Opacity
    **/
    $opacity = $data['arry'][$i]['opacity'];// here opacity set
    $j = __getProcentFromNumber($opacity, 1);
    $m = __getNumberFromProcent($j, 127);
    $alpha = 127-$m;// 0 to 127
    /**
    * Font-family
    **/
    $ffname = $data['arry'][$i]['family'];// here font family set
    $dir = glob('../data/fonts/'.$ffname.'.*');
    $ext4 = pathinfo($dir[0], PATHINFO_EXTENSION);
    $font = '../data/fonts/'.$ffname.'.'.$ext4;
    /**
    * Font size
    **/
    $size = $data['arry'][$i]['size'];// here font size set
    $int = intval($size);
    $workH = $data['arry'][$i]['workH'];// here workH set
    $workW = $data['arry'][$i]['workW'];// here workW set
    $h = __getProcentFromNumber($int, $workH);
    $rsize = __getNumberFromProcent($h, $height);
    $psize = __getNumberFromProcent(24, $rsize);
    $fsize = $rsize - $psize;
    /**
    * Text
    **/
    $inscription = $data['arry'][$i]['value'];// here set value
    /**
    * Rotate
    **/
    $rotate = $data['arry'][$i]['rotate'];// here set rotate
    /**
    * Top position
    * Top + font size = Top in GD
    **/
    $top = $data['arry'][$i]['top']+$size+8;// here set top
    $th = __getProcentFromNumber($top, $workH);//check
    $rx = __getNumberFromProcent($th, $height);//check
    $px = __getNumberFromProcent(24, $rx);
    $x = $rx;
    /**
    * Left position
    **/
    $left = $data['arry'][$i]['left'] - 2;// here set left
    $lw = __getProcentFromNumber($left, $workW);
    $y = __getNumberFromProcent($lw, $width);
    //var_dump($lw);
    /**
    * Create picture
    **/
    if ($ext == 'jpg') {
        $handle = imagecreatefromJPEG($picture);
        $fcolor = imagecolorallocatealpha($handle, $r, $g, $b, $alpha);
        imagettftext($handle, $fsize, $rotate, $y, $x, $fcolor, $font, $inscription);
        imagejpeg($handle, '../data/picture/'.$_COOKIE['PHPSESSID'].'-preview.'.$ext);
        imagedestroy($handle);
    }
    if ($ext == 'png') {
        $handle = imagecreatefromPNG($picture);
        imagesavealpha($handle, true);
        $fcolor = imagecolorallocatealpha($handle, $r, $g, $b, $alpha);
        imagettftext($handle, $fsize, $rotate, $y, $x, $fcolor, $font, $inscription);
        imagePNG($handle, '../data/picture/'.$_COOKIE['PHPSESSID'].'-preview.'.$ext);
        imagedestroy($handle);
    }
    if ($ext == 'gif') {
        $handle = imagecreatefromGIF($picture);
        imagesavealpha($handle, true);
        $fcolor = imagecolorallocatealpha($handle, $r, $g, $b, $alpha);
        imagettftext($handle, $fsize, $rotate, $y, $x, $fcolor, $font, $inscription);
        imageGIF($handle, '../data/picture/'.$_COOKIE['PHPSESSID'].'-preview.'.$ext);
        imagedestroy($handle);
    }
}
echo "<div id='preview-div'><img id='preview-img' width='".($workW - 18)."px' src=data/picture/".$_COOKIE['PHPSESSID']."-preview.".$ext."?mtime=".@filemtime($fileimg)." alt='Aby zacząć edycje prześlij obraz'/></div><br />\n";//@filemtime($fileimg) thanks this image is always refresh
?>
<?php
// $data = $_POST['data'];
// $count = count($data['arry']);
// for ($i = 0; $i < $count; $i++) {
    // echo $data['arry'][$i]['top'].'<br />';
    // echo $data['arry'][$i]['left'].'<br />';
    // echo $data['arry'][$i]['rotate'].'<br />';
    // echo $data['arry'][$i]['size'].'<br />';
    // echo $data['arry'][$i]['color'].'<br />';
    // echo $data['arry'][$i]['opacity'].'<br />';
    // echo $data['arry'][$i]['value'].'<br />';
    // echo $data['arry'][$i]['family'].'<br />';
    // echo $data['arry'][$i]['workH'].'<br />';
    // echo $data['arry'][$i]['workW'].'<br />';
    // echo '--------<br />';
// };
?>
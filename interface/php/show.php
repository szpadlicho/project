<?php
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
if (file_exists('../data/picture/'.$_COOKIE['PHPSESSID'].'-preview.jpg')) {
    @unlink($picture = '../data/picture/'.$_COOKIE['PHPSESSID'].'-preview.jpg');
};
$picture = '../data/picture/'.$_COOKIE['PHPSESSID'].'.jpg';
list($width, $height, $type, $attr) = getimagesize($picture); // get file size and type to array

$data = $_POST['data'];
$count = count($data['arry']);
for ($i = 0; $i < $count; $i++) {
    if (file_exists('../data/picture/'.$_COOKIE['PHPSESSID'].'-preview.jpg')) {
        $picture = '../data/picture/'.$_COOKIE['PHPSESSID'].'-preview.jpg';
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
    $font = '../data/fonts/'.$ffname.'.otf';
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
    //$fsize = $rsize - 47;//41 - 21
    //$hh = __getProcentFromNumber(47, $rsize);
    //var_dump($hh);//24.6%
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
    //$top = $data['arry'][$i]['top'];// here set top
    //var_dump($top);
    $th = __getProcentFromNumber($top, $workH);//check
    $rx = __getNumberFromProcent($th, $height);//check
    $px = __getNumberFromProcent(24, $rx);
    $x = $rx;
    //$x = ($rx - $px);
    //$hh = __getProcentFromNumber(208, $x);
    //var_dump($hh);//
    //$x = $x - 47;
    //echo $inscription;
    //var_dump($th);
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
    $handle = imagecreatefromjpeg($picture);
    $fcolor = imagecolorallocatealpha($handle, $r, $g, $b, $alpha);
    imagettftext($handle, $fsize, $rotate, $y, $x, $fcolor, $font, $inscription);
    imagejpeg($handle, '../data/picture/'.$_COOKIE['PHPSESSID'].'-preview.jpg');
    imagedestroy($handle);
}
echo "<div id='preview-div'><img id='preview-img' width='".$workW."px' src=data/picture/".$_COOKIE['PHPSESSID']."-preview.jpg"."?mtime=".@filemtime($fileimg)." alt='Aby zacząć edycje prześlij obraz'/></div><br />\n";//@filemtime($fileimg) thanks this image is always refresh
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
<?php
// // fill an array with all items from a directory
// $handle = opendir('../data/');
// while (false !== ($file = readdir($handle))) {
        // $files[] = $file;
// }
// var_dump($files);
// closedir($handle); 
?>
<?php
function __getProcentFromNumber($number_pices, $number_all)//Obliczanie jakim procentem jednej liczby jest druga liczba
{
    $k = $number_pices/$number_all;
    $j = $k*100;
    return $j;
}
function __getNumberFromProcent($number_procent, $number_from)// Obliczanie procentu danej liczby
{
    $n = $number_procent/100;
    $m = $n*$number_from;
    return $m;
}
$data = $_POST['data'];
$count = count($data['arry']);
//---------------------------------//
unlink($picture = '../data/picture/'.$_COOKIE['PHPSESSID'].'-preview.jpg');
$picture = '../data/picture/'.$_COOKIE['PHPSESSID'].'.jpg';

list($width, $height, $type, $attr) = getimagesize($picture); // pobieram wymiary x i y obrazy , typ i atrybuty

// foreach start
for ($i = 0; $i < $count; $i++) {
    if (file_exists('../data/picture/'.$_COOKIE['PHPSESSID'].'-preview.jpg')) {
        $picture = '../data/picture/'.$_COOKIE['PHPSESSID'].'-preview.jpg';
    }
    $color = $data['arry'][$i]['color'];// here color set
    $color = str_replace(array('rgb(', ')', ' '), '', $color);
    $rgb = explode(',', $color);
    //var_dump($rgb);
    $r = $rgb[0];
    $g = $rgb[1];
    $b = $rgb[2];

    $opacity = 1;// here opacity set
    $j = __getProcentFromNumber($opacity, 1);
    //var_dump($j);
    $m = __getNumberFromProcent($j, 127);
    //var_dump($m);
    $alpha = 127-$m;// 0 to 127
    //var_dump($alpha);

    $ffname = $data['arry'][$i]['family'];// here font family set
    $font = '../data/fonts/'.$ffname.'.otf';
    /**|**/
    $size = $data['arry'][$i]['size'];// here font size set
    //var_dump($size);
    $int = intval($size);
    $workH = $data['arry'][$i]['workH'];// here workH set
    $workW = $data['arry'][$i]['workW'];// here workW set
    //var_dump($int);
    $h = __getProcentFromNumber($int, $workH);
    //var_dump($h);
    $rsize = __getNumberFromProcent($h, $height);
    //var_dump($rsize);
    $fsize = $rsize;
    $fsize = $fsize - 41;
    /**|**/
    $inscription = $data['arry'][$i]['value'];// here set value

    $rotate = $data['arry'][$i]['rotate'];// here set rotate

    $top = $data['arry'][$i]['top']+$size;// here set top
    $th = __getProcentFromNumber($top, $workH);
    $x = __getNumberFromProcent($th, $height);
    //$x = $x+51;
    //var_dump($x);

    $left = $data['arry'][$i]['left'];// here set left
    $lw = __getProcentFromNumber($left, $workW);
    $y = __getNumberFromProcent($lw, $width);
    //$y = $y +10;
    //var_dump($y);

    $handle = imagecreatefromjpeg($picture);
    $fcolor = imagecolorallocatealpha($handle, $r, $g, $b, $alpha);
    imagettftext($handle, $fsize, $rotate, $y, $x, $fcolor, $font, $inscription);
    imagejpeg($handle, '../data/picture/'.$_COOKIE['PHPSESSID'].'-preview.jpg');
    imagedestroy($handle);
    // foreach end
}
echo "<div id='preview-div'><img id='preview' width='1210' src=data/picture/".$_COOKIE['PHPSESSID']."-preview.jpg"."?mtime=".@filemtime($fileimg)." alt='Aby zacząć edycje prześlij obraz'/></div><br />\n";//dzieki temu wymuszam odswiezanie obrazka
?>
<?php
$data = $_POST['data'];
$count = count($data['arry']);
for ($i = 0; $i < $count; $i++) {
    echo $data['arry'][$i]['top'].'<br />';
    echo $data['arry'][$i]['left'].'<br />';
    echo $data['arry'][$i]['rotate'].'<br />';
    echo $data['arry'][$i]['size'].'<br />';
    echo $data['arry'][$i]['color'].'<br />';
    echo $data['arry'][$i]['opacity'].'<br />';
    echo $data['arry'][$i]['value'].'<br />';
    echo $data['arry'][$i]['family'].'<br />';
    echo $data['arry'][$i]['workH'].'<br />';
    echo $data['arry'][$i]['workW'].'<br />';
    echo '--------<br />';
};
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
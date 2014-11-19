<?php
header('Content-Type: text/html; charset=utf-8');
ini_set('xdebug.var_display_max_depth', -1);
ini_set('xdebug.var_display_max_children', -1);
ini_set('xdebug.var_display_max_data', -1);
//--
$text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel sollicitudin mauris, imperdiet tempor libero. Aliquam vel sodales neque. Aliquam nulla enim, auctor sit amet orci nec, malesuada auctor justo. Sed eu ligula tellus. Maecenas lacinia a lacus vel lobortis. Integer et leo sit amet purus malesuada pellentesque. Ut non libero at magna malesuada tincidunt et ac metus. Fusce eu gravida turpis.

	Fusce vulputate, urna tristique sollicitudin ultrices, nisi eros consectetur tellus, eget tempor elit purus non risus. Nullam porttitor tempus ipsum, non lacinia quam pharetra non. Mauris volutpat arcu dolor, nec posuere ligula ornare eget. Phasellus blandit tortor quam, in consectetur libero malesuada in. Curabitur sed ,lacus malesuada nulla, volutpat fermentum, nec suscipit turpis. Nunc ornare metus vel facilisis condimentum. Curabitur placerat ipsum sit amet turpis. pellentesque aliquet. Cras augue dui, ornare vitae auctor eget, mattis nec lorem. Mauris ornare euismod arcu, et egestas mi sodales ac. Nunc vestibulum sapien ut turpis pulvinar, ac euismod mi facilisis. Morbi volutpat orci nisl, in iaculis, justo lobortis vel. Praesent iaculis arcu urna, in facilisis tellus pharetra id. Etiam at lorem ullamcorper, condimentum ante non, mollis elit.

	Integer feugiat rutrum congue. Vivamus rhoncus elit massa, sit amet dictum ,lorem lacinia quis. Sed eu tempus sem, ut commodo lorem. Phasellus laoreet iaculis odio. Phasellus velit nulla, mollis vel ultricies eget, semper in dui. Aenean blandit euismod dignissim. Vestibulum vitae dui sed sem aliquam consectetur. Aliquam luctus tempus. urna, in pharetra sem ultrices in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur porttitor erat sed risus consequat, ornare vulputate ipsum condimentum. Sed sed libero ac nisl dictum vehicula.

	Ut velit eros, elementum nec massa vitae, viverra pellentesque sem. Etiam feugiat lorem dui, ac porttitor justo placerat nec. Proin non arcu vitae ante gravida ultrices. Mauris pulvinar massa vel nulla congue, ut lacinia odio rutrum. Donec dui enim, luctus in sollicitudin sit amet, hendrerit vitae est. Aenean facilisis, massa ut , volutpat hendrerit, magna ligula laoreet est, sit amet bibendum nisi orci non libero. Pellentesque et nibh tincidunt, viverra justo iaculis, venenatis nibh. Donec eu nunc vel odio lacinia interdum. Vivamus orci enim, tincidunt ornare nisi ac, euismod tincidunt dolor.

	Sed scelerisque felis nibh, a lobortis , quam dapibus faucibus. Vestibulum sed quam in urna pellentesque iaculis. Suspendisse varius nisi libero, sed posuere justo gravida ac. Aenean varius lobortis nisl sit amet tempor. Aenean pulvinar accumsan leo ut egestas. Donec tincidunt faucibus neque, ac sollicitudin eros euismod eu. Nulla vel ligula a quam aliquet sollicitudin. ";
$file = 'tekst.txt';
if (file_exists($file)) {	
    $fp = fopen($file, 'r');
    $size = filesize($file);
    if ($size > 0 ) {
        $dane = fread($fp, $size);
        fclose($fp);
    }
}
$text2 = $dane;
?>
<?php
class WordCountCls{
	public function filter_stopwords($words) 
	{//usówanie niechcianych s³ow z teksu
		foreach ($words as $pos => $word) {
			if (!in_array(strtolower($word), $this->stopwords, TRUE)) {
				$filtered_words[$pos] = $word;
			}
		}
		return $this->filtered_words=@$filtered_words;
	}
	public function word_freq($words) 
	{//czestotliweosc wystapienia s³owa w tekscie
		$frequency_list = array();//deklaruje nowa tablice
		foreach ($words as $pos => $word) {
			$word = strtolower($word);//zmieniam na male literki
			if (array_key_exists($word, $frequency_list)) {//porównuje czy dane s³owo jest juz w nowej tablicy jako klucz
				++$frequency_list[$word];//jesli jest zwiekszam wartosc o jeden
			}
			else {
				$frequency_list[$word] = 1;//jeli nie ma jeszcze ustawiam wartosc na jeden
			}
		}
		return $this->frequency_list=$frequency_list;//tablica ze s³owami jako klucz i iloscia powtórzeñ jak zawartosc
	}
}
$cls = new WordCountCls();
$text = $text2;
//--**
//pozbywam sie niechcianych znaków 3 metody
//$text = preg_replace('/[.,]/', '', $text);
//$text = strtr($text, array('.' => '', ',' => ''));
$text = str_replace(array('.', ',', '"',"'", ';', ':', '(', ')', '[',']','{','}','<','>','?','/','\\'), ' ', $text);
//usuwam zbedne spacje i entery zostawiajac po jednym
$text = preg_replace('/(\s)\s*/', '\\1', trim($text));
//tworze tablice
$text = explode(' ', $text);
//var_dump($text);
//--**
// foreach($text as $key=>$clear){
    // $text[$key]=trim($clear, '.');
// }
//var_dump($text);
//--**
$tab = $cls->word_freq($text);
//var_dump($tab);
//--**
$skip_word = array('z','do');
$filtered=array();
foreach ($tab as $key => $value) {
    if (!in_array(strtolower($key), $skip_word, TRUE)) {
        $filtered[$key]=$value;
    }
}
//--**
$freq = array();
foreach ($filtered as $key => $value) {//filtr powtórzeñ
    if ($value >= 3) {
        $freq[$key]=$value;
    }
}
//var_dump($freq);
$fmax = 100; /* Maximum font size */
$fmin = 10; /* Minimum font size */
$tmin = @min($freq); /* najmniejsza wartosc wystepujaca w tablicy*/
$tmax = @max($freq); /* najwieksza wartosc wystepujaca w tablicy* */
foreach ($freq as $words => $number) {
    $font_size = floor(  ( $fmax * ($number - $tmin) ) / ( $tmax - $tmin )  );//96*(4-3)/(10-3) = 96*1/7 = 96/7 = 13,71428571428571 = floor 13
    //$font_size= $number;
    if ($font_size >= $fmin) {
        echo ' <span style="font-size:'.$font_size.';"> '.$words.' </span> ';
    } elseif ($font_size < $fmin) {
        //echo ' <span style="font-size:'.($font_size+5).';"> '.$words.' </span> ';
    }
}
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="UTF-8">
    <title>Test</title>
	<link title="deafult" rel="stylesheet" type="text/css" href="tag_cloud.css"/>
</head>
<body>
	<div id="place-holder">
		<div id="ignore_div">
        <?php
        
        ?>
		</div>		
	</div>
</body>
</html>
<?php //if(!empty($text)){echo $text;} ?>
<?php //var_dump($_POST); ?>
<?php //var_dump($_SESSION); ?>
<?php //echo $cls->otworz_adres(); ?>
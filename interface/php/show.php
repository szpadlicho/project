<?php
$data = $_POST['data'];
//echo $test = serialize($data);
$count = count($data['arry']);
for ($i = 0; $i < $count; $i++) {
    echo $data['arry'][$i]['top'].'<br />';
    echo $data['arry'][$i]['left'].'<br />';
    echo $data['arry'][$i]['rotate'].'<br />';
    echo $data['arry'][$i]['size'].'<br />';
    echo $data['arry'][$i]['family'].'<br />';
    echo $data['arry'][$i]['color'].'<br />';
    echo $data['arry'][$i]['value'].'<br />';
    echo '--------<br />';
}
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

<?php //var_dump($_POST); ?>
<?php //var_dump($_FILES); ?>
<?php //var_dump($_COOKIE); ?>
<?php
// if ( 0 < $_FILES['file']['error'] ) {
    // echo 'Error: ' . $_FILES['file']['error'] . '<br>';
// } else {
    // echo 'tu skrypt php - wszystko OK';
    // move_uploaded_file($_FILES['file']['tmp_name'], '../data/' . $_FILES['file']['name']);
// }
?>
<?php
include_once('clear_old.php');
$path = '../data/picture/'.$_COOKIE['PHPSESSID'];
foreach (glob($path.'*.*') as $filename) {
    unlink($filename);
}

class UpLoadFiles
{
	/*funkcja do sprawdzania i uploadowania plików*/
	public function checkFile($x,$des)
    {
        $e = explode('/', $x);//wyciągam rozszerzenie 
        if ($e[1] == 'jpeg') {//zmieniam na popularniejsze rozszezenie
            $e[1] = 'jpg';
        }
        $file_name = $_COOKIE['PHPSESSID'].'.'.$e[1];
		$allowed = array ('image/jpg','image/jpeg','image/png','image/gif');
		if (in_array($x, $allowed)) {		
			echo '<span class="catch_span">Picture upload successful: '.$_FILES['pictures']['name'].'</span>';
			move_uploaded_file($_FILES['pictures']['tmp_name'], $des.'/'.$file_name);
		} else {
			echo '<span class="catch_span">Not allowed file type: '.$_FILES['pictures']['name'].'</span>';
		}
	}
	public function upLoad($des)
    {
		$fileCount = count(@$_FILES['pictures']['tmp_name']);
		for ($i=0; $i<$fileCount; $i++) {
			$this->checkFile(@$_FILES['pictures']['type'],$des);
		}
	}
}
if (@$_FILES['pictures']['error']!=4 && @$_FILES['pictures']['error']==0) {
    $upload_and_check_file=new UpLoadFiles();
    $upload_and_check_file->upLoad('../data/picture');/*$cmd gdzie ma wkleić*/
}
?>
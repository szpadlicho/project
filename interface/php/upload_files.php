<?php

    // if ( 0 < $_FILES['file']['error'] ) {
        // echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    // } else {
        // echo 'tu skrypt php - wszystko OK';
        // move_uploaded_file($_FILES['file']['tmp_name'], '../data/' . $_FILES['file']['name']);
    // }

?>
<?php
class UpLoadFiles
{
	/*funkcja do sprawdzania i uploadowania plików*/
	public function checkFile($x,$des)
    {
		$disallowed = array (/*pliki które są nie do przyjęcia*/);
		if (! in_array($x, $disallowed)) {		
			echo '<span class="catch_span">plik zaladowany: '.$_FILES['files']['name'].'</span>';
			move_uploaded_file($_FILES['files']['tmp_name'], $des.'/'.$_FILES['files']['name']);
		} else {
			echo '<span class="catch_span">Nie dozwolony format pliku: '.$_FILES['files']['name'].'</span>';
		}
	}
	public function upLoad($des)
    {
		$fileCount = count(@$_FILES['files']['tmp_name']);
		for ($i=0; $i<$fileCount; $i++) {
			$this->checkFile(@$_FILES['files']['type'],$des);
		}
	}
}
if (@$_FILES['files']['error']!=4 && @$_FILES['files']['error']==0) {
    $upload_and_check_file=new UpLoadFiles();
    $upload_and_check_file->upLoad('../data');/*$cmd gdzie ma wkleić*/
}
?>
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
        $ext5 = pathinfo($_FILES['files']['name'], PATHINFO_EXTENSION);
		$allowed = array ('otf','ttf'/*pliki które są nie do przyjęcia*/);
		if (in_array($ext5, $allowed)) {		
			echo '<span class="catch_span">Font upload successful: '.$_FILES['files']['name'].'</span>';
			move_uploaded_file($_FILES['files']['tmp_name'], $des.'/'.$_FILES['files']['name']);
		} else {
			echo '<span class="catch_span">Not allowed file type: '.$_FILES['files']['name'].'</span>';
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
    $upload_and_check_file->upLoad('../data/fonts');/*$cmd gdzie ma wkleić*/
}
?>
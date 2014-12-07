<?php
$file = $_GET['file'];
//$file = '../data/picture/l5dq9rbhohnhtkvtq0ltcpvkc2-preview.jpg';
if(file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
	unlink($file);
	//unlink($file2);
    exit;
}
?>
<form method="POST" enctype="multipart/form-data">
    <input name="files" type="file" />
    <input type="submit" />
</form>
<?php
    var_dump($_FILES);
    //$_FILES['files']['name']
   echo $ext3 = pathinfo($_FILES['files']['name'], PATHINFO_EXTENSION);
?>
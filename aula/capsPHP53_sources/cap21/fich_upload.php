<?php
    if (isset($_POST['upload_fich']) &&  $_FILES['fich']['size'] <150000) {
        //print_r($_FILES);
		echo "$_REQUEST($fich) <br>";
		copy($_FILES['fich']['tmp_name'], 'upload/'.$_FILES['fich']['name']) or die ("upload sem sucesso");
		//unlink($fich);   
	}  
?>
<form method="POST" name="fichupload" action="fich_upload.php" enctype="multipart/form-data">
Ficheiro: <input type="file" name="fich"><br>
<input type="submit" name="upload_fich" value="Upload">

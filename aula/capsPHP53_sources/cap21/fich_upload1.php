<?php 
//fich_upload1.php
if (isset($_POST['Enviar'])) { 
//if ($_FILES['fich']['type'] == "image/gif" && $_FILES['fich']['size']<150000) {         
if (is_uploaded_file($_FILES['fich']['tmp_name']) && $_FILES['fich']['type'] == "image/gif" && $_FILES['fich']['size']<150000) { 
move_uploaded_file($_FILES['fich']['tmp_name'], "upload/".$_FILES['fich']['name']) or die ("<BR> Upload sem efeito"); 
        echo "o seguinte ficheiro foi transferido correctamente <br>";  
        echo "Name: ".$_FILES['fich']['name']."<br>";  
    	print_r($_FILES);  
	   } else { 
            echo "<br><br>"; 
           echo "Falha de Upload, tipo de ficheiro errado (".$_FILES['fich']['name'].")<br>"; 
        } 
}else{
?>
<form name="form" method="POST" action="" enctype="multipart/form-data"> 
Ficheiro:<input type="file" name="fich"> <br> 
<input type="submit" name="Enviar" value="Enviar">
</form>   
<?php
} 
?> 


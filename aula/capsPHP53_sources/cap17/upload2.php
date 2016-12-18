<?php /*upload.php*/ ?>
<?php
$path=(dirname($_FILES['origem']['tmp_name']))."\\upload\\";

	$source=$_FILES['origem']['tmp_name'];
	$source_name = $_FILES['origem']['name'];
	$origem_size = $_FILES['origem']['size'];
	$origem_type = $_FILES['origem']['type'];
	if(($source_name <> "none")&&($source_name <> "")){
	
		if ($origem_size < 150000 && ($origem_type == "image/pjpeg" || $origem_type == "image/jpeg")){
           $dest = "upload\\".$source_name;
            if(copy($source,$dest)){
            	echo "<br>cópia do ficheiro ".$source_name." efectuada com sucesso.";
      			echo "<br>tamanho do ficheiro $origem_size bytes";
      			echo "<br>tipo de ficheiro $origem_type <br>";
            }
         	else {
               echo "Directório sem direitos de escrita <br>";
         	}
         	unlink($source);
      	}
      	else {
      		echo "<br>ficheiro impróprio";	
      	}
      	
	}
print_r($_FILES);
?>

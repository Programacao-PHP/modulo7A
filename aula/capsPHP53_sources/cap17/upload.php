<?php /*upload.php*/ ?>
<?php
#$origem_type=$HTTP_POST_FILES['origem']['type'];
#$origem_size=$HTTP_POST_FILES['origem']['size']; 
#$source=$HTTP_POST_FILES['origem']['tmp_name'];
#$source_name=$HTTP_POST_FILES['origem']['name'];
	$source=$_FILES['origem']['tmp_name'];
	$source_name = $_FILES['origem']['name'];
	$origem_size = $_FILES['origem']['size'];
	$origem_type = $_FILES['origem']['type'];

$path=(dirname($_FILES['origem']['tmp_name']))."\\upload\\";
    	 if(($source_name <> "none")&&($source_name <> "")){
            $dest = "upload\\".$source_name;
            if(copy($source,$dest)){
            	echo "<br>cópia do ficheiro ".$source_name." efectuada com sucesso.";
      			echo "<br>tamanho do ficheiro $origem_size bytes";
      			echo "<br>tipo de ficheiro $origem_type";
            }
         	else {
               echo "Directório sem direitos de escrita <br>";
         	}
         	unlink($source);
      	}
?>

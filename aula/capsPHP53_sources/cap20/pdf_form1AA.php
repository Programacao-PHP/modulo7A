<?php
    if(isset($_POST)){ 	
        $content=array();
    
		if(isset($_POST['volume'])){
            $filtro='`[^a-z0-9\s]+$`i';
            if(empty($_POST['volume']) || preg_match($filtro,$_POST['volume'])){
                die('dados invalidos para o campo volume.');
            }else{
                $content['volume']=$_POST['volume'];
            }
                                 
            $content['publisher']=$_POST['publisher'];
            $content['preparer']=$_POST['preparer'];
            $content['comment']=$_POST['comment'];
                     
            //Ficheiro PDF já criado em Acrobat que contém os campos do formulário
            $pdf_doc='d:/wamp/www/caps_php6/cap20/pdf_form1.pdf';
            //Ficheiro fdf a criar que irá conter os dados
			$fdf_fich = 'pdf_form1.fdf';
            // Criação do ficheiro fdf
            $fdf_content=criarFDF($pdf_doc,$content);

            // escrita de dados no ficheiro fdf
            if($fp=fopen($fdf_fich,'w')){
                fwrite($fp,$fdf_content,strlen($fdf_content));
                //echo $fdf_fich,' <br> Inserção de dados com sucesso.';
                }else{
                die('Não foi possível criar o ficheiro FDF: '.$fdf_fich);
            }
		//Mostrar o ficheiro pdf com os dados inseridos no formulário
			header("Content-type: application/vnd.fdf");
            $fp=fopen("$fdf_fich","r");
            fpassthru($fp);
			fclose($fp);
		//echo $fdf_fich,' <br> Inserção de dados com sucesso.';	
        }
    }else{
        echo 'Não enviou nenhum formulário.';
    }

function criarFDF($fich,$info){
    $content="%FDF-1.2\n%âãÏÓ\n1 0 obj\n<< \n/FDF << /Fields [ ";
    foreach($info as $field => $valor){
    	if(is_array($valor)){
        	$content.='<</T('.$field.')/V[';
        	foreach($valor as $opt)
        		$content.='('.trim($opt).')';
        	$content.=']>>';
    	}else{
        	$content.='<</T('.$field.')/V('.trim($valor).')>>';
    	}
    }
    $content.="] \n/F (".$fich.") /ID [ <".md5(time()).">\n] >>".
        " \n>> \nendobj\ntrailer\n".
        "<<\n/Root 1 0 R \n\n>>\n%%EOF\n";
    return $content;
}

?>

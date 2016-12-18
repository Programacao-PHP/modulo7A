<?php
try {
	if(isset($_POST)){ 	
        $content=array();    
            $filtro='`[^a-z0-9\s]+$Á`i';
            if(empty($_POST['nome']) || preg_match($filtro,$_POST['nome'])){
                die('dados invalidos para o campo nome.');
            }else{
                $content['nome']=$_POST['nome'];
            }
                                 
            $content['idade']=$_POST['idade'];
            $content['bi']=$_POST['bi'];
            $content['sinais']=$_POST['sinais'];
            $content['sexo']=$_POST['sexo'];
			      
            //Ficheiro PDF j· criado com Acrobat Pro que contÈm os campos do formul·rio
            //$pdf_doc='http://localhost/caps_PHP6/cap20/pdfA.pdf';
			$pdf_doc='d:/wamp/www/caps_PHP6/cap20/pdfA.pdf';
            //Ficheiro fdf a criar que ir· conter os dados
			$fdf_fich = 'pdfA.fdf';
            // CriaÁ„o do ficheiro fdf
            $fdf_content=criarFDF($pdf_doc,$content);

            // escrita de dados no ficheiro fdf
            if($fp=fopen($fdf_fich,'w')){
                fwrite($fp,$fdf_content,strlen($fdf_content));
                }else{
                die('N„o foi possÌvel criar o ficheiro FDF: '.$fdf_fich);
            }
		//Mostrar o ficheiro pdf com os dados inseridos no formul·rio
			header("Content-type: application/vnd.fdf");
            $fp=fopen("$fdf_fich","r");
            fpassthru($fp);
			fclose($fp);
}
} catch (Exception $e){
echo "erro:", $e->getMessage();
}

function criarFDF($fich,$info){
    $content="%FDF-1.2\n%‚„œ”\n1 0 obj\n<< \n/FDF << \n/F (".$fich.") /ID [ <".md5($fich).">\n]/Fields [ ";
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
    $content.="] >>"." \n>> \nendobj\ntrailer\n"."<<\n/Root 1 0 R \n\n>>\n%%EOF\n";
    return $content;
}

?>

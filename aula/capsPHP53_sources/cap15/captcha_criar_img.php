<?php
 session_start();   
 header("Content-Type: image/jpeg");    
 criar_imagem();   
 die();   

 function criar_imagem()   {        
     //gerar uma string aleatória e retirar 6 carcteres a partir da posição 10 e guardar numa variável de sessão
	 $enc = rand(0,100);   
     $key = substr(md5($enc), 10, 6);   
     // definição da sessão   
     $_SESSION["key"] = $key;   
     // Criação da imagem ***   
     $imagem = ImageCreatetruecolor(150, 50);
	 //criar uma imagem apartir de uma já existente
	 //$image =imageCreateFromJPEG("galinha.jpg");
   
     // definição de três cores  
     $clr_cyan = ImageColorAllocate($imagem, 255,  0, 255);   
     $clr_yell = ImageColorAllocate($imagem, 255, 255, 0);  
	 $clr_black = ImageColorAllocate($imagem, 0, 0, 0);   
     // imagem de fundo amarela 
     imagefill($imagem, 0, 0, $clr_yell);   
    //  colocar linhas e um rectangulo sobre a imagem  
     imageline($imagem, 5, 1, 70, 50, $clr_cyan);   
     imagefilledrectangle($imagem, 100, 30, 120, 50, $clr_cyan);      
     imagefilledellipse($imagem, 120, 10, 30, 30, $clr_cyan);
	 imageline($imagem, 60, 1, 116, 50, $clr_yell);
	 imageline($imagem, 110, 1, 166, 50, $clr_black);
	 // colocar o código da chave sobre a imagem   
     imagestring($imagem, 5, 35, 15, $key, $clr_cyan);  
	 // fazer output da imagem    
     imagejpeg($imagem);   
     // limpar a memória 
     imagedestroy($imagem);   
 }   
?>   

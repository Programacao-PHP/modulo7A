<?php /*ficheiro.php*/ ?>
<html>
<?php

foreach($_POST as $nome_campo => $valor){
   $comando = "\$" . $nome_campo . "='" . $valor . "';";
   eval($comando);
}
	#$nome=$_POST['nome'];
	#$email=$_POST['email'];
	#$idade=$_POST['idade']; 
if ($nome || $email) {
	
  $file=fopen("ficheiro.txt","a");
#  fputs($file,"\n");
  fputs($file,"$nome|$email|$idade|\n");
  fclose($file);
  print ("Registo adicionado com sucesso");
  print "<a href=\"".$_SERVER['PHP_SELF']."\"><p> voltar </a>";
} else {
?>
  
<form method="POST" action="<?php $_SERVER['PATH_INFO']; ?>">
  <p align=center>nome <input type="text" name="nome" size="20"></p>
  <p align=center>email <input type="text" name="email" size="20"></p>
  <p align=center>idade <input type="text" name="idade" size="20"></p>
  <p align=center><input type="submit" value="gravar" name="adicionar"></p>
</form>
<?php
if (file_exists("ficheiro.txt")) {
$file= fopen("ficheiro.txt", "r") ;
print "<table border=1>";
  while(!feof($file)) {
  $linha= fgets($file,1024);
  $array= explode ("|", $linha);
  $nome= $array[0];
  $email= $array[1];
  $idade= $array[2];
  print "<tr><td width=\"33%\"><p align=\"center\">$nome</td>";
  print "<td width=\"33%\"><p align=\"center\">$email</td>";
  print "<td width=\"34%\"><p align=\"center\">$idade</td></tr>";
  $idadeT=$idadeT+$idade;
  $num++ ;
  }
print "</table>";
fclose($file);
	if ($num>1){ 
	$media=($idadeT/($num-1)) ;	
	print ("numero de registos = $num <br>");
	printf ("média de idades - %.1f",$media);
	}

} else {
  print "ficheiro texto inexistente ... vai ser criado";
  fopen("ficheiro.txt","w");
}
}
?>
</html>

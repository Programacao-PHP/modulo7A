<?php /*fich4.php*/
	$nome=$_POST['nome'];
	$email=$_POST['email'];
	$idade=$_POST['idade']; 

if ($nome ||$email) {
  $file=fopen("ficheiro.txt","a");
  #fputs($file,"\n");
  fputs($file,"$nome|$email|$idade|\n");
  fclose($file);
  print ("dados adicionados com sucesso");
  print ("<a href=\"".$_SERVER['PATH_INFO']."\"><p> voltar </a>");
} else {
?>
  <form method="POST" action="<?php $_SERVER['PATH_INFO'] ?>">
  <p>nome <input type="text" name="nome" size="20"></p>
  <p>email <input type="text" name="email" size="20"></p>
  <p>idade <input type="text" name="idade" size="20"></p>
  <p><input type="submit" value="gravar" name="adicionar"></p>
  </form>
<?php
}
?>
</html>

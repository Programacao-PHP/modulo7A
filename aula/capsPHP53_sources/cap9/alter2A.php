<?php
$id = $_REQUEST['id'];
$nome = $_REQUEST['nome'];
$email = $_REQUEST['email'];
$telefone = $_REQUEST['telefone'];

if (!ereg("^([a-zA-Z0-9_-])+.+@([a-zA-Z0-9])+(\.[a-zA-Z0-9]{2,3})+",$email)||!$nome) {
	header("location: alter1A.php?nome=$nome&telefon=$telefone&email=$email&identif=$id");
}else{
	set_time_limit(60);
	$path=(dirname($_FILES['imagem']['tmp_name']))."\\upload\\";

	$source=$_FILES['imagem']['tmp_name'];
	$source_name = $_FILES['imagem']['name'];
    	 if(($source_name <> "none")&&($source_name <> "")){
            $dest = "upload\\".$source_name;
            if(copy($source,$dest)){
               $dest=addslashes($dest);
            }
         	else {
               echo "Directório sem direitos de escrita <br>";
         	}
         	unlink($source);
      	}
mysql_connect("localhost","root","") or die("impossível ligar ao servidor Mysql<p>");
$sql="update teste set nome='$nome',telefone='$telefone', img_nome='$dest', email='$email' where id='$id'";
$resultado=mysql_db_query("testeDB",$sql);
$num_afect=mysql_affected_rows();
if ($resultado) {
print ("Alteração de $num_afect registo efectuada com sucesso <p>");
print ("O registo alterado passa a possuir os seguintes dados <p>");
$sql="select * from teste where id='$id'";
$resultado=mysql_db_query ("testeDB",$sql);
$num_campos=mysql_num_fields($resultado);
$num_reg=mysql_num_rows($resultado);
print ("<table width=90% align=center border=3>");
for ($coluna=0;$coluna<$num_campos;$coluna++) {
$field=mysql_field_name ($resultado,$coluna);
$campo=mysql_result($resultado,0,"$field");
print ("<tr><td align=center bgcolor=FFFF00>$field</td><td>$campo</td></tr>");
}
print ("</table>");
}else{
print ("Ocorreu um erro, repita a operação");
}
//include ('menu1A.inc');
include ('menu1.inc');
mysql_free_result($resultado);
mysql_close();
}
?>
</body>
</html>

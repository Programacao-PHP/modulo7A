<?php
if ($_POST['nome']){
mysql_connect("localhost","root","") or die ("Problema na ligação ao servidor MySQL");
$sql = "insert into teste (nome,telefone) values ('".$_REQUEST['nome']."','".$_REQUEST['telefone']."')";
$resultado = mysql_db_query("testeDB",$sql);
$reg_ins=mysql_affected_rows();
echo "$reg_ins registo inserido com sucesso <p>";
echo "Dados actuais da base de dados";
if ($resultado) {
$sql = "select nome,telefone from teste";
#echo $sql.">>>>>";
$resultado = mysql_db_query ("testeDB", $sql);
    if ($resultado) {
    print ("<table width=\"95%\" align=center border=2>");
    print ("<tr><td width=\"50%\" bgcolor=\"FFFF00\">NOME</td><td width=\"50%\"bgcolor=\"FFFF00\">TELEFONE</td></tr>");
        while ($registo=mysql_fetch_array($resultado)) {
        $nome=$registo["nome"];
        $telf=$registo["telefone"];
        print ("<tr><td>$nome</td><td>$telf</td></tr>");
        }
    echo ("</table>");
    }else{
    print ("não há registos");
    }
mysql_free_result ($resultado);
}else{
echo "Nome em branco. por favor preencha o campo Nome";
echo "<p></p>";
}
}
include ('menu.inc');
?>


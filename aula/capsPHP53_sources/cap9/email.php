<html>
<title>PHP - Mysql </title> </head>
<body> <b>Envio de e-mail </b>
<?php
print " para ".$_REQUEST['email']."     ---  em";
$dat=date("d :m :y");
print " $dat";
print "<form method=post action=".$_SERVER['PATHINFO'].">";

?>
De    :<input type=text name=remete size=30 value="<?php echo $_REQUEST['nome'];?>"><p>
Assunto:<input type=text name=assunto size=30><p>
Meu e-mail:<input type=text name=emailx size=30><p>
Mensagem<textarea name=mensagem cols=30 rows=3></textarea><p align=center>
<input type=submit value="-   enviar    -" name=enviar><p>
</form>
<?php
if ($_REQUEST['enviar']){
mail ($_REQUEST['email'],$_REQUEST['assunto'],$_REQUEST['mensagem']."\n Saudações cordiais de ".$_REQUEST['remete'],"From: ".$_REQUEST['emailx']);
$dat1=date ("H : m: s");
print "Obrigado este e-mail foi enviado para ".$_REQUEST['email']." às $dat1 do dia $dat";
}
//include ('menu1A.inc');
include ('menu1.inc');
?>
</body>
</html>

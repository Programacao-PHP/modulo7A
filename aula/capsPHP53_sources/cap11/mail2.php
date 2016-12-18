<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF" leftmargin="10" topmargin="10" marginwidth="10" marginheight="10" text="#000000" link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF">
<p><font face="Verdana, Arial, Helvetica, sans-serif" size="4"><b>Envio de Informação</b></font><br></p>
<br>

<?php
if($_REQUEST['email']) {
    $email_msg = sprintf("%s acabou de lhe enviar um email...\n\nMensagem: %s\n\n",$_REQUEST['nome'],$_REQUEST['mail']);

    $result_id = mail($_REQUEST['email'], "Mensagem de teste...", $email_msg);


    if($result_id) {
        print("M E N S A G E M&nbsp;&nbsp;&nbsp;&nbsp;E N V I A D A<br>C O M&nbsp;&nbsp;&nbsp;&nbsp;S U C E S S O");
    } else {
        print("O C O R R E U&nbsp;&nbsp;&nbsp;&nbsp;U M&nbsp;&nbsp;&nbsp;&nbsp;E R R O<br>C O N T A C T E&nbsp;&nbsp;&nbsp;&nbsp;O&nbsp;&nbsp;&nbsp;&nbsp;A D M I N I S T R A D O R");
    }
} else {
    printf("<center><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\"><b>Não introduziu o endereço EMAIL.</b></font><br><br></center>");
}
printf("<center><a href=\"javascript:history.back();\"><img src=\"imagens/voltar.gif\" border=0></a></center>");

?>
</body>
</html>

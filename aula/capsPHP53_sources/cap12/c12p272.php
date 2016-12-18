<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
// se for nula aparece a caixa de diálogo

header('WWW-Authenticate: Basic realm="Autenticação com PHP"');
        header('HTTP/1.0 401 Unauthorized');
        exit;

} else if (isset($_SERVER['PHP_AUTH_USER'])) {
// se não for nula abre o ficheiro com a informação sobre os utilizadores
//$file = "/usr/local/apache/htdocs/codigo/autentic/autoriz.txt";

$file = "autoriz.txt";
$fp = fopen($file, "r");

       while(!feof($fp)) {
       $linha=fgets($fp, 128);
       $elem_linha=explode (':',$linha);
              if (feof($fp)) {
                break;
               }
              if ((trim($elem_linha[0])==$_SERVER['PHP_AUTH_USER']) && (trim($elem_linha[1])== $_SERVER['PHP_AUTH_PW'])) {
                $authentic = 1;
                      break;
                } else {
                    $authentic = 0;
                }
        }

        fclose ($fp);
        if ($authentic == "1") {

              echo "<P>Está autorizado</p>";
              exit;

       } else {

       header('WWW-Authenticate: Basic realm="Autenticação PHP"');
                        header('HTTP/1.0 401 Unauthorized');
                        echo 'Requer autorização.';
                        exit;
        }
 }
?>


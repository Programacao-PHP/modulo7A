<?php
if (!isset($_SERVER['PHP_AUTH_USER'])){
      header("WWW-authenticate: basic realm=\"Qual o Login e Password?\"");
header("HTTP/1.0 401 Unauthorized.");
                exit;
        } else if (isset($_SERVER['PHP_AUTH_USER'])) {
               $db= mysql_connect("localhost","","") or die ("Impossível ligar à base de dados");
                mysql_select_db(testeDB,$db) or die ("Impossível seleccionar a base de dados.");
                $sql = "select * from users where nome ='".$_SERVER['PHP_AUTH_USER']. "' and password='".$_SERVER['PHP_AUTH_PW']."'";
                $resultado = mysql_query($sql,$db);
                $num_linhas = mysql_num_rows($resultado );

                if ($num_linhas > 0) {
                        echo "<P>Está autorizado!</p>";
                        exit;
                } else {
                        header("WWW-Authenticate: Basic realm=\"Só utilizadores válidos\"");
                        header("HTTP/1.0 401 Não autorizado");
                        echo "Tem de obter autorização!";
                        exit;
                }
        }
?>


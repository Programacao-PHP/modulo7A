<?php
if (!isset($PHP_AUTH_USER)){
header("WWW-authenticate: basic realm=\"Qual o Login e Password?\"");
header("HTTP/1.0 401 Unauthorized.");
                exit;
        } else if (isset($PHP_AUTH_USER)) {
                mysql_connect("localhost","","") or die ("Impossível ligar à base de dados");
                mysql_select_db("testeDB") or die ("Impossível seleccionar a base de dados.");
                $sql = "SELECT * FROM users WHERE nome=$PHP_AUTH_USER and password=$PHP_AUTH_PW";
                $result = mysql_query($sql);
                $num = mysql_numrows($result);
                if ($num != "0") {
                        echo "<P>Está autorizado!</p>";
                        exit;
                } else {
                        header("WWW-Authenticate: Basic realm=\"Members Only\"");
                        header("HTTP/1.0 401 Não autorizado");
                        echo "Tem de ter autorização!";
                        exit;
                }
        }
?>


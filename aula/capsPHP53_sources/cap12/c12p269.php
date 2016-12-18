<?php
if ((!isset($_SERVER['PHP_AUTH_USER'])) || (!isset($_SERVER['PHP_AUTH_PW']))) {
    header('WWW-Authenticate: Basic Realm="Autenticação com PHP"');
    header("HTTP/1.0 401 Unauthorized");
    	//se não funcionar substituir HTTP/1.0 por status:  //
    echo 'Necessita de Autorização.';
    exit;

} else {
    echo "O login foi efectuado por ->". $_SERVER['PHP_AUTH_USER'] ."(username).<BR>";
    echo "A sua password é -> ". $_SERVER['PHP_AUTH_PW'] . "<BR>";
}
?>


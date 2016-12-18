<?php
if (( !isset( $_SERVER['PHP_AUTH_USER'] )) || (!isset($_SERVER['PHP_AUTH_PW'])) || ( $_SERVER['PHP_AUTH_USER']!= 'marques') || ( $_SERVER['PHP_AUTH_PW'] != 'aeiou' )) {
    header( 'WWW-Authenticate: Basic realm="Autenticação com PHP"' );
    header( 'HTTP/1.0 401 Unauthorized' );
    echo 'Necessita de autorização.';
    exit;
} else {
    echo 'Autenticação com êxito';
}
?>


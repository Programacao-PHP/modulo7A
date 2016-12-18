<?php
$auth = false; // assuma que o utilizador não está autenticado
if (isset( $_SERVER['PHP_AUTH_USER'] ) && isset($_SERVER['PHP_AUTH_PW'])) {

    // ler o conteúdo do ficheiro para a variável $file_contents
    //$filename = '/usr/local/apache/mysite.pw';
    $filename = "authfile.pw";
    $fp = fopen($filename, 'r' );
    $file_contents = fread($fp, filesize($filename ));
    fclose( $fp );

    // colocar as linhas individuais do ficheiro num array.
    $lines = explode ( "\n", $file_contents );
//echo $lines[0];

    // desdobrar cada uma das linhas no par nome e password.
    // e comparar com $_SERVER['PHP_AUTH_USER'] and $_SERVER['PHP_AUTH_PW'].
    foreach ( $lines as $line ) {
        list( $username, $password ) = explode( ':', $line );
        if ( $username == $_SERVER['PHP_AUTH_USER']) {

// Obter os dois primeiros caracteres da password encriptada.
            $salt = substr( $password , 6 , 2 );

       // encriptar $_SERVER['PHP_AUTH_PW'] baseado nos dois primeiros caracteres da password encriptada ($salt)
            $enc_pw = crypt( $_SERVER['PHP_AUTH_PW'], $salt );

            if ($password = substr($enc_pw, 0, 2 )) {
                // Se a comparação for positiva o utilizador é autenticado e pára a pesquisa
                $auth = true;
                break;
            }
        }
    }
}

if ( ! $auth ) {
    header( 'WWW-Authenticate: Basic realm="Private"' );
    header( 'HTTP/1.0 401 Unauthorized' );
    echo 'Necessita de autorização.';
    exit;
} else {
    echo '<P>Está autorizado!</P>';
}

?>


<?php
session_start();
// Retira as variáveis da sessão.
$_SESSION = array();
  
//Destrói o cookie da sessão
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-30000, '/');
}
  
// Destrói a sessão
session_destroy();
  
//Inicia uma nova sessão
session_start();
session_regenerate_id();
  
$codigo = $_SERVER['HTTP_USER_AGENT'];
$codigo .= 'Marques+Carlos';
$digital = md5($codigo);
/*<a href=php_session_tok_proc.php?marca=<?php echo $digital; ?> > clicar aqui !!!</a>*/
?>
Formulario de autenticação
<form action="php_session_tok_proc.php" method="POST"> <input type="hidden" name="marca" value="<?php echo $digital; ?>" /><input type="submit"> </form>
...
//Pedido de login/passwords
.....

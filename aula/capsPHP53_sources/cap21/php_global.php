<?
ini_set('register_globals', 'On');
//$auth=0;
if ($password == "chave") {
  $auth = 1;
}
 
if ($auth == 1) {
  echo "acesso permitido";
}
else
{
echo "acesso recusado";
}
?>
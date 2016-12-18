<?php
 
session_start();
 
if (isset($_REQUEST['Livro']) && isset($_REQUEST['Quantidade'])) {
// chamar script de processamento da encomenda 
echo "Obrigado pela encomenda de " .$_REQUEST['Quantidade']. " livros -". $_REQUEST['Livro'];
}
else
{
echo "Há um problema com a sua encomenda";  
} 
?>

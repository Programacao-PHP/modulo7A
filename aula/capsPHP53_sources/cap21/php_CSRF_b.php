<?php
session_start();
echo $_SESSION['marca'];
$tempo_vida = time() - $_SESSION['marca_t'];
if (isset($_SESSION['marca']) && $_POST['marca']==$_SESSION['marca'] && $tempo_vida <600) {
	if (isset($_POST['Livro']) && isset($_POST['Quantidade'])) {
	// chamar script de processamento da encomenda 
	echo "Obrigado pela encomenda de " .$_POST['Quantidade']. " livros -". $_POST['Livro'];
	}
	else
	{
	echo "Há um problema com a sua encomenda";  
	}  
}
?>

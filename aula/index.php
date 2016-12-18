<?php
	$titulo = "Seleção de registos";
	include('includes/header.php');

	require_once('ligaDB.php');
	

	$sql = "SELECT nome, telefone FROM utilizadores";
	
	$resultado = mysqli_query($liga, $sql);

	if(mysqli_num_rows($resultado) > 0 ){
	?>
		<div class="container">
			<table class="table table-hover">
	  		<tr>
	  			<th>Nome</th>
	  			<th>Telefone</th>
	  		</tr>
	  		<tr>
	  			<td>a</td>
	  			<td>a</td>
	  		</tr>
			</table>	
		</div>
		
		
	<?php
	}

	mysqli_free_result ($resultado); // Liberta a memória associada ao resultado

	mysqli_close($liga); // fecha a ligação à base de dados

	include('includes/footer.php');

?>

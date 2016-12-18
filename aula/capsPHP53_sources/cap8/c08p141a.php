<html>
<body>
<?php
if($_POST['linhas']>100) {
			printf("Número inválido de linhas. Por favor introduza um valor entre 0 e 100.");
} else {
			if($_POST['colunas']>100) {
				printf("Número inválido de colunas. Por favor introduza um valor entre 0 e 100.");
			} else {
				echo "<table border=1>";
				for($n=0; $n<$_POST['linhas']; $n++) {
					for($m=0; $m<$_POST['colunas']; $m++) {
						echo "<td>x</td>";
					}
					echo "<tr>";
				}
				echo "</table>";
			}
}
?>
<br><a href="c07p138.html">tentar outra vez</a>
</body>
</html>


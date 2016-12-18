<?php

require("config.inc.php");

class ARFrota extends BDMySQL {
        var $bd;

        function ARFrota() {
				global $NOME_BD, $USER_DB, $PASS_DB, $NOME_SERVIDOR;
                $this->bd = new BDMySQL();
                $this->bd->ligarBD($NOME_BD, $USER_DB, $PASS_DB, $NOME_SERVIDOR);
        }

		function cabecalhoFrota() {
			echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"#000033\"><tr bgcolor=\"#0066FF\"><td><b><font color=\"#FFFFFF\">Matricula</font></b></td><td><b><font color=\"#FFFFFF\">Classe</font></b></td><td><b><font color=\"#FFFFFF\">Marca</font></b></td><td><b><font color=\"#FFFFFF\">Modelo</font></b></td></tr>";
		}

        function listaFrota($tipo) {
            $sql = "SELECT * FROM veiculo";

            $rs=$this->bd->executarSQL($sql);

			echo "<tr bgcolor=\"#FFFFFF\">";
			$n=0;
			while(mysql_fetch_row($rs)) {
					echo "<td bgcolor=\"#FFFFFF\"><a href=\"index.php?pagina=veiculo&matricula=".mysql_result($rs, $n, "matricula")."\">".mysql_result($rs, $n, "matricula")."</td><td bgcolor=\"#FFFFFF\"><a href=\"index.php?pagina=classe&classe=".mysql_result($rs, $n, "classe")."\">".mysql_result($rs, $n, "classe")."</td><td bgcolor=\"#FFFFFF\">".mysql_result($rs, $n, "marca")."</td><td bgcolor=\"#FFFFFF\">".mysql_result($rs, $n, "modelo")."</td>";
					echo "</tr>";
					$n++;
			}
			echo "</table>";
        }

        function endARFrota() {
                $this->bd->fecharBD();
        }
}

?>
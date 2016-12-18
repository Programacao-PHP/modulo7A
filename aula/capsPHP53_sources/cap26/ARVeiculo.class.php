<?php

include("ARLocal.class.php");
require("config.inc.php");

class ARVeiculo extends BDMySQL {
        var $bd;

        function ARVeiculo() {
				global $NOME_BD, $USER_DB, $PASS_DB, $NOME_SERVIDOR;
                $this->bd = new BDMySQL();
                $this->bd->ligarBD($NOME_BD, $USER_DB, $PASS_DB, $NOME_SERVIDOR);
        }

        function detalhesVeiculo($matricula) {
            $sql = "SELECT * FROM veiculo WHERE matricula='$matricula'";
            $rs=$this->bd->executarSQL($sql);

			mysql_fetch_row($rs);

			echo "<font size=+2><b>".mysql_result($rs, 0, "matricula")."</b></font><br><br>";
			echo "<img src=\"imagens/".mysql_result($rs, 0, "fotografia")."\"><br>";
			echo "Classe <b>".mysql_result($rs, 0, "classe")."</b><br>";
			echo mysql_result($rs, 0, "marca")." ";
			echo mysql_result($rs, 0, "modelo")."<br><br>";

			$tlocal = new ARLocal();
			$tlocal->detalhesLocal(mysql_result($rs, 0, "cod"));
        }

        function endARVeiculo() {
                $this->bd->fecharBD();
        }
}

?>
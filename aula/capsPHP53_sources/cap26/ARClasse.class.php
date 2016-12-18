<?php

require("config.inc.php");

class ARClasse extends BDMySQL {
        var $bd;

        function ARClasse() {
				global $NOME_BD, $USER_DB, $PASS_DB, $NOME_SERVIDOR;
                $this->bd = new BDMySQL();
                $this->bd->ligarBD($NOME_BD, $USER_DB, $PASS_DB, $NOME_SERVIDOR);
        }

        function detalhesClasse($classe) {
            $sql = "SELECT * FROM classe WHERE classe=\"$classe\"";
            $rs=$this->bd->executarSQL($sql);

			mysql_fetch_row($rs);

			echo "<b>CLASSE: <font size=5>".mysql_result($rs, 0, "classe")."</font></b><br><br><br>";
			echo "Preço Diário Semanal: <b>".mysql_result($rs, 0, "preco_semana")."</b> euros<br>";
			echo "Preço Fim de Semana: <b>".mysql_result($rs, 0, "preco_fsemana")."</b> euros<br>";

        }

        function endARClasse() {
                $this->bd->fecharBD();
        }
}

?>
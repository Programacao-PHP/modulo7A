<?php

require("config.inc.php");

class ARLocal extends BDMySQL {
        var $bd;

        function ARLocal() {
				global $NOME_BD, $USER_DB, $PASS_DB, $NOME_SERVIDOR;
                $this->bd = new BDMySQL();
                $this->bd->ligarBD($NOME_BD, $USER_DB, $PASS_DB, $NOME_SERVIDOR);
        }

        function detalhesLocal($local) {
            $sql = "SELECT * FROM local WHERE cod=$local";
            $rs=$this->bd->executarSQL($sql);

			mysql_fetch_row($rs);

			echo "Este veículo encontra-se disponível na nossa agência de <b>".mysql_result($rs, 0, "local")."</b> em <b>".mysql_result($rs, 0, "morada")."</b>.<br><br>Telefone  :<b>".mysql_result($rs, 0, "telefone")."</b><br><b>".mysql_result($rs, 0, "horario")."</b>";
        }

		function listaLocal() {
            $sql = "SELECT * FROM local";
            $rs=$this->bd->executarSQL($sql);
			$n=0;
			while(mysql_fetch_row($rs)) {
				echo mysql_result($rs, $n, "local")."<br>";
				echo mysql_result($rs, $n, "morada")."<br>";
				echo mysql_result($rs, $n, "telefone")."<br>";
				echo mysql_result($rs, $n, "horario")."<br><br><br>";
				$n++;
			}
		}

        function endARlocal() {
                $this->bd->fecharBD();
        }
}

?>
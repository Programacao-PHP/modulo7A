<?php

require("config.inc.php");

class ARDestaques extends BDMySQL {
        var $bd;

        function ARDestaques() {
				global $NOME_BD, $USER_DB, $PASS_DB, $NOME_SERVIDOR;
                $this->bd = new BDMySQL();
                $this->bd->ligarBD($NOME_BD, $USER_DB, $PASS_DB, $NOME_SERVIDOR);
        }

        function listaDestaques() {
                $sql = "SELECT * FROM destaques ORDER BY cod DESC";
                $rs=$this->bd->executarSQL($sql);

                $n=0;
                while(mysql_fetch_row($rs) && $n<3) {
                        echo "<b>&middot;</b>&nbsp;".mysql_result($rs, $n, "destaque_txt");
						echo "<br>";
                        $n++;
                }
        }

        function endARDestaques() {
                $this->bd->fecharBD();
        }
}

?>
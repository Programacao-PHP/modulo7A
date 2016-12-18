<?php

require("config.inc.php");

class ARNovidades extends BDMySQL {
        var $bd;

        function ARNovidades() {
				global $NOME_BD, $USER_DB, $PASS_DB, $NOME_SERVIDOR;
                $this->bd = new BDMySQL();
                $this->bd->ligarBD($NOME_BD, $USER_DB, $PASS_DB, $NOME_SERVIDOR);
        }

        function listaNovidades() {
                $sql = "SELECT * FROM novidades ORDER BY cod DESC";
                $rs=$this->bd->executarSQL($sql);

                $n=0;
                while(mysql_fetch_row($rs) && $n<3) {
                        echo "<b>&middot;</b>&nbsp;".mysql_result($rs, $n, "novidade_txt");
						echo "<br>";
                        $n++;
                }
        }

        function endARNovidades() {
                $this->bd->fecharBD();
        }
}

?>
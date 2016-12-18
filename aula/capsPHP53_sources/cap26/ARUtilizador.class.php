<?php

require("config.inc.php");

class ARUtilizador extends BDMySQL {
        var $bd;

        function ARUtilizador() {
				global $NOME_BD, $USER_DB, $PASS_DB, $NOME_SERVIDOR;
                $this->bd = new BDMySQL();
                $this->bd->ligarBD($NOME_BD, $USER_DB, $PASS_DB, $NOME_SERVIDOR);
        }

		function introduzirUtilizador($email, $password, $nome, $morada, $cod_postal, $localidade, $telefone, $num_c_habitual) {
			$sql = "INSERT INTO utilizador VALUES ('$email', '$password', '$nome', '$morada', '$cod_postal', '$localidade', '$telefone', '', '', '', '$num_c_habitual')";
			if($this->bd->executarSQL($sql)) return true;
			else return false;
		}

		function verificarUtilizador($login, $password) {
			$sql = "SELECT * FROM utilizador WHERE email LIKE '$login' AND password LIKE '$password'";
			if(($rs=$this->bd->executarSQL($sql))){
				if(mysql_fetch_row($rs)==false) {
					return false;
				} else {
					return true;
				}
			}
			else {
				return false;
			}
		}
		
		function efectuarAluguer($email, $matricula, $dr, $de) {
			$sql = "insert into reserva values ('$email', '$matricula', '$dr', '$de')";
			$this->bd->executarSQL($sql);
		}
		
		function calcularPreco($dias, $matricula) {
			$sql = "select classe from veiculo where matricula='$matricula'";
			$rs=$this->bd->executarSQL($sql);
			mysql_fetch_row($rs);
			$classe = mysql_result($rs, 0, "classe");

			$sql = "select preco_semana from classe where classe='$classe'";
			$rs=$this->bd->executarSQL($sql);
			mysql_fetch_row($rs);
			$p_semana = mysql_result($rs, 0, "preco_semana");
			
			return $dias*$p_semana;
		}

        function endARUtilizador() {
                $this->bd->fecharBD();
        }
}

?>
<?php
/**
Esta classe server para gerir as ligações às Bases de Dados MySQL
*/
class BDMySQL {

  var $conn;

  function ligarBD($bdname, $user, $password, $server) {
    $this->conn = mysql_connect($server, $user, $password);
    if($this->conn<0) {
      return -1;
    }
    if(mysql_select_db($bdname, $this->conn)==false) {
      return -1;
    }
  }

  function executarSQL($sql_command) {
    $resultado = mysql_query($sql_command, $this->conn);
    return $resultado;
  }

  function numero_tuplos($tabela) {
    $tuplos=0;
    $rs=$this->executarSQL("SELECT * FROM $tabela");
    while(mysql_fetch_row($rs)) {
      $tuplos++;
    }
    return $tuplos;
  }

  function fecharBD() {
    mysql_close($this->conn);
  }
}

?>



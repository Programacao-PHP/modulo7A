<?php

foreach($_POST as $nome_campo => $valor){
   $comando = "\$" . $nome_campo . "='" . $valor . "';";
   eval($comando);
}

if($primeiro_nome) {
    if($ultimo_nome) {
        if ($telefone) {
            if($email1) {
                if($email2) {
                    if($password) {
                        if($password2) {
                            //Vamos então comparar as duas passwords...
                            if($password==$password2) {
                                echo "Registo introduzido com sucesso!!!<br>";
                            } else {
                              echo "As passwords não coincidem...";
                            }
                        } else {
                          echo"Não voltou a introduzir a sua password...<br>";
                        }
                    } else {
                      echo "Não introduziu a sua password...<br>";
                    }
                } else {
                  echo "Endereço email incorrecto...<br>";
                }
            } else {
              echo "Endereço email incorrecto...<br>";
            }
        } else {
          echo "Não introduziu o telefone...<br>";
        }
    } else {
      echo "Não introduziu o ultimo nome...<br>";
    }
} else {
  echo "Não introduziu o primeiro nome...<br>";
}
?>

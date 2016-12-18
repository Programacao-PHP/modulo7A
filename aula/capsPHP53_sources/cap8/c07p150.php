<?php
if($_POST['primeiro_nome']) {
    if($_POST['ultimo_nome']) {
        if($_POST['telefone']) {
            if($_POST['email1']) {
                if($_POST['email2']) {
                    if($_POST['password']) {
                        if($_POST['password2']) {
                            //Vamos então comparar as duas passwords...
                            if($_POST['password']==$_POST['password2']) {
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



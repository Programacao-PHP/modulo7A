<?php
session_start();
/*remover comentários qdo necessário e comentar a linha que começa com echo */
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
} else {
    $_SESSION['contador']++;
}

#session_start();
echo "A pagina foi acedida <b>".$_SESSION['contador']."</b> vezes.";
#session_destroy();
#$_SESSION['contador'] = FALSE;
?>

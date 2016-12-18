<?php 
// cria a BD
$db = new SQLiteDatabase("bd.sqlite2"); 

// cria uma tabela na BD e insere registos
//comente estas 4 linhas depois de correr o script pela 1ª vez e active as restantes 4
$db->query("BEGIN TRANSACTION; 
CREATE TABLE utilizador(id INTEGER PRIMARY KEY, nome CHAR(255));
INSERT INTO utilizador (nome) VALUES('Carlos'); 
INSERT INTO utilizador (nome) VALUES('Joaquim'); 
INSERT INTO utilizador (nome) VALUES('Maria'); 
COMMIT;");
echo "base de dados criada";
unset($db); 
?>

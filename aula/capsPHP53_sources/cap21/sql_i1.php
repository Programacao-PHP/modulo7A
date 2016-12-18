<?php 
// cria a BD
$db = new SQLiteDatabase("bd.sqlite2"); 

// cria uma tabela na BD e insere registos
//comente estas 4 linhas depois de correr o script pela 1ª vez e active as restantes 4
$db->query("BEGIN TRANSACTION; 
CREATE TABLE utilizador(id INTEGER PRIMARY KEY, nome CHAR(255), email varchar(50), password varchar(10));
INSERT INTO utilizador (nome,email,password) VALUES('Carlos','carlos@aqui.pt','111'); 
INSERT INTO utilizador (nome,email,password) VALUES('Joaquim','joaquim@ali.pt','222'); 
INSERT INTO utilizador (nome,email,password) VALUES('Maria','maria@alem.pt','333'); 
COMMIT;");
echo "base de dados criada";
unset($db); 
?>

<?php 
// abre a BD
$db = new SQLiteDatabase("bd.sqlite2"); 


// para inserir mais registos active as seguintes linhas
$db->query("BEGIN TRANSACTION; 
INSERT INTO utilizador (nome) VALUES('Alberto'); 
INSERT INTO utilizador (nome) VALUES('Abel'); 
INSERT INTO utilizador (nome) VALUES('Ana');
COMMIT;");
 
// executar uma query     
$result = $db->query("SELECT * FROM utilizador"); 
while ($result->valid()) { 
    $row = $result->current();      
    print_r($row[0]); 
    print_r($row[1]);
    print_r($row[2]);
    $result->next(); 
echo "<br>";
} 
unset($db); 
?>

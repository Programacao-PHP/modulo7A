<?php

$dbh = new PDO("sqlite:sqlite.db3");
 
$dbh->exec("CREATE TABLE table1 (id INTEGER PRIMARY KEY, col1 TEXT UNIQUE, col2 TEXT)");

$stmt = $dbh->prepare("INSERT INTO table1 (col1, col2) VALUES (:col1, :col2)"); 
$stmt->bindParam(':col1', $col1_val); 
$stmt->bindParam(':col2', $col2_val);
$col1_val = "sqlite"; 
$col2_val = "rocks";
$stmt->execute();
$col1_val = "esta coluna é única"; 
$col2_val = "esta coluna já não precisa de ser única"; 
$stmt->execute();

foreach ($dbh->query('SELECT * FROM table1', PDO::FETCH_ASSOC) as $row) { 
  print_r($row);
  } 
?>
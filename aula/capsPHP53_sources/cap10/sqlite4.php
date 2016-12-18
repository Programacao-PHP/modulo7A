<?php
try {
$pdo = new PDO('sqlite:'.'d:\sqlite\canil.sq3');
   foreach($pdo->query("SELECT * FROM cachorros") as $row) {
     print_r($row);
   }
   $db = null;
} catch (PDOException $e) {
   print "Error!: " . $e->getMessage() . "<br/>";
   die();
}
?> 
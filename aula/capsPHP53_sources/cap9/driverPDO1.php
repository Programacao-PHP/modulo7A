<?php
$db = new PDO("mysql:host=localhost; dbname=testedb", "root", "");
foreach ($db->query ("SELECT * from teste") as $row) {
    print_r($row);
    }	

?> 
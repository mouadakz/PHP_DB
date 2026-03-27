<?php

$host="localhost";
$dbname="gestion_produits";
$user="root";
$password="";

try {
$pdo=new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
} catch (PDOException $th) {
    echo 'ERORE'.$th->getMessage();
}


?>

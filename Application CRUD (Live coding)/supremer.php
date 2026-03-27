<?php

include 'config.php';

$id=$_GET['id'];

$sql="DELETE FROM utilisateurs WHERE id=?";

$stmt=$pdo->prepare($sql);
$stmt->execute([$id]);

header("Location: select.php");

?>
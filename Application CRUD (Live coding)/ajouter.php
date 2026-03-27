<?php
include 'config.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){

$nom=$_POST['nom'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$age=$_POST['age'];

$sql="INSERT INTO utilisateurs(nom,email,tel,age) VALUES(?,?,?,?)";

$stmt=$pdo->prepare($sql);
$stmt->execute([$nom,$email,$tel,$age]);

header("Location: select.php");
}
?>

<form method="POST">

<input type="text" name="nom" placeholder="nom"><br><br>

<input type="email" name="email" placeholder="email"><br><br>

<input type="text" name="tel" placeholder="tel"><br><br>

<input type="number" name="age" placeholder="age"><br><br>

<button type="submit">Ajouter</button>

</form>
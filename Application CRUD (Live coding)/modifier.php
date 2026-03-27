<?php
include 'config.php';

$id=$_GET['id'];

$sql="SELECT * FROM utilisateurs WHERE id=?";
$stmt=$pdo->prepare($sql);
$stmt->execute([$id]);

$user=$stmt->fetch(PDO::FETCH_ASSOC);

if($_SERVER["REQUEST_METHOD"]=="POST"){

$nom=$_POST['nom'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$age=$_POST['age'];

$sql="UPDATE utilisateurs SET nom=?,email=?,tel=?,age=? WHERE id=?";

$stmt=$pdo->prepare($sql);
$stmt->execute([$nom,$email,$tel,$age,$id]);

header("Location: select.php");
}
?>

<form method="POST">

<input type="text" name="nom" value="<?php echo $user['nom']; ?>"><br><br>

<input type="email" name="email" value="<?php echo $user['email']; ?>"><br><br>

<input type="text" name="tel" value="<?php echo $user['tel']; ?>"><br><br>

<input type="number" name="age" value="<?php echo $user['age']; ?>"><br><br>

<button type="submit">Modifier</button>

</form>
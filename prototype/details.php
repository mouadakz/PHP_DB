<?php
require 'config.php';


$id =$_GET['id'];


$sql = "SELECT * FROM Produit WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$produit = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>details</title>
</head>
<style>
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-color: #5a451c;
    padding: 20px;
    color: #000000; 
}

h1 {
    text-align: center;
    color: #eeff05;
}


.produit-det {
    background-color: #fff;
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.produit-det p {
    margin: 12px 0;
    font-size: 16px;
}
.back-link{
     text-decoration: none;
    color:#b0c71a; 
}


</style>
</style>
<body>

<h1>details de produit</h1>

<div class="produit-det">
    <p><strong>Nom:</strong> <?= htmlspecialchars($produit['nom']) ?></p>
    <p><strong>Prix:</strong> <?= htmlspecialchars($produit['prix']) ?> €</p>
    <p><strong>Description:</strong> <?= htmlspecialchars($produit['description']) ?></p>
    <p><strong>Catégorie:</strong> <?= htmlspecialchars($produit['categorie']) ?></p>

    <a class="back-link" href="catalogue.php">Retour au catalogue</a>
</div>

</body>
</html>
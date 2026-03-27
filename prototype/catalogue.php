<?php
require 'config.php';

$successMsg = $_GET['success'] ?? '';

$stmt = $pdo->query("SELECT * FROM Produit ORDER BY id DESC");
$listeProduit = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Catalogue des produits</title>

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
    color: #eeff00;
}

a {
    text-decoration: none;
    color: #b0c71a; 
}



.catalogue {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.produit {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    padding: 15px;
}

.produit:hover {
    box-shadow: 0 10px 15px rgba(0,0,0,0.15);
}

.produit p {
    margin: 8px 0;
}




</style>
</style>
<body>
 
<h1>Catalogue des produits</h1>
<a href="ajouter-produit.php">Ajouter un produit</a>

<?php if($successMsg): ?>
    <p class="success"><?= htmlspecialchars($successMsg) ?></p>
<?php endif; ?>

<div class="catalogue">
<?php foreach($listeProduit as $prd): ?>
    <div class="produit">
        <p><strong>ID:</strong> <?= $prd['id'] ?></p>
        <p><strong>Nom:</strong> <?= htmlspecialchars($prd['nom']) ?></p>
        <p><strong>Prix:</strong> <?= htmlspecialchars($prd['prix']) ?> €</p>
        <p><strong>Description:</strong> <?= htmlspecialchars($prd['description']) ?></p>
        <p><strong>Catégorie:</strong> <?= htmlspecialchars($prd['categorie']) ?></p>
        <p><a href="details.php?id=<?= $prd['id'] ?>">Voir détails</a></p>
    </div>
<?php endforeach; ?>
</div>

</body>
</html> 
<?php
require 'config.php';

$errors = [];
$nom = $prix = $description = $categorie = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = trim($_POST['nom']);
    $prix = trim($_POST['prix']);
    $description = trim($_POST['description']);
    $categorie = trim($_POST['categorie']);

    if (!$nom) $errors[] = "Le nom est obligatoire";
    if (!$prix || !is_numeric($prix)) $errors[] = "Le prix est obligatoire et doit etre un nombre";
    if (!$description) $errors[] = "La description est obligatoire";
    if (!$categorie) $errors[] = "La categorie est obligatoire";

    if (empty($errors)) {
        $sql = "INSERT INTO Produit (nom, prix, description, categorie) VALUES (?, ?, ?, ?)";
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nom, $prix, $description, $categorie]);

            header("Location: catalogue.php?success=Produit ajoute");
            exit;
        } catch (PDOException $e) {
            $errors[] = "Erreur" . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Ajouter un produit</title>

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
ul {
   
    margin: 0 auto 20px auto;
    padding: 10px 15px;
    background-color: #f8d7da;
    color: #721c24;
 
}

form {
    margin: 0 auto;
    background-color: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

form input{
    
    padding: 10px;
    margin: 8px 0 15px 0;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 16px;
}



a {
 text-decoration: none;
    color:#b0c71a; 
}

</style>
</style>
<body>

<h1>ajouter produit</h1>

<?php if($errors): ?>
    <ul>
        <?php foreach($errors as $err): ?>
            <li><?= htmlspecialchars($err) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="POST">
    Nom:<br>
    <input type="text" name="nom" value="<?= htmlspecialchars($nom) ?>"><br>

    Prix:<br>
    <input type="text" name="prix" value="<?= htmlspecialchars($prix) ?>"><br>

    Description:<br>
    <input type="text" name="description" value="<?= htmlspecialchars($description) ?>"><br>

    Catégorie:<br>
    <input type="text" name="categorie" value="<?= htmlspecialchars($categorie) ?>"><br>

    <button type="submit">Ajouter</button>
</form>

<a href="catalogue.php">return a catalogue</a>

</body>
</html>
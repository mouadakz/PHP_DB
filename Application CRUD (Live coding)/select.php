<?php

include 'config.php';

$sql="SELECT * FROM utilisateurs";
$stmt=$pdo->query($sql);
$listeUtilisateurs=$stmt->fetchAll(PDO::FETCH_ASSOC);

?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<a href="ajouter.php">Ajouter utilisateur</a>
<br><br>

<table border="1">
<tr>
    <th>id</th>
    <th>nom</th>
    <th>email</th>
    <th>tel</th>
    <th>age</th>
    <th>action</th>


</tr>

<?php
    foreach ($listeUtilisateurs as $user) {
        echo "<tr>";

        echo "<td>".$user['id']."</td>";
        echo "<td>".$user['nom']."</td>";
        echo "<td>".$user['email']."</td>";
        echo "<td>".$user['tel']."</td>";
        echo "<td>".$user['age']."</td>";

        echo "<td>
        
        <a href='modifier.php?id=".$user['id']."'>modifier</a>
        <a href='supremer.php?id=".$user['id']."'>supremer</a>

        </td>";

        echo "</tr>";
    }


?>
</table>
</body>
</html>
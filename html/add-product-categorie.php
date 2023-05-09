<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sélection de catégorie</title>
</head>

<body>
    <h1>Sélectionnez une catégorie</h1>
    <ul>
        <?php
        require_once('connexion.php');
        $sql = "SELECT * FROM sae203_categorie";
        $result = mysqli_query($CONNEXION, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<a href='add_product.php?id=" . $row['id_categorie'] . "&nom=" . $row['nom'] . "'>" . $row['nom'] . "</a><br>";


            }
        } else {
            echo "<li>Aucune catégorie trouvée</li>";
        }
        mysqli_close($CONNEXION);
        ?>

    </ul>

    <a href="index.php">Retour</a>
</body>

</html>

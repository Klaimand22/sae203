<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
</head>

<body>
    <?php


    require_once('connexion.php');
    $id = $_GET['id'];
    echo $id;
    $nom_categorie = $_GET['categorie'];
    echo $nom_categorie;
    $sql = "SELECT * FROM sae203_$nom_categorie WHERE id_$nom_categorie=$id";
    $result = mysqli_query($CONNEXION, $sql);
    $row = mysqli_fetch_assoc($result);


    ?>
    <form action="" method="post">
        <?php
        echo "<input type=\"hidden\" name=\"id_$nom_categorie\" value=\"\"> <br>";
        foreach ($row as $key => $value) {
            if ($key != "id_$nom_categorie" && $key != "sae203_categorie_id_categorie") {
                echo "<label for=\"$key\">$key :</label>";
                echo "<input type=\"text\" name=\"$key\" value=\"$value\" required><br>";
            }
        }

        echo "<button type=\"submit\" name=\"submit\">Modifier</button>";





        ?>
    </form>

    <?php
    require_once('connexion.php');
    if (isset($_POST['submit'])) {
        $sql_update = "UPDATE sae203_$nom_categorie SET ";
        foreach ($_POST as $key => $value) {
            if ($key != "id_$nom_categorie" && $key != "sae203_categorie_id_categorie" && $key != "submit") {
                $sql_update .= "$key = '$value', ";
            }
        }
        $sql_update = substr($sql_update, 0, -2);
        $sql_update .= " WHERE id_$nom_categorie = $id";
        echo $sql_update;
        $result_update = mysqli_query($CONNEXION, $sql_update);
        if ($result_update) {
            echo "<h1>Produit modifié</h1>";
            header("Location: $nom_categorie.php");
        } else {
            echo "<h1>Erreur lors de la modification</h1>";
        }
    }


    ?>

    <!-- bouton retour -->
    <a href="<?php echo $nom_categorie ?>.php">Retour</a>


</body>
<footer>

    <div class="credits">
        <p> © Michellod - Jandejsek - Triomphe | 2023</p>
    </div>

</footer>

</html>
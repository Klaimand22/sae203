<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
    <link rel="stylesheet" href="../css/modifier.css">
    <link rel="stylesheet" href="../css/global.css">
</head>
<?php include('menu.php'); ?>

<body>
    <div class="modifier">
        <h1>Modifier un produit</h1>
        <?php


        require_once('connexion.php');
        $id = $_GET['id'];
        $nom_categorie = $_GET['categorie'];
        $sql = "SELECT * FROM sae203_$nom_categorie WHERE id_$nom_categorie=$id";
        $result = mysqli_query($CONNEXION, $sql);
        $row = mysqli_fetch_assoc($result);


        ?>
        <form action="" method="post">
            <?php
            echo "<input type=\"hidden\" name=\"id_$nom_categorie\" value=\"\"> <br>";
            foreach ($row as $key => $value) {
                if ($key != "id_$nom_categorie" && $key != "sae203_categorie_id_categorie" && $key != "disponible" && $key != "date_mise_en_service" && $key != "sae203_image_id_image") {
                    echo "<label for=\"$key\">$key :</label>";
                    echo "<input type=\"text\" name=\"$key\" value=\"$value\" required><br>";
                }
            }

            if ($nom_categorie != "client") {
                echo "<label for=\"disponible\">Disponible :</label>";
                echo "<select name=\"disponible\" id=\"disponible\">";
                if ($row['disponible'] == 1) {
                    echo "<option value=\"1\" selected>Oui</option>";
                    echo "<option value=\"0\">Non</option>";
                } else {
                    echo "<option value=\"1\">Oui</option>";
                    echo "<option value=\"0\" selected>Non</option>";
                }
                echo "</select><br>";
                echo "<label for=\"date_mise_en_service\">Date de mise en service :</label>";
                echo "<input type=\"date\" name=\"date_mise_en_service\" value=\"" . $row['date_mise_en_service'] . "\" required><br>";
            }






            ?>
        <button type="submit" name="submit" onclick="windows.location.href='$nom_categorie.php'">Modifier</button>


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
            $result_update = mysqli_query($CONNEXION, $sql_update);
            if ($result_update) {
                echo "<h1>Produit modifié</h1>";
            } else {
                echo "<h1>Erreur lors de la modification</h1>";
            }
        }


        ?>

        <!-- bouton retour -->
        <a href="<?php echo $nom_categorie ?>.php">Retour</a>

    </div>
</body>
<footer>

    <div class="credits">
        <p> © Michellod - Jandejsek - Triomphe | 2023</p>
    </div>

</footer>

</html>
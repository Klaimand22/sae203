<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Focale Net</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/list_form.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/add_product.css">
</head>

<body>
    <?php include('menu.php'); ?>

    <div class="tableau-client">
        <?php
        require_once('connexion.php');

        $id_categorie = isset($_GET['id']) ? $_GET['id'] : '';
        $nom_categorie = isset($_GET['nom']) ? $_GET['nom'] : '';
        $table_name = "sae203_" . $nom_categorie;
        $sql_columns = "SHOW COLUMNS FROM $table_name";
        $result_columns = mysqli_query($CONNEXION, $sql_columns);
        $fichier = rand();
        echo "<h1>Ajouter un produit dans la catégorie $nom_categorie</h1>";
        ?>

        <h3>Remplissez les champs suivants</h3>

        <form method="POST" action="" enctype="multipart/form-data">
            <?php
            if (mysqli_num_rows($result_columns) > 0) {
                while ($column = mysqli_fetch_assoc($result_columns)) {
                    $column_name = $column['Field'];

                    if ($column_name != "id_$nom_categorie" && $column_name != "sae203_categorie_id_categorie" && $column_name != "sae203_image_id_image" && $column_name != "disponible" && $column_name != "date_mise_en_service") {
                        echo "<label for=\"$column_name\">$column_name :</label>";
                        echo "<input type=\"text\" name=\"$column_name\" required>";
                    }
                }
            ?>
                <label for="disponible">Disponible :</label>
                <select name="disponible" id="disponible">
                    <option value="1">Oui</option>
                    <option value="0">Non</option>
                </select>
                <label for="date_mise_en_service">Date de mise en service :</label>
                <input type="date" name="date_mise_en_service" required>
                <input type="hidden" name="sae203_categorie_id_categorie" value="<?php echo $id_categorie ?>">
                <input type="file" name="image" accept="image/png, image/jpeg">
                <input type="hidden" name="id-image" value="<?php echo $fichier ?>">
                <input type="submit" name="submit" value="Ajouter le produit">
            <?php } ?>

            <?php
            if (isset($_POST['submit'])) {
                if (isset($_FILES['image'])) {
                    $image = $_FILES['image'];
                    $fichier = $_POST['id-image'];
                    $extension = strtolower(substr($image['name'], -3));
                    $dossier = '../img/product/';

                    if (move_uploaded_file($image['tmp_name'], $dossier . $fichier . '.' . $extension)) {
                        echo $fichier;

                        $sql_insert_image = "INSERT INTO sae203_image VALUES ('$fichier', '$fichier', '$extension')";
                        if (mysqli_query($CONNEXION, $sql_insert_image)) {
                            echo "L'image a bien été ajoutée à la base de données";
                        } else {
                            echo "Erreur lors de l'ajout de l'image à la base de données";
                        }
                    } else {
                        echo "Erreur lors du téléchargement de l'image";
                    }
                }


                $sql_insert = "";
                $sql_insert = "INSERT INTO $table_name VALUES (NULL,";
                foreach ($_POST as $key => $value) {
                    if ($key != "submit") {
                        $sql_insert .= "'" . mysqli_real_escape_string($CONNEXION, $value) . "',";
                    }
                }

                $sql_insert = rtrim($sql_insert, ",");
                $sql_insert .= ")";
                echo "<p>$sql_insert</p>";

                if (mysqli_query($CONNEXION, $sql_insert)) {
                    echo "<h1>Produit ajouté avec succès</h1>";
                } else {
                    echo "<h1>Erreur lors de l'ajout du produit</h1>";
                    echo "<p>Erreur : " . mysqli_error($CONNEXION) . "</p>";
                }

                mysqli_close($CONNEXION);
            }
            ?>
        </form>
    </div>
</body>

</html>
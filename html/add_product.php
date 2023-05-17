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



</head>
<?php include('menu.php'); ?>


<body>
    <div class="tableau-client">

        <?php



        require_once('connexion.php');
        $id_categorie = $_GET['id'];
        $nom_categorie = $_GET['nom'];
        $table_name = "sae203_$nom_categorie";
        $sql_columns = "SHOW COLUMNS FROM $table_name";
        $result_columns = mysqli_query($CONNEXION, $sql_columns);



        echo "id_categorie = $id_categorie<br>";
        echo "nom_categorie = $nom_categorie<br>";
        echo "table_name = $table_name<br>";
        echo "sql_columns = $sql_columns<br>";
        echo "<h1>Ajouter un produit dans la catégorie $nom_categorie</h1>";

        ?>

        <h2>Formulaire d'ajout</h2>
        <h3>Remplissez les champs suivants</h3>

        <form method="POST" action="">
            <?php
            if (mysqli_num_rows($result_columns) > 0) {
                echo "<input type=\"hidden\" name=\"id_$nom_categorie\" value=\"\"> <br>";
                while ($column = mysqli_fetch_assoc($result_columns)) {
                    $column_name = $column['Field'];


                    if ($column_name != "id_$nom_categorie" && $column_name != "sae203_categorie_id_categorie" && $column_name != "sae203_image_id_image") {
                        echo "<label for=\"$column_name\">$column_name :</label>";
                        echo "<input type=\"text\" name=\"$column_name\" required><br>";
                    }
                }
            ?>

                <input type="hidden" name="sae203_categorie_id_categorie" value="<?php echo $id_categorie ?>"> <br>

                <input type="file" name="image" id="image" accept="image/png, image/jpeg">
                <button type="submit" name="submit">Ajouter</button>
            <?php






            } else {
                echo "<h1>La table ne contient pas de colonnes</h1>";
            }


            if (isset($_FILES['image'])) {
                $file_name = $_FILES['image']['name'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_destination = "../img/product/" . $file_name;

                if (move_uploaded_file($file_tmp, $file_destination)) {
                    // L'image a été téléchargée avec succès, vous pouvez maintenant utiliser $file_name ou $file_destination selon vos besoins
                } else {
                    // Une erreur s'est produite lors du téléchargement de l'image
                }
            }

            if (isset($_POST['submit'])) {



                $sql_insert_image = "INSERT INTO sae203_image VALUES (NULL, '$file_name', '$file_tmp')";



                $sql_insert = "INSERT INTO $table_name VALUES (";
                foreach ($_POST as $key => $value) {
                    if ($key != "submit") {
                        $sql_insert .= "'$value',";
                    }
                }

                $sql_insert = substr($sql_insert, 0, -1);
                $sql_insert .= ")";
                echo "<br>table name = $table_name<br>";
                echo "<br>sql_insert = $sql_insert<br>";
                $result_insert = mysqli_query($CONNEXION, $sql_insert);
                if ($result_insert) {
                    echo "<h1>Produit ajouté avec succès</h1>";
                } else {
                    echo "<h1>Erreur lors de l'ajout du produit</h1>";
                }
            }






            mysqli_close($CONNEXION);

            ?>

            <!-- back button -->
            <a href="index.php">Retour</a>









        </form>

    </div>


</body>

</html>
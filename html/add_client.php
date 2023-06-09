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
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/add_client.css">



</head>
<?php include('menu.php'); ?>

<body>
    <div class="add-client">
        <div class="form">
            <h2>Ajouter des clients</h2>
            <form action="add_client.php" method="post">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" required>
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" required>
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" id="adresse" required>
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" id="telephone" required>
                <label for="age">Âge</label>
                <input type="number" name="age" id="age" required>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" required>
                <input type="submit" value="Ajouter">
                <a href="client.php">Retour</a>
            </form>
        </div>




        <?php



        require_once('connexion.php');

        if (isset($_POST['nom'])) {
            $sql_insert = "INSERT INTO sae203_client (id_client, nom, prenom, adresse, telephone, age, email) VALUES (NULL, ";

            foreach ($_POST as $key => $value) {
                if ($key != "submit") {
                    $sql_insert .= "'$value', ";
                }
            }

            $sql_insert = substr($sql_insert, 0, -2);
            $sql_insert .= ")";

            $result_insert = mysqli_query($CONNEXION, $sql_insert);

            if ($result_insert) {
                echo "<h3>Client ajouté avec succès</h3>";
            } else {
                echo "<h3>Erreur</h3>";
                echo "Erreur: " . mysqli_error($CONNEXION);
            }
        }


        ?>
    </div>

</body>

</html>
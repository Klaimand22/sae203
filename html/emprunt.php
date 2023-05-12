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
        <h1>Liste des emprunts</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>idMarque</th>
                    <th>Modèle</th>
                    <th>Nom du client</th>
                    <th>Prénom du client</th>

                </tr>
            </thead>
            <tbody>
                <?php
                include_once "connexion.php";
                /* categorie = nom de page */
                $categorie = str_replace('.php', '', basename($_SERVER['SCRIPT_NAME']));


                /* Suppression ligne */
                if (isset($_POST['delete_id'])) {
                    $id = $_POST['delete_id'];
                    mysqli_query($CONNEXION, "DELETE FROM sae203_boitier WHERE id_boitier=$id");
                }

                /* Modification ligne */
                if (isset($_POST['edit_id'])) {
                    $id = $_POST['edit_id'];
                    header("Location: modifier.php?id=$id&categorie=$categorie");
                }


                $sql = mysqli_query($CONNEXION, "SELECT * FROM sae203_boitier INNER JOIN sae203_client ON sae203_boitier.id_client = sae203_client.id_client");
                while ($row = mysqli_fetch_assoc($sql)) {
                    echo "<tr>";
                    echo "<td>" . $row['id_boitier'] . "</td>";
                    echo "<td>" . $row['marque'] . "</td>";
                    echo "<td>" . $row['modele'] . "</td>";
                    echo "<td>" . $row['nom'] . "</td>";
                    echo "<td>" . $row['prenom'] . "</td>";
                    echo "</tr>";
                }



                ?>


            </tbody>

        </table>



    </div>





</body>
<footer>

    <div class="credits">
        <p> © Michellod - Jandejsek - Triomphe | 2023</p>
    </div>

</footer>

</html>
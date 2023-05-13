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
                    <th>Actions Rapides</th>

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



                $sql = mysqli_query($CONNEXION, "SELECT * FROM sae203_emprunt");
                if (mysqli_num_rows($sql) == 0) {
                    echo "Aucun emprunt enregistré";
                } else {

                }

                $sql = mysqli_query($CONNEXION, "SELECT *
                FROM sae203_emprunt
                JOIN sae203_categorie ON sae203_emprunt.sae203_categorie_id_categorie = sae203_categorie.id_categorie
                JOIN sae203_client ON sae203_emprunt.sae203_client_id_client = sae203_client.id_client
                JOIN sae203_boitier ON sae203_emprunt.id_emprunt = sae203_boitier.id_boitier");

                while ($row = mysqli_fetch_assoc($sql)) {
                ?>
                    <tr>
                        <td><?php echo $row['id_emprunt']; ?></td>
                        <td><?php echo $row['marque']; ?></td>
                        <td><?php echo $row['modele']; ?></td>
                        <td><?php echo $row['nom']; ?></td>
                        <td><?php echo $row['prenom']; ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id_emprunt']; ?>">
                                <button type="submit" name="edit_btn" class="btn btn-success">Modifier</button>

                            <form method="post">
                                <input type="hidden" name="delete_id" value="<?php echo $row['id_emprunt']; ?>">
                                <button type="submit" name="delete_btn" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>

                <?php
                }

                ?>

            </tbody>

        </table>





    </div>


    <button class="btn btn-primary" onclick="window.location.href='add-product-categorie.php'">Ajouter un emprunt</button>




</body>
<footer>

    <div class="credits">
        <p> © Michellod - Jandejsek - Triomphe | 2023</p>
    </div>

</footer>

</html>
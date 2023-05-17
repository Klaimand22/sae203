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

?>


</head>

<body>




    <div class="tableau-client">
        <h1>Liste des emprunts</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Client</th>
                    <th>Boitier</th>
                    <th>Date d'emprunt</th>
                    <th>Date de retour</th>
                    <th>Actions Rapides</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once "connexion.php";

                $sql = mysqli_query($CONNEXION, "SELECT * FROM sae203_emprunt");
                if (mysqli_num_rows($sql) == 0) {
                    echo "Aucun emprunt enregistré";
                } else {

                }

                $sql = mysqli_query($CONNEXION, "SELECT c.*
                FROM sae203_client c
                INNER JOIN sae203_emprunt e ON c.id_client = e.sae203_client_id_client;
                ");
                while ($row = mysqli_fetch_assoc($sql)) {
                    echo "<tr>";
                    echo "<td>" . $row['id_client'] . "</td>";
                    echo "<td>" . $row['nom'] . "</td>";
                    echo "<td>" . $row['prenom'] . "</td>";
                    echo "<td>" . $row['date_debut'] . "</td>";
                    echo "<td>" . $row['date_fin'] . "</td>";
                    echo "<input type='hidden' name='delete_id' value='" . $row['id_client'] . "'>";
                    echo "<button type='submit' name='delete_btn' class='btn btn-danger'>Supprimer</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>






    </div>


    <button class="btn btn-primary" onclick="window.location.href='add-product-categorie.php'">Ajouter un emprunt</button>




</body>
<footer>

    <div class="credits">
        <p> © Michellod - Jandejsek - Triomphe | 2023</p>
    </div>

</footer>

</html>
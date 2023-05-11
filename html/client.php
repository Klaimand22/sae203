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

<body>
    <?php include('menu.php'); ?>


    <div class="tableau-client">
        <h1>Liste client</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Actions Rapides</th>

                </tr>
            </thead>
            <tbody>
                <?php
                include_once "connexion.php";

                $categorie = str_replace('.php', '', basename($_SERVER['SCRIPT_NAME']));


                /* Suppression ligne */
                if (isset($_POST['delete_id'])) {
                    $id = $_POST['delete_id'];
                    mysqli_query($CONNEXION, "DELETE FROM sae203_client WHERE id_client=$id");
                }

                /* Modification ligne */
                if (isset($_POST['edit_id'])) {
                    $id = $_POST['edit_id'];
                    header("Location: modifier.php?id=$id&categorie=$categorie");
                }



                $sql = mysqli_query($CONNEXION, "SELECT * FROM sae203_client");
                if (mysqli_num_rows($sql) == 0) {
                    echo "Aucun client enregistré";
                } else {
                    while ($row = mysqli_fetch_assoc($sql)) {
                ?>
                        <tr>
                            <td><?= $row['id_client'] ?></td>
                            <td><?= $row['nom'] ?></td>
                            <td><?= $row['prenom'] ?></td>
                            <td><?= $row['adresse'] ?></td>
                            <td><?= $row['telephone'] ?></td>
                            <td><?= $row['age'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td>
                                <div>
                                    <!-- bouton modifier -->
                                    <form method="POST">
                                        <input type="hidden" name="edit_id" value="<?= $row["id_$categorie"] ?>">
                                        <button type="submit">Modifier</button>
                                    </form>
                                    <form method="POST">
                                        <input type="hidden" name="delete_id" value="<?= $row['id_client'] ?>">
                                        <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette ligne ?')">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>

        </table>

        <a href="add_client.php" class="btn-add">Ajouter un <?php echo str_replace('.php', '', basename($_SERVER['SCRIPT_NAME'])); ?></a>


    </div>






</body>

</html>
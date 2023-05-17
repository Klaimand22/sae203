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
        <h1>Liste des boitiers</h1>
        <table>
            <thead>
                <tr class="menutable">
                    <th>ID</th>
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Description</th>
                    <th>Référence</th>
                    <th>Disponible</th>
                    <th>Date de mise en service</th>
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

                /* Emprunter */
                if (isset($_POST['emprunter_id'])) {
                    $id = $_POST['emprunter_id'];
                    header("Location: emprunter.php?id=$id&categorie=$categorie");
                }

                $sql = mysqli_query($CONNEXION, "SELECT * FROM sae203_boitier");
                if (mysqli_num_rows($sql) == 0) {
                    echo "Aucun boitier enregistré";
                } else {
                    while ($row = mysqli_fetch_assoc($sql)) {
                ?>
                        <tr class="table">
                            <td class="descriptions"><?= $row['id_boitier'] ?></td>
                            <td class="descriptions"><?= $row['marque'] ?></td>
                            <td class="descriptions"><?= $row['modele'] ?></td>
                            <td class="descriptions"><?= $row['description'] ?></td>
                            <td class="descriptions"><?= $row['reference'] ?></td>
                            <td class="descriptions"><?= $row['disponible'] == 1 ? "Oui" : "Non" ?></td>
                            <td class="descriptions"><?= $row['date_mise_en_service'] ?></td>
                            <td>
                                <div>
                                    <!-- bouton modifier -->
                                    <form class="modifier" method="POST">
                                        <input type="hidden" name="edit_id" value="<?= $row["id_$categorie"] ?>">
                                        <button class="change" type="submit">Modifier</button>
                                    </form>
                                    <form class="modifier" method="POST">
                                        <input type="hidden" name="emprunter_id" value="<?= $row["id_$categorie"] ?>">
                                        <button class="borrow" type="submit">Emprunter</button>
                                    </form>
                                    <form class="modifier" method="POST">
                                        <input type="hidden" name="delete_id" value="<?= $row['id_boitier'] ?>">
                                        <button class="delete" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette ligne ?')">Supprimer</button>
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



    </div>

</body>
<footer>

<div class="credits">
                <p> © Michellod - Jandejsek - Triomphe | 2023</p>
</div>

</footer>
</html>
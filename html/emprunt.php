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
    if (isset($_POST['categorie'])) {
        $categorie = $_POST['categorie'];
    } else { // Si on arrive sur la page sans passer par le formulaire
        $categorie = str_replace('.php', '', basename($_SERVER['SCRIPT_NAME']));
    }
    /* Suppression ligne */
    if (isset($_POST['delete_id'])) {
        if (isset($_POST['categorie'])) {
            $categorie = $_POST['categorie'];
            $id = $_POST['delete_id'];

            // Mettre à jour la disponibilité dans la table correspondante
            $sql = "SELECT*
            FROM
                sae203_emprunt emp
                JOIN sae203_categorie cat ON emp.sae203_categorie_id_categorie = cat.id_categorie
                JOIN sae203_client cli ON emp.sae203_client_id_client = cli.id_client
                JOIN sae203_$categorie prod ON emp.id_produit = prod.id_$categorie;
            ";

            $result = mysqli_query($CONNEXION, $sql);
            $row = mysqli_fetch_assoc($result);
            $id_produit = $row['id_produit'];
            $updateQuery = "UPDATE sae203_$categorie SET disponible = 1 WHERE id_$categorie = $id_produit";
            $updateStmt = mysqli_prepare($CONNEXION, $updateQuery);
            mysqli_stmt_execute($updateStmt);


            // Supprimer l'emprunt de la table sae203_emprunt
            $deleteQuery = "DELETE FROM sae203_emprunt WHERE id_emprunt = ?";
            $deleteStmt = mysqli_prepare($CONNEXION, $deleteQuery);
            mysqli_stmt_bind_param($deleteStmt, "i", $id);
            mysqli_stmt_execute($deleteStmt);
        }
    }





    /* Modification ligne */
    if (isset($_POST['edit_id'])) {
        $id = $_POST['edit_id'];
        header("Location: modifier.php?id=$id&categorie=$categorie");
    }

    ?>


</head>

<body><?php include('menu.php'); ?>

    <div class="tableau-client">
        <h1>Liste des emprunts</h1>
        <table>
            <thead>
                <tr class="menutable">
                    <th>ID</th>
                    <th>Client</th>
                    <th>Produit</th>
                    <th>Date d'emprunt</th>
                    <th>Date de retour</th>
                    <th>Catégorie</th>
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


                    $sql = mysqli_query($CONNEXION, "SELECT em.id_emprunt, c.prenom, c.nom, c.telephone, cat.nom AS categorie, p.marque, p.modele, em.date_debut, em.date_fin
                FROM sae203_client c
                JOIN sae203_emprunt em ON c.id_client = em.sae203_client_id_client
                JOIN sae203_categorie cat ON em.sae203_categorie_id_categorie = cat.id_categorie
                LEFT JOIN sae203_boitier p ON em.id_produit = p.id_boitier
                LEFT JOIN sae203_carte_sd cs ON em.id_produit = cs.id_carte_sd
                LEFT JOIN sae203_accessoire ac ON em.id_produit = ac.id_accessoire
                LEFT JOIN sae203_objectif o ON em.id_produit = o.id_objectif;");
                    while ($row = mysqli_fetch_assoc($sql)) {
                ?>
                        <tr>
                            <td><?= $row['id_emprunt'] ?></td>
                            <td><?= $row['prenom'] ?> <?= $row['nom'] ?></td>
                            <td><?= $row['marque'] ?> <?= $row['modele'] ?></td>
                            <td><?= $row['date_debut'] ?></td>
                            <td><?= $row['date_fin'] ?></td>
                            <td><?= $row['categorie'] ?></td>
                            <td>
                                <div>


                                    <form class="modifier" action="" method="POST">
                                        <input type="hidden" name="delete_id" value="<?= $row['id_emprunt'] ?>">
                                        <input type="hidden" name="categorie" value="<?= $row['categorie'] ?>">
                                        <button class="delete" type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette ligne ?')">Supprimer</button>
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

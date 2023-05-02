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
</head>

<body>
    <header><?php include('menu-nav.php'); ?></header>
    <main>
        <div class="tableau-client">
            <h1>Liste des objectifs</h1>
            <table>
                <thead>
                    <tr>
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
                    /* Suppression ligne */
                    if (isset($_POST['delete_id'])) {
                        $id = $_POST['delete_id'];
                        mysqli_query($CONNEXION, "DELETE FROM sae203_objectif WHERE id_objectif=$id");
                    }


                    $sql = mysqli_query($CONNEXION, "SELECT * FROM sae203_objectif");
                    if (mysqli_num_rows($sql) == 0) {
                        echo "Aucun objectif enregistré";
                    } else {
                        while ($row = mysqli_fetch_assoc($sql)) {
                    ?>
                            <tr>
                                <td><?= $row['id_objectif'] ?></td>
                                <td><?= $row['marque'] ?></td>
                                <td><?= $row['modele'] ?></td>
                                <td><?= $row['description'] ?></td>
                                <td><?= $row['reference'] ?></td>
                                <td><?= $row['disponible'] == 1 ? "Oui" : "Non" ?></td>
                                <td><?= $row['date_mise_en_service'] ?></td>
                                <td>
                                    <div>
                                        <a href="#">Modifier</a>
                                        <form method="POST">
                                            <input type="hidden" name="delete_id" value="<?= $row['id_objectif'] ?>">
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
            <a href="add_objectif.php" class="btn-add">Ajouter un <?php echo str_replace('.php', '', basename($_SERVER['SCRIPT_NAME'])); ?></a>
        </div>
    </main>
</body>

</html>
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
            <h1>Liste des cartes SD</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marque</th>
                        <th>Modèle</th>
                        <th>Capacité (Go)</th>
                        <th>Classe de vitesse</th>
                        <th>Description</th>
                        <th>Référence</th>
                        <th>Disponible</th>
                        <th>Vitesse écriture</th>
                        <th>Date de mise en service</th>
                        <th>Actions Rapides</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once "connexion.php";
                    $sql = mysqli_query($CONNEXION, "SELECT * FROM sae203_carte_sd");
                    if (mysqli_num_rows($sql) == 0) {
                        echo "Aucune carte SD enregistrée";
                    } else {
                        while ($row = mysqli_fetch_assoc($sql)) {
                    ?>
                            <tr>

                                <td><?= $row['id_carte_sd'] ?></td>
                                <td><?= $row['marque'] ?></td>
                                <td><?= $row['modele'] ?></td>
                                <td><?= $row['capacite'] ?></td>
                                <td><?= $row['classe'] ?></td>
                                <td><?= $row['description'] ?></td>
                                <td><?= $row['reference'] ?></td>
                                <td><?= $row['vitesse_ecriture'] ?></td>
                                <td><?= $row['disponible'] == 1 ? "Oui" : "Non" ?></td>
                                <td><?= $row['date_mise_en_service'] ?></td>
                                <td>
                                    <div><a>Modifier</a><a>Supprimer</a></div>
                                </td>
                            </tr>
                    <?php
                        }
                    }

                    ?>
                </tbody>

            </table>

            <a href="add_carte_sd.php" class="btn-add">Ajouter une <?php echo str_replace('.php', '', basename($_SERVER['SCRIPT_NAME'])); ?></a>


        </div>

    </main>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emprunt de matériel</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/add_form.css">
</head>

<body>
    <header>
        <?php include('menu-nav.php'); ?>
    </header>
    <main>
        <?php
        include_once "connexion.php";

        ?>


        <form method="POST">
            <select name="client">
                <?php
                $sql = mysqli_query($CONNEXION, "SELECT * FROM sae203_client");
                if (mysqli_num_rows($sql) == 0) {
                    echo "Aucun client enregistré";
                } else {
                    while ($row = mysqli_fetch_assoc($sql)) {
                ?>
                        <option value="<?= $row['id_client'] ?>"><?= $row['nom'] ?></option>
                <?php
                    }
                }
                ?>
            </select>
            <select name="categorie">
                <?php
                $sql = mysqli_query($CONNEXION, "SELECT * FROM sae203_categorie");
                if (mysqli_num_rows($sql) == 0) {
                    echo "Aucune categorie enregistrée";
                } else {
                    while ($row = mysqli_fetch_assoc($sql)) {
                ?>
                        <option value="<?= $row['id_categorie'] ?>"><?= $row['categorie'] ?></option>
                        <?php $output = $row['categorie']; ?>

                <?php
                    }
                }
                ?>
            </select>

            <select name="object">
                <?php
                $sql = mysqli_query($CONNEXION, "SELECT * FROM sae203_$output");
                if (mysqli_num_rows($sql) == 0) {
                    echo "Aucun boitier enregistré";
                } else {
                    while ($row = mysqli_fetch_assoc($sql)) {
                ?>


                        <option value="<?= $row['id_boitier'] ?>"><?= $row['marque'] ?> <?= $row['modele'] ?> <?= $row['description'] ?></option>

                <?php
                    }
                }
                ?>
                <!-- date -->
                <label for="date_emprunt">Date d'emprunt</label>
                <input type="date" name="date_emprunt" required>
                <label for="date_retour">Date de retour</label>
                <input type="date" name="date_retour" required>


                <input type="submit" name="submit" value="Valider"> </input>
        </form>


    </main>


</body>

</html>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
    <link rel="stylesheet" href="../css/emprunter.css">
    <link rel="stylesheet" href="../css/global.css">
</head>
<?php include('menu.php'); ?>

<body>
    <div class="emprunt">
        <?php
        require_once('connexion.php');
        $id_produit = $_GET['id'];
        $nom_categorie = $_GET['categorie'];
        $id_sae203_categorie = 1;
        $sql = "SELECT * FROM sae203_$nom_categorie WHERE id_$nom_categorie=$id_produit";

        $sql_image = "SELECT * FROM sae203_$nom_categorie INNER JOIN sae203_image ON sae203_image.id_image = sae203_$nom_categorie.sae203_image_id_image WHERE id_$nom_categorie=$id_produit";
        $result_image = mysqli_query($CONNEXION, $sql_image);
        $row_image = mysqli_fetch_assoc($result_image);
        $path = $row_image['id_image'] . "." . $row_image['extension'];

        $result = mysqli_query($CONNEXION, $sql);
        $row = mysqli_fetch_assoc($result);

        ?>
        <h2> Emprunt du <?php echo $nom_categorie ?> </h2>
        <img src="../img/product/<?= $path ?>" alt="image du produit">

        <div class="info-product">
            <p>Marque : <?php echo $row['marque'] ?></p>
            <p>Modèle : <?php echo $row['modele'] ?></p>
            <p>Description : <?php echo $row['description'] ?></p>
            <p>Disponible : <?php if ($row['disponible'] == 1) {
                                echo "Oui";
                            } else {
                                echo "Non";
                            } ?></p>
        </div>

        <!-- selectionner un client  -->



        <form action="" method="POST">
            <input type="hidden" name="id" value="">
            <input type="hidden" name="produit" value="<?php echo $id_produit ?>">
            <input type="hidden" name="categorie" value="<?php echo $id_sae203_categorie ?>">
            <label for="client">Client</label>
            <select name="client" id="client">
                <?php
                include_once "connexion.php";
                $sql = "SELECT * FROM sae203_client";
                $result = mysqli_query($CONNEXION, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['id_client'] . "'>" . $row['nom'] . " " . $row['prenom'] . "</option>";
                }
                ?>
            </select>

            <br>
            <label for="date_debut">Date de début</label>
            <input type="date" name="date_debut" id="date_debut" required>
            <br>
            <label for="date_fin">Date de fin</label>
            <input type="date" name="date_fin" id="date_fin" required>
            <button type="submit" name="submit">Emprunter</button>



            <?php

            if (isset($_POST['submit'])) {
                $id_emprunt = $_POST['id'];
                $id_produit = $_POST['produit'];
                $sae203_categorie_id_categorie = $_POST['categorie'];
                $sae203_client_id_client = $_POST['client'];
                $date_debut = $_POST['date_debut'];
                $date_fin = $_POST['date_fin'];
            ?>

                <p>Emprunt du <?php echo $nom_categorie ?> <?php echo $id_produit ?></p>
                <p>Client : <?php echo $sae203_client_id_client ?></p>
                <p>Date de début : <?php echo $date_debut ?></p>
                <p>Date de fin : <?php echo $date_fin ?></p>
            <?php
                $sql = "INSERT INTO sae203_emprunt (id_emprunt, id_produit, sae203_categorie_id_categorie, sae203_client_id_client, date_debut, date_fin) VALUES (NULL, '$id_produit', '$sae203_categorie_id_categorie', '$sae203_client_id_client', '$date_debut', '$date_fin')";
                $result = mysqli_query($CONNEXION, $sql);
                if ($result) {
                    echo "L'emprunt a été ajouté";
                    $sql = "UPDATE sae203_$nom_categorie SET disponible=0 WHERE id_$nom_categorie=$id_produit";
                    $result = mysqli_query($CONNEXION, $sql);

                    if ($result) {
                        echo "Le produit a été marqué comme indisponible";
                    } else {
                        echo "Erreur : " . mysqli_error($CONNEXION);
                    }
                } else {
                    echo "Erreur : " . mysqli_error($CONNEXION);
                }
            }
            ?>

        </form>






        <a class="borrow" href="<?php echo $nom_categorie ?>.php">Retour</a>


    </div>
</body>

<footer>

    <div class="credits">
        <p> © Michellod - Jandejsek - Triomphe | 2023</p>
    </div>

</footer>

</html>
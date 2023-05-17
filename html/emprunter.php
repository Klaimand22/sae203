<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
</head>

<body>
    <h1>Emprunter un boitier</h1>

<?php
        require_once('connexion.php');
        $id = $_GET['id'];
        echo $id;
        $nom_categorie = $_GET['categorie'];
        echo $nom_categorie;
        $sql = "SELECT * FROM sae203_$nom_categorie WHERE id_$nom_categorie=$id";
        $result = mysqli_query($CONNEXION, $sql);
        $row = mysqli_fetch_assoc($result);

?>
    <h2> Emprunt du boitier <?php echo $row['id_boitier'] ?></h2>
    <p>Marque : <?php echo $row['marque'] ?></p>
    <p>Modèle : <?php echo $row['modele'] ?></p>
    <p>Description : <?php echo $row['description'] ?></p>
    <p>Référence : <?php echo $row['reference'] ?></p>
    <p>Disponible : <?php echo $row['disponible'] ?></p>
    <p>Image : <img src="<?php echo $row['image'] ?>" alt="image du boitier" width="200px"></p>


   <!-- selectionner un client  -->


    <form action="emprunter.php" method="POST">
    <form action="emprunter.php" method="POST">
    <label for="client">Client</label>
    <select name="client" id="client">
        <?php
        include_once "connexion.php";
        $sql = "SELECT * FROM sae203_client";
        $result = mysqli_query($CONNEXION, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['id_client'] . "'>" . $row['nom'] . "</option>";
        }
        ?>
    </select>
    <br>
    <label for="date_debut">Date de début</label>
    <input type="date" name="date_debut" id="date_debut" required>
    <br>
    <label for="date_fin">Date de fin</label>
    <input type="date" name="date_fin" id="date_fin" required>
    <br>
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <input type="hidden" name="categorie" value="<?php echo $nom_categorie ?>">
    <button type="submit" name="submit">Emprunter</button>
</form>

<?php
require_once('connexion.php');
if (isset($_POST['submit'])) {
    $id_client = $_POST['client'];
    $id_boitier = $_POST['id'];
    $nom_categorie = $_POST['categorie'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $sql = "INSERT INTO sae203_emprunt (id_emprunt, sae203_categorie_id_categorie, sae203_client_id_client, date_debut, date_fin) VALUES (NULL, $id_boitier, $id_client, '$date_debut', '$date_fin')";
    $result = mysqli_query($CONNEXION, $sql);
    if ($result) {
        $sql_update = "UPDATE sae203_$nom_categorie SET disponible = 0 WHERE id_$nom_categorie = $id_boitier";
        $result_update = mysqli_query($CONNEXION, $sql_update);
        if ($result_update) {
            echo "Le boitier a bien été emprunté";
        } else {
            echo "Erreur lors de l'emprunt";
        }
    }
}


?>

    <a href="<?php echo $nom_categorie ?>.php">Retour</a>


</body>
<footer>

<div class="credits">
                <p> © Michellod - Jandejsek - Triomphe | 2023</p>
</div>

</footer>
</html>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
</head>
<!-- <?php include('menu.php'); ?> -->

<body>
    <h1>Emprunter un boitier</h1>

<?php
        require_once('connexion.php');
        $id_produit = $_GET['id'];
        echo $id_produit;
        $nom_categorie = $_GET['categorie'];
        echo $nom_categorie;
        $sql = "SELECT * FROM sae203_$nom_categorie WHERE id_$nom_categorie=$id_produit";
        $result = mysqli_query($CONNEXION, $sql);
        $row = mysqli_fetch_assoc($result);

?>
    <h2> Emprunt du <?php echo $nom_categorie ?> <?php echo $id_produit ?></h2>
    <p>Marque : <?php echo $row['marque'] ?></p>
    <p>Modèle : <?php echo $row['modele'] ?></p>
    <p>Description : <?php echo $row['description'] ?></p>
    <p>Référence : <?php echo $row['reference'] ?></p>
    <p>Disponible : <?php if ($row['disponible'] == 1) {
        echo "Oui";
    } else {
        echo "Non";
    } ?></p>
    <p>Image : <img src="<?php echo $row['image'] ?>" alt="image du boitier" width="200px"></p>


   <!-- selectionner un client  -->


    <form action="" method="POST">
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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $categorie = $_POST['categorie'];
    $client = $_POST['client'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $sql = "INSERT INTO sae203_emprunt (id_emprunt, sae203_categorie_id_categorie, sae203_client_id_client, date_debut, date_fin) VALUES ('', '$categorie', '$client' '$date_debut', '$date_fin')";
    echo $sql;
    $result = mysqli_query($CONNEXION, $sql);
    if ($result) {
        echo "Emprunt ajouté";
    } else {
        echo "Erreur : " . mysqli_error($CONNEXION);
    }
}
    echo $sql;
?>


    <a href="<?php echo $nom_categorie ?>.php">Retour</a>


</body>
<footer>

<div class="credits">
                <p> © Michellod - Jandejsek - Triomphe | 2023</p>
</div>

</footer>
</html>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un boitier</title>
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
        <div class="container">
            <h1>Ajouter un boitier</h1>
            <form method="POST" action="add_boitier.php">
                <div class="form-group">
                    <label for="marque">Marque</label>
                    <input type="text" name="marque" required>
                </div>

                <div class="form-group">
                    <label for="modele">Modèle</label>
                    <input type="text" name="modele" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" required></textarea>
                </div>

                <div class="form-group">
                    <label for="reference">Référence</label>
                    <input type="text" name="reference" required>
                </div>

                <div class="form-group">
                    <label for="disponible">Disponible</label>
                    <select name="disponible" required>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="date_mise_en_service">Date de mise en service</label>
                    <input type="date" name="date_mise_en_service" required>
                </div>
                <div class="form-group">
                    <label for="categorie">Catégorie</label>
                    <select name="id_categorie" required>
                        <?php
                        include_once "connexion.php";
                        $sql = mysqli_query($CONNEXION, "SELECT * FROM sae203_categorie");
                        while ($row = mysqli_fetch_assoc($sql)) {
                        ?>
                            <option value="<?= $row['id_categorie'] ?>"><?= $row['categorie'] ?></option>
                        <?php
                        }
                        ?>
                </div>

                <button type="submit">Ajouter</button>
            </form>
        </div>
    </main>
</body>
<?php



  require_once('connexion.php');
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $description = $_POST['description'];
    $reference = $_POST['reference'];
    $disponible = $_POST['disponible'];
    $date_mise_en_service = $_POST['date_mise_en_service'];
    $categorie = $_POST['id_categorie'];
    $requete = "INSERT INTO sae203_boitier (marque, modele, description, reference, disponible, date_mise_en_service, id_categorie) VALUES ('$marque', '$modele', '$description', '$reference', '$disponible', '$date_mise_en_service', '$categorie')";

    if (mysqli_query($CONNEXION, $requete)) {
        echo "Ajouté avec succès";
    } else {
        echo "Erreur : " . $requete . "<br>" . mysqli_error($CONNEXION);
    }
}
    mysqli_close($CONNEXION);

?>
</html>

<!-- create modifier.php -->
<?php
include_once "connexion.php";

if (isset($_POST['id_boitier'])) {
    $id_boitier = $_POST['id_boitier'];
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $description = $_POST['description'];
    $reference = $_POST['reference'];
    $disponible = $_POST['disponible'];
    $date_mise_en_service = $_POST['date_mise_en_service'];

    mysqli_query($CONNEXION, "UPDATE sae203_boitier SET marque='$marque', modele='$modele', description='$description', reference='$reference', disponible='$disponible', date_mise_en_service='$date_mise_en_service' WHERE id_boitier=$id_boitier");
    header("Location: boitier.php");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = mysqli_query($CONNEXION, "SELECT * FROM sae203_boitier WHERE id_boitier=$id");
    $row = mysqli_fetch_assoc($sql);
} else {
    header("Location: boitier.php");
}
?>
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
    <form action="modifier_boitier.php" method="post">
        <input type="hidden" name="id_boitier" value="<?= $row['id_boitier'] ?>">
        <label for="marque">Marque</label>
        <input type="text" name="marque" id="marque" value="<?= $row['marque'] ?>">
        <label for="modele">Modèle</label>
        <input type="text" name="modele" id="modele" value="<?= $row['modele'] ?>">
        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="<?= $row['description'] ?>">
        <label for="reference">Référence</label>
        <input type="text" name="reference" id="reference" value="<?= $row['reference'] ?>">
        <label for="disponible">Disponible</label>
        <input type="text" name="disponible" id="disponible" value="<?= $row['disponible'] ?>">
        <label for="date_mise_en_service">Date de mise en service</label>
        <input type="text" name="date_mise_en_service" id="date_mise_en_service" value="<?= $row['date_mise_en_service'] ?>">
        <input type="submit" value="Modifier">
    </form>
</body>

</html>

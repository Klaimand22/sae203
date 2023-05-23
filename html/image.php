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
<?php include('menu.php');
require_once('connexion.php');

?>




<body>

<h1>Ajouter une image</h1>
<form method="POST" action="image.php" enctype="multipart/form-data">
    <input type="file" name="image" accept="image/png, image/jpeg">
    <input type="submit" value="Envoyer">
</form>
<?php
if (isset($_FILES['image'])) {


    $dossier = '../img/product/';
    $extension = ".";
    $extension .= pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

    $fichier = rand();
    echo "<h1>Extension : $extension</h1>";
    echo "<h1>Fichier : $fichier</h1>";


    if (move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier . $extension)) {
        echo "L'image a bien été ajoutée";
    } else {
        echo "L'image n'a pas pu être ajoutée";
    }

}
if (isset($_FILES['image'])) {
    $sql = "INSERT INTO sae203_image VALUES ('$fichier', '$fichier')";
    mysqli_query($CONNEXION, $sql);
    echo "L'image a bien été ajoutée";
}


mysqli_close($CONNEXION);

?>


</body>

</html>
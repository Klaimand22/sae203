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
    <link rel="stylesheet" href="../css/add_form.css">


</head>

<body>
<header><?php include('menu-nav.php'); ?></header>
    <main>
        <div class="form">
            <h2>Ajouter des clients</h2>
            <form action="add_client.php" method="post">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" id="adresse">
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" id="telephone">
                <label for="age">Age</label>
                <input type="text" name="age" id="age">
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
                <input type="submit" value="Ajouter">
            </form>




        </div>

    </main>



</body>

<?php



  require_once('connexion.php');
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    $requete = "INSERT INTO sae203_client (nom, prenom, adresse, telephone, age, email) VALUES ('$nom', '$prenom', '$adresse', '$telephone', '$age', '$email')";
    $resultat = mysqli_query($CONNEXION, $requete);
    if ($resultat) {
        echo "<p>Le client a bien été ajouté</p>";
    } else {
        echo "<p>Erreur lors de l'ajout du client</p>";
    }
}
    mysqli_close($CONNEXION);

?>

</html>

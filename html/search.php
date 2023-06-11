<?php
define('SERVEUR_BD', 'localhost');
define('LOGIN_BD', 'root');
define('PASS_BD', '');
define('NOM_BD', 'sae203');

$CONNEXION = mysqli_connect(SERVEUR_BD, LOGIN_BD, PASS_BD);
if (!$CONNEXION) {
    die("Connexion échouée : " . mysqli_connect_error());
}

mysqli_select_db($CONNEXION, NOM_BD);

// Récupérer la valeur de recherche
$searchValue = $_GET['searchValue'];

// Requête SQL pour rechercher dans la base de données
$query = "SELECT * FROM sae203_client WHERE nom LIKE '%$searchValue%'";

$result = mysqli_query($CONNEXION, $query);

// Tableau pour stocker les résultats de la recherche
$searchResults = array();

// Parcourir les résultats de la requête et les ajouter au tableau de résultats
while ($row = mysqli_fetch_assoc($result)) {
    $searchResults[] = $row;
}

// Fermer la connexion à la base de données
mysqli_close($CONNEXION);

// Renvoyer les résultats de recherche au format JSON
header('Content-Type: application/json');
echo json_encode($searchResults);



try {
    // Votre code de requête SQL ici
    $CONNEXION = mysqli_connect(SERVEUR_BD, LOGIN_BD, PASS_BD);
    if (!$CONNEXION) {
        die("Connexion échouée : " . mysqli_connect_error());
    }
    $searchValue = $_GET['searchValue'];
    $query = "SELECT * FROM sae203_client WHERE nom LIKE '%$searchValue%'";
    $result = mysqli_query($CONNEXION, $query);


    // Renvoyer les résultats de recherche au format JSON
    header('Content-Type: application/json');
    echo json_encode($searchResults);
} catch (Exception $e) {
    // En cas d'erreur, renvoyer un message d'erreur au format JSON
    header('Content-Type: application/json');
    echo json_encode(array('error' => $e->getMessage()));
}

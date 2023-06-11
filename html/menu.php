<!DOCTYPE html">
<html lang="fr">

<head>
    <script src="https://kit.fontawesome.com/7f4a80579c.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Menu</title>


</head>
<div class="menu">

    <img src="../img/logoblanc.svg" alt="logo">





    <ul>
        <li><i class="fa-solid fa-house-user"></i><a href="index.php">Accueil</a></li>



        <a href="boitier.php">
            <li><i class="fa-solid fa-camera"></i>Boitier</li>
        </a>
        <a href="objectif.php">
            <li><i class="fa-solid fa-phone"></i>Objectif</li>
        </a>
        <a href="accessoire.php">
            <li><i class="fa-solid fa-sitemap"></i>Accessoire</li>
        </a>
        <a href="carte_sd.php">
            <li><i class="fa-solid fa-sd-card"></i>Carte SD</li>
        </a>
        <a href="client.php">
            <li><i class="fa-solid fa-user"></i>Client</li>
        </a>
        <a href="add-product-categorie.php">
            <li><i class="fa-solid fa-plus"></i>Ajouter un <i class="produit">produit
                </i>
            </li>
        </a>
        <a href="emprunt.php">
            <li><i class="fa-solid fa-credit-card"></i>Emprunt</li>
        </a>
    </ul>
</div>

<body>




    <header>
        <div>
            <a href=" index.php"><i class="fa-solid fa-house-user"></i>Home /</a><a> <?php
                                                                                        // Obtient le nom de la page actuelle avec l'extension
                                                                                        $currentPage = basename($_SERVER['PHP_SELF']);

                                                                                        // Enlève l'extension du nom de fichier
                                                                                        $currentPageWithoutExtension = pathinfo($currentPage, PATHINFO_FILENAME);

                                                                                        // Affiche le nom de la page sans l'extension
                                                                                        $currentPageWithoutExtension = ucfirst($currentPageWithoutExtension);
                                                                                        echo $currentPageWithoutExtension;
                                                                                        ?>
            </a>
        </div>

        <div class="search">
            <input type="text" id="searchInput" placeholder="Recherche">
            <i class="fa-solid fa-search"></i>
            <div id="searchResults"></div>

        </div>

    </header>


</body>

<script>
    $(document).ready(function() {
        // Écouteur d'événement pour le champ de recherche
        $('#searchInput').on('input', function() {
            // Récupérer la valeur du champ de recherche
            var searchTerm = $(this).val();

            // Effectuer une requête AJAX
            $.ajax({
                url: 'search.php',
                method: 'GET',
                data: {
                    search: searchTerm
                },
                dataType: 'json',
                success: function(data) {
                    // Afficher les résultats dans la console du navigateur
                    console.log(data);
                },
                error: function(xhr, status, error) {
                    // Afficher une erreur en cas de problème avec la requête AJAX
                    console.log('Erreur AJAX:', status, error);
                }
            });
        });
    });
</script>



</html>
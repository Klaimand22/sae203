<!DOCTYPE html">
<html lang="fr">

<head>
    <script src="https://kit.fontawesome.com/7f4a80579c.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.6.4.min.js"></script>


</head>
<div class="menu">

    <img src="../img/logoblanc.svg" alt="logo">





    <ul>
        <li><i class="fa-solid fa-house-user"></i><a href="index.php">Accueil</a></li>



        <li><i class="fa-solid fa-camera"></i><a href="boitier.php">Boitier</a></li>
        <li><i class="fa-solid fa-phone"></i><a href="objectif.php">Objectif</a></li>
        <li><i class="fa-solid fa-sitemap"></i><a href="accessoire.php">Accessoire</a></li>
        <li><i class="fa-solid fa-sd-card"></i><a href="carte_sd.php">Carte SD</a></li>
        <li><i class="fa-solid fa-user"></i><a href="client.php">Client</a></li>
        <li><i class="fa-solid fa-plus"></i><a href="add-product-categorie.php">Ajouter un </a><a class="produit">produit</a></li>
        <li><i class="fa-solid fa-credit-card"></i><a href="emprunt.php">Emprunt</a></li>
        <li><i class="fa-solid fa-phone"></i><a href="contact.html">Contact</a></li>
    </ul>


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
            <input type="text" placeholder="Rechercher">
            <i class="fa-solid fa-search"></i>
        </div>

    </header>


</body>

<footer>

</footer>

</html>
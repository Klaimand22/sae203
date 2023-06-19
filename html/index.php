<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Focale Net</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/list_form.css">

</head>

<?php include('menu.php'); ?>

<body>
    <div class="title-grid-case">
        <h1>Stockage</h1>
    </div>
    <div class="grid-case">
        <a href="boitier.php">
            <div class="yellow">
                <h3>
                    <span class="count-php">
                        <?php
                        include_once "connexion.php";
                        $sql = mysqli_query($CONNEXION, "SELECT COUNT(*) FROM sae203_boitier");
                        $row = mysqli_fetch_assoc($sql);
                        echo $row['COUNT(*)'];
                        ?>
                    </span>
                    Boitiers
                </h3>
            </div>
        </a>
        <a href="objectif.php">
            <div class="blue">
                <h3>
                    <span class="count-php">
                        <?php
                        include_once "connexion.php";
                        $sql = mysqli_query($CONNEXION, "SELECT COUNT(*) FROM sae203_objectif");
                        $row = mysqli_fetch_assoc($sql);
                        echo $row['COUNT(*)'];
                        ?>
                    </span>
                    Objectifs
                </h3>
            </div>
        </a>
        <a href="accessoire.php">
            <div class="brown">
                <h3>
                    <span class="count-php">
                        <?php
                        include_once "connexion.php";
                        $sql = mysqli_query($CONNEXION, "SELECT COUNT(*) FROM sae203_accessoire");
                        $row = mysqli_fetch_assoc($sql);
                        echo $row['COUNT(*)'];
                        ?>
                    </span>
                    Accessoires
                </h3>
            </div>
        </a>
        <a href="carte_sd.php">
            <div class="pink">
                <h3>
                    <span class="count-php">
                        <?php
                        include_once "connexion.php";
                        $sql = mysqli_query($CONNEXION, "SELECT COUNT(*) FROM sae203_carte_sd");
                        $row = mysqli_fetch_assoc($sql);
                        echo $row['COUNT(*)'];
                        ?>
                    </span>
                    Cartes SD
                </h3>
            </div>
        </a>
        <a href="emprunt.php">
            <div class="red">
                <h3>
                    <span class="count-php">
                        <?php
                        include_once "connexion.php";
                        $sql = mysqli_query($CONNEXION, "SELECT COUNT(*) FROM sae203_emprunt");
                        $row = mysqli_fetch_assoc($sql);
                        echo $row['COUNT(*)'];
                        ?>
                    </span>
                    Emprunt
                </h3>
            </div>
        </a>
        <a href="client.php">
            <div class="green">
                <h3>
                    <span class="count-php">
                        <?php
                        include_once "connexion.php";
                        $sql = mysqli_query($CONNEXION, "SELECT COUNT(*) FROM sae203_client");
                        $row = mysqli_fetch_assoc($sql);
                        echo $row['COUNT(*)'];
                        ?>
                    </span>
                    Clients
                </h3>
            </div>
        </a>



    </div>
    <footer>
        <div class="credits">
            <p> © Michellod - Jandejsek - Triomphe | 2023</p>
        </div>

    </footer>
</body>

</html>
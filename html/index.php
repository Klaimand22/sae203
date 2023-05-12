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

</head>

<?php include('menu.php'); ?>

<body>



    <div class="grid-case">
        <div>
            <h3><!-- count in php -->
                <?php
                include_once "connexion.php";
                $sql = mysqli_query($CONNEXION, "SELECT COUNT(*) FROM sae203_boitier");
                $row = mysqli_fetch_assoc($sql);
                echo $row['COUNT(*)'];
                ?>

                Boitier</h3>
        </div>
        <div>
            <h3><?php
                include_once "connexion.php";
                $sql = mysqli_query($CONNEXION, "SELECT COUNT(*) FROM sae203_objectif");
                $row = mysqli_fetch_assoc($sql);
                echo $row['COUNT(*)'];
                ?> Objectifs</h3>
        </div>
        <div>
            <h3><?php
                include_once "connexion.php";
                $sql = mysqli_query($CONNEXION, "SELECT COUNT(*) FROM sae203_accessoire");
                $row = mysqli_fetch_assoc($sql);
                echo $row['COUNT(*)'];
                ?> Accessoires</h3>
        </div>
        <div>
            <h3><?php
                include_once "connexion.php";
                $sql = mysqli_query($CONNEXION, "SELECT COUNT(*) FROM sae203_carte_sd");
                $row = mysqli_fetch_assoc($sql);
                echo $row['COUNT(*)'];
                ?> Cartes SD</h3>
        </div>
        <div>
            <h3><?php
                include_once "connexion.php";
                $sql = mysqli_query($CONNEXION, "SELECT COUNT(*) FROM sae203_emprunt");
                $row = mysqli_fetch_assoc($sql);
                echo $row['COUNT(*)'];
                ?> Emprunt</h3>
        </div>
        <div>
            <h3><?php
                include_once "connexion.php";
                $sql = mysqli_query($CONNEXION, "SELECT COUNT(*) FROM sae203_client");
                $row = mysqli_fetch_assoc($sql);
                echo $row['COUNT(*)'];
                ?> client</h3>
        </div>


        </main>

</body>
<footer>

<div class="credits">
    <p> © Michellod - Jandejsek - Triomphe | 2023</p>
</div>

</footer>
</html>
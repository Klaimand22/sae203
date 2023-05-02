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
<header><?php include('menu-nav.php'); ?></header>
    <main>

        <div class="tableau-client">
        <h1>Liste client</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Actions Rapides</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once "connexion.php";
                    $sql = mysqli_query($CONNEXION, "SELECT * FROM sae203_client");
                    if(mysqli_num_rows($sql)==0){
                        echo "Aucun client enregistré";
                    }
                    else{
                        while($row = mysqli_fetch_assoc($sql)){
                            ?>
                            <tr>

                            <td><?=$row['id_client']?></td>
                            <td><?=$row['nom']?></td>
                            <td><?=$row['prenom']?></td>
                            <td><?=$row['adresse']?></td>
                            <td><?=$row['telephone']?></td>
                            <td><?=$row['age']?></td>
                            <td><?=$row['email']?></td>
                            <td><div><a>Modifier</a><a>Supprimer</a></div></td>
                            </tr>
                            <?php
                        }
                    }

                        ?>
                </tbody>

            </table>

            <a href="add_client.php" class="btn-add">Ajouter un <?php echo str_replace('.php', '', basename($_SERVER['SCRIPT_NAME'])); ?></a>


            </div>


    </main>



</body>

</html>
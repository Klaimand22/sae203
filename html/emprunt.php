<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emprunt de matériel</title>
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
            <h1>Emprunt de matériel</h1>
            <form method="POST" action="add_emprunt.php">
                <div class="form-group">
                    <label for="client_id">Client</label>
                    <select name="client_id" required>
                        <option value="">Sélectionnez un client</option>
                        <?php
                        require_once('connexion.php');
                        $sql = "SELECT * FROM sae203_client ORDER BY nom ASC";
                        $result = mysqli_query($CONNEXION, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row["id_client"] . "'>" . $row["prenom"] . " " . $row["nom"] . "</option>";
                        }
                        mysqli_free_result($result);
                        mysqli_close($CONNEXION);
                        ?>
                    </select>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
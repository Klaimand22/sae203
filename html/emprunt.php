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
                        $sql = "SELECT * FROM client ORDER BY Nom ASC";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row["id_client"] . "'>" . $row["Prenom"] . " " . $row["Nom"] . "</option>";
                        }
                        mysqli_free_result($result);
                        mysqli_close($conn);
                        ?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="materiel_id">Matériel</label>
                    <select name="materiel_id" required>
                        <option value="">Sélectionnez un matériel</option>
                        <?php
                        require_once('connexion.php');
                        $sql = "SELECT * FROM boitier UNION SELECT * FROM objectif UNION SELECT * FROM carte_sd UNION SELECT * FROM accessoire ORDER BY nom ASC";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["id"] . "'>" . $row["nom"] . " - " . $row["marque"] . " - " . $row["modele"] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date_debut">Date de début</label>
                    <input type="date" name="date_debut" required>
                </div>
                <div class="form-group">
                    <label for="date_fin">Date de fin</label>
                    <input type="date" name="date_fin" required>
                </div>
                <button type="submit">Valider</button>
            </form>
        </div>
    </main>
</body>

</html>

<div class="tableau-client">
            <h1>Liste client</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once "connexion.php";


                    /* Suppression ligne */
                    if (isset($_POST['delete_id'])) {
                        $id = $_POST['delete_id'];
                        mysqli_query($CONNEXION, "DELETE FROM sae203_categorie WHERE id_client=$id");
                    }



                    $sql = mysqli_query($CONNEXION, "SELECT * FROM sae203_categorie");
                    if (mysqli_num_rows($sql) == 0) {
                        echo "Aucun client enregistré";
                    } else {
                        while ($row = mysqli_fetch_assoc($sql)) {
                    ?>
                            <tr>
                                <td><?= $row['id_categorie'] ?></td>
                                <td><?= $row['categorie'] ?></td>
                              </tr>
                    <?php
                        }
                    }
                    ?>

                    <!-- select product in categorie -->
                    <form method="POST">
                        <select name="categorie">
                            <?php
                            $sql = mysqli_query($CONNEXION, "SELECT * FROM sae203_categorie");
                            if (mysqli_num_rows($sql) == 0) {
                                echo "Aucun client enregistré";
                            } else {
                                while ($row = mysqli_fetch_assoc($sql)) {
                            ?>
                                    <option value="<?= $row['id_categorie'] ?>"><?= $row['categorie'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                        <input type="submit" name="submit" value="Valider"> </input>
                    </form>



                </tbody>

            </table>

            <a href="add_client.php" class="btn-add">Ajouter un <?php echo str_replace('.php', '', basename($_SERVER['SCRIPT_NAME'])); ?></a>


        </div>
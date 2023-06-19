<?php
include_once "connexion.php";

$name = $_POST['name'];

$req = mysqli_query($CONNEXION, "SELECT * FROM client WHERE name LIKE '%$name%'");

$data = '';

while($row = mysqli_fetch_assoc($req)){
    ?>
        <tr>


    <?php
}

echo $data;

?>
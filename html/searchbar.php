<?php
include_once "connexion.php";

$name = $_POST['name'];

$req = mysqli_query($CONNEXION, "SELECT * FROM sae203_client where nom like '%$name%'");

$data = '';

while ($row = mysqli_fetch_array($req)) {
    $data .= '<p>' . $row['nom'] . '</p>';
}

echo $data;
?>
</footer>

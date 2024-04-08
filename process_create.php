<?php
require_once("config.php");
require_once("Billet.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $billet = new Billet($conn);
    $destination = $_POST['destination'];
    $date_reservation = $_POST['date_reservation'];
    $heure_reservation = $_POST['heure_reservation'];
    $prix = $_POST['prix'];

    $billet->create($destination, $date_reservation, $heure_reservation, $prix);

    header("Location: index.php");
    exit;
}
?>
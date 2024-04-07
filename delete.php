<?php
require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['billet_id'])) {
    $billet_id = $_POST['billet_id'];

    try {
        $stmt = $conn->prepare("DELETE FROM billet WHERE id_billet = :billet_id");
        $stmt->bindParam(':billet_id', $billet_id);
        $stmt->execute();

        header("location: confirmation_suppression.php");
        exit();

    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

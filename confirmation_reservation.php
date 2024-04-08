<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - Réservation de billets de voyage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="contain_logo"></div>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="reservation.php">Réservation</a></li>
            
            </ul>
        </nav>
    </header>

    <?php
require_once("config.php");
$billet_id = $_GET['billet_id'];

try {
    $stmt = $conn->prepare("SELECT * FROM billet WHERE id_billet = :billet_id");
    $stmt->bindParam(':billet_id', $billet_id);
    $stmt->execute();
    $billet = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "<div class='billet-details'>";
    echo "<h2>Confirmation de Réservation</h2>";
    echo "<p>Merci pour votre réservation !</p>";
    echo "<p>Vous avez réservé le billet numéro $billet_id pour la destination {$billet['destination']}.</p>";
    echo "<p class='status-reserve'>Statut du billet: {$billet['statut']}</p>";
    echo "<h3>Détails du billet réservé :</h3>";
    echo "<p class='detail-label'>Date de réservation: {$billet['date_réservation']}</p>";
    echo "<p class='detail-label'>Heure de réservation: {$billet['heure_réservation']}</p>";
    echo "<p class='detail-label'>Prix: {$billet['prix']}</p>";
    echo "</div>";
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

   
</body>
</html>



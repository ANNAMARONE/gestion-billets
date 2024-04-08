<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Détails du billet</title>
</head>
<body>
<header>
        <div class="contain_logo"></div>
        <nav>
            <ul>
                <li><a href="acceuil.php">Accueil</a></li>
                <li><a href="index.php">liste des billets</a></li>
                <li><a href="create.php">Réservation</a></li>
            
            </ul>
        </nav>
        <div class="connect-button">
            <a href="login.php"><button>Se connecter</button></a>
        </div>
    </header>
<?php
require_once("config.php");

// Vérifier si l'ID du billet est passé en paramètre GET
if(isset($_GET['billet_id'])) {
    $billet_id = $_GET['billet_id'];
    try {
        // Récupération des détails du billet
        $stmt = $conn->prepare("SELECT * FROM billets WHERE id = :billet_id");
        $stmt->bindParam(':billet_id', $billet_id);
        $stmt->execute();
        $billet = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($billet) {
            // Affichage des détails du billet
            echo "<h2>Détails du billet</h2>";
            echo "Destination : " . $billet['destination'] . "<br>";
            echo "Date de réservation : " . $billet['date_reservation'] . "<br>";
            echo "Heure de réservation : " . $billet['heure_reservation'] . "<br>";
            echo "Prix : " . $billet['prix'] . "<br>";

            // Vérifier s'il y a un client associé
            if($billet['client_id']) {
                $client_id = $billet['client_id'];
                // Récupération des détails du client
                $stmt = $conn->prepare("SELECT * FROM clients WHERE id = :client_id");
                $stmt->bindParam(':client_id', $client_id);
                $stmt->execute();
                $client = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // Affichage des détails du client
                if($client) {
                    echo "<h3>Détails du client</h3>";
                    echo "Nom : " . $client['nom'] . "<br>";
                    echo "Prénom : " . $client['prenom'] . "<br>";
                    echo "Adresse : " . $client['adresse'] . "<br>";
                    echo "Email : " . $client['email'] . "<br>";
                    echo "Numéro de téléphone : " . $client['numero_telephone'] . "<br>";
                    echo "Numéro de passeport : " . $client['numero_passport'] . "<br>";
                }
            } else {
                echo "Aucun client associé à ce billet.";
            }
        } else {
            echo "Billet non trouvé.";
        }
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "Aucun ID de billet spécifié.";
}
?>
 <footer>
        <p>&copy; 2024 Somplon Travel </p>
    </footer>
</body>
</html>


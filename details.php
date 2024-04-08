<?php
function details($conn, $billet_id) {
    try {
        // Récupération des détails du billet
        $stmt = $conn->prepare("SELECT * FROM billet WHERE id_billet = :billet_id");
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

            // S'il y a un client associé, afficher ses détails
            if($billet['id_client']) {
                $stmt = $conn->prepare("SELECT * FROM clients WHERE id = :id_client");
                $stmt->bindParam(':id_client', $billet['id_client']);
                $stmt->execute();
                $client = $stmt->fetch(PDO::FETCH_ASSOC);
                if($client) {
                    echo "<h3>Détails du client</h3>";
                    echo "Nom : " . $client['nom'] . "<br>";
                    echo "Prénom : " . $client['prenom'] . "<br>";
                    echo "Adresse : " . $client['adresse'] . "<br>";
                    echo "Email : " . $client['email'] . "<br>";
                    echo "Numéro de téléphone : " . $client['numero_telephone'] . "<br>";
                    echo "Numéro de passeport : " . $client['numero_passport'] . "<br>";
                }
            }
        } else {
            echo "Billet non trouvé.";
        }
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

<?php
require_once("config.php");

class ReservationBillet {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAvailableBillets() {
        try {
            $stmt = $this->conn->query("SELECT * FROM billet");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
            return false;
        }
    }

    public function reserverBillet($billet_id) {
        try {
            $stmt = $this->conn->prepare("UPDATE billet SET statut = 'Réservé' WHERE id_billet = :billet_id");
            $stmt->bindParam(':billet_id', $billet_id);
            $stmt->execute();
            header("Location: confirmation_reservation.php?billet_id=" . $billet_id);
            exit;
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}

$reservationBillet = new ReservationBillet($conn);

$billets = $reservationBillet->getAvailableBillets();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['action']) && isset($_POST['billet_id'])) {
        $action = $_POST['action'];
        $billet_id = $_POST['billet_id'];
        
        if ($action == 'reservation') {
            $reservationBillet->reserverBillet($billet_id);
        }
    } else {
        echo "Erreur : Action ou identifiant de billet non spécifié.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réservation de billets de voyage</title>
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

    <section class="billets">
        <h2>Billets disponibles</h2>
        <div class="billets-container">
            <?php foreach ($billets as $billet) : ?>
                <div class="billet-item">
                    <?php echo $billet['destination'] . ' - ' . $billet['date'] . ' ' . $billet['heure'] . ' (' . $billet['prix'] . '€)'; ?>
                    <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <input type="hidden" name="billet_id" value="<?php echo $billet['id_billet']; ?>">
                        <button type="submit" name="action" value="reservation">Réserver</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Somplon Travel </p>
    </footer>
</body>
</html>

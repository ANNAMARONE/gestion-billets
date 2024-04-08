
<?php
require_once("config.php");
require_once("Billet.php");

$billetObj = new Billet($conn);
$billets = $billetObj->readAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Réservation de billets de voyage</title>
</head>
<body>
<header>
        <div class="contain_logo"></div>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="create.php">Réservation</a></li>
            
            </ul>
        </nav>
        <div class="connect-button">
            <a href="login.php"><button>Se connecter</button></a>
        </div>
    </header>

    <section class="billets">
        <h2>Billets disponibles</h2>
        <div class="billets-container">
            <?php foreach ($billets as $billet) : ?>
                <div class="billet-item">
                    <?php echo $billet['destination'] . ' - ' . $billet['date_reservation'] . ' ' . $billet['heure_reservation'] . ' (' . $billet['prix'] . '€)'; ?>
                    <a href="delete_billet.php?id=<?php echo $billet['id']; ?>">Supprimer</a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Somplon Travel </p>
    </footer>
</body>
</html>

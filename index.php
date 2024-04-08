<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Gestion de billets de voyage</title>
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
    
    <h1>Liste des billets</h1>
    
<?php
require_once("config.php");
require_once("Billet.php");

$billet = new Billet($conn);
$billets = $billet->readAll();

foreach ($billets as $b) {
    echo "<div class='billet'>";
    echo "<h2>{$b['destination']}</h2>";
    echo "<p>Date de réservation: {$b['date_reservation']} {$b['heure_reservation']}</p>";
    echo "<p>Prix: {$b['prix']}€</p>";
    echo "<a class='modify-button' href='update.php?id={$b['id']}'>Modifier</a> ";
    echo "<a class='cancel-button' href='delete_billet.php?id={$b['id']}'>Annuler</a>";
    echo "<p><a href='details.php?billet_id={$b['id']}'>Détails</a></p>"; // Ajout du lien vers details.php avec l'ID du billet
    echo "</div>";
}
?>
   <footer>
        <p>&copy; 2024 Somplon Travel </p>
    </footer>
</body>
</html>

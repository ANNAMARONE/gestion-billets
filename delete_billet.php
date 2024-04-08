

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
                <li><a href="acceuil.php">Accueil</a></li>
                <li><a href="index.php">liste des billets</a></li>
                <li><a href="create.php">Réservation</a></li>
            
            </ul>
        </nav>
        <div class="connect-button">
            <a href="login.php"><button>Se connecter</button></a>
        </div>
    </header>

    </body>
</html>
<?php
require_once("config.php");
require_once("Billet.php");

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $billet_id = $_GET['id'];

    $billetObj = new Billet($conn);

    if($billetObj->delete($billet_id)) {
        echo "Billet supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression du billet.";
    }
} else {
    echo "ID du billet non spécifié.";
}
?>

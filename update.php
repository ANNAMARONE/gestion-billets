<?php
require_once("config.php");
require_once("Billet.php");


// Vérifier si l'identifiant du billet est passé en paramètre
if(isset($_GET['id'])) {
    $billet_id = $_GET['id'];

    // Instancier un objet Billet
    $billet = new Billet($conn);

    // Récupérer les informations du billet à modifier
    $billet_info = $billet->getBilletById($billet_id);

    if($billet_info) {
        // Afficher le formulaire pré-rempli avec les informations du billet
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="style.css">
            <title>Modifier le billet</title>
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
            <h1>Modifier le billet</h1>
            <form action="index.php" method="post">
                <input type="hidden" name="billet_id" value="<?php echo $billet_id; ?>">
                <label for="destination">Destination :</label>
                <input type="text" id="destination" name="destination" value="<?php echo $billet_info['destination']; ?>" required><br>
                <label for="date_reservation">Date de réservation :</label>
                <input type="date" id="date_reservation" name="date_reservation" value="<?php echo $billet_info['date_reservation']; ?>" required><br>
                <label for="heure_reservation">Heure de réservation :</label>
                <input type="time" id="heure_reservation" name="heure_reservation" value="<?php echo $billet_info['heure_reservation']; ?>" required><br>
                <label for="prix">Prix :</label>
                <input type="number" id="prix" name="prix" value="<?php echo $billet_info['prix']; ?>" required><br>
                <button type="submit" name="update_billet">Modifier le billet</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Le billet avec l'identifiant $billet_id n'existe pas.";
    }
} else {
    echo "Identifiant de billet non spécifié.";
}
?>

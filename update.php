<?php
require_once("config.php");
require_once("Billet.php");


if(isset($_GET['id'])) {
    $billet_id = $_GET['id'];

    // Instanciation un objet Billet
    $billet = new Billet($conn);
    $billet_info = $billet->getBilletById($billet_id);

    if($billet_info) {
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
            <form action="process_create.php" method="post">
        <label for="destination">Destination :</label>
        <select id="destination" name="destination" required>
            <option value="">Sélectionner une destination</option>
            <option value="Paris">Dakar-Paris</option>
            <option value="Londres">Dakar-Londres</option>
            <option value="New York">Dakar-New York</option>
            <option value="Paris">Dakar-Rabat</option>
            <option value="Londres">Dakar-Londres</option>
            <option value="New York">Dakar-New York</option>
          
        </select><br>
        <label for="date_reservation">Date de réservation :</label>
        <input type="date" id="date_reservation" name="date_reservation" required><br>
        <label for="heure_reservation">Heure de réservation :</label>
        <input type="time" id="heure_reservation" name="heure_reservation" required><br>
        <label for="prix">Prix :</label>
        <input type="text" id="prix" name="prix" readonly required><br>
        <button type="submit">Créer</button>
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

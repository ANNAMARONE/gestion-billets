<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Créer un billet</title>
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
    <h1>Créer un billet</h1>
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

    <script>
        // Tableau des prix par destination
        const prixParDestination = {
            "Paris": 200,
            "Londres": 150,
            "New York": 300,
            // Ajoutez d'autres destinations avec leur prix correspondant ici
        };

        // Événement de changement pour mettre à jour le prix en fonction de la destination sélectionnée
        document.getElementById("destination").addEventListener("change", function() {
            const destination = this.value;
            const prixInput = document.getElementById("prix");
            // Vérifiez si la destination sélectionnée a un prix associé
            if (prixParDestination.hasOwnProperty(destination)) {
                prixInput.value = prixParDestination[destination];
            } else {
                prixInput.value = ""; // Réinitialiser le prix si la destination n'a pas de prix fixe
            }
        });
    </script>
</body>
</html>

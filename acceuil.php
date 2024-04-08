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

    <section  class="acceuil_img"></section>
    <h1>Decouvrez nos differentes destinations</h1>
    <section class="section">
    
        <div class="destination-box">
            <img src="img/image1.png" alt="Londre">
            <div class="destination-info">
                <h3>Londre</h3>
                <p>Prix:150$</p>
            </div>
        </div>

        <div class="destination-box">
            <img src="img/image2(1).jpeg" alt="New York">
            <div class="destination-info">
                <h3>New York</h3>
                <p>Prix:100$</p>
            </div>
        </div>

        <div class="destination-box">
            <img src="img/image3.jpeg" alt="Paris">
            <div class="destination-info">
                <h3>Paris</h3>
                <p>Prix:200$</p>
            </div>
        </div>

        <div class="destination-box">
            <img src="img/image4(1).jpeg" alt="Rabat">
            <div class="destination-info">
                <h3>Rabat</h3>
                <p>Prix:300$</p>
            </div>
        </div>
    </section>
    <form action="#" class="registration-form">
    <h2>Veuillez vous inscrire</h2>
    <div class="form-group">
        <label for="first-name">Prénom</label>
        <input type="text" id="first-name" name="nom" required placeholder="nom">
    </div>
    <div class="form-group">
        <label for="last-name">Nom de famille</label>
        <input type="text" id="last-name" name="prenom" required  placeholder="nom de famille">
    </div>
    <div class="form-group">
        <label for="address">Adresse</label>
        <input type="text" id="address" name="address" required placeholder="Adresse">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required placeholder="Email">
    </div>
    <button class="button_submit" type="submit">S'inscrire</button>
</form>

     
    <footer>
        <p>&copy; 2024 Somplon Travel </p>
    </footer>
</body>
</html>

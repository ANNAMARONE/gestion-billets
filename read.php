<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Styles spécifiques au formulaire */
        body {
            background-color: #f8f9fa;
        }
        .registration-form {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .registration-form h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .registration-form input[type="text"],
        .registration-form input[type="email"],
        .registration-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        .registration-form button[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
        .registration-form button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="registration-form">
                    <h2>Inscription</h2>
                    <form action="#" method="post">
                        <div class="form-group">
                            <input type="text" name="first_name" placeholder="Prénom" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="last_name" placeholder="Nom de famille" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Adresse e-mail" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Mot de passe" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe" required>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="terms" required> J'accepte les conditions d'utilisation et la politique de confidentialité.
                            </label>
                        </div>
                        <button type="submit">S'inscrire</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
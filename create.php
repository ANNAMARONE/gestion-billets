<?php
require_once('config.php');
class Create extends Database{
    function create($nom,$prenom,$adresse,$email, $numero_passport){
        $sql="INSERT INTO `client`(`nom`, `prenom`, `adresse`, `email`, `numeropassport`) 
        VALUES (:nom,:prenom,:adresse,:email,:numeropassport)";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindValue(':nom',$nom);
        $stmt->bindValue(':prenom',$prenom);
        $stmt->bindValue(':adresse',$adresse);
        $stmt->bindValue(':email',$email);
        $stmt->bindValue(':numeropassport',$numero_passport);

        $stmt->execute();
        return true;

    }
}

$db= new create();
    if(isset($_POST['submit'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $email = $_POST['email'];
        $numero_passport = $_POST['numeropassport'];
        $db->create($nom,$prenom,$adresse,$email, $numero_passport);
        if (empty($nom) || empty($prenom) || empty($email) || empty($adresse) || empty($numero_passport)) {
          echo "**Veuillez remplir tous les champs.**";
          exit;
        } 

    }
    ?>;
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<form action="" class="container"method="post">
  <div class="form-group">
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" class="form-control">
  </div>
  <div class="form-group">
    <label for="prenom">Prenom:</label>
    <input type="text" id="prenom" name="prenom" class="form-control">
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" class="form-control">
  </div>
 
  <div class="form-group">
    <label for="adresse">Adresse:</label>
    <input type="text" id="adresse" name="adresse" class="form-control">
  </div>
  <div class="form-group">
    <label for="nombre_personnes">Nombre de passport:</label>
    <input type="text" id="numero_passeport" name="numeropassport" class="form-control">
      
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Réserver</button>
</form>

    
</body>
</html>



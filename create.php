<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('config.php');
class Create extends Database{
  function create($nom,$prenom,$adresse,$email, $numero_passport,$numero_vol, $origine, $destination, $date_depart, $date_arrive,$id_client,$id_vol){
    $sql="INSERT INTO `client`(`nom`, `prenom`, `adresse`, `email`, `numeropassport`) 
    VALUES (:nom,:prenom,:adresse,:email,:numeropassport)";
    $stmt=$this->conn->prepare($sql);
    $stmt->bindValue(':nom',$nom);
    $stmt->bindValue(':prenom',$prenom);
    $stmt->bindValue(':adresse',$adresse);
    $stmt->bindValue(':email',$email);
    $stmt->bindValue(':numeropassport',$numero_passport);

    $stmt->execute();
    $id_client=$this->conn->lastInsertId();
   

  
    $sql = "INSERT INTO `vol`(`numero_vol`, `dateDepart`, `dateArrive`, `Origine`, `Destination`) VALUES 
            (:numero_vol, :dateDepart, :dateArrive, :origine, :destination)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(':numero_vol', $numero_vol);
    $stmt->bindValue(':dateDepart', $date_depart);
    $stmt->bindValue(':dateArrive', $date_arrive);
    $stmt->bindValue(':origine', $origine);
    $stmt->bindValue(':destination', $destination);
   
    $stmt->execute();
    $id_vol=$this->conn->lastInsertId();

    $sql="INSERT INTO reservation(id_client,id_vol) 
    VALUES (:id_client,:id_vol)";
    $stmt=$this->conn->prepare($sql);
    $stmt->bindValue(':id_client',$id_client, PDO::PARAM_INT);
    $stmt->bindValue(':id_vol',$id_vol, PDO::PARAM_INT);
    $stmt->execute();
}

  
}

$db= new create();

    if(isset($_POST['submit'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $email = $_POST['email'];
        $numero_passport = $_POST['numeropassport'];
        $numero_vol=$_POST['numero_vol'];
        $origine=$_POST['origine'];
        $destination=$_POST['Destination'];
        $date_depart=$_POST['dateDepart'];
        $date_arrive=$_POST['dateArrive'];
        $id_client=$_POST['id_client'];
        $id_vol=$_POST['id_vol'];

        $db->create($nom,$prenom,$adresse,$email, $numero_passport,$numero_vol, $origine, $destination, $date_depart, $date_arrive,$id_client,$id_vol);
        if (empty($nom) || empty($prenom) || empty($email) || empty($adresse) || empty($numero_passport) || empty($numero_vol) || empty($origine) || empty($destination) || empty($date_depart) || empty($date_arrive)) {
          echo "**Veuillez remplir tous les champs.**";
        } else{
          header('location:read.php');
          exit();
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
<nav>
  <a href="#" class="nav-item is-active" data-active-color="orange" data-target="Home">Home</a>
  <a href="#" class="nav-item" data-active-color="green" data-target="About">About</a>
  <a href="#" class="nav-item" data-active-color="blue" data-target="Testimonials">Testimonials</a>
  <a href="#" class="nav-item" data-active-color="red" data-target="Blog">Blog</a>
  <a href="#" class="nav-item" data-active-color="rebeccapurple" data-target="Contact">Contact</a>
  <span class="nav-indicator"></span>
</nav>
<form action="" class="container"method="post">
  <div class="form-group">
    <label for="nom">Nom:</label><br>
    <input type="text" id="nom" name="nom" class="form-control">
  </div>
  <div class="form-group">
    <label for="prenom">Prenom:</label><br>
    <input type="text" id="prenom" name="prenom" class="form-control">
  </div>
  <div class="form-group">
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" class="form-control">
  </div>
 
  <div class="form-group">
    <label for="adresse">Adresse:</label><br>
    <input type="text" id="adresse" name="adresse" class="form-control">
  </div>
  <div class="form-group">
    <label for="nombre_personnes">Nombre de passport:</label><br>
    <input type="text" id="numero_passeport" name="numeropassport" class="form-control">
      
  </div>
  <div class="form-groupvol">
    <label for="numero_vol">Numero vol:</label><br>
    <input type="text" id="numero_vol" name="numero_vol" class="form-control">
      
  </div>

  <div class="from-group2">
    <div>
  <label>Origine:</label>
  
                        <div class="form-group8">
                          <select class="form-wrap4" name="origine">
                            <option value="senegal">senegal</option>
                            <option value="côte d'ivoire">côte d'ivoire</option>
                            <option value="congo">congo</option>
                          </select>
                        </div>
                        </div>
                     
                      <div class="form-group5">
                        <label>Destination:</label><br>
                        <div class="" >
                          <select class="form-wrap4" name="Destination">
                            <option value="France">France</option>
                            <option value="USA">USA</option>
                            <option value="canad">canada</option>
                          </select>
                        </div>
                      </div>
</div>
                      <div class="dates">
                      <div>
                        <label >Date de départ</label>
                        <div>
                          <input class="form-wrap4" id="dateForm" name="dateDepart" type="datetime-local">
                        </div>
                      </div>
                      <div class="col-sm-12 col-lg-6">
                        <label>Date de arrivée</label>
                        <div>
                          <input class="form-wrap4" id="dateForm" name="dateArrive" type="datetime-local">
                        </div>
                      </div>
                      </div>

                    </div>
  <button type="submit" name="submit" class="btn btn-primary">Réserver</button>
</form>

    
</body>
</html>



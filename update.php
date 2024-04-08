<?php
require_once("config.php");
class updateclient extends Database{
function getElementbyid($id){
    $sql="SELECT * FROM client WHERE id=:id";
    $stmt=$this->conn->prepare($sql);

    $stmt->execute(['id'=>$id]);
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
public function update($id,$nom,$prenom,$adresse,$email,$numero_passport){
   $sql="UPDATE `client` SET`nom`=:nom,`prenom`=:prenom,`adresse`=:adresse,`email`=:email,`numeropassport`=:numeropassport WHERE id=:id" ;
   $stmt=$this->conn->prepare($sql);
   $stmt->bindValue('id',$id,PDO::PARAM_INT);
   $stmt->bindValue(':nom',$nom);
   $stmt->bindValue(':prenom',$prenom);
   $stmt->bindValue(':adresse',$adresse);
   $stmt->bindValue(':email',$email);
   $stmt->bindValue(':numeropassport',$numero_passport);

   $stmt->execute();
   if($stmt->rowCount()>0){
    return true;
   }else{
    return false;
   }
}
}
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id=$_GET['id'];
    $db=new updateclient();
    $result=$db->getElementbyid($id);
}
if(isset($_POST['modifier'])){
    $db=new updateclient();
    $result=$db->getElementbyid($id);
    $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $email = $_POST['email'];
        $numero_passport = $_POST['numeropassport'];
    try{
        $inserted=$db->update($id,$nom,$prenom,$adresse,$email,$numero_passport);
        if ($inserted) {
            header('location:read.php');
            echo "Modification enregistrée avec succès.";
            // You might redirect the user or perform additional actions here
            exit();
        } else {
            echo "Une erreur est survenue lors de votre modification.";
        }
    } catch (Exception $e) {
        // Handle any exceptions that occur during the update operation
        echo "An error occurred: " . $e->getMessage();
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
    <input type="text" id="nom" name="nom" value="<?php echo $result['nom']?>" class="form-control">
  </div>
  <div class="form-group">
    <label for="prenom">Prenom:</label>
    <input type="text" id="prenom" name="prenom"  value="<?php echo $result['prenom']?>" class="form-control">
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $result['email']?>" class="form-control">
  </div>
 
  <div class="form-group">
    <label for="adresse">Adresse:</label>
    <input type="text" id="adresse" name="adresse"  value="<?php echo $result['adresse']?>" class="form-control">
  </div>
  <div class="form-group">
    <label for="nombre_personnes">Nombre de passport:</label>
    <input type="text" id="numeropassport" name="numeropassport"  value="<?php echo $result['numeropassport']?>" class="form-control">
      
  </div>
  <button type="submit" name="modifier" class="btn btn-primary">Réserver</button>
</form>

    
</body>
</html>
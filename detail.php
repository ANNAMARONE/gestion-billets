<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("config.php");

class Readvol extends Database {
    public function readv($id) {
        $sql = "SELECT * FROM reservation 
                JOIN client ON client.id = reservation.id_client 
                JOIN vol ON vol.id = reservation.id_vol 
                WHERE reservation.id_client = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}

// Check if 'id' parameter is provided
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Sanitize input (optional)
    $id = htmlspecialchars($_GET['id']);
    
    $db = new Readvol();
    $result = $db->readv($id);
    
    // Display HTML content only if result is not empty
    if($result) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="detail.css">
    <title>Details de reservation</title>
</head>
<body>
  <div class="container" id="printableArea">
    <div class="top">
        <h1>BILLET D'EMBARQUEMENT</h1>
        <div></div>
        <P>BOARDING PASS</P>
    </div>
 <div class="traire"></div>
 <div class="body1">
 <div class="info">

    <h2>NOM:<?= $result['prenom']. " ".$result['nom']?></h2>
    <p></p>
   
<table>
   <thead>
   
    <tr>
        <th>Numero vol:</th>
        <th> DATE DE DEPART:</th>
        <th>DATE D'ARRIVÉ:</th>
    </tr>
   </thead>
   <tbody>
    <tr>
        
    <td><?= $result['numero_vol']?></td>
    <td><?= $result['dateDepart']?></td>
    <td><?= $result['dateArrive']?></td>
    
    </tr>
   </tbody>
</table>
<h2>PREMIER CLASSE</h2>
<table>
   <thead>
    <tr>
        <th>ORIGINE:</th>
       <td><?= $result['Origine']?></td>
        <th>DESTINATION:</th>
        <td><?= $result['Destination']?></td>
    </tr>
   </thead>
</table>
<img src="code.png" alt="" class="imgcode">
 </div>
 <div class="traite2"></div>
 <div class="right">
    <p>VOL:<?= $result['numero_vol']?></p>
    <p>Aéroport:</p>
    <div class="tarce"></div>
    <p>origin:<?= $result['Origine']?></p>
    <p>Destination:<?= $result['Destination']?></p>
    <div class="tarce"></div>
    
    <img src="code.png" alt="" class="imgcode2">
 </div>
 </div>
<p class="mode">LES PORTES FERMENT 10 MINUTES AVANT L'HEURE DE DÉPART</p>

  </div> 
  <button onclick="printDiv('printableArea')">Imprimer votre billet</button>
  <script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
</body>

</html>
<?php
    } else {
        echo "Error: No data found for the provided ID.";
    }
} else {
    // Handle case when 'id' is not provided
    echo "Error: 'id' parameter is missing.";
}


?>


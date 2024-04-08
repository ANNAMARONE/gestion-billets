<?php
// Billet.php
require_once("config.php");

class Billet {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($destination, $date_reservation, $heure_reservation, $prix) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO billets (destination, date_reservation, heure_reservation, prix) VALUES (:destination, :date_reservation, :heure_reservation, :prix)");
            $stmt->bindParam(':destination', $destination);
            $stmt->bindParam(':date_reservation', $date_reservation);
            $stmt->bindParam(':heure_reservation', $heure_reservation);
            $stmt->bindParam(':prix', $prix);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }

    public function readAll() {
        try {
            $stmt = $this->conn->query("SELECT * FROM billets");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }

    public function update($id, $destination, $date_reservation, $heure_reservation, $prix) {
        try {
            $stmt = $this->conn->prepare("UPDATE billets SET destination = :destination, date_reservation = :date_reservation, heure_reservation = :heure_reservation, prix = :prix WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':destination', $destination);
            $stmt->bindParam(':date_reservation', $date_reservation);
            $stmt->bindParam(':heure_reservation', $heure_reservation);
            $stmt->bindParam(':prix', $prix);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }

    public function delete($id) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM billets WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }

    public function readOne($id) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM billets WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }

    public function getBilletById($billet_id) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM billets WHERE id = :id");
            $stmt->bindParam(':id', $billet_id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }
public function getClientById(){}
}
?>

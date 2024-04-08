<?php

require_once("config.php");


class Billet implements Crud {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($data) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO billets (destination, date_reservation, heure_reservation, prix) VALUES (:destination, :date_reservation, :heure_reservation, :prix)");
            $stmt->bindParam(':destination', $data['destination']);
            $stmt->bindParam(':date_reservation', $data['date_reservation']);
            $stmt->bindParam(':heure_reservation', $data['heure_reservation']);
            $stmt->bindParam(':prix', $data['prix']);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }

    public function read() {
        try {
            $stmt = $this->conn->query("SELECT * FROM billets");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }

    public function update($id, $data) {
        try {
            $stmt = $this->conn->prepare("UPDATE billets SET destination = :destination, date_reservation = :date_reservation, heure_reservation = :heure_reservation, prix = :prix WHERE id = :id");
            $stmt->bindParam(':destination', $data['destination']);
            $stmt->bindParam(':date_reservation', $data['date_reservation']);
            $stmt->bindParam(':heure_reservation', $data['heure_reservation']);
            $stmt->bindParam(':prix', $data['prix']);
            $stmt->bindParam(':id', $id);
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

    
}

?>

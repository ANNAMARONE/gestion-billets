<?php
require_once "crud.php";

class Billet implements Crud {

    private $connexion;
    private $name;
    private $class;
    private $marks;

    public function __construct($connexion, $name, $class, $marks) {
        $this->connexion = $connexion;
        $this->name = $name;
        $this->class = $class;
        $this->marks = $marks;
    }

    // Méthodes CRUD

    public function create() {
       try {
            $sql= "INSERT INTO students(name,class,marks) VALUES(:name, :class,:marks) ";

            $stmt=$this->connexion->prepare($sql);
            $stmt->bindParam(":name", $this->name, PDO::PARAM_STR);
            $stmt->bindParam(":class", $this->class, PDO::PARAM_STR);
            $stmt->bindParam(":marks", $this->marks, PDO::PARAM_INT);

            $stmt->execute();

            header("location: index.php");
            exit();

       } catch (PDOException $e) {
            die("Erreur: " .$e->getMessage());
       }
    }

    public function read() {
        try {
            $sql = "SELECT * FROM students";
            $stmt = $this->connexion->prepare($sql);
            $stmt->execute();

            $resultat=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch (PDOException $e) {
             die("Erreur : Impossible de d'afficher la liste des élèves " .$e->getMessage());
        }
    }

    public function update($id) {
        try {
            $sql="UPDATE students SET name= :name, class = :class, marks= :marks WHERE id = :id";
            $stmt=$this->connexion->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":name", $this->name, PDO::PARAM_STR);
            $stmt->bindParam(":class", $this->class, PDO::PARAM_STR);
            $stmt->bindParam(":marks", $this->marks, PDO::PARAM_INT);

            $stmt->execute();
            
            header("location: index.php");
            exit();

        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $sql = "DELETE FROM students WHERE id = :id";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            header("location: index.php");
            exit();

        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
    }
}
?>

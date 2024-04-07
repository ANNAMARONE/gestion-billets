<?php
require_once('config.php');
class Delete extends Database{
    function delete($id){
        $sql="DELETE FROM `client` WHERE id=:id";
        try{
            $stmt=$this->conn->prepare($sql);
            $stmt->bindValue(':id',$id, PDO::PARAM_INT);
            $stmt->execute();
            header('location:read.php');
        }catch(PDOException $e){
            echo('une erreur est survenue'.$e->getMessage());
        }
       
    }
}
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $db=new Delete();
    $db->delete($id);
}
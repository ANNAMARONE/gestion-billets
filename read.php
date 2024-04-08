<?php
require_once("config.php");
class readclient extends Database{
function read(){
    $sql="SELECT * FROM client";
    $stmt=$this->conn->prepare($sql);
    $stmt->execute();
    $resultat=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resultat;
}
public function totalRowcount(){
    $sql="SELECT * FROM client ";
    $stmt= $this->conn->prepare($sql);
    $stmt->execute();
    $t_rows=$stmt->rowCount();

    return $t_rows;
}
}


?>;
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <style>
        .wrapper{
            width: 700px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
   
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 d-flex justify-content-between">
                        <h2 class="pull-left">Liste des clients</h2>
                        <a href="create.php" class="btn btn-success"><i class="bi bi-plus"></i> Ajouter</a>
                    </div>
                    <?php
                    require_once('config.php');
                    $db=new readclient();
                    $output = '';
                    $data = $db->read();
                    if ($db->totalRowcount() > 0){
                    $output .= ' <table class="table table-striped table-sm table-bordered">
                                <thead>
                                  <tr>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Adresse</th>
                                        <th>Email</th>
                                        <th>Numero passport</th>
                                        <th>Action</th>
                                   </tr>
                              </thead>
                               <tbody>';
                            foreach($data as $row){

                          
                                    $output.='<tr>';                                   
                                    $output.= '<td>' . $row['nom'] . '</td>';
                                    $output.= '<td>' . $row['prenom'] . '</td>';
                                    $output.= '<td>' . $row['adresse'] . '</td>';
                                    $output.= '<td>' . $row['email'] . '</td>';
                                    $output.= '<td>' . $row['numeropassport'] . '</td>';
                                    $output.='<td>';
                  $output.='<a href="detail.php?id='. $row['id'] .'" class="me-3" ><span class="bi bi-eye"></span></a>';
                  $output.=' <a href="update.php?id='. $row['id'] .'" class="me-3" ><span class="bi bi-pencil"></span></a>';
                  $output.='<a href="delete.php?id='. $row['id'] .'" ><span class="bi bi-trash"></span></a>';
                    $output.= '</td>';
                 $output.='</tr>';
                            }
                           echo $output;
                        }
                            $output.='</tbody>                          
                             </table>';
                 ?>
                              
                             

                         
                </div>
            </div>        
        </div>
    </div>
</body>
</html>


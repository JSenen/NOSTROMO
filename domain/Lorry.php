<?php
class Lorry
{
    private long $idLorry;
    private String $brand;
    private int $km;
    private String $model;

public function __construct(){}

public function getLorries($dbh){
    try{
        $stmt = $dbh->prepare("SELECT id_lorry, brand, km, model FROM lorry" );
        $stmt->execute();
        $lorries = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lorries;
      } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
        
    }
}

public function addLorries($dbh, $brand, $model, $km){
  $brand = strtoupper($brand);
  $model = strtoupper($model);
  $km = strtoupper($km);
    try {
        $sql = "INSERT INTO lorry (brand, model, km) VALUES (:brand,:model,:km)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
        $stmt->bindParam(':model', $model, PDO::PARAM_STR);
        $stmt->bindParam(':km', $km, PDO::PARAM_STR);
        $stmt->execute();
      } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
  
      }    
}

public function getOneLorry($dbh, $id){
  try {
    
    $stmt = $dbh->prepare("SELECT id_lorry, brand, model, km FROM lorry WHERE id_lorry = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$resultado) { // Si no existe 
      echo 'SIN RESULTADO'; //TODO fixit
    }

  } catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
    redirect('errorpagePDO_view.php');
  }
  return $resultado;
}

function modyLorry($dbh, $brand, $model, $km, $id){
 try {
      //configuramos el prepared statement
      $stmt = $dbh->prepare("UPDATE lorry SET brand = :brand, model = :model, km = :km WHERE id_lorry = :id");
      $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
      $stmt->bindParam(':model', $model, PDO::PARAM_STR);
      $stmt->bindParam(':km', $km, PDO::PARAM_INT);
      $stmt->bindParam(':id', $id, PDO::PARAM_STR);

      $stmt->execute();
    } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
      //TODO
    }
}

function deletelorry($dbh,$id){
  try {
    $stmt = $dbh->prepare('DELETE FROM lorry WHERE id_lorry=:id');
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();
  } catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
  }
}
}

?>
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
        $stmt = $dbh->prepare("SELECT brand, km, model FROM lorry" );
        $stmt->execute();
        $lorries = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lorries;
      } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
        
    }
}

public function addLorries($dbh, $brand, $model, $km){
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
}
?>
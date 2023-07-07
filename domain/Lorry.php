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

}
?>
<?php

class Mechanic{
    private String $address;
    private String $city;
    private String $name;
    private String $nif;
    private String $phone;
    private String $type;
    private int $id_mechanic;

    public function __construct(){

    }

    public function getMechanics($dbh){
        try{
            $stmt = $dbh->prepare("SELECT id_mechanic, address, city, name, nif, phone, type FROM mechanic_store" );
            $stmt->execute();
            $mechanics = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $mechanics;
          } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
            
        }
    }

    public function newMechanic($dbh, $mechanic_name, $mechanic_direccion, $mechanic_city, $mechanic_phone, $mechanic_nif, $mechanic_type){
        $name = strtoupper($mechanic_name);
        $direction = strtoupper($mechanic_direccion);
        $city = strtoupper($mechanic_city);
        $phone = strtoupper($mechanic_phone);
        $nif = strtoupper($mechanic_nif);
        $type = strtoupper($mechanic_type);
       
    try {
        $sql = "INSERT INTO mechanic_store (name, address, city, phone, nif, type) VALUES (:name,:address,:city,:phone,:nif, :type)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':address', $direction, PDO::PARAM_STR);
        $stmt->bindParam(':city', $city, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':nif', $nif, PDO::PARAM_STR);
        $stmt->bindParam(':type', $type, PDO::PARAM_STR);

        $stmt->execute();
      } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
  
      }    
    }

    function deleteMechanic($dbh,$id){
      try {
        $stmt = $dbh->prepare('DELETE FROM mechanic_store WHERE id_mechanic=:id');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
      } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
      }
    }

    function editMechanic($dbh, $mechanic_name, $mechanic_direction, $mechanic_city, $mechanic_nif, $mechanic_phone, $id, $mechanic_type){
      try {
        //configuramos el prepared statement
        $stmt = $dbh->prepare("UPDATE mechanic_store SET name = :name, address = :address, city = :city, phone = :phone, nif = :nif, type = :type WHERE id_mechanic = :id");
        $stmt->bindParam(':name', $mechanic_name, PDO::PARAM_STR);
        $stmt->bindParam(':address', $mechanic_direction, PDO::PARAM_STR);
        $stmt->bindParam(':city', $mechanic_city, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $mechanic_phone, PDO::PARAM_STR);
        $stmt->bindParam(':nif', $mechanic_nif, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->bindParam(':type', $mechanic_type, PDO::PARAM_STR);
  
        $stmt->execute();
      } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
        //TODO
      }
    }

    function getOneMechanic($dbh,$id){
      try {
    
        $stmt = $dbh->prepare("SELECT * FROM mechanic_store WHERE id_mechanic = :id");
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

    function getOneMechanicByReview($dbh, $id){
      try {
        $stmt = $dbh->prepare("SELECT id_mechanic FROM review_store WHERE id_review = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $store = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if (!$store) { // Si no existe 
          return '---';
        } else {
          $store_id = $store[0];
          
        
        $stmt = $dbh->prepare("SELECT name FROM mechanic_store WHERE id_mechanic = :id");
        $stmt->bindParam(':id', $store_id, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
      }
        return $resultado;
      } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
        redirect('errorpagePDO_view.php');
      }
    }
}
?>
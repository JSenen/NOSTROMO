<?php
class Review{
    private String $odc;
    private long $idReview;
    private String $comments;
    private Date $dateStart;
    private Date $dateEnd;
    private bool $exported;
    private int $kmReview;
    private float $priceReview;
    private long $idlorry;

    public function __construct(){}

    public function getReviews($dbh){
        try{
            $stmt = $dbh->prepare("SELECT * FROM review" );
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
          } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
            
        }
    }

    public function getBradLorry($dbh, $id){
        try{
            $stmt = $dbh->prepare("SELECT brand FROM lorry WHERE id_lorry = :id");
            $stmt->bindParam(':id',$id, PDO::PARAM_STR);
            $stmt->execute();
            $resulBrand = $stmt->fetch(PDO::FETCH_ASSOC);
            $brand = $resulBrand['brand'];
            return $brand;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    public function getReviewsByLorry($dbh,$id){
        try{
            $stmt = $dbh->prepare("SELECT * FROM review WHERE idlorry_review = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->execute();
            $resutReviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resutReviews;
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function addReviewToLorry($dbh, $id, $review_fechain, $review_fechaout, $review_commnets, $review_kmreview, $review_reviewodc, $review_reviewprice,$review_reviewmechanic) {
        $comments = strtoupper($review_commnets);
        $odc = strtoupper($review_reviewodc);
        
        try {
            $date_in = date('Y-m-d', strtotime($review_fechain));
            $date_out = date('Y-m-d', strtotime($review_fechaout));
            
            $sql = "INSERT INTO review (idlorry_review, odc, comments, date_in, date_out, km_review, price) VALUES (:idlorry, :odc, :comments, :datein, :dateout, :km, :price) ";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':idlorry', $id, PDO::PARAM_STR);
            $stmt->bindParam(':odc', $odc, PDO::PARAM_STR);
            $stmt->bindParam(':comments', $comments, PDO::PARAM_STR);
            $stmt->bindParam(':datein', $date_in, PDO::PARAM_STR);
            $stmt->bindParam(':dateout', $date_out, PDO::PARAM_STR);
            $stmt->bindParam(':km', $review_kmreview, PDO::PARAM_STR);
            $stmt->bindParam(':price', $review_reviewprice, PDO::PARAM_STR);
            $stmt->execute();

            // Obtener el ID de la última inserción en la tabla review
            $review_id = $dbh->lastInsertId();

            // Insertar en la tabla review_store
            $sql_store = "INSERT INTO review_store (id_review, id_mechanic) VALUES (:reviewid, :mechanicid)";
            $stmt_store = $dbh->prepare($sql_store);
            $stmt_store->bindValue(':reviewid', $review_id, PDO::PARAM_INT);
            $stmt_store->bindValue(':mechanicid', $review_reviewmechanic, PDO::PARAM_INT);
            $stmt_store->execute();


        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function eraseReview($dbh, $id){
        try {
            $stmt = $dbh->prepare('DELETE FROM review_store WHERE id_review=:id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $stmt = $dbh->prepare('DELETE FROM review WHERE id_review=:id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();


          } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
          }
    }

    public function getOneReview($dbh, $id_review){
        try{
            $stmt = $dbh->prepare('SELECT * from review WHERE id_review = :id');
            $stmt->bindParam(':id', $id_review, PDO::PARAM_INT);
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (!$resultado) { // Si no existe 
                echo 'SIN RESULTADO'; //TODO fixit
                } return $resultado;
        }catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function modyReview($dbh, $id_review, $rw_odc, $rw_comments, $rw_datein, $rw_dateout, $rw_exported, $rw_km, $rw_price){
        try {
            //configuramos el prepared statement
            $stmt = $dbh->prepare("UPDATE review SET odc = :odc, comments = :comments, date_in = :datein , date_out = :dateout, exported = :exported,
            km_review = :km, price =  :price WHERE id_review = :id");
            $stmt->bindParam(':odc', $rw_odc, PDO::PARAM_STR);
            $stmt->bindParam(':comments', $rw_comments, PDO::PARAM_STR);
            $stmt->bindParam(':date_in', $rw_datein, PDO::PARAM_STR);
            $stmt->bindParam(':date_out', $rw_dateout, PDO::PARAM_STR);
            $stmt->bindParam(':exported', $rw_exported, PDO::PARAM_STR);
            $stmt->bindParam(':km_rview', $rw_km, PDO::PARAM_INT);
            $stmt->bindParam(':price', $rw_price, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id_review, PDO::PARAM_INT);
      
            $stmt->execute();
          } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
            //TODO
          }
    }
}
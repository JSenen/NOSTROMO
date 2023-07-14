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
}
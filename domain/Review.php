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

    public function addReviewToLorry($dbh, $id, $review_fechain, $review_fechaout, $review_commnets, $review_kmreview, $review_reviewodc, $review_reviewprice) {
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
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
}
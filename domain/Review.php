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
}
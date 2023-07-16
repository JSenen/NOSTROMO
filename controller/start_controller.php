<?php
include './domain/Conection.php';
require_once './domain/Lorry.php';
require_once './domain/Mechanic.php';
require_once './domain/Review.php';

function iniweb(){
    $conecction = new Conecction();
    $dbh = $conecction->getConection();
    $lorries = new Lorry();
    $lstLorries = $lorries->getLorries($dbh);
    include 'model/listlorriesModel.php';
    listLorrys($lstLorries);
}

function addLorry(){
    $conecction = new Conecction();
    $dbh = $conecction->getConection();
    include 'view/headerview.php';
    include 'model/addlorryModel.php';
    include 'view/addlorriesview.php';    
    addNewLorry($dbh);
}

function modLorry($id){
    $conecction = new Conecction();
    $dbh = $conecction->getConection();
    include 'view/headerview.php';
    $lorryToMod = new Lorry();
    $lorrySearch = $lorryToMod->getOneLorry($dbh,$id);
    include 'model/addLorryModel.php';
    editLorry($dbh,$lorrySearch);   //Pasamos el camión deseado al model

}

function eraseLorry($id){
    $conecction = new Conecction();
    $dbh = $conecction->getConection();
    $deleteLorry = new Lorry();
    $deleteLorry->deletelorry($dbh,$id);
    header('Location: index.php');

}

function agenda(){
    $conecction = new Conecction();
    $dbh = $conecction->getConection();
    $mechaniclist = new Mechanic();
    $listmechanic = $mechaniclist->getMechanics($dbh);
    include 'model/listagendaModel.php';
    iniAgenda($dbh, $listmechanic);
}

function addMechanic(){
    $conecction = new Conecction();
    $dbh = $conecction->getConection();
    include 'model/addmechanicModel.php';
    include_once 'view/headerview.php';
    include 'view/addmechanicview.php';
    newMechanic($dbh);
}

function eraseMechanic($id){
    $conecction = new Conecction();
    $dbh = $conecction->getConection();
    $deleteMechanic = new Mechanic();
    $deleteMechanic->deleteMechanic($dbh,$id);
    header('Location: index.php?action=agenda');
}


function modMechanic($id){
    $conecction = new Conecction();
    $dbh = $conecction->getConection();
    $mechanicToMod = new Mechanic();
    $mechanicSearch = $mechanicToMod->getOneMechanic($dbh,$id);
    include 'model/addmechanicModel.php';
    editAMechanic($dbh,$mechanicSearch);   //Pasamos el registro deseado al model

}

function reviews($idLorry,$brand){
    $conecction = new Conecction();
    $dbh = $conecction->getConection();
    $reviewsList = new Review();
    $reviews = $reviewsList->getReviews($dbh);
    include 'model/listreviewsModel.php';
    listReviews($dbh, $reviews, $brand, $idLorry);
}

function seeReviewsLoory($id,$brand){
    $conecction = new Conecction();
    $dbh = $conecction->getConection();
    $reviewsLorry = new Review();
    $result = $reviewsLorry->getReviewsByLorry($dbh,$id);
    include 'model/listreviewsModel.php';
    listReviews($dbh, $result, $brand, $id);

}

function addReviewToLorry($id,$brand){
    $conecction = new Conecction();
    $dbh = $conecction->getConection();
    include 'model/addlorryModel.php';
    include_once 'view/headerview.php';
    include 'view/addlorryReviewView.php';
    newReview($dbh,$id);
}

function eraseReview($id_review,$brand) {
    $conecction = new Conecction();
    $dbh = $conecction->getConection();
    $deletereview = new Review();
    $deletereview->eraseReview($dbh,$id_review);
    header('Location: index.php?idlorry='.$brand.'&action=seeReviewsLoory');
}

function editReview($idrw,$brand) {
    $conecction = new Conecction();
    $dbh = $conecction->getConection();
    include 'view/headerview.php';
    $reviewToEdit = new Review();
    $reviewEdit = $reviewToEdit->getOneReview($dbh,$idrw);
    include 'model/addlorryModel.php';
    modOneReview($dbh,$reviewEdit);

    
}
?>

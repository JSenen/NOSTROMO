<?php
include './domain/Conection.php';
require_once './domain/Lorry.php';

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
    include 'view/addlorriesview.php';
    include 'model/addlorryModel.php';
    addNewLorry($dbh);
}

function modLorry($brand){
    $conecction = new Conecction();
    $dbh = $conecction->getConection();
    include 'view/headerview.php';
    $lorryToMod = new Lorry();
    $lorrySearch = $lorryToMod->getOneLorry($dbh,$brand);
    include 'model/addLorryModel.php';
    editLorry($dbh,$lorrySearch);   //Pasamos el camión deseado al model

}
?>
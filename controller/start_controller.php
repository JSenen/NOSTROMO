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
    
    include 'view/addlorriesview.php';
   
    
}
?>
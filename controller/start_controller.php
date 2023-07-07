<?php
include './domain/Conection.php';

$conecction = new Conecction();
$dbh = $conecction->getConection();

function iniweb(){
    include 'view/headerview.php';
}
?>
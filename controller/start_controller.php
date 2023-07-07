<?php
include './domain/Conection.php';

$conecction = new Conecction();
$dbh = $conecction->getConection();

function iniweb(){
    include 'view/headerview.php';
    include 'view/contentview.php';
    include 'view/footerview.php';
}
?>
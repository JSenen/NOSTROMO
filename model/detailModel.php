<?php
include_once('./domain/Lorry.php');

function seeDetailsLorry($lorryData) {
    
    foreach ($lorryData as $lorrytomod ) {
        $lorrybrand = $lorrytomod['brand'];
        $lorrymodel = $lorrytomod['model'];
        $lorrykm = $lorrytomod['km'];
        $id = $lorrytomod['id_lorry'];
        $lorryphoto = $lorrytomod['lorry_photo'];
        //Pasamos los datos al formulario
        include 'view/detailView.php';
      }
}
?>
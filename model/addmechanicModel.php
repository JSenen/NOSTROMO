<?php

include_once './domain/Mechanic.php';

function newMechanic($dbh){
    if (isset($_POST['addAmechanic'])){
        $mechanic_name = htmlspecialchars($_POST['nombre']);
        $mechanic_direccion = htmlspecialchars($_POST['direccion']);
        $mechanic_city = htmlspecialchars($_POST['ciudad']);
        $mechanic_phone = htmlspecialchars($_POST['telefono']);
        $mechanic_nif = htmlspecialchars($_POST['nif']);

        $new_mechanic = new Mechanic();
        try {
            $new_mechanic->newMechanic($dbh,$mechanic_name, $mechanic_direccion, $mechanic_city, $mechanic_phone, $mechanic_nif);
           
          } catch (Exception $e) {
            // Manejar la excepción aquí
            echo 'Ha ocurrido un error: ' . $e->getMessage();
          }
    }
}
?>
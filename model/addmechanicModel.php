<?php

include_once './domain/Mechanic.php';
include_once './view/headerview.php';

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

function editAMechanic($dbh,$mechanic_search){

  foreach ($mechanic_search as $mech) {
    $mechanicname = $mech['name'];
    $mechanicdirection = $mech['address'];
    $mechaniccity = $mech['city'];
    $mechanicnif = $mech['nif'];
    $mechanicphone = $mech['phone'];
    $id = $mech['id_mechanic'];
    //Pasamos los datos al formulario
    include 'view/editmechanicview.php';
  }

  //recogemos datos y los pasamos a la base

  // Procesamo el formulario y guardamos los datos en la BD.
  if (isset($_POST['modMechanic'])) {

    $mechanic_name =$_POST['name'];
    $mechanic_direction = $_POST['address'];
    $mechanic_city= $_POST['city'];
    $mechanic_nif= $_POST['nif'];
    $mechanic_phone= $_POST['phone'];
    // guardamos los datos en la base de datos
    $mechanicToChange = new Mechanic();
    $mechanicToChange->editMechanic($dbh, $mechanic_name, $mechanic_direction, $mechanic_city, $mechanic_nif, $mechanic_phone, $id);
    //una vez guardados, redirigimos a la p�gina principal
    // Limpiamos el búfer de salida
    ?>
    <script> location.replace("index.php?action=agenda"); </script>
    <?php
    exit();

  }
}
?>
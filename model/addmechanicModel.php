<?php

include_once './domain/Mechanic.php';
include_once './domain/Review.php';
include_once './view/headerview.php';


function newMechanic($dbh){
    if (isset($_POST['addAmechanic'])){
        $mechanic_name = htmlspecialchars($_POST['nombre']);
        $mechanic_direccion = htmlspecialchars($_POST['direccion']);
        $mechanic_city = htmlspecialchars($_POST['ciudad']);
        $mechanic_phone = htmlspecialchars($_POST['telefono']);
        $mechanic_nif = htmlspecialchars($_POST['nif']);
        $mechanic_type = htmlspecialchars($_POST['type']);

        $new_mechanic = new Mechanic();
        try {
            $new_mechanic->newMechanic($dbh,$mechanic_name, $mechanic_direccion, $mechanic_city, $mechanic_phone, $mechanic_nif, $mechanic_type);
           
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
    $type = $mech['type'];
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
    $mechanic_type = $_POST['type'];
    // guardamos los datos en la base de datos
    $mechanicToChange = new Mechanic();
    $mechanicToChange->editMechanic($dbh, $mechanic_name, $mechanic_direction, $mechanic_city, $mechanic_nif, $mechanic_phone, $id, $mechanic_type);
    //una vez guardados, redirigimos a la p�gina principal
    // Limpiamos el búfer de salida
    ?>
    <script> location.replace("index.php?action=agenda"); </script>
    <?php
    exit();

  }
}

function modReview($dbh, $id_review, $review){
  foreach ($review as $rw ) {
    $review_odc = $rw['odc'];
    $review_comments = $rw['comments'];
    $review_datein = $rw['date_in'];
    $review_dateout = $rw['date_out'];
    $review_exported = $rw['exported'];
    $review_km = $rw['km_review'];
    $review_price = $rw['price'];

   
    //Pasamos los datos al formulario
    include 'view/editReviewView.php';
  }

  //recogemos datos y los pasamos a la base

  // Procesamos el formulario y guardamos los datos en la BD
  if (isset($_POST['EditAReview'])) {
    $rw_odc = $_POST['reviewodc'];
    $rw_comments = $_POST['comments'];
    $rw_datein = $_POST['datein'];
    $rw_dateout = $_POST['dateout'];
    $rw_exported = $_POST['reviewodc'];
    $rw_km = $_POST['kmreview'];
    $rw_price = $_POST['reviewprice'];
        
    // Guardamos los datos en la base de datos
    $reviewToChange = new Review();
    $reviewToChange->modyReview($dbh, $id_review, $rw_odc, $rw_comments, $rw_datein, $rw_dateout, $rw_exported, $rw_km, $rw_price);

    // Redirigimos a la página principal
    ?>
    <script> location.replace("index.php"); </script>
    <?php
    exit();
  }
}
?>
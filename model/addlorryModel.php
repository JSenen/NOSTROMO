<?php
include_once './domain/Lorry.php';

function addNewLorry($dbh){

    if (isset($_POST['addALorry'])) {
        // Obtenemos los datos del formulario, asegur�ndonos que son v�lidos.
        $lorry_matricula = htmlspecialchars($_POST['matricula']);
        $lorry_modelo = htmlspecialchars($_POST['modelo']);
        $lorry_km = $_POST['kmlorry'];
        // Comprobar si los campos han sido relelnados
        if ($lorry_matricula == '' || $lorry_modelo == '' || $lorry_km == '') {
          // Genera el mensaje de error
          $error = 'ERROR: Por favor, introduce todos los campos requeridos.!';
    
        } else {
          // guardamos los datos en la base de datos
          // Creamos un objeto camión
          $Newlorry = new Lorry();
          try {
            $Newlorry->addLorries($dbh,$lorry_matricula,$lorry_modelo,$lorry_km);
            echo 'NUEVO CAMION GRABADO';
            header('Location: ./index.php');
          } catch (Exception $e) {
            // Manejar la excepción aquí
            echo 'Ha ocurrido un error: ' . $e->getMessage();
          }
    
        }
      }
}

function editLorry($dbh,$lorry){

  foreach ($lorry as $lorrytomod ) {
    $lorrybrand = $lorrytomod['brand'];
    $lorrymodel = $lorrytomod['model'];
    $lorrykm = $lorrytomod['km'];
    $id = $lorrytomod['id_lorry'];
    //Pasamos los datos al formulario
    include 'view/editlorriesview.php';
  }

  //recogemos datos y los pasamos a la base

  // Procesamo el formulario y guardamos los datos en la BD.
  if (isset($_POST['modLorry'])) {

    $lorry_brand =$_POST['lorrybrand'];
    $lorry_model = $_POST['lorrymodel'];
    $lorry_km= $_POST['lorrykm'];
    // guardamos los datos en la base de datos
    $lorrytochange = new Lorry();
    $lorrytochange->modyLorry($dbh, $lorry_brand, $lorry_model, $lorry_km, $id);

    //una vez guardados, redirigimos a la p�gina principal
    header("Location: index.php");

  }

  function eraseALorry($dbh,$id){
      
        $dellorry = new Lorry();
        try {
            $dellorry->deletelorry($dbh,$id);
        } catch (Exception $e) {
            echo 'Se ha producido un error' . $e->getMessage();
        }
  }
  
 

}
?>
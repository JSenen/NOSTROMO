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
?>
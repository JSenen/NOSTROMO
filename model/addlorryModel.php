<?php
include_once './domain/Lorry.php';

function addNewLorry($dbh)
{
    if (isset($_POST['addALorry'])) {
        // Obtenemos los datos del formulario, asegurándonos de que son válidos.
        $lorry_matricula = htmlspecialchars($_POST['matricula']);
        $lorry_modelo = htmlspecialchars($_POST['modelo']);
        $lorry_km = $_POST['kmlorry'];

        // Verificar si los campos han sido rellenados
        if ($lorry_matricula === '' || $lorry_modelo === '' || $lorry_km === '') {
            // Genera el mensaje de error
            $error = 'ERROR: Por favor, introduce todos los campos requeridos.';
        } else {
            // Comprobar si se subió correctamente un archivo
            if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                $lorry_photo = file_get_contents($_FILES['photo']['tmp_name']);
            } else {
                // No se subió un archivo válido
                $lorry_photo = null; // Otra acción o valor por defecto
            }

            // guardamos los datos en la base de datos
            // Creamos un objeto camión
            $Newlorry = new Lorry();
            try {
                $Newlorry->addLorries($dbh, $lorry_matricula, $lorry_modelo, $lorry_km, $lorry_photo);
                header('Location: ./index.php');
                exit();
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
    $lorryphoto = $lorrytomod['lorry_photo'];
    //Pasamos los datos al formulario
    include 'view/editlorriesview.php';
  }

  //recogemos datos y los pasamos a la base

  // Procesamos el formulario y guardamos los datos en la BD
  if (isset($_POST['modLorry'])) {
    $lorry_brand = $_POST['lorrybrand'];
    $lorry_model = $_POST['lorrymodel'];
    $lorry_km = $_POST['lorrykm'];
    
    // Procesar la nueva foto si se seleccionó un archivo
    if ($_FILES['lorrynewphoto']['name']) {
      $lorry_new_photo = $_FILES['lorrynewphoto']['tmp_name'];
      $lorryphoto = file_get_contents($lorry_new_photo);
    }
    
    // Guardamos los datos en la base de datos
    $lorrytochange = new Lorry();
    $lorrytochange->modyLorry($dbh, $lorry_brand, $lorry_model, $lorry_km, $lorryphoto, $id);

    // Redirigimos a la página principal
    ?>
    <script> location.replace("index.php"); </script>
    <?php
    exit();
  }
}

  function eraseALorry($dbh,$id){
      
        $dellorry = new Lorry();
        try {
            $dellorry->deletelorry($dbh,$id);
        } catch (Exception $e) {
            echo 'Se ha producido un error' . $e->getMessage();
        }
  }
  
?>
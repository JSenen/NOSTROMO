<?php
include_once './domain/Lorry.php';
include_once './domain/Review.php';

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
    include './view/footerview.php';
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

  function newReview($dbh,$id){
    if (isset($_POST['addReviewToLorry'])) {
      // Obtenemos los datos del formulario, asegurándonos de que son válidos.
      $review_fechain = $_POST['datein'];
      $review_fechaout = $_POST['dateout'];
      $review_commnets = $_POST['comments'];
      $review_kmreview = $_POST['kmreview'];
      $review_reviewprice = $_POST['reviewprice'];
      $review_reviewodc = $_POST['reviewodc'];
      $review_reviewmechanic = $_POST['reviewmechanic'];
      

          // guardamos los datos en la base de datos
          // Creamos un objeto revisión
          $NewReview = new Review();
          try {
              $NewReview->addReviewToLorry($dbh,$id,$review_fechain,$review_fechaout,$review_commnets,$review_kmreview,$review_reviewodc,$review_reviewprice,$review_reviewmechanic);
              ?>
              <script> location.replace("index.php"); </script>
             <?php
          } catch (Exception $e) {
              // Manejar la excepción aquí
              echo 'Ha ocurrido un error: ' . $e->getMessage();
          }
      }
  }  

  function modOneReview($dbh,$id_review){
    
  }
?>

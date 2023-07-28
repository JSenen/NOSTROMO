<?php
include_once('./domain/Lorry.php');
include_once('./domain/Review.php');
include_once('./view/headerview.php');

function seeListLorriesReports($dbh, $lorriesList){
?>
<p style="vertical-align: middle; font-weight: bold; font-size: 24px; color: blue;">INFORMES</p>
 <div class="contenido">
<table class="table table-striped table-fixed" id="tableLorries">
  <thead>
    <tr>
      <th class="text-info" style="width: 14%">Imagen</th>
      <th class="text-info" style="width: 14%">MATRICULA</th>
      <th class="text-info" style="width: 14%">KM</th>
      <th class="text-info" style="width: 14%">MODELO</th>
      <th class="text-info" style="width: 14%">GASTO TOTAL</th>
    </tr>
  </thead>
  <tbody>

    <?php
    $totalPrice = 0;
    foreach ($lorriesList as $lorry) {
        $id_lorry = $lorry['id_lorry'];                          //Recuperamos Id de cada camion
        $rev = new Review();
        $revToCount = $rev->getReviewsByLorry($dbh, $id_lorry); //Array de revisiones de cada camion
            foreach ($revToCount as $simpleRev) {               // Recorremos las revisones del camion para ir sumando
                $revId = $simpleRev['id_review'];
                $revPrice = $simpleRev['price'];
                $totalPrice = $totalPrice + $revPrice;
            }
      ?>

      <tr>
        <td>
          <a href="index.php?idlorry=<?php echo $lorry['id_lorry']?>&action=viewLorryDetail">
          <?php
          if ($lorry['lorry_photo']) {
            // Obtener la imagen de la base de datos
            $photoData = $lorry['lorry_photo'];
            $photoSrc = 'data:image/jpeg;base64,' . base64_encode($photoData);
            ?>
            <div class="photo-container" style="width: 150px; height: 150px; overflow: hidden;">
              <img src="<?php echo $photoSrc; ?>" alt="Foto" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <?php
          } else {
            // Mostrar una imagen por defecto si no hay foto
            ?>
            <div class="photo-container" style="width: 150px; height: 150px; overflow: hidden;">
              <img src="./resources/img/NO_IMG.png" alt="Foto" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <?php
          }
          ?>
          </a>
        </td>
        <td style="vertical-align: middle; font-weight: bold; font-size: 18px;"><?php echo $lorry['brand'];?></td>
        <td style="vertical-align: middle;"><?php echo $lorry['km'];?></td>
        <td style="vertical-align: middle;"><?php echo $lorry['model'];?></td>
        <td style="vertical-align: middle; color: red;"><?php echo $totalPrice.' €'?></td>
      </tr>

      <?php
    }
    ?>
  </tbody>
</table>
</div>

<script>
$(document).ready(function () {
  $('#tableLorries').DataTable({
    "order": [[0, "des"]],
    "language": {
      "lengthMenu": "Mostrar _MENU_ registros por página",
      "zeroRecords": "Sin resultados - lo lamento",
      "info": "Mostrando _PAGE_ de _PAGES_",
      "infoEmpty": "No hay registros disponibles",
      "infoFiltered": "(Filtrando _MAX_ registros totales)",
      "paginate": {
        "next": "Siguiente",
        "previous": "Anterior"
      },
      "search": "Buscar"
    }


  });
});
</script>
<?php
}
include './view/footerview.php';
?>
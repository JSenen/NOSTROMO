<?php
include_once('./domain/Lorry.php');
include_once('./view/headerview.php');

function listLorrys($lorries)
{
  ?>
  <div class="contenido">

    <table class="table table-striped table-fixed" id="tableLorries">
      <thead>
        <tr>
          <th class="text-info" style="width: 8.5%">MATRICULA</th>
          <th class="text-info" style="width: 8.5%">KM</th>
          <th class="text-info" style="width: 6%">MODELO</th>
          <th class="text-info" style="width: 20%">Imagen</th>
          <th class="text-info" style="width: 6%">Revisiones</th>
          <th class="text-info" style="width: 6%">Editar</th>
          <th class="text-info" style="width: 6%">Borrar</th>
          

        </tr>
      </thead>
      <tbody>

        <?php
        foreach ($lorries as $lorry) {
          ?>

          <tr>
            <td ><?php echo $lorry['brand'];?></td>
            <td><?php echo $lorry['km'];?></td>
            <td><?php echo $lorry['model'];?></td>
            <td>
              <?php
              if ($lorry['lorry_photo']) {
                // Obtener la imagen de la base de datos
                $photoData = $lorry['lorry_photo'];
                $photoSrc = 'data:image/jpeg;base64,' . base64_encode($photoData);
                ?>
                <div class="photo-container" style="width: 100px; height: 100px; overflow: hidden;">
                  <img src="<?php echo $photoSrc; ?>" alt="Foto" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <?php
              } else {
                // Mostrar una imagen por defecto si no hay foto
                ?>
                <div class="photo-container" style="width: 100px; height: 100px; background-color: #f0f0f0; text-align: center;">
                  <span style="line-height: 100px; font-size: 24px; color: #777;">Sin foto</span>
                </div>
                <?php
              }
              ?>
            </td>
            <td><a href="index.php?idlorry=<?php echo $lorry['id_lorry']?>&action=seeReviewsLoory&matricula=<?php echo $lorry['brand']?>" class="btn btn-dark">Taller</a></td>
            <td><a href="index.php?idlorry=<?php echo $lorry['id_lorry']?>&action=modLorry" class="btn btn-primary">Editar</a></td>
            <td><a href="index.php?idlorry=<?php echo $lorry['id_lorry']?>&action=eraseLorry" class="btn btn-danger">Borrar</a></td>
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
  <div class="content">
    <a href="index.php?action=addLorry" class="btn btn-primary">+ AÑADIR VEHICULO</a>
  </div>
  <?php
}
include './view/footerview.php';
?>
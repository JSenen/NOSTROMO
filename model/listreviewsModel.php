<?php
include_once('./domain/Review.php');
include_once('./view/headerview.php');

function listReviews($dbh,$reviews)
{
  ?>
  <div class="contenido">

    <table class="table table-striped table-fixed" id="tableReviews">
      <thead>
        <tr>
          <th class="text-info" style="width: 8.5%">Fecha Entrada</th>
          <th class="text-info" style="width: 8.5%">Fecha Salida</th>
          <th class="text-info" style="width: 6%">km Revision</th>
          <th class="text-info" style="width: 6%">precio</th>
          <th class="text-info" style="width: 6%">matricula</th>
          <th class="text-info" style="width: 6%">exportado</th>
          <th class="text-info" style="width: 6%">comentarios</th>
          <th class="text-info" style="width: 6%">ODC</th>
          <th class="text-info" style="width: 6%">Editar</th>
          <th class="text-info" style="width: 6%">Borrar</th>
          
        </tr>
      </thead>
      <tbody>

        <?php
        foreach ($reviews as $review) {
          ?>

          <tr>
            <td ><?php echo $review['date_in'];?></td>
            <td><?php echo $review['date_out'];?></td>
            <td><?php echo $review['km_review'];?></td>
            <td><?php echo $review['price'];?></td>
            <td><?php echo $review['idlorry_review'];?></td>
            <td><?php echo $review['exported'];?></td>
            <td><?php echo $review['comments'];?></td>
            <td><?php echo $review['odc'];?></td>
            <td><a href="#" class="btn btn-primary">Editar</a></td>
            <td><a href="#" class="btn btn-danger">Borrar</a></td>
          </tr>

          <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <script>
    $(document).ready(function () {
      $('#tableReviews').DataTable({
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
<?php
include_once('./domain/Review.php');
include_once('./domain/Mechanic.php');
include_once('./view/headerview.php');

function listReviews($dbh,$reviews,$brand, $id)
{
  ?>
  <div class="contenido">

    <table class="table table-striped table-fixed" id="tableReviews">
      <thead>
        <tr>
          <th class="text-info" style="width: 3%">Matricula</th>
          <th class="text-info" style="width: 4%">Entrada</th>
          <th class="text-info" style="width: 4%">Salida</th>
          <th class="text-info" style="width: 6%">Km</th>
          <th class="text-info" style="width: 6%">precio</th>
          <th class="text-info" style="width: 1%">Exp</th>
          <th class="text-info" style="width: 15%">comentarios</th>
          <th class="text-info" style="width: 6%">ODC</th>
          <th class="text-info" style="width: 6%">Taller/Mecanico</th>
          <th class="text-info" style="width: 6%">Editar</th>
          <th class="text-info" style="width: 6%">Borrar</th>
          
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($reviews as $review) {
          $id_lorry = $review['idlorry_review'];
          ?>
          <tr>
          <td style="font-weight: bold; font-size: 18px;">
              <?php
              if ($brand != '') {
                echo $brand;
              } else {
                $rw = new Review();
                $plate = $rw->getBradLorry($dbh, $review['idlorry_review']);
                echo $plate;
              }
              ?>
            </td>
            <td><?php echo date('d/m/Y', strtotime($review['date_in'])); ?></td>
            <td><?php echo date('d/m/Y', strtotime($review['date_out'])); ?></td>
            <td><?php echo $review['km_review'];?></td>
            <td><?php echo $review['price'];?></td>
            <td><?php if ($review['exported'] == 1){?>
                        <i class="fas fa-check" style="color: green;"></i>
                <?php
            }else{ ?>
                        <i class="fas fa-times" style="color: red;"></i>
                <?php
            };?></td>
            <td><?php echo $review['comments'];?></td>
            <td><?php echo $review['odc'];?></td>
            <td><?php  
                $idreview = $review['id_review'];
                $getmechanic = new Mechanic();
                $mechanic = $getmechanic->getOneMechanicByReview($dbh, $idreview);
                echo isset($mechanic['name']) ? $mechanic['name'] : 'Valor no disponible';?></td>
            <td><a href="#" class="btn btn-primary"><i class="fas fa-pencil-alt"> Editar</a></td>
            <td><a href="index.php?idlorry=<?php echo $review['id_review']?>&action=eraseReview&matricula=<?php echo $brand?>" class="btn btn-danger"><i class="fas fa-trash"> Borrar</a></td>
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
  if ($brand){
    ?>
  <div class="content">
    <a href="index.php?action=addReviewToLorry&idlorry=<?php echo $id; ?>" class="btn btn-primary">+ AÑADIR REVISION</a>
  </div>
  <?php
  }
}

include './view/footerview.php';
?>
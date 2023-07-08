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
          <th style="width: 44.5%">KM</th>
          <th style="width: 6%">MODELO</th>

        </tr>
      </thead>
      <tbody>

        <?php
        foreach ($lorries as $lorry) {
          ?>

          <tr>
            <td class="text-white"><?php echo $lorry['brand'];?></td>
            <td><?php echo $lorry['km'];?></td>
            <td><?php echo $lorry['model'];?></td>


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
    <button type="button" class="btn btn-outline-info" onclick="location.reload()">Actualizar</button>
  </div>

  <?php
}
include './view/footerview.php';
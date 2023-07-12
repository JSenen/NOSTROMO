<?php
include_once './domain/Mechanic.php';

function iniAgenda($dbh, $listmechanic){
    ?>

    <div class="contenido">
  
      <table class="table table-striped table-fixed" id="tableAgenda">
        <thead>
          <tr>
            <th class="text-info" style="width: 8.5%">NOMBRE</th>
            <th class="text-info" style="width: 8.5%">NIF</th>
            <th class="text-info" style="width: 6%">CIUDAD</th>
            <th class="text-info" style="width: 6%">TELEFONO</th>
            <th class="text-info" style="width: 6%">TIPO</th>
            
  
          </tr>
        </thead>
        <tbody>
  
          <?php
          foreach ($listmechanic as $mechanic) {
            ?>
  
            <tr>
              <td ><?php echo $mechanic['name'];?></td>
              <td><?php echo $mechanic['nif'];?></td>
              <td><?php echo $mechanic['city'];?></td>
              <td><?php echo $mechanic['phone'];?></td>
              <td><?php echo $mechanic['type'];?></td>
              <td><a href="#" class="btn btn-primary">Editar</a></td>
              <td><a href="" class="btn btn-danger">Borrar</a></td>
            </tr>
  
            <?php
          }
          ?>
        </tbody>
      </table>
    </div>
    <script>
      $(document).ready(function () {
        $('#tableAgenda').DataTable({
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
      <a href="index.php?action=addMechanic" class="btn btn-primary">+ AÑADIR</a>
    </div>
    <?php
  }
  include './view/footerview.php';
  ?>

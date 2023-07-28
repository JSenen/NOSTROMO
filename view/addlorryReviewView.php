<?php
include_once './domain/Mechanic.php';
$mechaniclist = new Mechanic();
$listmechanic = $mechaniclist->getMechanics($dbh);
$review_exported = 0;
?>
<div class="page-content p-5 text-gray" id="content"> 
<p style="vertical-align: middle; font-weight: bold; font-size: 24px; color: blue;">AÑADIR REVISIÓN</p>
 <!-- content -->  
  <form action="" method="post">
  <div class="form-group">
    <label for="FechaInicio">Fecha Inicio</label>
    <input type="date" class="form-control" name="datein" id="datein" placeholder="Fecha inicio" pattern="\d{1,2}-\d{1,2}-\d{4}" title="Formato de fecha válido: d-m-yyyy">
    </div>
    <div class="form-group">
        <label for="FechaFin">Fecha Fin</label>
        <input type="date" class="form-control" name="dateout" id="dateout" placeholder="Fecha finalizacion" pattern="\d{1,2}-\d{1,2}-\d{4}" title="Formato de fecha válido: d-m-yyyy" >
    </div>
    <div class="form-group">
        <label for="Comentarios">Trabajos realizados</label>
        <textarea class="form-control" name="comments" id="comments" placeholder="Breve comentario trabajos realizados"></textarea>
    </div>
    <div class="form-group">
      <label for="km">Km</label>
      <input type="text" class="form-control" name="kmreview" id="kmreview" placeholder="Km en el momento del trabajo" pattern="[0-9]+(\.[0-9]+)?" title="Solo se permiten números">
    </div>
    <div class="form-group">
      <label for="Precio">Precio</label>
      <input type="text" class="form-control" name="reviewprice" id="reviewprice" placeholder="Precio operacion">
    </div>
    <div class="form-group">
      <label for="ODC">ODC</label>
      <input type="text" class="form-control" name="reviewodc" id="reviewodc" placeholder="ODC">
    </div>
    <div>
    <div class="form-group">
        <label for="Exportada">Exportada</label>
        <div class="form-check">
        <input type="checkbox" class="form-check-input" name="exported" id="exported" <?php if ($review_exported == 1) echo 'checked'; ?>>
    </div>
  </div>
    <div class="form-group">
      <label for="mecanico">Mecánico</label>
      <select class="form-control" name="reviewmechanic" id="reviewmechanic">
        <?php foreach ($listmechanic as $mechanic) : ?>
          <option value="<?php echo $mechanic['id_mechanic']; ?>"><?php echo $mechanic['name']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>  
    <button type="submit" class="btn btn-primary" name="addReviewToLorry">Añadir</button>
    <a href="index.php?action=reviews" class="btn btn-secondary">Regresar</a>
  </form>
</div>
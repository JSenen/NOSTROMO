<?php
include_once './domain/Mechanic.php';
$mechaniclist = new Mechanic();
$listmechanic = $mechaniclist->getMechanics($dbh);
?>
<div class="page-content p-5 text-gray" id="content"> 
 <!-- content -->  
 <form action="" method="post">
  <div class="form-group">
    <label for="FechaInicio">Fecha Inicio</label>
    <input type="date" class="form-control" name="datein" id="datein" value="<?php echo $review_datein ?>">
  </div>
  <div class="form-group">
    <label for="FechaFin">Fecha Fin</label>
    <input type="date" class="form-control" name="dateout" id="dateout" value="<?php echo $review_dateout ?>">
  </div>
  <div class="form-group">
    <label for="Comentarios">Trabajos realizados</label>
    <textarea class="form-control" name="comments" id="comments"><?php echo $review_comments ?></textarea>
  </div>
  <div class="form-group">
    <label for="km">Km</label>
    <input type="text" class="form-control" name="kmreview" id="kmreview" value="<?php echo $review_km ?>">
  </div>
  <div class="form-group">
    <label for="Precio">Precio</label>
    <input type="text" class="form-control" name="reviewprice" id="reviewprice" value="<?php echo $review_price ?>">
  </div>
  <div class="form-group">
    <label for="ODC">ODC</label>
    <input type="text" class="form-control" name="reviewodc" id="reviewodc" value="<?php echo $review_odc ?>">
  </div>
  <div class="form-group">
  <label for="Exportada">Exportada</label>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" name="exported" id="exported" value="1" <?php if ($review_exported == 1) echo 'checked'; ?>>
  </div>
</div>
  <button type="submit" class="btn btn-primary mt-3" name="EditAReview">Modificar</button>
  <a href="index.php?action=reviews" class="btn btn-secondary mt-3">Regresar</a>
</form>
</div>

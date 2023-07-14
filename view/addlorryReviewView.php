<div class="page-content p-5 text-gray" id="content"> 
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
      <input type="text" class="form-control" name="kmreview" id="kmreview" placeholder="Km en el momento trabajo">
    </div>
    <div class="form-group">
      <label for="Precio">Precio</label>
      <input type="text" class="form-control" name="reviewprice" id="reviewprice" placeholder="Precio operacion">
    </div>
    <div class="form-group">
      <label for="ODC">ODC</label>
      <input type="text" class="form-control" name="reviewodc" id="reviewodc" placeholder="ODC">
    </div>
    
    <button type="submit" class="btn btn-primary" name="addReviewToLorry">Añadir</button>
  </form>
</div>
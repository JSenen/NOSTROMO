<div class="page-content p-5 text-gray" id="content"> 
 <!-- content -->  
 <p style="vertical-align: middle; font-weight: bold; font-size: 24px; color: blue;">AÑADIR VEHÍCULO</p>
 <form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="lorryBrand">MATRICULA</label>
    <input type="text" class="form-control" name="matricula" id="matricula" placeholder="Inserte matrícula">
  </div>
  <div class="form-group">
    <label for="lorryModel">MODELO</label>
    <input type="text" class="form-control" name="modelo" id='modelo' placeholder="Inserte modelo">
  </div>
  <div class="form-group">
    <label for="lorryModel">KM</label>
    <input type="text" class="form-control" name="kmlorry" id='kmlorry' placeholder="Inserte km">
  </div>
  <div class="form-group">
    <label for="lorryPhoto">FOTO</label>
    <input type="file" class="form-control-file" name="photo" id="photo">
  </div>
  <button type="submit" class="btn btn-primary" name="addALorry">Añadir</button>
  <a href="index.php" class="btn btn-secondary">Regresar</a>
</form>
</div>

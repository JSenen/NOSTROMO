<div class="page-content p-5 text-gray" id="content"> 
 <!-- content -->  
 <form action="" method="post">
  <div class="form-group">
    <label for="lorryBrand">MATRICULA</label>
    <input type="text" class="form-control" name="lorrybrand" id="lorrybrand" value="<?php echo $lorrybrand ?>">
  </div>
  <div class="form-group">
    <label for="lorryModel">MODELO</label>
    <input type="text" class="form-control" name="lorrymodel" id='lorrymodel' value="<?php echo $lorrymodel ?>">
  </div>
  <div class="form-group">
    <label for="lorryModel">KM</label>
    <input type="text" class="form-control" name="lorrykm" id='lorrykm' value="<?php echo $lorrykm ?>">
  </div>
  <button type="submit" class="btn btn-primary" name="modLorry">Modificar</button>
</form>
</div>
<div class="page-content p-5 text-gray" id="content">
  <!-- content -->
  <form action="" method="post" enctype="multipart/form-data">
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
    <div class="form-group">
      <label for="lorryPhoto">FOTO</label>
      <div>
        <?php if ($lorryphoto) { ?>
          <img src="data:image/jpeg;base64,<?php echo base64_encode($lorryphoto); ?>" alt="Foto" style="max-width: 200px; max-height: 200px;">
        <?php } else { ?>
          <span>Sin foto</span>
        <?php } ?>
      </div>
      <div class="form-group">
        <label for="lorryNewPhoto">NUEVA FOTO</label>
        <input type="file" class="form-control-file" name="lorrynewphoto" id="lorrynewphoto">
      </div>
   </div>
    <button type="submit" class="btn btn-primary" name="modLorry">Modificar</button>
  </form>
</div>
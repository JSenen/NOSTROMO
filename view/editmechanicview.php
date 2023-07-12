<div class="page-content p-5 text-gray" id="content"> 
 <!-- content -->  
  <form action="" method="post">
    <div class="form-group">
      <label for="mechanicName">Nombre</label>
      <input type="text" class="form-control" name="name" id="name" value="<?php echo $mechanic_name ?>">
    </div>
    <div class="form-group">
      <label for="mechanicDirection">Dirección</label>
      <input type="text" class="form-control" name="address" id="address" value="<?php echo $mechanic_direction ?>">
    </div>
    <div class="form-group">
      <label for="mechanicCity">Ciudad</label>
      <input type="text" class="form-control" name="city" id="city" value="<?php echo $mechanic_city ?>">
    </div>
    <div class="form-group">
      <label for="mechanicPhone">Telefono</label>
      <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $mechanic_phone ?>">
    </div>
    <div class="form-group">
      <label for="mechanicNIf">NIF</label>
      <input type="text" class="form-control" name="nif" id="nif" value="<?php echo $mechanic_nif ?>">
    </div>
    
    <button type="submit" class="btn btn-primary" name="modMechanic">Modificar</button>
  </form>
</div>
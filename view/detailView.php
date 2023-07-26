<style>
    .details-container {
      background-color: #fff;
      border: 2px solid #000;
      border-radius: 5px;
      padding: 15px;
    }

    .license-plate {
      background-color: #fff;
      color: #000;
      border: 2px solid #000;
      border-radius: 5px;
      padding: 10px;
      font-size: 20px;
      font-weight: bold;
      display: inline-block;
      position: relative; /* Necesario para posicionar la banda azul */
    }

    .blue-band {
      position: absolute;
      left: -2px;
      top: -2px;
      bottom: -2px;
      width: 10px;
      background-color: #3498db;
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
    }
    .large-image {
      max-width: 400px;
      max-height: 400px;
      display: block;
      margin: 0 auto;
    }
  </style>
  <div class="container mt-5">
    <div class="details-container">
      <div class="form-group">
        <label for="lorryBrand">MATRICULA:</label>
        <div class="license-plate" id="lorrybrand">
          <div class="blue-band"></div>
          <?php echo $lorrybrand ?>
        </div>
      </div>
      <div class="form-group">
        <label for="lorryModel">MODELO:</label>
        <span id="lorrymodel"><?php echo $lorrymodel ?></span>
      </div>
      <div class="form-group">
        <label for="lorryModel">KM:</label>
        <span id="lorrykm"><?php echo $lorrykm ?></span>
      </div>
      <div class="form-group">
        <label for="lorryPhoto">FOTO:</label>
        <div>
          <?php if ($lorryphoto) { ?>
            <img src="data:image/jpeg;base64,<?php echo base64_encode($lorryphoto); ?>" alt="Foto" class="large-image">
          <?php } else { ?>
            <img src="./resources/img/NO_IMG.png" alt="Foto" class="large-image">
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

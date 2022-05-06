<?php
  include_once 'Vista/profesionalesSalud/header.php';
  include_once 'Vista/menu.php';
  include_once 'Vista/profesionalesSalud/barraMenu.php';
  ini_set('display_errors', 0);
            ini_set('display_startup_errors', 0);
            error_reporting(E_ALL);
?>
<div class="contenedor_padre">
  <div class="formulario_profesional">
    <h3>Ingresar horario disponible por día</h3><br>
    <?php
      if($this->mensaje != null){
          echo "<h4 class='h_advertencia'>**". $this->mensaje . '**</h4>';
      }
    ?>
    <form action="<?php echo constant('URL'); ?>profesionalSalud/HoraDisponible" method="POST">
      <p>
          <label for="">Selecciona la fecha.</label><br>
          <input type="date" name="fecha" id="" value="<?php echo date('Y-m-d'); ?>">
      </p><br>
      <p>
          <label for="">Selecciona un rango horario.</label><br>
          <!--
          <input type="time" name="h_inicio" id="" step="60"><br>
          <input type="time" name="h_fin" id="" step="60"><br>
          -->
          <select name="h_inicio" id="">
            <option value="" selected>Selecciona la hora inicial</option>
            <option value="00:00">00:00</option>
            <option value="01:00">01:00</option>
            <option value="02:00">02:00</option>
            <option value="03:00">03:00</option>
            <option value="04:00">04:00</option>
            <option value="05:00">05:00</option>
            <option value="06:00">06:00</option>
            <option value="07:00">07:00</option>
            <option value="08:00">08:00</option>
            <option value="09:00">09:00</option>
            <option value="10:00">10:00</option>
            <option value="11:00">11:00</option>
            <option value="12:00">12:00</option>
            <option value="13:00">13:00</option>
            <option value="14:00">14:00</option>
            <option value="15:00">15:00</option>
            <option value="16:00">16:00</option>
            <option value="17:00">17:00</option>
            <option value="18:00">18:00</option>
            <option value="19:00">19:00</option>
            <option value="20:00">20:00</option>
            <option value="21:00">21:00</option>
            <option value="22:00">22:00</option>
            <option value="23:00">23:00</option>
          </select><br>

          <select name="h_fin" id="">
            <option value="" selected>Selecciona la hora de cierre de atenciones</option>
            <option value="00:00">00:00</option>
            <option value="01:00">01:00</option>
            <option value="02:00">02:00</option>
            <option value="03:00">03:00</option>
            <option value="04:00">04:00</option>
            <option value="05:00">05:00</option>
            <option value="06:00">06:00</option>
            <option value="07:00">07:00</option>
            <option value="08:00">08:00</option>
            <option value="09:00">09:00</option>
            <option value="10:00">10:00</option>
            <option value="11:00">11:00</option>
            <option value="12:00">12:00</option>
            <option value="13:00">13:00</option>
            <option value="14:00">14:00</option>
            <option value="15:00">15:00</option>
            <option value="16:00">16:00</option>
            <option value="17:00">17:00</option>
            <option value="18:00">18:00</option>
            <option value="19:00">19:00</option>
            <option value="20:00">20:00</option>
            <option value="21:00">21:00</option>
            <option value="22:00">22:00</option>
            <option value="23:00">23:00</option>
          </select>
      </p><br>
      <input class="btn"  type="submit" value="Guardar" name="btn_hora_disponible">


    </form>




      
  </div>
  
</div>
<?php
  include_once  'Vista/footer.php';
?>
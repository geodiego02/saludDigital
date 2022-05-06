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
    
    <h3>Registra tu información profesional</h2><br><br>
    <h4>Esta información será necesaria para que tus pacientes puedan 
      saber tu especialidad, tu expertiz y tus medios de contacto.
    </h4><br>
    <h4>Recuerda: Los campos con marcador rojo son obligatorios.</h4>
    <?php
      if($this->mensaje != null){
          echo "<h4 class='h_advertencia'>**". $this->mensaje . '**</h4>';
      }
    ?>
    <form name="inicial" action="<?php echo constant('URL'); ?>profesionalSalud/RegistrarInformacion" method="POST">
      <p>
        <label for="">Ingresa tu nombre</label><br>
        <input type="text" name="nombre" id=""><i>*</i>
      </p>
      <br>
      <p>
        <label for="">Ingresa tu apellido paterno</label><br>
        <input type="text" name="apaterno" id=""><i>*</i>
      </p>
      <br>
      <p>
        <label for="">Ingresa tu apellido materno</label><br>
        <input type="text" name="amaterno" id=""><i>*</i>
      </p>
      <br>
      <!-- 
      <p>
        <label for="">Ingresa tu fecha de nacimiento</label><br>
        <input type="date" name="fnacimiento" id="">
      </p>
      <br>
      -->
      <p>
        <label for="">Ingresa tu dirección de atención pública o particular.</label><br>
      </p>
      <br>
      <p>
        <label for="">País</label><br>
        <Select name="pais">
          <option value=""<?php if($this->paisElegido==='') echo 'selected'; ?>>Selecciona una opción</option>
          <option value="1" <?php if($this->paisElegido==='cl') echo 'selected'; ?>>Chile</option>
          <option value="2" <?php if($this->paisElegido==='ar') echo 'selected'; ?>>Argentina</option>
          <option value="3" <?php if($this->paisElegido==='pe') echo 'selected'; ?>>Perú</option>
          <option value="4" <?php if($this->paisElegido==='co') echo 'selected'; ?>>Colombia</option>
          <option value="5" <?php if($this->paisElegido==='ve') echo 'selected'; ?>>Venezuela</option>
          <option value="6" <?php if($this->paisElegido==='ec') echo 'selected'; ?>>Ecuador</option>
          <option value="7" <?php if($this->paisElegido==='bo') echo 'selected'; ?>>Bolivia</option>
          <option value="8" <?php if($this->paisElegido==='mx') echo 'selected'; ?>>México</option>
        </select><i>*</i>
      </p>
      <br>

      <p>
        <label for="">Región o Estado.</label><br>
        <Select name="region">
          <option value="" <?php if($this->regionElegida==='') echo 'selected'; ?>>Selecciona una opción</option>
          <option value="1" <?php if($this->regionElegida==='1') echo 'selected'; ?>>Región del Maule</option>
        </select><i>*</i>
      </p>

      <br>
      <p>
        <label for="">Ciudad</label><br>
        <select name="ciudad" id="">
          <?php  
            if($this->ciudades!=null)
            {  
              echo "<option value=''>Selecciona una opción</option>";
                foreach($this->ciudades as $valor)
                {
                    echo "<option value='".$valor."'"; 
                    if($this->ciudadElegida==$valor)
                    {
                      echo " selected";
                    } 
                    echo ">".$valor . "</option>";
                }
            }
          ?>
        </select><i>*</i>
      </p>
      
      <br>
      <!--
      <p>
        <label for="">Ingresa el nombre de calle, villa y/o lugar de atención de salud</label><br>
        <input type="text" name="calle" id="">
      </p>
      <br>
      
      <p>
        <label for="">Ingresa el número de oficina/departamento.</label><br>
        <input type="text" name="num_dep" id=""><i>*</i>
      </p>
      <br>
      
      <p>
        <label for="">Indica tu teléfono.</label><br>
        <input type="tel" name="tel" id="">
      </p>
      <br>
      -->
      <p>
        <label for="">Ingresa tu título profesional.</label><br>
        <input type="tel" name="titulo_profesional" id=""><i>*</i>
      </p>
      <br>
      <p>
        <label for="">Especifica alguna especialidad.</label><br>
        <input type="tel" name="especialidad" id=""><i>*</i>
      </p>
      <br>
      <!--
      <p>
        <label for="">Indícanos el registro del Instituto de salud Pública si lo tienes.</label><br>
        <input type="tel" name="registro_salud" id="">
      </p>
          -->
      <br>
      <input class="btn" name="btn_registrar" type="submit" value="Registrar información"><br>
    </form>



  </div>
</div>
<?php
  include_once  'Vista/footer.php';
?>
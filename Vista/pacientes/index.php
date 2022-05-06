<?php
  include_once 'Vista/pacientes/header.php';
  include_once 'Vista/menu.php';
        
  include_once 'Controlador/profesionalSalud.php';
  $pro=new ProfesionalSalud();
  $ciudades=$pro->ObtenerCiudades();
?>

<div class="sidebar">
    <div class="logo-details">
        <div class="logo_name"></div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Buscar...">
         <span class="tooltip">Búsqueda</span>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Tablero</span>
        </a>
         <span class="tooltip">Centro de control</span>
      </li>
      <li>
       <a href="#">
         <i class='bx bx-user' ></i>
         <span class="links_name">Usuario</span>
       </a>
       <span class="tooltip">Usuario</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Mensajes</span>
       </a>
       <span class="tooltip">Mensajes</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Analítica</span>
       </a>
       <span class="tooltip">Analítica</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Archivos</span>
       </a>
       <span class="tooltip">Administrar archivos</span>
     </li>
     
     
     <li>
       <a href="#">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Configuraciones</span>
       </a>
       <span class="tooltip">Configuraciones</span>
     </li>
     
    </ul>
  </div>
  <section class="home-section">
      <div class="text"><h1>Bienvenidos al intranet de los pacientes</h1></div>

      <article class="articulo">
                    <p>
                        <h1>Buscar profesionales de la salud.</h1>
                    </p>
                    <h3>Selecciona los filtros para la búsqueda.</h3><br><br>
                    <label for="">Selecciona un país.</label><br><br>
                    <select name="" id="">
                        <option value="Chile" >Chile</option>
                    </select><br><br>
                    <label for="">Selecciona la región/estado a filtrar.</label><br><br>
                    <select name="" id="">
                        <option value="Del Maule" >Región del Maule</option>
                    </select><br><br>
                    <label for="">Selecciona la ciudad de la región escogida.</label><br><br>
                    <form action="<?php echo constant('URL'); ?>paciente/ConsultarProfesionalesPorCiudad" method="POST">
                    <select name="ciudad" id="">
                        <?php  
                            if($ciudades!=null)
                            {  
                            echo "<option value=''>Selecciona una ciudad</option>";
                                foreach($ciudades as $valor)
                                {
                                    echo "<option value='".$valor."'"; 
                                    if($ciudadElegida==$valor)
                                    {
                                    echo " selected";
                                    } 
                                    echo ">".$valor . "</option>";
                                }
                            }
                        ?>
                    </select><br><br><br>
                    <input class="btn" type="submit" value="Buscar" name="btn-profesionales-ciudad">
                    </form>
                    
                </article>
                <article class="articulo">
                    ¿No sabes qué profesional necesitas?
                    <br>
                    Ingresa tus síntomas y te recomendaremos 
                    <br>
                    el profesional.
                    Busca tu síntoma y agrégalo a la lista!
                </article>
  </section>
    <script src="<?php echo constant('URL'); ?>Publico/js/script.js"></script>




    <?php 
        include_once 'Vista/footer.php';
    ?>
    

<?php
    session_start();
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(1);
    include_once 'Vista/header.php';
    include_once 'Vista/menu.php';

    
    include_once 'Controlador/profesionalSalud.php';
    $pro=new ProfesionalSalud();
    $ciudades=$pro->ObtenerCiudades();
        
?>
        <section class="section">
            <div class="articulos">
                <article class="articulo">
                    <p>
                        <h1>Buscar profesionales de la salud.</h1>
                    </p><br>
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
                
                <?php
                    //mostrar todos los datos de una tabla
                    /*
                    $survey=new Survey();
                    $resul=$survey->ConsultarTabla("especialidad");
                    foreach($resul as $resultado){
                        echo $resultado['nombre_especialidad'] . "<br>";
                    }
                    */
                ?>
            </div>
            <aside class="aside">
                <?php if(!isset($_SESSION['rut'])):?>
                    <form  action="<?php echo constant('URL'); ?>main/RegistrarUsuario" method="POST">
                        <h2>Regístrate</h2><br>
                        <?php
                            if($this->mensaje != null){
                                foreach($this->mensaje as $value){
                                    echo "<label class='respuestaRegistro'><b>*". $value. "*</b></label><br>";
                                }
                            }
                        ?>
                        <br>
                        <p>
                            <label>Ingresa tu rut o ID de pasaporte:</label><br>
                            <input type="text" name="rut" value="<?php echo $this->rut; ?>">
                        </p>
                        <br>
                        <p>
                            Ingresa tu correo electrónico:<br>
                            (Recuérdalo, ya que será el nombre de <br>
                            usuarioque usarás para poder ingresar)<br>
                            <input type="email" name="correo" value="<?php echo $this->correo; ?>">
                        </p>
                        <br>
                        <p>
                            Ingresa el password de la cuenta:<br>
                            <input type="password" name="pass"><br>
                        </p>
                        <br>
                        <p>
                            Por favor, ingresa tu password nuevamente:<br>
                            <input type="password" name="pass2"><br>
                        </p>
                        <br>
                        <p>
                            Selecciona el tipo de usuario:
                            <br>
                            <Select name="rol">
                                <option value="" <?php if($this->rol==='') echo 'selected'; ?>>Selecciona una opción</option>
                                <option value="1" <?php if($this->rol==='1') echo 'selected'; ?>>Paciente</option>
                                <option value="2" <?php if($this->rol==='2') echo 'selected'; ?>>Profesional de salud</option>
                            </select><br><br>
                            <input class="btn" name="registrar_usuario" type="submit" value="Registrar usuario">
                            <br><br><br>
                        </p>
                    </form><br><br>
                <?php endif; ?>
                <div class="articulos_aside">
                    <h3>Artículos más visitados</h3><br>
                    <div class="articulos_seleccionados">
                        <a href="#">#1</a>
                        <div class="logo">

                        </div>
                    </div><br>
                    <div class="articulos_seleccionados">
                        <a href="#">#2</a>
                        <div class="logo">

                        </div>
                    </div><br>
                    <div class="articulos_seleccionados">
                        <a href="#">#3</a>
                        <div class="logo">

                        </div>
                    </div>
                </div>
            </aside>
        </section>

        
    

<?php
    include_once 'Vista/footer.php';
?>
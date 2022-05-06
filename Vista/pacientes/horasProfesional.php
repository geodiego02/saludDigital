<?php
    session_start();
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
    include_once 'Vista/pacientes/header.php';
    include_once 'Vista/menu.php';
?>


    <section class="section">

        <div class="articulos">
            <div class="articulo">
                <h2>Indique la fecha a buscar.</h2>
                <form action="<?php echo constant('URL').'paciente/ConsultarHorasDiaId/'.$this->idProfesional; ?>" method="POST">
                    <input type="date" name="fecha" id="">
                    <input type="submit" value="Buscar" name="buscar">
                </form>
                
            </div>
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
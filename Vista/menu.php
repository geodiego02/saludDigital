

<nav>
        <div class="navegacion"></div>
            <div class="dropdown">
                <a href="<?php echo constant('URL'); ?>main" class="dropbtn">Home</a>
                <div class="dropdown-content">
                </div>
            </div>
            <div class="dropdown">
                <a href="<?php echo constant('URL'); ?>#" class="dropbtn">Servicios</a>
                <div class="dropdown-content">
                    <a href="<?php echo constant('URL'); ?>paciente/IngresoPaciente">Pacientes</a>
                    <a href="<?php echo constant('URL'); ?>profesionalSalud/IngresoProfesional">Profesionales de la salud</a>
                    <a href="<?php echo constant('URL'); ?>#">Laboratorios</a>
                    <a href="<?php echo constant('URL'); ?>#">Centros de salud</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="<?php echo constant('URL'); ?>#" class="dropbtn">Blog</a>
                <div class="dropdown-content">
                    <a href="<?php echo constant('URL'); ?>#">Fisiología</a>
                    <a href="<?php echo constant('URL'); ?>#">Patología</a>
                    <a href="<?php echo constant('URL'); ?>#">Tecnología</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="<?php echo constant('URL'); ?>#" class="dropbtn">Sobre nosotros</a>
                <div class="dropdown-content">
                </div>
            </div>
            <div class="dropdown">
                <a href="<?php echo constant('URL'); ?>#" class="dropbtn">Contacto</a>
                <div class="dropdown-content">
                </div>
            </div>

            <?php if(isset($_SESSION['rut'])):?>
                <div class="dropdown dropdown_session">
                    <a href="<?php echo constant('URL'); ?>sesiones/CerrarSesion" class="dropbtn cerrar_sesion">Cerrar Sesión</a>
                    <div class="dropdown-content">
                    </div>
                </div>
            <?php endif; ?>
            <?php if(isset($_SESSION['rut'])):?>
                <div class="dropdown">
                    <a href="<?php echo constant('URL'); ?>main"
                    class="dropbtn"><?php  echo $_SESSION['rut'];?></a>
                    <div class="dropdown-content">
                    </div>
                </div>
            <?php endif;?>
        </div>    
</nav>
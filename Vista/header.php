
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEALDROID</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>Publico/css/home.css">
</head>
<body>

<div class="padre">
    <header>
        <div class="header-left">
            <h1>Bienvenidos a Healdroid</h1>
        </div>
        <div class="header-center">
        </div>
        <?php if(!isset($_SESSION['rut'])):?>
            <div class="header-right">
                <form class="formulario" name="formulario1" action="<?php echo constant('URL'); ?>main/IniciarSesion" method="POST">
                        <label>Nombre de usuario:</label> 
                        <input class="caja-der" type="text" name="usuario" value="" Placeholder="Tu rut aquí"><br>
                        <label class="caja2">Contraseña:</label>
                        <input class="caja-der" type="password" name="pass" value="" Placeholder="Tu contraseña"><br>
                        <?php 
                            if($this->mensaje2 != null){
                                echo "<label class='inicioSesion'><b>" . $this->mensaje2 . "</b></label>";
                            }
                        ?>
                        <input class="btn boton-usuario" type="submit" name="botonSesion" value="Iniciar">
                </form>
            </div>
        <?php endif; ?>
    </header>
    
    



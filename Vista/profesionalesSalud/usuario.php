<?php
  include_once 'Vista/profesionalesSalud/header.php';
  include_once 'Vista/menu.php';
  include_once 'Vista/profesionalesSalud/barraMenu.php';
?>

<div class="contenedor_itemPadre">


    
    <a class="img_items1" href="<?php echo constant('URL');?>profesionalSalud/IngresarInformacionProfesional">
        <div class="contenedor_item1">
        </div>
    </a>
    
    
    <a class="img_items2" href="<?php echo constant('URL');?>profesionalSalud/ModificarInformacion">
        <div class="contenedor_item2">
        </div>
    </a>
    
    
    <a class="img_items3" href="<?php echo constant('URL');?>profesionalSalud/VerInfo">
        <div class="contenedor_item3">
        </div>
    </a>
    
    
    <a class="img_items4" href="<?php echo constant('URL');?>profesionalSalud/HorasDisponibles">
        <div class="contenedor_item4">
        </div>
    </a>
    
    
    <a class="img_items5" href="<?php echo constant('URL');?>profesionalSalud/VerReservas">
        <div class="contenedor_item5">
        </div>
    </a>
    


</div>










<?php
  include_once  'Vista/footer.php';
?>
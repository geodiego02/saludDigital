

<?php
  include_once 'Vista/profesionalesSalud/header.php';
  include_once 'Vista/menu.php';
  include_once 'Vista/profesionalesSalud/barraMenu.php';
?>
  
  <section class="home-section">
    <div class="text"><h3>Bienvenido a su oficina virtual</h3></div>
  </section>
  <?php 
        if($this->mensaje2 != null){
            echo "<label class='exito_guardar'><b>" . $this->mensaje2 . "</b></label>";
         }
  ?>
  


  
<?php
  include_once  'Vista/footer.php';
?>
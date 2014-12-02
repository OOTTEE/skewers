<?php
include_once $GLOBALS['MODEL_PATH'].'Administrador.php'
?>   
 <div class="jumbotron">
      <div class="container">
        <h1>Formulario de eliminacion de usuarios</h1>
        <p>Seleccione el usuario que desea eleminar</p>    
      </div>
    </div>

    <div class="container">
      <?php foreach($this->object as $usuarios)	echo $usuarios ?>
    </div>

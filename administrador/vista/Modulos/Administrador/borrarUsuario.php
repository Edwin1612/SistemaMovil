<?php
//Se obtiene el id por metodo get desde la vista de usuarios
  $id = $_GET["id"];
//Se pide que la funcion deleteUsuario realize la funcion de borrarlo
  Datos::deleteUsuario($id);
//Al finalizar hace un hader a la pantalla index con la variable action en valor de usuarios para que el controlador en la plantilla muestre la pantalla de usuarios
  
  header('Location: index.php?action=usuarios');
?>
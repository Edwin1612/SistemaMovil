<?php
  //Se obtiene el id por metodo get que se arroja desde la el boton de ver categorias
  $id = $_GET["id"];
  //Se envian a un metodo en la clase datos, el cual borra una fila de la tabla categorias por medio de un id con una sentencia Delete
  Datos::addVisita($id);
  //Al finalizar hace un hader a la pantalla index con la variable action en valor de categorias para que el controlador en la plantilla muestre la pantalla de categorias
  header('Location: index.php?action=perfilUsuario&id='.$id);
?>
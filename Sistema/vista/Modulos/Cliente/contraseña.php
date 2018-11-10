<?php
//Se piden todas las categorias por el metodo getCategorias
$registro = new MvcControlador();
$resultado= $registro ->editarContraseña();
//Si el resultado es success los envia con un header a el index con la variable action en categorias
if($resultado=="success")
{
  //Se hace un header a la vista categoria si el controlador returna succes en caso de no, no se cambiara de vista
  //header('Location: index.php?action=usuarios');
}
?>
    <FORM method="POST">
      <div class="form-group">
        <label >Nueva Contraseña:</label>
        <input class="form-control" type="password" name="contrasena1" placeholder="Contraseña"  required>
      </div>
      <div class="form-group">
        <label >Repetir Contraseña:</label>
        <input class="form-control" type="password" name="contrasena2" placeholder="Repetir Contraseña" value="" required>
      </div>
      <div class="row">
        <div class="form-group col-md-12">
          <button  class="btn btn-mat btn-success" type="submit" value="Aceptar"> Aceptar</button> 
        </div>
      </div>
    </FORM>
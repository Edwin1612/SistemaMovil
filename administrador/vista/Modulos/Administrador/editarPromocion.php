<?php
$stmt = Datos::vista_promocion();
$stmt2 = Datos::getPremios();
//Se piden todas las categorias por el metodo getCategorias
$registro = new MvcControlador();
$resultado= $registro ->editarPromocion();
$id = $_GET["id"];

$resultadoPromocion = Datos::getPromocionID($id);
//Si el resultado es success los envia con un header a el index con la variable action en categorias
if($resultado=="success")
{
  //Se hace un header a la vista categoria si el controlador returna succes en caso de no, no se cambiara de vista
  header('Location: index.php?action=categorias');
}


?>
<div  align="center">
          <div class="modal-dialog">
            <div class="modal-content">
              <div>
                <div class="modal-header">
                  <h4 class="modal-title">Favor de ingresar lo siguiente</h4>
                </div>
                <div class="modal-body">
                  <FORM method="POST">
                    <div class="form-group">
                      <label for="user" style="color:#111;">Nombre de la Promocion:</label>
                      <input class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?=$resultadoPromocion["nombre"]?>" required>
                    </div>
                    <div class="form-group">
                      <label for="user" style="color:#111;">Condicion Puntaje:</label>
                      <input class="form-control" type="text" name="puntajeRequerido" placeholder="Puntaje Requerido" value="<?=$resultadoPromocion["condicionPuntaje"]?>" required>
                    </div>
                    <div class="form-group">
                        <label for="user" style="color:#111;">Tipo Usuario:</label>
                        <select name="premio" id="" class="form-control">
                           <?php while($datos = $stmt2->fetch(PDO::FETCH_ASSOC))
                            {?>
                          <option value="<?=$datos["id"]?>"><?=$datos["nombre"]?></option>
                          <?php }?>
                        </select>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                        <a href="index.php"><input  class="btn btn-mat btn-success" type="submit" value="Agregar Promocion"></a>
                      </div>
                    </div>
                  </FORM>
                </div>
              </div>
            </div>
          </div>
        </div>
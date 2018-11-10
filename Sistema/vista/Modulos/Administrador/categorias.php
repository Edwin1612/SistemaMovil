<?php
$stmt = Datos::vista_promocion();
$stmt2 = Datos::getPremios();
//Se piden todas las categorias por el metodo getCategorias
$registro = new MvcControlador();
//se invoca la funcion registrousuariocontroller de la clase mvccontroller;
$resultado= $registro ->AddPromocion();
//Si el resultado es success los envia con un header a el index con la variable action en categorias
if($resultado=="success")
{
  //Se hace un header a la vista categoria si el controlador returna succes en caso de no, no se cambiara de vista
  header('Location: index.php?action=categorias');
}


?>

  <div class="page-header card">
    <div class="row align-items-end">
      <div class="col-lg-8">
        <div class="page-header-title">
          <i class="icofont icofont-table bg-c-blue"></i>
          <div class="d-inline">
            <h4>Lista de Promociones</h4>
            <span>Linea de promociones</span>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="page-header-breadcrumb">
          <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
              <a href="index.html">
                            <i class="icofont icofont-home"></i>
                        </a>
            </li>
            <li class="breadcrumb-item"><a href="index.php?action=categorias">Lista de Promociones</a>
            </li>
            <li class="breadcrumb-item"><a href="index.php?action=index">Inventario</a>
            </li>
          </ul>
        </div>
      </div>
    </div><br>
    <div class="col-md-2">
      <a href="#ventana1" data-toggle="modal">
    <button class="btn btn-mat btn-success">Agregar Promocion</button></div>
    </a>
    </div>
  </div>



  <div class="page-body">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-block">
            <div class="dt-responsive table-responsive">
              <div id="simpletable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-sm-12 col-md-6">
                    <div class="dataTables_length" id="simpletable_length">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-12">
                    <table id="simpletable" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="simpletable_info">
                      <thead>
                        <th rowspan="1" colspan="1" width="20%">Nombre promocion</th>
                        <th rowspan="1" colspan="1" width="20%">Nombre Premio</th>
                        <th rowspan="1" colspan="1" width="20%">Costo</th>
                        <th rowspan="1" colspan="1" width="20%">Fecha</th>
                        <th rowspan="1" colspan="1" width="20%">Puntaje</th>
                        <th rowspan="1" colspan="1" width="5%">Borrar</th>
                        </th>
                      </thead>
                      <tbody>
                        <?php while($datos = $stmt->fetch(PDO::FETCH_ASSOC))
                        //Se hace un array asociativo para poder sacar los valores
                        //Y en todolos los td se muestran los datos correspondientes a nombre,descripcion y fecha_agregado en
                        //lo botones se le asigna el nombre como dato a mostar y el valor el id de cada categoria, ya que si es precionado 
                        //envia por metodo get el idCategoria para los respectivos prodecimientos de editar y borrar
                            {?>
                        <tr>
                          <td rowspan="1" colspan="1">
                            <?=$datos["promocionNombre"]?>
                          </td>
                          <td rowspan="1" colspan="1">
                            <?=$datos["nombrePremio"]?>
                          </td>
                          <td rowspan="1" colspan="1">
                            <?=$datos["premioCosto"]?>
                          </td>
                          <td rowspan="1" colspan="1">
                            <?=$datos["fecha"]?>
                          </td>
                          <td rowspan="1" colspan="1">
                            <?=$datos["Puntaje"]?>
                          </td>
                          <td rowspan="1" colspan="1">
                            <a href="index.php?action=borrarCategoria&id=<?=$datos["idPromocion"]?>">
                                <button class="btn btn-danger"><i class="icofont icofont-warning-alt"></i></button>
                               </a>
                          </td>
                        </tr>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="modal fade" id="ventana1" align="center">
          <div class="modal-dialog">
            <div class="modal-content">
              <div>
                <div class="modal-header">
                  <h4 class="modal-title">Favor de ingresar lo siguiente</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                  <FORM method="POST">
                    <div class="form-group">
                      <label for="user" style="color:#111;">Nombre de la Promocion:</label>
                      <input class="form-control" type="text" name="nombre" placeholder="Nombre" value="" required>
                    </div>
                    <div class="form-group">
                      <label for="user" style="color:#111;">Condicion Puntaje:</label>
                      <input class="form-control" type="text" name="puntajeRequerido" placeholder="Puntaje Requerido" value="" required>
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
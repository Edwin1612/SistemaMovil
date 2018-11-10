<?php
$stmt = Datos::getPremios();
//Se poden todos los productos
$registro = new MvcControlador();

//se invoca la funcion registrousuariocontroller de la clase mvccontroller;
$resultado= $registro ->addPremio();
if($resultado=="success")
{
  //En caso de que el controlador responda con succes eso indicara que todo salio bien y hara que entra a la condicion sufriendo un redirecionamiento a la vista producto
  header('Location: index.php?action=prodcutos');
}
?>
  <div class="page-header card">
    <div class="row align-items-end">
      <div class="col-lg-8">
        <div class="page-header-title">
          <i class="icofont icofont-table bg-c-blue"></i>
          <div class="d-inline">
            <h4>Lista de premios</h4>
            <span>Premios Agregados</span>
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
            <li class="breadcrumb-item"><a href="index.php?action=categorias">Lista de premios</a>
            </li>
            <li class="breadcrumb-item"><a href="index.php?action=index">Inventario</a>
            </li>
          </ul>
        </div>
      </div>
    </div><br>
    <div class="col-md-2">
      <a href="#ventana1" data-toggle="modal">
    <button class="btn btn-mat btn-success">Agregar Premio</button></div>
    </a>
    </div>
  </div>
<br>

  <div class="col-md-12 col-md-offset-2">
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
                          <th rowspan="1" colspan="1" width="30%">Nombre</th>
                          <th rowspan="1" colspan="1" width="30%">Precio</th>
                          <th rowspan="1" colspan="1" width="5%">Borrar</th>
                          </th>
                        </thead>
                        <tbody>
                          <?php while($datos = $stmt->fetch(PDO::FETCH_ASSOC))
                        //Se hace un array asociativo para poder sacar los valores
                            {?>
                          <tr>
                            <td rowspan="1" colspan="1">
                              <?=$datos["nombre"]?>
                            </td>
                            <td rowspan="1" colspan="1">
                              <?=$datos["costo"]?>
                            </td>
                            <td rowspan="1" colspan="1">
                              <a href="index.php?action=borrarProducto&id=<?=$datos["id"]?>">
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
        </div>

        <div class="modal fade" id="ventana1" align="center">
          <div class="modal-dialog">
            <div class="modal-content">
              <div>
                <div class="modal-header">
                  <h4 class="modal-title">Agregar Premio</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                  <FORM method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="user" style="color:#111;">Nombre del Premio:</label>
                      <input class="form-control" type="text" name="nombre" placeholder="Nombre del Premio" value="" required>
                    </div>
                    <div class="form-group">
                      <label for="user" style="color:#111;">Precio:</label>
                      <input class="form-control" type="number" name="precio" placeholder="Precio" value="" required>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                        <input class="btn btn-mat btn-success" type="submit" name="loguearse" value="Agregar Premio">
                      </div>
                    </div>
                  </FORM>
                </div>
              </div>
            </div>
          </div>
        </div>
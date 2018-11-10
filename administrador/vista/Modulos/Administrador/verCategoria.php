<?php
if(isset($_GET["id"]))
{
  $id = $_GET["id"];
  $stmt = Datos::getCategoriaID($id);
  //Se obtiene la categoria por id
  $stmt2 = Datos::countProductosCategoriaID($id);
  //se obtiene la categoria por id
  $stmt3 = Datos::getCategoriaID($id);
  //Se obtiene los productos hijos de la categoria
  $stmt4 = Datos::getProductoCategoriaID($id);
}

$registro = new MvcControlador();

//se invoca la funcion registrousuariocontroller de la clase mvccontroller;
$resultado= $registro ->editarCategoria();

if($resultado=="success")
{
  header('Location: index.php?action=categorias');
}


?>

<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icofont icofont-table bg-c-blue"></i>
                <div class="d-inline">
                    <h4>Categoria</h4>
                    <span>Linea de Productos</span>
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
                    <li class="breadcrumb-item"><a href="#">Linea de Producto</a>
                    </li>
                    <li class="breadcrumb-item"><a href="index.php?action=index">Inventario</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
  <br>
  <div class="col-md-2">
    <a href="#ventana1" data-toggle="modal" >
    <button class="btn btn-mat btn-success">Editar Categoria</button></div>
    </a>
  </div>
</div>

<div class="col-md-12">
    <div class="row">
        <div class="col-md-4">
      <div class="card client-map">
          <div class="card-block">
              <div class="client-detail">
                  <div class="client-profile">
                      <img src="assets/images/avatar-5.jpg" alt="">
                  </div>
                  <div class="client-contain">
                      <h5><?=$stmt["nombre"]?></h5>
                      <p class="text-muted m-0 p-t-10">Datos relacionados</p>
                  </div>
              </div>
              <div class="">
                  <div class="client-card-box"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                      <div class="row">
                          <div class="col-6 text-center client-border p-10">
                              <p class="text-muted m-0">Productos</p>
                              <span class="text-c-green f-20 f-w-400"><?php echo $stmt2["count(*)"]?></span>
                          </div>
                          <div class="col-6 text-center p-10">
                              <p class="text-muted m-0">Movimientos</p>
                              <span class="text-c-green f-20 f-w-400"><?=$stmt3["count(*)"]?></span>
                          </div>
                      </div>
                      <div class="col-sm-12 client-border-card p-t-10">
                          <p><?=$stmt["descripcion"]?></p>
                      </div>
                      <canvas id="client-map-3" class="client-map-chart" height="142" width="609" style="display: block; width: 609px; height: 142px;"></canvas>
                  </div>
              </div>
          </div>
      </div>
    </div>  
    
  <div class="col-md-8">
    <div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icofont icofont-table bg-c-blue"></i>
                <div class="d-inline">
                    <h4>Productos Relacionados</h4>
                    <span>Linea de Productos</span>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="card">
        <div class="card-block">
            <div class="dt-responsive table-responsive">
                <div id="simpletable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-sm-12 col-md-12">
                      <div class="dataTables_length" id="simpletable_length">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-sm-12">
                      <table id="simpletable" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="simpletable_info">
                        <thead>
                           <th rowspan="1" colspan="1" width="10%">Nombre</th>
                            <th rowspan="1" colspan="1" width="10%">Precio</th>
                            <th rowspan="1" colspan="1" width="10%">Stock</th>
                          </th>
                        </thead>
                        <tbody> 
                          <?php while($datos = $stmt4->fetch(PDO::FETCH_ASSOC))
                        //Se hace un array asociativo para poder sacar los valores
                            {?>
                          <tr>
                            <td rowspan="1" colspan="1"><?=$datos["nombre"]?></td>
                            <td rowspan="1" colspan="1"><?=$datos["precio"]?></td>
                            <td rowspan="1" colspan="1"><?=$datos["stock"]?></td>
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
                            <FORM method="POST" enctype="multipart/form-data" >
                                <div class="form-group">    
                                    <label for="user" style="color:#111;">Nombre de la Categoria:</label>
                                    <input class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?=$stmt3["nombre"]?>" required>
                                </div>
                              <div class="form-group">    
                                    <label for="user" style="color:#111;">Descripcion:</label>
                                    <textarea rows="4" cols="50" class="form-control" name="descripcion" ><?=$stmt3["descripcion"]?></textarea>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12" >
                                    <a href="index.php"><input  class="btn btn-mat btn-success" type="submit" value="Editar Categoria"></a>
                                </div>
                                </div>
                            </FORM>
                        </div>
                    </div>
                </div>
            </div>
    </div>
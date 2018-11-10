<?php
$stmt = Datos::getProductos();
//Se piden todos los producto
$stmt3 = Datos::getCategorias();
//Se piden las categorias
$registro = new MvcControlador();
//Se piden todos los productos y las categorias 
//se invoca la funcion registrousuariocontroller de la clase mvccontroller;
$resultado= $registro ->addProducto();


?>

<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icofont icofont-table bg-c-blue"></i>
                <div class="d-inline">
                    <h4>Inventario</h4>
                    <span>Productos agregados</span>
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
                    <li class="breadcrumb-item"><a href="index.php?action=categorias">Lista de Categorias</a>
                    </li>
                    <li class="breadcrumb-item"><a href="index.php?action=index">Inventario</a>
                    </li>
                </ul>
            </div>
        </div><br>
      <a href="index.php?action=pdf1">PDF</a>
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
                           <th rowspan="1" colspan="1" width="20%">Nombre</th>
                            <th rowspan="1" colspan="1" width="20%">Fecha Agregado</th>
                            <th rowspan="1" colspan="1" width="20%">Precio</th>
                            <th rowspan="1" colspan="1" width="10%">Stock</th>
                            <th rowspan="1" colspan="1" width="15%">Codigo</th>
                          <th rowspan="1" colspan="1" width="15%">Categoria</th>
                          <th rowspan="1" colspan="1" width="15%">Ver</th>
                          <th rowspan="1" colspan="1" width="15%">Borrar</th>
                          </th>
                        </thead>
                        <tbody> 
                          <?php while($datos = $stmt->fetch(PDO::FETCH_ASSOC))
                        //Se hace un array asociativo para poder sacar los valores
                            {?>
                          <tr>
                            <td rowspan="1" colspan="1"><?=$datos["nombre"]?></td>
                            <td rowspan="1" colspan="1"><?=$datos["fecha_agregado"]?></td>
                            <td rowspan="1" colspan="1"><?=$datos["precio"]?></td>
                            <td rowspan="1" colspan="1"><?=$datos["stock"]?></td>
                            <td rowspan="1" colspan="1"><?=$datos["codigo"]?></td>
                            <?php
                              $stmt2 = Datos::getCategoriaID($datos["idCategoria"]);
                              //Se pide una categoria en espesifico con el id de la categoria la cual fue pedida arriba esto para saber el nombre de la misma
                            ?>
                            <td rowspan="1" colspan="1"><?=$stmt2["nombre"]?></td>
                            <td rowspan="1" colspan="1">
                               <a href="index.php?action=productoPerfil&id=<?=$datos["idProducto"]?>">
                                <button class="btn btn-warning"><i class="icofont icofont-warning-alt"></i></button>
                               </a>
                            </td>
                            <td rowspan="1" colspan="1">
                               <a href="index.php?action=borrarProducto&id=<?=$datos["idProducto"]?>">
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

        
<?php
if(isset($_GET["id"]))
{
  $id = $_GET["id"];
  $stmt2 = Datos::getProductoID($id);
  $stmt3 = Datos::getProductoID($id);
  $stmt4 = Datos::getProductoCategoriaID($id);
  $stmt5 = Datos::getCategorias();
}
$registro = new MvcControlador();

//se invoca la funcion registrousuariocontroller de la clase mvccontroller;
$resultado= $registro ->editarProducto();

$resultado= $registro ->StockMas();
if($resultado=="success")
{
  echo "entra?";
  header('Location: index.php?action=categorias');
}
?>

<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icofont icofont-table bg-c-blue"></i>
                <div class="d-inline">
                    <h4>Producto</h4>
                    <span>Producto Producto</span>
                </div>
            </div>
        </div>  
      <?php
      echo $_SESSION["idUsuario"];
      ?>
      
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
    <button class="btn btn-mat btn-success">Editar Producto</button></div>
    </a>
  </div>
</div>

<div class="col-md-12">
   <div class="row">
      <div class="col-md-4">
        <div class="row simple-cards users-card">
          <div class=" col-xl-12">
            <div class="card user-card">
              <div class="card-header-img">
                  <img class="img-fluid img-radius" src="<?=$stmt3["ruta_img"]?>" alt="card-img" width="200" height="100">
                  <h4><?=$stmt3["nombre"]?></h4>
                  <h5><b>Codigo: </b><?=$stmt3["codigo"]?></h5>
                  <h5><b>Fecha Agregado: </b><?=$stmt3["fecha_agregado"]?></h5>
                  <h5><b>Precio: </b><?php echo "$".$stmt3["precio"]?></h5>
                  <h5><b>Stock: </b><?=$stmt3["stock"]?></h5>
              </div><br>
              <div>
                  <a href="#ventana3" data-toggle="modal" type="button" class="btn btn-success waves-effect waves-light m-r-15"><i class="icofont icofont-plus m-r-5"></i>Stock ++</a>
              </div>
            </div>
        </div>
      </div>
    </div> 
    <div class="col-md-8">
     <div class="card">
        <div class="card-block">
            <div class="dt-responsive table-responsive">
                <div id="simpletable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-sm-14 col-md-12">
                      <div class="dataTables_length" id="simpletable_length">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-sm-12">
                      <table id="simpletable" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="simpletable_info">
                        <thead>
                           <th rowspan="1" colspan="1" width="10%">Fecha</th>
                            <th rowspan="1" colspan="1" width="10%">Notacion</th>
                            <th rowspan="1" colspan="1" width="10%">Cantidad</th>
                          </th>
                        </thead>
                        <tbody> 
                          <?php while($datos = $stmt4->fetch(PDO::FETCH_ASSOC))
                        //Se hace un array asociativo para poder sacar los valores
                            {?>
                          <tr>
                            <td rowspan="1" colspan="1"><?=$datos["fecha"]?></td>
                            <td rowspan="1" colspan="1"><?=$datos["nota"]?></td>
                            <td rowspan="1" colspan="1"><?=$datos["cantidad"]?></td>
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
  </div>
</div>

<div class="modal fade" id="ventana1" align="center">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div>
                        <div class="modal-header">
                             <h4 class="modal-title">Nombre del Producto</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body" >
                            <FORM method="POST" enctype="multipart/form-data">
                                <div class="form-group">    
                                    <label for="user" style="color:#111;">Nombre del producto:</label>
                                    <input class="form-control" type="text" name="nombre" placeholder="Nombre de la Categoria" value="<?=$stmt2["nombre"]?>">
                                </div>
                                <div class="form-group">    
                                    <label for="user" style="color:#111;">Precio:</label>
                                    <input class="form-control" type="text" name="precio" placeholder="Precio" value="<?=$stmt2["precio"]?>">
                                </div>
                                <div class="form-group">    
                                    <label for="user" style="color:#111;">Codigo:</label>
                                    <input class="form-control" type="text" name="codigo" placeholder="Codigo" value="<?=$stmt2["codigo"]?>">
                                </div>
                              <div class="form-group">    
                                    <label for="user" style="color:#111;">Fotografia:</label>
                                    <input class="form-control" type="file" name="foto">
                                </div>
                                <div class="form-group">    
                                    <label for="user" style="color:#111;">Categoria:</label>
                                    <select class="form-control" name="categoria" value="<?=$stmt2["idCategoria"]?>">
                                      <?php while($datos = $stmt5 ->fetch(PDO::FETCH_ASSOC))
                                      //Se hace un array asociativo para poder sacar los valores
                                      {?>
                                      <option value="<?=$datos["idCategoria"]?>"><?=$datos["nombre"]?></option>
                                      <?php }?>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12" >
                                    <input class="btn btn-mat btn-success" type="submit" name="loguearse" value="Agregar Categoria">
                                </div>
                                </div>
                            </FORM>
                        </div>
                    </div>
                </div>
            </div>
    </div>

<div class="modal fade" id="ventana3" align="center">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div>
                        <div class="modal-header">
                             <h4 class="modal-title">Cantidad al Stock</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body" >
                            <FORM method="POST" enctype="multipart/form-data">
                                <div class="form-group">    
                                    <label for="user" style="color:#111;">Cantidad:</label>
                                    <input class="form-control" type="text" name="cantidad" placeholder="Valor numerico" value="" required>
                                </div>
                                <div class="form-group">    
                                    <label for="user" style="color:#111;">Referencia:</label>
                                    <input class="form-control" type="text" name="referencia" placeholder="Referencia" value="" required>
                                </div>
                                <div class="form-group">    
                                    <label for="user" style="color:#111;">Notacion:</label>
                                    <input class="form-control" type="text" name="notacion" placeholder="Notacion" value="" required>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12" >
                                    <input class="btn btn-mat btn-success" type="submit" name="loguearse" value="Agregar">
                                </div>
                                </div>
                            </FORM>
                        </div>
                    </div>
                </div>
            </div>
    </div>



    

    
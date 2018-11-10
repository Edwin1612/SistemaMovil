<?php
$stmt = Datos::getUsuarios();
//Se piden todos los usuarios
$stmt3 = Datos::getCategorias();
//Se piden todas las categorias
$registro = new MvcControlador();

//se invoca la funcion registrousuariocontroller de la clase mvccontroller;
$resultado= $registro ->addUsuario();

if($resultado=="success")
{
  //Si el controlador responde con el succes se hace una redicrecion
  header('Location: index.php?action=usuarios');
}
?>

<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icofont icofont-table bg-c-blue"></i>
                <div class="d-inline">
                    <h4>Lista de Usuarios</h4>
                    <span>Usuarios añadidos</span>
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
                    <li class="breadcrumb-item"><a href="index.php?action=usuarios">Lista de Usuarios </a>
                    </li>
                    <li class="breadcrumb-item"><a href="index.php?action=index">Inventario</a>
                    </li>
                </ul>
            </div>
        </div>
    </div><br>
  <div class="col-md-2">
    <a href="#ventana1" data-toggle="modal" >
    <button class="btn btn-mat btn-success">Agregar Usuario</button></div>
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
                           <th rowspan="1" colspan="1" width="10%">Nombre</th>
                            <th rowspan="1" colspan="1" width="5%">Usuario</th>
                            <th rowspan="1" colspan="1" width="5%">Contraseña</th>
                            <th rowspan="1" colspan="1" width="10%">Correo</th>
                          <th rowspan="1" colspan="1" width="5%">Fecha Registro</th>
                          <th rowspan="1" colspan="1" width="1%">Tipo Usuario</th>
                          <th rowspan="1" colspan="1" width="10%">Perfil</th>
                          <th rowspan="1" colspan="1" width="10%">Borrar</th>
                          </th>
                        </thead>
                        <tbody> 
                          <?php while($datos = $stmt->fetch(PDO::FETCH_ASSOC))
                        //Se hace un array asociativo para poder sacar los valores y eventualmente en cada interacion del while imprime las variables en los td
                            {?>
                          <tr>
                            <td rowspan="1" colspan="1"><?=$datos["nombre"]?></td>
                            <td rowspan="1" colspan="1"><?=$datos["nombre_usuario"]?></td>
                            <td rowspan="1" colspan="1"><?=$datos["password"]?></td>
                            <td rowspan="1" colspan="1"><?=$datos["correo"]?></td>
                            <td rowspan="1" colspan="1"><?=$datos["fecha_registro"]?></td>
                             <td rowspan="1" colspan="1"><?php if($datos["tipoUsuario"]==0){echo "Administrador";}else{ echo "Cliente"; }?></td>
                            <td rowspan="1" colspan="1">
                               <a href="index.php?action=perfilUsuario&id=<?=$datos["idUsuario"]?>"  >
                                <button class="btn btn-success"><i class="icofont icofont-warning-alt"></i></button>
                               </a>
                            </td>
                            <td rowspan="1" colspan="1">
                               <a href='index.php?action=borrarUsuario&id=<?=$datos["idUsuario"]?>'>
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
                             <h4 class="modal-title">Agregar Usuario</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <FORM method="POST" enctype="multipart/form-data">
                                <div class="form-group">    
                                    <label for="user" style="color:#111;">Nombre:</label>
                                    <input class="form-control" type="text" name="nombre" placeholder="Nombre" value="" required>
                                </div>
                                <div class="form-group">    
                                    <label for="user" style="color:#111;">Apellido:</label>
                                    <input class="form-control" type="text" name="apellido" placeholder="Nombre" value="" required>
                                </div>
                                <div class="form-group">    
                                    <label for="user" style="color:#111;">Nombre del usuario:</label>
                                    <input class="form-control" type="text" name="user" placeholder="Nombre del Usuario" value="" required>
                                </div>
                                <div class="form-group">    
                                    <label for="user" style="color:#111;">Correo:</label>
                                    <input class="form-control" type="text" name="correo" placeholder="Correo" value="" required>
                                </div>
                                <div class="form-group">    
                                    <label for="user" style="color:#111;">Contraseña:</label>
                                    <input class="form-control" type="password" name="contrasena" placeholder="Contraseña" value="" required>
                                </div>
                              <div class="form-group">    
                                    <label for="user" style="color:#111;">Tipo Usuario:</label>
                                    <select name="tipoUsuario" id="" class="form-control">
                                      <option value="0">Administrador</option>
                                      <option value="1">Cliente</option>
                                    </select>
                                </div>
                              <div class="form-group">    
                                    <label for="user" style="color:#111;">Fotografia:</label>
                                    <input class="form-control" type="file" name="foto">
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12" >
                                    <input class="btn btn-mat btn-success" type="submit" value="Agregar Usuario">
                                </div>
                                </div>
                            </FORM>
                        </div>
                    </div>
                </div>
            </div>
    </div>

<?php

$registro = new MvcControlador();

//se invoca la funcion registrousuariocontroller de la clase mvccontroller;
$resultado= $registro ->editarUsuario();
//Si el resultado es success se hace un header
$id=$_GET["id"];
$stmt = Datos::getUsuarioID($id);
//Se pide en especial el usuario con el valor que tenga la variable id por el metodo get
$stmt2 = Datos::getUsuarioID($id);
//Se pide dos veces para mostrar los datos mismos en el formulario emergeente 
if($resultado=="success")
{
  //Si se cambian los datos exitosamente el controlador respones con succes y eso hace que entra a la condicion y haga una redirecion a usuarios
  header('Location: index.php?action=usuarios');
}
session_start();
?>

<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icofont icofont-table bg-c-blue"></i>
                <div class="d-inline">
                    <h4>Perfil de usuario</h4>
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
                    <li class="breadcrumb-item"><a href="#">Perfil Usuario </a>
                    </li>
                    <li class="breadcrumb-item"><a href="index.php?action=index">Inventario</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="card">
  <div class="card-block user-detail-card">
      <div class="row">
          <div class="col-sm-4">
              <img src="<?=$stmt["ruta_img"]?> " alt="" class="img-fluid p-b-10">
              <div class="contact-icon">
                  <a  href="#ventana1" data-toggle="modal" class="btn btn-default" data-original-title="Editar"><i class="icofont icofont-eye m-0"></i></a>
              </div>
          </div>
          <div class="col-sm-8 user-detail">
              <div class="row">
                  <div class="col-sm-5">
                      <h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-user"></i>Nombre :</h6>
                  </div>
                  <div class="col-sm-7">
                      <h6 class="m-b-30"><?=$_SESSION["nombre"]?></h6>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-5">
                      <h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-calendar"></i>Fecha de creacion de usuario:</h6>
                  </div>
                  <div class="col-sm-7">
                      <h6 class="m-b-30"><?=$stmt["fecha_registro"]?></h6>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-5">
                      <h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-email"></i>Correo :</h6>
                  </div>
                  <div class="col-sm-7">
                      <h6 class="m-b-30"><a href="mailto:dummy@example.com"><?=$stmt["correo"]?></a></h6>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-5">
                      <h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-home"></i>Id Usuario:</h6>
                  </div>
                  <div class="col-sm-7">
                      <h6 class="m-b-30"><?=$stmt["idUsuario"]?></h6>
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
                             <h4 class="modal-title">Editar Usuario</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <FORM method="POST" enctype="multipart/form-data">
                                <div class="form-group">    
                                    <label for="user" style="color:#111;">Nombre:</label>
                                    <input class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?=$stmt2["nombre"]?>">
                                </div>
                                <div class="form-group">    
                                    <label for="user" style="color:#111;">Apellido:</label>
                                    <input class="form-control" type="text" name="apellido" placeholder="Nombre" value="<?=$stmt2["apellido"]?>">
                                </div>
                                <div class="form-group">    
                                    <label for="user" style="color:#111;">Nombre del usuario:</label>
                                    <input class="form-control" type="text" name="user" placeholder="Nombre del Usuario" value="<?=$stmt2["nombre_usuario"]?>">
                                </div>
                                <div class="form-group">    
                                    <label for="user" style="color:#111;">Correo:</label>
                                    <input class="form-control" type="text" name="correo" placeholder="Correo" value="<?=$stmt2["correo"]?>">
                                </div>
                                <div class="form-group">    
                                    <label for="user" style="color:#111;">Contraseña:</label>
                                    <input class="form-control" type="password" name="contrasena" placeholder="Contraseña" value="<?=$stmt2["password"]?>">
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
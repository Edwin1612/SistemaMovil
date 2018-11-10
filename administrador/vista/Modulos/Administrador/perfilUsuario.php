<?php

$registro = new MvcControlador();

//se invoca la funcion registrousuariocontroller de la clase mvccontroller;
$resultado= $registro ->editarUsuario();
$resultado2= $registro ->DarPremio();
$resultado3= $registro ->DarPromocion();
//Si el resultado es success se hace un header
$id=$_GET["id"];
$stmt = Datos::getUsuarioID($id);
//Se pide en especial el usuario con el valor que tenga la variable id por el metodo get
$stmt2 = Datos::getUsuarioID($id);
$stmt3 = Datos::countVisitasId($id);
$numeroVisitasActivas= $stmt3["count(*)"];
$stmt5 = Datos::getPremiosAlcanzados($numeroVisitasActivas);
$stmt4 = Datos::getPremios();

//Se pide dos veces para mostrar los datos mismos en el formulario emergeente 
if($resultado=="success")
{
  //Si se cambian los datos exitosamente el controlador respones con succes y eso hace que entra a la condicion y haga una redirecion a usuarios
  header('Location: index.php?action=usuarios');
}
session_start();
?>

  <div class="row">
    <div class="col-md-12">
      <br>
      <h1 align="center">Perfil de usuario</h1>
    </div>
  </div>


  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <br>
        <div class="widget-image has-shadow">
          <br>
          <div class="group-card">
            <div class="widget-body">
              <br>
              <div class="quick-actions">
              </div>
              <div class="cover-image mx-auto">
                <img src="<?=$stmt["ruta_img"]?>" alt="..." class="rounded-circle mx-auto">
              </div>
              <h4 class="name">
                <a href="#">
                  <?=$stmt["nombre"]?>
                </a>
              </h4>
              <div class="category">
                <?php if($stmt["tipoUsuario"]==0){echo "Administrador";}else{ echo "Cliente"; }?>
              </div>
              <div class="stats text-center">
                <span class="counter">8,456</span>
                <span class="text">Visitas</span>
                <div >
                  
                    <a  href="#ventana1" data-toggle="modal" class="btn btn-default" data-original-title="Editar"><button class="btn btn-default">Editar Datos</button></a>
                  </div>
              </div>
            </div>
            <!-- End Widget Body -->
          </div>
        </div>
        <!-- End Card -->
      </div>

      <div class="col-md-4">
        <br>
        <h3>Datos de visitas</h3>
        <br>
        <div class="col-md-12">
          <div class="widget widget-12 has-shadow">
            <div class="widget-body">
              <div class="media">
                <div class="align-self-center ml-5 mr-5">
                  <i class="ion-social-facebook text-facebook"></i>
                </div>
                <div class="media-body align-self-center">
                  <div class="title text-facebook">Visitas</div>
                  <div class=""><?=$numeroVisitasActivas?></div>
                   <div >
                  <br>
                    <a  href="index.php?action=registrarVisita&id=<?=$id?>"><button class="btn ">Registrar visita</button></a>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="widget widget-12 has-shadow">
            <div class="widget-body">
              <div class="media">
                <div class="align-self-center ml-5 mr-5">
                  <i class="ion-social-facebook text-facebook"></i>
                </div>
                <div class="media-body align-self-center">
                  <div class="title text-facebook">Dar premio</div>
                  <div >
                  <br>
                    <a  href="#ventana2" data-toggle="modal" data-original-title="Editar"><button class="btn ">Selecion premio</button></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="col-md-4">
        <br>
        <h3>Datos Premios</h3>
        <br>
        <div class="col-md-12">
          <div class="widget widget-12 has-shadow">
            <div class="widget-body">
              <div class="media">
                <div class="align-self-center ml-5 mr-5">
                  <i class="ion-social-facebook text-facebook"></i>
                </div>
                <div class="media-body align-self-center">
                  <div class="title text-facebook">Premios dados</div>
                  <div class="number">10,865 Likes</div>
                  <div >
                  <br>
                    <a  href="#ventana1" data-toggle="modal" data-original-title="Editar"><button class="btn ">Historial</button></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="widget widget-12 has-shadow">
            <div class="widget-body">
              <div class="media">
                <div class="align-self-center ml-5 mr-5">
                  <i class="ion-social-facebook text-facebook"></i>
                </div>
                <div class="media-body align-self-center">
                  <div class="title text-facebook">Activar promocion</div>
                  <div >
                  <br>
                    <a  href="#ventana3" data-toggle="modal" data-original-title="Editar"><button class="btn ">Selecion promocion</button></a>
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


<div class="modal fade" id="ventana2" align="center">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div>
                        <div class="modal-header">
                             <h4 class="modal-title">Dar premio</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <FORM method="POST" enctype="multipart/form-data">
                                <label for="premio">Selecion de premio</label>
                                <select name="darPremio" id="premio" class="form-control">
                                 <?php while($datos = $stmt4->fetch(PDO::FETCH_ASSOC))
                                  {?>
                                <option value="<?=$datos["id"]?>"><?=$datos["nombre"]?></option>
                                <?php }?>
                              </select>
                              <br>
                                <div class="row">
                                    <div class="form-group col-md-12" >
                                    <input class="btn btn-mat btn-success" type="submit" value="Dar premio">
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
                             <h4 class="modal-title">Dar Promocion</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <FORM method="POST" enctype="multipart/form-data">
                                <label for="">Selecion de promocion</label>
                                <select name="darPromocion" id="premio" class="form-control">
                                 <?php while($datos = $stmt5->fetch(PDO::FETCH_ASSOC))
                                  {?>
                                <option value="<?=$datos["id"]?>"><?=$datos["nombre"]?></option>
                                <?php }?>
                              </select>
                              <br>
                                <div class="row">
                                    <div class="form-group col-md-12" >
                                    <input class="btn btn-mat btn-success" type="submit" value="Dar premio">
                                </div>
                                </div>
                            </FORM>
                        </div>
                    </div>
                </div>
            </div>
    </div>
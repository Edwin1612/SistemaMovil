<?php

require_once("conexion.php");
//session_start();


class Datos extends Conexion{
        
    #Registro de usuarios
   public function getUsuarios()
   {
     //Funcion para obtener todos los usuarios
      $stmt = Conexion::conectar()->prepare('SELECT *from usuarios');
      $stmt->execute();
      return $stmt;
     
   }
  
   public function getPremios()
   {
     //Funcion para obtener todos los productos
      $stmt = Conexion::conectar()->prepare('SELECT *from premios');
      $stmt->execute();
      return $stmt;
   }
  
  public function vista_promocion()
   {
     //Funcion para obtener todos los productos
      $stmt = Conexion::conectar()->prepare('SELECT *FROM vista_promocion');
      $stmt->execute();
      return $stmt;
   }
  
  
  public function getHistorial()
  {
    //Funcion para obtener los historiales
    $stmt = Conexion::conectar()->prepare('SELECT *from historiales');
      $stmt->execute();
  }
  
  public function getUsuarioID($id)
  {
    //Funcion para obtener un usuario en particular
    $stmt = Conexion::conectar()->prepare('SELECT *from usuarios where idUsuario=:id');
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $resultado=$stmt->fetch();
    return $resultado;
  }

  
  public function getProductoID($id)
  {
    //Funcion para obtener un producto en parituclar
    $stmt = Conexion::conectar()->prepare('SELECT *from productos where idProducto=:id');
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $resultado=$stmt->fetch();
    return $resultado;
  }
  
  public function getHistorialID($id)
  {
    //Funcion para obtener un historial en particular
  }
  
  public function getUsuariosLogin($datos)
  {
    //Funcion para hacer login en la pagina
    $stmt = Conexion::conectar()->prepare('SELECT *from usuarios WHERE correo=:correo && password=:contrasena');
        $stmt->bindParam(":correo", $datos["correo"] , PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $datos["contrasena"] , PDO::PARAM_STR);
        if($stmt->execute())
        {
          
            //Variables para iniciar una sesion  
          
            $respuesta = $stmt->rowCount();
            $resultado =$stmt->fetch();
            session_start();
            $_SESSION["idUsuario"]=$resultado["idUsuario"];
            $_SESSION["nombre"]=$resultado["nombre"];
            $_SESSION["apellido"]=$resultado["apellido"];
            $_SESSION["nombre_usuario"]=$resultado["nombre_usuario"];
            $_SESSION["contrasena"]=$resultado["password"];
            $_SESSION["apellido"]=$resultado["apellido"];
            $_SESSION["correo"]=$resultado["correo"];
            $_SESSION["fecha_registro"]=$resultado["fecha_registro"];
            $_SESSION["ruta_img"]=$resultado["ruta_img"];
            $_SESSION["tipoUsuario"]=$resultado["tipoUsuario"];

            return $respuesta;
        }else
        {
            return "error";
        }
  }
  
  public function getProductoCategoriaID($id)
  {
    //Funcion para obtener un producto en parituclar
    $stmt = Conexion::conectar()->prepare('SELECT *from historiales where idProducto=:id');
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    return $stmt;
  }
  //////////////////////////////////////////////////////////////////////////////////////////////////////
  public function setUsuario($datos)
  {
    //Funcion para agregar un usuario
    $stmt = Conexion::conectar()->prepare("INSERT INTO usuarios (nombre,apellido,nombre_usuario,password,correo,fecha_registro,ruta_img,tipoUsuario)
    VALUES (:nombre,:apellido,:user,:password,:correo,default,:ruta,:tipoUsuario)");
        $stmt->bindParam(":nombre", $datos["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datos["apellido"] , PDO::PARAM_STR);
        $stmt->bindParam(":user", $datos["user"] , PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["contrasena"] , PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"] , PDO::PARAM_STR);
        $stmt->bindParam(":ruta", $datos["ruta"]);
        $stmt->bindParam(":tipoUsuario", $datos["tipoUsuario"]);
        //$stmt->bindParam(":precio", $datos["precio"] , PDO::PARAM_STR);
        //$stmt->bindParam(":stock", $datos["cantidad"] , PDO::PARAM_STR);
        //
        //$stmt->bindParam(":ruta_img", $datos["ruta"] , PDO::PARAM_STR);
        if($stmt->execute()){
           return "success";
        }else{
           return "error";
        }
        $stmt->close();
    
  }
  
  public function setPremio($datos)
  {
    //Funcion para agregar un producto
    $stmt = Conexion::conectar()->prepare("INSERT INTO premios (nombre,costo)
    VALUES (:nombre,:precio)");
        $stmt->bindParam(":nombre", $datos["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos["precio"] , PDO::PARAM_STR);
        if($stmt->execute()){
           return "success";
        }else{
           return "error";
        }
        $stmt->close();
  }
  
  public function setHistorial($datos)
  {
    //Funcion para agregar un historial
  }
  
  public function setPromocion($datos)
  {
    //Funcion para agregar una categoria
    $stmt = Conexion::conectar()->prepare("INSERT INTO promociones (nombre,idpremio,condicionPuntaje) 
    VALUES (:nombre,:idpremio,:condicionPuntaje)");
        $stmt->bindParam(":nombre", $datos["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":idpremio", $datos["premio"] , PDO::PARAM_STR);
        $stmt->bindParam(":condicionPuntaje", $datos["puntajeRequerido"]);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    
  }
  
  public function getMisVisitasRealizadas()
  {
    $stmt = Conexion::conectar()->prepare('SELECT *from visitas where idUsuario=:id');
    $stmt->bindParam(":id",$_SESSION["idUsuario"]);
    $stmt->execute();
    return $stmt;
  }
  
  public function getMisPremiosObtenidos()
  {
    $stmt = Conexion::conectar()->prepare('SELECT *from premiosDados where idUsuario=:id && estado=0');
    $stmt->bindParam(":id",$_SESSION["idUsuario"]);
    $stmt->execute();
    return $stmt;
  }
  
  public function getMisPromocionesObtenidas()
  {
    $stmt = Conexion::conectar()->prepare('SELECT *from promocionesDadas where idUsuario=:id && estado=0');
    $stmt->bindParam(":id",$_SESSION["idUsuario"]);
    $stmt->execute();
    return $stmt;
  }
  
  public function getPremioID($id)
  {
    $stmt = Conexion::conectar()->prepare('SELECT *from premios where id=:id');
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $resultado =$stmt->fetch();
    return $resultado;
  }
  
  public function getPromocionID($id)
  {
    $stmt = Conexion::conectar()->prepare('SELECT *from promociones where id=:id');
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $resultado =$stmt->fetch();
    return $resultado;
  }
  
  
  ////////////////////////////////////////////////////////////////////////////////////////////////////////
  public function editarUsuarioConFoto($datos)
  {
    //Funcion para editar un usuario
        $id= (int)$datos["id"];
        $stmt = Conexion::conectar()->prepare("UPDATE usuarios SET nombre=:nombre , apellido=:apellido,
        nombre_usuario=:nombre_usuario, password=:password,correo=:correo , ruta_img=:ruta_img WHERE idUsuario=:id");
        $stmt->bindParam(":nombre", $datos["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datos["apellido"] , PDO::PARAM_STR);
        $stmt->bindParam(":nombre_usuario", $datos["user"] , PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["contrasena"] , PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"] , PDO::PARAM_STR);
        $stmt->bindParam(":ruta_img", $datos["ruta"] , PDO::PARAM_STR);
        $stmt->bindParam(":id", $id);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
  }
  
  
  
  public function editarUsuarioSinFoto($datos)
  {
    //Funcion para editar un usuario
        $id= (int)$datos["id"];
        $stmt = Conexion::conectar()->prepare("UPDATE usuarios SET nombre=:nombre , apellido=:apellido,
        nombre_usuario=:nombre_usuario, password=:password,correo=:correo WHERE idUsuario=:id");
        $stmt->bindParam(":nombre", $datos["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datos["apellido"] , PDO::PARAM_STR);
        $stmt->bindParam(":nombre_usuario", $datos["user"] , PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["contrasena"] , PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"] , PDO::PARAM_STR);
        $stmt->bindParam(":id", $id);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
  }
  
  public function updateProducto($datos)
  {
    //Funcion para editar un producto
        $id= (int)$datos["id"];
        $stmt = Conexion::conectar()->prepare("UPDATE productos SET nombre=:nombre, precio=:precio,codigo=:codigo, ruta_img=:ruta_img,idCategoria=:idCategoria  WHERE idProducto=:id");
        $stmt->bindParam(":nombre", $datos["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos["precio"] , PDO::PARAM_STR);
        $stmt->bindParam(":codigo", $datos["codigo"] , PDO::PARAM_STR);
        $stmt->bindParam(":ruta_img", $datos["foto"] , PDO::PARAM_STR);
        $stmt->bindParam(":idCategoria", $datos["categoria"] , PDO::PARAM_STR);
        $stmt->bindParam(":id", $id);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
  }
  
 
  
  public function deleteUsuario($id)
  {
    //Funcion para borrar un usuario
    $stmt = Conexion::conectar()->prepare('DELETE from usuarios where idUsuario=:id');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
  }
  
  public function deletePremio($id)
  {
    //Funcion para borrar un producto
        $stmt = Conexion::conectar()->prepare('DELETE from premios where id=:id');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
  }
  
  
  public function login($datos)
  {
    //Funcion para obtener resultado de los datos del contolador para iniciar sesion
        $stmt = Conexion::conectar()->prepare('SELECT *from usuarios WHERE nombre_usuario=:correo && password=:contrasena');
        $stmt->bindParam(":correo", $datos["correo"] , PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $datos["contrasena"] , PDO::PARAM_STR);
        if($stmt->execute())
        {
            $respuesta = $stmt->rowCount();
            $resultado =$stmt->fetch();
          //Si el resultado returna mayor que uno es que si existe el usuario asi que inicia la sesion
            if($resultado["count(*)"]>0)
            {
              return "Datos no validos";
            }else
            {
              session_start();
              $_SESSION["correo"]=$resultado["correo"];
              $_SESSION["nombre"]=$resultado["nombre"];
              return "Correcto";
            }

            
        }else
        {
            return "error";
        }
  }
  
  /*************************************************************************/
 
  
  
  
  public function countUsuarios()
  {
    $stmt = Conexion::conectar()->prepare('SELECT count(*) from usuarios');
    $stmt->execute();
    $resultado =$stmt->fetch();
    return $resultado;
  }
  
  public function counthistoriales()
  {
    $stmt = Conexion::conectar()->prepare('SELECT count(*) from historiales');
    $stmt->execute();
    $resultado =$stmt->fetch();
    return $resultado;
  }
  
  public function getMisVisitas()
  {
    $stmt = Conexion::conectar()->prepare('SELECT count(*) from visitas where idUsuario=:id');
    $stmt->bindParam(":id",$_SESSION["idUsuario"]);
    $stmt->execute();
    $resultado =$stmt->fetch();
    return $resultado;
  }
  
   public function getMisPremiosDados()
  {
    $stmt = Conexion::conectar()->prepare('SELECT count(*) from premiosDados where idUsuario=:id && estado=0');
    $stmt->bindParam(":id",$_SESSION["idUsuario"]);
    $stmt->execute();
    $resultado =$stmt->fetch();
    return $resultado;
  }
  
  public function getMisPromocionesDadas()
  {
    $stmt = Conexion::conectar()->prepare('SELECT count(*) from promocionesDadas where idUsuario=:id && estado=0');
    $stmt->bindParam(":id",$_SESSION["idUsuario"]);
    $stmt->execute();
    $resultado =$stmt->fetch();
    return $resultado;
  }
}
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
  
  public function getCategorias()
  {
    //Funcion para obtener todas las categorias
    $stmt = Conexion::conectar()->prepare('SELECT *from categorias');
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
  
  public function countVisitasId($id)
  {
    //Funcion para obtener un usuario en particular
    $stmt = Conexion::conectar()->prepare('SELECT count(*) from visitas where idUsuario=:id && estado=0');
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $resultado=$stmt->fetch();
    return $resultado;
  }
  
  public function getPromocionID($id)
  {
    //Funcion para obtener un usuario en particular
    $stmt = Conexion::conectar()->prepare('SELECT *from promociones where id=:id');
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $resultado=$stmt->fetch();
    return $resultado;
  }
  
  public function getCategoriaID($id)
  {
    //Funcion para obtener un usuario en particular
    $stmt = Conexion::conectar()->prepare('SELECT *from categorias where idCategoria=:id');
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $resultado=$stmt->fetch();
    return $resultado;
    //return $resultado;
  }
   public function getPremiosAlcanzados($numeroVisitas)
  {
    //Funcion para obtener un usuario en particular
    $stmt = Conexion::conectar()->prepare('SELECT *from promociones where condicionPuntaje<=:numero');
    $stmt->bindParam(":numero",$numeroVisitas);
    $stmt->execute();
    return $stmt;
    //return $resultado;
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
  
   public function DarPremio($datos)
  {
    //Funcion para agregar un producto
    $stmt = Conexion::conectar()->prepare("INSERT INTO premiosDados (idUsuario,idPremio)
    VALUES (:idUsuario,:idPremio)");
        $stmt->bindParam(":idUsuario", $datos["id"] , PDO::PARAM_STR);
        $stmt->bindParam(":idPremio", $datos["idPremio"] , PDO::PARAM_STR);
        if($stmt->execute()){
           return "success";
        }else{
           return "error";
        }
        $stmt->close();
  }
  
  public function DarPromocion($datos)
  {
    //Funcion para agregar un producto
    $stmt = Conexion::conectar()->prepare("INSERT INTO promocionesDadas (idUsuario,idPromocion)
    VALUES (:idUsuario,:idPromocion)");
        $stmt->bindParam(":idUsuario", $datos["id"] , PDO::PARAM_STR);
        $stmt->bindParam(":idPromocion", $datos["idPromocion"] , PDO::PARAM_STR);
        if($stmt->execute()){
           return "success";
        }else{
           return "error";
        }
        $stmt->close();
  }
  
  
  public function addVisita($id)
  {
    //Funcion para agregar un producto
    $stmt = Conexion::conectar()->prepare("INSERT INTO visitas (idUsuario)
    VALUES (:idUsuario)");
        $stmt->bindParam(":idUsuario", $id);
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
  
  public function editarContrasena22($datos)
  {
    //Funcion para editar un usuario
        //$id= (int)$_SESSION["idUsuario"];
        //$stmt = Conexion::conectar()->prepare("update usuarios set password ='Edwin1' where idUsuario=13");
        //$stmt->bindParam(":password", $datos["contrasena1"] , PDO::PARAM_STR);
        //$stmt->bindParam(":id", $id);
    return "success";
  }
  
  public function activarPremio($datos)
  {
    //Funcion para editar un usuario
        $stmt = Conexion::conectar()->prepare("UPDATE premiosDados SET estado=1 WHERE id=:id");
        $stmt->bindParam(":id", $datos["idPremio"]);
        if($stmt->execute()){
            return "success";
            
        }else{
            return "error";
        }
        $stmt->close();
        
        
  }
  
  public function activarPromocion($datos)
  {
    //Funcion para editar un usuario
        $id= (int)$datos["idPromocion"];
        $stmt = Conexion::conectar()->prepare("UPDATE promocionesDadas SET estado=1 WHERE id=:id");
        $stmt->bindParam(":id", $id);
        if($stmt->execute()){
          
            $stmt2 = Conexion::conectar()->prepare("select *from promocionesDadas  where id=:id");
            $stmt2->bindParam(":id", $id);
            $stmt2->execute();
            $resultado2 =$stmt2->fetch(); 
            $id2 = $resultado2["idPromocion"];
            $stmt3 = Conexion::conectar()->prepare("select *from promociones where id=:id");
            $stmt3->bindParam(":id", $id2);
            $stmt3->execute();
            $resultado3 =$stmt3->fetch();
            
            $stmt4 = Conexion::conectar()->prepare("UPDATE visitas SET estado=1 where idUsuario=:id limit ".$resultado3["condicionPuntaje"]);
            $stmt4->bindParam(":id", $resultado2["idUsuario"]);
            //$stmt4->bindParam(":numero", $resultado2["condicionPuntaje"]);
            $stmt4->execute();
          
            return $resultado;
        }else{
            return "error";
        }
    
        /**/
        //$idUsuario=(int)$resultado["idUsuario"];
    
        $stmt->close();
  }
  
  public function StockMas($datos)
  {
    //Funcion para modificar el tamaño de la cantidad del producto
        $id= (int)$datos["id"];
        $dinero=(int)$datos["cantidad"];
    
        $stmt2 = Conexion::conectar()->prepare("SELECT  *from productos WHERE idProducto=:id");
        $stmt2->bindParam(":id", $id);
        $stmt2->execute();    
        $res = $stmt2->fetch();
        //Se obtiene la cantidad acutal del producto
        $dinero=$dinero+(int)$res["stock"];  
        //Se ingresa en una variable con la suma de lo que el usuario ingreso para el stock y si es menor que 0 no hace la insersion
        if($dinero>=0)
        {
            $idUsuario=(int)$_SESSION["idUsuario"];
            $stmt1 = Conexion::conectar()->prepare("INSERT INTO historiales (idProducto,idUsuario,fecha,nota,referencia,cantidad) 
            values (:idProducto,:idUsuario,default,:nota,:referencia,:cantidad)");
            $stmt1->bindParam(":idProducto", $id);
            $stmt1->bindParam(":idUsuario", $idUsuario);
            $stmt1->bindParam(":nota", $datos["notacion"]);
            $stmt1->bindParam(":referencia", $datos["referencia"]);
            $stmt1->bindParam(":cantidad", $dinero);
            $stmt1->execute();    
            //se obtiene la cantidad actual en el stock

            //Se edita con la cantidad
            $stmt = Conexion::conectar()->prepare("UPDATE productos SET stock=:stock WHERE idProducto=:id");
            $stmt->bindParam(":stock", $dinero );
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return "success";
            $stmt->close();
        }
        
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
  
  public function editarPromocion($datos)
  {
   //Funcion para editar una categoria 
        $id= (int)$datos["id"];
        $puntaje= (int)$datos["puntajeRequerido"];
        $stmt = Conexion::conectar()->prepare("UPDATE promociones SET nombre=:nombre, condicionPuntaje=:puntaje, idpremio=:idPremio   WHERE id=:id");
        $stmt->bindParam(":nombre", $datos["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":puntaje", $puntaje);
        $stmt->bindParam(":idPremio", $datos["premio"]);
        $stmt->bindParam(":id", $id);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    
  }
  
  public function updateCategoria($datos)
  {
   //Funcion para editar una categoria 
        $id= (int)$datos["id"];
        $stmt = Conexion::conectar()->prepare("UPDATE categorias SET nombre=:nombre, descripcion=:descripcion  WHERE idCategoria=:id");
        $stmt->bindParam(":nombre", $datos["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"] , PDO::PARAM_STR);
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
  
  public function deleteCategoria($id)
  {
    //Funcion para borrar una categoria
        $stmt = Conexion::conectar()->prepare('DELETE from categorias where idCategoria=:id');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
  }
  public function deletePromocion($id)
  {
    //Funcion para borrar una categoria
        $stmt = Conexion::conectar()->prepare('DELETE from promociones where id=:id');
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
  public function countProductos()
  {
    $stmt = Conexion::conectar()->prepare('SELECT count(*) from productos');
    $stmt->execute();
    $resultado =$stmt->fetch();
    return $resultado;
  }
  
  public function countProductosCategoriaID($id)
  {
    $stmt = Conexion::conectar()->prepare('SELECT count(*) from productos where idCategoria=:id');
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $resultado =$stmt->fetch();
    return $resultado;
  }
  
   public function countMovimientosCategoriaID($id)
  {
    $stmt = Conexion::conectar()->prepare('SELECT count(*) from historiales where idCategoria=:id');
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $resultado =$stmt->fetch();
    return $resultado;
  }
  
   public function countCategorias()
  {
    $stmt = Conexion::conectar()->prepare('SELECT count(*) from categorias');
    $stmt->execute();
    $resultado =$stmt->fetch();
    return $resultado;
  }
  
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
}
<?php
class MvcControlador
{
    public function Plantilla()
    {
        include "vista/plantilla.php";
    }

    public function login()
    {
        include("vista/modulos/login.php");
    }

    public function enlacesPaginasControlador()
    {
        if(isset($_GET['action'])){
            //guardar el valor de la variable action en views/modules/navegacion.php en el cual se recibe mediante el metodo get esa variable
            $enlaces = $_GET['action'];
        }else{
            //Si viene vacio inicializo con index
            $enlaces = "index";
        }
        $respuesta = Paginas::enlacesPaginasModel($enlaces);

        include $respuesta;
        
    }

  
  public function LoginDatos()
    {
        if(isset($_POST["correo"]) && isset($_POST["contrasena"]))
        {
            $datos = array("correo"=>$_POST["correo"] , "contrasena"=>$_POST["contrasena"]);
            print_r($datos);
            $respuesta = Datos::getUsuariosLogin($datos);
            return $respuesta;
        }
        
    }
  
  
  /*****************************************************************************************************/
    public function addPremio()
    {
        if(isset($_POST["nombre"]) && isset($_POST["precio"]))
        {
            $datos = array("nombre"=>$_POST["nombre"] , "precio"=>$_POST["precio"]);
            print_r($datos);
           $respuesta = Datos::setPremio($datos);
          return $respuesta;
        }
        
    }
  
    public function addUsuario()
    {
        if(isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["user"]) 
           && isset($_POST["correo"])   && isset($_POST["contrasena"]) && isset($_FILES["foto"]) && isset($_POST["tipoUsuario"]))
        {
            $extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
            $max_tamanyo = 1024 * 1024 * 8;
            if ( in_array($_FILES['foto']['type'], $extensiones) ) {
                //echo 'Es una imagen';
                if ( $_FILES['foto']['size']< $max_tamanyo ) {
                     //echo 'Pesa menos de 1 MB';
                }
           }

           $ruta_indexphp = dirname(realpath(__FILE__));
            $ruta_fichero_origen = $_FILES['foto']['tmp_name'];
            $ruta_nuevo_destino = 'imagenes/' .rand(1,1000000). $_FILES['foto']['name'];
            if ( in_array($_FILES['foto']['type'], $extensiones) ) {
                //echo 'Es una imagen';
                if ( $_FILES['foto']['size']< $max_tamanyo ) {
                    //echo 'Pesa menos de 1 MB';
                    if( move_uploaded_file ( $ruta_fichero_origen, $ruta_nuevo_destino ) ) {
                    }
                }
            }
          
          echo $ruta_nuevo_destino;
            $datos = array("nombre"=>$_POST["nombre"] , "apellido"=>$_POST["apellido"] ,"user"=>$_POST["user"] ,"correo"=>$_POST["correo"], "contrasena"=>$_POST["contrasena"],
                           "ruta"=>$ruta_nuevo_destino, "tipoUsuario"=>$_POST["tipoUsuario"]);
            print_r($datos);
            $respuesta = Datos::setUsuario($datos);
          return $respuesta;
        }
        
    }
  
   public function AddPromocion()
    {
        if(isset($_POST["nombre"]) && isset($_POST["puntajeRequerido"]) && isset($_POST["premio"]))
        {
            $datos = array("nombre"=>$_POST["nombre"] , "puntajeRequerido"=>$_POST["puntajeRequerido"] , "premio"=>$_POST["premio"]);
            print_r($datos);
            $respuesta = Datos::setPromocion($datos);
            return $respuesta;
        }
        
    }
  
  public function editarCategoria()
    {
        if(isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_GET["id"]))
        {
            
            $datos = array("nombre"=>$_POST["nombre"] , "descripcion"=>$_POST["descripcion"], "id"=>$_GET["id"]);
            //print_r($datos);
            $respuesta = Datos::updateCategoria($datos);
            return $respuesta;
        }
        
    }
  
  public function editarContraseña()
    {
        if(isset($_POST["contrasena1"]) && isset($_POST["contrasena2"]) && $_POST["contrasena1"]==$_POST["contrasena2"])
        {
            $datos = array("contrasena1"=>$_POST["contrasena1"] , "contrasena2"=>$_POST["contrasena2"]);
            print_r($datos);
            $respuesta = Datos::editarContrasena22($datos);
            return $respuesta;
        }
        
    }
  
  public function editarProducto()
    {
        if(isset($_POST["nombre"]) && isset($_POST["precio"]) && isset($_POST["codigo"]) && isset($_FILES["foto"]) 
           && isset($_POST["categoria"]) && isset($_GET["id"]))
        {
            $extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
            $max_tamanyo = 1024 * 1024 * 8;
            if ( in_array($_FILES['foto']['type'], $extensiones) ) {
                //echo 'Es una imagen';
                if ( $_FILES['foto']['size']< $max_tamanyo ) {
                     //echo 'Pesa menos de 1 MB';
                }
           }

           $ruta_indexphp = dirname(realpath(__FILE__));
            $ruta_fichero_origen = $_FILES['foto']['tmp_name'];
            $ruta_nuevo_destino = 'imagenes/' .rand(1,1000000). $_FILES['foto']['name'];
            if ( in_array($_FILES['foto']['type'], $extensiones) ) {
                //echo 'Es una imagen';
                if ( $_FILES['foto']['size']< $max_tamanyo ) {
                    //echo 'Pesa menos de 1 MB';
                    if( move_uploaded_file ( $ruta_fichero_origen, $ruta_nuevo_destino ) ) {
                    }
                }
            }
            $datos = array("nombre"=>$_POST["nombre"] ,"precio"=>$_POST["precio"], "codigo"=>$_POST["codigo"], "foto"=>$ruta_nuevo_destino, "categoria"=>$_POST["categoria"],"id"=>$_GET["id"]);
            print_r($datos);
            $respuesta = Datos::updateProducto($datos);
            //return $respuesta;
        }
        
    }
  
   public function editarUsuario()
    {
        if(isset($_FILES["foto"]) )
        {
            if(isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["user"]) && isset($_POST["correo"]) && isset($_POST["contrasena"]) && isset($_FILES["foto"]))
            {
                $extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
                $max_tamanyo = 1024 * 1024 * 8;
                if ( in_array($_FILES['foto']['type'], $extensiones) ) {
                  //echo 'Es una imagen';
                  if ( $_FILES['foto']['size']< $max_tamanyo ) {
                       //echo 'Pesa menos de 1 MB';
                  }
                }

                $ruta_indexphp = dirname(realpath(__FILE__));
                $ruta_fichero_origen = $_FILES['foto']['tmp_name'];
                $ruta_nuevo_destino = 'imagenes/' .rand(1,1000000). $_FILES['foto']['name'];
                  if ( in_array($_FILES['foto']['type'], $extensiones) ) {
                  //echo 'Es una imagen';
                    if ( $_FILES['foto']['size']< $max_tamanyo ) {
                      //echo 'Pesa menos de 1 MB';
                      if( move_uploaded_file ( $ruta_fichero_origen, $ruta_nuevo_destino ) ) {
                      }
                  }
            }
              $datos = array("nombre"=>$_POST["nombre"] , "apellido"=>$_POST["apellido"] ,"user"=>$_POST["user"],"correo"=>$_POST["correo"],
                             "contrasena"=> $_POST["contrasena"],"ruta"=>$ruta_nuevo_destino,"id"=>$_GET["id"]);
              print_r($datos);
              $respuesta = Datos::editarUsuarioConFoto($datos);
              return $respuesta;
            }
        }
        
        
    }
    
//////////////////////////////////////
    public function AddCarrera()
    {
        if(isset($_POST["nombre"]) && isset($_POST["texto"]))
        {
            $datos = array("nombre"=>$_POST["nombre"] , "texto"=>$_POST["texto"]);
            $respuesta = Datos::AddCarrera($datos);
            return $respuesta;
        }
        
    }
  
    public function StockMas()
    {
        if(isset($_POST["cantidad"]) && isset($_GET["id"]))
        {
            $datos = array("cantidad"=>$_POST["cantidad"],"id"=>$_GET["id"],"referencia"=>$_POST["referencia"],"notacion"=>$_POST["notacion"] );
            $respuesta = Datos::StockMas($datos);
            return $respuesta;
        }
        
    }

   
}
?>
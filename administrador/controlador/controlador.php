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
          //Se envian los datos para el modelo
            $datos = array("nombre"=>$_POST["nombre"] , "precio"=>$_POST["precio"]);
            
           $respuesta = Datos::setPremio($datos);
          return $respuesta;
        }
        
    }
  
     public function activarPremio()
    {
        if(isset($_POST["idPremio"]))
        {
          //Se envia el id para activar el paquete
          $id= $_POST["idPremio"];
            $datos = array("idPremio"=>$id );
           $respuesta = Datos::activarPremio($datos);
           
           header("Location: index.php?action=perfilPremio&idPremio=".$id);
        }
        
    }
  
   public function activarPromocion()
    {
        if(isset($_POST["idPromocion"]))
        {
          //Se envia el id para activar la promocion
            $datos = array("idPromocion"=>$_POST["idPromocion"] );
            //print_r($datos);
           $respuesta = Datos::activarPromocion($datos);
         echo $respuesta["id"];
          echo "hola";
        }
        
    }
  
     public function DarPremio()
    {
        if(isset($_POST["darPremio"])  && isset($_GET["id"]))
        {
          //Se le da un premio a un usuario se obtiene el id del usuario y el id del premio
            $datos = array("idPremio"=>$_POST["darPremio"] , "id"=>$_GET["id"]);
            print_r($datos);
           $respuesta = Datos::DarPremio($datos);
          return $respuesta;
        }
        
    }
  public function DarPromocion()
    {
        if(isset($_POST["darPromocion"])  && isset($_GET["id"]))
        {
          //Estas son las promociones que el usurio puede tomar
            $datos = array("idPromocion"=>$_POST["darPromocion"] , "id"=>$_GET["id"]);
            print_r($datos);
           $respuesta = Datos::DarPromocion($datos);
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
          //Se agrega una promocion, se necesita el nombre el punta requerido y el premio 
            $datos = array("nombre"=>$_POST["nombre"] , "puntajeRequerido"=>$_POST["puntajeRequerido"] , "premio"=>$_POST["premio"]);
            print_r($datos);
            $respuesta = Datos::setPromocion($datos);
            return $respuesta;
        }
        
    }
  
  
   public function editarPromocion()
    {
        if(isset($_POST["nombre"]) && isset($_POST["puntajeRequerido"]) && isset($_POST["premio"]) && isset($_GET["id"]))
        {
          //Para editar la promocion ya hecha
            
            $datos = array("nombre"=>$_POST["nombre"] , "puntajeRequerido"=>$_POST["puntajeRequerido"], "id"=>$_GET["id"], "premio"=>$_POST["premio"]);
            print_r($datos);
            $respuesta = Datos::editarPromocion($datos);
            return $respuesta;
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
    

   
}
?>
<?php
    class Paginas{

        //Una funcion con el parametro $enlacesModel que se recibe a traves del controlador
        
        public function enlacesPaginasModel($enlacesModel){
                     
          if($_SESSION["tipoUsuario"]==0)
          {
              if($enlacesModel == "index" || $enlacesModel == "cerrarSesion" || $enlacesModel == "categorias"
                || $enlacesModel == "cerrarSesion" || $enlacesModel == "prodcutos" || $enlacesModel == "usuarios" || $enlacesModel == "borrarCategoria"
                || $enlacesModel == "borrarProducto" || $enlacesModel == "borrarUsuario" || $enlacesModel == "perfilUsuario" || $enlacesModel == "verCategoria"
                || $enlacesModel == "inventario" || $enlacesModel == "productoPerfil" || $enlacesModel == "perfil" || $enlacesModel == "comoLlegar" || $enlacesModel == "visitas"
                || $enlacesModel == "premios" || $enlacesModel == "clima" || $enlacesModel == "promociones" || $enlacesModel == "horario" || $enlacesModel == "inicio1"
                || $enlacesModel == "inicio0"){
                  //Mostramos el URL concatenado con la variable $enlacesModel
                  $module = "vista/Modulos/Administrador/".$enlacesModel.".php";
              }
          }else
          {
            if($enlacesModel == "index" || $enlacesModel == "cerrarSesion"
                || $enlacesModel == "perfilUsuario" 
                || $enlacesModel == "perfil" || $enlacesModel == "llegar" || $enlacesModel == "visitas"
                || $enlacesModel == "premios" || $enlacesModel == "clima" || $enlacesModel == "promiciones" 
                || $enlacesModel == "horario" || $enlacesModel == "inicio1" || $enlacesModel == "contraseña"){
                  //Mostramos el URL concatenado con la variable $enlacesModel
                  $module = "vista/Modulos/Cliente/".$enlacesModel.".php";
              }
          }


            if($enlacesModel== "inicio"){
                //Mostramos el URL concatenado con la variable $enlacesModel
                $module = "vista/modulos/".$enlacesModel.".php";
            }
                  
            
            //Una vez que action vienen vacio (validnaod en el controlador) enctonces se consulta si la variable $enlacesModel es igual a la cadena index de ser asi se muestre index.php
            /*else if($enlacesModel == "index"){
                $module = "views/modules/registro.php";
            }
            else if($enlacesModel == "ok"){
                $module = "views/modules/registro.php";
            }
            else if($enlacesModel == "fallo"){
                $module = "views/modules/ingresar.php";
            }
            else if($enlacesModel == "cambio"){
                $module = "views/modules/usuario.php";
            }else if($enlacesModel=="SiExiste")
            {//Se agregan estos modulos los cuales son los extras en la actividad
                $module = "views/modules/siExiste.php";
            }else if ($enlacesModel=="salir")
            {
                $module = "views/modules/salir.php";
            }else if($enlacesModel=="usuarios")
            {
                $module = "views/modules/usuarios.php";
            }
            else if($enlacesModel=="eliminar")
            {
                $module = "views/modules/eliminar.php";
            }
            //Validar una LISTA BLANCA 
            else{
                $module = "views/modules/registro.php";
            }*/
    
            return $module;
        }
    
    }
    
    
?>
<?php

  //En esta seccion se importan los documentos a ocupar, que son el controlador y el modelo
  //si se encontro una coincidencia con el correo y contraseña que ingresaron se hace un header y se lleva a otro index

  require_once('Sistema/modelo/db.php');
  require_once('Sistema/controlador/controlador.php');
  $registro = new MvcControlador();

  //Se hace una instancia de la clase

  $resultado =$registro -> LoginDatos();
  //Se hace llamar un metodo, el cual es el controlador que inicia sesion y da un resultado numerico
  if($resultado==1)
  {
   if($_SESSION["tipoUsuario"]==0)
   {
     header('Location: administrador/index.php?action=inicio0');
   }else
   {
      header('Location: Sistema/index.php?action=inicio1');
   }
   
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistema de Inventario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->

    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="Sistema/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="Sistema/default/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="Sistema/default/assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="Sistema/default/assets/css/style.css">


</head>

<body class="fix-menu">
    <!-- Pre-loader start -->
    <div class="theme-loader">
    <div class="ball-scale">
        <div class='contain'>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
        </div>
    </div>
</div>
    <!-- Pre-loader end -->

    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material" method="POST">
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left txt-primary">Iniciar Sesion</h3>
                                    </div>
                                </div>
                                <hr/>
                                    <input type="email" class="form-control" placeholder="Tu Correo" name="correo">
                                    <span class="md-line"></span>
                                    <input type="password" class="form-control" placeholder="Contraseña" name="contrasena">
                                    <span class="md-line"></span>
                                <div class="row m-t-25 text-left">
                                    <div class="col-12">
                                        <div class="checkbox-fade fade-in-primary d-">
                                            <label>
                                                <input type="checkbox" value="">
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">Recordarme</span>
                                            </label>
                                        </div>
                                        <div class="forgot-phone text-right f-right">
                                            <a href="auth-reset-password.html" class="text-right f-w-600 text-inverse">Olvide la contraseña</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Iniciar Sesion</button>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Gracias por estar con nosotros</p>
                                        <p class="text-inverse text-left"></p>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
                                    </div>
                                </div>

                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    <script type="text/javascript" src="Sistema/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="Sistema/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="Sistema/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="Sistema/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="Sistema/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="Sistema/bower_components/modernizr/js/modernizr.js"></script>
    <script type="text/javascript" src="Sistema/bower_components/modernizr/js/css-scrollbars.js"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="Sistema/bower_components/i18next/js/i18next.min.js"></script>
    <script type="text/javascript" src="Sistema/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="Sistema/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="Sistema/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
    <script type="text/javascript" src="Sistema/default/assets/js/common-pages.js"></script>
</body>

</html>


  
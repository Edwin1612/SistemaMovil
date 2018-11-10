<?php
//Funcion para quitar el error del header
ob_start();
//para iniciar la sesion y obtener las variables
session_start();
if(isset($_SESSION["nombre"]))
{
  
}else
{
  
  //Si no hay una sesion se envia al login
  header('Location: ../index.php');
}


?>


<!DOCTYPE html>
<!--
Item Name: Elisyam - Web App & Admin Dashboard Template
Version: 1.5
Author: SAEROX

** A license must be purchased in order to legally use this template for your project **
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Elisyam - Dashboard</title>
        <meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="copia/assets/img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="copia/assets/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="copia/assets/img/favicon-16x16.png">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="copia/assets/vendors/css/base/bootstrap.min.css">
        <link rel="stylesheet" href="copia/assets/vendors/css/base/elisyam-1.5.min.css">
        <link rel="stylesheet" href="copia/assets/css/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="copia/assets/css/owl-carousel/owl.theme.min.css">
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body id="page-top">
        <!-- End Preloader -->
        <div class="page">
            <!-- Begin Header -->
            <header class="header">
                <nav class="navbar fixed-top">         
                    <!-- Begin Search Box-->
                    
                    <!-- End Search Box-->
                    <!-- Begin Topbar -->
                    <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
                        <!-- Begin Logo -->
                        <div class="navbar-header">
                            <a href="db-default.html" class="navbar-brand">
                                
                            </a>
                            <!-- Toggle Button -->
                            <a id="toggle-btn" href="#" class="menu-btn active">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                            <!-- End Toggle -->
                        </div>
                        <!-- End Logo -->
                      <br>  <br>  
                        <!-- Begin Navbar Menu -->
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                            <!-- Search -->
                        </ul>
                        <!-- End Navbar Menu -->
                    </div>
                    <!-- End Topbar -->
                </nav>
            </header>
            <!-- End Header -->
            <!-- Begin Page Content -->
            <div class="page-content d-flex align-items-stretch">
                <div class="default-sidebar">
                    <!-- Begin Side Navbar -->
                    <nav class="side-navbar box-scroll sidebar-scroll">
                        <!-- Begin Main Navigation -->
                        <span class="heading">MODULOS</span>
                        <ul class="list-unstyled">
                           
                            <li><a href="index.php?action=inicio1"><i class="la la-map"></i>Inicio</a></li>
                            <li><a href="index.php?action=llegar"><i class="la la-map"></i>¿Como llegar?</a></li>
                            <li><a href="index.php?action=horario"><i class="la la-map"></i>Horario</a></li>
                            <li><a href="index.php?action=contraseña"><i class="la la-map"></i>Actualizar Contraseña</a></li>
                            <li><a href="index.php?action=cerrarSesion"><i class="la la-map"></i>Cerrar Sesion</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- End Left Sidebar -->
                <div class="content-inner">
                    <div class="container-fluid">
                      
                        <?php
                                        
                        //En esta zona sera donde se muestren las demas paginas
                        $mvc = new MvcControlador();
                        $mvc -> enlacesPaginasControlador();
                      ?>
                       
                        <!-- End Row -->
                    </div>
                    <!-- End Container -->
                    <!-- Begin Page Footer-->
                    <!-- End Page Footer -->
                    <!-- Offcanvas Sidebar -->
                    <!-- End Offcanvas Sidebar -->
                </div>
                <!-- End Content -->
            </div>
            <!-- End Page Content -->
        </div>
       <?php
ob_end_flush();
?>
        <!-- End Modal -->
        <!-- Begin Vendor Js -->
        <script src="copia/assets/vendors/js/base/jquery.min.js"></script>
        <script src="copia/assets/vendors/js/base/core.min.js"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="copia/assets/vendors/js/nicescroll/nicescroll.min.js"></script>
        <script src="copia/assets/vendors/js/chart/chart.min.js"></script>
        <script src="copia/assets/vendors/js/progress/circle-progress.min.js"></script>
        <script src="copia/assets/vendors/js/calendar/moment.min.js"></script>
        <script src="copia/assets/vendors/js/calendar/fullcalendar.min.js"></script>
        <script src="copia/assets/vendors/js/owl-carousel/owl.carousel.min.js"></script>
        <script src="copia/assets/vendors/js/app/app.js"></script>
        <!-- End Page Vendor Js -->
        <!-- Becopia/gin Page Snippets -->
        <script src="copia/assets/js/dashboard/db-default.js"></script>
        <!-- End Page Snippets -->
    </body>
</html>
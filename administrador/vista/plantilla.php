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
        
        <link rel="stylesheet" href="copia/assets/css/owl-carousel/owl.theme.min.css">
      
        <link rel="stylesheet" href="copia/assets/css/owl-carousel/owl.carousel.min.css">
      
        <!-- Stylesheet -->
        <link rel="stylesheet" href="copia/assets/css/datatables/datatables.min.css">
        
        
        
        <!-- Stylesheet -->
        
        
        
      
      
    </head>
    <body id="page-top">
        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                <img src="assets/img/logo.png" alt="logo" class="loader-logo">
                <div class="spinner"></div>   
            </div>
        </div>
        <div class="page">
            <header class="header">
                <nav class="navbar fixed-top">
                    <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
                        <div class="navbar-header">
                            <a href="db-default.html" class="navbar-brand">
                                <div class="brand-image brand-big">
                                    <img src="copia/assets/img/logo-big.png" alt="logo" class="logo-big">
                                </div>
                                <div class="brand-image brand-small">
                                    <img src="copia/assets/img/logo.png" alt="logo" class="logo-small">
                                </div>
                            </a>
                            <a id="toggle-btn" href="#" class="menu-btn active">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                            
                        </ul>
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
                        <span class="heading">Modulos</span>
                        <ul class="list-unstyled">
                            <li><a href="index.php?action=inicio0"><i class="la la-map"></i><span>Inicio</span></a></li>
                           <li><a href="index.php?action=usuarios"><i class="la la-map"></i><span>Usuarios</span></a></li>
                           <li><a href="index.php?action=categorias"><i class="la la-map"></i><span>Promociones</span></a></li>
                           <li><a href="index.php?action=prodcutos"><i class="la la-map"></i><span>Premios</span></a></li>
                            <li><a href="index.php?action=cerrarSesion"><i class="la la-map"></i><span>Cerrar Sesion</span></a></li>
                        </ul>
                     </nav>
                </div>
                <div class="content-inner">
                    <div class="">
                      
                      <?php
                                        
                        //En esta zona sera donde se muestren las demas paginas
                        $mvc = new MvcControlador();
                        $mvc -> enlacesPaginasControlador();
                      ?>
                      
                      
                    </div>
                </div>
                <!-- End Content -->
            </div>
            <!-- End Page Content -->
        </div>
        <!-- Begin Success Modal -->
        <div id="delay-modal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="sa-icon sa-success animate" style="display: block;">
                            <span class="sa-line sa-tip animateSuccessTip"></span>
                            <span class="sa-line sa-long animateSuccessLong"></span>
                            <div class="sa-placeholder"></div>
                            <div class="sa-fix"></div>
                        </div>
                        <div class="section-title mt-5 mb-5">
                            <h2 class="text-dark">Meeting successfully created</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <?php
ob_end_flush();
?>
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
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="copia/assets/vendors/js/datatables/datatables.min.js"></script>
        <script src="copia/assets/vendors/js/datatables/dataTables.buttons.min.js"></script>
        <script src="copia/assets/vendors/js/datatables/jszip.min.js"></script>
        <script src="copia/assets/vendors/js/datatables/buttons.html5.min.js"></script>
        <script src="copia/assets/vendors/js/datatables/pdfmake.min.js"></script>
        <script src="copia/assets/vendors/js/datatables/vfs_fonts.js"></script>
        <script src="copia/assets/vendors/js/datatables/buttons.print.min.js"></script>
        <script src="copia/assets/vendors/js/app/app.min.js"></script>
        <!-- End Page Vendor Js -->
        <!-- Begin Page Snippets -->
        <script src="copia/assets/js/components/tables/tables.js"></script>
        
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        
        >
        
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        
        
        <!-- End Page Snippets -->
        <!-- End Page Snippets -->
    </body>
</html>
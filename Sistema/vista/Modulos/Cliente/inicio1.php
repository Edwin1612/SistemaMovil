<?php
$stmt = Datos::getMisVisitas();
$stmt2 = Datos::getMisPremiosDados();
$stmt3 = Datos::getMisPromocionesDadas();
?>

<!-- Begin Page Header-->
<div class="row">
  <div class="page-header">
    <div class="d-flex align-items-center">
      <h2 class="page-header-title">Hola <?=$_SESSION["nombre"]?></h2>
    </div>
  </div>
</div>
<!-- End Page Header -->
<!-- Begin Row -->
<div class="row flex-row">
  <!-- Begin Facebook -->
  <div class="col-xl-4 col-md-6 col-sm-6">
    <div class="widget widget-12 has-shadow">
      <div class="widget-body">
        <div class="media">
          <div class="align-self-center ml-5 mr-5">
            <i class="ion-social-facebook text-facebook"></i>
          </div>
          <div class="media-body align-self-center">
            <a href="index.php?action=visitas"><div class="title text-facebook">Mis visitas</div></a>
            <div class="number"><?=$stmt["count(*)"]?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Facebook -->
  <!-- Begin Twitter -->
  <div class="col-xl-4 col-md-6 col-sm-6">
    <div class="widget widget-12 has-shadow">
      <div class="widget-body">
        <div class="media">
          <div class="align-self-center ml-5 mr-5">
            <i class="ion-social-twitter text-twitter"></i>
          </div>
          <div class="media-body align-self-center">
            <a href="index.php?action=premios"><div class="title text-twitter">Premios</div></a>
            <div class="number"><?=$stmt2["count(*)"]?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Twitter -->
  <!-- Begin Linkedin -->
  <div class="col-xl-4 col-md-6 col-sm-6">
    <div class="widget widget-12 has-shadow">
      <div class="widget-body">
        <div class="media">
          <div class="align-self-center ml-5 mr-5">
            <i class="ion-social-linkedin-outline text-linkedin"></i>
          </div>
          <div class="media-body align-self-center">
            <a href="index.php?action=clima"><div class="title text-linkedin">Clima</div></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-xl-4 col-md-6 col-sm-6">
    <div class="widget widget-12 has-shadow">
      <div class="widget-body">
        <div class="media">
          <div class="align-self-center ml-5 mr-5">
            <i class="ion-social-linkedin-outline text-linkedin"></i>
          </div>
          <div class="media-body align-self-center">
            <a href="index.php?action=promiciones"><div class="title text-linkedin">Promociones</div></a>
            <div class="number"><?=$stmt3["count(*)"]?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Linkedin -->
</div>